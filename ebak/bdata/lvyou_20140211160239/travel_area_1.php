<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `travel_area`;");
E_C("CREATE TABLE `travel_area` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(32) character set utf8 NOT NULL,
  `orderid` int(11) NOT NULL,
  `parentid` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=163 DEFAULT CHARSET=gbk");
E_D("replace into `travel_area` values('162','±±¾©','0','-1');");

require("../../inc/footer.php");
?>