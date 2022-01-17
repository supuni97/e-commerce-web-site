<?php

session_start();

$mysqli=new mysqli('localhost','root','','team_10') or die(mysqli_error($mysqli));

$update=false;
$name='';
$email='';
$password='';
$id=0;
$city='';
$address='';
$phone='';
$postal='';
$note='';


if(isset($_POST['save'])){
    
    $name=$_POST['name'];
    $password=$_POST['password'];
    $city=$_POST['city'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    $postal=$_POST['postal'];
    $note=$_POST['note'];

    $_SESSION['message']="Record has been saved!";
    $_SESSION['msg_type']="success";

    header("location:index2.php");

    $mysqli->query("INSERT INTO `customer` (`name`, `email`, `password`, `city`, `address`, `phone`, `postal`, `note`) VALUES ( '$name', '$email', '$password', '$city', '$address', '$phone', '$postal', '$note')");


}

if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $mysqli->query("DELETE FROM customer WHERE id=$id");

    $_SESSION['message']="Record has been deleted!";
    $_SESSION['msg_type']="danger";
}

if(isset($_GET['edit'])){

    $id=$_GET['edit'];
    $update=true;

    $result= $mysqli->query("SELECT * FROM customer WHERE id=$id");
        $row=$result->fetch_array();
       
        $name=$row['name'];
        $email=$row['email'];
        $password=$row['password'];
        $city=$row['city'];
        $address=$row['address'];
        $phone=$row['phone'];
        $postal=$row['postal'];
        $note=$row['note'];
        

}

if(isset($_POST['update'])){

    $id=$_POST['id'];
    $name=$_POST['name'];
    $password=$_POST['password'];
    $city=$_POST['city'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    $postal=$_POST['postal'];
    $note=$_POST['note'];



    $mysqli->query("UPDATE `customer` SET `name`='$name',`email`='$email',`password`='$password',`city`='$city',`address`='$address',`phone`='$phone',`postal`='$postal',`note`='$note' WHERE id='$id'");

    $_SESSION['message']="Record has been updated!";
    $_SESSION['msg_type']="warning";

    header('location:index2.php');
        

}



?>