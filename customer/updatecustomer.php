<?php

include '../conn.php';

if (isset($_POST['done'])) {
	$customer_id = $_GET['customer_id'];

	$name = $_POST['name'];
	$mail_id = $_POST['mail_id'];
	$phone_no = $_POST['phone_no'];
	$gender = $_POST['gender'];
	$amount_spent = $_POST['amount_spent'];

	$q =  "UPDATE `customers` SET `name`='$name',`mail_id`='$mail_id',`phone_no`='$phone_no',`gender`='$gender' ,`amount_spent`='$amount_spent' WHERE customer_id=$customer_id";
	$query = mysqli_query($con, $q);
	header('location: displaycustomer.php');
} else {
	$customer_id = $_GET['customer_id'];
	$q = "SELECT * from `customers` where customer_id=$customer_id";
	$query = mysqli_query($con, $q);
	$data = mysqli_fetch_assoc($query);
}
?>


<?php include '../header.php'; ?>
<div class="col-lg-6 m-auto">
	<form method="post">
		<br><br>
		<div class="card">

			<div class="card-header bg-dark">
				<h1 class="text-white text-center"> Edit Customer </h1>
			</div>

			<div class="card-body">
				<br><label> NAME : </label>
				<input type="text" value="<?php echo $data['name'] ?>" name="name" class="form-control"><br>

				<label> MAIL-ID : </label>
				<input type="text" value="<?php echo $data['mail_id'] ?>" name="mail_id" class="form-control"><br>

				<label> PHONE-NO. : </label>
				<input type="text" value="<?php echo $data['phone_no'] ?>" name="phone_no" class="form-control"><br>

				<label> GENDER : </label>
				<select name="gender" class="form-control">
					<option <?php $data['gender'] == "male" ? 'selected':null;  ?> value="male">Male</option>
					<option <?php $data['gender'] == "female" ? 'selected':null;  ?> value="female">Female</option>
					<option <?php $data['gender'] == "NA" ? 'selected':null;  ?> value="NA">Prefer not to say</option>
				</select>
				<br>

				<!-- <label> AMOUNT SPENT : </label>
 				<input type="text" value="<?php echo $data['amount_spent'] ?>" name="amount_spent" class="form-control"><br>  -->

				<button class="btn btn-success" type="submit" name="done"> UPDATE </button><br>
			</div>
		</div>
	</form>

</div>

<?php include '../footer.php'; ?>