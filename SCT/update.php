<?php
//verifica se houve POST ou usuario tentou digitar o endereço deste PHP
if ($_POST){
				
							//conexaobanco
			$mysqli = new mysqli("10.30.1.1", "rh","123456789","RhSaude");
			$con = $mysqli;
			
			$matricula =($_POST["campo1"]);
			$id =$_POST["campo34"];
			
			$res = $mysqli->query("SELECT `id`,`matricula` from `RhSaude`.`cadastro` WHERE matricula=".$matricula);
			$temmatricula = $mysqli->affected_rows;
			
		    $res = $mysqli->query("SELECT `id`,`matricula` from `RhSaude`.`cadastro` WHERE matricula=".$matricula." AND id=".$id);
			$TemIdMat = $mysqli->affected_rows;
			
			
			
			
			if (($temmatricula<2 && $TemIdMat==1) ||($temmatricula==0 && $TemIdMat==0)){
			
		
			
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
			
			
			
			$mysqli = new mysqli("10.30.1.1", "rh","123456789","RhSaude");

			//query update cadastro			
			$mysqli->query("UPDATE `RhSaude`.`cadastro` SET matricula='$matricula', nome_completo='$nome_completo',setor='$setor', cargo='$cargo',data_admissao='$data_admissao', vinculo_empregaticio='$vinculo',data_demissao_aposentadoria='$aposentadoria', carga_horaria='$carga' WHERE id='$id'") OR trigger_error($MySQLi->error, E_USER_ERROR);
			
			//query update pessoal
			$mysqli->query("UPDATE `RhSaude`.`pessoal` SET endereco='$endereco', bairro='$bairro', cidade='$cidade', email='$email', telefone='$telefone',id_cadastro='$id'  WHERE id_cadastro='$id'") OR trigger_error($MySQLi->error, E_USER_ERROR);
		
       		//query update documentação
			$mysqli->query("UPDATE `RhSaude`.`documentacao` SET cpf='$cpf', data_nascimento='$data_nascimento', local_nascimento='$local_nascimento', estado_nascimento='$estado_nascimento', carteira_trabalho='$carteira_trabalho', serie_trabalho='$serie_trabalho', uf_trabalho='$uf_trabalho', exp_trabalho='$exp_trabalho', rg='$rg', org_emissor_rg='$org_emissor_rg', exp_rg='$exp_rg', titulo_eleitor='$titulo_eleitor', zona_titulo='$zona_titulo', secao_titulo='$secao_titulo', pis_pasep='$pis_pasep',id_cadastro='$id'  WHERE id_cadastro='$id'") OR trigger_error($MySQLi->error, E_USER_ERROR);
			
			
			$mysqli->query("UPDATE `RhSaude`.`filiacao` SET pai='$pai', mae='$mae', estado_civil='$estado_civil', escolaridade='$escolaridade', num_conselho='$num_conselho',id_cadastro='$id' WHERE id_cadastro='$id'") OR trigger_error($MySQLi->error, E_USER_ERROR);
			
			echo "<script language='javascript' type='text/javascript'>alert('Os dados foram alterados com sucesso!');window.location.href= 'cadastros.php';</script>";

			}else{
				echo "<script>window.setTimeout(\"history.back(-2)\", 200);alert('A matricula digitada já existe no banco de dados, verifique-a e tente novamente!');</script>";
			}	
		
}else{	
     header("Location: cadastros.php");	
}
?>
      
