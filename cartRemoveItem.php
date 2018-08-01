<?php
session_start();

$array = $_SESSION['cart'];

$item = $_POST['item'];
if (($key = array_search($item, $array)) !== false) {
    $array[$key] = "";
}

$count = count($array);

for ($i=0; $i <$count-1 ; $i++)
{ 
	if(($array[$i])=="")
	{
		$array[$i] = $array[$i+1];
		$array[$i+1] = "";

	}
}
array_pop($array);
// unset($array[$count-1]);
// unset(end($array));
unset($_SESSION['cart']);
$_SESSION['cart'] = $array;
var_dump($_SESSION['cart']);

?>