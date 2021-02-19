<?php 

 include '../conn.php';

 $customer_id = $_GET['customer_id'];

 $q = "DELETE FROM `customers` WHERE customer_id=$customer_id";
 $query = mysqli_query($con,$q);
 header('location: displaycustomer.php');

?>