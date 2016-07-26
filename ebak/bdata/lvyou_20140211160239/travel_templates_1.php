<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `travel_templates`;");
E_C("CREATE TABLE `travel_templates` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `catid` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8");
E_D("replace into `travel_templates` values('1','单页模版','about.html','1');");
E_D("replace into `travel_templates` values('2','底部公共模版','foot.html','1');");
E_D("replace into `travel_templates` values('3','头部公共模版','head.html','1');");
E_D("replace into `travel_templates` values('4','首页模版','index.html','1');");
E_D("replace into `travel_templates` values('5','新闻详细页模版','news.html','1');");
E_D("replace into `travel_templates` values('6','新闻列表页模版','news_list.html','1');");
E_D("replace into `travel_templates` values('7','产品列表页模版','products.html','1');");
E_D("replace into `travel_templates` values('8','产品列表页模版','products_list.html','1');");

require("../../inc/footer.php");
?>