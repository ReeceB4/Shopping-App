<?php 
session_start();

include "connect.php";
$cartData = explode(",", $_GET['q']);
//foreach($cartData as $x){
   $sql = "INSERT INTO onlineshop_cart (user, item, quantity) VALUES (?,?,?)";
         
        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssi", $param_user, $param_item, $param_quantity);
            
            for($x=0; $x < count($cartData); $x+=2){
            // Set parameters
            $param_user = $_SESSION["username"];
            $param_item = $cartData[$x];
            $param_quantity = $cartData[$x+1];
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                echo "all good";
            }
        }        
            
    }
        //array_shift($cartData);
        //array_shift($cartData);

//}
?>