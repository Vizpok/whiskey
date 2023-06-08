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
$id = $_SESSION["id"];
// sql to delete a record
$sql = "DELETE FROM sesion WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    if(empty($_SESSION["token"]) != true)
    {
        // remove all session variables
        session_unset();

        // destroy the session
        session_destroy();
        //echo "Se ha cerrado sesion";
        echo "<meta http-equiv='refresh' content='0; url= http://localhost/whiskey/menuPage.php'>";
    }
}

$conn->close();
?>