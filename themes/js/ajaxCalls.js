function addItemToCart(prod_id, qty){
    var isOkay = true;
    var xhttp;
    if(qty != 1){
        qty = document.getElementById("qty").value; 
        if(qty.length == 0){
            isOkay = false;
         document.getElementById("cartResponse").innerHTML = "Please enter a quantity";
        }
    } 
    if(isOkay){
        if (window.XMLHttpRequest) {
        // code for modern browsers
        xhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
        xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);
            var jsonResponse = JSON.parse(this.responseText);
            if (jsonResponse[0].status == 'success'){
               document.getElementById("cartResponse").style.color = 'green';
               document.getElementById("cartResponse").innerHTML = " " + jsonResponse[0].message;
               window.setTimeout(function(){location.href="index.php"},2000);
            } else if (jsonResponse[0].status == 'failed'){
              document.getElementById("cartResponse").style.color = 'red';
              document.getElementById("cartResponse").innerHTML = " " + jsonResponse[0].message;
                window.setTimeout(function(){location.reload()},2000);
            } else{
                console.log(jsonResponse[0].message);
            }
        }
    };
    xhttp.open("GET", "./controller/shoppingCartController.php?prod_id="+prod_id+"&qty="+qty+"&type=add", true);
    xhttp.send();

    }
}

function removeCartItem(prod_id){
    var xhttp; 

    if(window.XMLHttpRequest) {
        // code for modern browsers
        xhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
        xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);
            var jsonResponse = JSON.parse(this.responseText);
            if (jsonResponse[0].status == 'success'){
                document.getElementById("cartResponse").style.color = 'green';
               document.getElementById("cartResponse").innerHTML = " " + jsonResponse[0].message;
               window.setTimeout(function(){location.href="shoppingCart.php"},2000);
            } else if (jsonResponse[0].status == 'failed'){
            document.getElementById("cartResponse").style.color = 'red';
              document.getElementById("cartResponse").innerHTML = " " + jsonResponse[0].message;
                window.setTimeout(function(){location.reload()},2000);
            } else{
                console.log(jsonResponse[0].message);
            }
        }
    };
    xhttp.open("GET", "./controller/shoppingCartController.php?prod_id="+prod_id+"&type=delete", true);
    xhttp.send();
}

function updateCartItemQty(prod_id){
    var qty = document.getElementById("quantity").value;
    if(qty < 1){
        document.getElementById("qty_span").innerHTML = 'quantity cannot be negative';
        window.setTimeout(function(){location.href="shoppingCart.php"},3000);
    }
    else{

    var xhttp; 

    if(window.XMLHttpRequest) {
        // code for modern browsers
        xhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
        xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);
            var jsonResponse = JSON.parse(this.responseText);
            if (jsonResponse[0].status == 'success'){
                document.getElementById("cartResponse").style.color = 'green';
               document.getElementById("cartResponse").innerHTML = " " + jsonResponse[0].message;
               window.setTimeout(function(){location.reload()},2000);
            } else if (jsonResponse[0].status == 'failed'){
            document.getElementById("cartResponse").style.color = 'red';
              document.getElementById("cartResponse").innerHTML = " " + jsonResponse[0].message;
                window.setTimeout(function(){location.reload()},2000);
            } else{
                console.log(jsonResponse[0].message);
            }
        }
    };
    xhttp.open("GET", "./controller/shoppingCartController.php?prod_id="+prod_id+"&qty="+qty+"&type=update", true);
    xhttp.send();
    }
}

function fillUpdateModal(prod_id){
  var prodInfo=prod_id.split("&");
  document.getElementById("updateCartsaveBtn").value=prodInfo[0];
  document.forms["prod_cart_form"]["quantity"].value=prodInfo[1];
  $("#updateCartmodal").modal("show");
}