<?php
/*
 本软件版权归作者所有,在投入使用之前注意获取许可
 作者：北京市普艾斯科技有限公司
 项目：simcms_锐游1.0
 电话：010-58480317
 网址：http://www.simcms.net
 simcms.net保留全部权力，受相关法律和国际		  		
 公约保护，请勿非法修改、转载、散播，或用于其他赢利行为，并请勿删除版权声明。
*/
class myClendar {
	private $dayRow = array("", 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
	private $weekRow = array("chinese" => array("<span style='color:red'>日</span>", "一", "二", "三", "四", "五", "六"),
		"english" => array("<span style='color:red'>SUN</span>", "MON", "TUE", "WEN", "SUR", "FRI", "SAT"));
	private $str = "";
	private $language = "chinese";
	private $preYear;
	private $preMonth;
	private $preDay;
	private $lineid;  //线路id

	/**
	 * 构造函数
	 * 
	 * @name myClendar
	 * @param int $preYear 
	 * @param int $preMonth 
	 * @param int $preDay 
	 * @param string $lan 
	 * @return myClendar 
	 */
	public function myClendar($lineid = 0,$preYear = "", $preMonth = "", $preDay = "", $lan = "chinese") {
		$this -> lineid = $lineid;
		if ($preYear == "") $this -> preYear = date("Y");
		else $this -> preYear = $preYear;
		if ($preMonth == "" || $preMonth < 1 || $preMonth > 12) $this -> preMonth = date("m");
		else $this -> preMonth = $preMonth;
		if ($preDay == "") $this -> preDay = date("d");
		else $this -> preDay = $preDay;
		$this -> language = ($lan == "chinese")?"chinese":"english";
		if ((($this -> preYear % 4 == 0) && ($this -> preYear % 100 != 0)) || ($this -> preYear % 400 == 0)) $this -> dayRow[2] = 29;
	} 

	/**
     * ------------------------------
     * 获得URL
     * ------------------------------
     * @return string
     */
    function get_url()
    {
        $arr_url = parse_url($_SERVER['REQUEST_URI']);
        if (!isset($arr_url['query'])) $arr_url['query'] = '';
        parse_str($arr_url['query'],$arr_get);
        if (isset($arr_get['year'])) unset($arr_get['year']);
		if (isset($arr_get['month'])) unset($arr_get['month']);
        $str_url = '';
        foreach ($arr_get as $k => $v)
        {
            $str_url .= $k.'='.$v.'&';
        }
        return $arr_url['path'].'?'.substr($str_url,0,-1).'&';
    }


	/**
	 * 显示星期行
	 * 
	 * @access private 
	 */
	private function showWeek() {
		$this -> str .= "<tr align='center'>\r\n";
		for($i = 0;$i < count($this -> weekRow[$this -> language]);$i++)
		$this -> str .= "<td class='weekTd'>" . $this -> weekRow[$this -> language][$i] . "</td>\r\n";
		$this -> str .= "</tr>\r\n";
	} 

	/**
	 * 显示日期
	 * 
	 * @access private 
	 */
	private function showDay() {
		global $db;

		//出发日期
		$starttime = mktime(0,0,0,$this -> preMonth,1,$this -> preYear);
		$endtime   = mktime(0,0,0,$this -> preMonth,date("t",$starttime),$this -> preYear);
		
		$linetime_arr = array();
		$departure_date_list = $db -> row_select('departure_time','pid='.$this->lineid." and departure_time >= ".$starttime." and departure_time <=".$endtime,'*',0,'orderid');
		foreach($departure_date_list as $key => $value){
			$linetime_arr[date('j',$value['departure_time'])] = "<a href='".WEB_PATH."/index.php?mod=order&id=".$this->lineid."&departure_date=".$value['id']."' class='pl20 f12 blue02' target='_parent'>预定</a></span><div class='mt5'><span class='f12'>位置：电询<br><span class='red'>￥".intval($value['price'])."元</span></div>";
		}


		$time = mktime(0, 0, 0, $this -> preMonth, 1, $this -> preYear);
		$firstDay = date("w", $time); //得到当前月的第一天
		$this -> str .= "<tr align='center' height='20'>\r\n";
		for($i = 0;$i < $firstDay;$i++) $this -> str .= "<td class='calTd'>&nbsp;</td>\r\n";
		for($j = 1;$j <= $this -> dayRow[$this -> preMonth];$j++) {
			if ($j == $this -> preDay) {
				$day = "<span class='today'>$j</span>";
				if(!empty($linetime_arr[$j])){
					$day .= $linetime_arr[$j];
				}
			}
			else if ($firstDay == 0) {
				$day = "<span class='sunday'>$j</span>";
				if(!empty($linetime_arr[$j])){
					$day .= $linetime_arr[$j];
				}
			}
			else {
				$day = $j;
				if(!empty($linetime_arr[$j])){
					$day .= $linetime_arr[$j];
				}
			}
			if ($firstDay == 6) {
				$this -> str .= "<td class='calTd' valign='top' onmouseover=\"this.className='caltdOver'\">";
				$this -> str .= $day . "</td>\r\n</tr>\r\n";
				if ($j != $this -> dayRow[$this -> preMonth]) $this -> str .= "<tr align='center' height='20'>\r\n";
				$firstDay = -1;
			} else {
				$this -> str .= "<td class='calTd' valign='top' onmouseover=\"this.className='caltdOver'\">";
				$this -> str .= $day . "</td>\r\n";
			} 
			$firstDay++;
		} 
		if ($firstDay != 0) {
			for($i = $firstDay;$i <= 6;$i++) {
				$this -> str .= "<td class='calTd'>&nbsp;</td>\r\n";
				if ($i == 6) $this -> str .= "</tr>\r\n";
			} 
		} 
	} 

	/**
	 * 显示年份选择
	 * 
	 * @access private 
	 */
	private function showYearBar() {
		$url = $this->get_url();
		$this -> str .= "&nbsp;<a href=".$url."year=" . ($this -> preYear-1) . "&month=" . $this -> preMonth . " title='上一年'><img src='08.png'></a> ";
		$this -> str .= "<a href=".$url."year=" . ($this -> preYear + 1) . "&month=" . $this -> preMonth . " title='下一年'><img src='07.png'></a>&nbsp;";
	} 

	/**
	 * 显示月份选择
	 * 
	 * @access private 
	 */
	private function showMonthBarPre() {
		$url = $this->get_url();
		if($this -> preMonth == 1){
			$this -> str .= "&nbsp;<a href=".$url."year=" . ($this -> preYear - 1) . "&month=12 title='上一月' class='premonth'></a> ";
		}
		else{
			$this -> str .= "&nbsp;<a href=".$url."year=" . ($this -> preYear) . "&month=" . ($this -> preMonth-1) . " title='上一月' class='premonth'></a> ";
		}
		
	} 

	/**
	 * 显示月份选择
	 * 
	 * @access private 
	 */
	private function showMonthBarNext() {
		$url = $this->get_url();
		if($this -> preMonth == 12){
			$this -> str .= "&nbsp;<a href=".$url."year=" . ($this -> preYear + 1) . "&month=1 title='下一月' class='nextmonth'></a> ";
		}
		else{
			$this -> str .= "<a href=".$url."year=" . ($this -> preYear) . "&month=" . ($this -> preMonth + 1) . " title='下一月' class='nextmonth'></a>&nbsp;";
		}	
	} 

	/**
	 * 显示日历
	 * 
	 * @access public 
	 * @return string 
	 */
	public function showCalendar() {
		$this -> str = "<table border=0 cellpadding=0 cellspacing=0 class='calTable'>\r\n";
		$this -> str .= "<tr height='30'>\r\n<td colspan=\"7\" align='center' class='calHeader'>\r\n";
		//$this -> showYearBar();
		$this -> showMonthBarPre();
		$this -> str .= "<span id='preYear'>" . $this -> preYear . "</span> 年 \r\n";
		$this -> str .= "<span id='preMonth'>" . $this -> preMonth . "</span> 月\r\n";
		$this -> showMonthBarnext();
		$this -> str .= "</td>\r\n</tr>\r\n";
		$this -> showWeek($this -> language);
		$this -> showDay();
		$this -> str .= "</table>\r\n";
		return $this -> str;
	} 
} 

?>