<?php 
include "connect.php";
$cartData = explode(",", $_GET['q']);

    $sql = "INSERT INTO onlineshop_cart (item) VALUES (?)";

        if($stmt =$conn->preprare($sql)){
            $smt->bind_param("s", $param_quantity);
            $param_quantity = $cartData[0];

            if($stmt->execute()){
                echo "all good";
            }
        }
?>