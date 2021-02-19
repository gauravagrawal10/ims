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
	header('location: displayorder.php');
} else {
	$order_id = $_GET['order_id'];
	$q = "SELECT orders.amount_spent, customers.name, orders.date,orders.order_id FROM customers  JOIN orders  ON customers.customer_id=orders.customer_id";
	$query = mysqli_query($con, $q);
	$i = 1;
	while ($row = mysqli_fetch_array($query)) {
	}
}
?>


<?php include '../header.php'; ?>
<div class="container mt-4">
	<div class="card p-3 shadow w-75 m-auto">
		<div class="w-100 ">
			<img src="/ims/logo.jpeg" width="80" class="float-right" alt="">
			<?php
			$q = "SELECT orders.*,customers.name as custname FROM orders  JOIN customers ON customers.customer_id=orders.customer_id WHERE order_id = $order_id ";
			$query = mysqli_query($con, $q);
			while ($row = mysqli_fetch_array($query)) {
				$amount = $row['amount_spent'];
				echo "<div  class='h4'>" . $row['custname'] . "</div>";
				echo "<div>Invoice #" . $row['order_id'] . "</div>";
				echo "<div>" . date("F d,Y", strtotime($row['date'])) . "</div>";
			}
			?>
		</div>
		<br>
		<br>
		<br>
		<br>
		<table class="table m-auto" cellpadding="0" cellspacing="0">
			<tbody>
				<tr class="font-weight-bold">
					<td align="left">Product</td>
					<td align='center'>Price</td>
					<td align='center'> </td>
					<td align='center'>Quantity</td>
					<td align='right'>Total</td>
				</tr>
				<?php
				$q = "SELECT order_items.*,products.name as prodname FROM order_items JOIN products ON products.product_id=order_items.product_id WHERE order_id = $order_id";
				$query = mysqli_query($con, $q);
				while ($data = mysqli_fetch_array($query)) {
					echo	"<tr>
					<td>" . $data['prodname'] . "</td>
					<td align='center'>" . $data['price'] . "</td>
					<td align='center'>x</td>
					<td align='center'>" . $data['quantity'] . "</td>
					<td align='right'>" . $data['price'] * $data['quantity'] . "</td>
				</tr>";
				}
				?>
				<tr class="font-weight-bold">
					<td align="left">Total</td>
					<td align='right'> </td>
					<td align='right'> </td>
					<td align='right'> </td>
					<td align='right'><?php echo $amount; ?></td>
				</tr>
			</tbody>
		</table>
	</div>
	<?php include '../footer.php'; ?>