<?php  
 $c = $GLOBALS['HTTP_RAW_POST_DATA'];  
 $n = $_GET["filename"];  
 $fp = fopen($n,'w+');  
 fwrite($fp, $c, strlen($c));  
 fclose($fp);
 //chmod($n,0777);
 
function unzip_file($file, $destination){   
// ʵ��������
$path="./$destination";
mkdir($path,0777,true);
chmod($path,0777);   
$zip = new ZipArchive() ;   
//��zip�ĵ��������ʧ�ܷ�����ʾ��Ϣ   
if ($zip->open($file) !== TRUE) {   
    die ("Could not open archive");   
}   
//��ѹ���ļ���ѹ��ָ����Ŀ¼��   
$zip->extractTo($destination);   
//�ر�zip�ĵ�   
$zip->close();   
echo 'Archive extracted to directory';   
}   
//����ִ��   
unzip_file("$n","./"); 
?>