<?php
require_once('conecta.php');
ob_start();
//$login = preg_replace('/[^[:alnum:]_]/','',$_POST['usuario']);
$login = $_POST['usuario'] ;
$pass = preg_replace('/[^[:alnum:]_]/','',$_POST['senha']);
$sql = mysqli_query($link,"SELECT login, senha, tipo FROM usuario WHERE `login`='$login' AND `senha`='$pass' AND tipo=1") or die ("ERRO NO SQL".mysqli_error());
$row = mysqli_num_rows($sql);
while($row = mysqli_fetch_assoc($sql)) {
$tipo = $row['tipo'];
$loginbd = $row ['login'];
$passbd = $row ['senha'];
$cod = $row ['cod']; }
if (isset($loginbd) && (isset($passbd))) {
$validacao = '1';
$usuario = $_POST['usuario'];
session_start();
$_SESSION['usuario'] = $usuario;
$_SESSION['senha'] = $pass;
$_SESSION['validacao'] = $validacao;
$_SESSION['cod'] = $cod;
$_SESSION['nivel'] =1;

header ("Location: home.php");
    
} else  {

echo "<script type='text/javascript'>
alert('Usuário ou senha incorreta')
location.href='index.php' </script>";

}
?>

