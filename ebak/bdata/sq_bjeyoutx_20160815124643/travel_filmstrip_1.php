<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `travel_filmstrip`;");
E_C("CREATE TABLE `travel_filmstrip` (
  `id` smallint(6) NOT NULL auto_increment,
  `pic` varchar(20) NOT NULL,
  `url` varchar(200) NOT NULL,
  `detail` varchar(500) NOT NULL,
  `orderid` tinyint(4) NOT NULL default '0',
  `c_id` int(5) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8");
E_D("replace into `travel_filmstrip` values('42','1471232415.jpg','','','1','0');");
E_D("replace into `travel_filmstrip` values('43','1471232425.jpg','','','2','0');");
E_D("replace into `travel_filmstrip` values('44','1471232431.jpg','','','3','0');");
E_D("replace into `travel_filmstrip` values('45','1471232439.jpg','','','4','0');");

require("../../inc/footer.php");
?>