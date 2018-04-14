<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>ShopAfryk Online Shopping</title>
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
	<?php require_once('../settings/security.php');
	require_once('../controller/productcontroller.php');
	require_once('../controller/shoppingCartController.php'); 
	require_once('../controller/userAccountController.php'); 
	include_once('../layout/header.php'); ?>
<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
<?php 
include_once('../layout/sidebar.php');
?>
<!-- Sidebar end=============================================== -->
	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="../index.php">Home</a> <span class="divider">/</span></li>
		<li class="active"> Shopping Cart</li>
    </ul>
    <?php loginstatus() ?>
	<h3>  MY SHOPPING CART [ <small><?php echo getTotalItemsInCart(); ?> Item(s) </small>]<a href="products.php" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></h3>	
	<hr class="soft"/>
	<p id="cartResponse" style="color: red; font-size: 18px"></p>		
		<?php
		if(isset($_POST["search"])){
			$keyword = strip_tags($_POST["searchTxt"]);
			//displaySearchProducts($keyword, 2);
		}  else{
			displayCartProducts(); 
		}

		?>
	
</div>
</div></div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
<?php include_once('../layout/footer.php'); ?>
<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="../js/jquery.js" type="text/javascript"></script>
	<script src="../js/ajaxCalls.js" type="text/javascript"></script>
	<script src="../js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../js/google-code-prettify/prettify.js"></script>
	<script src="../js/bootshop.js"></script>
    <script src="../js/jquery.lightbox-0.5.js"></script>
</body>
</html>