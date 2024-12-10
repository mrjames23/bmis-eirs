<?php
include_once('config.php');

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
                user_profile_id TEXT DEFAULT NULL,
                access_token TEXT DEFAULT NULL,
                INDEX (email)
                )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
            ");
    // Create admin account
    $email = 'admin@admin.com';
    $sql = "SELECT email FROM users WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result->rowCount() < 1) {
        $pass = password_hash('admin', PASSWORD_BCRYPT);
        $role_id = 0;
        $arr_data = array(
            'email' => $email,
            'pass' => $pass,
            'activation_code' => '',
            'is_active' => 1,
            'user_status' => 'default',
            'user_type' => 'ADMIN', //admin,user,staff
            'access_token' => ''
        );
        $columns = implode(",", array_keys($arr_data));
        $values = implode("','", array_values($arr_data));
        $conn->exec("INSERT INTO users ($columns) VALUES ('$values')");

        $conn->query("INSERT INTO users (email,pass,activation_code,is_active,user_status,user_type,access_token) VALUES ('staff@staff.com','".password_hash('staff', PASSWORD_BCRYPT). "','','1','default','STAFF','')");
        $conn->query("INSERT INTO users (email,pass,activation_code,is_active,user_status,user_type,access_token) VALUES ('user@user.com','".password_hash('user', PASSWORD_BCRYPT). "','','1','default','USER','')");
    }
/** BARANGAY INFO */
    $conn->exec("CREATE TABLE IF NOT EXISTS brgy_info (
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                header VARCHAR(255) DEFAULT NULL,
                name TEXT DEFAULT NULL,
                title TEXT DEFAULT NULL,
                content TEXT DEFAULT NULL,             
                footer TEXT DEFAULT NULL,
                footer_logo LONGBLOB DEFAULT NULL,                
                updated_at TEXT DEFAULT NULL,
                INDEX (id)
                )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
            ");   
   
/** ANOUNCEMENTS */
    $conn->exec("CREATE TABLE IF NOT EXISTS announcement (
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                date_content VARCHAR(255) DEFAULT NULL,
                news_title TEXT DEFAULT NULL,
                content TEXT DEFAULT NULL,
                is_published TEXT DEFAULT NULL,
                content_image LONGBLOB DEFAULT NULL,
                updated_at TEXT DEFAULT NULL,
                updated_by TEXT DEFAULT NULL,
                INDEX (id)
                )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
            ");
/** USER PROFILES */
    $conn->exec("CREATE TABLE IF NOT EXISTS user_profile (
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                lname VARCHAR(255) DEFAULT NULL,
                fname TEXT DEFAULT NULL,
                mname TEXT DEFAULT NULL,
                suffix TEXT DEFAULT NULL,
                gender TEXT DEFAULT NULL,
                bdate TEXT DEFAULT NULL,
                birth_place TEXT DEFAULT NULL,
                civil_status TEXT DEFAULT NULL,
                citizenship TEXT DEFAULT NULL,
                voter_status TEXT DEFAULT NULL,
                occupation TEXT DEFAULT NULL,
                address_region TEXT DEFAULT NULL,
                address_province TEXT DEFAULT NULL,
                address_city TEXT DEFAULT NULL,
                address_brgy TEXT DEFAULT NULL,
                address_street TEXT DEFAULT NULL,
                contact_no TEXT DEFAULT NULL,
                email_address TEXT DEFAULT NULL,
                photo LONGBLOB DEFAULT NULL,
                updated_at TEXT DEFAULT NULL,
                updated_by TEXT DEFAULT NULL,
                INDEX (lname)
                )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
            ");
/** CERTIFICATES */
    $conn->exec("CREATE TABLE IF NOT EXISTS certificates (
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                email VARCHAR(255) DEFAULT NULL,
                cert_type TEXT DEFAULT NULL,
                cert_purpose TEXT DEFAULT NULL,
                fullname TEXT DEFAULT NULL,
                region TEXT DEFAULT NULL,
                province TEXT DEFAULT NULL,
                city TEXT DEFAULT NULL,
                brgy TEXT DEFAULT NULL,
                street TEXT DEFAULT NULL,
                contact_no TEXT DEFAULT NULL,
                request_status TEXT DEFAULT NULL,
                remarks TEXT DEFAULT NULL,                
                claiming_date TEXT DEFAULT NULL,                
                updated_at TEXT DEFAULT NULL,                
                INDEX (email)
                )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
            ");
/** BARANGAY ID */
    $conn->exec("CREATE TABLE IF NOT EXISTS barangay_id (
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                photo LONGBLOB DEFAULT NULL,
                email VARCHAR(255) DEFAULT NULL,
                fullname TEXT DEFAULT NULL,
                bdate TEXT DEFAULT NULL,
                gender TEXT DEFAULT NULL,
                civil_status TEXT DEFAULT NULL,
                region TEXT DEFAULT NULL,
                province TEXT DEFAULT NULL,
                city TEXT DEFAULT NULL,
                brgy TEXT DEFAULT NULL,
                street TEXT DEFAULT NULL,
                contact_no TEXT DEFAULT NULL,
                tel_no TEXT DEFAULT NULL,
                employers_name TEXT DEFAULT NULL,
                lenght_stay_year TEXT DEFAULT NULL,
                lenght_stay_month TEXT DEFAULT NULL,
                fathers_name TEXT DEFAULT NULL,
                mothers_name TEXT DEFAULT NULL,
                emergency_person TEXT DEFAULT NULL,
                emergency_contact TEXT DEFAULT NULL,
                emergency_relationship TEXT DEFAULT NULL,
                emergency_address TEXT DEFAULT NULL,
                request_status TEXT DEFAULT NULL,
                remarks TEXT DEFAULT NULL,
                claiming_date TEXT DEFAULT NULL,                
                updated_at TEXT DEFAULT NULL,                
                INDEX (fullname)
                )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
            ");
/** SETTINGS */
    $conn->exec("CREATE TABLE IF NOT EXISTS settings (
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                logo LONGBLOB DEFAULT NULL,    
                sys_name TEXT DEFAULT NULL,
                email TEXT DEFAULT NULL,
                `address` TEXT DEFAULT NULL,
                `contact` TEXT DEFAULT NULL,
                `vision` TEXT DEFAULT NULL,
                `mission` TEXT DEFAULT NULL,
                INDEX (id)
                )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
            ");
/** EMAIL NOTIFICATION */
    $conn->exec("CREATE TABLE IF NOT EXISTS email_notification (
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                logo LONGBLOB DEFAULT NULL,    
                notification_for TEXT DEFAULT NULL,
                subject_title TEXT DEFAULT NULL,
                message_content TEXT DEFAULT NULL,
                INDEX (id)
                )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
            ");
/** OFFICIALS */
    $conn->exec("CREATE TABLE IF NOT EXISTS officials (
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                fullname TEXT DEFAULT NULL,
                email TEXT DEFAULT NULL,
                contact_no TEXT DEFAULT NULL,
                position_id TEXT DEFAULT NULL,
                INDEX (id)
                )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
            ");
/** POSITIONS */
    $conn->exec("CREATE TABLE IF NOT EXISTS positions (
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                position_name TEXT DEFAULT NULL,
                max_count TEXT DEFAULT NULL,
                level_priority TEXT DEFAULT NULL,
                INDEX (id)
                )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
            ");
/** REGION CITY STREET */
    include_once('region_city.php');

} catch (PDOException $e) {
    echo "Connection failed : " . $e->getMessage();
    $conn = null;
    return;
}
