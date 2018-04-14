<?php 

//require_once('./database/dbconnectclass.php');
require_once((dirname(__FILE__)).'/../database/dbconnectclass.php');


/**
* Edrine
*/
class UserAccount extends Dbconnection
{

	function registerUser($name, $email, $pass, $gender, $dob){
		 $myQuery = "INSERT INTO users(full_name, gender, date_of_birth, email, password) VALUES('$name', '$gender', '$dob', '$email', '$pass')";
 
        // insert the query
        return $this->query($myQuery);
	}

	function checkDuplicateUser($ip_address, $email){
		$sql = "SELECT * FROM customer WHERE customer_ip='$ip_address' AND customer_email='$email'";
		return $this->query($sql);
	}
 
	function loginUser($email){
		$sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
		 return $this->query($sql);
	}

}

 ?>