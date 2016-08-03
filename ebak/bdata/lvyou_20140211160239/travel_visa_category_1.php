<?php
require("../../inc/header.php");

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `travel_visa_category`;");
E_C("CREATE TABLE `travel_visa_category` (
  `catid` smallint(10) NOT NULL auto_increment,
  `catname` varchar(30) default NULL,
  `orderid` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`catid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8");
E_D("replace into `travel_visa_category` values('1','旅游签证','0');");
E_D("replace into `travel_visa_category` values('2','商务签证','0');");
E_D("replace into `travel_visa_category` values('3','探亲访友签证','0');");
E_D("replace into `travel_visa_category` values('6','展会','0');");

require("../../inc/footer.php");
?>