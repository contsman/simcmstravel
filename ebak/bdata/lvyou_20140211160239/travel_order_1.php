<?php
require("../../inc/header.php");


DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `travel_order`;");
E_C("CREATE TABLE `travel_order` (
  `id` int(11) NOT NULL auto_increment,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `turename` varchar(32) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `departure_date` int(11) NOT NULL,
  `adult_nums` int(11) NOT NULL,
  `children_nums` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `addtime` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8");
E_D("replace into `travel_order` values('74','371','0','12321312312','15588558545','1391529600','1','0','200.00','1391518247');");

require("../../inc/footer.php");
?>