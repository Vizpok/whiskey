<?php
  // Start the session
  ini_set('display_erros', 1);
  session_start();
  $_SESSION['start'] = "SI";
?>

  <!DOCTYPE html>
  <html>
  <body>

  <form method = 'POST'>
    <label for='user'>Usuario: </label><br>
      <input type='text' id='user' name='user'><br>
    <label for='password'>Contraseña: </label><br>
    <div class='form-row'>
      <div class='col'>
    <input class='form-control' type='password' name='password' id='password'>
    </div> </br>
    <input type='submit' value = 'Enviar'>
  </form>

  <?php
  
    if(isset($_POST["user"]) && isset($_POST["password"])){
      $user = $_POST["user"];
      $password = md5($_POST["password"]);
      header("Location: pruebas2.php?user=$user&password=$password");
      exit;

      echo "<meta http-equiv='refresh' content='0; url= http://localhost/whiskey/DB/Sesion/pruebas2.php'>";
    }
  ?>
</body>
</html>