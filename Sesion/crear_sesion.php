<?php
// Start the session
ini_set('display_errors', 1);
session_start();


$error_message = '';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
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

      if ($conn->query($sql) === TRUE) {
        $_SESSION['start'] = "SI";
        $_SESSION["token"] = "SI";
        echo "<meta http-equiv='refresh' content='0; url= http://localhost/whiskey/menuPage.php'>";
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
</head>

<body>
  <div class="categoriesDiv">
    <h3>Crear Cuenta</h3>
    <?php if (!empty($error_message)): ?>
      <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>
    <form method="POST">
      <label for="user">Usuario:</label><br>
      <input type="text" id="user" name="user" required><br>
      <label for="apodo">Apodo:</label><br>
      <input type="text" id="apodo" name="apodo" required><br>
      <label for="password">Contraseña:</label><br>
      <input type="text" name="password" id="password" required><br>
      <button class="button" type="submit">Crear Cuenta</button>
    </form>
  </div>
</body>
</html>
