<?php
//Start your session.
session_start();
 
//A simple array that contains product IDs.
$cartArray = array();
$_SESSION['cart'] = $cartArray;
?>