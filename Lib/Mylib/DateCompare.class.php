<?php
class DateCompare{
	Public function vipInfo($date1,$date2){
		$day1 = explode("-",$date1)[1];
		$day2 = explode("-",$date2)[1];
		if($day1-$day2 <= 0) { 
			return 0;//vip�Ѿ����ڵ��û�
		}
		elseif($day1-$day2<15){
			return 1;//����ǵ�ǰ���ں�ע��ʱ��Ƚϣ����ǻ��������ڵ��û�������������vip�û�
		}
		else{
			return 2;//vip�û�
		}		
	}
}
?>