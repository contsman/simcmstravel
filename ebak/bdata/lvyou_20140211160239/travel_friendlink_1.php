<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `travel_friendlink`;");
E_C("CREATE TABLE `travel_friendlink` (
  `l_id` smallint(6) NOT NULL auto_increment,
  `l_name` varchar(30) default NULL,
  `l_pic` varchar(50) default NULL,
  `s_id` int(10) default NULL,
  `l_type` tinyint(4) default NULL,
  `l_address` varchar(100) default NULL,
  `l_note` varchar(50) NOT NULL,
  `l_orderid` tinyint(4) NOT NULL default '0',
  `is_show` tinyint(1) NOT NULL,
  PRIMARY KEY  (`l_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8");

require("../../inc/footer.php");
?>