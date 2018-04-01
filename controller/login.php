 <?php  
 session_start();  
 $connect = mysqli_connect("localhost", "root", "", "shopafryk");  
 if(isset($_POST["username"]))  
 {  
      $query = "  
      SELECT * FROM user  
      WHERE full_name = '".$_POST["username"]."'  
      AND password = '".md5($_POST["password"])."'  
      ";  
      $result = mysqli_query($connect, $query);  
      if(mysqli_num_rows($result) > 0)  
      {  
           $_SESSION['username'] = $_POST['username'];  
           echo 'Yes';  
      }  
      else  
      {  
           echo 'No';  
      }  
 }  
 if(isset($_POST["action"]))  
 {  
      unset($_SESSION["username"]);  
 }  
 ?>  