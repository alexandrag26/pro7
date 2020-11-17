<?php
/*session_start();
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mercado ProVII</title>
	<!--JQUERY MOBILE-->
	<link rel="stylesheet" href="themes/mercado3.min.css" />
	<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
	<link rel="stylesheet" href="themes/jquery.mobile.structure-1.4.5.min.css" />
	<script src="jquery-1.11.1.min.js"></script>
	<script src="jquery.mobile-1.4.5.min.js"></script>
	<!--CSS-->
	<link rel="stylesheet" href="css/fontello.css">
</head>
	<body>
		<!-- Cabecera -->
		<div data-role="header">
			<h1>Mercado ProVII</h1>
			<a href="logout.php"><i class="icon-logout">Cerrar Sesion</i></a>
			<nav data-role="navbar">
				<ul>
					<li><a href="profile.php"><i class="icon-user">Perfil</i></a></li>
				</ul>
			</nav>
		</div>
		<div class="container">

			<?php
			// Connection info. file
			include 'conn.php';	
			
			// Connection variables
			$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

			// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			
			// datos enviados desde el formulario login.html 
			$email = $_POST['email']; 
			$password = $_POST['password'];
			
			// Consulta enviada a la base de datos.
			$result = mysqli_query($conn, "SELECT Email, Password, Name FROM users WHERE Email = '$email'");
			
			// Variable $row mantiene el resultado de la consulta.
			$row = mysqli_fetch_assoc($result);
			
			// Variable $row mantiene el resultado de la consulta.
			$hash = $row['Password'];
			
			if (password_verify($_POST['password'], $hash)) {	
				
				$_SESSION['loggedin'] = true;
				$_SESSION['name'] = $row['Name'];
				$_SESSION['start'] = time();
				$_SESSION['expire'] = $_SESSION['start'] + (10 * 60) ;						
				
				echo "<center><div class='alert alert-success mt-4' role='alert'><strong>Bienvenido!</strong> $row[Name]</div></center>";	
			
			} else {
				echo "<center><div class='alert alert-danger mt-4' role='alert'>Email ó Contraseña estan incorrectas!
				<p><a href='login.html'><strong>Please try again!</strong></a></p></div></center>";			
			}
*/	

include("conn.php");
session_start();

$user = $_POST['user'];
$pass = $_POST['pass'];

$sql = "SELECT id, user FROM users WHERE user= '$user' AND pass = MD5('$pass')";
$result = mysqli_query($db, $sql);

$count = mysqli_num_rows($result);

if($count == 1){
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	echo(json_encode(array($row, "FOUND")));
} else{
	echo("noFOUND");
}
			?>