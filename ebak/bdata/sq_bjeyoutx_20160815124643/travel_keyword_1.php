<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `travel_keyword`;");
E_C("CREATE TABLE `travel_keyword` (
  `k_id` smallint(6) NOT NULL auto_increment,
  `k_keyword` text,
  `k_type` varchar(20) NOT NULL,
  PRIMARY KEY  (`k_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8");
E_D("replace into `travel_keyword` values('8','伦敦|夏威夷','55');");
E_D("replace into `travel_keyword` values('9','云南|三亚','58');");
E_D("replace into `travel_keyword` values('10','三亚|厦门','58');");

require("../../inc/footer.php");
?>