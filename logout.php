<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css">
    
    <link rel="stylesheet" href="style.css">

</head>
<body style="background-color: rgba(0, 0, 0,0.8);">
	<?php 

	$alert_message='';
	$theme="";

	session_start();

	if (isset($_SESSION['sign_in'])) {
		if ($_SESSION['sign_in']) {
			session_unset();
			session_destroy();

			$alert_message = 'You have Successfully Logged Out!';
			$theme="alert-primary";
		}else{
			$alert_message = "You haven't Logged yet!";
		}
	}else{
		$alert_message = "You haven't Logged yet!";
	}

 ?>

 	<div style="width: 100%;height: 100vh;">
 		<div style="width: 60%;height: 50vh; margin: 25vh auto;">
 			 <div class="shadow p-3 mb-5 bg-body rounded" role="alert" style="height: 100%; position: relative;">
 			 	<div style="position:absolute; top: 45%; left: 26%;">
 			 		<h2><?php echo $alert_message ?></h2>
 			 	</div>
 			 	<div style="position:absolute; bottom: 5%;right: 5%;">
 			 		<a href="home.php"><button class="btn btn-primary" >Go to Home</button></a>
 			 	</div>
			</div>
 		</div>
 	</div>




</body>