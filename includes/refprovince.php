<?php
$sql = "SHOW TABLES LIKE 'refprovince'";
if ($conn->query($sql)->rowCount() == 0) {
    $conn->exec("CREATE TABLE IF NOT EXISTS refprovince (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            psgcCode VARCHAR(255) DEFAULT NULL,
            provDesc VARCHAR(255) DEFAULT NULL,
            regCode VARCHAR(255) DEFAULT NULL,
            provCode VARCHAR(255) DEFAULT NULL,
            INDEX (regCode)
            )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
        ");

    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (1, '012800000', 'ILOCOS NORTE', '01', '0128');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (2, '012900000', 'ILOCOS SUR', '01', '0129');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (3, '013300000', 'LA UNION', '01', '0133');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (4, '015500000', 'PANGASINAN', '01', '0155');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (5, '020900000', 'BATANES', '02', '0209');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (6, '021500000', 'CAGAYAN', '02', '0215');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (7, '023100000', 'ISABELA', '02', '0231');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (8, '025000000', 'NUEVA VIZCAYA', '02', '0250');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (9, '025700000', 'QUIRINO', '02', '0257');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (10, '030800000', 'BATAAN', '03', '0308');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (11, '031400000', 'BULACAN', '03', '0314');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (12, '034900000', 'NUEVA ECIJA', '03', '0349');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (13, '035400000', 'PAMPANGA', '03', '0354');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (14, '036900000', 'TARLAC', '03', '0369');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (15, '037100000', 'ZAMBALES', '03', '0371');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (16, '037700000', 'AURORA', '03', '0377');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (17, '041000000', 'BATANGAS', '04', '0410');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (18, '042100000', 'CAVITE', '04', '0421');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (19, '043400000', 'LAGUNA', '04', '0434');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (20, '045600000', 'QUEZON', '04', '0456');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (21, '045800000', 'RIZAL', '04', '0458');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (22, '174000000', 'MARINDUQUE', '17', '1740');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (23, '175100000', 'OCCIDENTAL MINDORO', '17', '1751');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (24, '175200000', 'ORIENTAL MINDORO', '17', '1752');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (25, '175300000', 'PALAWAN', '17', '1753');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (26, '175900000', 'ROMBLON', '17', '1759');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (27, '050500000', 'ALBAY', '05', '0505');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (28, '051600000', 'CAMARINES NORTE', '05', '0516');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (29, '051700000', 'CAMARINES SUR', '05', '0517');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (30, '052000000', 'CATANDUANES', '05', '0520');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (31, '054100000', 'MASBATE', '05', '0541');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (32, '056200000', 'SORSOGON', '05', '0562');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (33, '060400000', 'AKLAN', '06', '0604');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (34, '060600000', 'ANTIQUE', '06', '0606');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (35, '061900000', 'CAPIZ', '06', '0619');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (36, '063000000', 'ILOILO', '06', '0630');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (37, '064500000', 'NEGROS OCCIDENTAL', '06', '0645');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (38, '067900000', 'GUIMARAS', '06', '0679');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (39, '071200000', 'BOHOL', '07', '0712');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (40, '072200000', 'CEBU', '07', '0722');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (41, '074600000', 'NEGROS ORIENTAL', '07', '0746');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (42, '076100000', 'SIQUIJOR', '07', '0761');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (43, '082600000', 'EASTERN SAMAR', '08', '0826');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (44, '083700000', 'LEYTE', '08', '0837');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (45, '084800000', 'NORTHERN SAMAR', '08', '0848');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (46, '086000000', 'SAMAR (WESTERN SAMAR)', '08', '0860');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (47, '086400000', 'SOUTHERN LEYTE', '08', '0864');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (48, '087800000', 'BILIRAN', '08', '0878');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (49, '097200000', 'ZAMBOANGA DEL NORTE', '09', '0972');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (50, '097300000', 'ZAMBOANGA DEL SUR', '09', '0973');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (51, '098300000', 'ZAMBOANGA SIBUGAY', '09', '0983');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (52, '099700000', 'CITY OF ISABELA', '09', '0997');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (53, '101300000', 'BUKIDNON', '10', '1013');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (54, '101800000', 'CAMIGUIN', '10', '1018');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (55, '103500000', 'LANAO DEL NORTE', '10', '1035');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (56, '104200000', 'MISAMIS OCCIDENTAL', '10', '1042');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (57, '104300000', 'MISAMIS ORIENTAL', '10', '1043');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (58, '112300000', 'DAVAO DEL NORTE', '11', '1123');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (59, '112400000', 'DAVAO DEL SUR', '11', '1124');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (60, '112500000', 'DAVAO ORIENTAL', '11', '1125');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (61, '118200000', 'COMPOSTELA VALLEY', '11', '1182');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (62, '118600000', 'DAVAO OCCIDENTAL', '11', '1186');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (63, '124700000', 'COTABATO (NORTH COTABATO)', '12', '1247');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (64, '126300000', 'SOUTH COTABATO', '12', '1263');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (65, '126500000', 'SULTAN KUDARAT', '12', '1265');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (66, '128000000', 'SARANGANI', '12', '1280');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (67, '129800000', 'COTABATO CITY', '12', '1298');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (68, '133900000', 'CITY OF MANILA', '13', '1339');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (69, '137400000', 'NCR, SECOND DISTRICT', '13', '1374');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (70, '137500000', 'NCR, THIRD DISTRICT', '13', '1375');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (71, '137600000', 'NCR, FOURTH DISTRICT', '13', '1376');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (72, '140100000', 'ABRA', '14', '1401');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (73, '141100000', 'BENGUET', '14', '1411');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (74, '142700000', 'IFUGAO', '14', '1427');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (75, '143200000', 'KALINGA', '14', '1432');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (76, '144400000', 'MOUNTAIN PROVINCE', '14', '1444');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (77, '148100000', 'APAYAO', '14', '1481');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (78, '150700000', 'BASILAN', '15', '1507');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (79, '153600000', 'LANAO DEL SUR', '15', '1536');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (80, '153800000', 'MAGUINDANAO', '15', '1538');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (81, '156600000', 'SULU', '15', '1566');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (82, '157000000', 'TAWI-TAWI', '15', '1570');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (83, '160200000', 'AGUSAN DEL NORTE', '16', '1602');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (84, '160300000', 'AGUSAN DEL SUR', '16', '1603');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (85, '166700000', 'SURIGAO DEL NORTE', '16', '1667');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (86, '166800000', 'SURIGAO DEL SUR', '16', '1668');");
    $conn->exec("INSERT INTO `refprovince`(`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES (87, '168500000', 'DINAGAT ISLANDS', '16', '1685');");

}
?>