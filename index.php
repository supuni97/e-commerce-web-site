<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <title>User Information</title>
  </head>
  <body>

  <!--navbar-->
  <?php include('navBar.php'); ?>
<!--navbar-->

    <?php require_once 'process.php'; ?>

    <?php
    
    if(isset($_SESSION['message'])):?>
       
        <div class="alert alert-<?=$_SESSION['msg_type']?>">

        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>

        </div>

        <?php endif?>
        <div class="row justify-content-center my-5 mx-3">
      <form action="process.php" method="POST">
          <h1>User Infomation</h1>
          <input type="hidden" name="id" value="<?php echo $id;?>">
        <div class="form-group my-3">
        <label>Name:</label>
        <input type="text" name="username" 
        value="<?php echo $username; ?>" class="form-control">
        </div>
        <div class="form-group">
        <label>Email Address:</label>
        <input type="text" name="email" 
        value="<?php echo $email; ?>" class="form-control">
        </div>
        <div class="form-group">
        <label>Password:</label>
        <input type="text" name="password" 
        value="<?php echo $password; ?>" class="form-control">
        </div>
        <div class="form-group">
        <label>User Type:</label>
        <input type="text" name="usertype" 
        value="<?php echo $usertype; ?>" class="form-control"><br>
        </div>
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


    <div class="row justify-content-center mx-3">
    <?php
     $mysqli=new mysqli('localhost','root','','team_10') or die(mysqli_error($mysqli));
     $result=$mysqli->query("SELECT * FROM user") or die($mysqli->error);
     
    ?>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>User type</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <?php
            while($row=$result->fetch_assoc()):?>
            <tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['username']?></td>
                <td><?php echo $row['email']?></td>
                <td><?php echo $row['password']?></td>
                <td><?php echo $row['usertype']?></td>
                <td>
                    <a href="index.php?edit=<?php echo $row['id']?>"
                    class="btn btn-primary" >Edit</a>
                    <a href="process.php?delete=<?php echo $row['id']?>"
                    class="btn btn-danger" >Delete</a>
                </td>
            </tr>

            <?php endwhile; ?>
           
        </table>
    </div>

    <?php
     function pre_r($array){
         echo '<pre>';
             print_r($array);
             echo '</pre>';
     }
    ?>

     
   <!--footer-->
    <?php include('footer.php'); ?>
<!--footer-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    
  </body>
</html>