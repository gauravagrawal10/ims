<!DOCTYPE html>
<html>

<head>
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: "Raleway", sans-serif;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link active" href="/ims/customer/displaycustomer.php"> <i class="fa fa-user-circle" aria-hidden="true"></i> CUSTOMERS </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-archive" aria-hidden="true"></i> PRODUCTS
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/ims/product/displayproduct.php">All Products</a>
            <a class="dropdown-item" href="/ims/product/renewproduct.php">Renew Stocks </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="/ims/orders/displayorder.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ORDERS </a>
        </li>
      </ul>
      <a class="navbar-brand ml-auto" href="/ims/index.php">
        IMS
        <!-- <img class="rounded" src="/ims/logo.jpeg" width="60" alt=""> -->
      </a>
    </div>
  </nav>