<?php 

require_once((dirname(__FILE__)).'/../database/dbconnectclass.php');

class Paymentclass extends Dbconnection{
	function insertorders($user_id,$invoice, $st){
		$sql="INSERT INTO orders (customer_id,invoice_number,status) VALUES ('$user_id','$invoice', '$st' )";
		return $this->query($sql);

	}

	function insertpayment($amount,$user_id,$cc){
		$sql="INSERT INTO payment(amt,customer_id,currency) VALUES ('$amount','$user_id','$cc')";
		return $this->query($sql);

	}

}


// $ob = new Paymentclass();

// var_dump($ob->insertpayment('24', '52', 'usd'));
?>