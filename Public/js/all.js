$(document).ready(function(){
	$("#menu li").each(function(i){
		if($("#note").text()==i.toString())
		{
			$(this).addClass("active").siblings().removeClass("active");
		}
		
	});
	var username = getCookie("username");
	if(username){
		$("#li_vip").attr("style","display:display");
		$("#a_login").text(username);
		$("#a_login").attr("href","#");
		$("#a_register").attr("href","../User/quit");
		$("#a_register").text("退出");
	}
	else{
		//alert("hello world");
	}
})