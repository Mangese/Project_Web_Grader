# Host: 192.168.1.105  (Version 5.5.57-0ubuntu0.14.04.1)
# Date: 2017-11-19 15:01:23
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
INSERT INTO `class` VALUES (1,'EGCO111'),(2,'EGCO121'),(3,'EGCO222');
/*!40000 ALTER TABLE `class` ENABLE KEYS */;

#
# Structure for table "homework"
#

DROP TABLE IF EXISTS `homework`;
CREATE TABLE `homework` (
  `H_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสงาน',
  `P_ID` int(11) DEFAULT NULL COMMENT 'รหัสโจทย์',
  `LANGUAGE` varchar(255) DEFAULT NULL COMMENT 'ภาษาที่ใช้ตรวจ',
  `S_ID` int(11) DEFAULT NULL COMMENT 'รหัส section',
  `Remark` varchar(255) DEFAULT NULL,
  `DeleteFlag` varchar(255) DEFAULT NULL,
  `AssignDate` date DEFAULT NULL,
  `AssignTime` time DEFAULT NULL,
  `Deadlinedate` date DEFAULT NULL,
  `DeadlineTime` time DEFAULT NULL,
  PRIMARY KEY (`H_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# Data for table "homework"
#


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
INSERT INTO `user` VALUES ('T1','670b14728ad9902aecba32e22fa4f6bd',NULL,'T',NULL,1,'TEACHER1','LASTNAME1','CO','XXX@GMAIL.COM');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
