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
checkLoginStatus();
?>
<!-- Sidebar end=============================================== -->
	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li class="active">Payment</li>
    </ul>
	<?php loginstatus();?>

	<div class="row">
		<div class="span2"></div>
		<div class="span8">
		<?php 
		if(isset($_GET['tx'])){
		    $tx=$_GET['tx'];
		    $cc=$_GET['cc'];
		    $amount=$_GET['amt'];
		    $st=$_GET['st'];
		    	
		    if($st=='Completed'){
		    	echo '<div class="jumbotron">
				  <h3 style="color:green">Your transaction is been processed</h3>
				  <p>You will be emailed at '.$_SESSION['user_email'].' with details of the transaction</p>
				</div>'	;
				 $invoice=mt_rand();
		    	$response = insertOrder($st, $invoice);
		    	if($response){
		    	$payRes = insertPayment($amount, $cc);
		    	if($payRes){
		    		sendEmail($_SESSION['user_email'], $invoice, $amount);
		    		deleteCart();
		    	} 
		    	} 
		    	
		    } else{
		    	echo '<div class="jumbotron">
				  <h3 style="color:red">Sorry your transaction wasnt successful</h3>
				  <p>please ensure you have sufficient balance in your PayPal account or have entered the correct login details</p>
				</div>'	;
		    }
		    
		}
		
		?>
			
		</div>
		<div class="span2"></div>
		
	</div>
	<div class="row">
		
		<div class="span1"> &nbsp;</div>
		<div class="span4">
			<div class="well">
			<h5 style="text-align: center;">Pay Now</h5>
			<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" name="paypal">

			  <!-- Identify your business so that you can collect the payments. -->
			  <input type="hidden" name="business" value="shopafryk2018@gmail.com">

			  <!-- Specify a Buy Now button. -->
			  <input type="hidden" name="cmd" value="_xclick">

			  <!-- Specify details about the item that buyers will purchase. -->
			  
			  <input type="hidden" name="amount" value="<?php echo getTotalItemAmountInCart() ?>">
			  <input type="hidden" name="currency_code" value="USD">
			   
			  <center>
			  <!-- Display the payment button. -->
			  <input type="image" name="submit" border="0"
			  src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
			  alt="Buy Now" name="payb">
			  <img alt="" border="0" width="1" height="1"
			  src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
			 </center>
			</form>

		</div>
		</div>
	</div>	
	
</div>
</div></div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
<?php 
include_once('../layout/footer.php')
?>
<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="../themes/js/jquery.js" type="text/javascript"></script>
	<script src="../themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="../themes/js/bootshop.js"></script>
    <script src="../themes/js/jquery.lightbox-0.5.js"></script>
	
	<!-- Themes switcher section ============================================================================================= -->

</body>
</html>