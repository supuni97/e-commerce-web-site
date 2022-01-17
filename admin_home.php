<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="admin.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">

</head>
<body>

<!--navbar-->
<?php include('navBar.php'); ?>
<!--navbar-->

<!-- Header -->
<header class="bg-primary text-center py-5 mb-4">
  <div class="container">
    <h1 class="fw-light text-white">Welcome Admin</h1>
  <h3>Admin Home Page</h3>
  </div>
</header>

<!-- Page Content -->
<div class="container">
  <div class="row">
   
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-0 shadow">
      <a href="index.php"> <img src="userimage.jpg" class="card-img-top" alt="..." height="220px"></a>
        <div class="card-body text-center">
          <h5 class="card-title mb-0">Users</h5>
          <div class="card-text text-black-50">Visit Here To View User Information</div>
        </div>
      </div>
    </div>
   
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-0 shadow">
      <a href="index2.php"><img src="customerimage.jpg" class="card-img-top" alt="..." height="220px"></a>
        <div class="card-body text-center">
          <h5 class="card-title mb-0">Customers</h5>
          <div class="card-text text-black-50">Visit Here To Customer Information</div>
        </div>
      </div>
    </div>
   
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-0 shadow">
      <a href="index4.php"><img src="productimage.jfif" class="card-img-top" alt="..." height="220px"></a>
        <div class="card-body text-center">
          <h5 class="card-title mb-0">Products</h5>
          <div class="card-text text-black-50">Visit Here To View Product Information</div>
        </div>
      </div>
    </div>
   
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-0 shadow">
      <a href="index3.php"><img src="salesimage.jpg" class="card-img-top" alt="..." height="220px"></a>
        <div class="card-body text-center">
          <h5 class="card-title mb-0">Sales</h5>
          <div class="card-text text-black-50">Visit Here To View Sales Information</div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

<!--navbar-->
<?php include('footer.php'); ?>
<!--navbar-->

</body>
</html>