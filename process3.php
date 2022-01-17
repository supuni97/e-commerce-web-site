<?php

session_start();

$mysqli=new mysqli('localhost','root','','team_10') or die(mysqli_error($mysqli));

$update=false;
$customer_id='';
$date_of_sale='';
$item_list='';
$id=0;
$amount='';


if(isset($_POST['save'])){
    
    $customer_id=$_POST['customer_id'];
    $date_of_sale=$_POST['date_of_sale'];
    $item_list=$_POST['item_list'];
    $amount=$_POST['amount'];

    $_SESSION['message']="Record has been saved!";
    $_SESSION['msg_type']="success";

    header("location:index3.php");

    $mysqli->query("INSERT INTO `sales_daily` (`date_of_sale`, `amount`, `item_list`,`customer_id`) VALUES ( '$date_of_sale', '$amount', '$item_list', '$customer_id')");


}

if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $mysqli->query("DELETE FROM sales_daily WHERE id=$id");

    $_SESSION['message']="Record has been deleted!";
    $_SESSION['msg_type']="danger";
}

if(isset($_GET['edit'])){

    $id=$_GET['edit'];
    $update=true;

    $result= $mysqli->query("SELECT * FROM sales_daily WHERE id=$id");
        $row=$result->fetch_array();
       
        $customer_id=$row['customer_id'];
        $date_of_sale=$row['date_of_sale'];
        $amount=$row['amount'];
        $item_list=$row['item_list'];

        

}

if(isset($_POST['update'])){

    $id=$_POST['id'];
    $customer_id=$_POST['customer_id'];
    $amount=$_POST['amount'];
    $date_of_sale=$_POST['date_of_sale'];
    $item_list=$_POST['item_list'];
    



    $mysqli->query("UPDATE `sales_daily` SET `date_of_sale`='$date_of_sale',`amount`='$amount',`item_list`='$item_list',`customer_id`='$customer_id' WHERE id='$id'");

    $_SESSION['message']="Record has been updated!";
    $_SESSION['msg_type']="warning";

    header('location:index3.php');
        

}



?>