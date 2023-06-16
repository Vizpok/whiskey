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
  <?php
    include("conf/menu.css");
     
  ?>
</style>
</head>
  <body>
    <div class="header">
      <h1>High Gaming</h1>
    </div>
    <?php  
    echo "<div class='topnav'>";

   
include("conf/startPage.php");

    echo "<div class='topnav-center'>
            <a href=''>Inicio</a>
            <a href='http://10.114.1.119/whiskey/publicarPage.php'>Publicar</a>
            <a href='http://10.114.1.119/whiskey/buscarPage.php'>Buscar</a>
          </div>
          <div class='topnav-right'></div>
        </div>";
    ?>
    <center>
    <h1>Publicaciones</h1>
    </center>

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
    $autor = $row["id"];
    // Your logic for the "user" block
    $conn2 = new mysqli($servername, $username, $password, $dbname);
    $sql2 = "SELECT id, usuario, apodo FROM sesion ";
    $result2 = $conn2->query($sql2);

    if ($result2->num_rows > 0) {
      // output data of each row
      while($row2 = $result2->fetch_assoc()) {
        if($autor == $row2["id"]){
          $autor = $row2["usuario"];
          $apodo = $row2["apodo"];
          break;
        }
      }
    } else {
      echo "0 results";
    }

    // Rest of your code for the "cont" block
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
        <p>
        <h5>$dia $mes $año &nbsp; &nbsp; Autor: $autor ($apodo)</h5>
        </p>
        <p class='description'>
        ".$row["publicacion"]."</p></br>
        <center>
        <form method = 'POST' action = 'http://10.114.1.119/whiskey/actions/verPage.php'>
          <input type='hidden' name='enviar' value='".$row["idp"]."'>
          <input class = 'buttonHome' type ='submit' value = 'Ver Publicacion'>
          </center>
        </form>
        </div>
        <center>
        </center>
    </div>
    ";
  }
} else {
  echo "0 results";
}
$conn->close();
?>



  </body>

