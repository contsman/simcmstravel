<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `travel_templates`;");
E_C("CREATE TABLE `travel_templates` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `catid` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=gbk");
E_D("replace into `travel_templates` values('1','��ҳģ��','about.html','1');");
E_D("replace into `travel_templates` values('2','�ײ�����ģ��','foot.html','1');");
E_D("replace into `travel_templates` values('3','ͷ������ģ��','head.html','1');");
E_D("replace into `travel_templates` values('4','��ҳģ��','index.html','1');");
E_D("replace into `travel_templates` values('5','������ϸҳģ��','news.html','1');");
E_D("replace into `travel_templates` values('6','�����б�ҳģ��','news_list.html','1');");
E_D("replace into `travel_templates` values('7','��Ʒ�б�ҳģ��','products.html','1');");
E_D("replace into `travel_templates` values('8','��Ʒ�б�ҳģ��','products_list.html','1');");

require("../../inc/footer.php");
?>