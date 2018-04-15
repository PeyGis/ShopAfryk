<?php 
$body = "some long email to be sent";
$subject = 'ShopAfryk Transaction Details';
$header = 'from: isaac.p.coffie@gmail.com';

function sendEmail($email){
	if (mail($email, $subject, $body, $header)){
    	echo " mail sent";
	} else{
		echo "failed";
	}

}

?> 