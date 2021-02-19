<?php

include '../conn.php';

if (isset($_POST['done'])) {
    $sumAmount = 0;
    $customer_id = $_POST['customer_id'];
    foreach ($_POST as $key => $value) {
        if (substr($key, 0, 4) === "pric") {
            $sumAmount += $value;
        }
    }
    $q = "INSERT INTO `orders`(`customer_id`,`amount_spent`)  VALUES ('$customer_id','$sumAmount')";
    mysqli_query($con, $q);
    $inserted = mysqli_insert_id($con);
    $var = 0;
    foreach ($_POST as $key => $value) {
        if (substr($key, -1) == $var) {
            $p = $_POST['product_' . $var];
            $q = $_POST['quantity_' . $var];
            $price = $_POST['product_price_' . $var];
            echo $p,"<br>",$q,"<br>",$price,"<br>";
            $nq = "INSERT INTO `order_items`( `order_id`, `product_id`, `quantity`,`price`) VALUES ('$inserted','$p','$q','$price')";
            $k = mysqli_query($con, $nq);
            $k = mysqli_query($con, "UPDATE `products` SET `quantity` = `quantity`-'$q' WHERE `product_id`='$p' ");

            $var++;
        }
    }
    header('location: displayorder.php');
}
?>
<?php include '../header.php'; ?>
<div class="container">
    <div class="my-4 ">
        <div class="d-flex align-items-center ">
            <h1 class="text-warning text-center"> ORDER DETAILS </h1>
            <button type="button" class="ml-auto btn btn-primary " data-toggle="modal" data-target="#exampleModal">
                <span>&#x2b;</span> &nbsp;Place New order
            </button>
        </div>
    </div>
    <table id="myTable" class="table table-info table-hover ">
        <thead>

            <tr class="bg-dark text-white text-center">

                <th>OrderID</th>
                <th>Customer Name</th>
                <th>Amount Spent</th>
                <th>Date</th>
                <th>Details</th>
                <th>Delete</th>
            </tr>

        </thead>
        <tbody>
            <?php
            include '../conn.php';
            $q = "SELECT orders.amount_spent, customers.name, orders.date,orders.order_id FROM customers  JOIN orders  ON customers.customer_id=orders.customer_id";
            $query = mysqli_query($con, $q);
            $i = 1;
            while ($row = mysqli_fetch_array($query)) {
            ?>
                <tr class="text-center">
                    <td><?php echo $row['order_id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['amount_spent']; ?></td>
                    <td><?php echo date("d M Y", strtotime($row['date'])); ?></td>
                    <td><button class="btn-primary btn"><a href="vieworder.php?order_id=<?php echo $row['order_id'] ?>" class="text-white">View details</a></button></td>
                    <td><button class="btn-danger btn"><a href="deleteorder.php?order_id=<?php echo $row['order_id'] ?>" class="text-white">Delete</a></button></td>
                </tr>
            <?php
                $i++;
            }
            ?>
        </tbody>
    </table>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success text-light">
                <h5 class="modal-title" id="staticBackdropLabel">Place Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="">
                    <label> Customer Name : </label>
                    <select class="custom-select" name="customer_id" class="form-control" id="">
                        <?php
                        include '../conn.php';

                        $q = "select * from customers";
                        $query = mysqli_query($con, $q);
                        while ($row = mysqli_fetch_array($query)) {
                        ?>

                            <option value="<?php echo $row['customer_id']; ?>"><?php echo $row['name']; ?> </option>
                        <?php } ?>
                    </select>
                    <hr>
                    <div class="d-flex justify-content-end mb-2">
                        <button id="button1" type="button" class="ml-auto btn btn-dark"> Add Product</button>
                    </div>
                    <hr>
                    <div class="row ">
                        <div class="col-4 p-2 text-center">Product </div>
                        <div class="col-2 p-2 text-center">Available </div>
                        <div class="col-2 p-2 text-center">Quantity</div>
                        <div class="col-3 p-2 text-center">Price</div>
                    </div>
                    <div class="orders"></div>
                    <div id="div1">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-success" type="submit" name="done"> ADD </button>

                </form>
            </div>
        </div>
    </div>
</div>
<script>
    <?php
    $q = "select * from products";
    $query = mysqli_query($con, $q);
    $arr = [];
    while ($row = mysqli_fetch_array($query)) {
        $a[$row['product_id']] = [$row['price'],$row['quantity'],$row['price']];
    }
    ?>
    var j = <?php echo json_encode($a); ?>;
    var i = 0;

    $(document).ready(function() {
        addrow();
        // changeprice(0);
    });

    function addrow() {
        $('.orders').append(`
                        <div class="row my-2" id="row_${i}">
                        <div class="col-4">
                        <select name="product_${i}" id="select_${i}" class="form-control" onchange="changeprice('${i}')">
                            <?php
                            $q = "select * from products";
                            $query = mysqli_query($con, $q);
                            while ($row = mysqli_fetch_array($query)) { ?>
                                <option type="checkbox" name="check_list_${i}" value="<?php echo $row['product_id']; ?>">
                                    <?php echo $row['name']; ?>
                                </option>
                            <?php }   ?>
                            </select>
                        </div>
                        <div class="col-2">
                            <input readonly id="avail_quantity_${i}"  type="number" class="form-control">
                        </div>
                        <div class="col-2">
                            <input onkeyup="changeprice('${i}')" type="number" value=1 min=1 class="form-control" id="quantity_${i}" name="quantity_${i}" >
                            <input type="hidden" value="" id="product_price_${i}" name="product_price_${i}" >
                        </div>
                        <div class="col-3">
                        <input type="text"  class="form-control" readonly name="price_${i}" id="price_${i}" >
                        </div>
                        ${i === 0 ? "" :`
                        <div class="col-1">
                            <i class="fa fa-times text-danger" onclick="removeproduct('${i}')" style="font-size:30px;cursor:pointer;" aria-hidden="true"></i>
                        </div>`}
                        
                    </div>
        `);
        var amt = j[ $(`#select_${i}`).val() ][0] * $(`#quantity_${i}`).val();
        $(`#price_${i}`).val(amt);
        $(`#avail_quantity_${i}`).val(j[$(`#select_${i}`).val()][1]);
        $(`#product_price_${i}`).val(j[$(`#select_${i}`).val()][2]);
        i++;
    }

    $('#button1').click(function(e) {
        e.preventDefault();
        addrow();
    });

    function removeproduct(i) {
        $(`#row_${i}`).remove();
    }

    function changeprice(i) {
        var amt = j[ $(`#select_${i}`).val() ][0] * $(`#quantity_${i}`).val();
        $(`#price_${i}`).val(amt);
        $(`#avail_quantity_${i}`).val(j[$(`#select_${i}`).val()][1]);
        $(`#product_price_${i}`).val(j[$(`#select_${i}`).val()][2]);
    }
</script>
<?php include '../footer.php' ?>