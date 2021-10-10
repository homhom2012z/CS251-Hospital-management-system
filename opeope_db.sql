-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2021 at 06:42 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opeope_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `addressdb`
--

CREATE TABLE `addressdb` (
  `hospitalNum` int(11) NOT NULL,
  `HouseNum` varchar(20) DEFAULT NULL,
  `Street` varchar(100) DEFAULT NULL,
  `SubDistrict` varchar(100) DEFAULT NULL,
  `District` varchar(100) DEFAULT NULL,
  `Province` varchar(100) DEFAULT NULL,
  `PostalCode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `addressdb`
--

INSERT INTO `addressdb` (`hospitalNum`, `HouseNum`, `Street`, `SubDistrict`, `District`, `Province`, `PostalCode`) VALUES
(1, '99/77', 'Rangsit-Nakorn Na Yok', 'Rang', 'Khlongluang', 'Pathum Thani', 12120),
(2, '299', 'Charoen Nakhon Road', 'Khlong Ton Sai', 'Khlong San', 'Bangkok', 10600),
(3, '13', 'ถนนพระรามที่ ๔', 'แขวง ปทุมวัน', 'เขตปทุมวัน', 'กรุงเทพมหานคร', 10330),
(4, '89', 'ข้างทาง', 'คลองไหน', 'คลองหลวง', 'กรุงไทย', 12120);

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `AID` int(11) NOT NULL,
  `hospitalNum` int(11) NOT NULL,
  `citizenID` varchar(100) NOT NULL,
  `doctorID` varchar(100) DEFAULT NULL,
  `History` varchar(500) DEFAULT NULL,
  `ACategory` varchar(100) DEFAULT NULL,
  `AStatus` varchar(100) DEFAULT NULL,
  `ADate` date DEFAULT NULL,
  `ADescription` varchar(500) DEFAULT NULL,
  `ReserveDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`AID`, `hospitalNum`, `citizenID`, `doctorID`, `History`, `ACategory`, `AStatus`, `ADate`, `ADescription`, `ReserveDate`) VALUES
(1, 1, '2554845536465', 'doctor1', '2021-05-02 : แผนกหูคอจมูก Doctor : doctor1Dis : 1', 'แผนกหูคอจมูก', 'นัดหมาย', '2021-05-01', '1', '2021-05-02'),
(2, 1, '2554845536465', 'doctor1', '2021-05-04 : แผนกจักษุวิทยา Doctor : doctor1Dis : 2', 'แผนกจักษุวิทยา', 'ระหว่างการรักษา', '2021-05-03', '2', '2021-05-04'),
(3, 1, '2554845536465', 'doctor1', '2021-05-06 : แผนกผิวหนัง Doctor : doctor1Dis : 3', 'แผนกผิวหนัง', 'จำหน่าย', '2021-05-05', '3', '2021-05-06'),
(4, 1, '2554845536465', 'doctor1', '2021-05-08 : แผนกศัลยกรรม Doctor : doctor1Dis : 4', 'แผนกศัลยกรรม', 'นัดหมาย', '2021-05-07', '4', '2021-05-08'),
(5, 1, '2554845536465', 'doctor1', '2021-05-10 : แผนกกระดูก Doctor : doctor1Dis : 5', 'แผนกกระดูก', 'นัดหมาย', '2021-05-09', '5', '2021-05-10'),
(6, 1, '2554845536465', 'doctor1', '2021-05-12 : แผนกเด็ก Doctor : doctor1Dis : 6', 'แผนกเด็ก', 'นัดหมาย', '2021-05-11', '6', '2021-05-12'),
(7, 1, '2554845536465', 'doctor1', '2021-05-14 : แผนกเด็ก Doctor : doctor1Dis : 7', 'แผนกเด็ก', 'นัดหมาย', '2021-05-13', '7', '2021-05-14'),
(8, 1, '2554845536465', 'doctor1', '2021-05-27 : แผนกทั่วไป Doctor : doctor1Dis : 8', 'แผนกทั่วไป', 'นัดหมาย', '2021-05-19', '8', '2021-05-27'),
(9, 1, '2554845536465', 'doctor1', 'Date : 2021-06-01 At : แผนกหูคอจมูก By Doctor : doctor1 Disription : มาตามเวลาที่กำหนด Reserve Date : 2021-05-02', 'แผนกหูคอจมูก', 'นัดหมาย', '2021-06-01', 'มาตามเวลาที่กำหนด', '2021-05-02'),
(10, 1, '2554845536465', 'doctor1', '2021-04-27 ที่ : แผนกหูคอจมูก By Doctor : doctor1 Description : ครั้งที่ 1 : 2021-10-12', 'แผนกหูคอจมูก', 'นัดหมาย', '2021-04-27', 'ครั้งที่ 1', '2021-10-12');

-- --------------------------------------------------------

--
-- Table structure for table `dispense`
--

CREATE TABLE `dispense` (
  `PatientID` varchar(100) NOT NULL,
  `DoctorID` varchar(100) NOT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `DispenseID` int(11) NOT NULL,
  `MedicineID` int(11) NOT NULL,
  `Tracking` varchar(20) DEFAULT NULL,
  `TrackingStatus` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dispense`
--

INSERT INTO `dispense` (`PatientID`, `DoctorID`, `Description`, `DispenseID`, `MedicineID`, `Tracking`, `TrackingStatus`) VALUES
('user1', 'doctor1', '1', 1, 1, 'TH215225176', 'C'),
('user2', 'doctor1', '2 Dose/Month', 2, 3, 'TH1264537386', 'P'),
('user1', 'doctor1', '1 seed/ days', 3, 2, 'TH1068760240', 'P'),
('user1', 'doctor1', '1/2 per Days', 4, 4, 'TH87149649', 'P'),
('user1', 'doctor1', '1/2 per Days', 5, 5, 'TH723822954', 'P'),
('user1', 'doctor1', '1/2 per Days', 6, 7, 'TH775932439', 'P'),
('user1', 'doctor1', '1/2 per Days', 7, 8, 'TH1270215255', 'P'),
('user1', 'doctor1', '1/2 per Days', 8, 8, 'TH1498839873', 'P'),
('user1', 'doctor1', '1/2 per Days', 9, 9, 'TH404172385', 'P'),
('user2', 'doctor1', '1/2 per Days', 10, 3, 'TH1784104142', 'P'),
('user2', 'doctor1', '1/2 per Days', 11, 7, 'TH376928564', 'P'),
('user2', 'doctor1', '1/2 per Days', 12, 8, 'TH1110329465', 'P'),
('user2', 'doctor1', '1/2 per Days', 13, 3, 'TH1916385929', 'P'),
('user2', 'doctor1', '12222121212121', 15, 1, 'TH844686454', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `medicalLicenseNumber` varchar(100) NOT NULL,
  `hospitalNum` int(11) NOT NULL,
  `citizenID` varchar(100) NOT NULL,
  `medicalDept` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`medicalLicenseNumber`, `hospitalNum`, `citizenID`, `medicalDept`) VALUES
('LICENSE001', 3, '9766342704209  ', 'Phamarceutical'),
('LISENSE002', 4, '21561651651646', 'General');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `MLicenseNumber` varchar(100) NOT NULL,
  `MedicineID` int(11) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `TradeName` varchar(100) NOT NULL,
  `MedicineProp` varchar(500) NOT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `ExpDate` date DEFAULT NULL,
  `DateOfManual` date DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL,
  `TotalAmount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`MLicenseNumber`, `MedicineID`, `Category`, `TradeName`, `MedicineProp`, `Description`, `ExpDate`, `DateOfManual`, `Price`, `Amount`, `TotalAmount`) VALUES
('MED001', 1, 'category oral solution', 'ABACAVIR GPO (100 MG)', 'Abacavir used to prevent and treat HIV/AIDS.', 'Similar to other nucleoside analog reverse-transcriptase inhibitors (NRTIs),\r\nabacavir is used together with other HIV medications,\r\nand is not recommended by itself', '2030-05-01', '2021-05-01', 150, 1, 100),
('MED002', 2, 'tablet', 'ABACAVIR GPO (300 MG)', 'Abacavir used to prevent and treat HIV/AIDS.', 'Similar to other nucleoside analog reverse-transcriptase inhibitors (NRTIs),\r\nabacavir is used together with other HIV medications,\r\nand is not recommended by itself', '2031-05-01', '2021-05-01', 100, 1, 100),
('MED003', 3, 'tablet', 'HISTAC', 'HISTAC 150MG TABLET is used to treat for indigestion,\r\nheartbu and acid reflux.', 'HISTAC 150MG TABLET is also used for gastro-oesophageal reflux disease (GORD)-this is when you keep on getting acid reflux.\r\nHISTAC 150MG TABLET is also used to prevent and treat stomach ulcers.', '2027-06-01', '2021-05-01', 170, 1, 100),
('MED004', 4, 'tablet', 'JANUMET', 'Janumet (metformin and sitagliptin) is used to reduce blood glucose (sugar) levels in individuals with type 2 diabetes.', 'Janumet (metformin and sitagliptin) is used to reduce blood glucose (sugar) levels in individuals with type 2 diabetes.', '2027-05-01', '2021-05-01', 150, 2, 300),
('MED005', 5, 'tablet', 'JARDIANCE DUO', 'Jardiance Duo is indicated, as an adjunct to diet and exercise,\r\nto improve the control of blood sugar levels in adults aged 18 and over', 'Jardiance Duo is indicated, as an adjunct to diet and exercise,\r\nto improve the control of blood sugar levels in adults aged 18 and over', '2027-06-01', '2021-05-01', 150, 1, 100),
('MED006', 6, 'tablet', 'JANUVIA', 'Januvia increases insulin secretion by the pancreas,\r\nboth acting in different ways against hyperglycemia', 'Januvia increases insulin secretion by the pancreas,\r\nboth acting in different ways against hyperglycemia', '2027-05-01', '2021-05-01', 170, 1, 100),
('MED007', 7, 'sterile gel', 'JUVEDERM VOLUMA WITH LIDOCAINE', 'Juvederm Voluma with Lidocaine is an injectable gel implant intended to restore volume to the face', 'Juvederm Voluma with Lidocaine is an injectable gel implant intended to restore volume to the face', '2027-05-01', '2021-05-01', 150, 2, 100),
('MED008', 8, 'tablet', 'JENY-F.M.P.', 'Lo/Jeny-FMP-28 contains a combination of ethinyl estradiol and Norgestrel (Jeny-FMP).', 'Ethinyl estradiol and Norgestrel (Jeny-FMP) are female hormones that prevent ovulation (the release of an egg from an ovary).\r\nLo/Jeny-FMP-28 also causes changes in your cervical mucus and uterine lining, making it harder for sperm to reach the uterus and harder for a fertilized egg to attach to the uterus.', '2027-05-01', '2021-05-01', 150, 1, 100),
('MED009', 9, 'solution', 'MYSEPTIC MYBACIN', 'Greater Myseptic Mybacin Lozenges Lemon flavour with Zinc help relieve sore throat,\r\nprovide refreshing sensation. Combines Zinc that is necessary for body\'s growth.', 'Greater Myseptic Mybacin Lozenges Lemon flavour with Zinc help relieve sore throat,\r\nprovide refreshing sensation. Combines Zinc that is necessary for body\'s growth.', '2027-05-01', '2021-05-01', 150, 1, 150),
('MED010', 10, 'oral paste', 'ULCERID ORAL PASTE', 'Ulcerid 100 MG Gel is prescribed as the short-term treatment of active duodenal ulcers and benign gastric ulcers.', 'This medicine is also prescribed for long-term prophylaxis of duodenal ulcer and gastric hypersecretory states, recurrent postoperative ulcer,\r\nprevention of acid-aspiration pneumonitis during surgery, and prevention of stress-induced ulcers.', '2027-05-01', '2021-05-01', 100, 1, 150);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `citizenID` varchar(100) NOT NULL,
  `hospitalNum` int(11) NOT NULL,
  `history` varchar(500) DEFAULT NULL,
  `drugAllergy` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`citizenID`, `hospitalNum`, `history`, `drugAllergy`) VALUES
('1816671729728  ', 2, '-', '-'),
('2554845536465', 1, '2021-05-02 : แผนกหูคอจมูก Doctor : doctor1Dis : 1\r\n2021-05-04 : แผนกจักษุวิทยา Doctor : doctor1Dis : 2\r\n2021-05-06 : แผนกผิวหนัง Doctor : doctor1Dis : 3', '-');

-- --------------------------------------------------------

--
-- Table structure for table `userdb`
--

CREATE TABLE `userdb` (
  `hospitalNum` int(11) NOT NULL,
  `userType` int(1) NOT NULL,
  `userID` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `citizenID` varchar(100) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `birthDate` date NOT NULL,
  `age` int(11) DEFAULT NULL,
  `nationality` varchar(100) NOT NULL,
  `profilepic` varchar(500) DEFAULT NULL,
  `tel` varchar(11) DEFAULT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userdb`
--

INSERT INTO `userdb` (`hospitalNum`, `userType`, `userID`, `email`, `password`, `firstName`, `lastName`, `citizenID`, `gender`, `birthDate`, `age`, `nationality`, `profilepic`, `tel`, `address`) VALUES
(1, 0, 'user1', 'user1@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'Patient', 'A', '2554845536465', 'F', '1981-01-01', 40, 'Thai', 'pat_2.jpg', '0815917122', ''),
(2, 0, 'user2', 'user2@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'Patient', 'B', '1816671729728  ', 'F', '1997-01-01', 24, 'Thai', 'pat_1.jpg', '0621711799', ''),
(3, 1, 'doctor1', 'doctor1', 'c4ca4238a0b923820dcc509a6f75849b', 'Doctor', 'A', '9766342704209 ', 'F', '1989-07-07', 31, 'Thai/Japan', 'doc_1.jpg', '0621299999', ''),
(4, 1, 'Doctor2', 'Doctor@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'Docter', 'Hewgo', '21561651651646', 'M', '2001-03-29', 20, 'เขมร/ลาว/พม่า', 'pat_3.jpg', '0999999999', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addressdb`
--
ALTER TABLE `addressdb`
  ADD PRIMARY KEY (`hospitalNum`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`AID`,`citizenID`),
  ADD KEY `FK_hospNum_app` (`hospitalNum`);

--
-- Indexes for table `dispense`
--
ALTER TABLE `dispense`
  ADD PRIMARY KEY (`DispenseID`),
  ADD KEY `FK_medID` (`MedicineID`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`medicalLicenseNumber`),
  ADD KEY `FK_hospNum_Doctor` (`hospitalNum`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`MedicineID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`citizenID`),
  ADD KEY `FK_hospNum` (`hospitalNum`);

--
-- Indexes for table `userdb`
--
ALTER TABLE `userdb`
  ADD PRIMARY KEY (`hospitalNum`,`userID`,`citizenID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `AID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dispense`
--
ALTER TABLE `dispense`
  MODIFY `DispenseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `MedicineID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `userdb`
--
ALTER TABLE `userdb`
  MODIFY `hospitalNum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addressdb`
--
ALTER TABLE `addressdb`
  ADD CONSTRAINT `FK_hospNum_addr` FOREIGN KEY (`hospitalNum`) REFERENCES `userdb` (`hospitalNum`);

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `FK_hospNum_app` FOREIGN KEY (`hospitalNum`) REFERENCES `userdb` (`hospitalNum`);

--
-- Constraints for table `dispense`
--
ALTER TABLE `dispense`
  ADD CONSTRAINT `FK_medID` FOREIGN KEY (`MedicineID`) REFERENCES `medicine` (`MedicineID`);

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `FK_hospNum_Doctor` FOREIGN KEY (`hospitalNum`) REFERENCES `userdb` (`hospitalNum`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `FK_hospNum` FOREIGN KEY (`hospitalNum`) REFERENCES `userdb` (`hospitalNum`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
