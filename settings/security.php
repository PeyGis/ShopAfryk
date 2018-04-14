<?php 

session_start(); 

function getUserName(){
	if(isset($_SESSION["user_name"])){
		return 'Hi, '. $_SESSION["user_name"];	
	}
	else{
		return "Hi, Guest";
	}
}

function checkLoginStatus(){
	if(isset($_SESSION["user_id"])){
	//header("location:payment_response.php");
	}
	else{
		header("location:login.php");
	}
}

 ?>