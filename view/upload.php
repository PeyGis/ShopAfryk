﻿<!DOCTYPE html>
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
	<?php require_once('../controller/productcontroller.php'); ?>

<div id="header">
<div class="container">
<div id="welcomeLine" class="row">
	<div class="span6">Welcome!<strong> Admin</strong></div>
	<div class="span6">
	<div class="pull-right">
		<span class="btn btn-mini">$155.00</span>
		<a href="product_summary.php"><span class="">$</span></a>
		<a href="product_summary.php"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [ 3 ] Itemes in your cart </span> </a> 
	</div>
	</div>
</div>
<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="../index.php"><img src="../themes/images/logo.png" alt="Bootsshop"/></a>
		<form class="form-inline navbar-search" method="post" action="products.php" >
		<input id="srchFld" class="srchTxt" type="text" />
		  <select class="srchTxt">
			<option>All</option>
			<option>CLOTHES </option>
			<option>FOOD AND BEVERAGES </option>
			<option>HEALTH & BEAUTY </option>
			<option>SPORTS & LEISURE </option>
			<option>BOOKS & ENTERTAINMENTS </option>
		</select> 
		  <button type="submit" id="submitButton" class="btn btn-primary">Go</button>
    </form>
    <ul id="topMenu" class="nav pull-right">
	 <li class=""><a href="special_offer.php">Specials Offer</a></li>
	 <li class=""><a href="normal.php">Delivery</a></li>
	 <li class=""><a href="contact.php">Contact</a></li>
	 <li class="">
	 <a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Login</span></a>
	<div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3>Login Block</h3>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal loginFrm">
			  <div class="control-group">								
				<input type="text" id="inputEmail" placeholder="Email">
			  </div>
			  <div class="control-group">
				<input type="password" id="inputPassword" placeholder="Password">
			  </div>
			  <div class="control-group">
				<label class="checkbox">
				<input type="checkbox"> Remember me
				</label>
			  </div>
			</form>		
			<button type="submit" class="btn btn-success">Sign in</button>
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		  </div>
	</div>
	</li>
    </ul>
  </div>
</div>
</div>
</div>
<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
<?php 
include_once('../layout.php')
?>
<!-- Sidebar end=============================================== -->
	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="../index.php">Home</a> <span class="divider">/</span></li>
		<li class="active">Upload</li>
    </ul>
	<h3> Uplaod New Product</h3>	
	<div class="well">
			<?php uploadstatus(); ?>
		<form action="" method="POST" enctype="multipart/form-data" name="UploadForm" onsubmit="return validateUpload()">
								
            <!--########### title #################-->
			<fieldset>
				<div class="form-group">
				<label style="color: #009688">Product Title</label>
				<input placeholder="Product Title" class="form-control" name="prod_title" type="text" id="prod_title" required autofocus> 
				
				<!--javascript validation error message-->
				<span id="prod_title_err" style="color: red"></span>
				</div>
			</fieldset>

            <!--########### Category #################-->
			<fieldset>
				<div class="form-group">
				<label style="color: #009688">Category</label>
    			<select id="prod_category" name="prod_category" class="form-control" required>
					<option value="none">Select Category</option>
					<?php getAllCategories(); ?>
					</select> 

				<!--javascript validation error message-->
				<span id="prod_category_err" style="color: red"></span>
				</div>
			</fieldset>
			 <!--########### BRAND #################-->
			<fieldset>
				<div class="form-group">
				<label style="color: #009688">Brand</label>
    			<select id="prod_brand" name="prod_brand" class="form-control" required>
					<option value="none">Select Brand</option>
					<?php getAllBrands(); ?>
					</select> 

				<!--javascript validation error message-->
				<span id="prod_brand_err" style="color: red"></span>
				</div>
			</fieldset>

			<!--########### price #################-->
			<fieldset>
				<div class="form-group">
				<label style="color: #009688">Product Price</label>
				<input placeholder="Product Price" class="form-control" type="text" id="prod_price" name="prod_price" required > 
				
				<!--javascript validation error message-->
				<span id="prod_price_err" style="color: red"></span>
				</div>
			</fieldset>

			<!--########### description #################-->
			<fieldset>
				<div class="form-group">
				<label style="color: #009688">Product Description</label>
				<textarea placeholder="Product Description" class="form-control" id="prod_descr" name="prod_desc" required></textarea>
				
				<!--javascript validation error message-->
				<span id="prod_descr_err" style="color: red"></span>
				</div>
			</fieldset>

			<!--########### picture #################-->
			<fieldset>
				<div class="form-group">
				<label style="color: #009688">Product Picture</label>
				<input class="form-control" type="file" id="prod_pic" name="prod_img" accept="image/x-png,image/gif,image/jpeg" required> 
				
				<!--javascript validation error message-->
				<span id="prod_pic_err" style="color: red"></span>
				</div>
			</fieldset>

			<!--########### keyword #################-->
			<fieldset>
				<div class="form-group">
				<label style="color: #009688">Keyword</label>
				<input placeholder="Keyword" class="form-control" type="text" id="prod_keyword" name="prod_keyword" required > 
				
				<!--javascript validation error message-->
				<span id="prod_keyword_err" style="color: red"></span>
				</div>
			</fieldset>
			

			<button type="submit" name="upload_product" class="btn btn-info" style="margin-bottom: 10px">Upload</button>

								</form>
	
	
</div>

</div>
</div>
</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
	<div  id="footerSection">
	<div class="container">
		<div class="row">
			<div class="span3">
				<h5>ACCOUNT</h5>
				<a href="login.php">YOUR ACCOUNT</a>
				<a href="login.php">PERSONAL INFORMATION</a> 
				<a href="login.php">ADDRESSES</a> 
				<a href="login.php">DISCOUNT</a>  
				<a href="login.php">ORDER HISTORY</a>
			 </div>
			<div class="span3">
				<h5>INFORMATION</h5>
				<a href="contact.php">CONTACT</a>  
				<a href="register.php">REGISTRATION</a>  
				<a href="legal_notice.php">LEGAL NOTICE</a>  
				<a href="tac.php">TERMS AND CONDITIONS</a> 
				<a href="faq.php">FAQ</a>
			 </div>
			<div class="span3">
				<h5>OUR OFFERS</h5>
				<a href="#">NEW PRODUCTS</a> 
				<a href="#">TOP SELLERS</a>  
				<a href="special_offer.php">SPECIAL OFFERS</a>  
				<a href="#">MANUFACTURERS</a> 
				<a href="#">SUPPLIERS</a> 
			 </div>
			<div id="socialMedia" class="span3 pull-right">
				<h5>SOCIAL MEDIA </h5>
				<a href="#"><img width="60" height="60" src="../themes/images/facebook.png" title="facebook" alt="facebook"/></a>
				<a href="#"><img width="60" height="60" src="../themes/images/twitter.png" title="twitter" alt="twitter"/></a>
				<a href="#"><img width="60" height="60" src="../themes/images/youtube.png" title="youtube" alt="youtube"/></a>
			 </div> 
		 </div>
		<p class="pull-right">&copy; Bootshop</p>
	</div><!-- Container End -->
	</div>
<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="../themes/js/jquery.js" type="text/javascript"></script>
	<script src="../themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../themes/js/google-code-prettify/prettify.js"></script>
	<script type="text/javascript" src="../themes/js/validation.js"></script>
	
	<script src="../themes/js/bootshop.js"></script>
    <script src="../themes/js/jquery.lightbox-0.5.js"></script>
</body>
</html>