<?php
require("../../inc/header.php");


DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `travel_permission`;");
E_C("CREATE TABLE `travel_permission` (
  `id` smallint(6) NOT NULL auto_increment COMMENT '权限ID',
  `pid` smallint(6) NOT NULL default '0' COMMENT '父权限ID',
  `name` char(20) NOT NULL,
  `mod` char(20) NOT NULL,
  `ac` char(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=utf8");
E_D("replace into `travel_permission` values('4','0','栏目管理','','add');");
E_D("replace into `travel_permission` values('5','4','添加','','add');");
E_D("replace into `travel_permission` values('6','5','添加','channel','add');");
E_D("replace into `travel_permission` values('9','0','产品分类管理','','add');");
E_D("replace into `travel_permission` values('70','69','添加','products','add');");
E_D("replace into `travel_permission` values('71','9','删除','','');");
E_D("replace into `travel_permission` values('36','0','信息管理','','');");
E_D("replace into `travel_permission` values('37','36','信息管理','','');");
E_D("replace into `travel_permission` values('38','37','信息管理','news','');");
E_D("replace into `travel_permission` values('42','0','单页管理','','');");
E_D("replace into `travel_permission` values('43','42','单页管理','','');");
E_D("replace into `travel_permission` values('44','43','单页管理','page','');");
E_D("replace into `travel_permission` values('60','0','友情链接管理','','');");
E_D("replace into `travel_permission` values('61','60','友情链接管理','','');");
E_D("replace into `travel_permission` values('62','61','友情链接管理','flink','');");
E_D("replace into `travel_permission` values('63','0','广告管理','','');");
E_D("replace into `travel_permission` values('64','63','广告管理','','');");
E_D("replace into `travel_permission` values('65','64','广告管理','ad','');");
E_D("replace into `travel_permission` values('68','67','编辑','channel','edit');");
E_D("replace into `travel_permission` values('67','4','编辑','','');");
E_D("replace into `travel_permission` values('69','9','添加','','');");
E_D("replace into `travel_permission` values('72','71','删除','products','del');");
E_D("replace into `travel_permission` values('73','9','编辑','','');");
E_D("replace into `travel_permission` values('74','73','编辑','products','edit');");
E_D("replace into `travel_permission` values('75','4','删除','','');");
E_D("replace into `travel_permission` values('76','75','删除','channel','del');");
E_D("replace into `travel_permission` values('77','4','排序','','');");
E_D("replace into `travel_permission` values('78','77','排序','channel','bulksort');");

require("../../inc/footer.php");
?>