<?php
// Start the session
ini_set('display_errors', 1);
session_start();
if(isset($_SESSION["token"]) && $_SESSION["token"] == "SI"){
  echo "<meta http-equiv='refresh' content='0; url= http://10.114.1.119/whiskey/menuPage.php'>";
}
// Verificar si los datos están completos y mostrar mensaje de error si no lo están
$error_message_access = 'Usuario o Contraseña incorrectos';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if(isset($_POST["ejecutar"])){
    echo "<meta http-equiv='refresh' content='0; url= http://10.114.1.119/whiskey/menuPage.php'>";
  }
  if(isset($_POST["crearCuenta"])){
    echo "<meta http-equiv='refresh' content='0; url= http://10.114.1.119/whiskey/Sesion/crear_sesion.php'>";
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
  </style>
</head>

<body>
  
  <div class="categoriesDiv">
    <center>
      <h3>Iniciar Sesión</h3>
      <?php if (isset($_SESSION["acceso"]) && $_SESSION["acceso"] == TRUE): ?>
        <p style="color: red;"><?php echo $error_message_access; $_SESSION["acceso"] = FALSE?></p>
      <?php endif; ?>
      <form method="POST">
        <input type="text" autocomplete="off" id = "user" name="user" class="input" placeholder="Usuario" required>
        <input type="password" autocomplete="off" id = "password" name="password" class="input" placeholder="Contraseña" required><br>
        <h4><a href="http://10.114.1.119/whiskey/Sesion/whconf/act_password.php/" style="color: #dfa8ff; font-family: Arial, sans-serif;">Cambiar Contraseña</a></h4>
      </center>
      <center>
        <button class="button" type="submit">Iniciar Sesión</button><br><br><br><br> 
      </form>
      
      <form method="post">
        <h4><p style="color: white; font-family: Arial, sans-serif;">No tienes cuenta?</p></h4>
        <input class="buttonAccount" type="submit" name="crearCuenta" value="Crear Cuenta"><br>
      </form>
      
      <form method="POST">
        <input class="buttonHome" type="submit" name="ejecutar" value="Menu Principal"><br>
      </form>
    </center>
  </div>

</body>
</html>
