<?php
include_once('session.php');
$updated_at = date('Y-m-d H:i:s');
$serial_no = time() . rand(100, 999);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require('../library/PHPMailer-master/src/Exception.php');
require('../library/PHPMailer-master/src/PHPMailer.php');
require('../library/PHPMailer-master/src/SMTP.php');

if(isset($_POST['table'])){
    if($_POST['table'] == 'user_accounts') {
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);
        $count = 1;
        foreach ($result as $row) {
            // Action Buttons
            $edit = '<button type="button" class="btn btn-primary btn-sm edit" id="' . $row['id'] . '"  data-id="' . $row['email'] . '">
                        <i class="fa fa-edit"></i>&nbsp;Edit
                    </button>&nbsp;';
            $delete = '<button type="button" class="btn btn-danger btn-sm delete" id="' . $row['id'] . '" data-id="' . $row['email']  . '">
                        <i class="fa fa-trash"></i>&nbsp;Delete
                    </button>&nbsp;';
            $view = "";         
            // User Active Status
            switch ($row['is_active']) {
                case 1:                   
                    $is_active = '<div class="custom-control custom-switch custom-switch-off-default custom-switch-on-success">
                                    <input type="checkbox" name="is_active" class="custom-control-input" id="switch_' . $row['id'] . '" data-id="' . $row['id']  . '" data-val="'. $row['email'].'" checked>
                                    <label class="custom-control-label" for="switch_' . $row['id'] . '" data-id="' . $row["id"] . '">ON</label>
                                </div>';
                    break;

                default:
                     $is_active = '<div class="custom-control custom-switch custom-switch-off-default custom-switch-on-success">
                                    <input type="checkbox" name="is_active" class="custom-control-input" id="switch_' . $row['id'] . '" data-id="' . $row['id']  . '"  data-val="' . $row['email'] . '">
                                    <label class="custom-control-label" for="switch_' . $row['id'] . '" data-id="' . $row["id"] . '">OFF</label>
                                </div>';
                    
                    break;
            }
            // Define user status and buttons
            switch ($row['user_status']) {
                case 'default':
                    $voters_status = '<div class="project-state">
                                            <span class="badge badge-success">' . $row['user_status'] . '</span>
                                        </div>';
                    $action = '<button type="button" class="btn btn-danger btn-sm delete" id="' . $row['id'] . '" data-val="' . $row['email']  . '" disabled>
                                    <i class="fa fa-trash"></i>&nbsp;Delete
                                </button>';
                    break;

                default:
                    $voters_status = '<div class="project-state">
                                        <span class="badge badge-secondary">' . $row['user_status'] . '</span>
                                    </div>';
                    $action = $delete;
                    break;
            }

            $sub_array = array();
            $sub_array[] = $count++ . '.';
            $sub_array[] = $row['email'];
            $sub_array[] = $row['user_type'];
            $sub_array[] = $row['created_at'];
            $sub_array[] = '<span class="badge badge-default">'. strtoupper($row['user_status']).'</span>';
            $sub_array[] = $is_active;
            $sub_array[] = $action;
            $data[] = $sub_array;
        }
        $response = array('data' => $data ?? '');
    }
    if($_POST['table'] == 'user_profile'){
        $sql = "SELECT * FROM user_profile ORDER BY lname ASC";
        $result = $conn->query($sql);
        $count = 1;
        foreach ($result as $row) {
            //Get User Image
            $image = $row['photo'] ? $row['photo'] : '../images/avatar.png';
            $image = '<ul class="list-inline">
                        <li class="list-inline-item">
                            <img alt="Avatar" class="table-avatar" src="'. $image.'">
                        </li>                              
                    </ul>';
            // Voters Status
            switch ($row['voter_status']) {
                case 'ACTIVE':
                        $voters_status = '<div class="project-state">
                                            <span class="badge badge-success">' . $row['voter_status'] . '</span>
                                        </div>';
                    break;
                
                default:
                    $voters_status = '<div class="project-state">
                                        <span class="badge badge-secondary">' . $row['voter_status'] . '</span>
                                    </div>';
                    break;
            }
            // Get fullname
            $fullname = $row['lname'] ? $row['lname'] . ', ' : '';
            $fullname .= $row['fname'] ? $row['fname'] : '';
            $fullname .= $row['mname'] ? ' ' . substr($row['mname'], 0, 1) . '. ' : '';
            $fullname .= $row['suffix'] ? $row['suffix'] : '';
            // Get Age
            $age = floor((time() - strtotime($row['bdate'])) / (60 * 60 * 24 * 365));
            // Action Buttons
            $edit = '<button type="button" class="btn btn-primary btn-sm edit" id="' . $row['id'] . '"  data-val="' . strtoupper($fullname) . '">
                        <i class="fa fa-edit"></i>&nbsp;Edit
                    </button>&nbsp;';
            $delete = '<button type="button" class="btn btn-danger btn-sm delete" id="' . $row['id'] . '" data-val="' . strtoupper($fullname) . '">
                        <i class="fa fa-trash"></i>&nbsp;Delete
                    </button>&nbsp;';
            $census = '<button type="button" class="btn btn-info btn-sm census" id="' . $row['id'] . '"  data-val="' . strtoupper($fullname) . '">
                        <i class="fa fa-search"></i>&nbsp;Census
                    </button>&nbsp;';

            // Define action buttons via user type
            switch ($user['user_type']) {
                case 'ADMIN':
                    $action = $census . $edit . $delete;
                    break;
                case 'STAFF':
                    $action = $census . $edit;
                    break;
                default:
                    $action = '';
                    break;
            }

            $sub_array = array();
            $sub_array[] = $count++ . '.';
            $sub_array[] = $image;
            $sub_array[] = strtoupper($fullname);
            $sub_array[] = $row['brgy_id'];
            $sub_array[] = $age;
            $sub_array[] = $row['gender'];
            $sub_array[] = $row['civil_status'];
            $sub_array[] = $row['contact_no'];
            $sub_array[] = $voters_status;
            $sub_array[] = $action;
            $data[] = $sub_array;
        }
        $response = array('data' => $data ?? '');
    }
    if($_POST['table'] == 'certificates') {
        if($user['user_type'] == 'ADMIN' || $user['user_type'] == 'STAFF'){
            switch ($_POST['filter']) {
                case '':
                    $filter = '';
                    break;
                default:
                    $filter = "WHERE cert_type = '{$_POST['filter']}'";
                    break;
            }
            $sql = "SELECT * FROM certificates $filter";
        }else{
            switch ($_POST['filter']) {
                case '':
                    $filter = '';
                    break;
                default:
                    $filter = "AND cert_type = '{$_POST['filter']}'";
                    break;
            }
            $sql = "SELECT * FROM certificates WHERE email = '{$user['email']}' $filter";
        }        
        $result = $conn->query($sql);
        $count = 1;
        foreach ($result as $row) {
            // Action Buttons
            $delete = '<button type="button" class="btn btn-outline-danger btn-sm delete" id="' . $row['id'] . '" data-id="' . $row['fullname']  . '">
                        <i class="fa fa-times"></i>
                    </button>&nbsp;';           
            $approve = '<button type="button" class="btn btn-primary btn-sm approve" id="' . $row['id'] . '" data-id="' . $row['fullname']  . '" data-val="'.$row['email'].'">
                        <i class="fa fa-thumbs-up"></i>&nbsp;Approve
                    </button>&nbsp;';
            $decline = '<button type="button" class="btn btn-danger btn-sm decline" id="' . $row['id'] . '" data-id="' . $row['fullname']  . '">
                        <i class="fa fa-thumbs-down"></i>&nbsp;Decline
                    </button>&nbsp;';
            $claim = '<button type="button" class="btn btn-success btn-sm claim" id="' . $row['id'] . '" data-id="' . $row['fullname']  . '" data-val="' . $row['email'] . '">
                        <i class="fa fa-check"></i>&nbsp;Complete
                    </button>&nbsp;';
            $undo = '<button type="button" class="btn btn-secondary btn-sm undo" id="' . $row['id'] . '" data-id="' . $row['fullname']  . '">
                        <i class="fa fa-history"></i>&nbsp;Revert
                    </button>&nbsp;';   
            // Define user status and buttons
            switch ($row['request_status']) {
                case 'Pending':
                    $status = '<span class="badge badge-warning rounded-lg p-2">' . strtoupper($row['request_status']) . '</span>';
                    $process = '<button type="button" class="btn btn-info btn-sm process" id="' . $row['id'] . '"  data-id="' . $row['request_status'] . '">
                                    <i class="fa fa-pen"></i>&nbsp;Process
                                </button>&nbsp;';
                    $action = $decline;
                    $undo = '';
                    break;
                case 'Processing':
                    $status = '<span class="badge badge-info rounded-lg p-2">' . strtoupper($row['request_status']) . '</span>';
                    $process = '<button type="button" class="btn btn-warning btn-sm process" id="' . $row['id'] . '"  data-id="' . $row['request_status'] . '">
                                    <i class="fa fa-pen"></i>&nbsp;Pending
                                </button>&nbsp;';
                    $action = $approve;
                    $undo = '';
                    break;
                case 'Declined':
                    $status = '<span class="badge badge-danger rounded-lg p-2">' . strtoupper($row['request_status']) . '</span>';
                    $process = '<span class="text-danger">DECLINED&nbsp;<span>';
                    $action = '';
                    $undo = $undo;
                    break;
                case 'For Claim':
                    $status = '<span class="badge badge-primary rounded-lg p-2">' . strtoupper($row['request_status']) . '</span>';
                    $process = '';
                    $action = $claim;
                    $undo = '';
                    break;
                default:
                    $status = '<span class="badge badge-success rounded-lg p-2">' . strtoupper($row['request_status']) . '</span>';
                    $process = '<span class="text-success">COMPLETED&nbsp;<span>';
                    $undo = $undo;
                    if ($user['user_type'] == 'ADMIN' || $user['user_type'] == 'STAFF') {
                        $action = '&nbsp;
                                <a href="print.php?data=' . $row['id'] . '" class="btn btn-default btn-sm print" target="_blank"  id="' . $row['id'] . '"  data-id="' . $row['id'] . '">
                                    <i class="fa fa-print"></i>&nbsp;Print
                                </a>';
                    } else {
                        $action = '';
                    }                  
                    
                    break;
            }
            // Define action buttons via user type
            switch ($user['user_type']) {
                case 'ADMIN':
                    $action = $process. $action;
                    break;
                case 'STAFF':
                    $action = $process . $action;
                    break;                
                default:
                    $action = '';
                    break;
            }

            $sub_array = array();
            $sub_array[] = $count++ . '.';
            $sub_array[] = $status;
            $sub_array[] = $row['created_at'];
            $sub_array[] = $row['fullname'] ? $row['fullname'] : $row['email'];
            $sub_array[] = $row['cert_type'];
            $sub_array[] = $row['cert_purpose'];
            $sub_array[] = $row['remarks'];
            $sub_array[] = '<div class="text-right">'.$action.'</div>';
            $data[] = $sub_array;
        }
        $response = array('data' => $data ?? '');
    }
    if($_POST['table'] == 'barangay_id') {

        if($user['user_type'] == 'ADMIN' || $user['user_type'] == 'STAFF'){
            $sql = "SELECT * FROM barangay_id";
        }else{
            $sql = "SELECT * FROM barangay_id WHERE email = '{$user['email']}'";
        }
        
        $result = $conn->query($sql);
        // $count = 1;
        foreach ($result as $row) {
            // Action Buttons
            $delete = '<button type="button" class="btn btn-outline-danger btn-sm delete" id="' . $row['id'] . '" data-id="' . $row['fullname']  . '">
                        <i class="fa fa-times"></i>
                    </button>&nbsp;';           
            $approve = '<button type="button" class="btn btn-primary btn-sm approve" id="' . $row['id'] . '" data-id="' . $row['fullname']  . '" data-val="'.$row['email'].'">
                        <i class="fa fa-thumbs-up"></i>&nbsp;Approve
                    </button>&nbsp;';
            $decline = '<button type="button" class="btn btn-danger btn-sm decline" id="' . $row['id'] . '" data-id="' . $row['fullname']  . '">
                        <i class="fa fa-thumbs-down"></i>&nbsp;Decline
                    </button>&nbsp;';
            $claim = '<button type="button" class="btn btn-success btn-sm claim" id="' . $row['id'] . '" data-id="' . $row['fullname']  . '" data-val="' . $row['email'] . '">
                        <i class="fa fa-check"></i>&nbsp;Complete
                    </button>&nbsp;';
            $undo = '<button type="button" class="btn btn-secondary btn-sm undo" id="' . $row['id'] . '" data-id="' . $row['fullname']  . '">
                        <i class="fa fa-history"></i>&nbsp;Revert
                    </button>&nbsp;';
            // Define user status and buttons
            switch ($row['request_status']) {
                case 'Pending':
                    $status = '<span class="badge badge-warning rounded-lg p-2">' . strtoupper($row['request_status']) . '</span>';
                    $process = '<button type="button" class="btn btn-info btn-sm process" id="' . $row['id'] . '"  data-id="' . $row['request_status'] . '">
                                    <i class="fa fa-pen"></i>&nbsp;Process
                                </button>&nbsp;';
                    $action = $decline;
                    $undo = '';
                    break;
                case 'Processing':
                    $status = '<span class="badge badge-info rounded-lg p-2">' . strtoupper($row['request_status']) . '</span>';
                    $process = '<button type="button" class="btn btn-warning btn-sm process" id="' . $row['id'] . '"  data-id="' . $row['request_status'] . '">
                                    <i class="fa fa-pen"></i>&nbsp;Pending
                                </button>&nbsp;';
                    $action = $approve;
                    $undo = '';
                    break;
                case 'Declined':
                    $status = '<span class="badge badge-danger rounded-lg p-2">' . strtoupper($row['request_status']) . '</span>';
                    $process = '<span class="text-danger">DECLINED&nbsp;<span>';
                    $action = '';
                    $undo = $undo;
                    break;
                case 'For Claim':
                    $status = '<span class="badge badge-primary rounded-lg p-2">' . strtoupper($row['request_status']) . '</span>';
                    $process = '';
                    $action = $claim;
                    $undo = '';
                    break;
                default:
                    $status = '<span class="badge badge-success rounded-lg p-2">' . strtoupper($row['request_status']) . '</span>';
                    $process = '<span class="text-success">COMPLETED&nbsp;<span>';
                    $action = '';
                    $undo = $undo;
                    break;
            }
            // Define action buttons via user type
            switch ($user['user_type']) {
                case 'ADMIN':
                    $action = $process . $action;
                    break;
                case 'STAFF':
                    $action = $process . $action;
                    break;
                default:
                    $action = '';
                    break;
            }          

            $image = $row['photo'] ? $row['photo'] : '../images/avatar.png';
            $fullname = '<ul class="list-inline">
                        <li class="list-inline-item">
                            <img alt="Avatar" class="table-avatar" src="' . $image . '">
                        </li>                              
                        <li class="list-inline-item">'.$row['fullname'].'</li>                              
                    </ul>';

            $sub_array = array();
            $sub_array[] = $status;
            $sub_array[] = $fullname;
            $sub_array[] = $row['bdate'];
            $sub_array[] = $row['emergency_person'];
            $sub_array[] = $row['emergency_relationship'];
            $sub_array[] = $row['emergency_address'];
            $sub_array[] = $row['emergency_contact'];
            $sub_array[] = $row['created_at'];
            $sub_array[] = $row['claiming_date'];
            $sub_array[] = $row['expiration_date'];
            $sub_array[] = $row['id_no'];
            $sub_array[] = $row['remarks'];
            $sub_array[] = '<div class="text-right">'.$action.'</div>';
            $data[] = $sub_array;
        }
        $response = array('data' => $data ?? '');
    }
    if ($_POST['table'] == 'inventory') {        
        switch ($_POST['filter']) {
            case '':
                $filter = '';
                break;
            default:
                $filter = "WHERE category = '{$_POST['filter']}'";
                break;
        }
        $sql = "SELECT * FROM equipments $filter";
        $result = $conn->query($sql);
        $count = 1;
        foreach ($result as $row) {
            // Action Buttons
            $delete = '<button type="button" class="btn btn-outline-danger btn-sm delete" id="' . $row['id'] . '" data-id="' . $row['control_no']  . '">
                        <i class="fa fa-times"></i>
                    </button>&nbsp;';
            $approve = '<button type="button" class="btn btn-primary btn-sm approve" id="' . $row['id'] . '" data-id="' . $row['control_no']  . '" data-val="' . $row['item_name'] . '">
                        <i class="fa fa-thumbs-up"></i>&nbsp;Approve
                    </button>&nbsp;';
            $decline = '<button type="button" class="btn btn-danger btn-sm decline" id="' . $row['id'] . '" data-id="' . $row['control_no']  . '">
                        <i class="fa fa-thumbs-down"></i>&nbsp;Decline
                    </button>&nbsp;';
            $claim = '<button type="button" class="btn btn-success btn-sm claim" id="' . $row['id'] . '" data-id="' . $row['control_no']  . '" data-val="' . $row['item_name'] . '">
                        <i class="fa fa-check"></i>&nbsp;Complete
                    </button>&nbsp;';
            $edit = '<button type="button" class="btn btn-primary btn-sm edit" id="' . $row['id'] . '">
                        <i class="fa fa-edit"></i>&nbsp;Edit
                    </button>&nbsp;';
            // Define user status and buttons
            switch ($row['item_status']) {
                case '0':
                    $status = '<span class="badge badge-secondary rounded-lg">UNAVAILABLE</span>';
                    break;
                case '1':
                    $status = '<span class="badge badge-success rounded-lg">AVAILABLE</span>';
                    break;
                case '2':
                    $status = '<span class="badge badge-info rounded-lg">BORROWED/RESERVED</span>';
                    break;
                case '3':
                    $status = '<span class="badge badge-danger rounded-lg">DAMAGED</span>';
                    break;
                case '4':
                    $status = '<span class="badge badge-warning rounded-lg">LOST</span>';
                    break;
                default:
                    $status = '<span class="badge badge-default rounded-lg">' . strtoupper($row['item_status']) . '</span>';
                    break;
            }
            // Define action buttons via user type
            switch ($user['user_type']) {
                case 'ADMIN':
                    $action = $edit.$delete;
                    break;
                case 'STAFF':
                    $action = $edit;
                    break;
                default:
                    $action = '';
                    break;
            }

            $image = '<div class="product-img">
                      <img src="'.$row['photo'].'"alt="Product Image" class="img-size-50">
                    </div>';

            $sub_array = array();
            $sub_array[] = $count++ . '.';
            $sub_array[] = $image;
            $sub_array[] = $row['control_no'];
            $sub_array[] = $row['category'];
            $sub_array[] = $row['item_name'];
            $sub_array[] = $row['descriptions'];
            $sub_array[] = $row['quantity'];
            $sub_array[] = $status;
            $sub_array[] = '<div class="text-right">' . $action . '</div>';
            $data[] = $sub_array;
        }
        $response = array('data' => $data ?? '');
    }
    if($_POST['table'] == 'officials') {
        $sql = "SELECT *, officials.id AS o_id FROM officials LEFT JOIN positions ON positions.id = officials.position_id ORDER BY level_priority ASC";
        $result = $conn->query($sql);
        $count = 1;
        foreach ($result as $row) {
            // Action Buttons
            $edit = '<button type="button" class="btn btn-primary btn-sm edit" id="' . $row['o_id'] . '"  data-id="' . $row['fullname'] . '">
                        <i class="fa fa-edit"></i>&nbsp;Edit
                    </button>&nbsp;';
            $delete = '<button type="button" class="btn btn-danger btn-sm delete" id="' . $row['o_id'] . '" data-id="' . $row['fullname']  . '">
                        <i class="fa fa-trash"></i>&nbsp;Delete
                    </button>&nbsp;';
            $view = "";

            // define action buttons via user type
            if($user['user_type'] == 'ADMIN' || $user['user_type'] == 'STAFF'){
                $action = $edit.$delete;
            }else{
                $action = '';
            }

            $sub_array = array();
            $sub_array[] = $count++ . '.';
            $sub_array[] = $row['position_name'];
            $sub_array[] = $row['fullname'];
            $sub_array[] = $action;
            $data[] = $sub_array;
        }
        $response = array('data' => $data ?? '');
    }
    if($_POST['table'] == 'positions') {
        $sql = "SELECT * FROM positions ORDER BY level_priority ASC";
        $result = $conn->query($sql);
        $count = 1;
        foreach ($result as $row) {
            // Action Buttons
            $edit = '<button type="button" class="btn btn-primary btn-sm edit" id="' . $row['id'] . '"  data-id="' . $row['position_name'] . '">
                        <i class="fa fa-edit"></i>&nbsp;Edit
                    </button>&nbsp;';
            $delete = '<button type="button" class="btn btn-danger btn-sm delete" id="' . $row['id'] . '" data-id="' . $row['position_name']  . '">
                        <i class="fa fa-trash"></i>&nbsp;Delete
                    </button>&nbsp;';
            $view = '<button type="button" class="btn btn-primary btn-sm view" id="' . $row['id'] . '"  data-id="' . $row['position_name'] . '">
                        <i class="fa fa-magnifier"></i>&nbsp;view
                    </button>&nbsp;';

            // define action buttons via user type
            if ($user['user_type'] == 'ADMIN' || $user['user_type'] == 'STAFF'
            ) {
                $action = $edit . $delete;
            } else {
                $action = '';
            }

            $sub_array = array();
            $sub_array[] = $count++ . '.';
            $sub_array[] = $row['position_name'];
            $sub_array[] = $row['level_priority'];
            $sub_array[] = $row['max_count'];
            $sub_array[] = $action;
            $data[] = $sub_array;
        }
        $response = array('data' => $data ?? '');
    }
    echo json_encode($response);
}

if(isset($_POST['action'])){
/** MAIN PAGE */ 
    if($_POST['action'] == 'create_barangay_info'){

        $result = $conn->query("TRUNCATE TABLE brgy_info;");
        if(isset($result) == true){
            //get image file
            $file = $_FILES['file']['tmp_name'];
            $imageData = file_get_contents($file);
            $base64 = base64_encode($imageData);
            $imageType = $_FILES['file']['type']; // Get the image type

            // Prepare the data URI
            $dataUri = 'data:' . $imageType . ';base64,' . $base64;

            $arr_data = array(
                'header'     => addslashes($_POST['header']),
                'name'       => addslashes($_POST['name']),
                'title'      => addslashes($_POST['title']),
                'content'    => addslashes($_POST['content']),
                'footer'     => addslashes($_POST['footer']),
                'footer_logo' => $dataUri
            );

            $columns = implode(",", array_keys($arr_data));
            $values = implode("','", array_values($arr_data));

            $sql = "INSERT INTO brgy_info ($columns) VALUES ('$values')";
            $result = $conn->query($sql);
            if (isset($result) == true) {
                $response = array(
                    'status' => 'ok',
                    'title' => 'Success!',
                    'html' => 'Details has been updated!',
                    'icon' => 'success',
                );
            } else {
                $response = array(
                    'status' => 'error',
                    'title' => 'Error!',
                    'html' => 'Please try again later!',
                    'icon' => 'error',
                );
            }
        }else{
            $response = array(
                'title' => 'Error!',
                'html' => 'Failed to truncate table, please try again later!',
                'icon' => 'error',
            );
        }       

    }
    if ($_POST['action'] == 'fetch_barangay_info') {
        $sql = "SELECT * FROM brgy_info";
        $row = $conn->query($sql)->fetch(PDO::FETCH_ASSOC);
        $response = array(
            'header' => $row['header'] ?? '',
            'name' => $row['name']  ?? '',
            'title' => $row['title'] ?? '',
            'content' => $row['content'] ?? '',
            'footer' => $row['footer'] ?? '',
        );
    }
    
/** ANNOUNCEMENT */
    if($_POST['action'] == 'create_announcement'){
        // Check if image file is actual file
        if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
            //get image file
            $file = $_FILES['file']['tmp_name'];
            $imageData = file_get_contents($file);
            $base64 = base64_encode($imageData);
            $imageType = $_FILES['file']['type']; // Get the image type
            // Prepare the data URI
            $dataUri = 'data:' . $imageType . ';base64,' . $base64;

            // Create an image resource from the binary data
            $image = imagecreatefromstring($imageData);
            // Resize the image
            $resizedImage = imagescale($image, 200, 200); // Resize to 300x200 pixels
            // Encode the resized image back to Base64
            ob_start();

            switch ($imageType) {
                case 'image/png':
                    imagepng($resizedImage);
                    break;

                default:
                    imagejpeg($resizedImage);
                    break;
            }

            $imageBase64 = base64_encode(ob_get_contents());
            ob_end_clean();
            $dataUri = 'data:' . $imageType . ';base64,' . $imageBase64;
        } else {
            $dataUri = '';
        }

        $arr_data = array(
            'date_content'  => addslashes($_POST['date']),
            'news_title'    => addslashes($_POST['title']),
            'content'       => addslashes($_POST['content']),
            'is_published'  => 'false',
            'content_image' => $dataUri,
            'updated_at'    => '',
            'updated_by'    => $_SESSION['id']
        );

        $columns = implode(",", array_keys($arr_data));
        $values = implode("','", array_values($arr_data));

        $sql = "INSERT INTO announcement ($columns) VALUES ('$values')";
        $result = $conn->query($sql);
        if (isset($result) == true) {
            $response = array(
                'status' => 'ok',
                'title' => 'Success!',
                'html' => 'Announcement has been added!',
                'icon' => 'success',
            );
        } else {
            $response = array(
                'status' => 'error',
                'title' => 'Error!',
                'html' => 'Please try again later!',
                'icon' => 'error',
            );
        }
    }
    if($_POST['action'] == 'edit_announcement'){
        $id = $_POST['id'];
        // Check if image file is actual file
        if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
            //get image file
            $file = $_FILES['file']['tmp_name'];
            $imageData = file_get_contents($file);
            $base64 = base64_encode($imageData);
            $imageType = $_FILES['file']['type']; // Get the image type
            // Prepare the data URI
            $dataUri = 'data:' . $imageType . ';base64,' . $base64;

            // Create an image resource from the binary data
            $image = imagecreatefromstring($imageData);
            // Resize the image
            $resizedImage = imagescale($image, 200, 200); // Resize to 300x200 pixels
            // Encode the resized image back to Base64
            ob_start();

            switch ($imageType) {
                case 'image/png':
                    imagepng($resizedImage);
                    break;

                default:
                    imagejpeg($resizedImage);
                    break;
            }

            $imageBase64 = base64_encode(ob_get_contents());
            ob_end_clean();
            $dataUri = 'data:' . $imageType . ';base64,' . $imageBase64;

            $arr_data = array(
                'date_content'  => addslashes($_POST['date']),
                'news_title'    => addslashes($_POST['title']),
                'content'       => addslashes($_POST['content']),
                'content_image' => $dataUri,
                'updated_at'    => '',
                'updated_by'    => $_SESSION['id']
            );
        } else {
            $arr_data = array(
                'date_content'  => addslashes($_POST['date']),
                'news_title'    => addslashes($_POST['title']),
                'content'       => addslashes($_POST['content']),
                'updated_at'    => '',
                'updated_by'    => $_SESSION['id']
            );
        }

        $cv = 0;
        $setValues = '';
        foreach ($arr_data as $index => $arr_data) {
            $comma = ($cv > 0) ? ', ' : '';
            $setValues .= $comma . $index . " = " . "'" . $arr_data . "'";
            $cv++;
        }

        $sql = "UPDATE announcement SET " . $setValues . " WHERE id = $id";

        $result = $conn->query($sql);
        if (isset($result) == true) {
            $response = array(
                'status' => 'ok',
                'title' => 'Success!',
                'html' => 'Announcement has been added!',
                'icon' => 'success',
            );
        } else {
            $response = array(
                'status' => 'error',
                'title' => 'Error!',
                'html' => 'Please try again later!',
                'icon' => 'error',
            );
        }
    }
    if($_POST['action'] == 'delete_announcement'){
        $id = $_POST['id'];
        $sql = "DELETE from announcement WHERE id = $id";
        $result = $conn->query($sql);
        if($result){
            $response = array(
                'title' => 'Deleted!',
                'html' => 'Announcement has been deleted.',
                'icon' => 'success',
            );
        }else{
            $response = array(
                'title' => 'Failed!',
                'html' => 'Failed to delete data.',
                'icon' => 'error',
            );                
        }        
    }
    if($_POST['action'] == 'fetch_announcement'){
        $id = $_POST['id'];
        $sql = "SELECT * FROM announcement WHERE id = $id";
        $row = $conn->query($sql)->fetch(PDO::FETCH_ASSOC);
        $response = array(
            'id' => $row['id'],
            'date' => $row['date_content'],
            'title' => $row['news_title'],
            'content' => $row['content'],
            'image' => $row['content_image'],
        );

    }
    if($_POST['action'] == 'change_publish_status'){
        $id = $_POST['id'];
        $is_published = $_POST['switchValue'];
        
        switch ($is_published) {
            case 'true':
                $title = 'Publish On';
                $html = 'published turned ON';
                break;
            
            default:
                $title = 'Publish Off';
                $html = 'published turned OFF';
                break;
        }

        $sql = "UPDATE announcement
                SET is_published = $is_published
                WHERE id = $id";
        $result = $conn->query($sql);
        if($result){
            $response = array(
                'title' => $title,
                'html' => $html,
                'icon' => 'success',
                );
        }else{
            $response = array(
                'title' => 'Failed!',
                'html' => 'failed to change publish status.',
                'icon' => 'error',
            );
        }
    }

/** USER PROFILES */
    if($_POST['action'] == 'create_user_profile'){
        // Check if image file is actual file
        if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
            //get image file
            $file = $_FILES['file']['tmp_name'];
            $imageData = file_get_contents($file);
            $base64 = base64_encode($imageData);
            $imageType = $_FILES['file']['type']; // Get the image type
            // Prepare the data URI
            $dataUri = 'data:' . $imageType . ';base64,' . $base64;

            // Create an image resource from the binary data
            $image = imagecreatefromstring($imageData);
            // Resize the image
            $resizedImage = imagescale($image, 200, 200); // Resize to 300x200 pixels
            // Encode the resized image back to Base64
            ob_start();
            imagejpeg($resizedImage);
            // imagepng($resizedImage);
            $imageBase64 = base64_encode(ob_get_contents());
            ob_end_clean();
            $dataUri = 'data:' . $imageType . ';base64,' . $imageBase64;
        } else {
            $dataUri = '';
        }

        $brgy_id = $serial_no;

        $arr_data = array(
            'brgy_id'   => $brgy_id,
            'lname'     => addslashes($_POST['lname']),
            'fname'     => addslashes($_POST['fname']),
            'mname'     => addslashes($_POST['mname']),
            'suffix'    => addslashes($_POST['suffix']),
            'gender'    => $_POST['gender'],
            'bdate'         => $_POST['bdate'],
            'birth_place'   => $_POST['birth_place'],
            'civil_status'  => $_POST['civil_status'],
            'citizenship'   => $_POST['citizenship'],
            'voter_status'  => $_POST['voter_status'],
            'occupation'        => $_POST['occupation'],
            'address_region'    => $_POST['region'],
            'address_province'  => $_POST['province'],
            'address_city'      => $_POST['city'],
            'address_brgy'      => $_POST['brgy'],
            'address_street'    => $_POST['street'],
            'contact_no'        => $_POST['contact_no'],
            'email_address'     => $_POST['email'],
            'photo'             => $dataUri,
            'updated_by'        => $_SESSION['id']
        );

        $columns = implode(",", array_keys($arr_data));
        $values = implode("','", array_values($arr_data));

        $sql = "INSERT INTO user_profile ($columns) VALUES ('$values')";
        $result = $conn->query($sql);
        if (isset($result) == true) {
            // add user account for login here
            $lastId = $conn->lastInsertId();
            $arr_data = array(
                'email'             => $_POST['email'],
                'pass'              => '',
                'activation_code'   => '',
                'is_active'         => '0',
                'user_status'       => 'for validation',
                'user_type'         => 'USER',
                'user_profile_id'   => $lastId,
            );
            $columns = implode(",", array_keys($arr_data));
            $values = implode("','", array_values($arr_data));

            $sql = "INSERT INTO users ($columns) VALUES ('$values')";
            $result = $conn->query($sql);
            if(isset($result) == true){
                $response = array(
                    'title' => 'Success!',
                    'html' => 'User profile has been added!',
                    'icon' => 'success',
                );
            }else{
                $response = array(
                    'title' => 'Failed!',
                    'html' => 'Failed to add user profile',
                    'icon' => 'error',
                );
            }
            
        } else {
            $response = array(
                'status' => 'error',
                'title' => 'Error!',
                'html' => 'Please try again later!',
                'icon' => 'error',
            );
        }  
    }
    if($_POST['action'] == 'edit_user_profile'){
        $id = $_POST['id'];
        // Check if image file is actual file
        if( isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK ){
            //get image file
            $file = $_FILES['file']['tmp_name'];
            $imageData = file_get_contents($file);
            $base64 = base64_encode($imageData);
            $imageType = $_FILES['file']['type']; // Get the image type
            // Prepare the data URI
            $dataUri = 'data:' . $imageType . ';base64,' . $base64;

            // Create an image resource from the binary data
            $image = imagecreatefromstring($imageData);
            // Resize the image
            $resizedImage = imagescale($image, 200, 200); // Resize to 300x200 pixels
            // Encode the resized image back to Base64
            ob_start();
            imagejpeg($resizedImage);
            // imagepng($resizedImage);
            $imageBase64 = base64_encode(ob_get_contents());
            ob_end_clean();
            $dataUri = 'data:' . $imageType . ';base64,' . $imageBase64;

            $arr_data = array(
                'lname'     => addslashes($_POST['lname']),
                'fname'     => addslashes($_POST['fname']),
                'mname'     => addslashes($_POST['mname']),
                'suffix'    => addslashes($_POST['suffix']),
                'gender'    => $_POST['gender'],
                'bdate'         => $_POST['bdate'],
                'birth_place'   => $_POST['birth_place'],
                'civil_status'  => $_POST['civil_status'],
                'citizenship'   => $_POST['citizenship'],
                'voter_status'  => $_POST['voter_status'],
                'occupation'        => $_POST['occupation'],
                'address_region'    => $_POST['region'],
                'address_province'  => $_POST['province'],
                'address_city'      => $_POST['city'],
                'address_brgy'      => $_POST['brgy'],
                'address_street'    => $_POST['street'],
                'contact_no'        => $_POST['contact_no'],
                'email_address'     => $_POST['email'],
                'photo'             => $dataUri,
                'updated_by'        => $_SESSION['id']
            );
        }else{
            $arr_data = array(
                'lname'     => addslashes($_POST['lname']),
                'fname'     => addslashes($_POST['fname']),
                'mname'     => addslashes($_POST['mname']),
                'suffix'    => addslashes($_POST['suffix']),
                'gender'    => $_POST['gender'],
                'bdate'         => $_POST['bdate'],
                'birth_place'   => $_POST['birth_place'],
                'civil_status'  => $_POST['civil_status'],
                'citizenship'   => $_POST['citizenship'],
                'voter_status'  => $_POST['voter_status'],
                'occupation'        => $_POST['occupation'],
                'address_region'    => $_POST['region'],
                'address_province'  => $_POST['province'],
                'address_city'      => $_POST['city'],
                'address_brgy'      => $_POST['brgy'],
                'address_street'    => $_POST['street'],
                'contact_no'        => $_POST['contact_no'],
                'email_address'     => $_POST['email'],
                'updated_by'        => $_SESSION['id']
            );
        }

        

        $cv = 0;
        $setValues = '';
        foreach ($arr_data as $index => $arr_data) {
            $comma = ($cv > 0) ? ', ' : '';
            $setValues .= $comma . $index . " = " . "'" . $arr_data . "'";
            $cv++;
        }

        $sql = "UPDATE user_profile SET " . $setValues . " WHERE id = $id";
        $result = $conn->query($sql);
        if (isset($result) == true) {
            $response = array(
                'status' => 'ok',
                'title' => 'Success!',
                'html' => 'User Profile has been updated!',
                'icon' => 'success',
            );
        } else {
            $response = array(
                'status' => 'error',
                'title' => 'Error!',
                'html' => 'Please try again later!',
                'icon' => 'error',
            );
        }
    }
    if($_POST['action'] == 'delete_user_profile'){
        $id = $_POST['id'];
        $sql = "DELETE from user_profile WHERE id = $id";
        $result = $conn->query($sql);
        if($result){
            $response = array(
                'title' => 'Deleted!',
                'html' => 'User Profile has been deleted.',
                'icon' => 'success',
            );
        }else{
            $response = array(
                'title' => 'Failed!',
                'html' => 'Failed to delete data.',
                'icon' => 'error',
            );                
        }        
    }
    if($_POST['action'] == 'fetch_user_profile'){
        $id = $_POST['id'];
        $sql = "SELECT * FROM user_profile WHERE id = $id";
        $row = $conn->query($sql)->fetch(PDO::FETCH_ASSOC);

        if(isset($row['address_province'])){
            $sql = "SELECT * FROM refprovince WHERE regCode = ".$row['address_region'];
            $result = $conn->query($sql);
            $option = '<option value="" selected hidden disabled>Pumili ng Probinsya</option>';
            while ($address = $result->fetch(PDO::FETCH_ASSOC)) {
                $option .= '<option value="' . $address['provCode'] . '">' . $address['provDesc'] . '</option>';
            }
            $province = $option;
        }
        if(isset($row['address_city'])){
            $sql = "SELECT * FROM refcitymun WHERE provCode = ".$row['address_province'];
            $result = $conn->query($sql);
            $option = '<option value="" selected hidden disabled>Pumili ng City</option>';
            while ($address = $result->fetch(PDO::FETCH_ASSOC)) {
                $option .= '<option value="' . $address['citymunCode'] . '">' . $address['citymunDesc'] . '</option>';
            }
            $city = $option;
        }
        if(isset($row['address_brgy'])){
            $sql = "SELECT * FROM refbrgy WHERE citymunCode = ".$row['address_city'];
            $result = $conn->query($sql);
            $option = '<option value="" selected hidden disabled>Pumili ng Barangay</option>';
            while ($address = $result->fetch(PDO::FETCH_ASSOC)) {
                $option .= '<option value="' . $address['brgyCode'] . '">' . strtoupper($address['brgyDesc']) . '</option>';
            }
            $brgy = $option;
        }

        $response = array(
            'id' => $row['id'],
            'image' => $row['photo'] ? $row['photo'] : '../images/upload_image.png',
            'lname' => $row['lname'],
            'fname' => $row['fname'],
            'mname' => $row['mname'],
            'suffix' => $row['suffix'],
            'bdate' => $row['bdate'],
            'age' => floor((time() - strtotime($row['bdate'])) / (60 * 60 * 24 * 365)),
            'birth_place' => $row['birth_place'],
            'gender' => $row['gender'],
            'civil_status' => $row['civil_status'],
            'citizenship' => $row['citizenship'],
            'voter_status' => $row['voter_status'],
            'occupation' => $row['occupation'],
            'region' => $row['address_region'],
            'province' => $row['address_province'],
            'city' => $row['address_city'],
            'brgy' => $row['address_brgy'],
            'street' => $row['address_street'],
            'contact_no' => $row['contact_no'],
            'email' => $row['email_address'],
            'list_province' => $province,
            'list_city' => $city,
            'list_brgy' => $brgy,
        );
    }
    if($_POST['action'] == 'edit_user_census'){
        $id = $_POST['user_profile_id'];
        $sql = "SELECT id FROM user_census WHERE user_profile_id = $id";
        $result = $conn->query($sql);
        if($result->rowCount() > 0){
            $arr_data = [];
            foreach ($_POST as $key => $value) {
                if ($key == 'action') {
                    continue;
                }
                $arr_data[$key] = addslashes($value);
            }

            $cv = 0;
            $setValues = '';
            foreach ($arr_data as $index => $arr_data) {
                $comma = ($cv > 0) ? ', ' : '';
                $setValues .= $comma . $index . " = " . "'" . $arr_data . "'";
                $cv++;
            }

            $sql = "UPDATE user_census SET " . $setValues . " WHERE user_profile_id = $id";
            $result = $conn->query($sql);
            if (isset($result) == true) {
                $response = array(
                    'title' => 'Success!',
                    'html' => 'User Census has been updated!',
                    'icon' => 'success',
                );
            } else {
                $response = array(
                    'status' => 'error',
                    'title' => 'Error!',
                    'html' => 'Please try again later!',
                    'icon' => 'error',
                );
            }

        }else{
            $arr_data = [];
            foreach ($_POST as $key => $value) {
                if ($key == 'action') {
                    continue;
                }
                $arr_data[$key] = addslashes($value);
            }

            $columns = implode(",", array_keys($arr_data));
            $values = implode("','", array_values($arr_data));

            $sql = "INSERT INTO user_census ($columns) VALUES ('$values')";
            $result = $conn->query($sql);
            if (isset($result) == true) {
                $response = array(
                    'title' => 'Success!',
                    'html' => 'User Census has been added!',
                    'icon' => 'success',
                );
            } else {
                $response = array(
                    'status' => 'error',
                    'title' => 'Error!',
                    'html' => 'Please try again later!',
                    'icon' => 'error',
                );
            }
        }
    }
    if($_POST['action'] == 'fetch_user_census'){
        $id = $_POST['id'];
        // fetch User profile
       $sql = "SELECT *
                FROM user_profile
                LEFT JOIN user_census
                ON user_profile.id = user_census.user_profile_id
                WHERE user_profile.id = $id";
        // $sql = "SELECT * FROM user_profile WHERE id = $id";
        $row = $conn->query($sql)->fetch(PDO::FETCH_ASSOC);

        if (isset($row['address_region'])) {
            $sql = "SELECT * FROM refregion WHERE regCode = " . $row['address_region'];
            $result = $conn->query($sql);
            $address = $result->fetch(PDO::FETCH_ASSOC);
            $region = $address['regDesc'];
        }
        if (isset($row['address_province'])) {
            $sql = "SELECT * FROM refprovince WHERE provCode = " . $row['address_province'];
            $result = $conn->query($sql);
            $address = $result->fetch(PDO::FETCH_ASSOC);
            $province = $address['provDesc'];
        }
        if (isset($row['address_city'])) {
            $sql = "SELECT * FROM refcitymun WHERE citymunCode = " . $row['address_city'];
            $result = $conn->query($sql);
            $address = $result->fetch(PDO::FETCH_ASSOC);
            $city = $address['citymunDesc'];
        }
        if (isset($row['address_brgy'])) {
            $sql = "SELECT * FROM refbrgy WHERE brgyCode = " . $row['address_brgy'];
            $result = $conn->query($sql);
            $address = $result->fetch(PDO::FETCH_ASSOC);
            $brgy = $address['brgyDesc'];
        }

        $lname = $row['lname'] ? $row['lname'].' ' : '';
        $fname = $row['fname'] ? $row['fname'].' ' : '';
        $mname = $row['mname'] ? $row['mname'][0].'. ' : '';
        $suffix = $row['suffix'] ? $row['suffix'] : '';
        
        $response = array(
            'image'         => $row['photo'] ? $row['photo'] : '../images/upload_image.png',
            'fullname'      => $fname . $mname . $lname . $suffix,
            'gender'        => $row['gender'],
            'bdate'         => $row['bdate'],
            'civil_status'  => $row['civil_status'],
            'citizenship'   => $row['citizenship'],
            'voter_status'  => $row['voter_status'],
            'contact_no'    => $row['contact_no'],
            'email'         => $row['email_address'],
            'birth_place'   => $row['birth_place'],
            'address'       => $row['address_street'] . ', ' . $brgy . ' ' . $city . ', ' . $province,

            'provincial_address'                => $row['provincial_address'],
            'household_type'                    => $row['household_type'],
            'member_count'                      => $row['member_count'],
            'educational_attainment'            => $row['educational_attainment'],
            'employment_status'                 => $row['employment_status'],
            'is_philhealth'                     => $row['is_philhealth'],
            'is_covid_vacinated'                => $row['is_covid_vacinated'],
            'is_pwd'                            => $row['is_pwd'],
            'with_pwd_id'                       => $row['with_pwd_id'],
            'disability_type'                   => $row['disability_type'],
            'is_solo_parent'                    => $row['is_solo_parent'],
            'solo_parent_reason'                => $row['solo_parent_reason'],
            'with_solo_parent_id'               => $row['with_solo_parent_id'],
            'child_vaccine_completed'           => $row['child_vaccine_completed'],
            'immunization_card_img'             => $row['immunization_card_img'],
            'child_vaccine_location'            => $row['child_vaccine_location'],
            'below_17_napurga'                  => $row['below_17_napurga'],
            'when_napurga'                      => $row['when_napurga'],
            'where_napurga'                     => $row['where_napurga'],
            'is_breast_feeding_below_sixmonths' => $row['is_breast_feeding_below_sixmonths'],
            'is_pregnant'                       => $row['is_pregnant'],
            'last_period'                       => $row['last_period'],
            'due_date_birth'                    => $row['due_date_birth'],
            'is_prenatal_checkup'               => $row['is_prenatal_checkup'],
            'where_prenatal'                    => $row['where_prenatal'],
            'is_breastfeeding'                  => $row['is_breastfeeding'],
            'month_of_child_breastfeed'         => $row['month_of_child_breastfeed'],
            'use_contraceptives'                => $row['use_contraceptives'],
            'what_contraceptive'                => $row['what_contraceptive'],
            'where_contraceptive'               => $row['where_contraceptive'],
            'house_type'                        => $row['house_type'],
            'business_type'                     => $row['business_type'],
            'house_materials'                   => $row['house_materials'],
            'years_stay_manila'                 => $row['years_stay_manila'],
            'months_stay_manila'                => $row['months_stay_manila'],
            'residential_status'                => $row['residential_status'],
            'water_source'                      => $row['water_source'],
            'palikuran'                         => $row['palikuran'],

        );
      
    }

/** CERTIFICATES */
    if($_POST['action'] == 'create_request_certificate') {

        switch ($_POST['purpose']) {
            case 'Others':
                $purpose = $_POST['purpose'] . ' : ' . $_POST['specify'];
                break;
            case 'Proof for Barangay Residency';
                $purpose = $_POST['purpose'] . ' | Years : ' . $_POST['years'];
                break;
            case 'Living Together Certification';
                $purpose = 'Kinakasama : '.$_POST['kinakasama'].' | Years : '.$_POST['years'];
                break;
            default:
                $purpose = $_POST['purpose'];
                break;
        }

        $arr_data = array(
            'email'             => $user['email'],
            'cert_type'         => $_POST['cert_type'],
            'cert_purpose'      => $purpose,
            'request_status'    => 'Pending',
            'remarks'           => 'New request',
        );

        $columns = implode(",", array_keys($arr_data));
        $values = implode("','", array_values($arr_data));

        $sql = "INSERT INTO certificates ($columns) VALUES ('$values')";
        $result = $conn->query($sql);
        if (isset($result) == true) {
            $response = array(
                'title' => 'Success!',
                'html' => 'Request certificate has been added!',
                'icon' => 'success',
            );
        } else {
            $response = array(
                'title' => 'Error!',
                'html' => 'Please try again later!',
                'icon' => 'error',
            );
        }
    }
    if($_POST['action'] == 'edit_request_certificate') {
        $id = $_POST['id'];
        $arr_data = array(
            'email'             => addslashes($_POST['lname']),
            'pass'              => $_POST['pass'],
            'activation_code'   => '',
            'is_active'         => 0,
            'user_status'       => 'account edited',
            'user_type'         => $_POST['user_type'],
        );

        $cv = 0;
        $setValues = '';
        foreach ($arr_data as $index => $arr_data) {
            $comma = ($cv > 0) ? ', ' : '';
            $setValues .= $comma . $index . " = " . "'" . $arr_data . "'";
            $cv++;
        }

        $sql = "UPDATE certificates SET " . $setValues . " WHERE id = $id";
        $result = $conn->query($sql);
        if (isset($result) == true) {
            $response = array(
                'status' => 'ok',
                'title' => 'Success!',
                'html' => 'Account has been updated!',
                'icon' => 'success',
            );
        } else {
            $response = array(
                'status' => 'error',
                'title' => 'Error!',
                'html' => 'Please try again later!',
                'icon' => 'error',
            );
        }
    }
    if($_POST['action'] == 'delete_request_certificate') {
        $id = $_POST['id'];
        $sql = "DELETE from certificates WHERE id = $id";
        $result = $conn->query($sql);
        if ($result) {
            $response = array(
                'title' => 'Deleted!',
                'html' => 'Request certificate has been deleted.',
                'icon' => 'success',
            );
        } else {
            $response = array(
                'title' => 'Failed!',
                'html' => 'Failed to delete data.',
                'icon' => 'error',
            );
        }
    }
    if($_POST['action'] == 'process_request_certificate') {
        $id = $_POST['id'];
        $status = $_POST['status'];

        switch ($status) {
            case 'Pending':
                $request_status = 'Processing';
                $remarks = 'Process on going';
                $html = 'Request is now on processing';
                break;
            case 'Processing':
                $request_status = 'Pending';
                $remarks = 'Returned to pending';
                $html = 'Request returned to pending status';
                break;
            
            default:
                # code...
                break;
        }
        $arr_data = array(
            'request_status'    => $request_status,
            'remarks'           => $remarks,
            'updated_at'        => $updated_at,
        );

        $cv = 0;
        $setValues = '';
        foreach ($arr_data as $index => $arr_data) {
            $comma = ($cv > 0) ? ', ' : '';
            $setValues .= $comma . $index . " = " . "'" . $arr_data . "'";
            $cv++;
        }

        $sql = "UPDATE certificates SET " . $setValues . " WHERE id = $id";
        $result = $conn->query($sql);
        if (isset($result) == true) {
            $response = array(
                'title' => 'Success!',
                'html' => $html,
                'icon' => 'success',
            );
        } else {
            $response = array(
                'title' => 'Error!',
                'html' => 'Please try again later!',
                'icon' => 'error',
            );
        }
    }
    if($_POST['action'] == 'decline_request_certificate') {
        $id = $_POST['id'];

        $remarks = $_POST['remarks'];

        $arr_data = array(
            'request_status'    => 'Declined',
            'remarks'           => $remarks,
            'updated_at'        => $updated_at,
        );

        $cv = 0;
        $setValues = '';
        foreach ($arr_data as $index => $arr_data) {
            $comma = ($cv > 0) ? ', ' : '';
            $setValues .= $comma . $index . " = " . "'" . $arr_data . "'";
            $cv++;
        }

        $sql = "UPDATE certificates SET " . $setValues . " WHERE id = $id";
        $result = $conn->query($sql);
        if (isset($result) == true) {
            $response = array(
                'title' => 'Declined!',
                'html' => 'Certificate request has been declined!',
                'icon' => 'success',
            );
        } else {
            $response = array(
                'title' => 'Error!',
                'html' => 'Please try again later!',
                'icon' => 'error',
            );
        }
    }
    if($_POST['action'] == 'undo_request_certificate') {
        $id = $_POST['id'];

        $arr_data = array(
            'request_status'    => 'Pending',
            'remarks'           => 'Decline revert to pending',
            'updated_at'        => $updated_at,
        );

        $cv = 0;
        $setValues = '';
        foreach ($arr_data as $index => $arr_data) {
            $comma = ($cv > 0) ? ', ' : '';
            $setValues .= $comma . $index . " = " . "'" . $arr_data . "'";
            $cv++;
        }

        $sql = "UPDATE certificates SET " . $setValues . " WHERE id = $id";
        $result = $conn->query($sql);
        if (isset($result) == true) {
            $response = array(
                'title' => 'Success!',
                'html' => 'Certificate request has been revert to <b>PENDING</b> status!',
                'icon' => 'success',
            );
        } else {
            $response = array(
                'title' => 'Error!',
                'html' => 'Please try again later!',
                'icon' => 'error',
            );
        }
    }
    if($_POST['action'] == 'approve_request_certificate') {
        $id = $_POST['id'];
        $date = $_POST['date'];
        $email = $_POST['email'];
        //Fetch email notifications
        $sql = "SELECT * FROM email_notification WHERE notification_for = 'Certificate Request'";
        $result = $conn->query($sql);
        if ($result->rowCount() > 0) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $email_subject = $row['subject_title'];
            $email_message = $row['message_content'];

            $arr_data = array(
                'request_status'    => 'For Claim',
                'remarks'           => 'Claming Date : ' . $date,
                'claiming_date'     => $date,
                'updated_at'        => $updated_at,
            );

            $cv = 0;
            $setValues = '';
            foreach ($arr_data as $index => $arr_data) {
                $comma = ($cv > 0) ? ', ' : '';
                $setValues .= $comma . $index . " = " . "'" . $arr_data . "'";
                $cv++;
            }

            $sql = "UPDATE certificates SET " . $setValues . " WHERE id = $id";
            $result = $conn->query($sql);
            if (isset($result) == true) {

                $subject = 'Barangay Certificate Request - Approved!';
                $message = '<h4>' . $email_subject . '</h4>
                        <p>' . $email_message . '</p>
                        <p>Claiming Date : ' . $date . '</p>';
                sendEmail($email, $subject, $message);

                $response = array(
                    'title' => 'Approved!',
                    'html' => 'Email notification sent. Claming date is on <b>' . $date . '</b>',
                    'icon' => 'success',
                );
            } else {
                $response = array(
                    'title' => 'Error!',
                    'html' => 'Please try again later!',
                    'icon' => 'error',
                );
            }            

        } else {
            $response = array(
                'title' => 'Create email notification',
                'html' => 'Please setup email notification first!',
                'icon' => 'info',
            );
        }       
    }
    if($_POST['action'] == 'claim_request_certificate') {
        $id = $_POST['id'];
        $email = $_POST['email'];

        $arr_data = array(
            'request_status'    => 'Completed',
            'remarks'           => 'Successfully claimed!',
            'updated_at'        => $updated_at,
        );

        $cv = 0;
        $setValues = '';
        foreach ($arr_data as $index => $arr_data) {
            $comma = ($cv > 0) ? ', ' : '';
            $setValues .= $comma . $index . " = " . "'" . $arr_data . "'";
            $cv++;
        }

        $sql = "UPDATE certificates SET " . $setValues . " WHERE id = $id";
        $result = $conn->query($sql);
        if (isset($result) == true) {

            // ADD EMAIL NOTIFICATION AUTOMAILER HERE
            $subject = 'Barangay Certificate Request - Completed!';
            $message = 'Your certificate request has been claimed on <b>'. $updated_at .'</b>';
            sendEmail($email, $subject, $message);
            
            $response = array(
                'title' => 'Success!',
                'html' => 'Transaction request has been complete!',
                'icon' => 'success',
            );
        } else {
            $response = array(
                'title' => 'Error!',
                'html' => 'Please try again later!',
                'icon' => 'error',
            );
        }
    }
/** BARANGAY ID */
    if ($_POST['action'] == 'create_request_barangay_id') {
        // Check if image file is actual file
        if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
            //get image file
            $file = $_FILES['file']['tmp_name'];
            $imageData = file_get_contents($file);
            $base64 = base64_encode($imageData);
            $imageType = $_FILES['file']['type']; // Get the image type
            // Prepare the data URI
            $dataUri = 'data:' . $imageType . ';base64,' . $base64;

            // Create an image resource from the binary data
            $image = imagecreatefromstring($imageData);
            // Resize the image
            $resizedImage = imagescale($image, 200, 200); // Resize to 300x200 pixels
            // Encode the resized image back to Base64
            ob_start();

            switch ($imageType) {
                case 'image/png':
                    imagepng($resizedImage);
                    break;

                default:
                    imagejpeg($resizedImage);
                    break;
            }

            $imageBase64 = base64_encode(ob_get_contents());
            ob_end_clean();
            $dataUri = 'data:' . $imageType . ';base64,' . $imageBase64;
        } else {
            $dataUri = '';
        }

        $fullname = $_POST['lname'] ? $_POST['lname'] . ', ' : '';
        $fullname .= $_POST['fname'] ? $_POST['fname'] . ' ' : '';
        $fullname .= $_POST['mname'] ? ' ' . substr($_POST['mname'], 0, 1) . '. ' : '';
        $fullname .= $_POST['suffix'] ? $_POST['suffix'] : '';

        $arr_data = array(
            'photo'             => $dataUri,
            'id_no'             => rand(000, 999).'-'.date('Y'),
            'brgy_id'           => $_POST['brgy_id'],
            'email'             => $user['email'],
            'fullname'          => $fullname,
            'bdate'             => $_POST['bdate'],
            'emergency_person'  => $_POST['emergency_person'],
            'emergency_contact' => $_POST['emergency_contact'],
            'emergency_relationship'    => $_POST['emergency_relationship'],
            'emergency_address' => $_POST['emergency_address'],
            'request_status'    => 'Pending',                    
        );

        $columns = implode(",", array_keys($arr_data));
        $values = implode("','", array_values($arr_data));

        $sql = "INSERT INTO barangay_id ($columns) VALUES ('$values')";
        $result = $conn->query($sql);
        if (isset($result) == true) {
            $response = array(
                'title' => 'Success!',
                'html' => 'Data has been added!',
                'icon' => 'success',
            );
        } else {
            $response = array(
                'title' => 'Error!',
                'html' => 'Please try again later!',
                'icon' => 'error',
            );
        }
    }
    if ($_POST['action'] == 'edit_request_barangay_id') {
        $id = $_POST['id'];
        // Check if image file is actual file
        if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
            //get image file
            $file = $_FILES['file']['tmp_name'];
            $imageData = file_get_contents($file);
            $base64 = base64_encode($imageData);
            $imageType = $_FILES['file']['type']; // Get the image type
            // Prepare the data URI
            $dataUri = 'data:' . $imageType . ';base64,' . $base64;

            // Create an image resource from the binary data
            $image = imagecreatefromstring($imageData);
            // Resize the image
            $resizedImage = imagescale($image, 200, 200); // Resize to 300x200 pixels
            // Encode the resized image back to Base64
            ob_start();
            imagejpeg($resizedImage);
            // imagepng($resizedImage);
            $imageBase64 = base64_encode(ob_get_contents());
            ob_end_clean();
            $dataUri = 'data:' . $imageType . ';base64,' . $imageBase64;

            $arr_data = array(
                'lname'     => addslashes($_POST['lname']),
                'fname'     => addslashes($_POST['fname']),
                'mname'     => addslashes($_POST['mname']),
                'suffix'    => addslashes($_POST['suffix']),
                'gender'    => $_POST['gender'],
                'bdate'         => $_POST['bdate'],
                'birth_place'   => $_POST['birth_place'],
                'civil_status'  => $_POST['civil_status'],
                'citizenship'   => $_POST['citizenship'],
                'voter_status'  => $_POST['voter_status'],
                'occupation'        => $_POST['occupation'],
                'address_region'    => $_POST['region'],
                'address_province'  => $_POST['province'],
                'address_city'      => $_POST['city'],
                'address_brgy'      => $_POST['brgy'],
                'address_street'    => $_POST['street'],
                'contact_no'        => $_POST['contact_no'],
                'email_address'     => $_POST['email'],
                'photo'             => $dataUri,
                'updated_by'        => $_SESSION['id']
            );
        } else {
            $arr_data = array(
                'lname'     => addslashes($_POST['lname']),
                'fname'     => addslashes($_POST['fname']),
                'mname'     => addslashes($_POST['mname']),
                'suffix'    => addslashes($_POST['suffix']),
                'gender'    => $_POST['gender'],
                'bdate'         => $_POST['bdate'],
                'birth_place'   => $_POST['birth_place'],
                'civil_status'  => $_POST['civil_status'],
                'citizenship'   => $_POST['citizenship'],
                'voter_status'  => $_POST['voter_status'],
                'occupation'        => $_POST['occupation'],
                'address_region'    => $_POST['region'],
                'address_province'  => $_POST['province'],
                'address_city'      => $_POST['city'],
                'address_brgy'      => $_POST['brgy'],
                'address_street'    => $_POST['street'],
                'contact_no'        => $_POST['contact_no'],
                'email_address'     => $_POST['email'],
                'updated_by'        => $_SESSION['id']
            );
        }



        $cv = 0;
        $setValues = '';
        foreach ($arr_data as $index => $arr_data) {
            $comma = ($cv > 0) ? ', ' : '';
            $setValues .= $comma . $index . " = " . "'" . $arr_data . "'";
            $cv++;
        }

        $sql = "UPDATE user_profile SET " . $setValues . " WHERE id = $id";
        $result = $conn->query($sql);
        if (isset($result) == true) {
            $response = array(
                'status' => 'ok',
                'title' => 'Success!',
                'html' => 'User Profile has been updated!',
                'icon' => 'success',
            );
        } else {
            $response = array(
                'status' => 'error',
                'title' => 'Error!',
                'html' => 'Please try again later!',
                'icon' => 'error',
            );
        }
    }
    if ($_POST['action'] == 'delete_request_barangay_id') {
        $id = $_POST['id'];
        $sql = "DELETE from user_profile WHERE id = $id";
        $result = $conn->query($sql);
        if ($result) {
            $response = array(
                'title' => 'Deleted!',
                'html' => 'User Profile has been deleted.',
                'icon' => 'success',
            );
        } else {
            $response = array(
                'title' => 'Failed!',
                'html' => 'Failed to delete data.',
                'icon' => 'error',
            );
        }
    }
    if ($_POST['action'] == 'fetch_request_barangay_id') {
        $id = $_POST['id'];
        $sql = "SELECT * FROM user_profile WHERE id = $id";
        $row = $conn->query($sql)->fetch(PDO::FETCH_ASSOC);

        if (isset($row['address_province'])) {
            $sql = "SELECT * FROM refprovince WHERE regCode = " . $row['address_region'];
            $result = $conn->query($sql);
            $option = '<option value="" selected hidden disabled>Pumili ng Probinsya</option>';
            while ($address = $result->fetch(PDO::FETCH_ASSOC)) {
                $option .= '<option value="' . $address['provCode'] . '">' . $address['provDesc'] . '</option>';
            }
            $province = $option;
        }
        if (isset($row['address_city'])) {
            $sql = "SELECT * FROM refcitymun WHERE provCode = " . $row['address_province'];
            $result = $conn->query($sql);
            $option = '<option value="" selected hidden disabled>Pumili ng City</option>';
            while ($address = $result->fetch(PDO::FETCH_ASSOC)) {
                $option .= '<option value="' . $address['citymunCode'] . '">' . $address['citymunDesc'] . '</option>';
            }
            $city = $option;
        }
        if (isset($row['address_brgy'])) {
            $sql = "SELECT * FROM refbrgy WHERE citymunCode = " . $row['address_city'];
            $result = $conn->query($sql);
            $option = '<option value="" selected hidden disabled>Pumili ng Barangay</option>';
            while ($address = $result->fetch(PDO::FETCH_ASSOC)) {
                $option .= '<option value="' . $address['brgyCode'] . '">' . strtoupper($address['brgyDesc']) . '</option>';
            }
            $brgy = $option;
        }

        $response = array(
            'id' => $row['id'],
            'image' => $row['photo'] ? $row['photo'] : '../images/upload_image.png',
            'lname' => $row['lname'],
            'fname' => $row['fname'],
            'mname' => $row['mname'],
            'suffix' => $row['suffix'],
            'bdate' => $row['bdate'],
            'age' => floor((time() - strtotime($row['bdate'])) / (60 * 60 * 24 * 365)),
            'birth_place' => $row['birth_place'],
            'gender' => $row['gender'],
            'civil_status' => $row['civil_status'],
            'citizenship' => $row['citizenship'],
            'voter_status' => $row['voter_status'],
            'occupation' => $row['occupation'],
            'region' => $row['address_region'],
            'province' => $row['address_province'],
            'city' => $row['address_city'],
            'brgy' => $row['address_brgy'],
            'street' => $row['address_street'],
            'contact_no' => $row['contact_no'],
            'email' => $row['email_address'],

            'list_province' => $province,
            'list_city' => $city,
            'list_brgy' => $brgy,
        );
    }
    if ($_POST['action'] == 'process_request_barangay_id') {
        $id = $_POST['id'];
        $status = $_POST['status'];

        switch ($status) {
            case 'Pending':
                $request_status = 'Processing';
                $remarks = 'Process on going';
                $html = 'Request is now on processing';
                break;
            case 'Processing':
                $request_status = 'Pending';
                $remarks = 'Returned to pending';
                $html = 'Request returned to pending status';
                break;

            default:
                # code...
                break;
        }
        $arr_data = array(
            'request_status'    => $request_status,
            'remarks'           => $remarks,
            'updated_at'        => $updated_at,
        );

        $cv = 0;
        $setValues = '';
        foreach ($arr_data as $index => $arr_data) {
            $comma = ($cv > 0) ? ', ' : '';
            $setValues .= $comma . $index . " = " . "'" . $arr_data . "'";
            $cv++;
        }

        $sql = "UPDATE barangay_id SET " . $setValues . " WHERE id = $id";
        $result = $conn->query($sql);
        if (isset($result) == true) {
            $response = array(
                'title' => 'Success!',
                'html' => $html,
                'icon' => 'success',
            );
        } else {
            $response = array(
                'title' => 'Error!',
                'html' => 'Please try again later!',
                'icon' => 'error',
            );
        }
    }
    if ($_POST['action'] == 'decline_request_barangay_id') {
        $id = $_POST['id'];
        $remarks = $_POST['remarks'];

        $arr_data = array(
            'request_status'    => 'Declined',
            'remarks'           => $remarks,
            'updated_at'        => $updated_at,
        );

        $cv = 0;
        $setValues = '';
        foreach ($arr_data as $index => $arr_data) {
            $comma = ($cv > 0) ? ', ' : '';
            $setValues .= $comma . $index . " = " . "'" . $arr_data . "'";
            $cv++;
        }

        $sql = "UPDATE barangay_id SET " . $setValues . " WHERE id = $id";
        $result = $conn->query($sql);
        if (isset($result) == true) {
            $response = array(
                'title' => 'Declined!',
                'html' => 'Barangay ID request has been declined!',
                'icon' => 'success',
            );
        } else {
            $response = array(
                'title' => 'Error!',
                'html' => 'Please try again later!',
                'icon' => 'error',
            );
        }
    }
    if ($_POST['action'] == 'undo_request_barangay_id') {
        $id = $_POST['id'];

        $arr_data = array(
            'request_status'    => 'Pending',
            'remarks'           => 'Decline revert to pending',
            'updated_at'        => $updated_at,
        );

        $cv = 0;
        $setValues = '';
        foreach ($arr_data as $index => $arr_data) {
            $comma = ($cv > 0) ? ', ' : '';
            $setValues .= $comma . $index . " = " . "'" . $arr_data . "'";
            $cv++;
        }

        $sql = "UPDATE barangay_id SET " . $setValues . " WHERE id = $id";
        $result = $conn->query($sql);
        if (isset($result) == true) {
            $response = array(
                'title' => 'Success!',
                'html' => 'Barangay ID request has been revert to <b>PENDING</b> status!',
                'icon' => 'success',
            );
        } else {
            $response = array(
                'title' => 'Error!',
                'html' => 'Please try again later!',
                'icon' => 'error',
            );
        }
    }
    if ($_POST['action'] == 'approve_request_barangay_id') {
        $id = $_POST['id'];
        $date = $_POST['date'];
        $email = $_POST['email'];

        $sql = "SELECT * FROM email_notification WHERE notification_for = 'Barangay ID Request'";
        $result = $conn->query($sql);
        if($result->rowCount() > 0){
            $row = $result->fetch(PDO::FETCH_ASSOC);

            $email_subject = $row['subject_title'];
            $email_message = $row['message_content'];

            $arr_data = array(
                'request_status'    => 'For Claim',
                'remarks'           => 'Claming Date : ' . $date,
                'claiming_date'     => $date,
                'updated_at'        => $updated_at,
            );

            $cv = 0;
            $setValues = '';
            foreach ($arr_data as $index => $arr_data) {
                $comma = ($cv > 0) ? ', ' : '';
                $setValues .= $comma . $index . " = " . "'" . $arr_data . "'";
                $cv++;
            }

            $sql = "UPDATE barangay_id SET " . $setValues . " WHERE id = $id";
            $result = $conn->query($sql);
            if (isset($result) == true) {

                $subject = 'Barangay ID Request - Approved!';
                $message = '<h4>' . $email_subject . '</h4>
                        <p>' . $email_message . '</p>
                        <p>Claiming Date : ' . $date . '</p>';

                sendEmail($email, $subject, $message);
                $response = array(
                    'title' => 'Approved!',
                    'html' => 'Email notification sent. Claming date is on <b>' . $date . '</b>',
                    'icon' => 'success',
                );
            } else {
                $response = array(
                    'title' => 'Error!',
                    'html' => 'Please try again later!',
                    'icon' => 'error',
                );
            }
        }else{
            $response = array(
                'title' => 'Create email notification',
                'html' => 'Please setup email notification first!',
                'icon' => 'info',
            );
        }

       
    }
    if ($_POST['action'] == 'claim_request_barangay_id') {
        $id = $_POST['id'];
        $email = $_POST['email'];
        // Cmpute 3 months from now
        // Get the current date
        $currentDate = new DateTime();
        // Add 3 months to the current date
        $currentDate->modify('+3 months');
        // Format the date to a readable format
        $expiration_date = $currentDate->format('Y-m-d');
        $arr_data = array(
            'request_status'    => 'Completed',
            'expiration_date'   => $expiration_date,
            'remarks'           => 'Successfully claimed!',
            'updated_at'        => $updated_at,
        );

        $cv = 0;
        $setValues = '';
        foreach ($arr_data as $index => $arr_data) {
            $comma = ($cv > 0) ? ', ' : '';
            $setValues .= $comma . $index . " = " . "'" . $arr_data . "'";
            $cv++;
        }

        $sql = "UPDATE barangay_id SET " . $setValues . " WHERE id = $id";
        $result = $conn->query($sql);
        if (isset($result) == true) {

            // ADD EMAIL NOTIFICATION AUTOMAILER HERE
            $email = 'oraclebasicsystem@gmail.com';
            $subject = 'Barangay ID Request - Completed!';
            $message = 'Your Barangay ID request has been claimed on <b>' . $updated_at . '</b>';
            sendEmail($email, $subject, $message);

            $response = array(
                'title' => 'Success!',
                'html' => 'Transaction request has been complete!',
                'icon' => 'success',
            );
        } else {
            $response = array(
                'title' => 'Error!',
                'html' => 'Please try again later!',
                'icon' => 'error',
            );
        }
    }
/** INVENTORY */
    if($_POST['action'] == 'create_inventory_item') {
        // Check if image file is actual file
        if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
            //get image file
            $file = $_FILES['file']['tmp_name'];
            $imageData = file_get_contents($file);
            $base64 = base64_encode($imageData);
            $imageType = $_FILES['file']['type']; // Get the image type
            // Prepare the data URI
            $dataUri = 'data:' . $imageType . ';base64,' . $base64;

            // Create an image resource from the binary data
            $image = imagecreatefromstring($imageData);
            // Resize the image
            $resizedImage = imagescale($image, 200, 200); // Resize to 300x200 pixels
            // Encode the resized image back to Base64
            ob_start();

            switch ($imageType) {
                case 'image/png':
                    imagepng($resizedImage);
                    break;

                default:
                    imagejpeg($resizedImage);
                    break;
            }

            $imageBase64 = base64_encode(ob_get_contents());
            ob_end_clean();
            $dataUri = 'data:' . $imageType . ';base64,' . $imageBase64;
        } else {
            $dataUri = '';
        }

        $arr_data = array(
            'control_no'        => rand(1000, 9999) . date('y'),
            'category'          => $_POST['category'],
            'photo'             => $dataUri,
            'item_name'         => $_POST['item_name'],
            'details'           => '',
            'descriptions'      => $_POST['desc'],
            'quantity'          => $_POST['qty'],
            'item_status'       => 1, // 0 = Unavailable, 1 = Available, 2 = Borrowed, 3 = Damaged, 4 = Lost
        );

        $columns = implode(",", array_keys($arr_data));
        $values = implode("','", array_values($arr_data));

        $sql = "INSERT INTO equipments ($columns) VALUES ('$values')";
        $result = $conn->query($sql);
        if (isset($result) == true) {
            $response = array(
                'title' => 'Success!',
                'html' => 'Item has been added!',
                'icon' => 'success',
            );
        } else {
            $response = array(
                'title' => 'Error!',
                'html' => 'Please try again later!',
                'icon' => 'error',
            );
        }
    }
    if($_POST['action'] == 'edit_inventory_item') {
        $id = $_POST['id'];
        // Check if image file is actual file
        if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
            //get image file
            $file = $_FILES['file']['tmp_name'];
            $imageData = file_get_contents($file);
            $base64 = base64_encode($imageData);
            $imageType = $_FILES['file']['type']; // Get the image type
            // Prepare the data URI
            $dataUri = 'data:' . $imageType . ';base64,' . $base64;

            // Create an image resource from the binary data
            $image = imagecreatefromstring($imageData);
            // Resize the image
            $resizedImage = imagescale($image, 200, 200); // Resize to 300x200 pixels
            // Encode the resized image back to Base64
            ob_start();
            imagejpeg($resizedImage);
            // imagepng($resizedImage);
            $imageBase64 = base64_encode(ob_get_contents());
            ob_end_clean();
            $dataUri = 'data:' . $imageType . ';base64,' . $imageBase64;

            $arr_data = array(
                'category'          => $_POST['category'],
                'photo'             => $dataUri,
                'item_name'         => $_POST['item_name'],
                'descriptions'      => $_POST['desc'],
                'quantity'          => $_POST['qty'],
                'item_status'       => $_POST['item_status'],
                'updated_at'        => $updated_at,
            );
        } else {
            $arr_data = array(
                'category'          => $_POST['category'],
                'item_name'         => $_POST['item_name'],
                'descriptions'      => $_POST['desc'],
                'item_status'       => $_POST['item_status'],
                'quantity'          => $_POST['qty'],
                'updated_at'        => $updated_at,
            );
        }

        $cv = 0;
        $setValues = '';
        foreach ($arr_data as $index => $arr_data) {
            $comma = ($cv > 0) ? ', ' : '';
            $setValues .= $comma . $index . " = " . "'" . $arr_data . "'";
            $cv++;
        }

        $sql = "UPDATE equipments SET " . $setValues . " WHERE id = $id";
        $result = $conn->query($sql);
        if(isset($result) == true){
            $response = array(
                'title' => 'Success!',
                'html' => 'Item has been updated!',
                'icon' => 'success',
            );

        }else{
            $response = array(
                'title' => 'Error!',
                'html' => 'Please try again later!',
                'icon' => 'error',
            );
        }
    }
    if($_POST['action'] == 'delete_inventory_item') {
        $id = $_POST['id'];
        $sql = "DELETE from equipments WHERE id = $id";
        $result = $conn->query($sql);
        if ($result) {
            $response = array(
                'title' => 'Deleted!',
                'html' => 'User Inventory item has been deleted.',
                'icon' => 'success',
            );
        } else {
            $response = array(
                'title' => 'Failed!',
                'html' => 'Failed to delete data.',
                'icon' => 'error',
            );
        }
    }
    if($_POST['action'] == 'fetch_inventory_item') {
        $tbl = 'equipments';
        $id = $_POST['id'];
        $sql = "SELECT * FROM $tbl WHERE id = $id";
        $result = $conn->query($sql);
        if ($result->rowCount() > 0) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $response = array(
                'id'            => $row['id'],
                'category'      => $row['category'],
                'item_name'     => $row['item_name'],
                'desc'          => addslashes($row['descriptions']),
                'qty'           => $row['quantity'],
                'item_status'   => $row['item_status'],
                'photo'         => $row['photo'],
            );
        }
    }
/** OFFICIALS */
    if ($_POST['action'] == 'create_official') {

        $sql = "SELECT positions.max_count, COUNT(officials.id) AS count_officials
                FROM positions
                LEFT JOIN officials ON officials.position_id = positions.id
                WHERE positions.id= ". $_POST['position_id'];
        $result = $conn->query($sql);
        $count = $result->fetch(PDO::FETCH_ASSOC);
        if($count['count_officials'] < $count['max_count']){
            
            $arr_data = array(
                'fullname'      => addslashes($_POST['fullname']),
                'position_id'   => $_POST['position_id'],
            );

            $columns = implode(",", array_keys($arr_data));
            $values = implode("','", array_values($arr_data));

            $sql = "INSERT INTO officials ($columns) VALUES ('$values')";
            $result = $conn->query($sql);
            if (isset($result) == true) {
                $response = array(
                    'title' => 'Success!',
                    'html' => 'Data has been added!',
                    'icon' => 'success',
                );
            } else {
                $response = array(
                    'title' => 'Error!',
                    'html' => 'Please try again later!',
                    'icon' => 'error',
                );
            }

        }else{
            $response = array(
                'title' => 'Failed!',
                'html' => 'New Official cannot be added. Position members is already full.',
                'icon' => 'warning',
            );
        }


    }
    if ($_POST['action'] == 'create_position') {

        $arr_data = array(
            'position_name'     => addslashes($_POST['position_name']),
            'max_count'         => $_POST['max_count'],
            'level_priority'    => $_POST['level_priority'],
        );

        $columns = implode(",", array_keys($arr_data));
        $values = implode("','", array_values($arr_data));

        $sql = "INSERT INTO positions ($columns) VALUES ('$values')";
        $result = $conn->query($sql);
        if (isset($result) == true) {
            $response = array(
                'title' => 'Success!',
                'html' => 'Data has been added!',
                'icon' => 'success',
            );
        } else {
            $response = array(
                'title' => 'Error!',
                'html' => 'Please try again later!',
                'icon' => 'error',
            );
        }
    }
    if ($_POST['action'] == 'edit_official') {

        $id = $_POST['id'];
        $arr_data = array(
            'fullname'      => addslashes($_POST['fullname']),
            'position_id'   => $_POST['position_id'],
        );

        $cv = 0;
        $setValues = '';
        foreach ($arr_data as $index => $arr_data) {
            $comma = ($cv > 0) ? ', ' : '';
            $setValues .= $comma . $index . " = " . "'" . $arr_data . "'";
            $cv++;
        }

        $sql = "UPDATE officials SET " . $setValues . " WHERE id = $id";
        $result = $conn->query($sql);
        if (isset($result) == true) {
            $response = array(
                'title' => 'Success!',
                'html' => 'Data has been updated!',
                'icon' => 'success',
            );
        } else {
            $response = array(
                'title' => 'Error!',
                'html' => 'Please try again later!',
                'icon' => 'error',
            );
        }
    }
    if ($_POST['action'] == 'edit_position') {

        $id = $_POST['id'];
        $arr_data = array(
            'position_name'     => addslashes($_POST['position_name']),
            'max_count'         => $_POST['max_count'],
            'level_priority'    => $_POST['level_priority']
        );

        $cv = 0;
        $setValues = '';
        foreach ($arr_data as $index => $arr_data) {
            $comma = ($cv > 0) ? ', ' : '';
            $setValues .= $comma . $index . " = " . "'" . $arr_data . "'";
            $cv++;
        }

        $sql = "UPDATE positions SET " . $setValues . " WHERE id = $id";
        $result = $conn->query($sql);
        if (isset($result) == true) {
            $response = array(
                'title' => 'Success!',
                'html' => 'Data has been updated!',
                'icon' => 'success',
            );
        } else {
            $response = array(
                'title' => 'Error!',
                'html' => 'Please try again later!',
                'icon' => 'error',
            );
        }
    }
    if ($_POST['action'] == 'delete_official') {
        $id = $_POST['id'];
        $sql = "DELETE from officials WHERE id = $id";
        $result = $conn->query($sql);
        if ($result) {
            $response = array(
                'title' => 'Deleted!',
                'html' => 'Data has been deleted.',
                'icon' => 'success',
            );
        } else {
            $response = array(
                'title' => 'Failed!',
                'html' => 'Failed to delete data.',
                'icon' => 'error',
            );
        }
    }
    if ($_POST['action'] == 'delete_position') {
        $id = $_POST['id'];
        $sql = "DELETE from positions WHERE id = $id";
        $result = $conn->query($sql);
        if ($result) {
            $sql = "DELETE from officials WHERE position_id = $id";
            $conn->query($sql);
            $response = array(
                'title' => 'Deleted!',
                'html' => 'Data has been deleted.',
                'icon' => 'success',
            );
        } else {
            $response = array(
                'title' => 'Failed!',
                'html' => 'Failed to delete data.',
                'icon' => 'error',
            );
        }
    }
    if ($_POST['action'] == 'fetch_official') {
        $id = $_POST['id'];
        $sql = "SELECT * FROM officials WHERE id = $id";
        $row = $conn->query($sql)->fetch(PDO::FETCH_ASSOC);
        $response = array(
            'id'            => $row['id'],
            'fullname'      => $row['fullname'],
            'position_id'   => $row['position_id'],
        );
    }
    if ($_POST['action'] == 'fetch_position') {
        $id = $_POST['id'];
        $sql = "SELECT * FROM positions WHERE id = $id";
        $row = $conn->query($sql)->fetch(PDO::FETCH_ASSOC);
        $response = array(
            'id'                => $row['id'],
            'position_name'     => $row['position_name'],
            'max_count'         => $row['max_count'],
            'level_priority'    => $row['level_priority'],
        );
    }
    if ($_POST['action'] == 'change_account_status') {
        $id = $_POST['id'];
        $is_active = $_POST['switchValue'];

        switch ($is_active) {
            case 'true':
                $title = 'Status On';
                $html = 'Status turned ON';
                break;

            default:
                $title = 'Status Off';
                $html = 'Status turned OFF';
                break;
        }

        $sql = "UPDATE users
                SET is_active = $is_active
                WHERE id = $id";
        $result = $conn->query($sql);
        if ($result) {
            $response = array(
                'title' => $title,
                'html' => $html,
                'icon' => 'success',
            );
        } else {
            $response = array(
                'title' => 'Failed!',
                'html' => 'failed to change publish status.',
                'icon' => 'error',
            );
        }
    }
/** USER ACCOUNTS */
    if ($_POST['action'] == 'create_account') {

        $sql = "SELECT * FROM users WHERE email = '" . $_POST['email'] . "'";
        $result = $conn->query($sql);
        if ($result->rowCount() > 0) {
            $response = array(
                'title' => 'Failed!',
                'html' => 'Email already exist!',
                'icon' => 'warning',
            );
        } else {
            $arr_data = array(
                'email'             => addslashes($_POST['email']),
                'pass'              => password_hash(addslashes($_POST['pass']), PASSWORD_BCRYPT),
                'activation_code'   => '',
                'is_active'         => 0,
                'user_status'       => 'new registered',
                'user_type'         => $_POST['user_type'],
            );

            $columns = implode(",", array_keys($arr_data));
            $values = implode("','", array_values($arr_data));

            $sql = "INSERT INTO users ($columns) VALUES ('$values')";
            $result = $conn->query($sql);
            if (isset($result) == true) {
                $response = array(
                    'title' => 'Success!',
                    'html' => 'Account has been added!',
                    'icon' => 'success',
                );
            } else {
                $response = array(
                    'title' => 'Error!',
                    'html' => 'Please try again later!',
                    'icon' => 'error',
                );
            }
        }
    }
    if ($_POST['action'] == 'edit_account') {
        $id = $_POST['id'];
        $arr_data = array(
            'email'             => addslashes($_POST['lname']),
            'pass'              => $_POST['pass'],
            'activation_code'   => '',
            'is_active'         => 0,
            'user_status'       => 'account edited',
            'user_type'         => $_POST['user_type'],
        );

        $cv = 0;
        $setValues = '';
        foreach ($arr_data as $index => $arr_data) {
            $comma = ($cv > 0) ? ', ' : '';
            $setValues .= $comma . $index . " = " . "'" . $arr_data . "'";
            $cv++;
        }

        $sql = "UPDATE user_profile SET " . $setValues . " WHERE id = $id";
        $result = $conn->query($sql);
        if (isset($result) == true) {
            $response = array(
                'status' => 'ok',
                'title' => 'Success!',
                'html' => 'Account has been updated!',
                'icon' => 'success',
            );
        } else {
            $response = array(
                'status' => 'error',
                'title' => 'Error!',
                'html' => 'Please try again later!',
                'icon' => 'error',
            );
        }
    }
    if ($_POST['action'] == 'delete_account') {
        $id = $_POST['id'];
        $sql = "DELETE from users WHERE id = $id";
        $result = $conn->query($sql);
        if ($result) {
            $response = array(
                'title' => 'Deleted!',
                'html' => 'Account has been deleted.',
                'icon' => 'success',
            );
        } else {
            $response = array(
                'title' => 'Failed!',
                'html' => 'Failed to delete data.',
                'icon' => 'error',
            );
        }
    }
    if ($_POST['action'] == 'fetch_account') {
        $id = $_POST['id'];
        $sql = "SELECT * FROM users WHERE id = $id";
        $row = $conn->query($sql)->fetch(PDO::FETCH_ASSOC);
        $response = array(
            'id'                => $row['id'],
            'email'             => $row['email'],
            'pass'              => $row['pass'],
            'user_type'         => $row['user_type'],
        );
    }
    if ($_POST['action'] == 'change_account_status') {
        $id = $_POST['id'];
        $is_active = $_POST['switchValue'];

        switch ($is_active) {
            case 'true':
                $title = 'Status On';
                $html = 'Status turned ON';
                break;

            default:
                $title = 'Status Off';
                $html = 'Status turned OFF';
                break;
        }

        $sql = "UPDATE users
                SET is_active = $is_active
                WHERE id = $id";
        $result = $conn->query($sql);
        if ($result) {
            $response = array(
                'title' => $title,
                'html' => $html,
                'icon' => 'success',
            );
        } else {
            $response = array(
                'title' => 'Failed!',
                'html' => 'failed to change publish status.',
                'icon' => 'error',
            );
        }
    }
/** SETTINGS */
    if ($_POST['action'] == 'update_settings') {
        $result = $conn->query("TRUNCATE TABLE settings;");    
        if (isset($result) == true) {
            if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
                //get image file
                $file = $_FILES['file']['tmp_name'];
                $imageData = file_get_contents($file);
                $base64 = base64_encode($imageData);
                $imageType = $_FILES['file']['type']; // Get the image type
                // Prepare the data URI
                $dataUri = 'data:' . $imageType . ';base64,' . $base64;

                // Create an image resource from the binary data
                $image = imagecreatefromstring($imageData);
                // Resize the image
                $resizedImage = imagescale($image, 200, 200); // Resize to 300x200 pixels
                // Encode the resized image back to Base64
                ob_start();

                switch ($imageType) {
                    case 'image/png':
                        imagepng($resizedImage);
                        break;
                    
                    default:
                        imagejpeg($resizedImage);
                        break;
                }                
                
                $imageBase64 = base64_encode(ob_get_contents());
                ob_end_clean();
                $dataUri = 'data:' . $imageType . ';base64,' . $imageBase64;

                $arr_data = array(
                    'sys_name'  => addslashes($_POST['sys_name']),
                    'vision'    => addslashes($_POST['vision']),
                    'mission'   => addslashes($_POST['mission']),
                    'address'   => addslashes($_POST['mission']),
                    'contact'   => $_POST['contact'],
                    'email'     => $_POST['email'],
                    'logo'      => $dataUri
                );
            } else {
                $arr_data = array(
                    'sys_name'  => addslashes($_POST['sys_name']),
                    'vision'    => addslashes($_POST['vision']),
                    'mission'   => addslashes($_POST['mission']),
                    'address'   => addslashes($_POST['mission']),
                    'contact'   => $_POST['contact'],
                    'email'     => $_POST['email'],
                );
            }

            $columns = implode(",", array_keys($arr_data));
            $values = implode("','", array_values($arr_data));

            $sql = "INSERT INTO settings ($columns) VALUES ('$values')";
            $result = $conn->query($sql);
            if (isset($result) == true) {
                $response = array(
                    'title' => 'Success!',
                    'html' => 'Settings has been updated!',
                    'icon' => 'success',
                );
            } else {
                $response = array(
                    'title' => 'Error!',
                    'html' => 'Please try again later!',
                    'icon' => 'error',
                );
            }

            
        } else {
            $response = array(
                'title' => 'Error!',
                'html' => 'Failed to truncate table, please try again later!',
                'icon' => 'error',
            );
        }
    }
/** EMAIL NOTIFICATION */
    if ($_POST['action'] == 'email_notification') {
        $result = $conn->query("TRUNCATE TABLE email_notification;");        

        if (isset($result) == true) {
            $arr_data = array(
                'notification_for'  => $_POST['type'],
                'subject_title'     => $_POST['subject_title'],
                'message_content'   => $_POST['message_content'],
            );          

            $columns = implode(",", array_keys($arr_data));
            $values = implode("','", array_values($arr_data));

            $sql = "INSERT INTO email_notification ($columns) VALUES ('$values')";
            $result = $conn->query($sql);
            if (isset($result) == true) {
                $response = array(
                    'title' => 'Success!',
                    'html' => 'Email notifications has been updated!',
                    'icon' => 'success',
                );
            } else {
                $response = array(
                    'title' => 'Error!',
                    'html' => 'Please try again later!',
                    'icon' => 'error',
                );
            }
        } else {
            $response = array(
                'title' => 'Error!',
                'html' => 'Failed to truncate table, please try again later!',
                'icon' => 'error',
            );
        }
    }
    echo json_encode($response);
}

if(isset($_POST['fetch'])){
    if($_POST['fetch'] == 'set_active') {
        $id = $_POST['id'];
        $table = $_POST['tbl'];
        $status = $_POST['status'];

        $sql = "UPDATE $table SET
                    is_active   = $status,
                    updated_at  = '$updated_at'
                    WHERE id = $id
                    ";
        $result = $conn->query($sql);
        if (isset($result) == true) {
            $response = array(
                'status' => 1,
                'title' => 'Status updated!',
                'icon' => 'success',
            );
        } else {
            $response = array(
                'title' => 'Failed to update status!',
                'icon' => 'error',
            );
        }
        echo json_encode($response);
    }
    if($_POST['fetch'] == 'address'){
        $tbl = $_POST['data'];

        $col = $_POST['col'];
        $code = $_POST['code'];
        $val = $_POST['val'];

        switch ($tbl) {
            case 'refprovince':                
                $id = '#province';
                $data = '<option value="" selected hidden disabled>Pumili ng Probinsya</option>';

                $value = 'provCode';
                $desc = 'provDesc';
                break;
            case 'refcitymun':
                $id = '#city';
                $data = '<option value="" selected hidden disabled>Pumili ng City</option>';

                $value = 'citymunCode';
                $desc = 'citymunDesc';
                break;
            case 'refbrgy':
                $id = '#brgy';
                $data = '<option value="" selected hidden disabled>Pumili ng Barangay</option>';

                $value = 'brgyCode';
                $desc = 'brgyDesc';
                break;
            default:
                # code...
                break;
        }

        $sql = "SELECT * FROM $tbl WHERE $code = $val";
        $result = $conn->query($sql);
        $option = '';
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $option .= '<option value="' . $row[$value] . '">' .strtoupper($row[$desc]). '</option>';
        }

        $response = array(
            'data'  => $data.$option,
            'id'    => $id
        );

        echo json_encode($response);
    }
    if($_POST['fetch'] == 'cert_purpose'){
        switch ($_POST['cert_type']) {
            case 'Barangay Certification':
                $response = '<div class="custom-control custom-radio m-2">
                                <input class="custom-control-input" type="radio" id="purpose1" name="purpose" value="Local Employment" required>
                                <label for="purpose1" class="custom-control-label">Local Employment</label>
                            </div>
                            <div class="custom-control custom-radio m-2">
                                <input class="custom-control-input" type="radio" id="purpose2" name="purpose" value="Medical Assistance/Hospital Requirement" required>
                                <label for="purpose2" class="custom-control-label">Medical Assistance/Hospital Requirement</label>
                            </div>
                            <div class="custom-control custom-radio m-2">
                                <input class="custom-control-input" type="radio" id="purpose3" name="purpose" value="School Purposes" required>
                                <label for="purpose3" class="custom-control-label">School Purposes</label>
                            </div>
                            <div class="custom-control custom-radio m-2">
                                <input class="custom-control-input" type="radio" id="purpose4" name="purpose" value="Travel/Transfer of Residency" required>
                                <label for="purpose4" class="custom-control-label">Travel/Transfer of Residency</label>
                            </div>
                            <div class="custom-control custom-radio m-2">
                                <input class="custom-control-input" type="radio" id="purpose5" name="purpose" value="First Time Jobseekers Assistance Act (RA 11261)" required>
                                <label for="purpose5" class="custom-control-label">First Time Jobseekers Assistance Act (RA 11261)</label>
                            </div>
                            <div class="row pl-2">
                                <div class="custom-control custom-radio m-2">
                                    <input class="custom-control-input" type="radio" id="purpose6" name="purpose" value="Others" required>
                                    <label for="purpose6" class="custom-control-label">Others</label>
                                </div>
                                <input type="text" class="form-control col-sm-6" name="specify" id="specify" placeholder="Please specify if others." disabled>
                            </div>';
                break;
            case 'Certificate of Indigency':
                $response = '<div class="custom-control custom-radio m-2">
                                <input class="custom-control-input" type="radio" id="purpose1" name="purpose" value="Medical Assistance" required>
                                <label for="purpose1" class="custom-control-label">Medical Assistance</label>
                            </div>
                            <div class="custom-control custom-radio m-2">
                                <input class="custom-control-input" type="radio" id="purpose2" name="purpose" value="Financial Assistance" required>
                                <label for="purpose2" class="custom-control-label">Financial Assistance</label>
                            </div>
                            <div class="custom-control custom-radio m-2">
                                <input class="custom-control-input" type="radio" id="purpose3" name="purpose" value="Medical and Financial Assistance" required>
                                <label for="purpose3" class="custom-control-label">Medical and Financial Assistance</label>
                            </div>
                            <div class="custom-control custom-radio m-2">
                                <input class="custom-control-input" type="radio" id="purpose4" name="purpose" value="School Purpose" required>
                                <label for="purpose4" class="custom-control-label">School Purpose</label>
                            </div>
                            <div class="custom-control custom-radio m-2">
                                <input class="custom-control-input" type="radio" id="purpose5" name="purpose" value="Local Employment" required>
                                <label for="purpose5" class="custom-control-label">Local Employment</label>
                            </div>
                            <div class="custom-control custom-radio m-2">
                                <input class="custom-control-input" type="radio" id="purpose6" name="purpose" value="Burial/Financial Assistance" required>
                                <label for="purpose6" class="custom-control-label">Burial/Financial Assistance</label>
                            </div>
                            <div class="row pl-2">
                                <div class="custom-control custom-radio m-2">
                                    <input class="custom-control-input" type="radio" id="purpose7" name="purpose" value="Others" required>
                                    <label for="purpose7" class="custom-control-label">Others</label>
                                </div>
                                <input type="text" class="form-control col-sm-6" name="specify" id="specify" placeholder="Please specify if others." disabled>
                            </div>';
                break;
            case 'Certificate of Residency':
                $response = '<div class="row pl-2">
                                <div class="custom-control custom-radio m-2">
                                    <input class="custom-control-input" type="radio" id="purpose1" name="purpose" value="Proof for Barangay Residency" required>
                                    <label for="purpose1" class="custom-control-label">Proof for Barangay Residency</label>
                                </div>
                                <input type="number" class="form-control col-sm-6" name="years" id="years" placeholder="Year/s of length in Barangay" disabled>
                            </div>
                            <div class="custom-control custom-radio m-2">
                                <input class="custom-control-input" type="radio" id="purpose2" name="purpose" value="Proof for Barangay Non-Residency" required>
                                <label for="purpose2" class="custom-control-label">Proof for Barangay Non-Residency</label>
                            </div>';
                break;
            case 'Certificate of Guardianship':
                $response = '<div class="custom-control custom-radio m-2">
                                <input class="custom-control-input" type="radio" id="purpose1" name="purpose" value="Guardianship Certification" required>
                                <label for="purpose1" class="custom-control-label">Guardianship Certification</label>
                            </div>';
                break;
            case 'Certificate of Solo Parent':
                $response = '<div class="custom-control custom-radio m-2">
                                <input class="custom-control-input" type="radio" id="purpose1" name="purpose" value="Solo Parent Certification" required>
                                <label for="purpose1" class="custom-control-label">Solo Parent Certification</label>
                            </div>';
                break;
            case 'Certificate of Cohabilitation':
                $response = '<div class="custom-control custom-radio m-2">
                                <input class="custom-control-input" type="radio" id="purpose1" name="purpose" value="Cohabilitation Certification" required>
                                <label for="purpose1" class="custom-control-label">Cohabilitation Certification</label>
                            </div>';
                break;
            case 'Certification of Living Together':
                $response = '<div class="custom-control custom-radio m-2">
                                <input class="custom-control-input" type="radio" name="purpose" value="Living Together Certification" checked required>
                                <label class="custom-control-label">Living Together Certification</label>
                                <div class="row mb-2 mt-3">
                                    <div class="col-5">
                                        <label for="years" class="form-label">Year/s of living together</label>
                                    </div>
                                    <div class="col-7">
                                        <input type="number" class="form-control" name="years" id="years" placeholder="Ilang taong nagsasama?" required>                                
                                    </div>
                                </div>         
                                <div class="row">
                                    <div class="col-5">
                                        <label for="kinakasama" class="form-label">Pangalan ng kinakasama</label>
                                    </div>
                                    <div class="col-7">
                                        <input type="text" class="form-control" name="kinakasama" id="kinakasama" placeholder="Buong pangalan ng kinakasama" required>                                
                                    </div>
                                </div>
                            </div>
                            ';
                break;
            
            default:
                # code...
                break;
        }
        echo json_encode($response);
    }
    if($_POST['fetch'] == 'announcements'){
        $sql = "SELECT * FROM announcement ORDER BY created_at DESC";
        $result = $conn->query($sql);
        if($result->rowCount() > 0){
            $response = '';
            foreach ($result as $row) {
                switch ($row['is_published']) {
                    case 1:
                        $is_published = 'checked';
                        break;
                    default:
                        $is_published = '';
                        break;
                }

                $response .= '<div class="col-12 col-sm-12 col-md-12 col-lg-6 d-flex align-items-stretch" id="news_data">
                                    <div class="card bg-light d-flex flex-fill">
                                        <div class="card-header text-muted border-bottom-0">
                                            Date : ' . date('M d, Y', strtotime($row['date_content'])) . '
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="row">
                                                <div class="col-5 text-center">
                                                    <img src="' . $row['content_image'] . '" alt="user-avatar" class="img-square img-fluid">
                                                </div>
                                                <div class="col-7">
                                                    <h2 class="lead"><b>' . $row['news_title'] . '</b></h2>
                                                    <p class="text-muted text-sm">
                                                        ' . $row['content'] . '
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <div>
                                                <label for="publish">Publish&nbsp;</label>
                                                <input type="checkbox" name="publish" data-bootstrap-switch data-on-color="success"  id="' . $row['id'] . '"' . $is_published . ' data-val="' . $row['news_title'] . '">
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-sm btn-primary edit" id="' . $row['id'] . '">
                                                    <i class="fa fa-edit"></i>&nbsp;Edit
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger delete" id="' . $row['id'] . '" data-id="' . $row['news_title'] . '">
                                                    <i class="fa fa-trash"></i>&nbsp;Delete
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                ';
            }
        }else{
            $response = '<div class="col-12 col-sm-12 col-md-12 col-lg-6 d-flex align-items-stretch">
                            <div class="card bg-light d-flex flex-fill">
                                <div class="card-header text-muted border-bottom-0">
                                    Date : Dec 25, 2024
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-5 text-center">
                                            <img src="../images/logo.png" alt="image" class="img-square img-fluid">
                                        </div>
                                        <div class="col-7">
                                            <h2 class="lead"><b>News Title (Sample Only)</b></h2>
                                            <p class="text-muted text-sm">
                                                This is sample content.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <div>
                                        <label for="publish">Publish&nbsp;</label>
                                        <input type="checkbox" name="publish" id="publish" data-bootstrap-switch data-on-color="success">
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i>&nbsp;Edit</button>
                                        <button type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>';

        }
        echo json_decode($response);
    }
    if($_POST['fetch'] == 'barangay_officials_list'){
        $sql = "SELECT *
                FROM officials
                LEFT JOIN positions ON officials.position_id = positions.id
                ORDER BY positions.level_priority ASC";
        $result = $conn->query($sql);
        if($result->rowCount() > 0){
            $response = '';
            foreach ($result as $row) {
                $response .= '<h1 class="mt-4">'.$row['fullname'].'</h1>
                            <span class="h4 text-muted">'.$row['position_name'].'</span>';
            }
        }else{
            $response = 'No officials data found!';
        }

        echo json_encode($response);
    }
    if($_POST['fetch'] == 'email_notification'){
        $type = $_POST['type'];
        $sql = "SELECT *
                FROM email_notification
                WHERE notification_for = '$type'";
        $result = $conn->query($sql);
        if($result->rowCount() > 0){
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $response = array(
                'subject_title' => $row['subject_title'],
                'message_content' => $row['message_content'],
            );
        }else{
            $response = 'No email notification data found!';
        }

        echo json_encode($response);
    }
    if($_POST['fetch'] == 'print_certificate'){
        $sql = "SELECT * FROM certificates WHERE id = ".$_POST['id'];
        $result = $conn->query($sql);
        if($result->rowCount() > 0){
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $response = array(
                'title' => $row['cert_type'],
                'name' => $row['fullname'] ? $row['fullname'] : $row['email'],
            );
        }
        echo json_encode($response);
    }
    if($_POST['fetch'] == 'inventory_list'){
        $sql = "SELECT * FROM ";
    }
}

//Generate OTP
function pincode(){
    $pin = mt_rand(0000, 9999);
    return $pin;
}
//SEND EMAIL NOTIFICATION
function sendEmail($email, $subject, $message){
    //Send Verification Email
    $mail = new PHPMailer();
    // SERVER SETTINGS
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->IsSMTP();
    $mail->CharSet    = "utf-8";
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = "ssl";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = "465";

    $mail->Host       = "mail.placer8developer.com";
    $mail->Username   = "noreply@placer8portal.com";
    $mail->Password   = "noreply@placer8portal.com";
    $mail->From       = 'noreply@placer8portal.com';
    $mail->FromName   = 'Barangay 775 BMIS-EIRS';

    // RECIPIENTS
    $mail->addAddress($email);
    /*--- Subject ---*/
    $mail->Subject    = $subject;
    $mail->isHTML(true);
    $mail->Body = $message;

    try {
        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}
function sendOTP($email, $subject){
    //Send Verification Email
    $mail = new PHPMailer();
    $mail->CharSet    = "utf-8";
    $mail->IsSMTP();
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = "ssl";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = "465";

    /*Webhosting*/
    $mail->Host       = "mail.placer8developer.com";
    $mail->Username   = "noreply@placer8portal.com";
    $mail->Password   = "noreply@placer8portal.com";
    $mail->From       = 'noreply@placer8portal.com';
    $mail->FromName   = 'Barangay 775 BMIS-EIRS';

    $mail->addAddress($email);
    $mail->Subject    = $subject;
    $mail->isHTML(true);
    $mail->Body = 'This is auto generated by BMIS-EIRS system.';

    try {
        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}
?>