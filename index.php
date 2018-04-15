<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>ShopAfryk Online Shopping</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->	
	<link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css" id="enject"></style>
  </head>
<body>
	<?php require_once('./settings/security.php');
	require_once('./controller/productcontroller.php'); 
	require_once('./controller/userAccountController.php');  
		require_once('./controller/shoppingCartController.php');  ?>
<div id="header">
<div class="container">
<div id="welcomeLine" class="row">
	<div class="span6">Welcome!</div>
	<div class="span6">
	<div class="pull-right">
		<span class="btn btn-mini">$ <?php echo getTotalItemAmountInCart(); ?></span>
		<a href="view/product_summary.php"><span class="btn btn-mini btn-warning"><i class="icon-shopping-cart icon-white"></i> [<?php echo getTotalItemsInCart(); ?> ] Items in your cart </span> </a> 
	</div>
	</div>
	<?php loginstatusIndex() ?>
</div>
<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="index.php"><img src="themes/images/logo.png" alt="Bootsshop"/></a>
		<form class="form-inline navbar-search" method="post" action="view/products.php" >
		<input id="srchFld" class="srchTxt" type="text" name="searchKey" />
		   <!-- <select class="srchTxt">
			<option value="none">All</option>
			<?php //getAllCategories(); ?>
		</select>  -->
		  <button type="submit" id="submitButton" name="search" class="btn btn-info">Go</button>
    </form>
    <ul id="topMenu" class="nav pull-right">
	 <li class=""><a href="view/contact.php">Contact</a></li>
	 <li class="">
	 <?php if(!isset($_SESSION["user_name"])){ 
				echo '<a href="view/register.php">Sign Up</a>';} 
	 ?>	
	</li>
	 <li class="">
	 	<?php if(isset($_SESSION["user_name"])){ 
				echo '<a href="view/logout.php?page=1">Logout</a>';} 
				else { echo '<a href="#loginModal" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-md btn-info">Login</span></a>';
				}
		?>			 	
	 </li>
	 	 <li class=""><a href="#"><?php echo getUserName(); ?></a></li>
	
	<div id="loginModal" class="modal fade" role="dialog">  
      <div class="modal-dialog">  
   <!-- Modal content-->  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Login </h4>  
                </div>  
                <div class="modal-body">  
               <form method="POST" action="">
			  <div class="control-group">
				<label class="control-label" for="inputEmail1">Email</label>
				<div class="controls">
				  <input class="span3"  type="text" id="inputEmail1" placeholder="Email" name="email">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="inputPassword1">Password</label>
				<div class="controls">
				  <input type="password" class="span3"  id="inputPassword1" placeholder="Password" name="password">
				</div>
			  </div>
			  <div class="control-group">
				<div class="controls">
				  <button type="submit" class="btn btn-info" name="login_user">Sign in</button> <a href="./view/forgetpass.php">Forget password?</a>
				   <a href="./view/register.php">Or Create New Account</a>
				</div>
			  </div>
			</form> 
                </div>
                <div class="modal-footer">
       
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
           </div>  
      </div>  
 </div> 
	</li>
    </ul>
  </div>
</div>
</div>
</div>
<!-- Header End====================================================================== -->
<div id="carouselBlk" style="width:100%; height=10%">
	<div id="myCarousel" class="carousel slide">
		<div class="carousel-inner" >
		  <div class="item active">
		  <div class="container" style="width:100%;height=10%" >
			<a href="view/register.php"><img src="themes/images/carousel/img81.png" alt="special offers"/></a>
			<div class="carousel-caption">
				  <h4>Second Thumbnail label</h4>
				  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				</div>
		  </div>
		  </div>
		  <div class="item">
		  <div class="container" >
			<a href="view/register.php"><img  src="themes/images/carousel/img1.png" alt=""/></a>
				<div class="carousel-caption">
				  <h4>Second Thumbnail label</h4>
				  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				</div>
		  </div>
		  </div>
		  <div class="item">
		  <div class="container" style="width:100%; height=10%">
			<a href="view/register.php"><img  src="themes/images/carousel/img5.jpg" alt=""/></a>
			<div class="carousel-caption">
				  <h4>Second Thumbnail label</h4>
				  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				</div>
			
		  </div>
		  </div>
		   <div class="item">
		   <div class="container" style="width:100%; height=10%">
			<a href="view/register.php"><img src="themes/images/carousel/img11.png" alt=""/></a>
			<div class="carousel-caption">
				  <h4>Second Thumbnail label</h4>
				  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				</div>
		   
		  </div>
		  </div>
		   <!-- <div class="item">
		   <div class="container">
			<a href="view/register.php"><img src="themes/images/carousel/5.png" alt=""/></a>
			<div class="carousel-caption">
				  <h4>Second Thumbnail label</h4>
				  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
			</div>
		  </div>
		  </div> -->
		   <!-- <div class="item">
		   <div class="container">
			<a href="view/register.php"><img src="themes/images/carousel/6.png" alt=""/></a>
			<div class="carousel-caption">
				  <h4>Second Thumbnail label</h4>
				  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				</div>
		  </div>
		  </div> -->
		</div>
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
	  </div> 
</div>
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
<!-- Sidebar ================================================== -->
	<div id="sidebar" class="span3">
		<div class="well well-small"><a id="myCart" href="view/product_summary.php"><img src="themes/images/ico-cart.png" alt="cart"><?php echo getTotalItemsInCart(); ?> Items in your cart  <span class="badge badge-warning pull-right">$<?php echo getTotalItemAmountInCart(); ?></span></a></div>
		<ul id="sideManu" class="nav nav-tabs nav-stacked">
			<li class="subMenu open"><a> JEWELLERY</a>
				<ul>
				<li><a class="active" href="view/products.php"><i class="icon-chevron-right"></i>Women's Jewellery </a></li>
				<li><a href="view/products.php"><i class="icon-chevron-right"></i>Men's Jewellery </a></li>
				<li><a href="view/products.php"><i class="icon-chevron-right"></i>Kids Jewellery</a></li>
				<!-- <li><a href="view/products.php"><i class="icon-chevron-right"></i>Sound & Vision (15)</a></li> -->
				</ul>
			</li>
			<li class="subMenu"><a> CLOTHES  </a>
			<ul style="display:none">
				<li><a href="view/products.php"><i class="icon-chevron-right"></i>Women's Clothing </a></li>
				<li><a href="view/products.php"><i class="icon-chevron-right"></i>Men's Clothing </a></li>												
				<li><a href="view/products.php"><i class="icon-chevron-right"></i>Women's Hand Bags </a></li>	
				<li><a href="view/products.php"><i class="icon-chevron-right"></i>Kid's Clothings  </a></li>											
			</ul>
			</li>
			<li class="subMenu"><a>FOOT WEAR </a>
				<ul style="display:none">
				<li><a href="view/products.php"><i class="icon-chevron-right"></i>Women's Shoes </a></li>
				<li><a href="view/products.php"><i class="icon-chevron-right"></i>Men's Shoes </a></li>												
				<li><a href="view/products.php"><i class="icon-chevron-right"></i>Kid's Shoes</a></li>	
				<li><a href="view/products.php"><i class="icon-chevron-right"></i>Sporty wear </a></li>																							
			</ul>
			</li>
			<li class="subMenu"><a> TOILETRY </a>
			<ul style="display:none">
				<li><a href="view/products.php"><i class="icon-chevron-right"></i>Women's Soaps </a></li>
				<li><a href="view/products.php"><i class="icon-chevron-right"></i>Men's Soaps </a></li>												
				<li><a href="view/products.php"><i class="icon-chevron-right"></i>Women's Creams </a></li>	
				<li><a href="view/products.php"><i class="icon-chevron-right"></i>Kid's Soaps  </a></li>
				<li><a href="view/products.php"><i class="icon-chevron-right"></i>Men's Creams </a></li>												
			</ul>
			</li>
		</ul>
		<br/>
			
			<div class="thumbnail">
				<img src="themes/images/payment_methods.png" title="Bootshop Payment Methods" alt="Payments Methods">
				<div class="caption">
				  <h5>Payment Methods</h5>
				</div>
			  </div>
	</div>
<!-- Sidebar end=============================================== -->
<!-- Sidebar end=============================================== -->
		<div class="span9">		
			<div class="well well-small">
			<h4>Featured Products <small class="pull-right">200+ featured products</small></h4>
			<div class="row-fluid">
			<div id="featured" class="carousel slide">
			<div class="carousel-inner">


			  <div class="item active">
			  <ul class="thumbnails">
			  	<?php displayFeaturedProducts(); ?>
			  </ul>
			  </div>


			   <div class="item">
			  <ul class="thumbnails">
				<?php displayFeaturedProducts() ?>
			  </ul>
			  </div>

			  </div>
			  <a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
			  <a class="right carousel-control" href="#featured" data-slide="next">›</a>
			  </div>
			  </div>	  
			</div>

		<h4>Latest Products </h4>
		<p style="font-size: 18px" id="cartResponse"></p>
			  <ul class="thumbnails">
			  	<?php displayProductsGridView(1); ?>
			  </ul>	

		</div>
		</div>
	</div>
</div>
<!-- Footer ================================================================== -->
	<div  id="footerSection">
	<div class="container">
		<div class="row">
			<div class="span3">
				<h5>ACCOUNT</h5>
				<a href="view/login.php">YOUR ACCOUNT</a>
				<a href="view/login.php">PERSONAL INFORMATION</a> 
				<a href="view/login.php">ADDRESSES</a> 
				<a href="view/login.php">DISCOUNT</a>  
				<a href="view/login.php">ORDER HISTORY</a>
			 </div>
			<div class="span3">
				<h5>INFORMATION</h5>
				<a href="view/contact.php">view/contact</a>  
				<a href="view/register.php">REGISTRATION</a>  
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
				<a href="#"><img width="60" height="60" src="themes/images/facebook.png" title="facebook" alt="facebook"/></a>
				<a href="#"><img width="60" height="60" src="themes/images/twitter.png" title="twitter" alt="twitter"/></a>
				<a href="#"><img width="60" height="60" src="themes/images/youtube.png" title="youtube" alt="youtube"/></a>
			 </div> 
		 </div>
		<p class="pull-right">&copy; ShopAfryk</p>
	</div><!-- Container End -->
	</div>
<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/ajaxCalls.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	 <script src="bootstrap/js/login.js"></script> 
	<script src="js/google-code-prettify/prettify.js"></script>
	
	<script src="js/bootshop.js"></script>
    <script src="js/jquery.lightbox-0.5.js"></script>
</body>
</html>