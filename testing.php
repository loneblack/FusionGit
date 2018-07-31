<?php
session_start();
require_once("initArray.php");

array_push($_SESSION['cart'], 1
 
//Make sure that the session variable actually exists!
if(isset($_SESSION['cart'])){
    //Loop through it like any other array.
    foreach($_SESSION['cart'] as $productId){
        //Print out the product ID.
        echo $productId, '<br>';
    }
}

?>