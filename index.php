<?php
session_start();
?>
<?php
	include 'include/header.php';
?>

<!-- ============ NAVIGATION BAR SECTION ============== -->
<?php
	include 'include/navigation_bar.php';
?>
	<!-- ============ LEFT COLUMN (MENU) ============== -->
<?php
	include 'include/left_col_menu.php';
?>

	<!-- ============ MIDDLE COLUMN (CONTENT) ============== -->
	<td width="55%" valign="top" bgcolor="#d2d8c7">
		<h2>Products Info: </h2>
		<table width="100%">
		<tr>
			<td>
				<a href="product_detail.php">
					<img src="img/f1.jpg" class="dolls">
				</a>
			</td>
			<td class="product_detail.php">
				<a href="product_detail.php">
					<img src="img/f2.jpg" class="dolls">
				</a>
			</td>
			<td>
				<a href="product_detail.php">
					<img src="img/f3.jpg" class="dolls">
				</a>
			</td>
		</tr>
		<tr>
			<td>
				<a href="product_detail.php">
					<img src="img/a1.jpg" class="dolls">
				</a>
			</td>
			<td>
				<a href="product_detail.php">
					<img src="img/a2.jpg" class="dolls">
				</a>
			</td>
			<td>
				<a href="product_detail.php">
					<img src="img/a3.jpg" class="dolls">
				</a>
			</td>
		</tr>
		<tr>
			<td>
				<a href="product_detail.php">
					<img src="img/a4.jpg">
				</a>
			</td>
			<td>
				<a href="product_detail.php">
					<img src="img/a5.jpg">
				</a>
			</td>
			<td>
				<a href="product_detail.php">
					<img src="img/a6.jpg">
				</a>
			</td>
		</tr>
		</table>
	</td>

	<!-- ============ RIGHT COLUMN (CONTENT) ============== -->
<?php
	include 'include/right_col_content.php';
?>
<!-- ============ FOOTER SECTION ============== -->
<?php
	include 'include/footer.php';
?>

