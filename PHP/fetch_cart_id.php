<?php

include "database_connection.php";

if (isset($_GET['id'])) $id=$_GET['id'];

$sql="INSERT INTO fetch_id (id)
     VALUES ('$id')";
?>