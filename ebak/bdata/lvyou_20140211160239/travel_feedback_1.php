<?php
require("../../inc/header.php");

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `travel_feedback`;");
E_C("CREATE TABLE `travel_feedback` (
  `f_id` int(11) NOT NULL auto_increment,
  `f_username` varchar(30) NOT NULL,
  `f_addtime` int(11) NOT NULL,
  `f_email` varchar(32) NOT NULL,
  `f_address` varchar(100) NOT NULL,
  `f_tel` varchar(60) NOT NULL,
  `f_detail` text NOT NULL,
  `is_show` tinyint(1) NOT NULL,
  PRIMARY KEY  (`f_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8");

require("../../inc/footer.php");
?>