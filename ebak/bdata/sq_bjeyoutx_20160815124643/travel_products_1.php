<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `travel_products`;");
E_C("CREATE TABLE `travel_products` (
  `p_id` int(10) NOT NULL auto_increment,
  `p_title` varchar(100) default NULL,
  `p_title2` varchar(100) NOT NULL,
  `p_no` varchar(32) NOT NULL,
  `p_aid` int(11) NOT NULL COMMENT '地区id',
  `p_detail` text COMMENT '摘要',
  `p_arrival_one` varchar(100) NOT NULL,
  `p_arrival_two` varchar(200) default NULL,
  `p_arrival_three` varchar(200) NOT NULL,
  `p_departure_province` varchar(100) NOT NULL,
  `p_departure_city` varchar(200) NOT NULL,
  `p_enddate` varchar(50) NOT NULL,
  `p_departure_time` varchar(50) NOT NULL,
  `p_tel` varchar(50) NOT NULL,
  `p_travel_days` int(5) NOT NULL COMMENT '旅游天数',
  `p_market_price` int(11) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_hot` int(11) NOT NULL COMMENT '关注度',
  `p_signup` varchar(100) NOT NULL COMMENT '提前报名',
  `p_stay` varchar(32) NOT NULL,
  `p_transport` varchar(32) NOT NULL COMMENT '往返交通工具',
  `p_characteristic` text NOT NULL,
  `p_visa` text NOT NULL COMMENT '签证须知',
  `p_fees` text NOT NULL COMMENT '费用包含',
  `p_tips` text NOT NULL COMMENT '温馨提示',
  `p_addtime` int(10) NOT NULL,
  `catid` int(11) default NULL,
  `p_type` tinyint(4) default NULL,
  `is_show` tinyint(1) default '0',
  `p_keywords` varchar(100) default NULL,
  `p_extension` varchar(100) NOT NULL,
  `p_smallpic` text,
  `p_pics` text,
  `p_page` varchar(50) NOT NULL,
  `p_tpl` varchar(50) default NULL,
  `p_updatetime` int(11) NOT NULL,
  `p_hits` int(11) NOT NULL default '0',
  `recommend` tinyint(1) NOT NULL,
  `recommend_home` tinyint(1) NOT NULL,
  `sp_recommend_home` int(1) NOT NULL,
  `promotions` tinyint(1) NOT NULL,
  `ishot` int(11) NOT NULL,
  `orderid` int(11) default NULL,
  PRIMARY KEY  (`p_id`),
  KEY `p_keywords` (`p_keywords`),
  KEY `p_aid` (`p_aid`),
  KEY `p_price` (`p_price`),
  KEY `p_travel_days` (`p_travel_days`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

require("../../inc/footer.php");
?>