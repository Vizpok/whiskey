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
#myTextarea {
  width: 500px;
  height: 300px;
  resize: vertical;
  min-height: 100px;
}
.form-control {
  position: relative;
  margin: 20px 0 40px;
  width: 25%;
}

.form-control input {
  background-color: transparent;
  border: 0;
  border-bottom: 2px #000 solid;
  display: block;
  width: 100%;
  padding: 15px 0;
  font-size: 14px;
  color: #7A3500;
}

.form-control input:focus,
.form-control input:valid {
  outline: 0;
  border-bottom-color: #CC58D6;
}

.form-control label {
  position: absolute;
  top: 15px;
  left: 0;
  pointer-events: none;
}

.form-control label span {
  display: inline-block;
  font-size: 18px;
  min-width: 5px;
  color: #000;
  transition: 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.form-control input:focus+label span,
.form-control input:valid+label span {
  color: #CC58D6;
  transform: translateY(-30px);
}
.contenido-publicacion {
  font-size: 18px;
  color: #333;
  font-weight: bold;
  margin-bottom: 10px;
}
button {
  font-family: inherit;
  font-size: 20px;
  background: royalblue;
  color: white;
  padding: 0.7em 1em;
  padding-left: 0.9em;
  display: flex;
  align-items: center;
  border: none;
  border-radius: 16px;
  overflow: hidden;
  transition: all 0.2s;
}

button span {
  display: block;
  margin-left: 0.3em;
  transition: all 0.3s ease-in-out;
}

button svg {
  display: block;
  transform-origin: center center;
  transition: transform 0.3s ease-in-out;
}

button:hover .svg-wrapper {
  animation: fly-1 0.6s ease-in-out infinite alternate;
}

button:hover svg {
  transform: translateX(1.2em) rotate(45deg) scale(1.1);
}

button:hover span {
  transform: translateX(5em);
}

button:active {
  transform: scale(0.95);
}

@keyframes fly-1 {
  from {
    transform: translateY(0.1em);
  }

  to {
    transform: translateY(-0.1em);
  }
}


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
        <a href='#'>Buscar</a>
        <a href='#'>News</a>
      </div>
      <div class='topnav-right'></div>
    </div>";
?>
<h1>Pagina Publicar </h1>
<form method="POST" action="procesar.php">

<div class="form-control">
      <input type="text" name="titulo" required maxlength="60">
      <label>
        <span style="transition-delay:0ms">T</span><span style="transition-delay:50ms">i</span><span style="transition-delay:100ms">t</span>
        <span style="transition-delay:150ms">u</span><span style="transition-delay:200ms">l</span><span style="transition-delay:250ms">o</span>
      </label>
    </div>
    <p class="contenido-publicacion">Contenido de la publicación:</p>
    <textarea id="myTextarea" name="contenido" placeholder="Escribe el contenido de tu publicación aquí..." required></textarea>

    
    <button type="submit" name="ejecutar">
      <div class="svg-wrapper-1">
        <div class="svg-wrapper">
          <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 0h24v24H0z" fill="none"></path>
            <path d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z" fill="currentColor"></path>
          </svg>
        </div>
      </div>
      <span>Publicar</span>
    </button>
  </form>

  <script>
    function myFunction() {
      window.location.href = "http://localhost/whiskey/menuPage.php";
    }
  </script>

</body>
</html>
</center>
