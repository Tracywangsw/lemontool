<?php
class clientAction extends Action{
	Public function	info(){
		$back_str="Flappy1.1@@windows@@除了可以将flappy bird看到的都山寨一遍外，还提供了柱子运动以及一些增益效果来加大游戏难度哦，当然如果你是编程达人，还可以在高级模式中用代码完成哦。@@2.0@@http://www.lemontool.com/skes/FlappyBird.ske@@http://www.lemontool.com/skes//images/flappybird.png||幻灯片骨架（for 微信）@@html5@@幻灯片骨架forHTML5（微信），利用这个骨架可以生动的介绍相关信息，还可以制作漫画，神奇的魔术等等，然后可以迅速的在微信圈子里进行传播哦@@1.0@@http://www.lemontool.com/skes/pp.ske@@http://www.lemontool.com/skes/images/pp.png||2048@@android@@一直看着2到2048数字是不是有点烦呢？现在可以自己重新打造属于自己的2048了，换上自己的图案，看到不一样的2048吧@@1.0@@http://www.lemontool.com/skes/MainActivity.ske@@http://www.lemontool.com/skes/images/2048.png||学习编程@@windows@@编程小白怎么办？我也想学习程序语言怎么办？传统的那些书本看起来又很枯燥。没关系，试试我们的编程学习骨架吧，互动性极强，同时轻松学会编程知识。@@1.0@@http://www.lemontool.com/skes/learn.ske@@http://www.lemontool.com/skes/images/code.png||表白应用 @@android@@想给女友、女神、男友、男神感动吗？在里面加入感人的话，录上自己的声音便可以制作一款表白的应用。试试吧！@@1.0@@http://www.lemontool.com/skes/FirstActivity.ske@@http://www.lemontool.com/skes/images/biaobai.png||打地鼠 @@android@@可以将地鼠设置成你想要揍的人的头像哦，虐男友、虐基友、虐自己必备神器。仅需一步就可搞定。@@1.0@@http://www.lemontool.com/skes/CopyofgameHit.ske@@http://www.lemontool.com/skes/images/hit.png||机器人对话 @@android@@小黄鸡是不是很智能呢？siri是不是很了不起呢？现在你也可以制作出属于自己的可以和自己聊天的机器人哦，除此之外，还能制作星座测试、互动帮助手册、互动小说等等，发挥想象力吧！@@1.0@@http://www.lemontool.com/skes/talk.ske@@http://www.lemontool.com/skes/images/talk.png||flappy2@@windows@@除了可以将flappybird看到的都山寨一遍外，还提供了柱子运动以及一些增益效果来加大游戏难度哦，当然如果你是编程达人，还可以在高级模式中用代码完成哦。此版本骨架还可以加入声音以及对柱子增加文字效果。@@1.0@@http://www.lemontool.com/skes/flapppag.ske@@http://www.lemontool.com/skes/images/flappybird2.png||HTML5宣传骨架@@html5@@利用这个骨架可以生动的介绍相关信息，还可以制作漫画，神奇的魔术等等，然后可以迅速的在微信圈子里进行传播哦@@1.0@@http://www.lemontool.com/skes/pp2.ske@@http://www.lemontool.com/skes/images/pp.png||HTML5宣传骨架2@@html5@@利用这个骨架可以生动的介绍相关信息，还可以制作漫画，神奇的魔术等等，然后可以迅速的在微信圈子里进行传播哦@@1.0@@http://www.lemontool.com/skes/pp3.ske@@http://www.lemontool.com/skes/images/pp.png";
		echo $back_str;
	}
	Public function	version(){
		$version="0.994";
		echo $version;
	}
	Public function space(){
		$uid=$_POST['uid'];
		$edit=$_POST['edit'];
		$path="./user/$uid/$edit";
		if(file_exists($path)){
			copy("./up.php","$path/up.php");
			chmod("$path/up.php",0777);
			echo $edit;
		}
		else{
			mkdir($path,0777,true);
			chmod($path,0777);
			copy("./up.php","$path/up.php");
			chmod("$path/up.php",0777);
			echo $edit;
		}
		//echo "创建失败";
	}
}
?>