<?php

include '../PHP/database_connection.php';

if (isset($_POST['action'])) {
	if ($_POST['action'] == 'fetchAllOrders') {
		$AllOrders = mysqli_fetch_all(mysqli_query($conn,"SELECT order_id,date,payment_status,payment_method, delivery_address FROM orders"),MYSQLI_ASSOC);
		echo json_encode($AllOrders);
	}
	if ($_POST['action'] == 'fetchAllProducts') {
		$AllOrders = mysqli_fetch_all(mysqli_query($conn,"SELECT * FROM product_detail"),MYSQLI_ASSOC);
		echo json_encode($AllOrders);
	}
	if ($_POST['action'] == 'fetchSingleOrder') {
		$query = "
			select First_name,Last_name,Email,Mobile_no from user_information where Email = (SELECT email from orders where order_id = {$_POST['id']});
		";
		$name = mysqli_fetch_array(mysqli_query($conn,$query));
		$email = $name[2];
		$phone = $name[3];
		$name = $name[0] . ' ' . $name[1];
		$query = "
			select product_detail.product_img, product_detail.price, product_detail.product_name, order_products.quantity from product_detail,order_products where order_products.product_id = product_detail.id AND order_products.order_id = {$_POST['id']};
		";
		$products = mysqli_fetch_all(mysqli_query($conn,$query),MYSQLI_ASSOC);

		echo json_encode(array(
			'name' => $name,
			'phone' => $phone,
			'email' => $email,
			'products' => $products
		));
	}
	if ($_POST['action'] == 'deleteOrder') {
		if (mysqli_query($conn,"
			DELETE FROM orders WHERE order_id = {$_POST['id']}
			")) {
			if (mysqli_query($conn,"DELETE FROM order_products WHERE order_id = {$_POST['id']}"))
				echo json_encode(array('success' => true));
			else echo json_encode(array('success' => false));
		}
		else {
			echo json_encode(array('success' => false));
		}
	}
	if ($_POST['action'] == 'deleteProduct') {
		if (mysqli_query($conn,"
			DELETE FROM product_detail WHERE id = {$_POST['id']}
			")) {
			if (mysqli_query($conn,"DELETE FROM order_products WHERE product_id = {$_POST['id']}"))
				if (mysqli_query($conn,"DELETE FROM fetch_id WHERE id = {$_POST['id']}"))
					echo json_encode(array('success' => true));
				else echo json_encode(array('success' => false));
			else echo json_encode(array('success' => false));
		}
		else {
			echo json_encode(array('success' => false));
		}
	}
}

?>