<?php 

require_once((dirname(__FILE__)).'/../database/dbconnectclass.php');

class Paymentclass extends Dbconnection{
	function insertorders($user_id, $prod_id, $qty, $invoice, $status){
		$sql="INSERT INTO orders (customer_id, product_id, qty, invoice_no, status, order_date) VALUES ('$user_id', '$prod_id','$qty', '$invoice', '$status', NOW())";
		return $this->query($sql);
	}

	function insertpayment($amount,$user_id,$cc){
		$sql="INSERT INTO payment(amt,customer_id,currency, payment_date) VALUES ('$amount','$user_id','$cc', NOW())";
		return $this->query($sql);
	}

}


//$ob = new Paymentclass();

//var_dump($ob->insertorders('24', '52', 2, '124578', 'COMPLETED'));
//var_dump($ob->insertpayment('24', '52', 'USD'));
?>