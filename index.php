<?php
// Initialize the session
session_start();
require_once 'incl/connect.php';

// Check if the user is logged in, if not then redirect him to login page
/*if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Sneaker Stash Online Sneaker Store</title>
</head>
<body>
<script src="https://unpkg.com/vue"></script>
<div id="shoppingApp">
<!--Nav Bar --><!--#00bc22-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <a class="navbar-brand" href="index.php">
    <img src="images/logo.png" alt="sneaker stash logo" class="logo-nav">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Shopping Cart 
          <img src="images/cart.png" alt="shopping cart" id="shoppingCartMenu">
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="#" onclick="overlayon()" @click="duplicateObj(itemObj)">View</a>
          <a class="dropdown-item" href="#">
              <input type="hidden" name="cmd" value="_ext-enter">
              <form action="https://www.paypal.com/us/cgi-bin/webscr" method="post">
                <input type="hidden" name="cmd" value="_xclick">
                <input type="hidden" name="business" value="sneakerstash@shoestash.com">
                <input type="hidden" name="item_name" value="Sneakers from Sneaker Stash">
                <input type="hidden" name="currency_code" value="USD">
                <input type="hidden" name="amount" v-bind:value=ZARtoUSD>
                  <button type="submit" name="submit" alt="Make payments with PayPal -it's fast, free and secure!">Checkout</button>

              </form>
          </a>          
        </div>
        
        <span class="cartItems">{{"Item Count : " +totalItems}}</span>
        <span class="cartItems">{{"--- R"+totalPrice}}</span>
      </li>
    </ul>
  </div>
</nav>
     
      <!--<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Shopping Cart 
          <img src="images/cart.png" alt="shopping cart" id="shoppingCartMenu">
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="#" onclick="overlayon()" @click="duplicateObj(itemObj)">View</a>
          <a class="dropdown-item" href="#">
              <input type="hidden" name="cmd" value="_ext-enter">
              <form action="https://www.paypal.com/us/cgi-bin/webscr" method="post">
                <input type="hidden" name="cmd" value="_xclick">
                <input type="hidden" name="business" value="sneakerstash@shoestash.com">
                <input type="hidden" name="item_name" value="Sneakers from Sneaker Stash">
                <input type="hidden" name="currency_code" value="USD">
                <input type="hidden" name="amount" v-bind:value=ZARtoUSD>
                  <button type="submit" name="submit" alt="Make payments with PayPal -it's fast, free and secure!">Checkout</button>

              </form>
          </a>          
        </div>
        
        <span class="cartItems">{{"Item Count : " +totalItems}}</span>
        <span class="cartItems">{{"--- R"+totalPrice}}</span>
      </li>-->
  
  

    <main role="main" class="container">
        <div id="overlay">
              <div id="closeButton">
                <button onclick="overlayOff()" @click="resetChanges(quantities, itemsObj)">
                  <div id="orangeBox">
                    <span id="x">X</span>
                  </div>
                </button>
              </div>
              <!--cart tab with items-->
              <div id="editCart">
                <ul>
                  <li v-for="(item, key, index) in itemsObj" v-if="item.quantity > 0">
                    {{ key }} - <input type="number" v-model=item.quantity min="1" max="3">
                    <div id="deleteItemID">
                      <button name="deleteItem" @click="deleteItem()" v-bind:value= key>X</button>
                      <button name="apply" id= key @click="upDateEditCart(itemsObj)">&#10004;</button>
                    </div>
                  </li>
                </ul>
                <!--paypal -->
                <input type="hidden" name="cmd" value="_ext-enter">
                <form action="https://www.paypal.com/us/cgi-bin/webscr" method="post">
                  <input type="hidden" name="cmd" value="_xclick">
                  <input type="hidden" name="business" value="sneakerstash@shoestash.com">
                  <input type="hidden" name="item_name" value="Sneakers from Sneaker Stash">
                  <input type="hidden" name="currency_code" value="USD">
                  <input type="hidden" name="amount" v-bind:value=ZARtoUSD>
                  <input type="image" src="images/checkout.png" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
                  
                </form>
                <button onclick="overlayOff()" @click="continueShopping" >Continue Shopping</button>
              </div>            
        </div>
        <div class="text-center mt-5 pt-5">
            <h1>Welcome to Sneaker Stash Online Store</h1>
            <div class="page-header">            
              <h5>Please browse from our selection of footwear sneakers. </h5>
            </div>
        </div>

<!--slidshow-->
<div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/shoes/slidePic1.jpg" class="d-block w-50" alt="Jordan 13 Retro Grey Toe (2014)">
        <div class="carousel-caption d-none d-md-block">
          <h5 class="caption">Jordan 13 Retro Grey Toe (2014)</h5>
          <p>R 2,799</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/shoes/slidePic2.jpg" class="d-block w-50" alt="Nike Blazer Mid Off-White All Hallow's Eve 2018 Men">
        <div class="carousel-caption d-none d-md-block">
          <h5>Nike Blazer Mid Off-White All Hallow's Eve 2018 Men</h5>
          <p>R 11,999</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/shoes/slidePic3.jpg" class="d-block w-50" alt="Air Presto Off-White Black (2018) 2018 Men">
        <div class="carousel-caption d-none d-md-block">
          <h5>Air Presto Off-White Black (2018) 2018 Men</h5>
          <p>R 9,899</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>


      <?php
      $conn = db_connection();
     
      $sql = "SELECT * FROM onlineshop_products";
      $result = $conn->query($sql);
      if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            echo "\n\t\t\t<div class=\"products fadeIn\" id=\"". $row["product"] ."\">
                    <h3> " . $row["product"] . "</h3>" .
                    "<br><img src=\"" . $row["image"] . "\">" .
                    "<br><h5>" . $row["short_desc"] . "</h5>" . 
                    "\n\t\t\t\t<div class=\"purchase\">
                        <label for=\"" . $row["product"] . "quantity\">Quantity (Max 3):</label>
                        <input type=\"number\" id=\"" . $row["product"] . "quantity\" name=\"". $row["product"] ."quantity\" value=\"1\" min=\"1\" max=\"3\">
                        <button type=\"button\" name=\"addToCart\" @click=\"addToCart\" id=\"". $row["product"] ."\">Add to Cart</button>\n
                        <input hidden readonly value=\"" . $row["price"] . "\" id=\"". $row["product"] . "price" . "\">Price : R" . $row["price"] . "
                    </div><!--close purchase class-->\n" .
                "\t\t\t</div>";
            }
        }

      ?>

      
          </div>
          <br>
      </main>
  </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https:://unpkg.com/vue"></script>
    <script src="scripts/onlineStore.js"></script>
    <script src="scripts/vueScripts.js"></script>

      <!--republishing of cart-->
    <?php 
         if(isset($_SESSION["username"])){
                $loggedInUser = $_SESSION["username"];
                echo $loggedInUser;
                $cartArr = array();
                $sql = "SELECT item, quantity FROM onlineshop_cart WHERE user = '$loggedInUser'";
                $result = $conn->query($sql);
                if($result->num_rows > 0){    
                    while($row = $result->fetch_assoc()) {
                        array_push($cartArr,$row["item"],$row["quantity"]);
                    }
                }    
                var_dump($cartArr);
                //call to JS function with a Vue hook
                echo '<script> let paramArr = [];';
                //echo count($cartArr);
                for($x = 0; $x < count($cartArr); $x++){
                    echo 'paramArr.push("' . $cartArr[$x] . '");';
                }
                
                echo 'console.log(paramArr);
                cleanUpVue(paramArr);
                
                </script>';
            }else{
                echo "user not logged in";
            }
    ?>
</body>
</html>