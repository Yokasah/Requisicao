<?php
//Require and Start Session
require_once( 'bd.php' );
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//remover os valores das caixas de texto para variavesi
$veiculo  = $_POST['veiculos'];
$descricao    = $_POST['descricao'];
$lotacao        = $_POST['lotacao'];
$destinoinicial = $_POST['destino'];
$utilizador     = $_SESSION['nomeUser'];
$emailuser      = $_SESSION['email'];
$autorizacao    = "0"; // 0 = Estado pendente aka estado original de uma requisição

//buscar os valores inicais do input para inserir em variaveis para inserir na base de dados
$DTinicial = $_POST['datetimeinicio'];
$DTfinal   = $_POST['datetimefinal'];

//Variaveis para Horas inicial e Final
$horainicial = date( 'H:i:s', strtotime( $DTinicial ) );
$horafinal   = date( 'H:i:s', strtotime( $DTfinal ) );

//Variaveis para Dia inicial e Final
$datainicial = date( 'Y-m-d', strtotime( $DTinicial ) );
$datafinal   = date( 'Y-m-d', strtotime( $DTfinal ) );

if($datainicial > $datafinal){
	$_SESSION['erroHoras'] = "true";
	header("location:requisicao.php");
}
if( $horainicial > $horafinal){
	$_SESSION['erroHoras'] = "true";
	header("location:requisicao.php");
}

//Query
// 0 == Estado Pendente
// 1 == Aceite
// 2 == A Decorrer
// 3 == Completo

//Query to Insert into the database the request
$sql = "INSERT INTO requisicao(requisitante_requisicao, veiculo_requisicao, estado_requisicao, lotacao_requisicao, data_inicial_requisicao,
								data_final_requisicao, hora_inicial_requisicao, hora_final_requisicao, destino_requisicao, descricao_inicial_requisicao,
								descricao_final_requisicao, autorizacao_requisicao, km_realizados_requisicao) VALUES ('$utilizador', '$veiculo', '0',
								'$lotacao', '$datainicial', '$datafinal', '$horainicial', '$horafinal', '$destinoinicial', '$descricao', '0', '$autorizacao', '0')";

if ( $conn->query( $sql ) == true ) {
//	echo "New record created successfully";

	$getid = "SELECT * FROM requisicao";
	$result = $conn->query($getid);
	while($row = mysqli_fetch_assoc($result)){
		if($row['veiculo_requisicao'] == $veiculo && $row['requisitante_requisicao'] == $utilizador && $row['data_inicial_requisicao']
		== $datainicial && $row['data_final_requisicao'] == $datafinal && $row['hora_inicial_requisicao'] == $horainicial &&
		$row['hora_final_requisicao'] == $horafinal){
			$idRequisicao = $row['id_requisicao'];
		}
	}


	// ENVIO DE EMAILS //

	//LOAD COMPOSER
	require 'vendor/autoload.php';

	//Instantiation and passing `true` enables exceptions
	$mail = new PHPMailer( true );

	try {
		//SERVER SETTINGS
		$mail->SMTPDebug = SMTP::DEBUG_SERVER;
		$mail->SMTPDebug = 0; //Enable verbose debug output
		$mail->isSMTP();  //Send using SMTP
		$mail->Host       = 'smtp.office365.com';  //Set the SMTP server to send through
		$mail->SMTPAuth   = true;   //Enable SMTP authentication
		$mail->Username   = 'tomasmorais@sefo.pt';  //SMTP username
		$mail->Password   = 'Vol60153';  //SMTP password
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
		$mail->Port       = 587; //Port of SMTP
		$mail->CharSet    = 'UTF-8';    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

		//Recipients
		$mail->setFrom( 'tomasmorais@sefo.pt', 'Requisições ESCO' ); //Account that recives the Emails
		$mail->addAddress( 'tomasmorais@sefo.pt' );     //Add a recipient - Name is optional

		//Content
		$mail->isHTML( true );//Set email format to HTML

		//Body of the Email
		$bodyemail = "<p><strong>REQUISIÇÂO DE  VÉICULOS</strong>
						<p><strong>Número da Requisição:</strong> " . $idRequisicao . " </p>
						<p><strong>Requisitante:</strong> " . $utilizador . " </p>
						<p><strong>Email do Requisitante:</strong> " . $emailuser . "</p>
						<p><strong>Veiculo da Requisição:</strong> " . $veiculo . "</p>	
						<p><strong>Destino da Requisição:</strong> " . $destinoinicial . "</p>
						<p><strong>Data e Horas Inicial:</strong> " . $datainicial . " " . $horainicial . "</p>
						<p><strong>Data e Horas Finais:</strong> " . $datafinal . " " . $horafinal . "</p>
						<p><strong>Lotação:</strong> " . $lotacao . "</p>
						<p><strong>Descrição:</strong> " . $descricao . "</p>
						<a href='https://www.sefo.pt/Requisicao/processoEmail.php?id=$idRequisicao& estado=3' target='_blank' style='margin-left:p10px;background-color:#7FFF00;border: none;color: white;padding: 10px 15px;text-align: center;text-decoration: none; display: inline-block; font-size: 16px; '>Aceitar</a>
						<a href='https://www.sefo.pt/Requisicao/processoEmail.php?id=$idRequisicao& estado=3' target='_blank' style='margin-left:p10px;background-color:#f44336;border: none;color: white;padding: 10px 15px;text-align: center;text-decoration: none; display: inline-block; font-size: 16px; '>Recusar</a>";

		$mail->Subject = 'Requisição';   // Title of the Requist
		$mail->Body    = $bodyemail . '<br><div style="position:absolute; bottom:0;"><div class="rps_fda3" data-ogsc="" 
		style="color: rgb(255, 255, 255) !important; --darkreader-inline-color:#f9f8f5;"data-darkreader-inline-color = "" ><div lang = "PT" link = "#0563C1" vlink = "#954F72" style = "word-wrap:break-word" ><table class = "x_MsoNormalTable" border = "0" cellspacing = "3" cellpadding = "0" width = "586" style = "width: 439.5pt; transform: scale(0.422222, 0.422222); transform-origin: left top;" min-scale = "0.4222222222222222"><tbody><tr style = "height:69.75pt"><td width = "474" style = "width:355.5pt; padding:.75pt .75pt .75pt .75pt; height:69.75pt"><p class = "x_MsoNormal" align = "center" style = "text-align:center"><b><span style = "" ><img data-imagetype = "External" src = "http://www.sefo.pt/wp-content/uploads/assinatura.png" border = "0" width = "467" height = "110" id = "x__x0000_i1029" style = "width:4.8666in; height:1.15in" ></span></b><b><span style = "" ></span></b></p></td><td width = "96" style = "width:72.0pt; padding:.75pt .75pt .75pt .75pt; height:69.75pt"><p class = "x_MsoNormal"><a href = "https://pt-pt.facebook.com/ESCOTVedras" target = "_blank" rel = "noopener noreferrer" data-auth = "NotApplicable" data-linkindex = "1"><span style = "color: rgb(222,152,255) !important; text-decoration: none; --darkreader-inline-color:#ea9cff;" data-ogsc = "blue" data-darkreader-inline-color = "" ><img data-imagetype = "External" src = "http://www.sefo.pt/wp-content/uploads/facebook-square.png" border = "0" width = "45" height = "45" id = "x__x0000_i1028" alt = "" style = "width:.4666in; height:.4666in"></span></a><span style = "">&nbsp;</span><a href="https://twitter.com/ESCOTVedras" target="_blank" rel = "noopener noreferrer" data-auth = "NotApplicable" data-linkindex = "2"><span style = "color: rgb(222, 152, 255) !important; text-decoration: none; --darkreader-inline-color:#ea9cff;" data-ogsc = "blue" data-darkreader-inline-color = ""><img data-imagetype = "External" src = "http://www.sefo.pt/wp-content/uploads/Twitter-square.png" border = "0" width = "45" height = "45" id = "x__x0000_i1027" alt = "" style = "width:.4666in; height:.4666in"></span></a><a href = "https://www.linkedin.com/company/ESCOTVedras" target = "_blank" rel = "noopener noreferrer" data-auth = "NotApplicable" data-linkindex = "3"><span style = "color: rgb(222, 152, 255) !important; text-decoration: none; --darkreader-inline-color:#ea9cff;" data-ogsc = "blue" data-darkreader-inline-color = ""><img data-imagetype = "External" src = "http://www.sefo.pt/wp-content/uploads/Linkedin-square.png" border = "0" width = "45" height = "45" id = "x__x0000_i1026" alt = "" style = "width:.4666in; height:.4666in"></span></a><span style = "">&nbsp;</span><a href="https://www.instagram.com/escotvedras/" target = "_blank" rel = "noopener noreferrer" data-auth = "NotApplicable" data-linkindex = "4"><span style = "color: rgb(222, 152, 255) !important; text-decoration: none; --darkreader-inline-color:#ea9cff;" data-ogsc = "blue" data-darkreader-inline-color = ""><img data-imagetype = "External" src = "http://www.sefo.pt/wp-content/uploads/Instagram-square.png" border = "0" width = "45" height = "45" id = "x__x0000_i1025" alt = "" style = "width:.4666in; height:.4666in"></span></a><span style = "" ></span></p></td></tr></tbody></table></div><p class = "x_MsoNormal"><span style = "">&nbsp;</span></p><p class = "x_MsoNormal" >&nbsp;</p></div></div><div></div>';

		$mail->send();
	} catch ( Exception $e ) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
	header( "location:index.php" );

} else {
	echo "erro";
}

//Testes
//echo($queryRegist);
//echo($utilizador);
//echo($datainicial . " " . $horainicial);
//echo($horainicial);
//echo($horafinal);

