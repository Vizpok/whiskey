<?php
// Start the session
ini_set('display_erros', 1);
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		* {
			box-sizing: border-box;
		}

		body {
			margin: 0;
		}

		/* Style the header */
		.header {
			background-color: #f1f1f1;
			padding: 20px;
			text-align: center;
		}

		/* Estilo de barra */
		.topnav {
			overflow: hidden;
			background-color: #120727;
			display: flex;
			justify-content: space-between;
			align-items: center;
		}

		/* Style the topnav links */
		.topnav-left {
			display: flex;
			justify-content: flex-start;
			align-items: center;
		}

		.topnav-right {
			display: flex;
		}

		.topnav-center {
			flex-grow: 1;
			display: flex;
			justify-content: center;
		}

		.topnav a {
			color: #f2f2f2;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		/* Color de Link de barra*/
		.topnav a:hover {
			background-color: #6924A5;
			color: white;
		}

		.container {
			display: flex;
		}

		.sidebar {
			width: 10%;
			background-color: #f1f1f1;
			overflow: auto;
			height: 75vh; /* Establecer la altura en 100% del viewport height */
			display: flex;
			flex-direction: column;
		}

		.content {
			width: 90%;
			margin-right: 25%;
			padding: 1px 16px;
			height: 100%;
			margin: 20px;
		}

		ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
			background-color: #f1f1f1;
		}

		li a {
			display: block;
			color: #000;
			padding: 8px 16px;
			text-decoration: none;
		}

		li a.active {
			background-color: #04AA6D;
			color: white;
		}

		li a:hover:not(.active) {
			background-color: #555;
			color: white;
		}

		.sidebar-bottom {
			margin-top: auto;
		}

		.sidebar-bottom li a {
			display: block;
			color: #000;
			padding: 8px 16px;
			text-decoration: none;
		}

		.sidebar-bottom li a:hover {
			background-color: #FF003E;
			color: white;
		}

		.sidebar-bottom li a.active {
			background-color: #04AA6D;
			color: white;
		}
		.button {
			background-color: #6196FF; /* Green */
			border: none;
			color: white;
			padding: 10px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			cursor: pointer;
			border-radius: 6px;
		}
	</style>
</head>
<body>
	<div class="header">
		<h1>Header</h1>
	</div>
	<div class='topnav'>
		<div class='topnav-left'>
			<a href=''>Cuenta</a>
		</div>
		<div class='topnav-center'>
			<a href='http://localhost/whiskey/menuPage.php'>Inicio</a>
			<a href='#'>Pista</a>
			<a href='#'>Leaderboard</a>
			<a href='#'>News</a>
		</div>
		<div class='topnav-right'>
			<!-- Agrega aquí cualquier contenido adicional en la parte derecha de la barra de navegación -->
		</div>
	</div>
	<div class="container">
		<div class="sidebar">
			<ul>
				<li><a class="active" href="#home" id='perfil'>Perfil</a></li>
				<li><a href="#news" id='publicaciones'>Publicaciones</a></li>
			</ul>
			<ul class="sidebar-bottom">
				<li><a href='#' id='cerrar-cuenta'>Cerrar Sesion</a></li>
			</ul>
		</div>
		<form id='cerrar-cuenta-form' action='http://localhost/whiskey/Sesion/borrar_sesion.php' method='POST' style='display: none;'></form>
		<div id="content-perfil" class="content" style="display: none;">
			<center>
				<?php
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "respaldo";

				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}

				$sql = "SELECT id, usuario, apodo FROM sesion";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						if($_SESSION['usuario'] == $row['usuario']){
							$nomUsuario = $row['usuario'];
							$apodo = $row['apodo'];
							goto end;
						}
					}
					end:
				} else {
					echo "0 results";
				}

				echo "<!-- Lugar del primer div -->
				<form>
					<label for='fname'> Usuario:</label>
					<input type='text' id='fname'value='$nomUsuario' disabled>
				</form>
				<form method='POST'>
					<label for='apodo'>Apodo:</label>
					<input type='text'id='apodo' name='apodo' value='$apodo'>
					<input class='button' type='submit' value='Cambiar Apodo'><br>
				</form>
			</center>
		</div>";
		
		if(isset($_POST['apodo'])){
			$sqlupd = "UPDATE sesion SET apodo = '".$_POST['apodo']."' WHERE usuario = '$nomUsuario'";
			if ($conn->query($sqlupd) === TRUE) {
				echo "<meta http-equiv='refresh' content='0; url= http://localhost/whiskey/cuentaPage.php'>";
			}
		}
		$conn->close();
		?>
		<div id="content-publicaciones" class="content" style="display: none;">
			<h2>Lo logro? lo logro!! Lo logree</h2>
		</div>
		<script>
			document.getElementById('cerrar-cuenta').addEventListener('click', function(event) {
				event.preventDefault();
				document.getElementById('cerrar-cuenta-form').submit();
			});

			document.getElementById('perfil').addEventListener('click', function(event) {
				event.preventDefault();

				document.getElementById('content-perfil').style.display = 'block';
				document.getElementById('content-publicaciones').style.display = 'none';
			});

			document.getElementById('publicaciones').addEventListener('click', function(event) {
				event.preventDefault();

				document.getElementById('content-perfil').style.display = 'none';
				document.getElementById('content-publicaciones').style.display = 'block';
			});

			document.addEventListener('DOMContentLoaded', function() {

				document.getElementById('content-perfil').style.display = 'block';
				document.getElementById('content-publicaciones').style.display = 'none';
			});
		</script>
	</div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<style>
		/* Estilos para el formulario */
		form {
			max-width: 300px;
			margin: 0 auto;
		}
		/* Estilos para los campos de entrada */
		input[type="text"] {
			width: 100%;
			padding: 10px;
			margin-bottom: 10px;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}

		/* Estilos para los campos de entrada deshabilitados */
		input[type="text"][disabled] {
			background-color: #f1f1f1;
			cursor: not-allowed;
		}
	</style>
</head>
<body>
</body>
</html>
