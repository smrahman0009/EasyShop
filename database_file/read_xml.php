<?php
global $cred;
function load_from_xml(){
		$xml=simplexml_load_file("database/product_detail.xml") or die("Error: Cannot create object");
	//	$xml=simplexml_load_file("product_detail.xml") or die("Error: Cannot create object");
	
		foreach ($xml as $st) {
			$dar = array();
			$dar["category"] = (string)$st->category;
			$dar["price"] = (string)$st->price;
			$dar["quant"] = (string)$st->quant;
			$dar["des"] = (string)$st->des;
			$cred = $dar;
		}
	}
?>