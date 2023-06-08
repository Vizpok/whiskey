<?php
echo $_SESSION["id"];
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
$sql = "DELETE FROM sesion WHERE id= $id";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  if(empty($_SESSION["token"]) != true)
                {
                    // remove all session variables
                    session_unset();
            
                    // destroy the session
                    session_destroy();
                    //echo "Se ha cerrado sesion";
                }
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>