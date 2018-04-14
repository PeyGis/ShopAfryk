<?php

//session start
session_start();

//destroy session
session_destroy();

//redirect to login
if(isset($_GET["page"]) && !empty($_GET["page"])){

	if($_GET["page"] == "1") {
		echo "string1";
	header("location:../index.php");
	} else{
		header("location:../index.php");
	}
}

?>