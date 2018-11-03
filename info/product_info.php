<?php

/*while ( cnt<= 2) {
	
}*/

function display_user_info(){
	$auth=array();
	$myfile = fopen("../database/pro_info.txt", "r") or die("Unable to open file!");
	$cnt=0;
	
	echo "<table>
	 <tr>
	  <th>Category </th>"."<th>Product Name</th>"."<th> Price </th>"."<th>Quantity</th>"."<th>Description</th>
	  </tr>";
	while($line=fgets($myfile)){
		$line=trim($line);
		//echo $line.'<br>';
		$up=explode(" ",$line);
		//echo $up[0]." - ".$up[1]."<br/>";
		echo "<tr>"
			."<td>" .$up[0]. "</td>" . "<td>" .$up[1]. "</td>" . "<td>" .$up[2]. "</td>" . "<td>" .$up[3]. "</td>"."<td>" .$up[4]. "</td>"
			."</tr>";
		}
		echo "</table>";
}

display_user_info();
?>