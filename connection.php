<?php
//connectoin with db
$db="loan";
$link= mysqli_connect("localhost", "root", "", $db);
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/loan/');
define('SITE_PATH','http://127.0.0.1/loan/');
 
define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'uploads/');
 define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'uploads/'); 
if(!$link){
	die(mysqli_error($link).mysqli_errno($link));
}
?>