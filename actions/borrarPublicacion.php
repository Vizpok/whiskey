<?php
ini_set('display_erros', 1);
session_start();

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
$idp = $_POST["enviar"];
// sql to delete a record
$sql = "DELETE FROM publicaciones WHERE idp = '$idp'";

if ($conn->query($sql) === TRUE) {
    if(empty($_SESSION["token"]) != true)
    {

        echo "<meta http-equiv='refresh' content='0; url= http://localhost/whiskey/cuentaPage.php'>";
    }
}

$conn->close();
?>