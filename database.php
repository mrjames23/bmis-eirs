<?php
include_once('./includes/config.php');

try {
    $DB_HOST = DB_HOST;
    $DB_USER = DB_USER;
    $DB_PASS = DB_PASS;
    $DB_NAME = DB_NAME;
    // Connect to MySQL database server using PDO
    $conn = new PDO('mysql:host=' . $DB_HOST . ';', $DB_USER, $DB_PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Create database if not exist
    $conn->exec("CREATE DATABASE IF NOT EXISTS " . $DB_NAME);
    // Set connection
    $conn = new PDO('mysql:host=' . $DB_HOST . ';dbname=' . $DB_NAME, $DB_USER, $DB_PASS);
/** USERS */
    $conn->exec("CREATE TABLE IF NOT EXISTS users (
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TEXT DEFAULT NULL,
                email VARCHAR(255) DEFAULT NULL,
                pass TEXT DEFAULT NULL,
                activation_code TEXT DEFAULT NULL,
                is_active TEXT DEFAULT NULL,
                user_status TEXT DEFAULT NULL,
                user_type TEXT DEFAULT NULL,
                access_token TEXT DEFAULT NULL,
                INDEX (email)
                )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
            ");
    // Create admin account
    $email = 'admin@admin.com';
    $sql = "SELECT email FROM users WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result->rowCount() < 1) {
        $pass = password_hash('password', PASSWORD_BCRYPT);
        $role_id = 0;
        $arr_data = array(
            'email' => $email,
            'pass' => $pass,
            'activation_code' => '',
            'is_active' => 1,
            'user_status' => 'verified',
            'user_type' => '0', //0,1,2
            'access_token' => ''
        );
        $columns = implode(",", array_keys($arr_data));
        $values = implode("','", array_values($arr_data));
        $conn->exec("INSERT INTO users ($columns) VALUES ('$values')");
    }
/** BARANGAY INFO */
    $conn->exec("CREATE TABLE IF NOT EXISTS users (
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                header VARCHAR(255) DEFAULT NULL,
                name TEXT DEFAULT NULL,
                title TEXT DEFAULT NULL,
                content TEXT DEFAULT NULL,                
                bground TEXT DEFAULT NULL,                
                footnote TEXT DEFAULT NULL,                
                footnote_logo TEXT DEFAULT NULL,                
                updated_at TEXT DEFAULT NULL,
                INDEX (id)
                )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
            ");   
/** ANOUNCEMENTS */
    $conn->exec("CREATE TABLE IF NOT EXISTS users (
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                date_content VARCHAR(255) DEFAULT NULL,
                news_title TEXT DEFAULT NULL,
                content TEXT DEFAULT NULL,
                is_published TEXT DEFAULT NULL,
                content_image TEXT DEFAULT NULL,
                updated_at TEXT DEFAULT NULL,
                INDEX (id)
                )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
            ");
} catch (PDOException $e) {
    echo "Connection failed : " . $e->getMessage();
    $conn = null;
    return;
}
