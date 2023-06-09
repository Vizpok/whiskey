|<?php
// Start the session
ini_set('display_erros', 1);
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
echo $_GET['password'];
$usuario = $_GET['user'];
echo $usuario ."</br>";

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

$sql = "SELECT id, usuario, contraseña, telefono, email FROM sesion";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $user = $row["usuario"];
        // Set session variables
        if(isset($_SESSION["start"]) || (!empty($_GET["user"]) && !empty($_GET["password"]))){
            if(strtolower($_GET["user"]) == $row["usuario"] && $_GET["password"] == $row["contraseña"])
            {
                echo "se ejecuto";
                $_SESSION["token"] = "SI";
                $_SESSION["equipo"] = "whiskey";
                $_SESSION["servidor"] = "xavier";
                $_SESSION["clintegrante1"] = "Xavier Isai";
                $_SESSION["clintegrante2"] = "Julisa Lopez";
                $_SESSION["clintegrante3"] = "Ricardo Daniel";
                $_SESSION["clintegrante4"] = "Ashli Jearyn";
                echo "<meta http-equiv='refresh' content='0; url= http://localhost/whiskey/DB/Sesion/return_sesion.php'>";
                break;
            }else{
                echo "no se ejecuto";
                    $_SESSION["token"] = "NO";
            }
            echo "<meta http-equiv='refresh' content='0; url= http://localhost/whiskey/DB/Sesion/return_sesion.php'>";
        }else{
            echo "<h3>"."Inicializa una sesion."."</h3>";
            echo "<meta http-equiv='refresh' content='3.5; url= http://localhost/whiskey/DB/Sesion/start_sesion.php'>";
        }
    }

} else {
    echo "0 results";
    }
    $conn->close();
?>

</body>
</html>