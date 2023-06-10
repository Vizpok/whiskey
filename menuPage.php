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

/*Publicacion css*/
.card {
  box-sizing: border-box;
  display: flex;
  max-width: 25%;
  background-color: rgba(255, 255, 255, 1);
  transition: all .15s cubic-bezier(0.4, 0, 0.2, 1);
}

.card:hover {
  box-shadow: 10px 10px 30px rgba(0, 0, 0, 0.081);
}

.date-time-container {
  writing-mode: vertical-lr;
  transform: rotate(180deg);
  padding: 0.5rem;
}

.date-time {
  display: flex;
  align-items: center;
  justify-content: space-between;
  grid-gap: 1rem;
  gap: 1rem;
  font-size: 0.75rem;
  line-height: 1rem;
  font-weight: 700;
  text-transform: uppercase;
  color: rgba(17, 24, 39, 1);
}

.separator {
  width: 1px;
  flex: 1 1 0%;
  background-color: rgba(17, 24, 39, 0.1);
}

.content {
  display: flex;
  flex: 1 1 0%;
  flex-direction: column;
  justify-content: space-between;
}

.infos {
  border-left: 1px solid rgba(17, 24, 39, 0.1);
  padding: 1rem;
}

.title {
  font-weight: 700;
  text-transform: uppercase;
  font-size: 18.72px;
  color: rgba(17, 24, 39, 1);
}

.description {
  overflow: hidden;
  display: -webkit-box;
  -webkit-box-orient: vertical;
  -webkit-line-clamp: 5;
  line-clamp: 5;
  margin-top: 0.5rem;
  font-size: 0.875rem;
  line-height: 1.25rem;
  color: rgba(55, 65, 81, 1);
}

.action {
  display: block;
  background-color: rgba(253, 224, 71, 1);
  padding: 0.75rem 1.25rem;
  text-align: center;
  font-size: 0.75rem;
  line-height: 1rem;
  font-weight: 700;
  text-transform: uppercase;
  color: rgba(17, 24, 39, 1);
  transition: all .15s cubic-bezier(0.4, 0, 0.2, 1);
}

.action:hover {
  background-color: rgba(250, 204, 21, 1);
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
        <a href='http://localhost/whiskey/publicarPage.php'>Publicar</a>
        <a href='#'>Buscar</a>
        <a href='#'>News</a>
      </div>
      <div class='topnav-right'></div>
    </div>";
?>
<h1>Pagina principal </h1>
<div class="card">
  <div class="date-time-container">
    <time class="date-time" datetime="2022-10-10">
      <span>2022</span>
      <span class="separator"></span>
      <span>Oct 10</span>
    </time>
  </div>
  <div class="content">
  
    <div class="infos">
      <a href="#">
        <label class="title">
         Por que Jhonatan es gei?
        </label>
      </a>

      <p class="description">
        Despues de realizar una serie de investigaciones al especimen jhonatan descubrimos, 
        descubrimos que la naturaleza del ser es ser gei, lamentablemente no se pude curar, 
        lo cual no seria malo si no intentara en repetidas ocasiones aparearse con el equipo 
        de contencion masculino en repetidas ocasiones.
      </p>
    </div>

      <a class="action" href="#">
        Read Blog
      </a>
  </div>
</div>
</body>
</html>
