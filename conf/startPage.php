<?php
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
?>