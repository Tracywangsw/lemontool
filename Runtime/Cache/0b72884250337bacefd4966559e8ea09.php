<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>柠檬工作室</title><link rel="stylesheet" type="text/css" href="/Public/css/style.css" /><link rel="stylesheet" type="text/css" href="/Public/css/header.css" /><link rel="stylesheet" type="text/css" href="/Public/css/initial.css" /><script type="text/javascript" src="/Public/js/tinybox.js"></script><style>.num li {
	width:21px;
	height:30px;
	_background:none;
	_filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='../images/ink0721hui.png', sizingMethod='crop');
	cursor: pointer;
	overflow: hidden;
	background-image: url(../images/ink0721hui.png);
	background-repeat: no-repeat;
	background-position: center center;
}
.num li.on { background:url(../images/ink0721hui1.png) no-repeat center center; 
	_background:none; 
	_filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='../images/ink0721hui1.png', sizingMethod='crop');
width:21px; height:30px; }
</style></head><body><!------header---------><script type="text/javascript" src="/Public/js/jquery.js"></script><script type="text/javascript" src="/Public/js/jquery_min.js"></script><script type="text/javascript" src="/Public/js/common.js"></script><script type="text/javascript" src="/Public/js/all.js"></script><div class="head "><div class="header wrap clearfix"><div class="mainnav fr"><ul class="clearfix"><li class="active nav"><a href="../Main/index">首页<span>/Home</span></a></li><li class="nav"><a href="../Main/shop">商店<span>/Shop</span></a></li><li class="nav"><a href="">社区<span>/BBS</span></a></li><li class="nav"><a href="">帮助<span>/Help</span></a></li><li class="inputli"><input class="input-text" type="text" value="请输入"  onfocus="if(value=='请输入'){value=''}" 
                    onblur="if(value==''){value='请输入'}"/></li><li id="li_vip" class="nav" style="display:none"><a href="../User/vip">VIP</a></li><li class="logreg" ><a href="../User/login" id="a_login">登录</a><span> / <a href="../User/register" id="a_register">注册</a></li></ul></div></div></div><!-------content-------><!--效果开始--><div class="column1_left"><div class="container" id="idTransformView2"><ul class="slider slider2" id="idSlider2"><li><a href=""><img src="../images/nav1.jpg"/></a><a class="detail" id="click_test2" href="#"><img src="../images/moredetail.png" /></a></li><li><a href=""><img src="../images/nav2.jpg"/></a></li><li><a href=""><img src="../images/nav2.jpg"/></a></li></ul><ul class="num" id="idNum2"><li></li><li></li><li></li></ul></div></div><div class="bone"><div class=" clearfix"><div class="bone_list"><ul ><li style="width:40%"><a href="/" target="_blank"><div class="img2 icon" style=""></div></a></li><li style="width:15%"><a href="/" target="_blank"><div class="img icon_1" style=""></div></a></li><li style="width:15%"><a href="/" target="_blank"><div class="img icon_2" style=""></div></a></li><li style="width:15%"><a href="/" target="_blank"><div class="img icon_1" style=""></div></a></li><li style="width:15%"><a href="/" target="_blank"><div class="img icon_2" style=""></div></a></li></ul></div></div></div><div class="more"><div class="wrap"><div class="more_list clearfix "><h3>更多产品</h3><div class="more_l"><ul><li><span>产品1</span><a class="fr" href="/">进入</a></li><li><span>产品1</span><a class="fr" href="/">进入</a></li><li><span>产品1</span><a class="fr" href="/">进入</a></li><li><span>产品1</span><a class="fr" href="/">进入</a></li><li><span>产品1</span><a class="fr" href="/">进入</a></li></ul></div></div></div></div><!------footer---------><div class="footer"><div class="footer_list wrap"><ul><li><a href="/" target="_blank"><img src="../images/2.png"/></a></li><li><a href="/" target="_blank"><img src="../images/3.png"/></a></li><li><a href="/" target="_blank"><img src="../images/4.png"/></a></li><li><a href="/" target="_blank"><img src="../images/more.png"/></a></li><li><a href="/" target="_blank"><img src="../images/more.png"/></a></li></ul></div></div><script type="text/javascript">//计算idslider2的宽度开始
var kuan1=0;
var kuand=document.getElementById('idSlider2');
var kuan=document.getElementById('idSlider2').getElementsByTagName("li");
var tpz=kuan.length;//图片总个数
for(var i=0; i<kuan.length; i++){
	kuan1+=269;
	}
kuand.style.height=kuan1+'px';
//计算结束

var keVar = function (id) {
	return "string" == typeof id ? document.getElementById(id) : id;
};

var Class = {
  create: function() {
	return function() {
	  this.initialize.apply(this, arguments);
	}
  }
}

Object.extend = function(destination, source) {
	for (var property in source) {
		destination[property] = source[property];
	}
	return destination;
}

var TransformView = Class.create();
TransformView.prototype = {
  //容器对象,滑动对象,切换参数,切换数量
  initialize: function(container, slider, parameter, count, options) {
	if(parameter <= 0 || count <= 0) return;
	var oContainer = keVar(container), oSlider = keVar(slider), oThis = this;

	this.Index = 0;//当前索引
	
	this._timer = null;//定时器
	this._slider = oSlider;//滑动对象
	this._parameter = parameter;//切换参数
	this._count = count || 0;//切换数量
	this._target = 0;//目标参数
	
	this.SetOptions(options);
	
	this.Up = !!this.options.Up;
	this.Step = Math.abs(this.options.Step);
	this.Time = Math.abs(this.options.Time);
	this.Auto = !!this.options.Auto;
	this.Pause = Math.abs(this.options.Pause);
	this.onStart = this.options.onStart;
	this.onFinish = this.options.onFinish;
	
	oContainer.style.overflow = "hidden";
	oContainer.style.position = "relative";
	
	oSlider.style.position = "absolute";
	oSlider.style.top = oSlider.style.left = 0;
  },
  //设置默认属性
  SetOptions: function(options) {
	this.options={ //设置默认值（在{后面注释要小心，Thinkphp的bug！）
		Up:			true,//是否向上(否则向左)
		Step:		5,//滑动变化率
		Time:		50,//滑动延时
		Auto:		true,//是否自动转换
		Pause:		5000,//停顿时间(Auto为true时有效)
		onStart:	function(){},//开始转换时执行
		onFinish:	function(){}//完成转换时执行
	};
	Object.extend(this.options, options || {});
  },
  //开始切换设置
  Start: function() {
	if(this.Index < 0){
		this.Index = this._count - 1;
	} else if (this.Index >= this._count){ this.Index = 0; }
	
	this._target = -1 * this._parameter * this.Index;
	this.onStart();
	this.Move();
  },
  //移动
  Move: function() {
	clearTimeout(this._timer);
	var oThis = this, style = this.Up ? "top" : "left", iNow = parseInt(this._slider.style[style]) || 0, iStep = this.GetStep(this._target, iNow);
	
	if (iStep != 0) {
		this._slider.style[style] = (iNow + iStep) + "px";
		this._timer = setTimeout(function(){ oThis.Move(); }, this.Time);
	} else {
		this._slider.style[style] = this._target + "px";
		this.onFinish();
		if (this.Auto) { this._timer = setTimeout(function(){ oThis.Index++; oThis.Start(); }, this.Pause); }
	}
  },
  //获取步长
  GetStep: function(iTarget, iNow) {
	var iStep = (iTarget - iNow) / this.Step;
	if (iStep == 0) return 0;
	if (Math.abs(iStep) < 1) return (iStep > 0 ? 1 : -1);
	return iStep;
  },
  //停止
  Stop: function(iTarget, iNow) {
	clearTimeout(this._timer);
	this._slider.style[this.Up ? "top" : "left"] = this._target + "px";
  }
};

window.onload=function(){
	function Each(list, fun){
		for (var i = 0, len = list.length; i < len; i++) { fun(list[i], i); }
	};
	
	var objs2 = keVar("idNum2").getElementsByTagName("li");
	var tv2 = new TransformView("idTransformView2", "idSlider2", 538, tpz, {	
		onStart: function(){ Each(objs2, function(o, i){ o.className = tv2.Index == i ? "on" : ""; }) },//按钮样式
		Up: true
	});//6是轮播总数
	tv2.Start();
	Each(objs2, function(o, i){
		o.onmouseover = function(){
			o.className = "on";
			tv2.Auto = false;
			tv2.Index = i;
			tv2.Start();
		}
		o.onmouseout = function(){
			o.className = "";
			tv2.Auto = true;
			tv2.Start();
		}
	})
	
	
	 var content2 = "<img width='554' height='1000' src='../images/img.png' />";//弹出图片
        T$('click_test2').onclick = function(){TINY.box.show(content2,0,0,0,0)}
       
	
}
</script></body></html>