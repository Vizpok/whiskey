
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
    body {
      background-color: #60249B;
      font-family: Arial, sans-serif;
    }

    .categoriesDiv {
      width: 50%;
      margin: 0 auto;
    }

    input[type=text],
    input[type=password],
    select {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    div {
      border-radius: 10px;
      background-color: #BAFF3B;
      padding: 20px;
      margin-top: 50px;
    }

    .button {
      width: 100%;
      background-color: #ebc847  ; /* Green */
      border: none;
      color: white;
      padding: 10px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
      border-radius: 12px;
    }

    h3 {
      font-weight: bold;
      color: rgb(53, 0, 132);
      text-align: center;
    }

    a {
      color: rgb(133, 0, 145);
      text-decoration: none;
    }

    a:hover {
      color: rgb(166, 0, 58);
    }
  </style>
</head>

<body>
  <div class="categoriesDiv">
    <h3>Iniciar Sesión vtalv github2</h3>
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
