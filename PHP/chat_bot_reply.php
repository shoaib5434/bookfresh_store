<?php 

include '../PHP/database_connection.php';

$userQuery = explode(' ', $_POST['userMessage']);
$userQuery = adverbExtract($userQuery,$conn);

if (count($userQuery) > 0) {
	$userQuery = keywordMatch($userQuery,$conn);
}

function adverbExtract($words,$conn) {
	$adverb = mysqli_fetch_all(mysqli_query($conn,"SELECT word FROM adverbs"));

	$rem_words = array();


	foreach ($words as $key) {
		$flag = false;
		foreach ($adverb as $word) {
			if ($word[0] == $key) {
				$flag = true;
			}
		}
		if (!$flag) array_push($rem_words,$key);
	}


	return $rem_words;
}

function keywordMatch($words,$conn) {
	$result = array();
	$rem_words = array();

	foreach ($words as $key) {
		$cur_ = mysqli_query($conn,"SELECT * FROM keywords WHERE word = '{$key}'");
		if (mysqli_num_rows($cur_) > 0) {
			array_push($result,mysqli_fetch_array($cur_));
		}
		else {
			array_push($rem_words, $key);
		}
	}

	if (!matchProducts($rem_words,$conn)) {
		if (sizeof($result) == 0) {
			echo "<b> Sorry Can't Rechognize</b>";
		}
		else {
			$output = '';
			$max_priority = 0;
			foreach ($result as $key) {
				if ($key[1] > $max_priority) {
					$max_priority = $key[1];
					$output = $key[2];
				}
			}
			echo $output;
		}
	}
}

function matchProducts($words,$conn) {
	foreach ($words as $key) {
		$cur_ = mysqli_query($conn,"SELECT * FROM product_detail WHERE product_name = '{$key}'");
		if (mysqli_num_rows($cur_) > 0) {
			$row = mysqli_fetch_assoc($cur_);
			$output = "
				<b> {$key} is Available </b><br>
				<i>Price : <b> {$row['price']} </b><br>
				<a href='../PHP/product.php?id={$row["id"]}'> View Detail </a>
			";
			echo $output;
			return true;
		}
	}
	return false;
}

?>