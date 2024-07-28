-- phpMyAdmin SQL Dump -- version 5.2.1 -- https://www.phpmyadmin.net/
-- Host: 127.0.0.1
-- Generation Time: May 30, 2024 at 06:30 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30
SET
    SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
    time_zone = "+00:00";

-- Database: `qrcodedb`
-- Table structure for table `activity_log`
CREATE TABLE
    `activity_log` (
        `id` int (11) NOT NULL,
        `user_id` int (11) NOT NULL,
        `action` varchar(50) NOT NULL,
        `table_name` varchar(50) NOT NULL,
        `table_column` varchar(50) NOT NULL,
        `old_value` varchar(255) DEFAULT NULL,
        `new_value` varchar(255) DEFAULT NULL,
        `timestamp` datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`)
    );

-- Table structure for table `temp_visitor`
CREATE TABLE
    `temp_visitor` (
        `id` int (11) NOT NULL,
        `V_USERID` varchar(20) NOT NULL,
        `userType` varchar(50) NOT NULL,
        `sponsor` varchar(50) NOT NULL,
        `name` varchar(50) NOT NULL,
        `gender` varchar(10) NOT NULL,
        `birthdate` date NOT NULL,
        `cellphoneNumber` varchar(15) NOT NULL,
        `address` varchar(255) NOT NULL,
        `vModel` varchar(50) NOT NULL,
        `vType` varchar(50) NOT NULL,
        `vColor` varchar(50) NOT NULL,
        `vPlateNumber` varchar(20) NOT NULL,
        `avatarImage` varchar(255) NOT NULL,
        `driversLicenseImage` varchar(255) NOT NULL,
        `carImage` varchar(255) NOT NULL,
        `status` varchar(20) NOT NULL DEFAULT 'pending',
        PRIMARY KEY (`id`)
    );

-- Table structure for table `visitor`
CREATE TABLE
    `visitor` (
        `id` int (11) NOT NULL,
        `V_USERID` varchar(20) NOT NULL,
        `userType` varchar(50) NOT NULL,
        `sponsor` varchar(50) NOT NULL,
        `name` varchar(50) NOT NULL,
        `gender` varchar(10) NOT NULL,
        `birthdate` date NOT NULL,
        `cellphoneNumber` varchar(15) NOT NULL,
        `address` varchar(255) NOT NULL,
        `vModel` varchar(50) NOT NULL,
        `vType` varchar(50) NOT NULL,
        `vColor` varchar(50) NOT NULL,
        `vPlateNumber` varchar(20) NOT NULL,
        `avatarImage` varchar(255) NOT NULL,
        `driversLicenseImage` varchar(255) NOT NULL,
        `carImage` varchar(255) NOT NULL,
        `status` varchar(20) NOT NULL DEFAULT 'pending',
        PRIMARY KEY (`id`)
    );

-- Table structure for table `user`
CREATE TABLE
    `user` (
        `id` int (11) NOT NULL,
        `RollNo` varchar(50) NOT NULL,
        `Name` varchar(50) DEFAULT NULL,
        `Type` varchar(50) DEFAULT NULL,
        `EmailId` varchar(50) DEFAULT NULL,
        `MobNo` varchar(13) DEFAULT NULL,
        `Password` varchar(200) DEFAULT NULL,
        `image` varchar(255) NOT NULL,
        `Date_Registered` datetime DEFAULT NULL,
        PRIMARY KEY (`id`),
        KEY `RollNo` (`RollNo`) USING BTREE
    );

-- Dumping data for table `user`
INSERT INTO
    `user` (
        `id`,
        `RollNo`,
        `Name`,
        `Type`,
        `EmailId`,
        `MobNo`,
        `Password`,
        `image`,
        `Date_Registered`
    )
VALUES
    (
        38,
        'admin',
        'admin',
        'admin',
        'admin',
        '+639760120148',
        '$2y$10$9aJkTso//OFS7Sj4PUlDT.PZiBs2qkeQ4cTwgYl1TVHk5nf.TXhsO',
        '6.jpg',
        '2024-04-01 22:51:05'
    ),
    (
        39,
        'emptest',
        'emptest',
        'emp',
        'emptest',
        '+639760120120',
        '$2y$10$AITYPuganDc9K1DCKX.jqOmEqu8r2VMXdkPUSqd2U9hs14Nx.ehaq',
        'IMG-660aca2a943e24.62254703.png',
        '2024-04-01 22:52:26'
    ),
    (
        40,
        'AAAAA',
        'AAAAA',
        'admin',
        'AAAAA',
        '+639760120148',
        '$2y$10$JUC90.49Fw696.J8MsnYAO7XvAtB3rBRHTV3VVFyPZwVN4XeMjN9i',
        'watch.png',
        '2024-05-10 20:44:43'
    ),
    (
        41,
        'admintest',
        'admintest',
        'sadmin',
        'admintest',
        'admintest',
        '$2y$10$R95B8m06l0JFd12rqA7PT.QcNt/iV2046T9Du63BMs.BRotwqxfwa',
        'IMG-663e265b4ca0d2.35740508.png',
        '2024-05-10 21:51:23'
    ),
    (
        42,
        'emptestt',
        'emptestt',
        'emp',
        'emptestt',
        '+639760120120',
        '$2y$10$uIsjTv0s3HNZpzD4kKnyi.joBOenSKwlucPxOyi4Z5LyuH0R/3HlK',
        '9.png',
        '2024-05-10 21:52:14'
    );

-- Table structure for table `vehicle_log`
CREATE TABLE
    `vehicle_log` (
        `ID` int (11) NOT NULL,
        `V_USERID` varchar(250) NOT NULL,
        `TIMEIN` varchar(255) NOT NULL DEFAULT 'current_timestamp(6)',
        `TIMEOUT` varchar(255) NOT NULL,
        `LOGDATE` varchar(255) NOT NULL,
        `STATUS` varchar(250) NOT NULL,
        PRIMARY KEY (`ID`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- Dumping data for table `vehicle_log`
INSERT INTO
    `vehicle_log` (
        `ID`,
        `V_USERID`,
        `TIMEIN`,
        `TIMEOUT`,
        `LOGDATE`,
        `STATUS`
    )
VALUES
    (
        255,
        '0007',
        '2024-05-12 20:03:45',
        '2024-05-12 20:10:43',
        '',
        '1'
    ),
    (
        256,
        '0010',
        '2024-05-12 20:04:03',
        '2024-05-12 20:10:55',
        '',
        '1'
    ),
    (
        257,
        '0001',
        '2024-05-12 20:05:21',
        '2024-05-12 20:11:04',
        '',
        '1'
    ),
    (
        258,
        '0002',
        '2024-05-12 20:05:26',
        '2024-05-24 00:17:05',
        '',
        '1'
    ),
    (
        259,
        '0006',
        '2024-05-12 20:05:31',
        '2024-05-24 01:11:41',
        '',
        '1'
    ),
    (
        260,
        '0009',
        '2024-05-12 20:05:56',
        '2024-05-24 01:14:52',
        '',
        '1'
    ),
    (261, '0012', '2024-05-12 20:06:33', '', '', '0'),
    (
        262,
        '0011',
        '2024-05-12 20:07:49',
        '2024-05-24 01:29:51',
        '',
        '1'
    ),
    (
        263,
        '0001',
        '2024-05-23 23:28:07',
        '2024-05-24 00:14:38',
        '',
        '1'
    ),
    (
        264,
        '0005',
        '2024-05-24 00:34:28',
        '2024-05-24 01:10:36',
        '',
        '1'
    ),
    (
        265,
        '0005',
        '2024-05-24 01:28:40',
        '2024-05-24 01:51:05',
        '',
        '1'
    ),
    (266, '0010', '2024-05-24 01:33:02', '', '', '0'),
    (
        267,
        '0001',
        '2024-05-24 01:35:18',
        '2024-05-30 22:52:48',
        '',
        '1'
    ),
    (
        268,
        '0002',
        '2024-05-24 01:35:28',
        '2024-05-24 02:11:16',
        '',
        '1'
    ),
    (269, '0005', '2024-05-24 01:59:50', '', '', '0'),
    (270, '0011', '2024-05-24 02:10:52', '', '', '0'),
    (271, '0007', '2024-05-30 19:08:31', '', '', '0'),
    (272, '0002', '2024-05-30 22:58:21', '', '', '0'),
    (273, '0014', '2024-05-30 23:06:18', '', '', '0'),
    (
        274,
        '0001',
        '2024-01-12 20:03:45',
        '2024-01-12 20:10:43',
        '',
        '1'
    ),
    (
        275,
        '0002',
        '2024-02-12 20:04:03',
        '2024-02-12 20:10:55',
        '',
        '1'
    ),
    (
        276,
        '0005',
        '2024-03-12 20:05:21',
        '2024-03-12 20:11:04',
        '',
        '1'
    ),
    (
        277,
        '0007',
        '2024-04-12 20:05:26',
        '2024-04-12 20:17:05',
        '',
        '1'
    );

-- Table structure for table `v_user`
CREATE TABLE
    `v_user` (
        `id` int (11) NOT NULL,
        `V_USERID` varchar(20) NOT NULL,
        `userType` varchar(255) NOT NULL,
        `Rank` varchar(50) NOT NULL,
        `Branch_of_Service` varchar(50) NOT NULL,
        `Fullname` varchar(255) NOT NULL,
        `Cellphone_Number` varchar(15) NOT NULL,
        `Date_of_Birth` date NOT NULL,
        `Address` varchar(255) NOT NULL,
        `Office` varchar(255) NOT NULL,
        `Gender` varchar(10) NOT NULL,
        `Vehicle_Model` varchar(50) NOT NULL,
        `Vehicle_Type` varchar(50) NOT NULL,
        `Vehicle_Color` varchar(50) NOT NULL,
        `Vehicle_Plate_Number` varchar(20) NOT NULL,
        `Date_Registered` datetime DEFAULT NULL,
        `image` varchar(255) NOT NULL,
        `imageDL` varchar(255) NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `V_USERID` (`V_USERID`)
    );

-- Dumping data for table `v_user`
INSERT INTO
    `v_user` (
        `id`,
        `V_USERID`,
        `userType`,
        `Rank`,
        `Branch_of_Service`,
        `Fullname`,
        `Cellphone_Number`,
        `Date_of_Birth`,
        `Address`,
        `Office`,
        `Gender`,
        `Vehicle_Model`,
        `Vehicle_Type`,
        `Vehicle_Color`,
        `Vehicle_Plate_Number`,
        `Date_Registered`,
        `image`,
        `imageDL`
    )
VALUES
    (
        75,
        '0001',
        'PSG',
        '1LT',
        'PAF',
        'JUAN A. DELA CRUZ SR.',
        '+639788888888',
        '1998-10-31',
        'ADDRESS EDIT',
        'OFFICE',
        'Male',
        'VMODEL',
        'VTYPE',
        'BLUE',
        'XYZ1234',
        '2024-04-01 21:47:01',
        '0001 - JUAN A. DELA CRUZ SR..jpg',
        ''
    ),
    (
        82,
        '0002',
        'OP',
        '2LT',
        'PAF',
        'JOHN A. DOE',
        '+639123456789',
        '1980-01-01',
        'ADDRESS',
        'OFFICE',
        'Male',
        'Toyota Vios',
        'Sedan',
        'Black',
        'XYZ 123',
        '2024-04-01 22:03:38',
        'DOE_JOHN.jpg',
        ''
    ),
    (
        89,
        '0005',
        'RESIDENT',
        '2LT',
        'PAF',
        'JOHN A. DOE',
        '+639123456789',
        '1980-01-01',
        'MALACAÑANG PARK, MANILA',
        'PPSFU, PSC',
        'Male',
        'Toyota Vios',
        'Sedan',
        'Black',
        'XYZ 123',
        '2024-05-10 22:38:18',
        'DOE_JOHN.jpg',
        ''
    ),
    (
        90,
        '0006',
        'PT',
        '2LT',
        'PNP',
        'JANE B. SMITH',
        '+639876543211',
        '1985-02-11',
        'MALACAÑANG PARK, MANILA',
        '5CAV, PSC',
        'Female',
        'Honda Civic',
        'Coupe',
        'White',
        'ABC 789',
        '2024-05-10 22:38:18',
        'SMITH_JANE.jpg',
        ''
    ),
    (
        91,
        '0007',
        'ST JUDE',
        '2LT',
        'PAF',
        'JUAN C. DELA CRUZ JR.',
        '+639876543211',
        '1999-11-20',
        'MALACAÑANG PARK, MANILA',
        'PPSFU, PSC',
        'Male',
        'Toyota Vios',
        'Sedan',
        'Black',
        'XYZ 123',
        '2024-05-10 22:38:18',
        'DELACRUZ_JUAN_JR.jpg',
        ''
    ),
    (
        95,
        '0009',
        'LPLP',
        'testtdl',
        'testtdl',
        'testtdl',
        '+639760120147',
        '2024-05-08',
        'testtdl',
        'testtdl',
        'Female',
        'testtdl',
        'testtdl',
        'testtdl',
        'testtdl',
        '2024-05-11 02:43:14',
        '0009 - testtdl.png',
        '0009 - testtdl.png'
    ),
    (
        97,
        '0010',
        'VISITOR',
        '1',
        '1',
        '1',
        '+639760120147',
        '2024-05-08',
        '1',
        '1',
        'Female',
        '1',
        '1',
        '1',
        '1',
        '2024-05-11 13:44:28',
        '0010 - 1.png',
        '0010 - 1.png'
    ),
    (
        98,
        '0011',
        '',
        '2',
        '2',
        '2',
        '+639760120147',
        '2024-04-30',
        '2',
        '2',
        'Female',
        '2',
        '2',
        '2jhgj',
        '2',
        '2024-05-11 13:45:08',
        '0011 - 2.png',
        '0011 - 2.png'
    ),
    (
        102,
        '0014',
        'PSG',
        '1LT',
        'PAF',
        'JUAN A. DELA CRUZ SR.',
        '+639788888888',
        '1998-10-31',
        'MALACANANG,PARKEDIT',
        'OFFICE,OFFICE2',
        'Male',
        'VMODEL',
        'VTYPE',
        'BLUE',
        'XYZ1234',
        '2024-05-20 12:41:44',
        '0014 - JUAN A. DELA CRUZ SR..jpg',
        '0014 - JUAN A. DELA CRUZ SR..jpg'
    ),
    (
        103,
        '0015',
        'OP',
        '2LT',
        'PAF',
        'JOHN A. DOE',
        '+639123456789',
        '1980-01-01',
        'ADDRESS,EDIT',
        'OFFICE,OFFICE2',
        'Male',
        'ToyotaVios',
        'Sedan',
        'Black',
        'XYZ123',
        '2024-05-20 12:41:44',
        '0015 - JOHN A. DOE.jpg',
        '0015 - JOHN A. DOE.jpg'
    );

-- Table structure for table `archived_visitor`
CREATE TABLE
    `archived_visitor` (
        `id` int (11) NOT NULL,
        `V_USERID` varchar(20) NOT NULL,
        `userType` varchar(50) NOT NULL,
        `sponsor` varchar(50) NOT NULL,
        `name` varchar(50) NOT NULL,
        `gender` varchar(10) NOT NULL,
        `birthdate` date NOT NULL,
        `cellphoneNumber` varchar(15) NOT NULL,
        `address` varchar(255) NOT NULL,
        `vModel` varchar(50) NOT NULL,
        `vType` varchar(50) NOT NULL,
        `vColor` varchar(50) NOT NULL,
        `vPlateNumber` varchar(20) NOT NULL,
        `avatarImage` varchar(255) NOT NULL,
        `driversLicenseImage` varchar(255) NOT NULL,
        `carImage` varchar(255) NOT NULL,
        `status` varchar(20) NOT NULL DEFAULT 'archived',
        PRIMARY KEY (`id`)
    );

-- Table structure for table `archived_user`
CREATE TABLE
    `archived_user` (
        `id` int (11) NOT NULL,
        `RollNo` varchar(50) NOT NULL,
        `Name` varchar(50) DEFAULT NULL,
        `Type` varchar(50) DEFAULT NULL,
        `EmailId` varchar(50) DEFAULT NULL,
        `MobNo` varchar(13) DEFAULT NULL,
        `Password` varchar(200) DEFAULT NULL,
        `image` varchar(255) NOT NULL,
        `Date_Registered` datetime DEFAULT NULL,
        `status` varchar(20) NOT NULL DEFAULT 'archived',
        PRIMARY KEY (`id`),
        KEY `RollNo` (`RollNo`) USING BTREE
    );

-- Table structure for table `archived_v_user`
CREATE TABLE
    `archived_v_user` (
        `id` int (11) NOT NULL,
        `V_USERID` varchar(20) NOT NULL,
        `userType` varchar(255) NOT NULL,
        `Rank` varchar(50) NOT NULL,
        `Branch_of_Service` varchar(50) NOT NULL,
        `Fullname` varchar(255) NOT NULL,
        `Cellphone_Number` varchar(15) NOT NULL,
        `Date_of_Birth` date NOT NULL,
        `Address` varchar(255) NOT NULL,
        `Office` varchar(255) NOT NULL,
        `Gender` varchar(10) NOT NULL,
        `Vehicle_Model` varchar(50) NOT NULL,
        `Vehicle_Type` varchar(50) NOT NULL,
        `Vehicle_Color` varchar(50) NOT NULL,
        `Vehicle_Plate_Number` varchar(20) NOT NULL,
        `Date_Registered` datetime DEFAULT NULL,
        `image` varchar(255) NOT NULL,
        `imageDL` varchar(255) NOT NULL,
        `status` varchar(20) NOT NULL DEFAULT 'archived',
        PRIMARY KEY (`id`),
        UNIQUE KEY `V_USERID` (`V_USERID`)
    );

-- Indexes for dumped tables
-- Indexes for table `user`
ALTER TABLE `user` ADD PRIMARY KEY (`id`),
ADD KEY `RollNo` (`RollNo`) USING BTREE;

-- Indexes for table `vehicle_log`
ALTER TABLE `vehicle_log` ADD PRIMARY KEY (`ID`);

-- Indexes for table `v_user`
ALTER TABLE `v_user` ADD PRIMARY KEY (`id`),
ADD UNIQUE KEY `V_USERID` (`V_USERID`);

-- Indexes for table `archived_visitor`
ALTER TABLE `archived_visitor` ADD PRIMARY KEY (`id`);

-- Indexes for table `archived_user`
ALTER TABLE `archived_user` ADD PRIMARY KEY (`id`),
ADD KEY `RollNo` (`RollNo`) USING BTREE;

-- Indexes for table `archived_v_user`
ALTER TABLE `archived_v_user` ADD PRIMARY KEY (`id`),
ADD UNIQUE KEY `V_USERID` (`V_USERID`);

-- AUTO_INCREMENT for dumped tables
-- AUTO_INCREMENT for table `user`
ALTER TABLE `user` MODIFY `id` int (11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 43;

-- AUTO_INCREMENT for table `vehicle_log`
ALTER TABLE `vehicle_log` MODIFY `ID` int (11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 278;

-- AUTO_INCREMENT for table `v_user`
ALTER TABLE `v_user` MODIFY `id` int (11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 104;

-- AUTO_INCREMENT for table `archived_visitor`
ALTER TABLE `archived_visitor` MODIFY `id` int (11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 1;

-- AUTO_INCREMENT for table `archived_user`
ALTER TABLE `archived_user` MODIFY `id` int (11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 1;

-- AUTO_INCREMENT for table `archived_v_user`
ALTER TABLE `archived_v_user` MODIFY `id` int (11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 1;

COMMIT;