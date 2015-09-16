<?php  
 $c = $GLOBALS['HTTP_RAW_POST_DATA'];  
 $n = $_GET["filename"];  
 $fp = fopen($n,'w+');  
 fwrite($fp, $c, strlen($c));  
 fclose($fp);
 //chmod($n,0777);
 
function unzip_file($file, $destination){   
// 实例化对象
$path="./$destination";
mkdir($path,0777,true);
chmod($path,0777);   
$zip = new ZipArchive() ;   
//打开zip文档，如果打开失败返回提示信息   
if ($zip->open($file) !== TRUE) {   
    die ("Could not open archive");   
}   
//将压缩文件解压到指定的目录下   
$zip->extractTo($destination);   
//关闭zip文档   
$zip->close();   
echo 'Archive extracted to directory';   
}   
//测试执行   
unzip_file("$n","./"); 
?>