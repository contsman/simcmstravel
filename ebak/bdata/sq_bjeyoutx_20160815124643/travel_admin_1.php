<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `travel_admin`;");
E_C("CREATE TABLE `travel_admin` (
  `adminid` mediumint(9) NOT NULL auto_increment,
  `username` char(30) NOT NULL,
  `password` char(32) NOT NULL,
  `admin_type` enum('administrator','admin') NOT NULL,
  `last_login_time` int(11) NOT NULL,
  `last_login_ip` char(15) NOT NULL,
  `login_count` mediumint(9) NOT NULL default '0',
  `status` tinyint(4) NOT NULL default '0',
  `description` char(20) NOT NULL,
  `permission` varchar(2048) NOT NULL,
  PRIMARY KEY  (`adminid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8");
E_D("replace into `travel_admin` values('3','admin','7fef6171469e80d32c0559f88b377245','administrator','1471229941','124.205.16.134','66','1','','');");

require("../../inc/footer.php");
?>