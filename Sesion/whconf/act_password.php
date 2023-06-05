<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <style>
      body {
        background-color: #f2f2f2;
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
        background-color: #d3fffa;
        padding: 20px;
        margin-top: 50px;
      }

      .button {
        background-color: #4caf50; /* Green */
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
    <h3>Cambiar Contraseña</h3>
  </head>
  <body>
    <div class="categoriesDiv">
      <form method="POST">
        <label for="user">Usuario:</label><br>
        <input type="text" id="user" name="user"><br>
        <label for="password">Contraseña Anterior:</label><br>
        <input type="password" name="password" id="password"><br>
        <label for="newPassword">Nueva Contraseña:</label><br>
        <input type="password" id="newPassword" name="newPassword"><br><br>
        <input class="button" type="submit" value="Cambiar Contraseña"><br>
      </form>
      <form method="post">
        <input class="button" type="submit" name="ejecutar" value="Regresar">
      </form>

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
        if(isset($_POST["ejecutar"])){
          echo "<meta http-equiv='refresh' content='0; url= http://localhost/whiskey/Sesion/start_sesion.php'>";
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
                echo "Contraseña actualizada correctamente.</br>";
                echo "Te redirigiremos en un momento.";
                echo "<meta http-equiv='refresh' content='3.5; url= http://localhost/whiskey/Sesion/start_sesion.php'>";
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
