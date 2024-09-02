<?php

include "database_connection.php";

$query="SELECT * from product_detail";

$result=mysqli_query($conn,$query) or die(mysql_error());

echo json_encode( mysqli_fetch_all($result,MYSQLI_ASSOC));


?>
  