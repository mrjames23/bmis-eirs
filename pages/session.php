<?php 
session_start();
if (isset($_SESSION['id'])) {
    include_once('../includes/conn.php');
    $userid = $_SESSION['id'];

    //Fetch Users details
    $sql = "SELECT * FROM users WHERE id = $userid";
    $result = $conn->query($sql);
    $user = $result->fetch(PDO::FETCH_ASSOC);

    if($user['user_type'] == 'USER'){
        $sql = "SELECT * FROM user_profile WHERE email_address = '{$user['email']}'";
        $result = $conn->query($sql);
        if($result->rowCount() > 0){
            $profile = $result->fetch(PDO::FETCH_ASSOC);
        }else{
            $profile = []; 
        }        
    }


    //Fetch settings
    $sql = "SELECT * FROM settings ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql);
    $settings = $result->fetch(PDO::FETCH_ASSOC) ?: [];
    $system_name = $settings['sys_name'] ?? 'BARANGAY 775';
    $system_logo = $settings['logo'] ?? '../images/logo.png';
    
}else{
    header("Location: ../");
}
?>