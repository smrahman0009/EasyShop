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

UPDATE product SET product_name = '$product_name', product_price = '$product_price', product_qty = '$product_qty',
description = '$description' where id = '$id';

DELETE FROM product WHERE user_id = '$id';

SELECT MAX(id) FROM product;



//////////////////// (TABLE) order_info /////////////////////////

CREATE TABLE order_info (
	order_id int(11) AUTO_INCREMENT PRIMARY KEY not null,
	customer_id varchar(256) not null,
	product_id int(11) not null,
	quantity int(11) not null
);

INSERT INTO order_info (customer_id,product_id,quantity)
	VALUES ("ks@gmail.com","1","1");

UPDATE order_info SET product_id = '$product_id' where id = '$pid';

SELECT * FROM order_info ;

DELETE FROM order_info WHERE order_id = 20;



//////////////////// (TABLE) address_info /////////////////////////

CREATE TABLE address_info (
	email_id varchar(256)  PRIMARY KEY not null,
	city varchar(256) not null,
	area varchar(256) not null,
	road varchar(256) not null,
	house_no varchar(256) not null,
	flat_no varchar(256) not null,
	postal_code int(11) not null
);

INSERT INTO address_info (email_id,city,area,road,house_no,flat_no,postal_code)
	VALUES ("mushfik@gmail.com","Dhaka","Bashundhara Block C","7","194A","52A",071);


//////////////////// (TABLE) brand_info /////////////////////////

CREATE TABLE brand_info (
	product_id int(11)  PRIMARY KEY not null,
	brand_name varchar(256) not null
);
INSERT INTO brand_info (product_id,brand_name)
	VALUES (13,"toyhouse");


//////////////////// CUSTOMER VIEW ////////////////////////////////////////
//////////////////// SQL JOIN QUERY FOR "order_info" && "product" TABLE/////////////////////////

SELECT order_info.customer_id,order_info.product_id,order_info.quantity,product.product_name,product.product_price,product.product_category
,product.product_image FROM order_info INNER JOIN product ON order_info.product_id = product.id;

//////////////////// ADMIN VIEW ////////////////////////////////////////
//////////////////// SQL JOIN QUERY FOR "order_info" && "product" TABLE/////////////////////////

SELECT order_info.customer_id,order_info.product_id,order_info.quantity,product.product_name,
product.product_price,product.product_category
FROM order_info INNER JOIN product ON order_info.product_id = product.id;


///////////////////////// SQL JOIN QUERY FOR "order_info" && "address_info"/////////////////
SELECT address_info.email_id,address_info.city,address_info.area,address_info.road,address_info.house_no,address_info.flat_no,address_info.postal_code FROM
address_info inner JOIN order_info WHERE address_info.email_id = order_info.customer_id