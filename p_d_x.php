<?php
$xml=simplexml_load_file("database/product_detail.xml") or die("Error: Cannot create object");
echo $xml->category. "<br>";
echo $xml->price . "<br>";
echo $xml->quant . "<br>";

$_SESSION["category"] = $xml->category;
$_SESSION["price"] = $xml->price;
$_SESSION["quant"] = $xml->quant;
?> 
