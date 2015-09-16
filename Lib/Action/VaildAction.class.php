<?php 
class VaildAction extends Action{
	Public function chk_code(){
		session_start(); 
		$code = trim($_POST['code']); 
		if($code == $_SESSION["code_num"]){ 
		   echo "1"; 
		} 
	}
}
?>