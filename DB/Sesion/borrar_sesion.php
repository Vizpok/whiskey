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
        echo "Se ha cerrado sesion";
    }else{
        echo "No has inicializado una sesion.";
    }

?>

</body>
</html>