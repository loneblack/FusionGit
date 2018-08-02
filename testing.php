<?php

$cars = array("Toyota", "asdf", "asddfg", "hgfd","asdfgf");

var_dump($cars);
echo "<br>";
$count = count($cars);


for ($i=0; $i <$count-1 ; $i++)
{ 
	if(($cars[$i])=="")
	{
		$cars[$i] = $cars[$i+1];
		$cars[$i+1] = "";

	}
}


unset(end($cars));
var_dump($cars);
echo "<br>";


$motor = array("ASSS", "Toyota", "asdf");
$cars =  array_unique(array_merge($cars, $motor));

echo "<br>";
var_dump($cars);
?>