<?php
require_once( 'bd.php' );
session_start();
//load.php
$data = array();
$query = "SELECT * FROM requisicao ORDER BY id_requisicao";
$statement = $conn->query($query);

while($row = mysqli_fetch_assoc($statement))
{
	$data[] = array(
		'id' => $row['id_requisicao'],
		'title' => $row['veiculo_requisicao'] . " - " . $row['requisitante_requisicao'],
		'start' => $row['data_inicial_requisicao'],
		'end' => $row['data_final_requisicao']

	);
}
echo json_encode($data);
?>



