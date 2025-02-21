<?php
session_start();
include_once('includes/conn.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email  = addslashes($_POST['email']);
    $pass   = addslashes($_POST['pass']);
    $dbname = 'users';
    $sql = "SELECT * FROM $dbname WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result->rowCount() > 0) {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        if($row['is_active'] != 0){
            if (password_verify($pass, $row['pass'])) {
                $response = array(
                    'status' => 'ok',
                    'redirect' => './pages/',
                );
                $_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
            } else {
                $response = array(
                    'title' => 'Password is incorrect!',
                    'html'  => '',
                    'icon'  => 'warning',
                );
            }
        }else{
            $response = array(
                'title' => 'Account inactive',
                'html'  => 'Please contact barangay admin for your account activation.',
                'icon'  => 'warning',
            );
        }
        
    } else {
        $response = array(
            'title' => 'Email not found!',
            'html'  => 'Please check your email address.',
            'icon'  => 'error',
        );
    }

    echo json_encode($response);
}

?>