<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `travel_service_sorts`;");
E_C("CREATE TABLE `travel_service_sorts` (
  `s_id` smallint(10) NOT NULL auto_increment,
  `s_name` varchar(30) default NULL,
  `s_dir` varchar(50) NOT NULL,
  `orderid` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`s_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8");
E_D("replace into `travel_service_sorts` values('1','预订常见问题','111','0');");
E_D("replace into `travel_service_sorts` values('2','付款与发票','','0');");
E_D("replace into `travel_service_sorts` values('3','签署旅游合同','','0');");
E_D("replace into `travel_service_sorts` values('4','售后服务','','0');");
E_D("replace into `travel_service_sorts` values('5','旅游其他事项','','0');");

require("../../inc/footer.php");
?>