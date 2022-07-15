DROP TABLE IF EXISTS account;

CREATE TABLE `account` (
  `uid` varchar(50) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(1000) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `password_status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`),
  CONSTRAINT `account_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO account VALUES("admin_01","Admin","XnCOFXzvzFGHXS/GZ5kVEZ9PAE2N+oCeqydK87yGuwo=","active","changed");
INSERT INTO account VALUES("editor_01","editor","XnCOFXzvzFGHXS/GZ5kVEZ9PAE2N+oCeqydK87yGuwo=","active","changed");
INSERT INTO account VALUES("head_01","dmuit_head","XnCOFXzvzFGHXS/GZ5kVEZ9PAE2N+oCeqydK87yGuwo=","active","changed");
INSERT INTO account VALUES("head_02","dmusw_head","XnCOFXzvzFGHXS/GZ5kVEZ9PAE2N+oCeqydK87yGuwo=","active","changed");
INSERT INTO account VALUES("reg_01","dmurreg","XnCOFXzvzFGHXS/GZ5kVEZ9PAE2N+oCeqydK87yGuwo=","active","changed");
INSERT INTO account VALUES("reg_02","bdureg","r40tXLqSv9m/peVnAhDM+o7JSqE0qbz7S04PNk3qTi4=","active","unchanged");
INSERT INTO account VALUES("setter_01","itsetter","XnCOFXzvzFGHXS/GZ5kVEZ9PAE2N+oCeqydK87yGuwo=","active","changed");
INSERT INTO account VALUES("setter_02","sw_setter","XnCOFXzvzFGHXS/GZ5kVEZ9PAE2N+oCeqydK87yGuwo=","active","changed");
INSERT INTO account VALUES("setter_03","plant_setter","r40tXLqSv9m/peVnAhDM+o7JSqE0qbz7S04PNk3qTi4=","active","unchanged");
INSERT INTO account VALUES("TER/4641/08","cand_10_TER/4641/08","XnCOFXzvzFGHXS/GZ5kVEZ9PAE2N+oCeqydK87yGuwo=","inactive","changed");
INSERT INTO account VALUES("TER/4642/08","cand_11_TER/4642/08","Hxmo+JMghveLuUqFAbr5jjUDMUzFUZfSDURCXIYM3Do=","inactive","unchanged");
INSERT INTO account VALUES("TER/4643/08","cand_12_TER/4643/08","gM9usieQ5RQ50bfz1P43hHqGYT3Y4/o/nsSsevPAtOU=","inactive","unchanged");
INSERT INTO account VALUES("TER/4644/08","cand_13_TER/4644/08","9rPzaUvg3HA9VskEU9Hkz27u8LcJKSbNWmdlU4QG4Nc=","inactive","unchanged");
INSERT INTO account VALUES("TER/4645/08","cand_14_TER/4645/08","zNf90V2yLO0JO2fnkb2drrFzeHwAgejb6y59t2TwoKo=","inactive","unchanged");
INSERT INTO account VALUES("TER/4682/07","cand_10","XnCOFXzvzFGHXS/GZ5kVEZ9PAE2N+oCeqydK87yGuwo=","inactive","changed");
INSERT INTO account VALUES("TER/4683/08","cand_11","XnCOFXzvzFGHXS/GZ5kVEZ9PAE2N+oCeqydK87yGuwo=","inactive","changed");


DROP TABLE IF EXISTS attempt;

CREATE TABLE `attempt` (
  `at_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`at_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS candidate;

CREATE TABLE `candidate` (
  `cid` varchar(20) NOT NULL,
  `dept` varchar(50) DEFAULT NULL,
  `colleage` varchar(50) DEFAULT NULL,
  `unversity` varchar(50) DEFAULT NULL,
  `rid` varchar(20) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  PRIMARY KEY (`cid`),
  KEY `rid` (`rid`),
  CONSTRAINT `candidate_ibfk_1` FOREIGN KEY (`rid`) REFERENCES `registrar` (`rid`),
  CONSTRAINT `candidate_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `user` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO candidate VALUES("TER/4641/08","Software Engineering ","Technology","Debre Markos University","reg_01","2010");
INSERT INTO candidate VALUES("TER/4642/08","Software Engineering ","Technology","Debre Markos University","reg_01","2010");
INSERT INTO candidate VALUES("TER/4643/08","Software Engineering ","Technology","Debre Markos University","reg_01","2010");
INSERT INTO candidate VALUES("TER/4644/08","Software Engineering ","Technology","Debre Markos University","reg_01","2010");
INSERT INTO candidate VALUES("TER/4645/08","Software Engineering ","Technology","Debre Markos University","reg_01","2010");
INSERT INTO candidate VALUES("TER/4682/07","Information Technology ","Technology","Debre Markos University","reg_01","2010");
INSERT INTO candidate VALUES("TER/4683/08","Information Technology ","Technology","Debre Markos University","reg_01","2010");


DROP TABLE IF EXISTS comment;

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `content` varchar(2000) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

INSERT INTO comment VALUES("1","setter_01","Nardos","Enawgaw","2018-05-24","ardi@gmail.com","ffdd","unread");
INSERT INTO comment VALUES("2","setter_01","Nardos","Enawgaw","2018-05-24","ardi@gmail.com","dd","unread");
INSERT INTO comment VALUES("3","setter_01","Nardos","Enawgaw","2018-05-24","ardi@gmail.com","vfgg","unread");
INSERT INTO comment VALUES("4","setter_01","Nardos","Enawgaw","2018-05-24","ardi@gmail.com","ggg","unread");
INSERT INTO comment VALUES("5","setter_01","Nardos","Enawgaw","2018-05-24","ardi@gmail.com","gg","unread");
INSERT INTO comment VALUES("6","setter_01","Nardos","Enawgaw","2018-05-24","ardi@gmail.com","gg","unread");
INSERT INTO comment VALUES("7","setter_01","Nardos","Enawgaw","2018-05-24","ardi@gmail.com","rfg","unread");
INSERT INTO comment VALUES("8","setter_01","Nardos","Enawgaw","2018-05-24","ardi@gmail.com","gfgg","unread");
INSERT INTO comment VALUES("9","admin_01","Mulur","Fentie","2018-05-24","mf@gmail.com","eeee","unread");
INSERT INTO comment VALUES("10","setter_01","Nardos","Enawgaw","2018-05-24","ardi@gmail.com","fff","unread");
INSERT INTO comment VALUES("11","setter_01","Nardos","Enawgaw","2018-05-24","ardi@gmail.com","fff","unread");
INSERT INTO comment VALUES("12","setter_01","Nardos","Enawgaw","2018-05-24","ardi@gmail.com","gggg","unread");
INSERT INTO comment VALUES("13","setter_01","Nardos","Enawgaw","2018-05-24","ardi@gmail.com","ggg","unread");
INSERT INTO comment VALUES("14","head_02","Muluye","Belachew","2018-05-24","mf@gmail.com","fbf","unread");
INSERT INTO comment VALUES("15","setter_01","Nardos","Enawgaw","2018-05-24","ardi@gmail.com","ff","unread");
INSERT INTO comment VALUES("16","head_02","Muluye","Belachew","2018-05-24","mf@gmail.com","sddd","unread");
INSERT INTO comment VALUES("17","head_02","Muluye","Belachew","2018-05-24","mf@gmail.com","yhgxhsthh","unread");
INSERT INTO comment VALUES("18","head_02","Muluye","Belachew","2018-05-24","mf@gmail.com","hth","unread");
INSERT INTO comment VALUES("19","reg_01","Yitayal","Mengiste","2018-05-24","ardi@gmail.com","dffd","unread");
INSERT INTO comment VALUES("20","admin_01","Mulur","Fentie","2018-05-24","mf@gmail.com","hghc","unread");
INSERT INTO comment VALUES("21","reg_01","Yitayal","Mengiste","2018-05-24","ardi@gmail.com","ffdfd","unread");
INSERT INTO comment VALUES("22","TER/4682/07","Muluye","Fentie","2018-05-24","ma@gmail.com","rre","unread");
INSERT INTO comment VALUES("23","admin_01","Mulur","Fentie","2018-05-31","mf@gmail.com","admin","unread");


DROP TABLE IF EXISTS department;

CREATE TABLE `department` (
  `did` varchar(50) NOT NULL,
  `cname` varchar(50) DEFAULT NULL,
  `dname` varchar(50) DEFAULT NULL,
  `uid` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`did`),
  KEY `uid` (`uid`),
  CONSTRAINT `department_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `university` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO department VALUES("D01","Technology","Information Technology ","U01");
INSERT INTO department VALUES("D02","Technology","Software Engineering ","U01");
INSERT INTO department VALUES("D03","Agriculture and Natural Resource","Plant Science","U01");
INSERT INTO department VALUES("D04","Agriculture and Natural Resource","Animal Science","U01");
INSERT INTO department VALUES("D05","Health Science","Nursing","U01");
INSERT INTO department VALUES("D06","Technology","Information Technology ","U02");
INSERT INTO department VALUES("D07","Agriculture and Natural Resource","Plant Science","U02");


DROP TABLE IF EXISTS depthead;

CREATE TABLE `depthead` (
  `did` varchar(20) NOT NULL,
  `dname` varchar(50) DEFAULT NULL,
  `uid` varchar(50) DEFAULT NULL,
  `eid` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`did`),
  KEY `eid` (`eid`),
  CONSTRAINT `depthead_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `exameditor` (`eid`),
  CONSTRAINT `depthead_ibfk_2` FOREIGN KEY (`did`) REFERENCES `user` (`uid`),
  CONSTRAINT `depthead_ibfk_3` FOREIGN KEY (`did`) REFERENCES `user` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO depthead VALUES("head_01","Information Technology ","U01","editor_01");
INSERT INTO depthead VALUES("head_02","Software Engineering ","U01","editor_01");


DROP TABLE IF EXISTS exam_passord;

CREATE TABLE `exam_passord` (
  `pw_id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(100) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  PRIMARY KEY (`pw_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO exam_passord VALUES("2","abebe","2010");


DROP TABLE IF EXISTS examdate;

CREATE TABLE `examdate` (
  `date_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_type` varchar(50) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  PRIMARY KEY (`date_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO examdate VALUES("1","Regular","2018-05-25","2018-05-27","01:00:00","12:59:00","2010");
INSERT INTO examdate VALUES("2","Re_Exam","2018-05-21","2018-05-28","03:00:00","08:10:00","2010");
INSERT INTO examdate VALUES("3","Payment","2018-05-01","2018-05-01","01:00:00","10:00:00","2010");


DROP TABLE IF EXISTS exameditor;

CREATE TABLE `exameditor` (
  `eid` varchar(30) NOT NULL,
  PRIMARY KEY (`eid`),
  CONSTRAINT `exameditor_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `user` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO exameditor VALUES("editor_01");


DROP TABLE IF EXISTS examsetter;

CREATE TABLE `examsetter` (
  `sid` varchar(20) NOT NULL,
  `dname` varchar(50) DEFAULT NULL,
  `eid` varchar(30) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `dname` (`dname`),
  KEY `eid` (`eid`),
  CONSTRAINT `examsetter_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `exameditor` (`eid`),
  CONSTRAINT `examsetter_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `user` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO examsetter VALUES("setter_01","Information Technology ","editor_01","2010");
INSERT INTO examsetter VALUES("setter_02","Software Engineering ","editor_01","2010");
INSERT INTO examsetter VALUES("setter_03","Plant Science","editor_01","2010");


DROP TABLE IF EXISTS logtable;

CREATE TABLE `logtable` (
  `lig_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `login_time` varchar(50) DEFAULT NULL,
  `logout_time` varchar(50) DEFAULT NULL,
  `start_time` varchar(50) DEFAULT NULL,
  `activity_type` varchar(50) DEFAULT NULL,
  `activity_performed` varchar(2000) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`lig_id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

INSERT INTO logtable VALUES("40","reg_01","dmurreg","Registrar","06:41:24","06:47:28","24 May 2018 @ 06:45:49","Register Candidate","id:TER/4682/07  Frist Name:Muluye Father Name:Fentie Last Name:Admas \n     sex:mphone:0936343712year:2010dept:Information Technology university:Debre Markos University","127.0.0.1","2018-05-24");
INSERT INTO logtable VALUES("41","reg_01","dmurreg","Registrar","06:41:24","06:47:28","24 May 2018 @ 06:46:47","Register Candidate","id:TER/4683/08  Frist Name:Memar Father Name:Alemayehu Last Name:abex \n     sex:mphone:0963636363year:2010dept:Information Technology university:Debre Markos University","127.0.0.1","2018-05-24");
INSERT INTO logtable VALUES("42","admin_01","Admin","Candidate","06:47:46","07:04:27","24 May 2018 @ 06:47:57","create account","created User account Information(userid=TER/4682/07,username=cand_10,password=1tEr2BGtoQ4E2X4sRRsPS3N2WQMKA4i3JLhVrQbQM1Y=,status=active)","127.0.0.1","2018-05-24");
INSERT INTO logtable VALUES("43","admin_01","Admin","Candidate","06:47:46","07:04:27","24 May 2018 @ 06:47:57","create account","created User account Information(userid=TER/4683/08,username=cand_11,password=3eOvKX/U0scgNPD08BP67XJn2kGA+vvGTMmNhdZUw6s=,status=active)","127.0.0.1","2018-05-24");
INSERT INTO logtable VALUES("44","TER/4682/07","cand_10","Candidate","06:54:17","06:57:59","24 May 2018 @ 06:54:21","send comment to exam editor","content of comment(rre)","127.0.0.1","2018-05-24");
INSERT INTO logtable VALUES("45","TER/4682/07","cand_10","Candidate","07:11:05","07:15:50","24 May 2018 @ 07:12:07","Take Exit Exam as Regular","During These Time Candidate Take Exam.Detail Information<br>\n          [Candidate_ID:TER/4682/07,Department:Information Technology ,University:Debre Markos University,Year:2010]","127.0.0.1","2018-05-24");
INSERT INTO logtable VALUES("46","TER/4682/07","cand_10","Candidate","07:11:05","07:15:50","24 May 2018 @ 07:13:12","Take Exit Exam as Regular","During These Time Candidate Take Exam.Detail Information<br>\n          [Candidate_ID:TER/4682/07,Department:Information Technology ,University:Debre Markos University,Year:2010]","127.0.0.1","2018-05-24");
INSERT INTO logtable VALUES("47","TER/4682/07","cand_10","Candidate","07:11:05","07:15:50","24 May 2018 @ 07:14:12","Take Exit Exam as Regular","During These Time Candidate Take Exam.Detail Information<br>\n          [Candidate_ID:TER/4682/07,Department:Information Technology ,University:Debre Markos University,Year:2010]","127.0.0.1","2018-05-24");
INSERT INTO logtable VALUES("48","TER/4682/07","cand_10","Candidate","07:11:05","07:15:50","24 May 2018 @ 07:15:24","Take Exit Exam as Regular","During These Time Candidate Take Exam.Detail Information<br>\n          [Candidate_ID:TER/4682/07,Department:Information Technology ,University:Debre Markos University,Year:2010]","127.0.0.1","2018-05-24");
INSERT INTO logtable VALUES("49","TER/4682/07","cand_10","Candidate","07:16:52","07:22:00","24 May 2018 @ 07:17:05","Request","Candidate Send Requuest To Exam Editor\n          [Candidate_ID:TER/4682/07,Department:Information Technology ,,Year:2010,Content:i take rexam]","127.0.0.1","2018-05-24");
INSERT INTO logtable VALUES("50","TER/4682/07","cand_10","Candidate","07:22:06","07:24:15","24 May 2018 @ 07:24:05","Take Exit Exam as Re_Exam","During These Time Candidate Take Exam.Detail Information<br>\n          [Candidate_ID:TER/4682/07,Department:Information Technology ,University:Debre Markos University,Year:2010]","127.0.0.1","2018-05-24");
INSERT INTO logtable VALUES("51","TER/4683/08","cand_11","Candidate","07:27:32","07:27:59","24 May 2018 @ 07:27:55","Take Exit Exam as Regular","During These Time Candidate Take Exam.Detail Information<br>\n          [Candidate_ID:TER/4683/08,Department:Information Technology ,University:Debre Markos University,Year:2010]","127.0.0.1","2018-05-24");
INSERT INTO logtable VALUES("52","admin_01","Admin","Admin","07:29:07","empty","24 May 2018 @ 07:29:17","View Total Report","View Report Of <br>Total candidate Who taken Exit Exam(Female=0,Male=1,total=1),Result(Competent=1,Total Non Competent=0,Total=1)","127.0.0.1","2018-05-24");
INSERT INTO logtable VALUES("53","admin_01","Admin","Admin","07:29:07","empty","24 May 2018 @ 07:29:23","View Total Report","View Report Of <br>Total candidate Who taken Exit Exam(Female=0,Male=2,total=2),Result(Competent=2,Total Non Competent=0,Total=2)","127.0.0.1","2018-05-24");
INSERT INTO logtable VALUES("54","admin_01","Admin","Admin","12:02:20","12:02:30","26 May 2018 @ 12:02:27","create account","created User account Information(userid=TER/4641/08,username=cand_10,password=ZpUt+Mv2QQCxv3x2fWGPbHpgvWncxitxm7kDmRFMgeY=,status=active)","127.0.0.1","2018-05-26");
INSERT INTO logtable VALUES("55","admin_01","Admin","Admin","12:02:20","12:02:30","26 May 2018 @ 12:02:27","create account","created User account Information(userid=TER/4642/08,username=cand_11,password=Hxmo+JMghveLuUqFAbr5jjUDMUzFUZfSDURCXIYM3Do=,status=active)","127.0.0.1","2018-05-26");
INSERT INTO logtable VALUES("56","admin_01","Admin","Admin","12:02:20","12:02:30","26 May 2018 @ 12:02:27","create account","created User account Information(userid=TER/4643/08,username=cand_12,password=gM9usieQ5RQ50bfz1P43hHqGYT3Y4/o/nsSsevPAtOU=,status=active)","127.0.0.1","2018-05-26");
INSERT INTO logtable VALUES("57","admin_01","Admin","Admin","12:02:20","12:02:30","26 May 2018 @ 12:02:27","create account","created User account Information(userid=TER/4644/08,username=cand_13,password=9rPzaUvg3HA9VskEU9Hkz27u8LcJKSbNWmdlU4QG4Nc=,status=active)","127.0.0.1","2018-05-26");
INSERT INTO logtable VALUES("58","admin_01","Admin","Admin","12:02:20","12:02:30","26 May 2018 @ 12:02:27","create account","created User account Information(userid=TER/4645/08,username=cand_14,password=zNf90V2yLO0JO2fnkb2drrFzeHwAgejb6y59t2TwoKo=,status=active)","127.0.0.1","2018-05-26");
INSERT INTO logtable VALUES("59","TER/4641/08","cand_10_TER/4641/08","Candidate","12:44:22","12:53:35","26 May 2018 @ 12:50:46","Take Exit Exam as Regular","During These Time Candidate Take Exam.Detail Information<br>\n          [Candidate_ID:TER/4641/08,Department:Software Engineering ,University:Debre Markos University,Year:2010]","127.0.0.1","2018-05-26");
INSERT INTO logtable VALUES("60","admin_01","Admin","Admin","12:56:33","01:01:54","31 May 2018 @ 12:59:22","send comment to exam editor","content of comment(admin)","127.0.0.1","2018-05-31");
INSERT INTO logtable VALUES("61","admin_01","Admin","Admin","12:56:33","01:01:54","31 May 2018 @ 01:01:39","Update user account ","update User account Information(userid=TER/4682/07,username=cand_10,status of  active user change by inactive or blocked)","127.0.0.1","2018-05-31");
INSERT INTO logtable VALUES("62","admin_01","Admin","Admin","01:07:02","empty","31 May 2018 @ 01:08:17","Backup database","Admin take backup database to path= C:/wamp/www/WBGEE/admin/backup","127.0.0.1","2018-05-31");


DROP TABLE IF EXISTS notice;

CREATE TABLE `notice` (
  `notice_number` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `Dates` date DEFAULT NULL,
  `Ex_Dates` date DEFAULT NULL,
  `Content` varchar(2000) DEFAULT NULL,
  `sender` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`notice_number`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO notice VALUES("1","regular","Computer","2018-05-24","2018-05-25","Before update or editing the Exam setter profile,Frist you must expected to know the ID number of the registerd examsetter .After that we can edit/update the profile by enter the ID number of the Examsetternder below search textbox and then click on search button.after click the search button the profile became fill with form.so we can edit in the textbox and listbox of the form,but the ID number is not update beacuse it is primary key .after fill the form that you want to update click on update button and finally display \"a record is update sucessfully\"","Exam Editor");
INSERT INTO notice VALUES("2","reexam","Computer","2018-05-24","2018-05-26","Before update or editing the Exam setter profile,Frist you must expected to know the ID number of the registerd examsetter .After that we can edit/update the profile by enter the ID number of the Examsetternder below search textbox and then click on search button.after click the search button the profile became fill with form.so we can edit in the textbox and listbox of the form,but the ID number is not update beacuse it is primary key .after fill the form that you want to update click on update button and finally display \"a record is update sucessfully\"","Exam Editor");
INSERT INTO notice VALUES("3","regular","About ExitExam","2018-05-26","2018-05-27","Before update or editing the Exam setter profile,Frist you must expected to know the ID number of the registerd examsetter .After that we can edit/update the profile by enter the ID number of the Examsetternder below search textbox and then click on search button.after click the search button the profile became fill with form.so we can edit in the textbox and listbox of the form,but the ID number is not update beacuse it is primary key .after fill the form that you want to update click on update button and finally display \"a record is update sucessfully\"","Exam Editor");
INSERT INTO notice VALUES("4","regular","About ExitExam","2018-05-26","2018-05-29","Before update or editing the Exam setter profile,Frist you must expected to know the ID number of the registerd examsetter .After that we can edit/update the profile by enter the ID number of the Examsetternder below search textbox and then click on search button.after click the search button the profile became fill with form.so we can edit in the textbox and listbox of the form,but the ID number is not update beacuse it is primary key .after fill the form that you want to update click on update button and finally display \"a record is update sucessfully\"","Exam Editor");
INSERT INTO notice VALUES("5","reexam","About ExitExam","2018-05-26","2018-05-30","Before update or editing the Exam setter profile,Frist you must expected to know the ID number of the registerd examsetter .After that we can edit/update the profile by enter the ID number of the Examsetternder below search textbox and then click on search button.after click the search button the profile became fill with form.so we can edit in the textbox and listbox of the form,but the ID number is not update beacuse it is primary key .after fill the form that you want to update click on update button and finally display \"a record is update sucessfully\"","Exam Editor");


DROP TABLE IF EXISTS notification;

CREATE TABLE `notification` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(50) DEFAULT NULL,
  `dept` varchar(50) DEFAULT NULL,
  `unvisersity` varchar(50) DEFAULT NULL,
  `resean` varchar(2000) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `dates` date DEFAULT NULL,
  `editor_status` varchar(20) DEFAULT NULL,
  `user_status` varchar(20) DEFAULT NULL,
  `pay_fee` varchar(20) DEFAULT NULL,
  `check_status` varchar(20) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `user_last_response` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO notification VALUES("1","TER/4682/07","Information Technology ","Debre Markos University","i take rexam","2010","2018-05-24","read","read","Yes","Yes","../editor/Bank_Receipt/bank_receipt.jpg","Yes");


DROP TABLE IF EXISTS question;

CREATE TABLE `question` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) DEFAULT NULL,
  `dept` varchar(50) DEFAULT NULL,
  `question` varchar(767) DEFAULT NULL,
  `optiona` varchar(1000) DEFAULT NULL,
  `optionb` varchar(1000) DEFAULT NULL,
  `optionc` varchar(1000) DEFAULT NULL,
  `optiond` varchar(1000) DEFAULT NULL,
  `answer` varchar(1000) DEFAULT NULL,
  `question_type` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `sid` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`qid`),
  UNIQUE KEY `question` (`question`),
  KEY `sid` (`sid`),
  CONSTRAINT `question_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `examsetter` (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

INSERT INTO question VALUES("1","2010","Information Technology ","Which of the following is not an output device?","Keyboard","Monitor","printer","speaker","A","Regular","active","setter_01");
INSERT INTO question VALUES("2","2010","Information Technology ","Which of the following represents one billion characters?","Byte","Gigabyte","Kilobyte","Megabyte","B","Regular","active","setter_01");
INSERT INTO question VALUES("3","2010","Information Technology ","Which of the following is not a version of the Windows operating system software for the PC?","98 and 95","Linux","ME","XP","B","Regular","active","setter_01");
INSERT INTO question VALUES("4","2010","Information Technology ","How many bits make a byte?","16 bits","8 bits","4 bits","24 bits","B","Regular","active","setter_01");
INSERT INTO question VALUES("5","2010","Information Technology ","What is the meaning of (CPU)?","Central Processing Unit","Critical Processing Unit","Crucial Processing Unit","Central Printing Unit","A","Re_Exam","active","setter_01");
INSERT INTO question VALUES("6","2010","Information Technology ","The process of starting or restarting a computer is called:","booting","Start up point","Connecting","Resetting","B","Re_Exam","active","setter_01");
INSERT INTO question VALUES("7","2010","Software Engineering ","RAD stands for__________","Relative Application Development","Rapid Application Development","Rapid Application Document","None of the mentioned","B","Regular","active","setter_02");
INSERT INTO question VALUES("8","2010","Software Engineering ","What is the major drawback of using RAD Model?","Highly specialized & skilled developers/designers are required","Increases re-usability of components","Encourages customer/client feedback","Increases re-usability of components, Highly specialized & skilled developers/designers are required","D","Regular","active","setter_02");
INSERT INTO question VALUES("9","2010","Software Engineering ","SDLC stands for_________","Software Development Life Cycle","System Development Life cycle","Software Design Life Cycle","System Design Life Cycle","A","Regular","active","setter_02");
INSERT INTO question VALUES("10","2010","Software Engineering ","Which model can be selected if user is involved in all the phases of SDLC?","Waterfall Model","Prototyping Model","RAD Model","Prototyping Model & RAD Model","C","Regular","active","setter_02");
INSERT INTO question VALUES("11","2010","Software Engineering ","Which one of the following is not a phase of Prototyping Model?","Quick Design","Coding","Prototype Refinement","Engineer Product","B","Regular","active","setter_02");
INSERT INTO question VALUES("12","2010","Software Engineering ","Production support is the main feature of ---------","Maintenance","Waterfal","Incremental","Itrative","A","Re_Exam","active","setter_02");
INSERT INTO question VALUES("13","2010","Software Engineering ","Name the stages that SDLC covers in s/w development","Requirements, design, testing, coding","Requirements, design, testing, coding and maintenance","Design, testing, coding and maintenance","None","C","Re_Exam","active","setter_02");
INSERT INTO question VALUES("14","2010","Software Engineering ","Which of these are characteristics of a strong design?","Low Coupling","Modular","High Cohesion","None","D","Re_Exam","active","setter_02");


DROP TABLE IF EXISTS registrar;

CREATE TABLE `registrar` (
  `rid` varchar(20) NOT NULL,
  `uid` varchar(50) DEFAULT NULL,
  `eid` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`rid`),
  UNIQUE KEY `uid` (`uid`),
  KEY `eid` (`eid`),
  CONSTRAINT `registrar_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `exameditor` (`eid`),
  CONSTRAINT `registrar_ibfk_2` FOREIGN KEY (`rid`) REFERENCES `user` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO registrar VALUES("reg_01","U01","editor_01");
INSERT INTO registrar VALUES("reg_02","U03","editor_01");


DROP TABLE IF EXISTS result;

CREATE TABLE `result` (
  `uid` varchar(50) NOT NULL,
  `totalQestion` int(11) DEFAULT NULL,
  `correctanswer` int(11) DEFAULT NULL,
  `wronganswer` int(11) DEFAULT NULL,
  `total` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `program` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  CONSTRAINT `result_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `takenexam` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO result VALUES("TER/4641/08","5","4","1","80%","Competent","Regular");
INSERT INTO result VALUES("TER/4682/07","2","1","1","50%","Competent","Re_Exam");
INSERT INTO result VALUES("TER/4683/08","4","4","0","100%","Competent","Regular");


DROP TABLE IF EXISTS set_score;

CREATE TABLE `set_score` (
  `score_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept` varchar(50) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  PRIMARY KEY (`score_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO set_score VALUES("1","Information Technology ","50","2010");
INSERT INTO set_score VALUES("2","Software Engineering ","50","2010");


DROP TABLE IF EXISTS takenexam;

CREATE TABLE `takenexam` (
  `uid` varchar(50) NOT NULL,
  `program` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  CONSTRAINT `takenexam_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `candidate` (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO takenexam VALUES("TER/4641/08","Regular");
INSERT INTO takenexam VALUES("TER/4682/07","Re_Exam");
INSERT INTO takenexam VALUES("TER/4683/08","Regular");


DROP TABLE IF EXISTS timer;

CREATE TABLE `timer` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `question_type` varchar(20) DEFAULT NULL,
  `dept` varchar(50) NOT NULL,
  `hour` int(11) DEFAULT NULL,
  `min` int(11) DEFAULT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO timer VALUES("1","Re_Exam","Information Technology ","0","2","2010");
INSERT INTO timer VALUES("2","Regular","Information Technology ","0","2","2010");
INSERT INTO timer VALUES("3","Regular","Software Engineering ","0","2","2010");
INSERT INTO timer VALUES("4","Re_Exam","Software Engineering ","0","2","2010");


DROP TABLE IF EXISTS university;

CREATE TABLE `university` (
  `uid` varchar(50) NOT NULL,
  `uname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `uname` (`uname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO university VALUES("U02","Addiss Abeba  University");
INSERT INTO university VALUES("U03","Bahir Dar University");
INSERT INTO university VALUES("U01","Debre Markos University");


DROP TABLE IF EXISTS user;

CREATE TABLE `user` (
  `uid` varchar(50) NOT NULL,
  `ufname` varchar(50) DEFAULT NULL,
  `umname` varchar(50) DEFAULT NULL,
  `ulname` varchar(50) DEFAULT NULL,
  `sex` varchar(20) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO user VALUES("admin_01","Mulur","Fentie","Admas","m","0936343752","mf@gmail.com","userphoto/IMG_20180417_091921.jpg","Admin");
INSERT INTO user VALUES("editor_01","Nardos","Enawugaw","Nardi","f","0936343751","ardi@gmail.com","userphoto/nardi.jpg","Exam Editor");
INSERT INTO user VALUES("head_01","abex","Solomon","Memar","m","0936343523","aa@gmail.com","userphoto/Hydrangeas.jpg","Department Head");
INSERT INTO user VALUES("head_02","Muluye","Belachew","Yihun","m","0936343523","mf@gmail.com","userphoto/IMG_20180417_091921.jpg","Department Head");
INSERT INTO user VALUES("reg_01","Yitayal","Mengiste","Abebe","m","0936343523","ardi@gmail.com","userphoto/Hydrangeas.jpg","Registrar");
INSERT INTO user VALUES("reg_02","Memar","Solomon","Yihun","m","0936343752","ma@gmail.com","userphoto/Chrysanthemum.jpg","Registrar");
INSERT INTO user VALUES("setter_01","Nardos","Enawgaw","abex","f","0936343523","ardi@gmail.com","userphoto/nardi.jpg","Exam setter");
INSERT INTO user VALUES("setter_02","Muluye","Fentie","Admas","m","0936343523","mf@gmail.com","userphoto/mf.jpg","Exam setter");
INSERT INTO user VALUES("setter_03","Memar","Alemayehu","Admas","m","0936343712","ma@gmail.com","userphoto/Hydrangeas.jpg","Exam setter");
INSERT INTO user VALUES("TER/4641/08","Abebaw","Addiss","Tafere","f"," "," "," ","Candidate");
INSERT INTO user VALUES("TER/4642/08","Abel ","Negash","Girum","m"," "," "," ","Candidate");
INSERT INTO user VALUES("TER/4643/08","Abayneh","Argachew","Admas","m"," "," "," ","Candidate");
INSERT INTO user VALUES("TER/4644/08","Awoke","Kerebih","Abebe","m"," "," "," ","Candidate");
INSERT INTO user VALUES("TER/4645/08","Binalf","Debas","yihun","f"," "," "," ","Candidate");
INSERT INTO user VALUES("TER/4682/07","Muluye","Fentie","Admas","m","0936343712","ma@gmail.com","userphoto/mf.jpg","Candidate");
INSERT INTO user VALUES("TER/4683/08","Memar","Alemayehu","abex","m","0963636363","ma@gmail.com","userphoto/Hydrangeas.jpg","Candidate");


