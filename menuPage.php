<?php
  // Start the session
  ini_set('display_errors', 1);
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
}

/* Style the header */
.header {
  background-color: #f1f1f1;
  padding: 20px;
  text-align: center;
}

/* Estilo de barra */
.topnav {
  overflow: hidden;
  background-color: #60249B;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

/* Style the topnav links */
.topnav-left {
  display: flex;
}

.topnav-center {
  display: flex;
  justify-content: center;
}

.topnav-right {
  display: flex;
  justify-content: flex-end;
}

.topnav a {
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Color de Link de barra*/
.topnav a:hover {
  background-color: #b6ee50;
  color: #60249B;
}
</style>
</head>
<body>

<div class="header">
  <h1>Header</h1>
</div>
<?php  
echo "<div class='topnav'>";

if(isset($_SESSION["start"]) && $_SESSION["token"] == "SI") {
  echo "<div class='topnav-left'>
          <a href='http://localhost/whiskey/cuentaPage.php'>Cuenta</a>
        </div>";
} else {
  echo "<div class='topnav-left'>
          <a href='#' id='iniciar-sesion'>Iniciar Sesion</a>
          <a href='#' id='crear-cuenta'>Crear Cuenta</a>
        </div>
        
        <form id='crear-cuenta-form' action='http://localhost/whiskey/Sesion/crear_sesion.php' method='POST' style='display: none;'>
        </form>
        <form id='iniciar-sesion-form' action='http://localhost/whiskey/Sesion/start_sesion.php' method='POST' style='display: none;'>
        </form>

        <script>
          document.getElementById('crear-cuenta').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('crear-cuenta-form').submit();
          });
        </script>
        <script>
          document.getElementById('iniciar-sesion').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('iniciar-sesion-form').submit();
          });
        </script>";
}

echo "<div class='topnav-center'>
        <a href=''>Inicio</a>
        <a href='#'>Pista</a>
        <a href='#'>Leaderboard</a>
        <a href='#'>News</a>
      </div>
      <div class='topnav-right'></div>
    </div>";
?>
<h1>Pagina principal </h1>
</body>
</html>
