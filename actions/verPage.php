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
  <link rel="stylesheet" type="text/css" href="http://localhost/whiskey/conf/publicar.css">
</head>
<body>
  <center>
    <div class="header">
      <h1>Header</h1>
    </div>

    <?php  
    echo "<div class='topnav'>";
    if(isset($_POST["ejecutar"])){
      echo "<meta http-equiv='refresh' content='0; url=http://localhost/whiskey/menuPage.php'>";
    }

    include($_SERVER['DOCUMENT_ROOT']."/whiskey/conf/startPage.php");

    echo "<div class='topnav-center'>
            <a href='http://localhost/whiskey/menuPage.php'>Inicio</a>
            <a href='http://localhost/whiskey/publicarPage.php'>Publicar</a>
            <a href='http://localhost/whiskey/buscarPage.php'>Buscar</a>
          </div>
          <div class='topnav-right'></div>
        </div>";

    echo "<h1>Pagina Ver Publicacion</h1>";
    if(isset($_SESSION['start']) && $_SESSION['token'] == 'SI') {
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

      $sql = "SELECT idp, id, titulo, publicacion, fecha FROM publicaciones";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          if($_POST["enviar"] == $row["idp"]){
            echo "<div class='cardPublicacion'>";
                echo "<h2>".$row["titulo"] . "</br></h2>";
                echo "<h2> Publicado el: " . $row["fecha"] . "</br></br> </h2>";
                echo "<h4>". $row["publicacion"] . "</br> </h4> </br>";
            echo "</div>";
           
          }
        }
      } else {
        echo "0 results";
      }
      $conn->close();
    } else { 
      echo "<div class='title'>Para Ver La Publicacion Completa</div>";
      echo "<div class='spinner'>
              <span>I</span>
              <span>n</span>
              <span>i</span>
              <span>c</span>
              <span>i</span>
              <span>a</span>
              <span>-</span>
              <span>S</span>
              <span>e</span>
              <span>s</span>
              <span>i</span>
              <span>o</span>
              <span>n</span>
              <span>-</span>
              <span>o</span>
              <span>-</span>
              <span>C</span>
              <span>r</span>
              <span>e</span>
              <span>a</span>
              <span>-</span>
              <span>u</span>
              <span>n</span>
              <span>a</span>
              <span>-</span>
              <span>c</span>
              <span>u</span>
              <span>e</span>
              <span>n</span>
              <span>t</span>
              <span>a</span>
            </div>";
      echo "<div id='loader'>
              <div class='ls-particles ls-part-1'></div>
              <div class='ls-particles ls-part-2'></div>
              <div class='ls-particles ls-part-3'></div>
              <div class='ls-particles ls-part-4'></div>
              <div class='ls-particles ls-part-5'></div>
              <div class='lightsaber ls-left ls-green'></div>
              <div class='lightsaber ls-right ls-red'></div>
            </div>";
    }
    ?>
  </center>
</body>
</html>
