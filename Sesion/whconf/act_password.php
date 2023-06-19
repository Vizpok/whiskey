<?php
  session_start();
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
      <form method="POST">
        <h3>Cambiar Contraseña</h3>
        <input type="text" autocomplete="off" id="user" name="user" class="input" placeholder="Usuario" maxlength="25" minlength="3" required>
        <input type="password" autocomplete="off" id="password" name="password" class="input" placeholder="Contraseña Anterior" maxlength="25" minlength="3" required>
        <input type="password" autocomplete="off" id="newPassword" name="newPassword" class="input" placeholder="Nueva Contraseña" maxlength="25" minlength="3" required><br><br>
        <input class="button" type="submit" value="Cambiar Contraseña"><br>
      </form>
      <form method="post">
        <input class="buttonHome" type="submit" name="ejecutar" value="Regresar">
      </form>
    </center>

    <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "respaldo";

      // Crear conexión
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Verificar conexión
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      if (!isset($_SESSION["user"]) || !isset($_SESSION["id"])) {
        if (isset($_POST["ejecutar"])) {
          echo "<meta http-equiv='refresh' content='0; url=http://10.114.1.119/whiskey/Sesion/start_sesion.php'>";
        }
      } else {
        if (isset($_POST["ejecutar"])) {
          echo "<meta http-equiv='refresh' content='0; url=http://10.114.1.119/whiskey/menuPage.php'>";
        }
      }
      if (isset($_POST["user"]) && isset($_POST["password"]) && isset($_POST["newPassword"])) {
        $user = $_POST["user"];
        $password = md5($_POST["password"]);
        $newPassword = md5($_POST["newPassword"]);

        if (empty($newPassword)) {
          echo "Por favor, ingrese una contraseña nueva.</br>";
        } else {
          $sql = "SELECT id, usuario, contraseña, telefono, email FROM sesion WHERE usuario = '$user' AND contraseña = '$password'";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            $sql = "UPDATE sesion SET contraseña = '$newPassword' WHERE usuario = '$user' AND contraseña = '$password'";
            if ($conn->query($sql) === TRUE) {
              echo "<center>";
              echo "<div class='spinner'>
                <span>C</span>
                <span>A</span>
                <span>R</span>
                <span>G</span>
                <span>A</span>
                <span>N</span>
                <span>D</span>
                <span>O</span>
              </div></center>";
              if (empty($_SESSION["token"]) != true) {
                // remove all session variables
                session_unset();
        
                // destroy the session
                session_destroy();
                // echo "Se ha cerrado sesion";
              }
              echo "<meta http-equiv='refresh' content='3.5; url=http://10.114.1.119/whiskey/Sesion/start_sesion.php'>";
            } else {
              echo "Error al actualizar la contraseña: " . $conn->error;
            }
          } else {
            echo "Usuario o contraseña incorrectos.";
          }
        }
      }

      $conn->close();
    ?>
  </div>
</body>
</html>
