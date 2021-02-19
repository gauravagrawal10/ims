<?php 

include '../conn.php';

if(isset($_POST['done'])){

   $name = $_POST['name'];
   $mail_id = $_POST['mail_id'];
   $phone_no = $_POST['phone_no'];
   $gender = $_POST['gender'];
   $amount_spent = $_POST['amount_spent'];
   echo ($phone_no);
   $q = "INSERT INTO `customers`(`name`, `mail_id`, `phone_no`, `gender`, `amount_spent`) VALUES ('$name','$mail_id','$phone_no','$gender','$amount_spent')";
   
   $query = mysqli_query($con,$q);
   header('location: displaycustomer.php');
 }
?> 
<?php include '../header.php'; ?>

 	<div class="col-lg-6 m-auto pb-4 ">
 		<form method="post" action="">
 			<br><div class="card shadow">

 				<div class="card-header bg-dark">
 					<h1 class="text-white text-center"> Add Customer </h1>
 				</div>
				 
			<div class="card-body">
 				<br><label> NAME : </label>
 				<input type="text" name="name" class="form-control" ><br>

 				<label> MAIL-ID : </label>
 				<input type="email" name="mail_id" class="form-control"><br>

 				<label> PHONE-NO : </label>
 				<input type="tel" name="phone_no" class="form-control"><br>
 				
				 <label> GENDER : </label>
				 <select name="gender" class="form-control">
 					<option selected value="">Select</option>
 					<option value="male">Male</option>
					 <option value="female">Female</option>
					 <option value="NA">Prefer not to say</option>
				 </select>
				 <br>
<!-- 
				<label> AMOUNT SPENT : </label>
 				<input type="text" name="amount_spent" class="form-control"><br> -->

 				<button class="btn btn-success" type="submit" name="done"> ADD </button><br>
 			</div>
 			</div>
 		</form>
 		
 	</div>
   <?php include '../footer.php'; ?>