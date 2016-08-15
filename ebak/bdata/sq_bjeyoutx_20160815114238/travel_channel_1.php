<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `travel_channel`;");
E_C("CREATE TABLE `travel_channel` (
  `c_id` smallint(10) NOT NULL auto_increment,
  `c_name` varchar(30) default NULL,
  `c_url` varchar(200) default NULL,
  `c_orderid` int(3) NOT NULL,
  `c_target` tinyint(1) NOT NULL,
  PRIMARY KEY  (`c_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8");
E_D("replace into `travel_channel` values('1','首页','index.html','1','1');");
E_D("replace into `travel_channel` values('2','国内游','domestic/','2','1');");
E_D("replace into `travel_channel` values('7','出境游','outbound/','4','1');");
E_D("replace into `travel_channel` values('10','游轮旅游','cruise/','3','1');");
E_D("replace into `travel_channel` values('13','学生专题','students/','6','1');");
E_D("replace into `travel_channel` values('14','各国签证','visa','7','1');");

require("../../inc/footer.php");
?>