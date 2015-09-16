<?php 
	header("Content-Type:text/html; charset=utf-8");
	define('APP_NAME', '');
	define('APP_DEBUG',false);
    $url = $_SERVER['SCRIPT_NAME'];
    define('WEB_PATH',substr($url,0,stripos($url , '/')));
    define('CURRENT_URL',$_SERVER['PHP_SELF']);
    require( "./ThinkPHP/ThinkPHP.php");	
?>
