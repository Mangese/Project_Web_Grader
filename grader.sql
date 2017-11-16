# Host: 192.168.1.192  (Version 5.5.57-0ubuntu0.14.04.1)
# Date: 2017-11-16 17:14:15
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "class"
#

DROP TABLE IF EXISTS `class`;
CREATE TABLE `class` (
  `C_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสรายวิชา',
  `ClassName` varchar(255) DEFAULT NULL COMMENT 'ชื่อวิชา',
  PRIMARY KEY (`C_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "class"
#

/*!40000 ALTER TABLE `class` DISABLE KEYS */;
INSERT INTO `class` VALUES (1,'EGCO111'),(2,'EGCO112');
/*!40000 ALTER TABLE `class` ENABLE KEYS */;

#
# Structure for table "homework"
#

DROP TABLE IF EXISTS `homework`;
CREATE TABLE `homework` (
  `H_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสงาน',
  `P_ID` int(11) DEFAULT NULL COMMENT 'รหัสโจทย์',
  `DEADLINE` date DEFAULT NULL COMMENT 'กำหนดส่ง',
  `LANGUAGE` varchar(255) DEFAULT NULL COMMENT 'ภาษาที่ใช้ตรวจ',
  `S_ID` int(11) DEFAULT NULL COMMENT 'รหัส section',
  `Remark` varchar(255) DEFAULT NULL,
  `DeleteFlag` varchar(255) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Time` time DEFAULT NULL,
  PRIMARY KEY (`H_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "homework"
#

/*!40000 ALTER TABLE `homework` DISABLE KEYS */;
INSERT INTO `homework` VALUES (1,1,NULL,'C',111,NULL,NULL,NULL,NULL),(2,2,NULL,'C',222,NULL,NULL,NULL,NULL),(3,2,NULL,'C',111,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `homework` ENABLE KEYS */;

#
# Structure for table "problem"
#

DROP TABLE IF EXISTS `problem`;
CREATE TABLE `problem` (
  `P_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสโจทย์',
  `File_Name` varchar(255) DEFAULT NULL COMMENT 'ชื่อไฟล์ที่อัพโหลด',
  `C_ID` int(11) DEFAULT NULL COMMENT 'รหัสวิชา',
  `U_ID` int(11) DEFAULT NULL,
  `Remark` varchar(255) DEFAULT NULL,
  `InputFile` varchar(255) DEFAULT NULL,
  `OutputFile` varchar(255) DEFAULT NULL,
  `UploadDate` date DEFAULT NULL,
  `Language` varchar(255) DEFAULT NULL,
  `DeleteFlag` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`P_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

#
# Data for table "problem"
#

/*!40000 ALTER TABLE `problem` DISABLE KEYS */;
INSERT INTO `problem` VALUES (1,'TEST1.pdf',1,5,'โจทย์Cอย่างง่าย','','','2017-09-25','C',NULL),(2,'TEST2.pdf',1,5,'วาดรูปสามเหลี่ยม',NULL,NULL,'2017-09-25','C',NULL),(20,'EGCO1125201710250PDF.pdf',2,5,'ทดสอบระบบ','EGCO1125201710250IN.in','EGCO1125201710250OUT.out','2017-10-25','Java',NULL),(21,'EGCO1115201710272PDF.pdf',1,5,'Problem1(27/10/60)','EGCO1115201710272IN.in','EGCO1115201710272OUT.out','2017-10-27','Cpp',NULL);
/*!40000 ALTER TABLE `problem` ENABLE KEYS */;

#
# Structure for table "register"
#

DROP TABLE IF EXISTS `register`;
CREATE TABLE `register` (
  `S_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสsection',
  `U_ID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`S_ID`,`U_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=239 DEFAULT CHARSET=utf8;

#
# Data for table "register"
#

/*!40000 ALTER TABLE `register` DISABLE KEYS */;
INSERT INTO `register` VALUES (111,5713086),(111,5713087),(111,5713088),(222,5713086),(238,5713088);
/*!40000 ALTER TABLE `register` ENABLE KEYS */;

#
# Structure for table "running"
#

DROP TABLE IF EXISTS `running`;
CREATE TABLE `running` (
  `Name` varchar(11) NOT NULL DEFAULT '',
  `Running` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "running"
#


#
# Structure for table "section"
#

DROP TABLE IF EXISTS `section`;
CREATE TABLE `section` (
  `S_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Password` varchar(255) DEFAULT NULL COMMENT 'รหัสเข้าร่วมวิชา',
  `C_ID` int(11) DEFAULT NULL COMMENT 'รหัสรายวิชา',
  `U_ID` int(11) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`S_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=240 DEFAULT CHARSET=utf8;

#
# Data for table "section"
#

/*!40000 ALTER TABLE `section` DISABLE KEYS */;
INSERT INTO `section` VALUES (111,'cG3e8d',1,5,'EGCO111 Computer Programming (CO) - 1/2560 -'),(222,'T2f4Sbke',1,5,'EGCO111 Computer Programming (EE) - 1/2560 -'),(238,'30QjgbNu',2,5,'EGCO112 Programming Technique(CE) - 1/2560 -'),(239,'TaUi9qor',4,5,'EGCO112 Programming Technique(EGCO) - 1/2560 -');
/*!40000 ALTER TABLE `section` ENABLE KEYS */;

#
# Structure for table "submit"
#

DROP TABLE IF EXISTS `submit`;
CREATE TABLE `submit` (
  `SUB_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการส่ง',
  `U_ID` int(11) DEFAULT NULL,
  `H_ID` int(11) DEFAULT NULL COMMENT 'รหัสงาน',
  `STATUS` varchar(255) DEFAULT NULL COMMENT 'สถานะการตรวจ',
  `SUBMIT_TIME` time DEFAULT NULL COMMENT 'เวลาที่ส่ง',
  `SUBMIT_DATE` date DEFAULT NULL COMMENT 'วันที่ส่ง',
  `SOURCE_FILE` varchar(255) DEFAULT NULL COMMENT 'ชื่อไฟล์ที่ส่ง',
  PRIMARY KEY (`SUB_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

#
# Data for table "submit"
#

/*!40000 ALTER TABLE `submit` DISABLE KEYS */;
INSERT INTO `submit` VALUES (7,5713086,1,'F','04:17:14','2017-09-25',''),(8,5713086,1,'F','04:21:33','2017-09-25',''),(9,5713086,1,'F','04:22:10','2017-09-25',''),(10,5713086,3,'F','04:25:25','2017-09-25',''),(12,5713086,1,'P','04:31:16','2017-09-25','test.c'),(13,5713086,1,'F','04:32:05','2017-09-25','test.c'),(14,5713086,3,'F','04:33:06','2017-09-25','test.c'),(15,5713086,3,'F','14:21:52','2017-09-25','Correct_Example.c'),(16,5713086,3,'T','14:24:35','2017-09-25','Runtime_Error.c'),(17,5713086,3,'T','14:24:36','2017-09-25','Runtime_Error.c'),(18,5713086,3,'F','15:52:29','2017-09-25','Wrong_Example.c'),(19,5713086,3,'T','15:52:50','2017-09-25','Runtime_Error.c'),(20,5713087,1,'F','13:11:53','2017-09-26','Correct_Example.c'),(21,5713087,1,'F','13:19:19','2017-09-26','Correct_Example.c'),(22,5713087,1,'F','13:20:56','2017-09-26','Correct_Example.c'),(23,5713087,1,'F','13:21:33','2017-09-26','Correct_Example.c'),(24,5713087,1,'F','13:22:36','2017-09-26','Correct_Example.c'),(25,5713087,1,'F','13:23:18','2017-09-26','Correct_Example.c'),(28,5713087,1,'P','13:25:11','2017-09-26','Correct_Example.c'),(29,5713088,1,'F','14:41:28','2017-09-26','Wrong_Example.c'),(30,5713088,1,'T','14:42:02','2017-09-26','Runtime_Error.c'),(31,5713088,1,'P','14:42:27','2017-09-26','Correct_Example.c'),(32,5713333,1,'F',NULL,NULL,NULL),(33,5713088,3,'T','13:27:35','2017-09-27','Runtime_Error.c'),(34,5713088,3,'F','13:28:06','2017-09-27','Wrong_Example.c'),(35,5713088,3,'P','13:28:24','2017-09-27','Correct_Example.c'),(36,5713087,3,'T','11:07:38','2017-10-27','Runtime_Error.c'),(37,5713087,3,'F','11:30:25','2017-10-27','Wrong_Example.c');
/*!40000 ALTER TABLE `submit` ENABLE KEYS */;

#
# Structure for table "test_case"
#

DROP TABLE IF EXISTS `test_case`;
CREATE TABLE `test_case` (
  `H_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสงาน',
  `OPENCASE_FILE` varchar(255) DEFAULT NULL COMMENT 'ตัวอย่างเคสทดลองที่เปิดเผยได้',
  `CLOSECASE_FILE` varchar(255) DEFAULT NULL COMMENT 'เคสที่ใช้ในการตรวจ',
  PRIMARY KEY (`H_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "test_case"
#


#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `Username` varchar(255) NOT NULL DEFAULT 'USERNAME',
  `Password` varchar(255) NOT NULL DEFAULT 'PASSWORD',
  `Student_ID` varchar(255) DEFAULT NULL COMMENT 'รหัสนักศึกษา',
  `USER_TYPE` varchar(255) DEFAULT NULL COMMENT 'ประเภทผู้ใช้งาน',
  `Remark` varchar(255) DEFAULT NULL,
  `U_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Firstname` varchar(255) DEFAULT NULL,
  `Lastname` varchar(255) DEFAULT NULL,
  `Department` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`U_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5713092 DEFAULT CHARSET=utf8;

#
# Data for table "user"
#

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('UN','670b14728ad9902aecba32e22fa4f6bd','57111111','S',NULL,2,'FN','LN','Computer Engineering','test01@gmail.com'),('T1','670b14728ad9902aecba32e22fa4f6bd',NULL,'T',NULL,5,'T1FN','T1LN',NULL,'TEST@GMAIL.COM'),('Mangored','72a1e7c61e8206567d93ad49eff4a03b','5713086','S',NULL,5713086,'Mangored','Mangored161','Computer Engineering','chainarhong2@gmail.com'),('S1','670b14728ad9902aecba32e22fa4f6bd','5713011','S',NULL,5713087,'Chainarhong','Dussadevanishaya','Computer Engineering','xxxx@xxxx.com'),('S2','670b14728ad9902aecba32e22fa4f6bd','5713011','S',NULL,5713088,'Chainarhong','Dussadevanishaya','Biomedical Engineering','xxxx@xxxx.com'),('','d41d8cd98f00b204e9800998ecf8427e','','S',NULL,5713089,'','','',''),('S4','670b14728ad9902aecba32e22fa4f6bd','5713017','S',NULL,5713090,'Chainarhong','Dussadevanishaya','Industrial Engineering','xxxx@xxxx.com'),('S6','670b14728ad9902aecba32e22fa4f6bd','5784215','S',NULL,5713091,'TEST','TEST','Electrical Engineering','xxxx@xxxx.com');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
