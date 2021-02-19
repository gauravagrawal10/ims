<?php

include '../conn.php';

if (isset($_POST['done'])) {
	$product_id = $_GET['product_id'];

	$name = $_POST['name'];
	$quantity = $_POST['quantity'];
	$min_quantity = $_POST['min_quantity'];
	$price = $_POST['price'];

	$q =  "UPDATE `products` SET `name`='$name',`quantity`='$quantity',`min_quantity`='$min_quantity',`price`='$price' WHERE product_id=$product_id";
	$query = mysqli_query($con, $q);
	header('location: displayproduct.php');
} else {
	$product_id = $_GET['product_id'];
	$q = "SELECT * from `products` where product_id=$product_id";
	$query = mysqli_query($con, $q);
	$data = mysqli_fetch_assoc($query);
}

?>


<?php include '../header.php'; ?>

<div class="col-lg-6 m-auto">
	<form method="post" action="">
		<br><br>
		<div class="card">

			<div class="card-header bg-dark">
				<h1 class="text-white text-center"> Update Product </h1>
			</div>
			<div class="card-body">

				<br><label> NAME : </label>
				<input type="text" value="<?php echo $data['name'] ?>" name="name" class="form-control"><br>

				<label> QUANTITY : </label>
				<input type="text" value="<?php echo $data['quantity'] ?>" name="quantity" class="form-control"><br>

				<label> MIN QUANTITY : </label>
				<input type="text" value="<?php echo $data['min_quantity'] ?>" name="min_quantity" class="form-control"><br>

				<label> PRICE : </label>
				<input type="text" value="<?php echo $data['price'] ?>" name="price" class="form-control"><br>

				<button class="btn btn-success" type="submit" name="done"> ADD </button><br>
			</div>
		</div>
	</form>

</div>

<?php include '../footer.php'; ?>