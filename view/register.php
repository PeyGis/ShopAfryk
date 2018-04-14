<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>ShopAfryk online Shopping cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
  
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="../themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="../themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive --> 
  <link href="../themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
  <link href="../themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify --> 
  <link href="../themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="../themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../themes/images/ico/apple-touch-icon-57-precomposed.png">
  <style type="text/css" id="enject"></style>
  </head>

<body>
<?php require_once('../controller/shoppingCartController.php'); 
require_once('../controller/userAccountController.php'); 
include_once('../layout/header.php') ?>
<!-- Header End====================================================================== -->
<div id="mainBody">
  <div class="container">
  <div class="row">
<?php 
include_once('../layout/sidebar.php');
?>
<!-- Sidebar end=============================================== -->
  <div class="span9">
    <ul class="breadcrumb">
    <li><a href="../index.php">Home</a> <span class="divider">/</span></li>
    <li class="active">Registration</li>
    </ul>
  <h3> Registration</h3>  
  <div class="well">
   <?php registrationstatus(); ?>
  <form action="" method="post" name="myForm" onsubmit="return validate();" > 
                  <br />
                  <label>Your Name</label>  
                  <input type="text" name="user_name" id="name" placeholder="Full name" class="form-control" />  
                  <br/>
                  <span id="name_error" class="text-warning"></span>  
                  <br />   
                  <label>Email address</label>
                  <input type="email" class="form-control" id="email"  name="user_email" aria-describedby="emailHelp" placeholder="Enter email">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  <br/>
                  <span id="email_error" class="text-warning"></span>
                  <br/>  
                  <label>Password</label>
                  <input type="password" name="user_password" class="form-control" id="password" placeholder="Password">
                  <br/>
                  <label>Confirm Password</label>
                  <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Password">
                  <br/>
                  <span id="password_error" class="text-warning"></span>  
                  <br/>
                  <label>Select Gender</label>
                  <select name="gender" id="gender" class="form-control">
                  <option value="Male">Male</option>  
                  <option value="Female">Female</option>
                  </select>
                  <br />  
                  <label>Date of Birth</label>
                  <input type="date" name="dob" id="dob" class="form-control" />
                  <br/>
                  <span id="dob_error" class="text-warning"></span>  
                  <br />
                  <input type="submit" name="register" value="Register" class="btn btn-success"/> 
                  <br/>
                  <span id="success_message" class="text-success"></span>  
                  <br/>
                </form>  
           </div>  
        
</div>

</div>
</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
<?php 
include_once('../layout/footer.php');
?>
<!-- Placed at the end of the document so the pages load faster ============================================= -->
  <script src="../bootstrap/js/script.js"></script>
  <script src="../themes/js/jquery.js" type="text/javascript"></script>
  <script src="../themes/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="../themes/js/google-code-prettify/prettify.js"></script>
  
  <script src="../themes/js/bootshop.js"></script>
  <script src="../themes/js/jquery.lightbox-0.5.js"></script>
  
</body>
</html>