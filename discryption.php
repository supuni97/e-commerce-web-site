    
    <?php 

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'team_10';

    session_start();

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        $id = $_SESSION['id'];
    }

    $table_name = $_SESSION['table'];
    $_SESSION['id'] = $id;                //Create a session variable for storing product id

    $link = new MySQLi($host, $user, $password, $db);
    $sql = "SELECT src FROM img_src WHERE id = '".$id."'";
    $sql1 = "SELECT description, price, name FROM $table_name WHERE product_id = '".$id."'";

    $result = $link -> query($sql);
    $result1 = $link -> query($sql1);

    if (isset($_POST['submit'])) { 

        if (isset($_SESSION['sign_in'])) {
            if ($_SESSION['sign_in']) {

                $user_name = $_SESSION['username'];
                $product_id = $_SESSION['id'];
                $user_id = $_SESSION['user_id'];
                $product_name = $_SESSION['product_name'];
                $product_price = $_SESSION['price'];
                $src = $_SESSION['src'];

                $sql2 = "INSERT INTO cart_details VALUES ('".$product_id."','".$user_id."', '".$user_name."' , '".$product_name."', '".$product_price."', '".$src."','".$table_name."', 1)";
                $result2 = $link -> query($sql2);
                if ($result2) {
                    header('location:cart.php');
                }else{
                    header('location:home.php');
                }

            }else {
                header('location:login.php');
            }
            }else{
                header('location:login.php');
            }
    }

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include('navBar.php'); ?>
    <br><br><br>
    <?php 
        include('categories.php');?>
            <div class="col-lg-9">
            <div class="row">

        <?php while ($row = $result->fetch_array()) { 
            $_SESSION['src'] = $row['src'];

         ?>
                <div class="col-6">
                    <img src="<?php echo $row['src']; ?>" width=100%>
                </div>
               
        <?php  } 


             while($row1 = $result1->fetch_array()) {
        ?>

            <div class="row" style="width: 120%;">
            <h3 style="color: rgb(72, 149, 239);"><?php

            $_SESSION['product_name'] = $row1['name'];        // to get this product name to store
             echo $row1['name']; 

            ?></h3>
            <h2 style="color: red;">
                <span>LKR.</span>
                <span>
                    <?php 

                        $_SESSION['price'] = $row1['price'];
                        echo $row1['price'] 

                    ?>
                </span>
            </h2>
            <div class="mb-4">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                    <input type="submit" name="submit" value="Add to Cart" class="btn btn-primary">
                </form>
            </div>
            <div class="shadow p-3 mb-5 bg-white rounded">
                <pre>
                <h6><?php echo $row1['description']; ?></h6>
            </pre>
            </div>
        </div>
        </div>

    <?php } ?>
    </div>
    </div>
</div>
</div>

    <?php include('footer.php') ?>
</body>
</html>