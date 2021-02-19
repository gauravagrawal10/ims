
<?php include '../header.php'; ?>
 	<div class="container">
    <div class="col-lg-12 mt-4">
    <div class="d-flex align-items-center">
            <h1 class="text-warning text-center"> PRODUCT DETAILS </h1>
            <a href="/ims/product/addproduct.php" class="ml-auto btn btn-primary" style="height:fit-content;">Add product</a>
        </div>
    	<br><table id="myproduct" class="table table-info table-hover ">
            <thead>
    		<tr class="bg-dark text-white text-center">    			
                <th>ID</th> 
    			<th>NAME</th>
                <th>QUANTITY</th>
                <th>PRICE</th> 
                <th>UPDATE</th> 
                <th>DELETE</th> 
            </tr>
</thead>
<tbody>
    <?php 
            include '../conn.php';

            $q = "select * from products";
            $query = mysqli_query($con,$q);
            $i=1;

            while($row = mysqli_fetch_array($query)){    
    ?>

    		<tr class="text-center">
    			<td><?php echo $i ?></td>
    			<td><?php echo $row['name']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td><?php echo $row['price']; ?></td> 
                <td><button class="btn-primary btn"><a href="updateproduct.php?product_id=<?php echo $row['product_id']?>" class="text-white">Update</a></button></td>
                <td><button class="btn-danger btn"><a href="deleteproduct.php?product_id=<?php echo $row['product_id']?>"class="text-white">Delete</a></button></td> 
    		</tr>
        <?php
        $i++;
            }  
        ?>
        </tbody>
    	</table>
    </div>
    </div>

    <?php include '../footer.php'; ?>