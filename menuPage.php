<?php
  // Start the session
  ini_set('display_errors', 1);
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
  background-color: #FFF4FF;
}

/* Style the header */
.header {
  background-color: #ededed;
  padding: 20px;
  text-align: center;
}

/* Estilo de barra */
.topnav {
  overflow: hidden;
  background-color: #3D1663;
  display: flex;
  justify-content: space-between;
  align-items: center;
  box-shadow: 7px 7px 20px #9a52ff,
             -7px -7px 20px #fb8eff;
}

/* Style the topnav links */
.topnav-left {
  display: flex;
}

.topnav-center {
  display: flex;
  justify-content: center;
}

.topnav-right {
  display: flex;
  justify-content: flex-end;
}

.topnav a {
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Color de Link de barra*/
.topnav a:hover {
  background-color: #A9F468;
  color: #60249B;
  box-shadow: 10px 10px 50px #68EE50,
             -10px -10px 50px #50EECA;
}

.leftcolumn {   
  
  float: left;
  width: 50%;
  background-color: #f1f1f1;
  padding-left: 20px;
}

/* Right column */
.rightcolumn {
  float: left;
  width: 50%;
  background-color: #f1f1f1;
  padding-left: 20px;
}

/* Add a card effect for articles */
.card {
  background-color: white;
  padding: 20px;
  margin-top: 20px;
  box-shadow: 10px 10px 20px #8FF1FF,
             -10px -10px 20px #8FF1FF;
}

/* Clear floats after the columns */
.row::after {
  content: "";
  display: table;
  clear: both;
}
.description {
  overflow: hidden;
  display: -webkit-box;
  -webkit-box-orient: vertical;
  -webkit-line-clamp: 5;
  line-clamp: 5;
  margin-top: 0.5rem;
  font-size: 0.875rem;
  line-height: 1.25rem;
  color: rgba(55, 65, 81, 1);
}
/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
  .leftcolumn, .rightcolumn {   
    width: 100%;
    padding: 0;
  }
}

/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
@media screen and (max-width: 400px) {
  .topnav a {
    float: none;
    width: 100%;
  }
}
</style>
</head>
  <body>
    <div class="header">
      <h1>Header</h1>
    </div>
    <?php  
    echo "<div class='topnav'>";

    if(isset($_SESSION["start"]) && $_SESSION["token"] == "SI") {
      echo "<div class='topnav-left'>
              <a href='http://localhost/whiskey/cuentaPage.php'>Cuenta</a>
            </div>";
    } else {
      echo "<div class='topnav-left'>
              <a href='#' id='iniciar-sesion'>Iniciar Sesion</a>
              <a href='#' id='crear-cuenta'>Crear Cuenta</a>
            </div>
            
            <form id='crear-cuenta-form' action='http://localhost/whiskey/Sesion/crear_sesion.php' method='POST' style='display: none;'>
            </form>
            <form id='iniciar-sesion-form' action='http://localhost/whiskey/Sesion/start_sesion.php' method='POST' style='display: none;'>
            </form>

            <script>
              document.getElementById('crear-cuenta').addEventListener('click', function(event) {
                event.preventDefault();
                document.getElementById('crear-cuenta-form').submit();
              });
            </script>
            <script>
              document.getElementById('iniciar-sesion').addEventListener('click', function(event) {
                event.preventDefault();
                document.getElementById('iniciar-sesion-form').submit();
              });
            </script>";
    }

    echo "<div class='topnav-center'>
            <a href=''>Inicio</a>
            <a href='http://localhost/whiskey/publicarPage.php'>Publicar</a>
            <a href='http://localhost/whiskey/buscarPage.php'>Buscar</a>
            <a href='#'>News</a>
          </div>
          <div class='topnav-right'></div>
        </div>";
    ?>
    <h1>Pagina principal </h1>
    

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

$sql = "SELECT idp, id, titulo, publicacion, fecha FROM publicaciones ORDER BY fecha DESC LIMIT 50";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
$fecha = $row["fecha"];
$formato = "d-m-Y";
$fecha_dt = DateTime::createFromFormat($formato, $fecha);

$dia = $fecha_dt->format('d');
$mes = $fecha_dt->format('F');
$año = $fecha_dt->format('Y');

echo "<div class='row'>
<div class='leftcolumn'>
  <div class='card'>
    <h2>".$row["titulo"]."</h2>
    <h5>".$dia." ".$mes." ".$año."</h5>
    <p class='description'>
    ".$row["publicacion"]."</p>
    </div>
</div>
";

    }
  }
  else {
  echo "0 results";
}
$conn->close();
?>

  </body>

