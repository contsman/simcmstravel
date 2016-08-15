<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `travel_country`;");
E_C("CREATE TABLE `travel_country` (
  `id` int(11) NOT NULL auto_increment,
  `parentid` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `orderid` int(11) NOT NULL,
  `actived` int(11) NOT NULL default '1' COMMENT '0--cant use,1--can use',
  `ishot` int(11) NOT NULL default '0' COMMENT '0--dont hot,1--hot',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=258 DEFAULT CHARSET=utf8");
E_D("replace into `travel_country` values('15','14','法国','0','1','0');");
E_D("replace into `travel_country` values('13','5','韩国','0','1','0');");
E_D("replace into `travel_country` values('12','5','日本','0','1','0');");
E_D("replace into `travel_country` values('11','5','中国','0','1','0');");
E_D("replace into `travel_country` values('16','14','英国','0','1','0');");
E_D("replace into `travel_country` values('47','36','阿根廷','0','1','0');");
E_D("replace into `travel_country` values('46','36','巴西','0','1','0');");
E_D("replace into `travel_country` values('21','14','瑞士','0','1','0');");
E_D("replace into `travel_country` values('22','14','德国','0','1','0');");
E_D("replace into `travel_country` values('23','14','意大利','0','1','0');");
E_D("replace into `travel_country` values('24','14','俄罗斯','0','1','0');");
E_D("replace into `travel_country` values('25','14','西班牙','0','1','0');");
E_D("replace into `travel_country` values('26','14','葡萄牙','0','1','0');");
E_D("replace into `travel_country` values('27','14','希腊','0','1','0');");
E_D("replace into `travel_country` values('28','14','土耳其','0','1','0');");
E_D("replace into `travel_country` values('43','14','北欧','0','1','0');");
E_D("replace into `travel_country` values('33','14','冰岛','0','1','0');");
E_D("replace into `travel_country` values('34','14','东欧','0','1','0');");
E_D("replace into `travel_country` values('49','36','秘鲁','0','1','0');");
E_D("replace into `travel_country` values('69','68','尼泊尔','0','1','0');");
E_D("replace into `travel_country` values('70','68','印度','0','1','0');");
E_D("replace into `travel_country` values('71','68','斯里兰卡','0','1','0');");
E_D("replace into `travel_country` values('72','68','文莱','0','1','0');");
E_D("replace into `travel_country` values('73','68','不丹','0','1','0');");
E_D("replace into `travel_country` values('74','68','以色列','0','1','0');");
E_D("replace into `travel_country` values('76','75','日本','0','1','0');");
E_D("replace into `travel_country` values('77','75','韩国','0','1','0');");
E_D("replace into `travel_country` values('78','75','朝鲜','0','1','0');");
E_D("replace into `travel_country` values('79','77','济州岛','0','1','0');");
E_D("replace into `travel_country` values('93','36','哥伦比亚','0','1','0');");
E_D("replace into `travel_country` values('94','14','丹麦','0','1','0');");
E_D("replace into `travel_country` values('95','14','瑞典','0','1','0');");
E_D("replace into `travel_country` values('96','14','芬兰','0','1','0');");
E_D("replace into `travel_country` values('97','14','挪威','0','1','0');");
E_D("replace into `travel_country` values('98','14','奥地利','0','1','0');");
E_D("replace into `travel_country` values('99','14','匈牙利','0','1','0');");
E_D("replace into `travel_country` values('100','14','捷克','0','1','0');");
E_D("replace into `travel_country` values('101','14','波兰','0','1','0');");
E_D("replace into `travel_country` values('102','14','斯洛伐克','0','1','0');");
E_D("replace into `travel_country` values('103','14','乌克兰','0','1','0');");
E_D("replace into `travel_country` values('104','14','白俄罗斯','0','1','0');");
E_D("replace into `travel_country` values('105','14','罗马尼亚','0','1','0');");
E_D("replace into `travel_country` values('106','14','保加利亚','0','1','0');");
E_D("replace into `travel_country` values('107','14','荷兰','0','1','0');");
E_D("replace into `travel_country` values('257','256','巴黎','0','1','0');");
E_D("replace into `travel_country` values('256','255','法国','0','1','0');");
E_D("replace into `travel_country` values('255','-1','欧洲','0','1','0');");

require("../../inc/footer.php");
?>