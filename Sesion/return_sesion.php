<?php
ini_set('display_erros', 1);
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Echo session variables that were set on previous page
    if(isset($_SESSION["start"]))
    {
        if($_SESSION["token"] == "SI")
        {
            echo "El equipo es: " . $_SESSION["equipo"] . ".<br>";
            echo "Servidor es " . $_SESSION["servidor"] ."<br>";
            echo "Primer integrante es " . $_SESSION["clintegrante1"] ."<br>";
            echo "Segundo integrante es " . $_SESSION["clintegrante2"] ."<br>";
            echo "Tercer integrante es " . $_SESSION["clintegrante3"] ."<br>";
            echo "Cuarto integrante es " . $_SESSION["clintegrante4"] ."<br>";
        }else{
            echo "<h3>"."No tienes acceso."."</h3>";
            echo "<meta http-equiv='refresh' content='3; url= http://localhost/whiskey/Sesion/start_sesion.php'>";
        }
    }else{
        echo "<h3>"."inicializa una sesion."."</h3>";
        echo "<meta http-equiv='refresh' content='2; url= http://localhost/whiskey/Sesion/start_sesion.php'>";
    }
    
    

?>

</body>
</html>