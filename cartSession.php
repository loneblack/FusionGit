<?php
session_start();

$assets = array();
$assets[0] = $_POST['item'];

if(!isset($_SESSION['cart']))
{
	$_SESSION['cart'] = $assets;

}
	else
	{	
		echo "before add: <br>";
		var_dump($_SESSION['cart']);
		$_SESSION['cart'] = array_unique(array_merge($_SESSION['cart'], $assets));
	}
echo "after add: <br>";
var_dump($_SESSION['cart']);
?>