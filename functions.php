<?php
//to get js alert
function alert($text){
    echo "<script>alert(\"$text\");</script>";
}
//to go to locaton
function redirect_to($path){
    echo "<script>location=\"$path\";</script>";
}
//confirming right to visit
function confirm_user($user){
    if(strtolower($_SESSION['user_type']) != strtolower("$user")){
        alert("Un-Autherize Access");
        redirect_to("index.php");
    }    
}
//confirming log in
function confirm_logged_in(){
    if(isset($_SESSION['user_type'])){
        return true;
    }else{
        alert("Login Required.");
        redirect_to("login.php");
    }
}
//confirmin nt login
function confirm_not_logged_in(){
    if(isset($_SESSION['user_type'])){
        redirect_to("index.php");
    }
}
//index to user penal
function index_func(){
    if(isset($_SESSION['user_type'])){
        $path=$_SESSION['user_type']."_penal.php";
        redirect_to($path);
    }    
}
function get_safe_value($link,$str){
	if($str!=''){
		$str=trim($str);
		return mysqli_real_escape_string($link,$str);
	}
}
 
	
	
	

?>