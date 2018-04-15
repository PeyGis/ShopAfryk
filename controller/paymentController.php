<?php
require_once((dirname(__FILE__)).'/../model/paymentclass.php');

	function insertOrder( $st){
	$invoice=mt_rand();
	$user_id=$_SESSION['user_id'];
	$obj=new Paymentclass();
	$orderResponse=$obj->insertorders($user_id,$invoice, $st);
	return $orderResponse;

	}

	function insertPayment($amount,$cc){
	$user_id=$_SESSION['user_id'];
	$obj=new Paymentclass();
	$payStatus=$obj->insertpayment($amount,$user_id,$cc);
	return $payStatus;
	}


	

?>