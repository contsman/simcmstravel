<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `travel_viewpoint`;");
E_C("CREATE TABLE `travel_viewpoint` (
  `id` int(11) NOT NULL auto_increment,
  `pid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `pic01` varchar(100) NOT NULL,
  `info01` tinytext NOT NULL,
  `pic02` varchar(100) NOT NULL,
  `info02` tinytext NOT NULL,
  `orderid` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8");
E_D("replace into `travel_viewpoint` values('1','190','7','1111111111111','upload/upload/2013/07/9a46403540891cbc2af156144490be74.gif','111111111','upload/upload/2013/07/d7fb4e674a42a8b3f4a3a25e20a01952.gif','11111111111111','0');");
E_D("replace into `travel_viewpoint` values('6','190','7','少林寺','','','','','0');");
E_D("replace into `travel_viewpoint` values('3','190','7','美国','','','','','0');");
E_D("replace into `travel_viewpoint` values('4','190','7','美国','','','','','0');");
E_D("replace into `travel_viewpoint` values('5','190','7','美国','','','','','0');");
E_D("replace into `travel_viewpoint` values('7','549','12','日照','','','','','0');");
E_D("replace into `travel_viewpoint` values('8','552','17',' 发士大夫','upload/upload/2013/12/9903ddf4e114179db48f69f2e3889bbe.jpg','佛挡杀佛是东方闪电','upload/upload/2013/12/215a01218df9a9247bfa9932f5f0e1e6.jpg','发士大夫撒发士大夫','0');");
E_D("replace into `travel_viewpoint` values('9','0','17','佛挡杀佛士大夫','upload/upload/2013/12/a5510f286d9ddc74e8b3b61ebff69bd1.jpg','发士大夫士大夫撒','upload/upload/2013/12/6e8087ffd719add710b1232cb42ea68b.jpg','发士大夫是法士大夫士大夫','0');");
E_D("replace into `travel_viewpoint` values('10','371','25','测试一下','upload/upload/2014/02/8b1d9e0bafb68b25d8884ba2e85fa0a0.png','测试一下','upload/upload/2014/02/e8687ee5d171781cc772d9b72a4999a7.png','测试一下','0');");

require("../../inc/footer.php");
?>