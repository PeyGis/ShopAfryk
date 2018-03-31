<?php  
 //insert.php  
 $connect = mysqli_connect("localhost", "root", "", "testing");  
 if(isset($_POST["name"]))  
 {  
      // if(empty($_POST["name"])||empty($_POST["email"])||empty($_POST["password"])){
      //       echo'<script>alert("Both Fields are required")<script>';
      // }
      // else
      // {
      $name = mysqli_real_escape_string($connect, $_POST["name"]);  
      $email= mysqli_real_escape_string($connect, $_POST["email"]); 
      $password= mysqli_real_escape_string($connect, $_POST["password"]);
      $password=md5($password);
      $dob= mysqli_real_escape_string($connect, $_POST["dob"]);
      $gender= mysqli_real_escape_string($connect, $_POST["gender"]); 
      $sql = "INSERT INTO user(name, email,password,dob,gender) VALUES ('".$name."', '".$email."', '".$password."', '".$dob."', '".$gender."')";  
      if(mysqli_query($connect, $sql))  
      {  
           echo "Message Saved";  
      }
      // } 
 }  
 ?>  