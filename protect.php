<?php

if(!isset($_SESSION)){
  session_start();
}

if(!isset($_SESSION['usuario'])){
  die("Acesso negado. <p><a href='../index.php'>Faça login</a></p>");
}

?>