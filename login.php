<?php

session_start();

$host="localhost";
$user="root";
$password="";
$db="team_10";

$_SESSION['sign_in'] = false;                //for checking if the customer login or not

$data=new mysqli($host,$user,$password,$db);


if($data===false)
{
  die("connection_error");
}

if(isset($_POST['login'])){

  $previous_page = $_POST['p_page'];             //for checking if the customer login or not

  $username=$_POST["username"];
  $password=$_POST["password"];

  $sql="SELECT * FROM user WHERE username='".$username."' AND password='".$password."' ";

  $result=$data -> query($sql);

  while($row = $result -> fetch_array()){

  if($row["usertype"]=="admin")
  {
    $_SESSION['sign_in'] = true;
    $_SESSION['username']=$username;
    $_SESSION['user_id'] = $row["id"];
    header("location:admin_home.php");
  }
 else if($row["usertype"]=="customer")
  {
      $_SESSION['sign_in'] = true;
      $_SESSION['username']=$username;
      $_SESSION['user_id'] = $row['id'];
      header("location:$previous_page");
  }
  else
  {
    echo '<script>alert("Incorrect Username or password!")</script>';
  } 
  } 
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <title>Login</title>

<style>

body{

    background-image: url("background.jpg");
}



h4{
    color:darkblue ;
  letter-spacing: .05em;
  text-shadow: 4px 4px 0px #d5d5d5, 7px 7px 0px rgba(0, 0, 0, 0.2);
}


</style>

  </head>
<!--navbar-->
    <?php include('navBar.php'); ?>
    </nav><br><br><br>
<!--navbar-->

  <body class="bg-default">
      <section class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4><center>User Login</center></h4>
                        </div>
                        <div class="card-body">
                            <form action="#" method="POST">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for=""><b> User name:</b></label>
                                        <input type="text" name="username" required class="form-control" placeholder="Enter user name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                </div>
                                
                                <div class="col-md-12">
                                <div class="form-group">
                                        <label for=""><b>Password:</b> </label>
                                        <input type="password" id="myInput" name="password" required class="form-control" placeholder="**************">
                                        <input type="checkbox" onclick="myFunction()">Show Password
                                      </div>
                                </div>
                                <div class="col-md-12">
                                
                                    <div class="col-md-12 text-center">
                                        <input type="hidden" name="p_page" value="<?php echo $_SERVER['HTTP_REFERER']; ?>">
                                        <button type="submit" name="login" class="btn btn-primary mt-3">Login</button>
                                        
                                    </div>
                                        <br> Don't have an Account?&nbsp;&nbsp;<a href="Register.php">Register Here</a>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section>
      
<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
   


    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    
   <!--footer-->

   <?php include('footer.php'); ?>

<!--footer-->

  </body>
</html>