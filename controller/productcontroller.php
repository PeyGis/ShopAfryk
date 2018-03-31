 <?php 
session_start();
require_once((dirname(__FILE__)).'/../model/productclass.php');
$operation_status = '';

//if post request from upload page
if(isset($_POST["upload_product"])){
	$ok = false;
    //validate title
    if (isset($_POST['prod_title']) && !empty($_POST["prod_title"])) {
    	if(preg_match('/^[a-zA-Z0-9 _,-]+$/', $_POST["prod_title"])){
    	$prod_title = $_POST['prod_title'];
        $ok = true;	
    	} else{
    	$ok = false;
    	}   
    } else{ $ok=false;}  

    //validate category
    if (isset($_POST['prod_category']) && !empty($_POST["prod_category"])) {
    	if($_POST['prod_category'] != "none"){
    		$prod_category = $_POST['prod_category'];
    		$ok = true;
    	} else{
    		$ok = false;
    	}
    }  else{ $ok=false;} 

    //validate brand
    if (isset($_POST['prod_brand']) && !empty($_POST["prod_brand"])) {
    	if($_POST['prod_brand'] != "none"){
    		$prod_brand = $_POST['prod_brand'];
    		$ok = true;
    	} else{
    		$ok = false;
    	}
    } else{ $ok=false;} 

   //validate price
    if (isset($_POST['prod_price']) && !empty($_POST["prod_price"])) {
    	if(preg_match('/^[0-9.]+$/', $_POST["prod_price"])){
    	$prod_price = $_POST['prod_price'];
        $ok = true;	
    	} else{
    	$ok = false;
    	}   
    } else{ $ok=false;}   
    
    //validate description
    if (isset($_POST['prod_desc']) && !empty($_POST["prod_desc"])) {
    	$prod_desc = strip_tags($_POST['prod_desc']);
        $ok = true;	
    } else{ $ok=false;}  

    //validate image
    if (isset($_FILES['prod_img']) && !empty($_FILES["prod_img"]['tmp_name'])) {

    	$prod_image = saveToSever("prod_img");
    	if($prod_image != false){
    		$prod_img = $prod_image;
    		  $ok = true;	
    	} else{
    		echo "couldnt upload to server";
    	}
    	//$prod_img = $_POST['prod_img'];
      
    } else{ $ok=false;}   

        //validate keywords
    if (isset($_POST['prod_keyword']) && !empty($_POST["prod_keyword"])) {
    	$prod_keyword = strip_tags($_POST['prod_keyword']);
        $ok = true;	
    } else{ $ok=false;}
    

//if validation is okay
    if($ok){
    	uploadProduct($prod_category, $prod_brand, $prod_title, $prod_price, $prod_desc, $prod_img, $prod_keyword);
    } else{
    	$operation_status = 3;
    }

}


//################    SEARCH FUNCTIONALITY  #########################

function displaySearchProducts($keyword){
    $prod_obj = new ProductClass();
    $products = $prod_obj->searchProduct($keyword);
    if($products){
        while ($product = $prod_obj->fetch()) {
            $prod_id = $product["product_id"];
            $prod_image = $product["product_image"];
            $prod_title = $product["product_title"];
            $prod_price = $product["product_price"];
            $old_price = $prod_price + (0.2 * $prod_price);

            echo '<div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="'.$prod_image.'" alt="'.$prod_title.'" class="img-responsive" style="height: 200px">
                        <div class="caption">
                            <h3>'.$prod_title.'</h3>
                            <p>GH¢ '.$prod_price.'  &nbsp&nbsp <del id="error">GH¢ '.$old_price.'</del></p> 
                            <p> 
                            <form action =single-product.php method = post style ="background: none"> 
                            <button type="submit" name="view_product" value = "'.$prod_id.'" class="btn btn-warning">View Details</button> 
                            <button type= "button" value = "'.$prod_id.'" class="btn btn-info" onclick="addItemToCart(this.value, 1)">Add to Cart</button>
                            </form>
                            </p>
                        </div>
                    </div>
                </div>';
        }
    } else{
        echo '<div class="thumbnail">
               <h3 style="text-align:center; margin:10px">Oops! your search did not match any product</h3>
                <p style="text-align:center; margin:10px">Try again...</p>
                <img src="image/sorry.jpg" alt="No Prouct Available At This Time" class="img-responsive">
                    <p style="text-align:center; margin:10px"> 
                    <a href="index.php" class="btn btn-warning">Back to Home</a>
                    </p>
            </div>' ;
    }

}


function getAllBrands(){
	$obj = new ProductClass();
	$result = $obj->getBrands();
	while ($row = $obj->fetch()) {
		echo '<option value="'.$row['brand_id'].'">'.$row['brand_name'].'</option>';
	}
}

function saveToSever($tag_name){
	    $image = addslashes($_FILES[$tag_name]['tmp_name']);
        $name  = addslashes($_FILES[$tag_name]['name']);
        $image = file_get_contents($image);
        $uploaddir = '../themes/images/products/';
        $uploadfile = $uploaddir . basename($_FILES[$tag_name]['name']);

        if (move_uploaded_file($_FILES[$tag_name]['tmp_name'], $uploadfile)) {
            	return $uploadfile;
            }
            else { return false;}
} 

function getAllCategories(){
	$obj = new ProductClass();
	$result = $obj->getCategories();
	while ($row = $obj->fetch()) {
		echo '<option value="'.$row['cat_id'].'">'.$row['cat_name'].'</option>';
	}
}

function uploadProduct($product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_image, $product_keywords){
	global $operation_status;

	$prod_obj = new ProductClass();
	$response = $prod_obj->addProduct($product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_image, $product_keywords);

	$operation_status = ($response == true) ? 1 : 2;
}


function displayProductsListView(){
    $prod_obj = new ProductClass();
    $products = $prod_obj->getProducts();
    if($products){
        while ($product = $prod_obj->fetch()) {
            $prod_id = $product["product_id"];
            $prod_image = $product["product_image"];
            $prod_title = $product["product_title"];
            $prod_price = $product["product_price"];
            $prod_desc = $product["product_desc"];
            $old_price = $prod_price + (0.2 * $prod_price);

            echo '
            <div class="row">     
            <div class="span2">
                <img src="'.$prod_image.'" alt="'.$prod_title.'" class="img-responsive"/>
            </div>
            <div class="span4">
                <h3 style="color: red">New | Available</h3>                
                <hr class="soft"/>
                <h4>'.$prod_title.'</h4>
                <p>'.$prod_desc.'</p>
                <a class="btn btn-small pull-right" href="product_details.php">View Details</a>
                <br class="clr"/>
            </div>
            <div class="span3 alignR">
            <form class="form-horizontal qtyFrm">
            <h3>$'.$prod_price.'</h3>
            <label class="checkbox">
                <input type="checkbox">  Adds product to compair
            </label><br/>
            
              <a href="product_details.php" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
              <a href="product_details.php" class="btn btn-large"><i class="icon-zoom-in"></i></a>
            
                </form>
            </div>
        </div>
        <hr class="soft"/>

            ';
        }
    }
}

function displayProductsGridView($which_ui){
    $prod_obj = new ProductClass();
    $products = $prod_obj->getProducts();
    if($products){
        while ($product = $prod_obj->fetch()) {
            if($which_ui == 1){
                $prod_image = substr($product["product_image"], 1);
                $viewPage = './view/product_details';

            } else{
                $prod_image = $product["product_image"];
                $viewPage = "product_details";
            }
            $prod_id = $product["product_id"];
            $prod_title = $product["product_title"];
            $prod_price = $product["product_price"];
            $prod_desc = $product["product_desc"];
            $old_price = $prod_price + (0.2 * $prod_price);

            echo '
            <li class="span3">
              <div class="thumbnail">
                <a href="product_details.php">
                <img src="'.$prod_image.'" alt="'.$prod_title.'" class="img-responsive" style="height: 160px"/>
                </a>
                <div class="caption">
                  <h5>'.$prod_title.'</h5>
                  <p style="color:red"> 
                    '.substr($prod_desc, 0, 70).'
                  </p>
                   <h4 style="text-align:center">
                   <a class="btn" href="'.$viewPage.'.php"> 
                   <i class="icon-zoom-in"></i>
                   </a> 
                   <a class="btn" href="#">Add to 
                   <i class="icon-shopping-cart"></i>
                   </a> 
                   <a class="btn btn-primary" href="#">$'.$prod_price.'</a>
                   </h4>
                </div>
              </div>
            </li>

            ';
        }
    }
}

function displaySingleProduct($prod_id){
     $prod_obj = new ProductClass();
    $products = $prod_obj->getProductById($prod_id);
    if($products){
        $product = $prod_obj->fetch();
            $prod_id = $product["product_id"];
            $prod_image = $product["product_image"];
            $prod_title = $product["product_title"];
            $prod_price = $product["product_price"];
            $prod_cat_id = $product["product_cat"];
            $prod_desc = $product["product_desc"];
            $prod_keyword = $product["product_keywords"];
            $old_price = $prod_price + (0.2 * $prod_price);

            $resp = $prod_obj->getCategoryName($prod_cat_id);
            $prod_category = ($resp == true) ? $prod_obj->fetch() : "None";

            echo '<div class="col-sm-6 col-md-6">
                  <img src="'.$prod_image.'" alt="'.$prod_title.'" class="img-responsive" style="max-height: 50vh">
                </div>

                <div class="col-sm-6 col-md-6">
                <div class="panel panel-success" style="margin-top: 10px">
                <div class="panel-heading">
                <h3 class="panel-title">Title: '.$prod_title.'</h3>
                </div>
               <div class="panel-body">
               <p> <span style="color: orange">Price:</span>  GH¢ '.$prod_price.'  &nbsp&nbsp <del id="error">GH¢ '.$old_price.'</del></p> 
                <input type="number" id="qty" value="" placeholder="Enter Quantity">
                <button type= "button" class="btn btn-info" value = "'.$prod_id.'" onclick="addItemToCart(this.value, 2)">Add to Cart</button> 
                <h5><span style="color: orange">Category: </span>'.$prod_category["cat_name"].'</h5>

                
                <h3 style="color: orange">Product Description</h3>
                <p></p>
                <p>'.$prod_desc.'</p>

            <h5> <span style="color: orange">Keyword: </span>'.$prod_keyword.'</h5>

            <a href="index.php" class="btn btn-info">Back to Home</a>
            </div>
            </div>
        </div>
                ';
    }
}   
 /**
  *a function to display error or success message upon upload
  */
 function uploadstatus(){
    if (!empty($GLOBALS['operation_status']) && $GLOBALS['operation_status'] == 1) {
    	echo "<center><h2 style='color:green'>Upload Successful </h2></center>";
    }
    else if (!empty($GLOBALS['operation_status']) && $GLOBALS['operation_status'] == 2) {
        echo "<center><h2 style='color:red'> Upload Unsuccessful </h2></center>" ;
    }
    else if (!empty($GLOBALS['operation_status']) && $GLOBALS['operation_status'] == 3) {
        echo "<center><h2 style='color:red'> Validation Unsuccessful. Kindly provide valid data </h3></center>" ;
    }
 }

 ?>
