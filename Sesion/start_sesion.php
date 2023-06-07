
<?php
// Start the session
ini_set('display_errors', 1);
session_start();

// Verificar si los datos están completos y mostrar mensaje de error si no lo están
$error_message = '';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
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
    <h3>Iniciar Sesión</h3>
    <?php if (!empty($error_message)): ?>
      <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>
    <form method="POST">
      <label for="user">Usuario:</label><br>
      <input type="text" id="user" name="user" required><br>
      <label for="password">Contraseña:</label><br>
      <input type="password" name="password" id="password" required><br>
      <a href="http://localhost/whiskey/Sesion/whconf/act_password.php/">Cambiar Contraseña</a><br><br>
     <center> <button class="button" type="submit">Iniciar Sesion</button> </center>
    </form>
  </div>
</body>
</html>
