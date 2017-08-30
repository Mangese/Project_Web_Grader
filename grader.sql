# Host: localhost  (Version 5.7.17-log)
# Date: 2017-08-31 01:25:25
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "class"
#

DROP TABLE IF EXISTS `class`;
CREATE TABLE `class` (
  `CLASS_ID` varchar(255) NOT NULL DEFAULT '0' COMMENT 'รหัสรายวิชา',
  `Class_Name` varchar(255) DEFAULT NULL COMMENT 'ชื่อวิชา',
  PRIMARY KEY (`CLASS_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

#
# Data for table "class"
#


#
# Structure for table "homework"
#

DROP TABLE IF EXISTS `homework`;
CREATE TABLE `homework` (
  `H_ID` varchar(255) NOT NULL DEFAULT 'H_ID' COMMENT 'รหัสงาน',
  `P_ID` varchar(255) DEFAULT NULL COMMENT 'รหัสโจทย์',
  `DEADLINE` date DEFAULT NULL COMMENT 'กำหนดส่ง',
  `LANGUAGE` varchar(255) DEFAULT NULL COMMENT 'ภาษาที่ใช้ตรวจ',
  `S_ID` varchar(255) DEFAULT NULL COMMENT 'รหัส section',
  `Remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`H_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

#
# Data for table "homework"
#


#
# Structure for table "problem"
#

DROP TABLE IF EXISTS `problem`;
CREATE TABLE `problem` (
  `P_ID` varchar(255) NOT NULL DEFAULT 'PROBLEM' COMMENT 'รหัสโจทย์',
  `File_Name` varchar(255) DEFAULT NULL COMMENT 'ชื่อไฟล์ที่อัพโหลด',
  `Class_ID` varchar(255) DEFAULT NULL COMMENT 'รหัสวิชา',
  `User_ID` varchar(255) DEFAULT NULL,
  `Remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`P_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

#
# Data for table "problem"
#


#
# Structure for table "register"
#

DROP TABLE IF EXISTS `register`;
CREATE TABLE `register` (
  `S_ID` varchar(255) DEFAULT NULL COMMENT 'รหัสsection',
  `User_ID` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

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
  `S_ID` varchar(255) NOT NULL DEFAULT 'S_ID',
  `Password` varchar(255) DEFAULT NULL COMMENT 'รหัสเข้าร่วมวิชา',
  `Class_ID` varchar(255) DEFAULT NULL COMMENT 'รหัสรายวิชา',
  `User_ID` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`S_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

#
# Data for table "section"
#


#
# Structure for table "submit"
#

DROP TABLE IF EXISTS `submit`;
CREATE TABLE `submit` (
  `SUB_ID` varchar(255) NOT NULL DEFAULT '' COMMENT 'รหัสการส่ง',
  `User_ID` varchar(255) DEFAULT NULL,
  `H_ID` varchar(255) DEFAULT NULL COMMENT 'รหัสงาน',
  `STATUS` varchar(255) DEFAULT NULL COMMENT 'สถานะการตรวจ',
  `SUBMIT_TIME` time DEFAULT NULL COMMENT 'เวลาที่ส่ง',
  `SUBMIT_DATE` date DEFAULT NULL COMMENT 'วันที่ส่ง',
  `SOURCE_FILE` varchar(255) DEFAULT NULL COMMENT 'ชื่อไฟล์ที่ส่ง',
  PRIMARY KEY (`SUB_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=tis620;

#
# Data for table "submit"
#


#
# Structure for table "test_case"
#

DROP TABLE IF EXISTS `test_case`;
CREATE TABLE `test_case` (
  `H_ID` varchar(255) NOT NULL DEFAULT 'H_ID' COMMENT 'รหัสงาน',
  `OPENCASE_FILE` varchar(255) DEFAULT NULL COMMENT 'ตัวอย่างเคสทดลองที่เปิดเผยได้',
  `CLOSECASE_FILE` varchar(255) DEFAULT NULL COMMENT 'เคสที่ใช้ในการตรวจ',
  PRIMARY KEY (`H_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

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
  `User_ID` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`User_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=tis620;

#
# Data for table "user"
#

