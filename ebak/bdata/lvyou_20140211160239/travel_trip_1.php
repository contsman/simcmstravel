<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `travel_trip`;");
E_C("CREATE TABLE `travel_trip` (
  `id` int(11) NOT NULL auto_increment,
  `pid` int(11) NOT NULL,
  `title` varchar(32) NOT NULL,
  `info` text NOT NULL,
  `scenictitle` varchar(100) NOT NULL,
  `scenicinfo` text NOT NULL,
  `orderid` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8");
E_D("replace into `travel_trip` values('1','0','第一天','&lt;p&gt;\r\n	第一天&lt;/p&gt;\r\n','第一天','&lt;p&gt;\r\n	第一天&lt;/p&gt;\r\n','0');");
E_D("replace into `travel_trip` values('2','0','第一天','&lt;p&gt;\r\n	第一天&lt;/p&gt;\r\n','第一天','&lt;p&gt;\r\n	第一天&lt;/p&gt;\r\n','0');");
E_D("replace into `travel_trip` values('3','0','第一天','&lt;p&gt;\r\n	第一天&lt;/p&gt;\r\n','第一天','&lt;p&gt;\r\n	第一天&lt;/p&gt;\r\n','0');");
E_D("replace into `travel_trip` values('4','0','第二天','&lt;p&gt;\r\n	第二天&lt;/p&gt;\r\n','第二天','&lt;p&gt;\r\n	第二天&lt;/p&gt;\r\n','0');");
E_D("replace into `travel_trip` values('5','189','北京—北京','&lt;p&gt;\r\n	今日贵宾于指定时间在北京首都机场2号航站楼国际出发8号门内集合。集合后，由我社专业领队讲解出团注意事项并协助办理登机及出关手续。我们将满怀着快乐与期待的心情，搭乘国内首家五星级航空公司海南国际航空公司大型客机飞往比利时首都布鲁塞尔。&lt;/p&gt;\r\n','','','0');");
E_D("replace into `travel_trip` values('6','189','北京—巴黎','&lt;p&gt;\r\n	抵达后，专车接机，迎接期待已久的欧洲之旅。比利时首都--布鲁塞尔是欧洲历史悠久的文化中心之一，素有&amp;ldquo;欧洲首都&amp;rdquo;之称。雨果、拜伦、莫扎特及马克思都曾在这座城市居住。参观用花岗石铺就的大广场，广场附近竖立着&amp;ldquo;小于连&amp;rdquo;塑像，体现了比利时国民不畏强权的民族性格。再参观由9个巨大的金属圆球组成的原子球塔，造型既对称又独特，可见设计者的超前思维和丰富想像力。闲暇之余，您还可以在比利时著名的巧克力店为朋友选购礼物。游览结束后，乘车前往法国首都巴黎。抵达后，游览光芒四射的花都名胜。凯旋门地处宽阔的戴高乐广场，这里是香榭里舍大街的尽头，从戴高乐广场向四面八方延伸有12条大道，宏伟、壮丽的凯旋门就耸立在广场中央的环岛上面；协和广场是法国国家荣誉的象征，中央是来自古埃及太阳神殿的方尖碑，这片宏伟壮丽的广场被法国人称为&amp;ldquo;世界最美丽的广场&amp;rdquo;。&lt;/p&gt;\r\n','原子球塔 凯旋门 香榭里舍 戴高乐广场 协和广场','&lt;p&gt;\r\n	抵达后，专车接机，迎接期待已久的欧洲之旅。比利时首都--布鲁塞尔是欧洲历史悠久的文化中心之一，素有&amp;ldquo;欧洲首都&amp;rdquo;之称。雨果、拜伦、莫扎特及马克思都曾在这座城市居住。参观用花岗石铺就的大广场，广场附近竖立着&amp;ldquo;小于连&amp;rdquo;塑像，体现了比利时国民不畏强权的民族性格。再参观由9个巨大的金属圆球组成的原子球塔，造型既对称又独特，可见设计者的超前思维和丰富想像力。闲暇之余，您还可以在比利时著名的巧克力店为朋友选购礼物。游览结束后，乘车前往法国首都巴黎。抵达后，游览光芒四射的花都名胜。凯旋门地处宽阔的戴高乐广场，这里是香榭里舍大街的尽头，从戴高乐广场向四面八方延伸有12条大道，宏伟、壮丽的凯旋门就耸立在广场中央的环岛上面；协和广场是法国国家荣誉的象征，中央是来自古埃及太阳神殿的方尖碑，这片宏伟壮丽的广场被法国人称为&amp;ldquo;世界最美丽的广场&amp;rdquo;。&lt;/p&gt;\r\n','0');");
E_D("replace into `travel_trip` values('7','190','青岛-济南','&lt;p&gt;\r\n	111111&lt;/p&gt;\r\n','','&lt;p&gt;\r\n	111111&lt;/p&gt;\r\n','0');");
E_D("replace into `travel_trip` values('8','190','济南-西安 ','','','','0');");
E_D("replace into `travel_trip` values('24','554','兵马俑','&lt;p&gt;\r\n	兵马俑&lt;/p&gt;\r\n','兵马俑','&lt;p&gt;\r\n	阿法斯蒂芬&lt;/p&gt;\r\n','0');");
E_D("replace into `travel_trip` values('20','367','第一天 北京-爱尔兰','&lt;p&gt;\r\n	我们一起去海谝！&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;img alt=&quot;&quot; src=&quot;/upload/images/6647776_135726403155_2.jpg&quot; style=&quot;width: 300px; height: 210px;&quot; /&gt;&lt;/p&gt;\r\n','伦敦 敦伦','&lt;p&gt;\r\n	不错的伦敦&lt;/p&gt;\r\n','0');");
E_D("replace into `travel_trip` values('21','377','1','&lt;p&gt;\r\n	1111&lt;/p&gt;\r\n','11','&lt;p&gt;\r\n	111&lt;/p&gt;\r\n','0');");
E_D("replace into `travel_trip` values('22','377','222','&lt;p&gt;\r\n	22&lt;/p&gt;\r\n','222','&lt;p&gt;\r\n	222&lt;/p&gt;\r\n','0');");
E_D("replace into `travel_trip` values('23','554','西安四日','&lt;p&gt;\r\n	西安&lt;/p&gt;\r\n','华清池','&lt;p&gt;\r\n	啊打发&lt;/p&gt;\r\n','0');");
E_D("replace into `travel_trip` values('25','371','测试一下','&lt;p&gt;\r\n	测试一下&lt;/p&gt;\r\n','测试一下','&lt;p&gt;\r\n	测试一下&lt;/p&gt;\r\n','0');");

require("../../inc/footer.php");
?>