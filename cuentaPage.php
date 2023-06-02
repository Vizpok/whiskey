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
  background-color: #120727;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

/* Style the topnav links */
.topnav-left {
  display: flex;
  justify-content: flex-start;
  align-items: center;
}

.topnav-right {
  display: flex;
}

.topnav-center {
  flex-grow: 1;
  display: flex;
  justify-content: center;
}

.topnav a {
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Color de Link de barra*/
.topnav a:hover {
  background-color: #6924A5;
  color: white;
}

.container {
  display: flex;
}

.sidebar {
  width: 10%;
  background-color: #f1f1f1;
  overflow: auto;
  height: 75vh; /* Establecer la altura en 100% del viewport height */
  display: flex;
  flex-direction: column;
}

.content {
  width: 90%;
  margin-right: 25%;
  padding: 1px 16px;
  height: 100%;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  background-color: #f1f1f1;
}

li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

li a.active {
  background-color: #04AA6D;
  color: white;
}

li a:hover:not(.active) {
  background-color: #555;
  color: white;
}

.sidebar-bottom {
  margin-top: auto;
}

.sidebar-bottom li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

.sidebar-bottom li a:hover {
  background-color: #FF003E;
  color: white;
}

.sidebar-bottom li a.active {
  background-color: #04AA6D;
  color: white;
}
</style>

</head>
<body>
<div class="header">
  <h1>Header</h1>
</div>
<?php  
echo "<div class='topnav'>
  <div class='topnav-left'>
    <a href=''>Cuenta</a>
  </div>
  <div class='topnav-center'>
    <a href='http://localhost/whiskey/menuPage.php'>Inicio</a>
    <a href='#'>Pista</a>
    <a href='#'>Leaderboard</a>
    <a href='#'>News</a>
  </div>
  <div class='topnav-right'>
    <!-- Agrega aquí cualquier contenido adicional en la parte derecha de la barra de navegación -->
  </div>
</div>";
?>
<div class="container">
  <div class="sidebar">
    <ul>
      <li><a class="active" href="#home">Cuenta</a></li>
      <li><a href="#news">Publicaciones</a></li>
    </ul>
    <ul class="sidebar-bottom">
      <li><a href='#' id='cerrar-cuenta'>Cerrar Sesion</a></li>
    </ul>
  </div>
  <form id='cerrar-cuenta-form' action='http://localhost/whiskey/Sesion/borrar_sesion.php' method='POST' style='display: none;'>
  </form>
  <script>
          document.getElementById('cerrar-cuenta').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('cerrar-cuenta-form').submit();
          });
  </script>
  <div class="content">
    <h2>Fixed Full-height Side Nav</h2>
    <h3>Try to scroll this area, and see how the sidenav sticks to the page</h3>
    <p>PUto githu aalvaaaaaaaaaaaaaaaaaNotice that this div element has a right margin of 25%. This is because the side navigation is set to 25% width. If you remove the margin, the sidenav will overlay/sit on top of this div.</p>
    <p>Also notice that we have set overflow:auto to sidenav. This will add a scrollbar when the sidenav is too long (for example if it has over 50 links inside of it).</p>
    <p>Some text..</p>
    <p>Some text..</p>
    <p>Some text..</p>
    <p>Some text..</p>
    <p>Some text..</p>
    <p>Some text..</p>
    <p>Some text..</p>
  </div>
</div>

</body>
</html>
