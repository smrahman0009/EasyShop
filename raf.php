<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<input type="text" name="search" id="search" onkeyup ="mySearch()">
	<input type="text" name="search" id="search2" >
	<p id="demo"></p>
	<div id="d">
		
	</div>
	<script type="text/javascript">
		function mySearch(){
			var obj, dbParam, xmlhttp;
			var searchBar = document.getElementById("search").value;
			//obj = { "table":"customers", "limit":10 };
			dbParam = JSON.stringify(searchBar);
			xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
			  if (this.readyState == 4 && this.status == 200) {
			    document.getElementById("d").innerHTML = this.responseText;
			  }
			};
			xmlhttp.open("GET", "raf2.php?x=" + dbParam, true);
			xmlhttp.send();
		}
	</script>
</body>
</html>