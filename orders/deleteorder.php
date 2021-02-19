<?php 

 include '../conn.php';

 $order_id = $_GET['order_id'];

 $q = "DELETE FROM `orders` WHERE order_id=$order_id";
 $query = mysqli_query($con,$q);
 header('location: displayorder.php');

?>