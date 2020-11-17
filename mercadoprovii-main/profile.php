	<?php
session_start();
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
    <?php
    if (isset($_SESSION['loggedin'])) {  
    }
    else {
        echo "<div class='alert alert-danger mt-4' role='alert'>
        <h4>Necesitas ir a logearte para ingresar a esta pagina.</h4>
        <p><a href='login.html'>Login aqui!</a></p></div>";
        exit;
    }
    // chequea el tiempo now when check-login.php page starts
    $now = time();           
    if ($now > $_SESSION['expire']) {
        session_destroy();
        echo "<div class='alert alert-danger mt-4' role='alert'>
        <h4>Tu sesion ha expirado!</h4>
        <p><a href='login.html'>Login aqui</a></p></div>";
        exit;
        }
	?>
	
    <!-- Seccion de Home -->
    <div data-role="page" id="home">
		<!-- Cabecera -->
	    <div data-role="header">
			<h1>Mercado ProVII</h1>
			<a href="logout.php"><i class="icon-logout">Cerrar Sesion</i></a>
			<!-- Pagina Principal -->

        </div>
            <div data-role="collapsible-set" data-theme="b" data-content-theme="b">
				<h3>Formulario de contactos</h3>
				<form id="#" action="#" method="#">
					<input type="submit" value="Crear producto nuevo">
					<input type="submit" value="Buscar codigo de barra">
				</form>
			</div>

			<!--Footer-->

			<div data-role="footer" data-position="fixed" style="text-align:center;">
					<nav data-role="navbar">
				<ul>
					<li><a href="#home"><i class="icon-home">Home</i></a></li>
					<li><a href="#productos"><i class="icon-basket">Productos</i></a></li>
				</ul>
			</nav>
            	2020 &copy; Universidad Nueva Esparta
            	<a style="font-size: 10.5px;" href="https://github.com/pro7une">
                	<i class="icon-github-circled"></i> Github
            	</a>
        	</div>
		</div>
	</div>

	<!-- Seccion de Productos -->
    <div data-role="page" id="productos">
		<!-- Cabecera -->
		<div data-role="header">
			<h1>Mercado ProVII</h1>
			<a href="logout.php"><i class="icon-logout">Cerrar Sesion</i></a>
			<!-- Pagina Principal -->

		</div>

		<div data-role="content">
			<ul data-role="listview" data-inset="true" data-theme="d" data-divider-theme="d"
			data-count-theme="b" data-filter="true" data-filter-placeholder="">
				<li data-role="list-divider">Nuestros Productos</li>
				<li data-icon="gear">
					<a href="#">
					</a>
				</li>
				<li data-icon="gear">
				</li>
			</ul>
		</div>

		<!-- Footer  -->

		<div data-role="footer" data-position="fixed" style="text-align:center;">
		<nav data-role="navbar">
				<ul>
					<li><a href="#home"><i class="icon-home">Home</i></a></li>
					<li><a href="#productos"><i class="icon-basket">Productos</i></a></li>
				</ul>
			</nav>
            2020 &copy; Universidad Nueva Esparta
            <a style="font-size: 10.5px;" href="https://github.com/pro7une">
                <i class="icon-github-circled"></i> Github
            </a>
        </div>
	</div>
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

	</body>
</html>