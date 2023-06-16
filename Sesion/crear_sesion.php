<?php
// Start the session
ini_set('display_errors', 1);
session_start();


$error_message = '';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if(isset($_POST["ejecutar"])){
    echo "<meta http-equiv='refresh' content='0; url= http://10.114.1.119/whiskey/menuPage.php'>";
  }
  if(isset($_POST["sesion"])){
    echo "<meta http-equiv='refresh' content='0; url= http://10.114.1.119/whiskey/Sesion/start_sesion.php'>";
  }
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
      $_SESSION['usuario'] = $user;
      if ($conn->query($sql) === TRUE) {
        $expiracion = time() + (30 * 24 * 60 * 60); // 30 días en segundos
        setcookie('mi_cookie', $id, $expiracion);

        $_SESSION['start'] = "SI";
        $_SESSION["token"] = "SI";
        $_SESSION["id"] = $id;
        $_SESSION["user"] = $user;
        $_SESSION["id"] = $id;
        $_SESSION["user"] = $user;
        echo "<meta http-equiv='refresh' content='0; url= http://10.114.1.119/whiskey/menuPage.php'>";
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
    <?php
    include('styles.css');
    ?>
  </style>
</head>

<body>
  <div class="categoriesDiv">
  <center>
    <h3>Crear Cuenta</h3>
    <?php if (!empty($error_message)): ?>
      <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>
    
    <form method="POST">
      <input type="text" autocomplete="off" id = "user" name="user" class="input" placeholder="Nombre del Usuario" maxlength="25" minlength = "3" required>
      <input type="text" autocomplete="off" id = "apodo" name="apodo" class="input" placeholder="Apodo" maxlength="25" minlength = "3" required><br>
      <input type="text" autocomplete="off" id = "password" name="password" class="input" placeholder="Crear Contraseña" maxlength="25" minlength = "3" required><br>
      <input type="text" autocomplete="off" id = "confPassword" name="confPassword" class="input" placeholder="Confirmar Contraseña" maxlength="25" minlength = "3" required><br><br>
      <button class="button" type="submit" style="color: white; font-family: Arial, sans-serif;">Crear Cuenta</button><br><br><br><br>
    </form>
    <form method="post" >
    <h4><p style="color: white; font-family: Arial, sans-serif;">Tienes cuenta?</p></h4>
    <input class="buttonAccount" type="submit" name="sesion" value="Iniciar Sesion"><br>
      <input class="buttonHome" type="submit" name="ejecutar" value="Menu Principal">
    </form>
    </center>

    </center>
  </div>
</body>
</html>
