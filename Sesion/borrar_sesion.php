<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<body>

<?php
    if(empty($_SESSION["token"]) != true)
    {
        // remove all session variables
        session_unset();

        // destroy the session
        session_destroy();
        //echo "Se ha cerrado sesion";
        echo "<meta http-equiv='refresh' content='0; url= http://localhost/whiskey/menuPage.php'>";
    }else{
        echo "No has inicializado una sesion.";
        echo "<meta http-equiv='refresh' content='0; url= http://localhost/whiskey/menuPage.php'>";
    }

?>

</body>
</html>