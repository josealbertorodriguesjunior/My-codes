<?php


if (!empty($_GET["id"])) {
 
	$id =$_GET["id"];
	

	$mysqli = new mysqli("10.30.1.1", "rh","123456789","RhSaude") OR trigger_error($MySQLi->error, E_USER_ERROR);
	$con = $mysqli;
	// fazer delete 3 tabelas
	

	$mysqli->query("DELETE cadastro,documentacao, pessoal, filiacao FROM cadastro INNER JOIN documentacao INNER JOIN pessoal INNER JOIN filiacao WHERE cadastro.id=$id AND documentacao.id_cadastro=$id AND pessoal.id_cadastro=$id AND filiacao.id_cadastro=$id")OR trigger_error($MySQLi->error, E_USER_ERROR);
	
	//$mysqli->query( "delete  from cadastro where id_cadastro=".$id) OR trigger_error($MySQLi->error, E_USER_ERROR);
	
	//$mysqli->query("delete  from documentacao where id_documentacao=".$id) OR trigger_error($MySQLi->error, E_USER_ERROR);

	//$mysqli->query( "delete  from pessoal where id_pessoal=".$id) OR trigger_error($MySQLi->error, E_USER_ERROR);

	//$mysqli->query( "delete  from filiacao where id_filiacao=".$id) OR trigger_error($MySQLi->error, E_USER_ERROR);

	
     echo "<script language='javascript' type='text/javascript'>alert('Os dados foram excluídos com sucesso!');window.location.href= 'cadastros.php';</script>";
}else{
	header("Location: cadastro.php");
}

?>