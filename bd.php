<?php
//Remover a query de mysqli para uma variavel para ter permissão para entrar na base de dados
$servername = "localhost";
$username = "admintest";
$password = "123";
$bd = "bd_requisicoes";


$conn = new mysqli($servername, $username, $password, $bd)or die(mysqli_error($conn));
