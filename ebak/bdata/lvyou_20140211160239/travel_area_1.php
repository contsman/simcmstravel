<?php
require("../../inc/header.php");


DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `travel_area`;");
E_C("CREATE TABLE `travel_area` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(32) character set utf8 NOT NULL,
  `orderid` int(11) NOT NULL,
  `parentid` int(11) NOT NULL,
  `actived` int(11) NOT NULL default '1' COMMENT '0--cant use,1--can use',
  `ishot` int(11) NOT NULL default '0' COMMENT '0--dont hot,1--hot',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=163 DEFAULT CHARSET=utf8");

require("../../inc/footer.php");
?>