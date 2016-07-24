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
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8");
E_D("replace into `travel_filmstrip` values('41','1369572925.jpg','http://www.phpstat.net','','0','0');");

require("../../inc/footer.php");
?>