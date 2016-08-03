<?php
require("../../inc/header.php");

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `travel_page_sorts`;");
E_C("CREATE TABLE `travel_page_sorts` (
  `s_id` smallint(10) NOT NULL auto_increment,
  `s_name` varchar(30) default NULL,
  `s_dir` varchar(50) NOT NULL,
  `orderid` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`s_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8");
E_D("replace into `travel_page_sorts` values('1','关于我们','about','0');");
E_D("replace into `travel_page_sorts` values('6','企业客户','enterprise','0');");

require("../../inc/footer.php");
?>