<?php
  // Start the session
  ini_set('display_erros', 1);
  session_start();
?>

<!DOCTYPE html>
<html>
  <center>
    <head>
      <link rel="stylesheet" type="text/css" href="styles.css">
      <h3>Iniciar Sesion</h3></br>
    </head>
    <body>
      <div class="categoriesDiv" style="width:20%">
        <form method="POST">
          <label for="user">Usuario: </label><br>
          <input type="text" id="user" name="user"><br>
          <label for="password">Contraseña: </label></br>
          <input class="form-control" type="password" name="password" id="password"></br>
          <a href="http://localhost/whiskey/DB/Sesion/whconf/act_password.php/?hl=es">Cambiar Contraseña</a></br></br>
          <button class="button button1">Enviar</button>
        </form>
      </div>

      <?php
        if(isset($_POST["user"]) && isset($_POST["password"])){
          $user = $_POST["user"];
          $_SESSION['start'] = "SI";
          $password = md5($_POST["password"]);
          header("Location: whconf/iniciar_sesion.php?user=$user&password=$password");
          exit;
        }
      ?>
      <!-- Punto de partida -->
      <!-- <input type='hidden' name='user' value='ADMIN'> -->
    </body>
  </center>
</html>
