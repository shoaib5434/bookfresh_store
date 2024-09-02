<?php
 
 
  if (isset($_POST["id"])) 
  {
  	include "database_connection.php";
    
  	$query="SELECT * from product_detail WHERE id='".$_POST["id"]."'";

  	$result=mysqli_query($conn,$query);
    
    echo json_encode(mysqli_fetch_assoc($result));
     
   }
  
 
?>