<?php

session_start();

$mysqli=new mysqli('localhost','root','','team_10') or die(mysqli_error($mysqli));

$update=false;
$product_name='';
$product_type='';
$price='';
$description='';
$quantity='';
$product_id=0;



if(isset($_POST['save'])){
    
    $product_name=$_POST['product_name'];
    $product_type=$_POST['product_type'];
    $price=$_POST['price'];
    $description=$_POST['description'];
$quantity=$_POST['quantity'];

    $_SESSION['message']="Record has been saved!";
    $_SESSION['msg_type']="success";

    header("location:index4.php");

    $mysqli->query("INSERT INTO `product_list`('product_id',`product_type`, `product_name`, `price`, `description`, `quanitty`) VALUES ('$product_id','$product_type','$product_name','$price','$description','$quantity')");

}

if(isset($_GET['delete'])){
    $product_id=$_GET['delete'];
    $mysqli->query("DELETE FROM product_list WHERE product_id=$product_id");

    $_SESSION['message']="Record has been deleted!";
    $_SESSION['msg_type']="danger";
}

if(isset($_GET['edit'])){

    $product_id=$_GET['edit'];
    $update=true;

    $result= $mysqli->query("SELECT * FROM product_list WHERE product_id='$product_id'");
        $row=$result->fetch_array();
       
        $product_name=$row['product_name'];
        $product_type=$row['product_type'];
        $price=$row['price'];
        $description=$row['description'];
        $quantity=$row['quantity'];
}

if(isset($_POST['update'])){

    $product_id=$_POST['product_id'];
   $product_name=$_POST['product_name'];
   $product_type=$_POST['product_type'];
   $price=$_POST['price'];
   $decription=$_POST['description'];
   $quantity=$_POST['quantity'];

    $mysqli->query("UPDATE `product_list` SET 'product_id'='$product_id',`product_type`='$product_type',`product_name`='$product_name',`price`='$price',`description`='$decription',`quantity`='$quantity' WHERE product_id='$product_id' ");

    $_SESSION['message']="Record has been updated!";
    $_SESSION['msg_type']="warning";

    header('location:index4.php');
        

}



?>