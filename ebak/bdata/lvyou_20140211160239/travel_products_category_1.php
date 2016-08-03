<?php
require("../../inc/header.php");



DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `travel_products_category`;");
E_C("CREATE TABLE `travel_products_category` (
  `catid` smallint(5) unsigned NOT NULL auto_increment,
  `parentid` smallint(5) unsigned NOT NULL default '0',
  `catname` varchar(30) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` mediumtext NOT NULL,
  `url` varchar(100) NOT NULL,
  `listorder` smallint(5) unsigned NOT NULL default '0',
  `isshow` tinyint(1) unsigned NOT NULL default '1',
  `recommend` int(11) NOT NULL,
  PRIMARY KEY  (`catid`),
  KEY `module` (`parentid`,`listorder`,`catid`)
) ENGINE=MyISAM AUTO_INCREMENT=110 DEFAULT CHARSET=utf8");
E_D("replace into `travel_products_category` values('55','0','出境游目的地','','','','0','1','0');");
E_D("replace into `travel_products_category` values('72','0','主题游目的地','','','','5','1','0');");
E_D("replace into `travel_products_category` values('58','0','国内游目的地','','','','1','1','0');");
E_D("replace into `travel_products_category` values('69','0','周边游目的地','','','','2','1','0');");
E_D("replace into `travel_products_category` values('71','0','自助游目的地','','','','4','1','0');");
E_D("replace into `travel_products_category` values('70','0','北京游目的地','','','','3','1','0');");
E_D("replace into `travel_products_category` values('73','55','欧洲','','','','0','1','0');");
E_D("replace into `travel_products_category` values('74','55','美洲','','','','0','1','0');");
E_D("replace into `travel_products_category` values('75','55','东南亚','','','','0','1','0');");
E_D("replace into `travel_products_category` values('76','55','南亚','','','','0','1','0');");
E_D("replace into `travel_products_category` values('77','55','日韩','','','','0','1','0');");
E_D("replace into `travel_products_category` values('78','55','非洲','','','','0','1','0');");
E_D("replace into `travel_products_category` values('79','55','澳洲','','','','0','1','0');");
E_D("replace into `travel_products_category` values('80','55','港澳台','','','','0','1','0');");
E_D("replace into `travel_products_category` values('81','73','俄罗斯','','','','0','1','1');");
E_D("replace into `travel_products_category` values('82','73','法国','','','','0','1','0');");
E_D("replace into `travel_products_category` values('83','73','意大利','','','','0','1','0');");
E_D("replace into `travel_products_category` values('84','73','瑞士','','','','0','1','0');");
E_D("replace into `travel_products_category` values('85','73','德国','','','','0','1','1');");
E_D("replace into `travel_products_category` values('86','73','西班牙','','','','0','1','0');");
E_D("replace into `travel_products_category` values('87','73','葡萄牙','','','','0','1','0');");
E_D("replace into `travel_products_category` values('88','73','希腊','','','','0','1','0');");
E_D("replace into `travel_products_category` values('89','73','北欧','','','','0','1','0');");
E_D("replace into `travel_products_category` values('90','73','东欧','','','','0','1','0');");
E_D("replace into `travel_products_category` values('91','74','美国','','','','0','1','0');");
E_D("replace into `travel_products_category` values('92','74','加拿大','','','','0','1','1');");
E_D("replace into `travel_products_category` values('93','74','关岛','','','','0','1','0');");
E_D("replace into `travel_products_category` values('94','74','夏威夷','','','','0','1','0');");
E_D("replace into `travel_products_category` values('95','58','海南','','','','0','1','0');");
E_D("replace into `travel_products_category` values('96','58','云南','','','','0','1','0');");
E_D("replace into `travel_products_category` values('97','69','草原','','','','0','1','0');");
E_D("replace into `travel_products_category` values('98','69','海滨','','','','0','1','0');");
E_D("replace into `travel_products_category` values('99','71','国内','','','','0','1','0');");
E_D("replace into `travel_products_category` values('100','71','国际','','','','0','1','0');");
E_D("replace into `travel_products_category` values('101','70','北京休闲一日游','','','','0','1','1');");
E_D("replace into `travel_products_category` values('102','70','北京精品纯玩游','','','','0','1','0');");
E_D("replace into `travel_products_category` values('103','70','北京休闲品质游','','','','0','1','0');");
E_D("replace into `travel_products_category` values('104','70','北京全景特价游','','','','0','1','0');");
E_D("replace into `travel_products_category` values('105','72','红色旅游','','','','0','1','1');");
E_D("replace into `travel_products_category` values('106','72','蜜月旅游','','','','0','1','1');");
E_D("replace into `travel_products_category` values('107','99','丽江','','','','0','1','1');");
E_D("replace into `travel_products_category` values('108','97','安固里','','','','0','1','1');");
E_D("replace into `travel_products_category` values('109','95','三亚','','','','0','1','1');");

require("../../inc/footer.php");
?>