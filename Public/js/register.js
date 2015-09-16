$(document).ready(function(){
	$("#unique_tel").blur(function(){
		$("#tip_1").text(judge_user($("#unique_tel").val()));
	});
	$("#pwd").blur(function(){
		$("#tip_2").text(judge_pwd($("#pwd").val()));
	});
	$("#confirm_pwd").blur(function(){
		$("#tip_3").text(rejudge_pwd($("#pwd").val(),$("#confirm_pwd").val()));
	});
	$("#submit").click(function(){
		if(judge_user($("#unique_tel").val()) == "ok" && judge_pwd($("#pwd").val()) == "ok" && rejudge_pwd($("#pwd").val(),$("#confirm_pwd").val()) == "ok" ) return true;
		return false;
	});
})
