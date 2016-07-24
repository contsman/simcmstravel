<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `travel_node`;");
E_C("CREATE TABLE `travel_node` (
  `id` smallint(10) NOT NULL auto_increment,
  `catid` int(11) NOT NULL,
  `name` varchar(30) default NULL,
  `url` varchar(200) default NULL,
  `startpage` int(11) NOT NULL,
  `endpage` int(11) NOT NULL,
  `list_list_tagname` varchar(10) NOT NULL,
  `list_list_classname` varchar(32) NOT NULL,
  `list_list_idname` varchar(32) NOT NULL,
  `list_title_tagname` varchar(10) NOT NULL,
  `list_title_classname` varchar(32) NOT NULL,
  `list_title_idname` varchar(32) NOT NULL,
  `news_news_tagname` varchar(10) NOT NULL,
  `news_news_classname` varchar(32) NOT NULL,
  `news_news_idname` varchar(32) NOT NULL,
  `news_title_tagname` varchar(10) NOT NULL,
  `news_title_classname` varchar(32) NOT NULL,
  `news_title_idname` varchar(32) NOT NULL,
  `news_content_tagname` varchar(10) NOT NULL,
  `news_content_classname` varchar(32) NOT NULL,
  `news_content_idname` varchar(32) NOT NULL,
  `title_filter` varchar(32) NOT NULL,
  `content_filter` varchar(200) NOT NULL,
  `ispic` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8");
E_D("replace into `travel_node` values('1','0','div+css','http://www.chinaz.com/news/roll/(*).shtml','4','9','div','news_list','','li','list_title','','div','ucarNewsDetail','','h1','article-heading','','div','cont-detail','','','','1');");
E_D("replace into `travel_node` values('13','0','二手车行情','http://news.taoche.com/gouchezhinan/?page=(*)','2','5','div','ucarlistpage','','li','','','div','ucarNewsDetail','','h1','','','div','ucarNewsDetail_detail','newscontent','','','0');");

require("../../inc/footer.php");
?>