<?php
session_start();
include "database_connection.php";

if (isset($_POST['action'])) {
	if ($_POST['action'] == 'fetchAllOrders') {
		$AllOrders = mysqli_fetch_all(mysqli_query($conn,"SELECT order_id,date,payment_status,payment_method, delivery_address FROM orders WHERE email='{$_SESSION['Email']}'"),MYSQLI_ASSOC);
		echo json_encode($AllOrders);
	}
	if ($_POST['action'] == 'LiveSearch') {
		$cur_ = mysqli_query($conn,"SELECT * FROM product_detail WHERE product_name LIKE '%{$_POST['text']}%'");
		$output = array(
			'total_rows' => mysqli_num_rows($cur_),
			'products' => mysqli_fetch_all($cur_,MYSQLI_ASSOC)
		);
		echo json_encode($output);
	}
	if ($_POST['action'] == 'addToCart') {
		if (isset($_SESSION['Email'])) {
			$userId = $_SESSION['Email'];
			$query = "select * from fetch_id where id = {$_POST['id']} and user_email = '{$_SESSION['Email']}'";
			// echo $query;
			$result = mysqli_query($conn,$query);
			if (mysqli_num_rows($result) < 1)
			{
				$query = "INSERT INTO fetch_id(id,user_email,quantity) VALUES(".$_POST['id'].",'".$_SESSION['Email']."',{$_POST['quantity']})";
				mysqli_query($conn,$query);
				echo json_encode(array('success' => true, 'isLogedIn' => true));
			}
			else echo json_encode(array('success' => false, 'isLogedIn' => true));
		}
		else {
			echo json_encode(array('success' => false, 'isLogedIn' => false));
		}
	}
	if ($_POST['action'] == 'saveOrder') {
		if (isset($_SESSION['Email'])) {
			$userId = $_SESSION['Email'];
			$query = "INSERT INTO orders values (NULL,'{$userId}','{$_POST['address']}','{$_POST['cnic']}','COD','{$_POST['phone']}','unpaid',current_timestamp())";
			if (mysqli_query($conn,$query)) {
		        $order_id = mysqli_fetch_array(mysqli_query($conn,"SELECT order_id FROM orders WHERE email='{$_SESSION['Email']}' ORDER BY order_id DESC LIMIT 1"))[0];
		        $order_id = intval($order_id);
		        $product_query = "INSERT INTO order_products VALUES";

		        $result = mysqli_query($conn,"SELECT * FROM fetch_id WHERE user_email = '{$_SESSION['Email']}'");
		        $result = mysqli_fetch_all($result);
		        $i = 1;
		        foreach ($result as $key) {
		          $product_query .= "(" . $order_id . "," . $key[1] . "," . $key[2] . ")";
		          if ($i < sizeof($result)) $product_query .= ",";
		          ++$i;
		        }
		        if (mysqli_query($conn,$product_query)) {
		          if (mysqli_query($conn,"DELETE FROM fetch_id WHERE user_email = '{$_SESSION['Email']}'")) {
		            echo json_encode(array(
		            	'success' => true,
		            	'message' => 'No Error'
		            ));
		          }
		          else {
		          	echo json_encode(array(
		            	'success' => false,
		            	'message' => 'Some Error'
		            ));
		          }
		        }
			}
			else {
				echo json_encode(array(
					'success' => false,
					'message' => mysqli_error($conn)
				));
			}
		}
		else {
			echo json_encode(array('success' => false, 'isLogedIn' => false));
		}
	}
	if ($_POST['action'] == 'deleteFromCart') {
		$success = false;
		if (mysqli_query($conn,"DELETE FROM fetch_id WHERE id = {$_POST['id']} AND user_email='{$_SESSION['Email']}'")) {
			$success = true;
		}
		echo json_encode(array('success' => $success));
	}
	if ($_POST['action'] == 'updateCart') {
		$result = [
			'message' => ''
		];
		foreach ($_POST['products'] as $key) {
			if (!mysqli_query($conn,"UPDATE fetch_id SET quantity = {$key['quantity']} WHERE id = {$key['id']}")) {
				$result['message'] .= "Error -> " . mysqli_error($conn);
			}
		}
		echo json_encode($result);
	}
}
?>