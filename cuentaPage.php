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
		<?php include("conf/cuenta.css");?>
	</style>
</head>
<body>
	<div class="header">
		<h1>High Gaming</h1>
	</div>
	<div class='topnav'>
		<div class='topnav-left'>
			<a href=''>Cuenta</a>
		</div>
		<div class='topnav-center'>
			<a href='http://10.114.1.119/whiskey/menuPage.php'>Inicio</a>
			<a href='http://10.114.1.119/whiskey/publicarPage.php'>Publicar</a>
			<a href='http://10.114.1.119/whiskey/buscarPage.php'>Buscar</a>
		</div>
		<div class='topnav-right'>
			<!-- Agrega aquí cualquier contenido adicional en la parte derecha de la barra de navegación -->
		</div>
	</div>
	<div class="container">
		<div class="sidebar">
    <ul>
      <li><a id="perfilLink" class="active" href="#perfil" onclick="activateLink('perfilLink')">Perfil</a></li>
      <li><a id="publicacionesLink" href="#publicaciones" onclick="activateLink('publicacionesLink')">Publicaciones</a></li>
    </ul>
			<ul class="sidebar-bottom">
				<li><a class='decor' href='#' id='cerrar-cuenta'>Cerrar Sesion</a></li>
			</ul>
		</div>
		<form id='cerrar-cuenta-form' action='http://10.114.1.119/whiskey/Sesion/borrar_sesion.php' method='POST' style='display: none;'></form>
		<div id="content-perfilLink" class="content" style="display: none;">
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
				<br>
				<form action= 'http://10.114.1.119/whiskey/Sesion/whconf/act_password.php'>
					<input class='button' type='submit' value='Cambiar Contraseña'><br>
				</form>

				<form id='deleteForm' action='http://10.114.1.119/whiskey/Sesion/whconf/borrarCuenta.php'>
					<input class='buttonDelete' type='submit' name='ejecutar' value='Borrar Usuario'><br>
				  </form>
				
			</center>
		</div>";
				} else {
					echo "0 results";
				}
				
		
		if(isset($_POST['apodo'])){
			$sqlupd = "UPDATE sesion SET apodo = '".$_POST['apodo']."' WHERE usuario = '$nomUsuario'";
			if ($conn->query($sqlupd) === TRUE) {
				echo "<meta http-equiv='refresh' content='0; url= http://10.114.1.119/whiskey/cuentaPage.php'>";
			}
		}
		$conn->close();
		?>
		<div id="content-publicacionesLink" class="content" style="display: none;">
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

$sql = "SELECT idp, id, titulo, publicacion, fecha FROM publicaciones  ORDER BY fecha DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    
    if($row["id"] == $_SESSION["id"]){

	$fecha = $row["fecha"];
      $formato = "d-m-Y";
      $fecha_dt = DateTime::createFromFormat($formato, $fecha);

      $dia = $fecha_dt->format('d');
      $mes = $fecha_dt->format('F');
      $año = $fecha_dt->format('Y');

    echo "<div class='card'>
  <div class='date-time-container'>
    <time class='date-time' datetime='".$row["fecha"]."'>
      <span>".$año."</span>
      <span class='separator'></span>
      <span>".$mes." &nbsp; ".$dia."</span>
    </time>
  </div>
  <div class='content2'>
  
    <div class='infos'>
      <a href='#'>
        <label class='title'>
         ".$row["titulo"]."
        </label>
      </a>

      <p class='description'>";
      echo $row['publicacion'];
     echo " </p>
    </div>
		
	
	<form method='POST' action='http://10.114.1.119/whiskey/actions/borrarPublicacion.php'>
		<input type='hidden' name='enviar' value='".$row["idp"]."'>
      <input class='action2' type='submit' value='Borrar Publicacion'>
    </form>
	<a class='action'>
	</a>
  </div>
</div>";

    }
  }
} else {
  echo "0 results";
}
$conn->close();
?>
		</div>
		
		<script>
			document.getElementById("deleteForm").addEventListener("submit", function(event) {
			event.preventDefault(); // Prevenir el envío del formulario por defecto

			if (confirm("¿Estás seguro de que deseas borrar el usuario?")) {
				// Si el usuario hace clic en "Aceptar", redirigir al enlace
				window.location.href = document.getElementById("deleteForm").action;
			}
			});

			document.getElementById('cerrar-cuenta').addEventListener('click', function(event) {
				event.preventDefault();
				document.getElementById('cerrar-cuenta-form').submit();
			});

			document.getElementById('perfilLink').addEventListener('click', function(event) {
				event.preventDefault();

				document.getElementById('content-perfilLink').style.display = 'block';
				document.getElementById('content-publicacionesLink').style.display = 'none';
			});

			document.getElementById('publicacionesLink').addEventListener('click', function(event) {
				event.preventDefault();

				document.getElementById('content-perfilLink').style.display = 'none';
				document.getElementById('content-publicacionesLink').style.display = 'block';
			});

			document.addEventListener('DOMContentLoaded', function() {

				document.getElementById('content-perfilLink').style.display = 'block';
				document.getElementById('content-publicacionesLink').style.display = 'none';
			});
      
      var activeLinkId = 'perfilLink';

      function activateLink(linkId) {
        var activeLink = document.getElementById(activeLinkId);
        activeLink.classList.remove('active');
        
        var link = document.getElementById(linkId);
        link.classList.add('active');
        
        activeLinkId = linkId;
      }

	  function confirmAction() {
      var respuesta = confirm("¿Deseas borrar la publicacion?");
      if (respuesta) {
        // Continuar con la acción
        alert("Acción realizada correctamente.");
      } else {
        // Cancelar la acción
        alert("Acción cancelada.");
      }
    }
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
