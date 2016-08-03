<?php
require("../../inc/header.php");

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `travel_settings`;");
E_C("CREATE TABLE `travel_settings` (
  `k` char(30) NOT NULL,
  `v` text NOT NULL,
  PRIMARY KEY  (`k`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
E_D("replace into `travel_settings` values('title','北京旅游网');");
E_D("replace into `travel_settings` values('keywords','北京旅游网');");
E_D("replace into `travel_settings` values('description','');");
E_D("replace into `travel_settings` values('sitename','北京旅游网');");
E_D("replace into `travel_settings` values('website','http://localhost/tiaoji');");
E_D("replace into `travel_settings` values('copyright','');");
E_D("replace into `travel_settings` values('icp','travelcms');");
E_D("replace into `travel_settings` values('address','北京市');");
E_D("replace into `travel_settings` values('postcode','315171');");
E_D("replace into `travel_settings` values('fax','010-58480317');");
E_D("replace into `travel_settings` values('tel','010-58480317');");
E_D("replace into `travel_settings` values('email','123456@qq.com');");
E_D("replace into `travel_settings` values('pic_width','300');");
E_D("replace into `travel_settings` values('pic_height','300');");
E_D("replace into `travel_settings` values('htmldir','html');");
E_D("replace into `travel_settings` values('templates','default');");
E_D("replace into `travel_settings` values('water','0');");
E_D("replace into `travel_settings` values('isdstimg','1');");
E_D("replace into `travel_settings` values('imgwidth','200');");
E_D("replace into `travel_settings` values('imgheight','200');");

require("../../inc/footer.php");
?>