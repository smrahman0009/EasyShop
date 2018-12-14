function validate_form(){
		/////////////// Validate city ////////////////////////
		var city = document.getElementById("first-name").value;
		var city_reg= /^[A-Z][a-z]+$/;
		var city_reg_result = city_reg.test(city);

		/////////////// Validate area_no ////////////////////////
		var area_no = document.getElementById("last-name").value;
		var area_no_reg= /^[A-Za-z]+$/;
		var area_no_reg_result = area_no_reg.test(area_no);

		/////////////// Validate Phone Numbers ////////////////////////
		var road_no = document.getElementById("phone-no").value;
		var road_no_reg = /^[0-9]+$/;
		var road_no_reg_result = road_no_reg.test(road_no);

		/////////////// Validate house_no ////////////////////////
		var house_no = document.getElementById("house_no").value;
		var house_no_reg = /^[^@]+@[^@.]+\.[a-z]+$/i;
		var house_no_reg_result = house_no_reg.test(house_no);

		/////////////// Validate flat_no ////////////////////////
		/////////////// Must contain a lowercase, uppercase letter and a number//
		var flat_no = document.getElementById("flat_no").value;  
		var flat_no_reg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/;
		var flat_no_reg_result = flat_no_reg.test(flat_no);

		if (city=="") { alert("First Name required");}
		else if (city_reg_result == false) {
			alert("First Name required");
			return false;
		}
		else if (area_no_reg_result == false) {
			alert("Last Name only contain letters ");
			return false;
		}
		else if (road_no == "") {
			alert("Phone number required");
			return false;
		}
		else if (road_no_reg_result == false) {
			alert("Phone no only contain numbers");
			return false;
		}
		else if (house_no_reg_result == false) {
			alert("invalid house_no address");
			return false;
		}
		else if (flat_no_reg_result == false) {
			alert("Must contain a lowercase,uppercase and a number");
			return false;
		}
		else if (document.getElementById("flat_no").value == "") {
			alert("Empty flat_no field");
			return false;
		}
		else if (flat_no_reg_result == true) {
			if (document.getElementById("flat_no").value != document.getElementById("confirm-flat_no").value) {
				alert("flat_no and Confirm flat_no Shoul be matched");
				return false;
			}
			else alert("flat_no matched!!!");
			return true;
		}
		
		return false;
	}

function delivery_form(){
		/////////////// Validate city ////////////////////////
		var city = document.getElementById("city").value;
		var city_reg = /^[A-Z][a-z]+$/;
		var city_reg_result = city_reg.test(city);

		/////////////// Validate area_no ////////////////////////
		var area_no = document.getElementById("area-no").value;
		var area_no_reg= /^[A-Za-z0-9]+$/;
		var area_no_reg_result = area_no_reg.test(area_no);

		/////////////// Validate road_no Numbers ////////////////////////
		var road_no = document.getElementById("road-no").value;
		var road_no_reg = /^[0-9a-zA-Z]+$/;
		var road_no_reg_result = road_no_reg.test(road_no);

		/////////////// Validate house_no ////////////////////////
		var house_no = document.getElementById("house-no").value;
		var house_no_reg = /^[0-9a-zA-Z]+$/i;
		var house_no_reg_result = house_no_reg.test(house_no);

		/////////////// Validate flat_no ////////////////////////
		/////////////// Must contain a lowercase, uppercase letter and a number//
		var flat_no = document.getElementById("flat-no").value;  
		var flat_no_reg = /^[0-9a-zA-Z]+$/;
		var flat_no_reg_result = flat_no_reg.test(flat_no);

		/////////////// Postal Code ////////////////////////
		var postal_no = document.getElementById("postal-code").value;
		var postal_no_reg = /^[0-9]+$/;
		var postal_no_reg_result = postal_no_reg.test(postal_no);

		if (city=="") { alert("city name required"); return false;}
		else if (area_no == "") {alert("city name required"); return false;}
		else if (road_no =="") {alert("city name required"); return false;}
		else if (house_no == "") {alert("House no required"); return false;}
		else if (flat_no =="") {alert("Flat no required"); return false;}

		else if (city_reg_result == false) {
			alert("First Name required");
			return false;
		}
		else if (area_no_reg_result == false) {
			alert("Last Name only contain letters ");
			return false;
		}
		else if (road_no == "") {
			alert("Phone number required");
			return false;
		}
		else if (road_no_reg_result == false) {
			alert("Phone no only contain numbers");
			return false;
		}
		else if (house_no_reg_result == false) {
			alert("invalid house_no address");
			return false;
		}
		else if (flat_no_reg_result == false) {
			alert("Must contain a lowercase,uppercase and a number");
			return false;
		}
		else if (document.getElementById("flat_no").value == "") {
			alert("Empty flat_no field");
			return false;
		}
		else if (flat_no_reg_result == true) {
			if (document.getElementById("flat_no").value != document.getElementById("confirm-flat_no").value) {
				alert("flat_no and Confirm flat_no Shoul be matched");
				return false;
			}
			else alert("flat_no matched!!!");
			return false;
		}
		
		return false;
	}
	