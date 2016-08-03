<?php
require("../../inc/header.php");


DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `travel_departure_time`;");
E_C("CREATE TABLE `travel_departure_time` (
  `id` int(11) NOT NULL auto_increment,
  `pid` int(11) NOT NULL,
  `departure_time` int(11) NOT NULL,
  `week` varchar(32) NOT NULL,
  `price` int(11) NOT NULL,
  `child_price` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8");
E_D("replace into `travel_departure_time` values('7','189','1369411200','','1200','500','0');");
E_D("replace into `travel_departure_time` values('8','189','1368374400','','1200','600','0');");
E_D("replace into `travel_departure_time` values('11','189','1368806400','','1200','600','0');");
E_D("replace into `travel_departure_time` values('12','189','1369497600','','1200','600','0');");
E_D("replace into `travel_departure_time` values('13','189','1369584000','','1200','600','0');");
E_D("replace into `travel_departure_time` values('22','377','1391616000','','111','11','0');");
E_D("replace into `travel_departure_time` values('21','377','1399219200','','11','11','0');");
E_D("replace into `travel_departure_time` values('20','367','1389801600','','1111','1111','0');");
E_D("replace into `travel_departure_time` values('23','371','1391529600','','200','150','0');");

require("../../inc/footer.php");
?>