<?php
  // Start the session
  ini_set('display_errors', 1);
  session_start();
?>

<!DOCTYPE html>
<center>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  <?php
  include('publicar.css');
  ?>
</style>
</head>
<body>
<div class="header">
  <h1>Header</h1>
</div>
<?php  
echo "<div class='topnav'>";
if(isset($_POST["ejecutar"])){
  echo "<meta http-equiv='refresh' content='0; url= http://localhost/whiskey/menuPage.php'>";
}
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
    <a href='http://localhost/whiskey/menuPage.php'>Inicio</a>
        <a href='#'>Publicar</a>
        <a href='http://localhost/whiskey/buscarPage.php'>Buscar</a>
        <a href='#'>News</a>
      </div>
      <div class='topnav-right'></div>
    </div>";

echo "<h1>Pagina Publicar </h1>";
if(isset($_SESSION['start']) && $_SESSION['token'] == 'SI') {
  echo "<form method='POST' action='procesarPublicacion.php'>

<div class='form-control'>
      <input type='text' name='titulo' required maxlength='60'>
      <label>
        <span style='transition-delay:0ms'>T</span><span style='transition-delay:50ms'>i</span><span style='transition-delay:100ms'>t</span>
        <span style='transition-delay:150ms'>u</span><span style='transition-delay:200ms'>l</span><span style='transition-delay:250ms'>o</span>
      </label>
    </div>
    <p class='contenido-publicacion'>Contenido de la publicación:</p>
    <textarea id='myTextarea' name='contenido' placeholder='Escribe el contenido de tu publicación aquí...' required></textarea>

    
    <button type='submit' name='ejecutar'>
      <div class='svg-wrapper-1'>
        <div class='svg-wrapper'>
          <svg height='24' width='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'>
            <path d='0 0h24v24H0z' fill='none'></path>
            <path d='M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z' fill='currentColor'></path>
          </svg>
        </div>
      </div>
      <span>Publicar</span>
    </button>
  </form>

  <script>
    function myFunction() {
      window.location.href = 'http://localhost/whiskey/menuPage.php';
    }
  </script>";
}else{ 
  echo "<div class='title'>Para Publicar</div>";
  echo "<div class='spinner'>
  <span>I</span>
  <span>n</span>
  <span>i</span>
  <span>c</span>
  <span>i</span>
  <span>a</span>
  <span>-</span>
  <span>S</span>
  <span>e</span>
  <span>s</span>
  <span>i</span>
  <span>o</span>
  <span>n</span>
  <span>-</span>
  <span>o</span>
  <span>-</span>
  <span>C</span>
  <span>r</span>
  <span>e</span>
  <span>a</span>
  <span>-</span>
  <span>u</span>
  <span>n</span>
  <span>a</span>
  <span>-</span>
  <span>c</span>
  <span>u</span>
  <span>e</span>
  <span>n</span>
  <span>t</span>
  <span>a</span>
</div>";
  echo "<div id='loader'>
  <div class='ls-particles ls-part-1'></div>
  <div class='ls-particles ls-part-2'></div>
  <div class='ls-particles ls-part-3'></div>
  <div class='ls-particles ls-part-4'></div>
  <div class='ls-particles ls-part-5'></div>
  <div class='lightsaber ls-left ls-green'></div>
  <div class='lightsaber ls-right ls-red'></div>
</div>";

  }
  ?>
</body>
</html>
</center>
