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
	<?php
	require_once('../settings/security.php');
	require_once('../controller/shoppingCartController.php'); 
	require_once('../controller/productcontroller.php'); 
	require_once('../controller/userAccountController.php'); 
	include_once('../layout/header.php'); 
	?>
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
<?php 
include_once('../layout/sidebar.php');
?>
	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="../index.php">Home</a> <span class="divider">/</span></li>
		<li class="active">Products</li>
    </ul>
	<h3> Products Available <small class="pull-right"> <?php echo getProductsCount(); ?> products are available </small></h3>
		<p style="font-size: 18px" id="cartResponse"></p>	
				<?php loginstatus() ?>
	  
<div id="myTab" class="pull-right">
 <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
 <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
</div>
<br class="clr"/>
<div class="tab-content">
	<div class="tab-pane" id="listView">
		<?php
			if(isset($_POST["search"])){
				$keyword = strip_tags($_POST["searchKey"]);
					displaySearchProductsList($keyword);
			}  else{
					displayProductsListView(); 
				}

		?>
	</div>

	<div class="tab-pane  active" id="blockView">
		<ul class="thumbnails">
			<?php
			if(isset($_POST["search"])){
				$keyword = strip_tags($_POST["searchKey"]);
					displaySearchProductsGrid($keyword);
			}  else{
					displayProductsGridView(2); 
				}
		?>
		  </ul>
	<hr class="soft"/>
	</div>
</div>
	<div class="pagination">
			<ul>
			<li><a href="#">&lsaquo;</a></li>
			<li><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">...</a></li>
			<li><a href="#">&rsaquo;</a></li>
			</ul>
			</div>
			<br class="clr"/>
</div>
</div>
</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ============================================================== -->
<?php require_once('../layout/footer.php');  ?>
	<script src="../js/jquery.js" type="text/javascript"></script>
	<script src="../js/ajaxCalls.js" type="text/javascript"></script>
	<script src="../js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../js/google-code-prettify/prettify.js"></script>
	
	<script src="../js/bootshop.js"></script>
    <script src="../js/jquery.lightbox-0.5.js"></script>
	
</body>
</html>