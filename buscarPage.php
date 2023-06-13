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
  background-color: #60249B;
  display: flex;
  justify-content: space-between;
  align-items: center;
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
  background-color: #b6ee50;
  color: #60249B;
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
}

/* Clear floats after the columns */
.row::after {
  content: "";
  display: table;
  clear: both;
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
.group {
 display: flex;
 line-height: 28px;
 align-items: center;
 position: relative;
 max-width: 400px;
}

.input {
 width: 100%;
 height: 40px;
 line-height: 28px;
 padding: 0 1rem;
 padding-left: 2.5rem;
 border: 2px solid transparent;
 border-radius: 8px;
 outline: none;
 background-color: #f3f3f4;
 color: #0d0c22;
 transition: .3s ease;
}

.input::placeholder {
 color: #9e9ea7;
}

.input:focus, input:hover {
 outline: none;
 border-color: rgba(234,76,137,0.4);
 background-color: #fff;
 box-shadow: 0 0 0 4px rgb(234 76 137 / 10%);
}

.icon {
 position: absolute;
 left: 1rem;
 fill: #9e9ea7;
 width: 1rem;
 height: 1rem;
}
.radio-inputs {
  position: relative;
  display: flex;
  flex-wrap: wrap;
  border-radius: 0.5rem;
  background-color: #EEE;
  box-sizing: border-box;
  box-shadow: 0 0 0px 1px rgba(0, 0, 0, 0.06);
  padding: 0.25rem;
  width: 300px;
  font-size: 14px;
}

.radio-inputs .radio {
  flex: 1 1 auto;
  text-align: center;
}

.radio-inputs .radio input {
  display: none;
}

.radio-inputs .radio .name {
  display: flex;
  cursor: pointer;
  align-items: center;
  justify-content: center;
  border-radius: 0.5rem;
  border: none;
  padding: .5rem 0;
  color: rgba(51, 65, 85, 1);
  transition: all .15s ease-in-out;
}

.radio-inputs .radio input:checked + .name {
  background-color: #fff;
  font-weight: 600;
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
            <a href='http://localhost/whiskey/menuPage.php'>Inicio</a>
            <a href='http://localhost/whiskey/publicarPage.php'>Publicar</a>
            <a href='http://localhost/whiskey/buscarPage.php'>Buscar</a>
            <a href='#'>News</a>
          </div>
          <div class='topnav-right'></div>
        </div>";
    ?>
    <h1>Pagina Buscar</h1>
    <center>

    <div class="group">
  <svg class="icon" aria-hidden="true" viewBox="0 0 24 24"><g><path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path></g></svg>
  <input placeholder="Search" type="search" class="input">
</div>
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

$sql = "SELECT idp, id, titulo, publicacion, fecha FROM publicaciones LIMIT 12";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";

    }
  }
  else {
  echo "0 results";
}
$conn->close();
?>
  </body>

