<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>VIP</title><link rel="stylesheet" type="text/css" href="/Public/css/header.css" /><link rel="stylesheet" type="text/css" href="/Public/css/initial.css" /><link rel="stylesheet" type="text/css" href="/Public/css/vip.css" /><script type="text/javascript" src="/Public/js/jquery.js"></script><script type="text/javascript" src="/Public/js/jquery_min.js"></script><script type="text/javascript" src="/Public/js/common.js"></script><script type="text/javascript" src="/Public/js/tinybox.js"></script><script type="text/javascript">$(function(){
	var $form_inputs = $('form input');
	var $rainbow_and_border = $('.rain, .border');
	$form_inputs.bind('focus', function(){
		$rainbow_and_border.addClass('end').removeClass('unfocus start');
	});
	$form_inputs.bind('blur', function(){
	$rainbow_and_border.addClass('unfocus start').removeClass('end');
	});
	$form_inputs.first().delay(800).queue(function() {
	$(this).focus();
	});
});
</script></head><body><!------header---------><script type="text/javascript" src="/Public/js/jquery.js"></script><script type="text/javascript" src="/Public/js/jquery_min.js"></script><script type="text/javascript" src="/Public/js/common.js"></script><script type="text/javascript" src="/Public/js/all.js"></script><div class="head "><div class="header wrap clearfix"><div class="mainnav fr"><ul class="clearfix"><li class="active nav"><a href="../Main/index">首页<span>/Home</span></a></li><li class="nav"><a href="../Main/shop">商店<span>/Shop</span></a></li><li class="nav"><a href="">社区<span>/BBS</span></a></li><li class="nav"><a href="">帮助<span>/Help</span></a></li><li class="inputli"><input class="input-text" type="text" value="请输入"  onfocus="if(value=='请输入'){value=''}" 
                    onblur="if(value==''){value='请输入'}"/></li><li id="li_vip" class="nav" style="display:none"><a href="../User/vip">VIP</a></li><li class="logreg" ><a href="../User/login" id="a_login">登录</a><span> / <a href="../User/register" id="a_register">注册</a></li></ul></div></div></div><!-------------content--------><div class="vip"><ul class=""><li><div class=""><img src="../images/lemon.png"/></div></li><li><?php echo ($info); ?></li><li><div class="rain"><div class="border start"><form class="inputs" method="post" action=""><input name="vip_code" class="txt" type="text" value="输入VIP码"  onfocus="if(value=='输入VIP码'){value=''}" 
                    onblur="if(value==''){value='输入VIP码'}"/><a href="#" id="click1">?</a><input type="submit" value="立即成为VIP" /></form></div></div></li></ul></div><script> var content = "<img width='554' height='500' src='../images/img.png' />";//弹出图片
        T$('click1').onclick = function(){TINY.box.show(content,0,0,0,0)}
</script></body></html>