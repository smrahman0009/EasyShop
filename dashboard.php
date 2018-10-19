<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>

<title>WEB PAGE TITLE GOES HERE</title>

</head>

<body style="margin: 0px; padding: 0px; font-family: 'Trebuchet MS',verdana;">

<table width="100%" style="height: 100%;" cellpadding="10" cellspacing="0" border="0">
<tr>
	<!-- ============ HEADER SECTION ============== -->
	<td colspan="3" style="height: 100px;" bgcolor="green">
		<h1>Website Logo</h1>
		<h1 align="center" style="color: orange;"> EASY SHOP</h1>
	</td>
</tr>


<!-- ============ NAVIGATION BAR SECTION ============== -->
<tr>
	<td colspan="5" valign="middle" height="30" bgcolor=" #6ab47b">
		<table  width="100%">
			<tr style="color: orange" align="center">
				<td>
					<a href="dashboard.php">
						<input type="button" name="dashboard_button" value="DASHBOARD">
					</a>
				</td>
				<td>
					<a href="admin.php">
						<input type="button" name="admin_button" value="ADMIN">
					</a>
				</td>
				<td width="100%" align="left">
					<a href="index.php">
						<input type="button" name="home_button" value="HOME">
					</a>
				</td>
				<td width="100%" align="left">
					<a href="index.php">
						<input type="button" name="home_button" value="HOME">
					</a>
				</td>
				<td>
					<a href="signin.php">
						<input type="button" name="sign_in_button" value="sign in">
					</a>
				</td>
				<td>
					<a href="login.php">
							<input type="button" name="log_in_button" value="log in">
					</a>
				</td>
			</tr>
	
		</table>
		
	</td>
</tr>

<tr>
	<!-- ============ LEFT COLUMN (MENU) ============== -->
	<td width="60%" valign="top" bgcolor="#f5f5f5">
		<form action="/action_page.php">
			<h3>Choose a product picture: </h3>
				<input type="file" name="pic" accept="image/*">
			</br>
				<img src="img/f1.jpg" height="60%" width="50%">
				<br>
				 <input type="submit">
		</form>
	</td>

	<!-- ============ MIDDLE COLUMN (CONTENT) ============== -->
	<td width="55%" valign="top" bgcolor="#d2d8c7">
		Choose Catagory:
		<select name="catagory">
			<option name="Mens Wear">
				Mens Wear
			</option>
			<option name="Womens Wear">
				Womens Wear
			</option>
			<option name="Kids">
				Kids
			</option>
			<option name="Gadgets">
				Gadgets
			</option>
		</select>
		<br>
		<br>
		product quantity:
		<input type="text" name="product_quantity">
		<br>
		<br>
		product price:
		<input type="text" name="product_price">
		<br>
		<br>
		product descriptions:
		<input type="text" name="product_price" height="100" width="200%">
		<br>
		<br>
		<input type="button" name="add_price_button" width="100px" height="30%" value="ADD">


	</td>

	
</tr>

<!-- ============ FOOTER SECTION ============== -->
<tr><td colspan="3" align="center" height="20" bgcolor="#599a68">Copyright ©</td></tr>
</table>
</body>

<html>


