<?php
//verifica se houve POST ou usuario tentou digitar o endereço deste PHP
if ($_POST){
				
							//conexaobanco
			$mysqli = new mysqli("10.30.1.1", "rh","123456789","RhSaude");
			$con = $mysqli;
			
			$matricula =($_POST["campo1"]);
			
			$res = $mysqli->query("SELECT `matricula` from `RhSaude`.`cadastro` WHERE matricula=".$matricula);
			$temmatricula = $mysqli->affected_rows;
			
		if ($temmatricula<1){
			
		
			
			//insert cadastro			 
			$nome_completo = mysqli_real_escape_string($con,$_POST["campo1"]);
			$endereco =  mysqli_real_escape_string($con,$_POST['campo2']);
			$bairro =  mysqli_real_escape_string($con,$_POST['campo3']);
			$cidade =  mysqli_real_escape_string($con,$_POST['campo4']);
			$telefone =  mysqli_real_escape_string($con,$_POST['campo5']);
			$email =  mysqli_real_escape_string($con,$_POST['campo6']);
			$data_admissao =  mysqli_real_escape_string($con,$_POST['campo7']);
			$carga =  mysqli_real_escape_string($con,$_POST['campo8']);
			$setor =  mysqli_real_escape_string($con,$_POST['campo9']);
			$cargo =  mysqli_real_escape_string($con,$_POST['campo10']);
			
			//insert pessoal
			$estado_civil =  mysqli_real_escape_string($con,$_POST['campo11']);
			$escolaridade =  mysqli_real_escape_string($con,$_POST['campo12']);
			$data_nascimento =  mysqli_real_escape_string($con,$_POST['campo13']);
			$local_nascimento =  mysqli_real_escape_string($con,$_POST['campo14']);
			$cpf =mysqli_real_escape_string($con,$_POST['campo15']);
			$rg =  mysqli_real_escape_string($con,$_POST['campo16']);
			
			
			

			
			//query insert cadastro			
			$mysqli->query("INSERT INTO  (nome_completo, endereco, bairro, cidade, email, telefone,setor, cargo,data_admissao,data_demissao_aposentadoria, carga_horaria) VALUES ('$matricula','$nome_completo','$setor','$cargo' ,'$data_admissao','$carga')") OR trigger_error($MySQLi->error, E_USER_ERROR);
			//pegar id do cadastro
			$chaveestrangeira = $mysqli->insert_id;				

			

       		//query insert pessoal
			$mysqli->query("INSERT INTO documentacao (estado_civil, escolaridade, cpf, data_nascimento, local_nascimento, rg, id_cadastro) VALUES 
				('$cpf','$data_nascimento', '$local_nascimento', '$estado_nascimento', '$carteira_trabalho', '$serie_trabalho', '$uf_trabalho','$exp_trabalho','$rg', '$org_emissor_rg', '$exp_rg', '$titulo_eleitor', '$zona_titulo', '$secao_titulo', '$pis_pasep','$chaveestrangeira')") OR trigger_error($MySQLi->error, E_USER_ERROR);
			
			
			
			
			echo "<script language='javascript' type='text/javascript'>alert('Os dados foram cadastrados com sucesso!');window.location.href= 'cadastros.php';</script>";

		}else{
			echo "<script>window.setTimeout(\"history.back(-2)\", 200);alert('A matricula digitada já existe no banco de dados, verifique-a e tente novamente!');</script>";
		}	
	
}else{	
     header("Location: add.html");	
}
?>
      
