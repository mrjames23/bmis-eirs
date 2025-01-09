<?php
$sql = "SHOW TABLES LIKE 'refregion'";
if($conn->query($sql)->rowCount() == 0){
    $conn->exec("CREATE TABLE IF NOT EXISTS refregion (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            psgcCode VARCHAR(255) DEFAULT NULL,
            regDesc VARCHAR(255) DEFAULT NULL,
            regCode VARCHAR(255) DEFAULT NULL,
            INDEX (regCode)
            )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
        ");

    $conn->exec("INSERT INTO `refregion`(`id`, `psgcCode`, `regDesc`, `regCode`) VALUES (1, '010000000', 'REGION I (ILOCOS REGION)', '01');");
    $conn->exec("INSERT INTO `refregion`(`id`, `psgcCode`, `regDesc`, `regCode`) VALUES (2, '020000000', 'REGION II (CAGAYAN VALLEY)', '02');");
    $conn->exec("INSERT INTO `refregion`(`id`, `psgcCode`, `regDesc`, `regCode`) VALUES (3, '030000000', 'REGION III (CENTRAL LUZON)', '03');");
    $conn->exec("INSERT INTO `refregion`(`id`, `psgcCode`, `regDesc`, `regCode`) VALUES (4, '040000000', 'REGION IV-A (CALABARZON)', '04');");
    $conn->exec("INSERT INTO `refregion`(`id`, `psgcCode`, `regDesc`, `regCode`) VALUES (5, '170000000', 'REGION IV-B (MIMAROPA)', '17');");
    $conn->exec("INSERT INTO `refregion`(`id`, `psgcCode`, `regDesc`, `regCode`) VALUES (6, '050000000', 'REGION V (BICOL REGION)', '05');");
    $conn->exec("INSERT INTO `refregion`(`id`, `psgcCode`, `regDesc`, `regCode`) VALUES (7, '060000000', 'REGION VI (WESTERN VISAYAS)', '06');");
    $conn->exec("INSERT INTO `refregion`(`id`, `psgcCode`, `regDesc`, `regCode`) VALUES (8, '070000000', 'REGION VII (CENTRAL VISAYAS)', '07');");
    $conn->exec("INSERT INTO `refregion`(`id`, `psgcCode`, `regDesc`, `regCode`) VALUES (9, '080000000', 'REGION VIII (EASTERN VISAYAS)', '08');");
    $conn->exec("INSERT INTO `refregion`(`id`, `psgcCode`, `regDesc`, `regCode`) VALUES (10, '090000000', 'REGION IX (ZAMBOANGA PENINSULA)', '09');");
    $conn->exec("INSERT INTO `refregion`(`id`, `psgcCode`, `regDesc`, `regCode`) VALUES (11, '100000000', 'REGION X (NORTHERN MINDANAO)', '10');");
    $conn->exec("INSERT INTO `refregion`(`id`, `psgcCode`, `regDesc`, `regCode`) VALUES (12, '110000000', 'REGION XI (DAVAO REGION)', '11');");
    $conn->exec("INSERT INTO `refregion`(`id`, `psgcCode`, `regDesc`, `regCode`) VALUES (13, '120000000', 'REGION XII (SOCCSKSARGEN)', '12');");    
    $conn->exec("INSERT INTO `refregion`(`id`, `psgcCode`, `regDesc`, `regCode`) VALUES (14, '160000000', 'REGION XIII (CARAGA)', '16');");
    $conn->exec("INSERT INTO `refregion`(`id`, `psgcCode`, `regDesc`, `regCode`) VALUES (15, '130000000', 'NCR (NATIONAL CAPITAL REGION )', '13');");
    $conn->exec("INSERT INTO `refregion`(`id`, `psgcCode`, `regDesc`, `regCode`) VALUES (16, '140000000', 'CAR (CORDILLERA ADMINISTRATIVE REGION )', '14');");
    $conn->exec("INSERT INTO `refregion`(`id`, `psgcCode`, `regDesc`, `regCode`) VALUES (17, '150000000', 'BARMM (BANGSAMORO AUTONOMOUS REGION IN MUSLIM MINDANAO)', '15');");
}
?>