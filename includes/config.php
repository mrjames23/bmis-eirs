<?php
    define('SERVER_NAME', $_SERVER['SERVER_NAME'] . '/');
    define('BASE_HOST', $_SERVER['HTTP_HOST'] . '/');
    define('SITE_TITLE', 'BMIS-EIRS');
    define('ASSETS', '../assets');

    $localServer = ['localhost/'];        
    
    if(in_array(SERVER_NAME, $localServer)){
        define('DB_HOST', 'localhost');
        define('DB_USER', 'root');
        define('DB_PASS', '');
        define('DB_NAME', 'if0_37567443_bmis_eirs');
    }else{
        define('DB_HOST', 'sql201.infinityfree.com');
        define('DB_USER', 'if0_37567443');
        define('DB_PASS', 'EsfXTQQ7cEX393p');
        define('DB_NAME', 'if0_37567443_bmis_eirs');
    }
    
?> 