<?php

include '../conn.php';

if (isset($_POST['done'])) {

	$name = $_POST['name'];
	$quantity = $_POST['quantity'];
	$min_quantity = $_POST['min_quantity'];
	$price = $_POST['price'];
	$q = "INSERT INTO `products`(`name`, `quantity`, `min_quantity`, `price`) VALUES ('$name','$quantity','$min_quantity','$price')";

	$query = mysqli_query($con, $q);
	header('location: displayproduct.php');
}
?>

<?php include '../header.php'; ?>
<div class="col-lg-6 m-auto">
	<form method="post" action="">
		<br><br>
		<div class="card">

			<div class="card-header bg-dark">
				<h1 class="text-white text-center"> Add Product </h1>
			</div>
			<div class="card-body">
				<br><label> NAME : </label>
				<input type="text" name="name" class="form-control"><br>

				<label> QUANTITY : </label>
				<input type="text" name="quantity" class="form-control"><br>

				<label> MIN QUANTITY : </label>
				<input type="text" name="min_quantity" class="form-control"><br>

				<label> PRICE : </label>
				<input type="text" name="price" class="form-control"><br>

				<button class="btn btn-success" type="submit" name="done"> ADD </button><br>
			</div>
		</div>
	</form>

</div>

<?php include '../footer.php'; ?>