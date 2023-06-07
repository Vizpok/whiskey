<?php
  session_start();
?>
<center>
  <head>
    <style>
      .categoriesDiv {
        width: 50%;
      }

      input[type=text],
      select {
        width: 40%;
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
      }

      input[type=password],
      select {
        width: 40%;
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
      }

      .button1 {
        border-radius: 12px;
      }

      h3 {
        font-weight: bold;
        color: rgb(53, 0, 132);
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
        <label for="user">Usuario: </label><br>
        <input type="text" id="user" name="user"><br>
        <label for="password">Contraseña Anterior: </label><br>
        <div class="form-row">
          <div class="col">
            <input class="form-control" type="password" name="password" id="password">
          </div>
        </div><br>
        <label for="newPassword">Nueva Contraseña: </label><br>
        <input type="text" id="newPassword" name="newPassword"><br><br>
        <input type="submit" value="Enviar"><br>
      </form>

      <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "respaldo";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sqlect = "SELECT id, usuario, contraseña, telefono, email FROM sesion";
        $result = $conn->query($sqlect);

        if(isset($_POST["user"]) && isset($_POST["password"]) && isset($_POST["newPassword"])){
          $nPass2 = md5($_POST["newPassword"]);
          $user2 = $_POST["user"];

          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              if($row["usuario"] == $user2){
                if(md5($_POST["password"]) == $row["contraseña"]){
                  $sql = "UPDATE sesion SET contraseña = '$nPass2' WHERE usuario = '$user2'";
                  if ($conn->query($sql) === TRUE) {
                    echo "<meta http-equiv='refresh' content='0; url= http://localhost/whiskey/DB/Sesion/whconf/msgPass_sesion.php'>";
                  } else {
                    echo $conn->error;
                  }
                }
              }
            }
          } else {
            echo "0 results";
          }
        }
      ?>
      <br><a href='http://localhost/whiskey/DB/Sesion/start_sesion.php/?hl=es'>Regresar</a>
      <?php
        $conn->close();
      ?>
    </div>
  </body>
</center>
