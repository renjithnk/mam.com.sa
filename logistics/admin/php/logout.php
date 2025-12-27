<?php
//session_start();
// Destroy admin session and redirect to login page
unset($_SESSION["admin_username"]);
session_destroy();
header("Location: ../index.php");
?>
