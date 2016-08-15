<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `travel_ad`;");
E_C("CREATE TABLE `travel_ad` (
  `id` tinyint(4) NOT NULL auto_increment,
  `name` varchar(30) default NULL,
  `adtype` tinyint(2) NOT NULL,
  `pic` varchar(20) default NULL,
  `picwidth` varchar(5) NOT NULL,
  `picheight` varchar(5) NOT NULL,
  `url` varchar(100) NOT NULL,
  `url_note` varchar(100) default NULL,
  `starttime` int(11) NOT NULL,
  `endtime` int(11) NOT NULL,
  `isshow` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8");

require("../../inc/footer.php");
?>