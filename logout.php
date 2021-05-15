<?php
session_start();
session_destroy();
$_SESSION['userlevel'] = "";
$_SESSION['user'] = "";
header("Location: index.php");
?>