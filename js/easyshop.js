//////////////////////// SIGN  UP /////////////////////////////////////////////
function validate_form(){
		/////////////// Validate first_name ////////////////////////
		var first_name = document.getElementById("first-name").value;
		var first_name_reg= /^[A-Z][a-z]+$/;
		var first_name_reg_result = first_name_reg.test(first_name);

		/////////////// Validate last_name ////////////////////////
		var last_name = document.getElementById("last-name").value;
		var last_name_reg= /^[A-Za-z]+$/;
		var last_name_reg_result = last_name_reg.test(last_name);

		/////////////// Validate Phone Numbers ////////////////////////
		var phone_no = document.getElementById("phone-no").value;
		var phone_no_reg = /^[0-9]+$/;
		var phone_no_reg_result = phone_no_reg.test(phone_no);

		/////////////// Validate email_no ////////////////////////
		var email_no = document.getElementById("email").value;
		var email_no_reg = /^[^@]+@[^@.]+\.[a-z]+$/i;
		var email_no_reg_result = email_no_reg.test(email_no);

		/////////////// Validate password ////////////////////////
		/////////////// Must contain a lowercase, uppercase letter and a number//
		var password = document.getElementById("password").value;  
		var password_reg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/;
		var password_reg_result = password_reg.test(password);

		if (first_name=="") { alert("First Name required");}
		else if (first_name_reg_result == false) {
			alert("First Name required");
			return false;
		}
		else if (last_name_reg_result == false) {
			alert("Last Name only contain letters ");
			return false;
		}
		else if (phone_no == "") {
			alert("Phone number required");
			return false;
		}
		else if (phone_no_reg_result == false) {
			alert("Phone no only contain numbers");
			return false;
		}
		else if (email_no_reg_result == false) {
			alert("invalid email_no address");
			return false;
		}
		else if (password_reg_result == false) {
			alert("Must contain a lowercase,uppercase and a number");
			return false;
		}
		else if (document.getElementById("password").value == "") {
			alert("Empty password field");
			return false;
		}
		else if (password_reg_result == true) {
			if (document.getElementById("password").value != document.getElementById("confirm-password").value) {
				alert("password and Confirm password Shoul be matched");
				return false;
			}
			else alert("password matched!!!");
			return true;
		}
		
		return false;
	}
//////////// JSON && AJAX ////////////////////////////////////////////////
	var	productCount = 6;
	function mySearch(){
			var obj, dbParam, xmlhttp;
			var searchBar = document.getElementById("search").value;
			//obj = { "table":"customers", "limit":10 };
			dbParam = JSON.stringify(searchBar);
			xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
			  if (this.readyState == 4 && this.status == 200) {
			    document.getElementById("products").innerHTML = this.responseText;
			  }
			};
			xmlhttp.open("GET", "database_file/load-products-search.php?x=" + dbParam, true);
			xmlhttp.send();
		}
	function showMore(){
			
			productCount = productCount + 6;
			var obj, dbParam, xmlhttp;
			//var searchBar = document.getElementById("search").value;
			//obj = { "table":"customers", "limit":10 };
			dbParam = JSON.stringify(productCount);
			xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
			  if (this.readyState == 4 && this.status == 200) {
			    document.getElementById("products").innerHTML = this.responseText;
			  }
			};
			xmlhttp.open("GET", "database_file/load-products.php?x=" + dbParam, true);
			xmlhttp.send();
		}
	function MensWear(){
		var obj, dbParam, xmlhttp;
			var category = "Mens Wear";

			dbParam = JSON.stringify(category);
			xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
			  if (this.readyState == 4 && this.status == 200) {
			    document.getElementById("products").innerHTML = this.responseText;
			  }
			};
			xmlhttp.open("GET", "database_file/load-products-ctg.php?x=" + dbParam, true);
			xmlhttp.send();
	}

	function WomensWear(){
		var obj, dbParam, xmlhttp;
			var category = "Womens Wear";

			dbParam = JSON.stringify(category);
			xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
			  if (this.readyState == 4 && this.status == 200) {
			    document.getElementById("products").innerHTML = this.responseText;
			  }
			};
			xmlhttp.open("GET", "database_file/load-products-ctg.php?x=" + dbParam, true);
			xmlhttp.send();
	}

	function Kids(){
			var obj, dbParam, xmlhttp;
			var category = "kids";

			dbParam = JSON.stringify(category);
			xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
			  if (this.readyState == 4 && this.status == 200) {
			    document.getElementById("products").innerHTML = this.responseText;
			  }
			};
			xmlhttp.open("GET", "database_file/load-products-ctg.php?x=" + dbParam, true);
			xmlhttp.send();
	}
	function Gadgets(){
			var obj, dbParam, xmlhttp;
			var category = "gadgets";

			dbParam = JSON.stringify(category);
			xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
			  if (this.readyState == 4 && this.status == 200) {
			    document.getElementById("products").innerHTML = this.responseText;
			  }
			};
			xmlhttp.open("GET", "database_file/load-products-ctg.php?x=" + dbParam, true);
			xmlhttp.send();
	}







///////////////////////////// LOGIN VALIDATION //////////////////////////////



function LoginValidation(){
		
		///////////////// EMAIL //////////////////////////
		var email = document.getElementById("email").value;
		var email_reg = /^[^@]+@[^@.]+\.[a-z]+$/i;
		var email_reg_result = email_reg.test(email);


		/////////////// Validate Password ////////////////////////
		/////////////// Must contain a lowercase, uppercase letter and a number//
		var password = document.getElementById("password").value;  
		var password_reg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/;
		var password_reg_result = password_reg.test(password);

		if (email == "" || password =="") {
			alert("empty user name or password");
			return false;
		}
		else if (email_reg_result == false) {
			alert("Shoul be valid email address");
			return false;
		}
		else if (password_reg_result == false) {
			alert("invalid password");
			return false;
		}
		else alert("Login Successfull");
	}


	////////////////////// dashboard valdiation/////////////////////////
	function dbValidation(){
		var file_pic = document.getElementById("file-pic").value;
		var product_name = document.getElementById("product-name").value;
		var product_price = document.getElementById("product-price").value;
		var product_qty = document.getElementById("product-qty").value;
		var product_brand = document.getElementById("product-brand").value;
		var description = document.getElementById("description").value;

		if (product_name == "") {
			alert("Product Name required");
			return false;
		}
		else if (file_pic == "") {
			alert("Product image required");
			return false;
		}
		else if (product_price == "") {
			alert("Product price required");
			return false;
		}
		else if (product_qty == "") {
			alert("Product quantity required");
			return false;
		}
		else if (product_brand == "") {
			alert("Product brand required");
			return false;
		}
		else if (description == "") {
			alert("Product description required");
			return false;
		}
	}

	function ProductAdmin(){
		//alert("I am clidked");
		/////////////// Validate product name ////////////////////////
		var product_name = document.getElementById("product-name").value;
		var product_name_reg= /^[A-Za-z]+$/;
		var product_name_reg_result = product_name_reg.test(product_name);

		/////////////// Validate product price ////////////////////////
		var product_price = document.getElementById("product-price").value;
		var product_price_reg = /^[0-9.]+$/;
		var product_price_reg_result = product_price_reg.test(product_price);

		/////////////// Validate product_qty ////////////////////////
		var product_qty = document.getElementById("product-qty").value;
		var product_qty_reg = /^[0-9]+$/;
		var product_qty_reg_result = product_qty_reg.test(product_qty);

		/////////////// Validate product description ////////////////////////

		var description = document.getElementById("description").value;  
		var description_reg = /^[a-zA-Z0-9 ]+$/;
		var description_reg_result = description_reg.test(description);

	
		if (product_name_reg_result == false) {
			alert("invalid product name");
			return false;
		}
		else if (product_price_reg_result == false) {
			alert("invalid price");
			return false;
		}
		else if ( product_qty_reg_result == false) {
			alert("invalid quantity");
			return false;
		}
		else if ( product_qty_reg_result == false) {
			alert("invalid quantity");
			return false;
		}
		else if ( description == "") {
			alert("description required");
			return false;
		}
		return true;
	}