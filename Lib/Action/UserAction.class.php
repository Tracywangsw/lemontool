<?php 
class UserAction extends Action{
	
	/*
		公共函数
	*/
	//验证邮箱函数
	Public function isEmail($value){
		$match='/^[\w\d]+[\w\d-.]*@[\w\d-.]+\.[\w\d]{2,10}$/i';
		$v = trim($value);
		if(empty($v)) 
			return false;
		return preg_match($match,$v);
	}
	//验证手机函数
	Public function isMobile($value){
		$match='/^[(86)|0]?(13\d{9})|(15\d{9})|(18\d{9})$/';
		$v = trim($value);
		if(empty($v)) 
			return false;
		return preg_match($match,$v);
	}
	//生成不重复的uid
	Public function getUid($list){ 
		$randid = rand(0,1000000000);
		foreach($list as $val){
			if($val == $randid){
				$randid = rand(0,1000000000);
			}
		}
		return $randid;
	}
	//注册处理函数
 	 Public function register_all($sign,$unique_tel,$pwd){
		$p=0;
		$user = M("user",null);
		if($pwd != "" && $unique_tel != ""){
			if($this->isEmail($unique_tel)){
				$same = $user->where("email = '$unique_tel'")->select();
				if(!$same){
					$data['email'] = $unique_tel;
					$data['password'] = $pwd;
					$data['reg_time'] = date("Y-m-d");
					$randid = $user->getField("uid");
					$randid = $this->getUid($randid);
					$data['uid'] = $randid;
					$p = 1;
				}
				else{
					if($sign == 0){
						echo "1";//"此手机已被注册，换一个吧～";
					}
					else if($sign == 1){
						$reg_note = "此邮箱已被注册，换一个吧～";
					}
				}		
			}
			else if($this->isMobile($unique_tel)){
				$same = $user->where("telephone = $unique_tel")->select();
				if(!$same){
					$data['telephone'] = $unique_tel;
					$data['password'] = $pwd;
					$data['reg_time']=date("Y-m-d");
					$randid = $user->getField("uid");
					$randid = $this->getUid($randid);
					$data['uid'] = $randid;
					$p=1;
				}
				else{
					if($sign == 0){
						echo "1";//"此手机已被注册，换一个吧～";
					}
					else if($sign == 1){
						$reg_note = "此手机已被注册，换一个吧～";
					}
				}	
			}
			else{
				if($sign == 0){
					echo "2";//"此手机已被注册，换一个吧～";
				}
				else if($sign == 1){
					$reg_note = "邮箱/手机输入格式有误";
				}
			}
			if($p == 1){
				$id = $user->data($data)->add();
				if($id){
					//写入账户信息
					$user_account=M("user_account",null);
					$data['uid']=$id;
					$data['ip']= get_client_ip(); 
					$data['vip_time']=date("Y-m-d",mktime(0, 0, 0 , date("m"), date("d")+15, date("Y")));
					$user_account->add($data);
					
					//加入一条默认购买记录
					$record=M("shop_record",null);
					$data["uid"]=$id;
					$data["sid"]=1;
					$data['shop_time'] = date("Y-m-d");  	
					$data['deadline'] = date("Y-m-d",mktime(0, 0, 0 , date("m"), date("d"), date("Y")+10));
					$record->add($data);
					
					//新建用户独立文件夹
					$path = "./user/$randid";
					$bool = mkdir($path,0777,true);
					chmod($path,0777);  
					if($bool){
						copy("./up.php","$path/up.php");
						chmod("$path/up.php",0777);
						if($sign == 0){
							echo "0";//"注册成功";
						}
						else if($sign == 1){
							$reg_note = "注册成功，$unique_tel";
							redirect("login?regsign=$unique_tel");
						}
					}
					else{
						$reg_note = "$path+新建文件夹失败";
					}
				}
				else{
					$reg_note = "数据库插入有误！";
				}
			}
		
		}
		if($sign == 1){
			return $reg_note;
		}
		else{
			return "client";
		}
		
	} 
	//登录处理函数
	  Public function login_all($sign,$unique_tel,$pwd){
		$user = M("user",null);
		$i=0;
		if($pwd != "" && $unique_tel != ""){
			if($this->isEmail($unique_tel)){
				$result = $user->where("email = '" . $unique_tel . "' AND password = '" . $pwd . "'")->getField("id");
				$i=1;
			}
			else if($this->isMobile($unique_tel)){
				$result = $user->where("telephone = '" . $unique_tel . "' AND password = '" . $pwd . "'")->getField("id");
				$i=1;
			}
			else{
				if($sign == 0){
					echo "2";//"邮箱/手机输入格式有误";
				}
				else if($sign == 1){
					$login_error="邮箱/手机输入格式有误";
				}
			}
			if($result != null && $i == 1){  //将id、username写入cookie，需要优化数据库读取
				if($sign == 0){
					$img=$user->where("id=" . $result)->getField("head_image");//头像路径
					$nikename=$user->where("id=" . $result)->getField("username");
					$uid=$user->where("id=" . $result)->getField("uid");
					$reg_time = $user->where("id=" . $result)->getField("reg_time");//注册时间
					$server_time = date("Y-m-d");//服务器当前时间
					
					//写入账户信息
					$account=M("user_account",null);
					$vip_time=$account->where("uid=" . $result)->getField("vip_time");//会员到期时间
					$lemons=$account->where("uid=" . $result)->getField("lemons");
					
					//获取已有骨架数量
					$skeleton=M("shop_record",null);
					$count=$skeleton->where("uid=" . $result)->select();
					$skes=0;
					if(!$count) $skes=0;
					else{
						$skes=count($count['id']);
					}
					$return_val = "0+" . strval($img) . "+" . strval($vip_time) . "+" . strval($lemons) . "+" . strval($skes) . "+" . strval($nikename) . "+" . strval($uid) . "+" . strval($server_time);//返回值
					
					//判断是否为试用期用户
					$test_days = (strtotime($vip_time) - strtotime($reg_time))/(60*60*24);//到期时间 - 注册时间
					$remain_days = (strtotime($vip_time) - strtotime($server_time))/(60*60*24);//剩余天数
					if($test_days <= 15 && $test_days >0) { //还在试用期的用户
						echo $return_val . "+$remain_days+try";
					}
					else{
						if($test_days < 0) $remain_days = 0;
						echo $return_val . "+$remain_days+normal";	
					} 
				}
				else if($sign == 1){
					$uid = $user->where("email = '" . $unique_tel . "' or telephone = '" . $unique_tel . "'")->getField("id");
					$username = $user->where("id = $uid")->getField("username");
					if($username) $unique_tel = $username;
					setcookie("username","$username",time()+3600*24*7,'/');
					setcookie("uid","$uid",time()+3600*24*7,'/');
					redirect("http://www.lemontool.com/Main/index");
				}
			}
			else if($result == null && $i==1){
				if($sign == 0){
					echo "1";//"登录失败,邮箱/手机与密码不对应～";
				}
				else if($sign == 1){
					$login_error = "登录失败,邮箱/手机与密码不对应～";
				}
			}
		}
		if($sign == 1){
			return $login_error;
		}
		else{
			return "client";
		}
	} 
	
	/*
		请求处理
	*/
	Public function register(){ //注册
		$type = $_GET["type"];
		$unique_tel = $_POST["unique_tel"];
		$pwd = md5($_POST["pwd"]);
		$sign = 1;
		if($type == "client"){ //移动端的请求
			$sign = 0;
		}
		else if($type == null){
			$sign = 1;
		}
		$reg_note = $this->register_all($sign,$unique_tel,$pwd);
		if($reg_note != "client"){
			$this->assign("reg_note",$reg_note);
			$this->display('register');
		}
	}
	
	Public function login(){ //登录
		$type = $_GET["type"];
		$unique_tel = $_POST["unique_tel"];
		$pwd = md5($_POST["pwd"]);
		$sign = 1;
		if($type == "client"){ //移动端的请求
			$sign = 0;
		}
		else if($type == null){
			$sign = 1;
			
		}
		$login_error = $this->login_all($sign,$unique_tel,$pwd);
		if($login_error != "client"){
			$this->assign("login_error",$login_error);
			$this->display("login");
		}  	
	}
	
	Public function vip(){	//加载vip页面
		$uid = $_COOKIE['uid'];
		if($uid != null){  //判断是否登录
			$user_account = M('user_account',null);
			$user = M('user',null);
			
			//显示用户会员信息
			$reg_email = $user->where("id = $uid")->getField("email");
			$reg_tel = $user->where("id = $uid")->getField("telephone");
			$reg_date = $user->where("id = $uid")->getField("reg_time");
			
			if($reg_email == null) $reg_account = $reg_tel;
			else $reg_account = $reg_email;
			$cur_vip = $user_account->where("uid = $uid")->getField("vip_time"); //获取充值前的vip_time
			$left_days = (strtotime($cur_vip) - strtotime(date("Y-m-d")))/(60*60*24);//会员剩余天数
			$try_days = (strtotime($cur_vip) - strtotime($reg_date))/(60*60*24);//判断是否为试用会员
			if($try_days <= 15 && $try_days > 0){
				$note = "尊敬的用户 <b style='color:yellow'>$reg_account</b> ，您的试用期限还剩" . $left_days . "天";
			}
			else{
				if($left_days <= 0){
					$note = "您还不是会员，赶快输入VIP码注册吧！";
				}
				else{
					$note = "尊敬的会员用户 <b style='color:yellow'>$reg_account</b> ，您的会员期限还剩" . $left_days . "天";
				}
			}
			$this->assign("info",$note);
			
			//VIP验证过程
			$input_vip = $_POST['vip_code'];
			if($input_vip != null){
				$vip = M('vip',null);
				$code_id = $vip->where("vip_code = '$input_vip' and available = 1")->getField("id"); //验证vip码
				if($code_id){
					$type = $vip->where("id = $code_id")->getField("type"); //获取vip类型
					
					//在user_account表中修改用户vip_time			
					if(strtotime($cur_vip)<=strtotime(date("Y-m-d"))){
						if($type == 1) $data['vip_time'] = date("Y-m-d",mktime(0, 0, 0 , date("m"), date("d"), date("Y")+1));						
						if($type == 0) $data['vip_time'] = date("Y-m-d",mktime(0, 0, 0 , date("m")+1, date("d"), date("Y")));
					}
					else{
						$cur_vip_list = explode("-",$cur_vip); //分割出充值前的vip_time的年月日
						if($type == 1) $data['vip_time'] = date("Y-m-d",mktime(0, 0, 0 , $cur_vip_list[1], $cur_vip_list[2], $cur_vip_list[0]+1));						
						if($type == 0) $data['vip_time'] = date("Y-m-d",mktime(0, 0, 0 , $cur_vip_list[1]+1, $cur_vip_list[2], $cur_vip_list[0]));
					}
					$deadline = $data['vip_time'];
					$result = $user_account->where("uid = $uid")->save($data);
					 
					if($result){
						$data["available"] = 0;//修改vip_time成功后，使验证码失效
						if($vip->where("id = $code_id")->save($data)){
							$this->assign("info","验证码正确，已成为会员，会员到期时间为$deadline");
						}
						
					}
				}
				else{
					$this->assign("info","验证码不正确");
				}
			}
			$this->display('vip');
		}
		else{
			redirect("http://www.lemontool.com/User/login",3);
		}
	}	

	Public function quit(){
		setcookie("username","",time()-3600,"/");
		setcookie("uid","",time()-3600,"/");
		redirect("http://www.lemontool.com/Main/index");
	}
	
	Public function code_num(){
		
	}
}
?>