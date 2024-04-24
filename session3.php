<?php 
session_start();

session_destroy();

header("Location: session1.php")
?>