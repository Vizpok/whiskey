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
    include ('conf/buscar.css');
  ?>
 
</style>
</head>
  <body>
    <div class="header">
      <h1>Header</h1>
    </div>
    <?php  
    echo "<div class='topnav'>";

include("conf/startPage.php");

    echo "<div class='topnav-center'>
            <a href='http://localhost/whiskey/menuPage.php'>Inicio</a>
            <a href='http://localhost/whiskey/publicarPage.php'>Publicar</a>
            <a href='http://localhost/whiskey/buscarPage.php'>Buscar</a>
          </div>
          <div class='topnav-right'></div>
        </div>";
    ?>
     <center>

<form method="POST">
  </br>
  <div class="text">
<h2>Buscar Por:</h2>
</div>
<label for="options" class="custom-select">
      <select id="options" name="options">
        <option value="titulo" >Titulo</option>
        <option value="usuario">Autor</option>
        <option value="fecha">Fecha</option>
      </select>
    </label>
<div class="group">
<svg class="icon" aria-hidden="true" viewBox="0 0 24 24">
  <g>
    <path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path>
  </g>
</svg>
<input placeholder="Search" type="search" class="input" name="search" minlength = "3">
</div>
<button type="submit" style="display: none;"></button></br>
<input class = 'date' type="date" id="date" name="date">

</form>
</center></br>
<?php
if(isset($_POST["options"])){
    $opt = $_POST["options"];
    //echo $_POST["options"];
}else{
    //echo "Aun no se selecciona nada";
}
?>

<?php

if(isset($_POST["search"])){
  $search = trim($_POST['search']);
  $cont = 0;
  if (empty($search) && $_POST["options"] != "fecha") {
    goto end;
  } 
  $busqueda = $search;
  $busqueda = strtolower(str_replace(' ', '', $busqueda));
}
$cont = 0;
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
if(isset($_POST["options"]) && $_POST["options"] == "usuario"){
  $sql = "SELECT id, usuario FROM sesion ";
  $result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    
    if(isset($_POST["search"])){

      $search = $row["$opt"];
      $search = strtolower(str_replace(' ', '', $search));

    if(/*substr(*/$search/*,0,strlen($busqueda))*/ === $busqueda){
     $id = $row["id"];
     //echo $id;

     $sql = "SELECT idp, id, titulo, publicacion, fecha FROM publicaciones  ORDER BY fecha DESC";

     $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            
          if($id == $row["id"]){
            $cont ++;
              $fecha = $row["fecha"];
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
        }
          else {
          echo "0 results";
        }//fin//
    }
    }
  }
}
  else {
  echo "0 results";
}

}else if(isset($_POST["options"]) && $_POST["options"] == "titulo"){
  $sql = "SELECT idp, id, titulo, publicacion, fecha FROM publicaciones  ORDER BY fecha DESC";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    
    if(isset($_POST["search"])){
      $search = $row["$opt"];
      $search = strtolower(str_replace(' ', '', $search));
    if(substr($search,0,strlen($busqueda)) === $busqueda){
      $cont ++;
      $fecha = $row["fecha"];
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
  }
}
  else {
  echo "0 results";
}
}else if(isset($_POST["options"]) && $_POST["options"] == "fecha"){
  $sql = "SELECT idp, id, titulo, publicacion, fecha FROM publicaciones  ORDER BY fecha DESC";
  
  $fecha = $_POST["date"];
  $formato = "Y-m-d";
  $fecha_dt = DateTime::createFromFormat($formato, $fecha);
  $dia = $fecha_dt->format('d');
  $mes = $fecha_dt->format('m');
  $año = $fecha_dt->format('Y');
  $busqueda = "$dia-$mes-$año";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    
    if(isset($_POST["date"])){
      $search = $row["$opt"];
      $search = strtolower(str_replace(' ', '', $search));

      
    if(substr($search,0,strlen($busqueda)) === $busqueda){
      $cont ++;
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
  }
}
  else {
  echo "0 results";
}
}
$conn->close();
echo "<center>";

  if(isset($_POST["search"]) && $cont <= 0){
    echo "No hay resultados";
  }
  end:
echo "</center>";
?>
  </body>

