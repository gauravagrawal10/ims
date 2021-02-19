<?php 

 include '../conn.php';

 $product_id = $_GET['product_id'];

 $q = "DELETE FROM `products` WHERE product_id=$product_id";
 $query = mysqli_query($con,$q);
 header('location: displayproduct.php');

?>