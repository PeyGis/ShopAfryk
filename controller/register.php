<?php  
 //insert.php  
 $connect = mysqli_connect("localhost", "root", "", "shopafryk");  
 if(isset($_POST["name"]))  
 {  
      
      $name = mysqli_real_escape_string($connect, $_POST["name"]);
      $email= mysqli_real_escape_string($connect, $_POST["email"]); 
      $password= mysqli_real_escape_string($connect, $_POST["password"]);
      $password=md5($password);
      $dob= mysqli_real_escape_string($connect, $_POST["dob"]);
      $gender= mysqli_real_escape_string($connect, $_POST["gender"]); 
      //$role= mysqli_real_escape_string($connect, $_POST["role"]); 
      $sql = "INSERT INTO users(full_name,email,password,date_of_birth,gender) 
                     VALUES ('".$name."','".$email."', '".$password."', '".$dob."', '".$gender."')";  
      if(mysqli_query($connect, $sql))  
      {  
           echo "Message Saved";  
      }
 }  
 ?>  