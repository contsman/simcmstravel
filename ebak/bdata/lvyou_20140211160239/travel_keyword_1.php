<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `travel_keyword`;");
E_C("CREATE TABLE `travel_keyword` (
  `k_id` smallint(6) NOT NULL auto_increment,
  `k_keyword` text,
  `k_type` varchar(20) NOT NULL,
  PRIMARY KEY  (`k_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=gbk");
E_D("replace into `travel_keyword` values('8','�׶�|������','0');");
E_D("replace into `travel_keyword` values('9','����|����','1');");
E_D("replace into `travel_keyword` values('10','����|����','2');");

require("../../inc/footer.php");
?>