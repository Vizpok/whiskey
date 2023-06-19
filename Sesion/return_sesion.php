<?php
ini_set('display_errors', 1);
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Echo session variables that were set on previous page
if (isset($_SESSION["start"])) {
  if ($_SESSION["token"] == "SI") {

  } else {
    $_SESSION["acceso"] = TRUE;
    echo "<meta http-equiv='refresh' content='0; url= http://10.114.1.119/whiskey/Sesion/start_sesion.php'>";
  }
} else {
  echo "<meta http-equiv='refresh' content='0; url= http://10.114.1.119/whiskey/Sesion/start_sesion.php'>";
}
?>

</body>
</html>
