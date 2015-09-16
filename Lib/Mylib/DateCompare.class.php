<?php
class DateCompare{
	Public function vipInfo($date1,$date2){
		$day1 = explode("-",$date1)[1];
		$day2 = explode("-",$date2)[1];
		if($day1-$day2 <= 0) { 
			return 0;//vip已经到期的用户
		}
		elseif($day1-$day2<15){
			return 1;//如果是当前日期和注册时间比较，就是还在试用期的用户；否则，是正常vip用户
		}
		else{
			return 2;//vip用户
		}		
	}
}
?>