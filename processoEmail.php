<?php
require_once('bd.php');
session_start();

if(isset($_GET['estado'])){

	if($_GET['estado'] == 2){
//		echo("Aceite");
		$id = $_GET['id'];
		$sql = "SELECT * FROM requisicao WHERE id_requisicao = '$id'";
		$result = $conn->query($sql);
		$result = $conn->query( "UPDATE requisicao SET estado_requisicao ='2' WHERE id_requisicao = '$id'" );
		header("location:index.php");
	}

	else if($_GET['estado'] == 3){
//		echo("Não Aceite");
		$id = $_GET['id'];
		$sql = "SELECT * FROM requisicao WHERE id_requisicao = '$id'";
		$result = $conn->query($sql);
		$result = $conn->query( "UPDATE requisicao SET estado_requisicao ='3' WHERE id_requisicao = '$id'" );
		header("location:index.php");
	}
}
