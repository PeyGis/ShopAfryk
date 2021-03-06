
<div id="header">
<div class="container">
<div id="welcomeLine" class="row">
	<div class="span6">Welcome!</div>
	<div class="span6">
	<div class="pull-right">
		<span class="btn btn-mini">$ <?php echo getTotalItemAmountInCart(); ?></span>
		<a href="product_summary.php"><span class=""></span></a>
		<a href="product_summary.php"><span class="btn btn-mini btn-warning"><i class="icon-shopping-cart icon-white"></i> [ <?php echo getTotalItemsInCart(); ?> ] Items in your cart </span> </a> 
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
		<input id="srchFld" type="text"  name="searchKey" class="srchTxt" />
<!-- 		  <select class="srchTxt">
			<option value="none">All</option>
			<?php //getAllCategories(); ?>
			
		</select> --> 
		  <button type="submit" id="submitButton" name="search" class="btn btn-info">Go</button>
    </form>
    <ul id="topMenu" class="nav pull-right">
    <li class=""><a href="contact.php">Contact</a></li>
    <li class="">
	 <?php if(!isset($_SESSION["user_name"])){ 
				echo '<a href="./register.php">Sign Up</a>';} 
	 ?>	
	</li>
	 <li class="">
	 	<?php if(isset($_SESSION["user_name"])){ 
				echo '<a href="logout.php?page=2">Logout</a>';} 
				else { echo '<a href="#login" role="button" data-toggle="modal" style="padding-right:0">Login</a>';
				}
		?>			 	
	 </li>
	 	 <li class=""><a href="#"><?php echo getUserName(); ?></a></li>
	 <li class="">
	<div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3>Login User</h3>
		  </div>
		  <div class="modal-body">
			<div class="well">
		
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
		  </div>
	</div>
	</li>
    </ul>
  </div>
</div>
</div>
</div>
<!-- Header End====================================================================== -->