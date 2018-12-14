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

