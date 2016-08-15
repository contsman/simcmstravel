<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `travel_news`;");
E_C("CREATE TABLE `travel_news` (
  `n_id` int(10) NOT NULL auto_increment,
  `n_title` varchar(100) default NULL,
  `n_info` text,
  `n_author` varchar(30) default NULL,
  `n_addtime` int(10) NOT NULL,
  `catid` int(11) default NULL,
  `n_type` tinyint(4) default NULL,
  `n_count` int(10) default '0',
  `n_keywords` varchar(100) default NULL,
  `n_url` varchar(200) default NULL,
  `n_pic` varchar(20) default NULL,
  `n_updatetime` int(11) NOT NULL,
  `n_hits` int(11) NOT NULL default '0',
  `orderid` int(11) NOT NULL,
  PRIMARY KEY  (`n_id`)
) ENGINE=MyISAM AUTO_INCREMENT=219 DEFAULT CHARSET=utf8");

require("../../inc/footer.php");
?>