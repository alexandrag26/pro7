<?php

	include 'conn.php';

	// Check connection
	if (!$db) {
		die("Conexion fallida: " . mysqli_connect_error());
	}
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$mail = $_POST['mail'];
	
	// Query to check if the user already exist
	$checkEmail = "SELECT * FROM users WHERE user = '$user' ";

	// Variable $result hold the connection data and the query
	$result =mysqli_query($db, $checkEmail);

	// Variable $count hold the result of the query
	$count = mysqli_num_rows($result);

	// If count == 1 that means the user is already on the database
	if ($count == 1) {
	echo("EXISTS");
	} else {	
	
	/*
	If the user don't exist, the data from the form is sended to the
	database and the account is created
	*/
	
	// Query to send User, Email and Password hash to the database
	$query = "INSERT INTO users (user, mail, pass) VALUES ('$user', '$mail', MD5('$pass'))";

	if (!mysqli_query($db, $query)) {
		echo("QUERY ERROR");		
		}
	}	
	mysqli_close($db);