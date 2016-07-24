<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `travel_member`;");
E_C("CREATE TABLE `travel_member` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(20) default NULL,
  `password` varchar(50) default NULL,
  `email` varchar(32) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `turename` varchar(32) NOT NULL,
  `regtime` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `last_login_time` int(11) NOT NULL,
  `last_login_ip` varchar(32) NOT NULL,
  `login_count` int(11) NOT NULL,
  `authkey` int(11) NOT NULL,
  `salt` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=186 DEFAULT CHARSET=utf8");

require("../../inc/footer.php");
?>