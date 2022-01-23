<?php

	session_start();
	if($_SESSION['name'] ==""){
		header("Location: ../login.php");
	}

	include('connection.php');

	mysqli_query($connection, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
	mysqli_query($connection, "SET CHARACTER SET 'utf8'");

if (isset($_POST['dob'])){
	$price = (int)$_POST['price'];
	$name = $_POST['name'];
	$img = $_POST['img'];
	$sql = mysqli_query($connection, "INSERT INTO `cards` VALUES ( NULL, '$name', '$price', '$img')");
	if ($sql == true){
    	echo "<b>Информация занесена в базу данных</b>";
    	        // sleep(3);
        header("Location: ../admintools.php");

    }else{
    	echo "<b>Не удалось занести в базу данных</b>";
    }
}
if (isset($_POST['delete'])){
	$id = $_POST['id'];
	$sql = "DELETE FROM `cards` WHERE `id`= '$id'";
	$resul = mysqli_query($connection, $sql) or die("Ошибка " . mysqli_error($connection));
	header("Location: ../admintools.php");
}