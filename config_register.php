
<?php

if(isset($_POST['email'])){

    $email=$_POST['email'];
$subject="Welcome From Climatrix!";
$body="Thank you for registration";
$headers="From:testmailsupuni123@gmail.com";

if(mail($email,$subject,$body,$headers)){

    echo "Email sent to $email";
}else{

    echo "Email sending failed";

}

}else{

    echo "please give email";

}


?>


<?php

session_start();
$conn=mysqli_connect("localhost","root","","team_10");

if(isset($_POST['register_btn']))
{
    $username=$_POST['user_name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirm_password=$_POST['confirm_password'];

    if($password == $confirm_password)
    {
     $query="INSERT INTO user (username,email,password) VALUES ('$username','$email','$password')";
     $query_run=mysqli_query($conn,$query);

     if($query_run)
     {
       $_SESSION['status']= "Registration successful.We sent you an email.";
        header("Location:register.php");
     }
     else
     {
        $_SESSION['status']=  "Registration FAILED.";
        header("Location:register.php");
     }
    }
    else
    {
        $_SESSION['status']=  "password not matched";
        header("Location:register.php");
    }

}

?>