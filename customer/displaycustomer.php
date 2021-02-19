<?php include '../header.php'; ?>
<div class="container">
  <div class="col-lg-12 mt-4">
    <div class="d-flex align-items-center">
      <h1 class="text-warning text-center"> CUSTOMER DETAILS </h1>
      <a href="/ims/customer/addcustomer.php" class="ml-auto btn btn-primary" style="height:fit-content;">Add Customer</a>
    </div>

    <br>
    <table id="mycustomer" class="table table-info table-hover ">
      <thead>
        <tr class="bg-dark text-white text-center">
          <th>ID</th>
          <th>NAME</th>
          <th>AMOUNT SPENT</th>
          <th>DETAILS</th>
          <th>DELETE</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include '../conn.php';

        $q = "select * from customers";
        $query = mysqli_query($con, $q);
        $i = 1;
        while ($row = mysqli_fetch_array($query)) {
          $t = $row["customer_id"];
          $r = mysqli_fetch_array(mysqli_query($con, "SELECT sum(amount_spent) as amt from orders where customer_id='$t'"));

        ?>

          <tr class="text-center">
            <td><?php echo $i; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $r['amt'] == null || $r['amt'] == 0 ? 'NA' :$r['amt'] ?></td>
            <!-- Button trigger modal -->
            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">VIEW</button></td>
            <td><button class="btn-danger btn"><a href="deletecustomer.php?customer_id=<?php echo $row['customer_id']; ?>" class="text-white">DELETE</a></button></td>
          </tr>

          <!-- Modal -->
          <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-success text-light">
                  <h5 class="modal-title" id="staticBackdropLabel">Customer Details</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body ">

                  <div class="row">
                    <div class="col-4 font-weight-bold">Name : </div>
                    <div class="col-8"><?php echo $row['name']; ?></div>
                    <div class="col-4 font-weight-bold">Mail : </div>
                    <div class="col-8"><?php echo $row['mail_id']; ?></div>
                    <div class="col-4 font-weight-bold">Phone no : </div>
                    <div class="col-8"><?php echo $row['phone_no']; ?></div>
                    <div class="col-4 font-weight-bold">Gender : </div>
                    <div class="col-8"><?php echo $row['gender']; ?></div>
                    <div class="col-4 font-weight-bold">Amount Spent : </div>
                    <div class="col-8"><?php echo $r['amt'] == null || $r['amt'] == 0 ? 'NA' :$r['amt'] ?></div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button class="btn-success btn mr-auto"><a href="updatecustomer.php?customer_id=<?php echo $row['customer_id']; ?>" class="text-white">EDIT</a></button>
                  <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
                </div>
              </div>
            </div>
          </div>


        <?php
          $i++;
        }
        ?>
      </tbody>
    </table>
  </div>
</div>






<?php include '../footer.php'; ?>