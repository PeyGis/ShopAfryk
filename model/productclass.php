<?php 

require_once((dirname(__FILE__)).'/../database/dbconnectclass.php');


/**
*@Author Isaa Coffie
*/
class ProductClass extends Dbconnection
{
	function getProducts(){
		$sql = 'SELECT * FROM products ORDER BY RAND()';
		return $this->query($sql);
	}

	function getFeaturedProducts(){
		$sql = 'SELECT * FROM products ORDER BY RAND() LIMIT 4';
		return $this->query($sql);
	}
	
	function getProductById($prod_id){
		$sql = "SELECT * FROM products WHERE product_id = '$prod_id'";
		return $this->query($sql);
	}

	function searchProduct($keyword){
		$sql = "SELECT * FROM products WHERE product_keywords LIKE '%$keyword%' OR product_title LIKE '%$keyword%'";
		return $this->query($sql);
	}
	function getBrands(){
		$sql = 'SELECT * FROM brands';
		return $this->query($sql);
	}

	function getCategories(){
		$sql = 'SELECT * FROM categories';
		return $this->query($sql);
	}

	function getCategoryName($cat_id){
		$sql = 'SELECT cat_name FROM categories WHERE cat_id='.$cat_id;
		return $this->query($sql);
	}

	function addProduct($product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_image, $product_keywords){
		 $myQuery = "INSERT INTO products(product_cat, product_brand, product_title, product_price, product_desc, product_image, product_keywords) VALUES('$product_cat', '$product_brand', '$product_title', '$product_price', '$product_desc', '$product_image', '$product_keywords')";
        return $this->query($myQuery);
	}
} 


// $obj = new ProductClass();
// var_dump($obj->addProduct("2", "1", "Samsung S6", "2500", "new phone", '/image/sj-1.png', "phones"));
 ?>