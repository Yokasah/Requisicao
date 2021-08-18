<?php
require_once( 'bd.php' );
session_start();

$username = $_POST['user'];
$password = $_POST['password'];

//Querys of comparation to get the values from DB
$sqlUser  = "SELECT * FROM user WHERE id_user = '$username' AND password_user = '$password'";
$sqlAdmin = "SELECT * FROM admin WHERE id_admin = '$username' AND password_admin = '$password'";

$resultUser  = $conn->query( $sqlUser );
$resultAdmin = $conn->query( $sqlAdmin );

$rowUser  = $resultUser->fetch_assoc();
$rowAdmin = $resultAdmin->fetch_assoc();

if ( $username == $rowUser['id_user'] && $password == $rowUser['password_user'] ) {
	$_SESSION['nomeuser'] = $rowUser['nome_user'];
	$_SESSION['login'] = 'true';
	header("location:index.php");
}

if( $username == $rowAdmin['id_admin'] && $password == $row['password_admin'] ) {
//	header("location:index.php");
	echo("Admin");
}

else {
	echo("Erro");
}