<?php
	include 'include/header.php';
?>
<?php
	$cred=array();
	require("database_file/read_xml.php");
	
	load_from_xml();
	
	//$xml=simplexml_load_file("database/product_detail.xml") or die("Error: Cannot create object");
	foreach ($cred as $a) {
		$category = $a["category"];
		$price = $a["price"];
		$quant = $a["quant"];
		$des = $a["des"];
	}
	//require("database_file/read_xml.php");
	//load_from_xml();
	
/*	$xml=simplexml_load_file("database/product_detail.xml") or die("Error: Cannot create object");
	//echo $xml->category. "<br>";
//	echo $xml->price . "<br>";
//	echo $xml->quant . "<br>";

	$category = $xml->category;
	$price = $xml->price;
	$quant = $xml->quant;
	$des = $xml->des;*/

?>

<!-- ============ NAVIGATION BAR SECTION ============== -->
<?php
	include 'include/navigation_bar.php';
?>
	<!-- ============ LEFT COLUMN (MENU) ============== -->
	<td width="60%" valign="top" bgcolor="#f5f5f5">
		<h3>product Details</h3>
		<img src="img/f1.jpg">
		<p>
			Hello it is a very nice dolls. Its soft and very much cute . Your boys 
			or girlls should like it.
		</p>
		<h1>
			Advertisements for same catagory products
		</h1>
	</td>

	<!-- ============ MIDDLE COLUMN (CONTENT) ============== -->
	<td width="55%" valign="top" bgcolor="#d2d8c7">

		<h2>Product related Info: </h2>

		<p>
			contain some product related informations.
		</p>
		
		<h3>Quantity</h3>
		<input type="text" name="quantity" value="<?php echo $quant ?>">
		<h3>price</h3>
		<input type="text" name="price" value= "<?php echo $price ?>">
		<br>
		<h3>Description: </h3>
		<hr>
		<p>
			<?php
				echo $des;
			?>
		</p>
		<input type="button" name="add_button" width="100px" height="30%" value="ADD TO CART">
		<br>


	</td>

	
</tr>

<!-- ============ FOOTER SECTION ============== -->
<?php
	include 'include/footer.php';
?>

