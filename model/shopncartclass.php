<?php 

//require_once('./database/dbconnectclass.php');
require_once((dirname(__FILE__)).'/../database/dbconnectclass.php');


/**
* Isaac Coffie
*/
class ShoppingCart extends Dbconnection
{

	function getCartItems($ip_address){
		$sql = "SELECT p.product_id, p.product_cat, p.product_brand, p.product_price, p.product_title, p.product_desc, p.product_image, p.product_keywords, c.p_id, c.ip_add, c.qty FROM products AS p JOIN cart AS c ON p.product_id = c.p_id AND c.ip_add = '$ip_address'";
		return $this->query($sql);
	}
	function getCartItemQty($ip_address){
		$sql = "SELECT * FROM cart WHERE ip_add='$ip_address'";
		return $this->query($sql);
	}

	function getCartItemsAmount($ip_address){
		$sql = "SELECT SUM(product_price * qty) AS amount FROM products AS p JOIN cart AS c ON p.product_id = c.p_id AND c.ip_add = '$ip_address'";
		return $this->query($sql);
	}
	
	function addToCart($prod_id, $ip_adr, $qty){
		 $myQuery = "INSERT INTO cart(p_id, ip_add, qty) VALUES('$prod_id','$ip_adr','$qty')";
        return $this->query($myQuery);
	}

	function validateCart($ip_address, $prod_id){
		$sql = "SELECT * FROM cart WHERE ip_add='$ip_address' AND p_id='$prod_id'";
		return $this->query($sql);
	}

	function removeCartItem($prod_id, $ip_address){
		$sql = "DELETE FROM cart WHERE ip_add='$ip_address' AND p_id='$prod_id'";
		return $this->query($sql);
	}
	function updateCartQuantity($prod_id, $qty, $ip_address){
		$sql = "UPDATE cart SET qty='$qty' WHERE ip_add='$ip_address' AND p_id='$prod_id'";
		return $this->query($sql);
	}

	function deletecart($ip_address){
		$sql="DELETE FROM cart WHERE ip_add='$ip_address'";
		return $this->query($sql);

	}

} 


//  $obj = new ShoppingCart();
// var_dump($obj->getCartItems('10.10.91.158'));
// var_dump($obj->fetch());
 // var_dump($obj->validateCart( "10.10.20.24", 2));
 ?>