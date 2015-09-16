$(document).ready(function(){
	$("#unique_tel").val(getPar("regsign"));
	$("#unique_tel").blur(function(){
		$("#tip_1").text(judge_user($("#unique_tel").val()));
	});
	$("#pwd").blur(function(){
		$("#tip_2").text(judge_pwd($("#pwd").val()));
	});
	$("#getcode_num").click(function(){  //生成验证码
        $(this).attr("src",'../code_num.php?' + Math.random()); 
    }); 
	$("#code_num").blur(function(){
		var code_num = $("#code_num").val(); 
		var callback = function(data){
			//alert(data.length);
			if(data.trim() == '1'){  //在ubuntu服务器上,data返回的字符串带有空格!!!!
				$("#tip_3").text("ok");
			}
			else{
				$("#tip_3").text("验证码错误");
				$("#getcode_num").trigger("click");
			}
		}
		if(code_num == ""){
			$("#tip_3").text("验证码不能为空");
		}
		else{
			$.post("../Vaild/chk_code?act=num",{code:code_num},callback);
		}
	});
	$("#submit").click(function(){
		if(judge_user($("#unique_tel").val()) == "ok" && judge_pwd($("#pwd").val()) == "ok" && $("#tip_3").text() == "ok") return true;
		return false;
	});
	
})
