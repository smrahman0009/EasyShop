<?php
$auth=array();
$myfile = fopen("data.txt", "r") or die("Unable to open file!");
$cnt=0;
/*while ( cnt<= 2) {
	
}*/

echo "<table> <tr> <th>First_name</th>"."<th>Last_name</th>"."<th>Gender</th>"."<th>Mobile</th>"."<th>Mail</th></tr>";
while($line=fgets($myfile)){
	$line=trim($line);
	//echo $line.'<br>';
	$up=explode(" ",$line);
	//echo $up[0]." - ".$up[1]."<br/>";
	echo "<tr>"."<td>" .$up[0]. "</td>" . "<td>" .$up[1]. "</td>" . "<td>" .$up[2]. "</td>" . "<td>" .$up[3]. "</td>". "<td>" .$up[4]."</td>"."</tr>";
	}
	echo "</table>";
?>