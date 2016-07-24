<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `travel_visa`;");
E_C("CREATE TABLE `travel_visa` (
  `id` int(11) NOT NULL auto_increment,
  `catid` int(11) NOT NULL,
  `zid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `pic` varchar(50) NOT NULL,
  `oldprice` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `fee` varchar(200) NOT NULL,
  `processtime` varchar(200) NOT NULL,
  `crowd` varchar(200) NOT NULL,
  `ishome` int(11) NOT NULL,
  `info` text NOT NULL,
  `orderid` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8");
E_D("replace into `travel_visa` values('1','2','14','16','英国商务签证','1368362867.gif','1200','1000','签证费、服务费、发票','7-10个工作日','前往英国个人旅游、自助旅游的人士','1','&lt;p&gt;\r\n	1111111111111111111&lt;/p&gt;\r\n','0');");
E_D("replace into `travel_visa` values('2','1','14','16','英国旅游签证','','1200','0','','','','0','','0');");
E_D("replace into `travel_visa` values('3','3','14','16','英国探亲访友签证','','0','0','','','','0','','0');");
E_D("replace into `travel_visa` values('4','1','14','15','法国旅游签证','','0','0','','','','0','','0');");

require("../../inc/footer.php");
?>