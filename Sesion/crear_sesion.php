<?php
// Start the session
ini_set('display_errors', 1);
session_start();


$error_message = '';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (!empty($_POST["user"]) || !empty($_POST["password"]) || !empty($_POST["apodo"])) {
    $user = strtolower($_POST["user"]);
    $apodo = $_POST["apodo"];
    $password = md5($_POST["password"]);
    $id = uniqid();

    $servername = "localhost";
    $username = "root";
    $db_password = ""; 
    $dbname = "respaldo";

    // Create connection
    $conn = new mysqli($servername, $username, $db_password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $query = "SELECT * FROM sesion WHERE usuario='$user'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
      $error_message = "Este usuario ya existe";
    } else {
      $sql = "INSERT INTO sesion (id, usuario, apodo, contraseña)
      VALUES ('$id', '$user', '$apodo', '".md5($_POST['password'])."')";
      $_SESSION['usuario'] = $user;
      if ($conn->query($sql) === TRUE) {
        $_SESSION['start'] = "SI";
        $_SESSION["token"] = "SI";
        echo "<meta http-equiv='refresh' content='0; url= http://localhost/whiskey/menuPage.php'>";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }

    $conn->close();
  } 
}
?>

<!DOCTYPE html>
<html>
<head>
  <style>
    <?php
    include('styles.css');
    ?>
  </style>
</head>

<body>
  <div class="categoriesDiv">
    <h3>Crear Cuenta</h3>
    <?php if (!empty($error_message)): ?>
      <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>
    <form method="POST">
      <label for="user">Usuario:</label><br>
      <input type="text" id="user" name="user" maxlength="25" minlength = "3" required><br>
      <label for="apodo">Apodo:</label><br>
      <input type="text" id="apodo" name="apodo" maxlength="25" minlength = "3" required><br>
      <label for="password">Contraseña:</label><br>
      <input type="text" name="password" id="password" minlength = "3" maxlength="25"required><br>
      <button class="button" type="submit">Crear Cuenta</button>
    </form>
  </div>
</body>
</html>
