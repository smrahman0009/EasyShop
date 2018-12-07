CREATE TABLE user_personal_info (
	user_id int(11) AUTO_INCREMENT PRIMARY KEY not null,
	first_name varchar(256) not null,
	last_name varchar(256) not null,
	phone_no varchar(256) not null
);

INSERT INTO user_personal_info (first_name,last_name,phone_no)
	VALUES ("Horten","Hoe","017-110959");

//////////////////// (TABLE) personal_info /////////////////////////

DELETE FROM personal_info WHERE user_id > 37;
SELECT * FROM personal_info;



//////////////////// (TABLE) sign_in_info /////////////////////////

DELETE FROM sign_in_info WHERE user_id > 37;
SELECT * FROM sign_in_info;

UPDATE sign_in_info
SET user_type = "normal"
WHERE email = "hasan@gmail.com";


//////////////////// (TABLE) product /////////////////////////

SELECT product_qty FROM product where id = '$pid';

UPDATE product SET product_qty = '$product_qty' where id = '$pid';