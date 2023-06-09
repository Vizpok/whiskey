
<?php
// Start the session
ini_set('display_errors', 1);
session_start();
// Verificar si los datos están completos y mostrar mensaje de error si no lo están
$error_message = '';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if(isset($_POST["ejecutar"])){
    echo "<meta http-equiv='refresh' content='0; url= http://localhost/whiskey/menuPage.php'>";
  }
  if (!empty($_POST["user"]) || !empty($_POST["password"])) {
    $user = strtolower($_POST["user"]);
    $_SESSION['start'] = "SI";
    $_SESSION['usuario'] = $user;
    $password = md5($_POST["password"]);

    header("Location: whconf/iniciar_sesion.php?user=$user&password=$password");
    exit;
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
    <h3>Iniciar Sesión</h3>
    <?php if (!empty($error_message)): ?>
      <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>
    <form method="POST">
      
      <input type="text" autocomplete="off" id = "user" name="user" class="input" placeholder="Usuario" required>
      <input type="password" autocomplete="off" id = "password" name="password" class="input" placeholder="Contraseña" required><br>
      
      <a href="http://localhost/whiskey/Sesion/whconf/act_password.php/">Cambiar Contraseña</a><br><br>
      <a href="http://localhost/whiskey/Sesion/crear_sesion.php/">Crear Cuenta</a><br><br>
      </center>
      <center>
      <button class="button" type="submit">Iniciar Sesion</button> 
    </form>
    <form method="post">
      <input class="buttonHome" type="submit" name="ejecutar" value="Menu Principal">
    </form>
  </div>
  </center>
  </center>
</body>
</html>
