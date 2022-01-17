<?php

session_start();

$mysqli=new mysqli('localhost','root','','team_10') or die(mysqli_error($mysqli));

$update=false;
$username='';
$email='';
$password='';
$id=0;
$usertype='';


if(isset($_POST['save'])){
    
    $username=$_POST['username'];
    $password=$_POST['password'];
    $usertype=$_POST['usertype'];
    $email=$_POST['email'];

    $_SESSION['message']="Record has been saved!";
    $_SESSION['msg_type']="success";

    header("location:index.php");

    $mysqli->query("INSERT INTO `user`(`username`, `password`, `usertype`, `email`) VALUES ('$username','$password','$usertype','$email')");


}

if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $mysqli->query("DELETE FROM user WHERE id=$id");

    $_SESSION['message']="Record has been deleted!";
    $_SESSION['msg_type']="danger";
}

if(isset($_GET['edit'])){

    $id=$_GET['edit'];
    $update=true;

    $result= $mysqli->query("SELECT * FROM user WHERE id=$id");
        $row=$result->fetch_array();
        $username=$row['username'];
        $email=$row['email'];
        $password=$row['password'];
        $usertype=$row['usertype'];

        

}

if(isset($_POST['update'])){

    $id=$_POST['id'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $usertype=$_POST['usertype'];
    $email=$_POST['email'];


    $mysqli->query("UPDATE user SET username='$username',password='$password',email='$email',usertype='$usertype'  WHERE id=$id");

    $_SESSION['message']="Record has been updated!";
    $_SESSION['msg_type']="warning";

    header('location:index.php');
        

}



?>