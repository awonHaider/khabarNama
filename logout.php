<?php 
session_start();

session_destroy();

echo "You are log out";
header("Location: index.php");


?>