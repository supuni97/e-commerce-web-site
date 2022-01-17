<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <title>Product Information</title>
  </head>
  <body>

  <!--navbar-->
  <?php include('navBar.php'); ?>
<!--navbar-->

    <?php require_once 'process4.php'; ?>

    <?php
    
    if(isset($_SESSION['message'])):?>
       
        <div class="alert alert-<?=$_SESSION['msg_type']?>">

        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>

        </div>

        <?php endif?>


    <div class="row justify-content-center mx-3">
    <?php
     $mysqli=new mysqli('localhost','root','','team_10') or die(mysqli_error($mysqli));
     $result=$mysqli->query("SELECT * FROM product_list") or die($mysqli->error);
     
    ?>

    <?php
     function pre_r($array){
         echo '<pre>';
             print_r($array);
             echo '</pre>';
     }
    ?>

      <div class="row justify-content-center my-5 mx-3">
      <form action="process4.php" method="POST">
          <h1>Product Infomation</h1>
          <input type="hidden" name="product_id" 
          value="<?php echo $product_id;?>">
          <div class="form-group my-3">
        <label>Product ID:</label>
        <input type="text" name="product_id" 
        value="<?php echo $product_id; ?>" class="form-control">
        </div>
        <div class="form-group my-3">
        <label>Product Name:</label>
        <input type="text" name="product_name" 
        value="<?php echo $product_name; ?>" class="form-control">
        </div>
        <div class="form-group">
        <label>Product Type:</label>
        <input type="text" name="product_type" 
        value="<?php echo $product_type; ?>" class="form-control">
        </div>
        <div class="form-group">
        <label>Price (Rs.):</label>
        <input type="text" name="price" 
        value="<?php echo $price; ?>" class="form-control"><br>
        </div>
        <div class="form-group">
        <label>Description:</label>
        <input type="text" name="description" 
        value="<?php echo $description; ?>" class="form-control"><br>
        </div><div class="form-group">
        <label>Quantity:</label>
        <input type="text" name="quantity" 
        value="<?php echo $quantity; ?>" class="form-control"><br>
        </div><div class="form-group">

        
        <div class="form-group">
            <?php 
            if($update==true):
            ?>
            <button type="submit" class="btn btn-info" name="update">Update</button>
            <?php else:  ?>
        <button type="submit" name="save" class="btn btn-primary">Save</button>
    <?php endif; ?>
    <button type="button" class="btn btn-success" onclick="document.location='admin_home.php'">Back</button>    
    </div>
    </form>
    </div>

    <table class="table">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Type</th>
                    <th>Product Name</th>
                    <th>Price (Rs.)</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <?php
            while($row=$result->fetch_assoc()):?>
            <tr>
                <td><?php echo $row['product_id']?></td>
                <td><?php echo $row['product_type']?></td>
                <td><?php echo $row['product_name']?></td>
                <td><?php echo $row['price']?></td>
                <td><?php echo $row['description']?></td>
                <td><?php echo $row['quantity']?></td>
               
                <td>
                    <a href="index4.php?edit=<?php echo $row['product_id']?>"
                    class="btn btn-primary" >Edit</a>
                    <a href="process4.php?delete=<?php echo $row['product_id']?>"
                    class="btn btn-danger" >Delete</a>
                </td>
            </tr>

            <?php endwhile; ?>
           
        </table>
    </div>

   <!--footer-->
    <?php include('footer.php'); ?>
<!--footer-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    
  </body>
</html>