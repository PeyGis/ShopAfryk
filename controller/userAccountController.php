<?php 
require_once((dirname(__FILE__)).'/../model/userclass.php');
$operation_status = '';
$login_status = '';

//login validation
if(isset($_POST["login_user"])){
    $ok = false;
        //validate user email
    if (isset($_POST['email']) && !empty($_POST["email"])) {
        if(preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $_POST["email"])){
        $login_email = $_POST['email'];
        $ok = true; 
        } else{
        $ok = false;
        $GLOBALS['loginemailError'] = "invalid email";
        }   
    } else{ $ok=false;}  

    //validate user password
    if (isset($_POST['password']) && !empty($_POST["password"])) {
        if(preg_match("/^(?=.*\d)(?=.*[A-Za-z]).{6,16}$/", $_POST["password"])){
        $login_pswd = $_POST['password'];
        $ok = true; 
        } else{
        $ok = false;
        $GLOBALS['loginpswdError'] = "Weak password: must contain at least a letter, number and more than 6 characters";
        }   
    } else{ $ok=false;} 

    if($ok){
        loginUser($login_email, $login_pswd);
    }

}


//register validation
//if post request from register page
if(isset($_POST["register"])){
    $ok = false;
    //validate user name
    if (isset($_POST['user_name']) && !empty($_POST["user_name"])) {
        if(preg_match('/^[a-zA-Z0-9 _,-]+$/', $_POST["user_name"])){
        $user_name = $_POST['user_name'];
        $ok = true; 
        } else{
        $ok = false;
        $GLOBALS['nameError'] = "Inavlid Name";
        }   
    } else{ $ok=false;}  

    //validate user email
    if (isset($_POST['user_email']) && !empty($_POST["user_email"])) {
        if(preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $_POST["user_email"])){
        $user_email = $_POST['user_email'];
        $ok = true; 
        } else{
        $ok = false;
        $GLOBALS['emailError'] = "invalid email";
        }   
    } else{ $ok=false;}  

    //validate user password
    if (isset($_POST['user_password']) && !empty($_POST["user_password"])) {
        if(preg_match("/^(?=.*\d)(?=.*[A-Za-z]).{6,16}$/", $_POST["user_password"])){
        $user_pswd = $_POST['user_password'];
        $ok = true; 
        } else{
        $ok = false;
        $GLOBALS['pswdError'] = "Weak password: must contain at least a letter, number and more than 6 characters";
        }   
    } else{ $ok=false;} 

    //validate gender
    if (isset($_POST['gender']) && !empty($_POST["gender"])) {
        if($_POST['gender'] != "none"){
            $gender = $_POST['gender'];
            $ok = true;
        } else{
            $ok = false;
            $GLOBALS['genderError'] = "Please select gender";
        }
    }  else{ $ok=false;} 
 

    //validate user dob
    if (isset($_POST['dob']) && !empty($_POST["dob"])) {
        $dob = $_POST['dob'];
        $ok = true;  
    } else{ $ok=false;}     

//if validation is okay
    if($ok){
        $user_pswd = password_hash($user_pswd, PASSWORD_DEFAULT);
        registerUser($user_name, $user_email, $user_pswd, $gender, $dob);
    } else{
        $operation_status = 3;
    }

}

function registerUser($name, $email, $pass, $gender, $dob){
    global $operation_status;

    $user_obj = new UserAccount();
        $response = $user_obj->registerUser($name, $email, $pass, $gender, $dob);

    $operation_status = ($response == true) ? 1 : 2;

    }


function loginUser($email, $pswd){
    global $login_status;
 
    $user_obj = new UserAccount();
        $response = $user_obj->loginUser($email);
        if($response){
            $row = $user_obj->fetch();
            // verify password with the one saved in db
                if (password_verify($pswd, $row['password'])){
                    session_start();
                    $_SESSION["user_name"] = $row['full_name'];
                    $_SESSION["user_id"] = $row['user_id'];
                    $_SESSION["user_email"] = $row['email'];
                    $login_status = 1;
                } else{
                    $login_status = 2;
                }

        } else{
            $login_status = 3;
        }
}


/**
  *a function to display error or success message upon registration
  */
 function registrationstatus(){
    if (!empty($GLOBALS['operation_status']) && $GLOBALS['operation_status'] == 1) {
        echo "<center><h3 style='color:green'>Registration Successful </h3></center>";
        header("Refresh:1; URL=login.php");
    }
    else if (!empty($GLOBALS['operation_status']) && $GLOBALS['operation_status'] == 2) {
        echo "<center><h3 style='color:red'> Registration Unsuccessful </h3></center>"; 
    }
    else if (!empty($GLOBALS['operation_status']) && $GLOBALS['operation_status'] == 3) {
        echo "<center><h3 style='color:red'> Validation Unsuccessful. Kindly provide valid data </h3></center>" ;
    }
    else if (!empty($GLOBALS['operation_status']) && $GLOBALS['operation_status'] == 4) {
        echo "<center><h3 style='color:red'> Email already exists </h3></center>" ;
    }
 }

/**
  *a function to display error or success message upon registration
  */
 function loginstatus(){
    if (!empty($GLOBALS['login_status']) && $GLOBALS['login_status'] == 1) {
        echo "<center><h5 style='color:green'>Login Successful </h5></center>";
        header("Refresh:1; URL=../index.php");
    }
    else if (!empty($GLOBALS['login_status']) && $GLOBALS['login_status'] == 2) {
        echo "<center><h5 style='color:red'> Incorrect Password</h5></center>"; 
    }
    else if (!empty($GLOBALS['login_status']) && $GLOBALS['login_status'] == 3) {
        echo "<center><h5 style='color:red'> Email does not exist Kindly provide valid email </h5></center>" ;
    }
 }

 /**
  *a function to display error or success message upon registration
  */
 function loginstatusIndex(){
    if (!empty($GLOBALS['login_status']) && $GLOBALS['login_status'] == 1) {
        echo "<center><h5 style='color:green'>Login Successful </h5></center>";
        header("Refresh:1; URL=./index.php");
    }
    else if (!empty($GLOBALS['login_status']) && $GLOBALS['login_status'] == 2) {
        echo "<center><h5 style='color:red'> Incorrect Password</h5></center>"; 
    }
    else if (!empty($GLOBALS['login_status']) && $GLOBALS['login_status'] == 3) {
        echo "<center><h5 style='color:red'> Email does not exist Kindly provide valid email </h5></center>" ;
    }
 }
?>