<?php 
session_start();

if((!isset($_SESSION['usuario'])) OR (!isset($_SESSION['senha'])) OR ($_SESSION['nivel'] <> 1))
header ("Location: index.php");


?>