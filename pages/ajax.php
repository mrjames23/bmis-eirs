<?php
include_once('session.php');
$updated_at = date('Y-m-d H:i:s');

if(isset($_POST['table'])){
    if ($_POST['table'] == 'user_accounts') {
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
                    </button>';
            $delete = '<button type="button" class="btn btn-danger btn-sm delete" id="' . $row['id'] . '" data-val="' . strtoupper($fullname) . '">
                        <i class="fa fa-trash"></i>&nbsp;Delete
                    </button>';
            $view = "";

            $sub_array = array();
            $sub_array[] = $count++ . '.';
            $sub_array[] = $image;
            $sub_array[] = strtoupper($fullname);
            $sub_array[] = '';
            $sub_array[] = $age;
            $sub_array[] = $row['gender'];
            $sub_array[] = $row['civil_status'];
            $sub_array[] = $voters_status;
            $sub_array[] = $edit.'&nbsp;'.$delete;
            $data[] = $sub_array;
        }
        $response = array('data' => $data ?? '');
    }
    if ($_POST['table'] == 'certificates') {
        $sql = "SELECT * FROM certificates";
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
            // Define user status and buttons
            switch ($row['request_status']) {
                case 'Pending':
                    $status = '<div class="project-state">
                                            <span class="badge badge-danger">' . $row['request_status'] . '</span>
                                        </div>';
                    break;

                default:
                    $status = '<div class="project-state">
                                        <span class="badge badge-secondary">' . $row['user_status'] . '</span>
                                    </div>';
                    $action = $delete;
                    break;
            }

            $sub_array = array();
            $sub_array[] = $count++ . '.';
            $sub_array[] = $row['created_at'];
            $sub_array[] = $row['fullname'];
            $sub_array[] = $row['cert_type'];
            $sub_array[] = $row['cert_purpose'];
            $sub_array[] = $status;
            $sub_array[] = $delete;
            $data[] = $sub_array;
        }
        $response = array('data' => $data ?? '');
    }
    if ($_POST['table'] == 'barangay_id') {
        $sql = "SELECT * FROM barangay_id";
        $result = $conn->query($sql);
        $count = 1;
        foreach ($result as $row) {
            // Action Buttons
            $edit = '<button type="button" class="btn btn-primary btn-sm edit" id="' . $row['id'] . '"  data-id="' . $row['id'] . '">
                        <i class="fa fa-edit"></i>&nbsp;Edit
                    </button>&nbsp;';
            $delete = '<button type="button" class="btn btn-danger btn-sm delete" id="' . $row['id'] . '" data-id="' . $row['id']  . '">
                        <i class="fa fa-trash"></i>&nbsp;Delete
                    </button>&nbsp;';
            $view = "";            
            // Define user status and buttons
            switch ($row['request_status']) {
                case 'Pending':
                    $status = '<div class="project-state">
                                            <span class="badge badge-danger">' . $row['request_status'] . '</span>
                                        </div>';
                    break;

                default:
                    $status = '<div class="project-state">
                                        <span class="badge badge-secondary">' . $row['user_status'] . '</span>
                                    </div>';
                    $action = $delete;
                    break;
            }

            if($row['province']){
                $sql = "SELECT provDesc FROM refprovince WHERE provCode = ".$row['province'];
                $result = $conn->query($sql);
                $address = $result->fetch(PDO::FETCH_ASSOC);
                $province = $address['provDesc'];
            }
            if($row['city']){
                $sql = "SELECT citymunDesc FROM refcitymun WHERE citymunCode = ".$row['city'];
                $result = $conn->query($sql);
                $address = $result->fetch(PDO::FETCH_ASSOC);
                $city = $address['citymunDesc'];
            }
            if($row['brgy']){
                $sql = "SELECT brgyDesc FROM refbrgy WHERE brgyCode = ".$row['brgy'];
                $result = $conn->query($sql);
                $address = $result->fetch(PDO::FETCH_ASSOC);
                $brgy = $address['brgyDesc'];
            }

            $address = $row['street'].', '. $brgy.' '.$city.', '.$province;

            $sub_array = array();
            $sub_array[] = $count++ . '.';
            $sub_array[] = $status;
            $sub_array[] = $row['created_at'];
            $sub_array[] = $row['fullname'];
            $sub_array[] = $row['gender'];
            $sub_array[] = $row['bdate'];
            $sub_array[] = $row['contact_no'];
            $sub_array[] = $address;
            $sub_array[] = $row['emergency_person'];
            $sub_array[] = $row['emergency_relationship'];
            $sub_array[] = $row['emergency_address'];
            $sub_array[] = $row['emergency_contact'];
            $sub_array[] = $delete;
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
/** ANNOUNCEMENT */
    if($_POST['action'] == 'create_announcement'){
        //get image file
        $file = $_FILES['file']['tmp_name'];
        $imageData = file_get_contents($file);
        $base64 = base64_encode($imageData);
        $imageType = $_FILES['file']['type']; // Get the image type

        // Prepare the data URI
        $dataUri = 'data:' . $imageType . ';base64,' . $base64;

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
        if( isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK ){
            //get image file
            $file = $_FILES['file']['tmp_name'];
            $imageData = file_get_contents($file);
            $base64 = base64_encode($imageData);
            $imageType = $_FILES['file']['type']; // Get the image type
            // Prepare the data URI
            $dataUri = 'data:' . $imageType . ';base64,' . $base64;
            
            $date_content  = addslashes($_POST['date']);
            $news_title    = addslashes($_POST['title']);
            $content       = addslashes($_POST['content']);
            $content_image = $dataUri;
            $updated_by    = $_SESSION['id'];           

            $sql = "UPDATE announcement SET
                    date_content  = '$date_content',
                    news_title    = '$news_title',
                    content       = '$content',
                    content_image = '$dataUri',
                    updated_at    = '$updated_at',
                    updated_by    = '$updated_by'
                    WHERE id = $id
                    ";
        }else{
            $date_content  = addslashes($_POST['date']);
            $news_title    = addslashes($_POST['title']);
            $content       = addslashes($_POST['content']);
            $updated_by    = $_SESSION['id'];

            $sql = "UPDATE announcement SET 
                    date_content  = '$date_content', 
                    news_title    = '$news_title', 
                    content       = '$content', 
                    updated_at    = '$updated_at', 
                    updated_by    = '$updated_by'
                    WHERE id = $id
                    ";
        }

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

        // $response = $sql;
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

        $columns = implode(",", array_keys($arr_data));
        $values = implode("','", array_values($arr_data));

        $sql = "INSERT INTO user_profile ($columns) VALUES ('$values')";
        $result = $conn->query($sql);
        if (isset($result) == true) {
            $response = array(
                'status' => 'ok',
                'title' => 'Success!',
                'html' => 'Data has been added!',
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
/** USER ACCOUNTS */
    if($_POST['action'] == 'create_account'){

        $arr_data = array(
            'email'             => addslashes($_POST['lname']),
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
                'status' => 'ok',
                'title' => 'Success!',
                'html' => 'Account has been added!',
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
    if($_POST['action'] == 'edit_account'){
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
    if($_POST['action'] == 'delete_account'){
        $id = $_POST['id'];
        $sql = "DELETE from users WHERE id = $id";
        $result = $conn->query($sql);
        if($result){
            $response = array(
                'title' => 'Deleted!',
                'html' => 'Account has been deleted.',
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
    if($_POST['action'] == 'fetch_account'){
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
    if($_POST['action'] == 'change_account_status'){
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
/** CERTIFICATES */
    if ($_POST['action'] == 'create_request_certificate') {

        $fullname = $_POST['lname'] ? $_POST['lname'] . ', ' : '';
        $fullname .= $_POST['fname'] ? $_POST['fname']. ' ' : '';
        $fullname .= $_POST['mname'] ? ' ' . substr($_POST['mname'], 0, 1) . '. ' : '';
        $fullname .= $_POST['suffix'] ? $_POST['suffix'] : '';

        $arr_data = array(
            'cert_type'         => $_POST['cert_type'],
            'cert_purpose'      => $_POST['purpose'],
            'fullname'          => strtoupper($fullname),
            'region'            => $_POST['region'],
            'province'          => $_POST['province'],
            'city'              => $_POST['city'],
            'brgy'              => $_POST['brgy'],
            'street'            => $_POST['street'],
            'request_status'    => 'Pending',
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
    if ($_POST['action'] == 'edit_request_certificate') {
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
    if ($_POST['action'] == 'delete_request_certificate') {
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
/** BARANGAY ID */
    if ($_POST['action'] == 'create_request_barangay_id') {

        $fullname = $_POST['lname'] ? $_POST['lname'] . ', ' : '';
        $fullname .= $_POST['fname'] ? $_POST['fname'] . ' ' : '';
        $fullname .= $_POST['mname'] ? ' ' . substr($_POST['mname'], 0, 1) . '. ' : '';
        $fullname .= $_POST['suffix'] ? $_POST['suffix'] : '';

        $arr_data = array(
            'fullname'      => $fullname,
            'bdate'         => $_POST['bdate'],
            'gender'        => $_POST['gender'],
            'civil_status'        => $_POST['civil_status'],
            'region'        => $_POST['region'],
            'province'        => $_POST['province'],
            'city'        => $_POST['city'],
            'brgy'        => $_POST['brgy'],
            'street'        => $_POST['street'],
            'contact_no'        => $_POST['contact_no'],
            'tel_no'        => '',
            'employers_name' => $_POST['emp_name'],
            'lenght_stay_year' => $_POST['length_year'],
            'lenght_stay_month' => $_POST['length_month'],
            'fathers_name' => $_POST['fathers_name'],
            'mothers_name' => $_POST['mothers_name'],
            'emergency_person' => $_POST['emergency_person'],
            'emergency_contact'          => $_POST['emergency_contact'],
            'emergency_relationship'    => $_POST['emergency_relationship'],
            'emergency_address' => $_POST['emergency_address'],
            'request_status' => 'Pending',
            'is_active' => 1,        
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
/** SETTINGS */
    if ($_POST['action'] == 'update_settings') {
        $result = $conn->query("TRUNCATE TABLE settings;");
        if (isset($result) == true) {
            //get image file
            $file = $_FILES['file']['tmp_name'];
            $imageData = file_get_contents($file);
            $base64 = base64_encode($imageData);
            $imageType = $_FILES['file']['type']; // Get the image type

            // Prepare the data URI
            $dataUri = 'data:' . $imageType . ';base64,' . $base64;

            $arr_data = array(
                'sys_name'   => addslashes($_POST['sys_name']),
                'logo'      => $dataUri
            );

            $columns = implode(",", array_keys($arr_data));
            $values = implode("','", array_values($arr_data));

            $sql = "INSERT INTO settings ($columns) VALUES ('$values')";
            $result = $conn->query($sql);
            if (isset($result) == true) {
                $response = array(
                    'status' => 'ok',
                    'title' => 'Success!',
                    'html' => 'Settings has been updated!',
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
                            </div>';
                break;
            case 'Certificate of Residency':
                $response = '<div class="custom-control custom-radio m-2">
                                <input class="custom-control-input" type="radio" id="purpose1" name="purpose" value="Proof for Barangay Residency" required>
                                <label for="purpose1" class="custom-control-label">Proof for Barangay Residency</label>
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
                                <input class="custom-control-input" type="radio" id="purpose1" name="purpose" value="Living together Certification" required>
                                <label for="purpose1" class="custom-control-label">Living together Certification</label>
                            </div>';
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
}
?>