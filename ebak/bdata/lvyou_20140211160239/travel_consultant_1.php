<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `travel_consultant`;");
E_C("CREATE TABLE `travel_consultant` (
  `id` tinyint(4) NOT NULL auto_increment,
  `name` varchar(30) NOT NULL,
  `scope` varchar(200) default NULL,
  `zhicheng` varchar(20) default NULL,
  `pic` varchar(20) default NULL,
  `orderid` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=gbk");
E_D("replace into `travel_consultant` values('13','�����','���ϣ��Ĵ�','�������ι���','1381154961.jpg','0');");
E_D("replace into `travel_consultant` values('14','����','�ൺ������','�������ι���','1381934825.png','0');");
E_D("replace into `travel_consultant` values('15','������','�����ܱ�','�������ι���','1368626684.jpg','0');");

require("../../inc/footer.php");
?>