<?php
session_start();
if($_SESSION['start'] == "SI")
{
    echo $_GET["user"];
    echo $_GET["password"];
}
?>