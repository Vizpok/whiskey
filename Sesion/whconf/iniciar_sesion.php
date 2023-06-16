<?php
// Start the session
ini_set('display_errors', 1);
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
$usuario = $_GET['user'];

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

$sql = "SELECT id, usuario, apodo, contraseña, telefono, email FROM sesion";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $user = $row["usuario"];
        // Set session variables
        if (isset($_SESSION["start"]) || (!empty($_GET["user"]) && !empty($_GET["password"]))) {
            if (strtolower($_GET["user"]) == $row["usuario"] && $_GET["password"] == $row["contraseña"]) {
                //cookies
                $expiracion = time() + (30 * 24 * 60 * 60); // 30 días en segundos
                setcookie('cookie', $row['id'], $expiracion);

                $_SESSION["token"] = "SI";
                $_SESSION["user"] = "" . $_GET['user'] . "";
                $_SESSION["id"] = $row["id"];
                echo "<meta http-equiv='refresh' content='0; url= http://192.168.100.190/whiskey/menuPage.php'>";
                break;
            } else {
                $_SESSION["token"] = "NO";
            }
            echo "<meta http-equiv='refresh' content='0; url= http://192.168.100.190/whiskey/Sesion/return_sesion.php'>";
        } else {
            echo "<h3>" . "Inicializa una sesion." . "</h3>";
            echo "<meta http-equiv='refresh' content='3.5; url= http://192.168.100.190/whiskey/Sesion/start_sesion.php'>";
        }
    }
} else {
    echo "0 results";
}
$conn->close();
?>

</body>
</html>
