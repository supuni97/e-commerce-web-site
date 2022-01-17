<?php

	$id = $_GET['id'];
	session_start();

	$_SESSION['id'] = $id;

	if ($id == 'cc1') {
		$_SESSION['table'] = 'computer_casing';
	}else if ($id == 'g5') {
		$_SESSION['table'] = 'graphic_cards';
	}else if ($id == 'mb4') {
		$_SESSION['table'] = 'mother_board';
	}else if ($id == 'r5') {
		$_SESSION['table'] = 'ram';
	}


 ?>

 <?php header("location: discryption.php"); ?>
