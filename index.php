<?php
session_start();
if (empty($_SESSION['level'])) {
header("Location: login.php");
}
?>