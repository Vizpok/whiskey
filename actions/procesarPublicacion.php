<?php
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

$fecha = $dia . '-' . $mes . '-' . $año;
$id = $_SESSION['id'];
$publi = $_POST['contenido'];
$publi = str_replace("'", "", $publi);
$titulo = $_POST["titulo"];
$sql = "INSERT INTO publicaciones (idp, id, titulo, publicacion,fecha)
VALUES ('$idp', '$id','$titulo' ,'$publi', '$fecha')";

if ($conn->query($sql) === TRUE) {
  echo "<meta http-equiv='refresh' content='0; url= http://10.114.1.119/whiskey/menuPage.php'>";
} else {
  echo "Error al ingresar la publicacion, trata de no usar caracteres especiales: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
