<?php
  // Start the session
  ini_set('display_errors', 1);
  session_start();
?>

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
$dia = date('d');   // Obtiene el día actual (con ceros iniciales si es necesario)
$mes = date('m');   // Obtiene el mes actual (con ceros iniciales si es necesario)
$año = date('Y');   // Obtiene el año actual en formato de 4 dígitos
$idp = uniqid();

$fecha = $dia . '/' . $mes . '/' . $año;

$sql = "INSERT INTO publicaciones (idp, id, titulo, publicacion,fecha)
VALUES ('$idp', '".$_SESSION['id']."','".$_POST['titulo']."' ,'".$_POST['contenido']."', '$fecha');";

if ($conn->multi_query($sql) === TRUE) {
  echo "<meta http-equiv='refresh' content='0; url= http://localhost/whiskey/menuPage.php'>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>