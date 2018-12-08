function validate_form(){
		/////////////// Validate First_name ////////////////////////
		var first_name = document.getElementById("first-name").value;
		var f_n_reg= /^[A-Z][a-z]+$/;
		var f_n_reg_result = f_n_reg.test(first_name);

		/////////////// Validate Last_name ////////////////////////
		var last_name = document.getElementById("last-name").value;
		var l_n_reg= /^[A-Za-z]+$/;
		var l_n_reg_result = l_n_reg.test(last_name);

		/////////////// Validate Phone Numbers ////////////////////////
		var phone_no = document.getElementById("phone-no").value;
		var phone_no_reg = /^[0-9]+$/;
		var phone_no_reg_result = phone_no_reg.test(phone_no);

		/////////////// Validate Email ////////////////////////
		var email = document.getElementById("email").value;
		var email_reg = /^[^@]+@[^@.]+\.[a-z]+$/i;
		var email_reg_result = email_reg.test(email);

		/////////////// Validate Password ////////////////////////
		/////////////// Must contain a lowercase, uppercase letter and a number//
		var password = document.getElementById("password").value;  
		var password_reg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/;
		var password_reg_result = password_reg.test(password);

		if (first_name=="") { alert("First Name required");}
		else if (f_n_reg_result == false) {
			alert("First Name required");
			return false;
		}
		else if (l_n_reg_result == false) {
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
		else if (email_reg_result == false) {
			alert("invalid email address");
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
				alert("Password and Confirm password Shoul be matched");
				return false;
			}
			else alert("Password matched!!!");
			return true;
		}
		
		return false;
	}

	