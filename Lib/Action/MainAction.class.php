<?php
Class MainAction extends Action{
	Public function index(){
		$this->assign("note","0");
		$this->display();
		
	}
	Public function down(){
		$this->assign("note","1");
		$this->display();
		
	}
	Public function cuSk(){
		$this->assign("note","2");
		$this->display();
		
	}
	Public function about(){
		$this->assign("note","3");
		$this->display();
		
	}
}
?>