<?php
	include 'include/header.php';
?>
<!-- ============ NAVIGATION BAR SECTION ============== -->
<?php
	include 'include/navigation_bar.php';
?>
	<!-- ============ LEFT COLUMN (MENU) ============== -->
	
<?php
	//include 'include/left_col_menu.php';
?>
	<!-- ============ MIDDLE COLUMN (CONTENT) ============== -->
	<td width="55%" valign="top" bgcolor="#d2d8c7">
		<form>
			<table align="center">
				<tr >
					<td>
						<p>User Id</p>
						<input type="text" name="user_id">
					</td>
				</tr>
				<tr>
					<td>
						<p>
						Password
						</p>
						<input type="text" name="user_password">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="lg_button" value="log in">
					</td>
					<td>
						Forgot <a href="#">Password</a>
					</td>
				</tr>
			</table>
		</form>

	</td>

	<!-- ============ RIGHT COLUMN (CONTENT) ============== -->
<?php
	//include 'include/left_col_menu.php';
?>
<!-- ============ FOOTER SECTION ============== -->
<?php
	include 'include/footer.php';
?>


