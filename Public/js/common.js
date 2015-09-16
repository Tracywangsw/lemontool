function isEmail(value){
	//var match='/^[\w\d]+[\w\d-.]*@[\w\d-.]+\.[\w\d]{2,10}$/i';
	var thisRegex =  /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
	var v = value.trim();
	if(!v) return false;
	return thisRegex.test(v);
}

function isMobile(value){
	//var match='/^[(86)|0]?(13\d{9})|(15\d{9})|(18\d{9})$/';
	//var thisRegex = new RegExp('/^0?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/');
	var thisRegex=/^0?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/;
	var v = value.trim();;
	if(!v) return false;
	//alert(thisRegex.test(v));
	return thisRegex.test(v);
}

function judge_user(form){
	var warm="ok";
	if(!form){
		warm="输入不能为空";
		return warm;
	}
	else{
		if(isEmail(form)) return warm;
		else if(isMobile(form)) return warm;
		else{
			warm="邮箱/手机输入的格式不正确";
			return warm;
		}
	}
	
}

function judge_pwd(form){
	var warm="ok";
	if(!form){
		warm="输入不能为空";
		//return warm;
	}
	else{
		if(form.length<6){
			warm="密码至少为6位";
			//return warm;
		}
	}
	return warm;
}

function rejudge_pwd(form1,form2){
	var warm="ok";
	if(!form2){
		warm="输入不能为空";
		//return warm;
	}
	if(form1!=form2){
		warm="输入的密码不一致";
		//return warm;
	}
	return warm;
}

function getCookie(c_name)
{
	if (document.cookie.length>0)
	{
		var c_start=document.cookie.indexOf(c_name + "=");
		if(c_start!=-1)
		{
			c_start=c_start + c_name.length+1 
			var c_end=document.cookie.indexOf(";",c_start);
			if (c_end==-1) c_end=document.cookie.length
			return unescape(document.cookie.substring(c_start,c_end));
		} 
	}
	return "";
}

function setCookie(c_name,value,expiredays)
{
	var exdate=new Date();
	exdate.setDate(exdate.getDate()+expiredays);
	document.cookie=c_name+ "=" +escape(value)+((expiredays==null) ? "" : ";expires="+exdate.toGMTString());
}

function getPar(par){ //获取get参数
	//获取当前URL
	var local_url = document.location.href; 
	//获取要取得的get参数位置
	var get = local_url.indexOf(par +"=");
	if(get == -1){
		return null;   
	}   
	//截取字符串
	var get_par = local_url.slice(par.length + get + 1);
	//判断截取后的字符串是否还有其他get参数
	var nextPar = get_par.indexOf("&");
	if(nextPar != -1){
		get_par = get_par.slice(0, nextPar);
	}
	return get_par;
}

window.beforeonunload = function(){
	setCookie("username","","-3600");
	alert(getCookie("username"));
}
