<?php
require("../../inc/header.php");


DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `travel_page`;");
E_C("CREATE TABLE `travel_page` (
  `p_id` int(11) NOT NULL auto_increment,
  `s_id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `p_title` varchar(50) NOT NULL,
  `p_info` text NOT NULL,
  `p_tql` varchar(200) NOT NULL,
  `p_page` varchar(200) NOT NULL,
  `p_status` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`p_id`)
) ENGINE=MyISAM AUTO_INCREMENT=97 DEFAULT CHARSET=utf8");
E_D("replace into `travel_page` values('71','1','0','联系我们','','about.html','71.html','0');");
E_D("replace into `travel_page` values('96','6','0','台湾邀请函单位','台湾邀请函单位','enterprise.html','index.html','0');");
E_D("replace into `travel_page` values('83','7','0','计算出游总价','','about.html','83.html','0');");
E_D("replace into `travel_page` values('84','7','0','起价说明','起价说明\r\n','about.html','84.html','0');");
E_D("replace into `travel_page` values('85','7','0','网订优惠','&lt;p&gt;\r\n	&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;span style=&quot;font-size: 16px; &quot;&gt;我们大力推广&amp;ldquo;&lt;/span&gt;&lt;strong style=&quot;font-size: 16px; &quot;&gt;网订优惠&lt;/strong&gt;&lt;span style=&quot;font-size: 16px; &quot;&gt;&amp;rdquo;政策，通过网站预订您不但可以享受到和线下预定一样的优惠，还可能享受到某些产品在线预订的&amp;ldquo;&lt;/span&gt;&lt;strong style=&quot;font-size: 16px; &quot;&gt;专享&lt;/strong&gt;&lt;span style=&quot;font-size: 16px; &quot;&gt;&amp;rdquo;优惠。&lt;/span&gt;&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span style=&quot;font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; 您只需留下您的&amp;ldquo;&lt;strong&gt;手机+座机+邮箱&lt;/strong&gt;&amp;rdquo;的联系方式，并注明您心仪的&lt;strong&gt;线路&lt;/strong&gt;和出行&lt;strong&gt;时间&lt;/strong&gt;及出行&lt;strong&gt;人数&lt;/strong&gt;，我们的客服将在第一时间联系您。&lt;/span&gt;&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span style=&quot;font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; 您也可以下单后直接拨打我们24小时免费电话4006 365 001联系我们的客服，或在上班时间9:00-18:00致电我们的客服人员为您服务。&lt;/span&gt;&lt;/p&gt;\r\n','about.html','85.html','0');");
E_D("replace into `travel_page` values('88','7','0','计算出游总价','&lt;p&gt;\r\n	&lt;span style=&quot;color: rgb(51, 51, 51); font-family: 微软雅黑, verdana, lucida, helvetica, arial, sans-serif; font-size: 14px;&quot;&gt;计算出游总价&lt;/span&gt;&lt;/p&gt;\r\n','about.html','88.html','0');");
E_D("replace into `travel_page` values('86','7','0','如何预定','&lt;p&gt;\r\n	如何预定&lt;/p&gt;\r\n','about.html','86.html','0');");
E_D("replace into `travel_page` values('87','7','0','付款方式','&lt;p&gt;\r\n	付款方式&lt;/p&gt;\r\n','about.html','87.html','0');");
E_D("replace into `travel_page` values('89','7','0','用户服务条款','&lt;p&gt;\r\n	用户服务条款&lt;/p&gt;\r\n','about.html','89.html','0');");
E_D("replace into `travel_page` values('90','1','0','公司简介','','about.html','index.html','0');");
E_D("replace into `travel_page` values('91','1','0','诚聘英才','','about.html','91.html','0');");
E_D("replace into `travel_page` values('92','1','0','办公场所','&lt;p&gt;\r\n	办公场所&lt;/p&gt;\r\n','about.html','92.html','0');");
E_D("replace into `travel_page` values('93','1','0','员工风采','','about.html','93.html','0');");
E_D("replace into `travel_page` values('95','6','0','非洲邀请函单位','非洲邀请函单位','enterprise.html','95.html','0');");

require("../../inc/footer.php");
?>