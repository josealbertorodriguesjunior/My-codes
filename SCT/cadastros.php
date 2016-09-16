<!DOCTYPE html>
<?php/*

// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION))
    session_start();
// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['logado'])) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: index.html");
    exit;
}*/
?>
<html lang="pt-br">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Ficha de Cadastro</title>
 <link href="css/bootstrap.min.css" rel="stylesheet">

 <link rel="icon" type="image/png" href="">

  <script src="js/bootstrap.min.js"> </script>
 <script type="text/javascript" language="javascript" src="js/jquery-1.9.1.js"></script>
  <script type="text/javascript" src="js/bootstrap-modalmanager.js"></script>
  <script type="text/javascript" src="js/bootstrap-modal.js"></script>
  <script type="text/javascript">
$(window).load(function(){
  $('a[name="remove_levels"]').on('click', function(e){
    var id = $(this).attr('id'); 
    document.getElementById("btn-sim").href="excluir.php?id="+id; 
	});
});
</script>
</head>

<body> 

<!-- Modal -->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalLabel">Excluir Item</h4>
            </div>
            <div class="modal-body">Deseja realmente excluir este item? </div>
            <div class="modal-footer">
                <a id="btn-sim" href="" class="btn btn-primary">Sim</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
            </div>
        </div>
    </div>
</div>

<!--NAVBAR -->
	<nav class="navbar navbar-inverse navbar-fixed-top">
 <div class="container-fluid">
  <div class="navbar-header">
   <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
   </button>
   <a class="navbar-brand" href="#">Sistema de cadastro de trabalhadores</a>
  </div>
  <div id="navbar" class="navbar-collapse collapse">
   <ul class="nav navbar-nav navbar-right">
   <li><a href="cadastros.php">HOME</a></li>
    <li><a href="logout.php">Sair</a></li>
   </ul>
  </div>
 </div>
</nav>
<br/><br/>
<div id="main" class="container-fluid">

<!--PARTE DE PESQUISAS -->
   <div id="top" class="row">
    <div class="col-md-3">
        <h2>Cadastros</h2>
    </div>
 
    <div class="col-md-6">
	<form action="cadastros.php" method="post" data-toggle="validator" role="form">
        <div class="input-group h2">
            <input name="search" class="form-control" id="search" type="text" placeholder="Pesquisar servidor">
            <span class="input-group-btn">
                <button class="btn btn-primary" type="submit">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>
	</form>	
    </div>

<!--BOTÃO  -->
    <div class="col-md-3">
        <a href="add_form.php" class="btn btn-primary pull-right h2">Novo Cadastro</a>
    </div>
     </div> <!-- /#top -->
 
     <hr />
     <div id="list" class="row">
      <div class="table-responsive col-md-12">
		<?php
		
		//função para escrever o q foi encontrado no select de busca
		function escreversearch($id){
			$mysqli = new mysqli("10.30.1.1", "rh","123456789","RhSaude");
			$res = $mysqli->query("SELECT `id`,`matricula`,`nome_completo` from cadastro WHERE id='$id'")  OR trigger_error($MySQLi->error, E_USER_ERROR);
			$res1 = $mysqli->query("SELECT `id_documentacao`,`rg`,`data_nascimento` from documentacao WHERE id_cadastro='$id'")  OR trigger_error($MySQLi->error, E_USER_ERROR);;
			$tab= $res->fetch_object();
			$tab1= $res1->fetch_object();
			
			$datanasci = date('d/m/Y', strtotime($tab1->data_nascimento));
			$retorno = "<tr><td>".$tab->matricula."</td><td>".$tab->nome_completo."</td><td>".$tab1->rg."</td><td>".$datanasci."</td><td class=\"actions\"><a class=\"btn btn-success btn-xs\" href=\"view.php?id=".$tab->id."\">Visualizar</a><a class=\"btn btn-warning btn-xs\" href=\"edit.php?id=".$tab->id."\">Editar</a><a class=\"btn btn-danger btn-xs\"  id=".$tab->id." name=\"remove_levels\" data-toggle=\"modal\" data-target=\"#delete-modal\">Excluir</a></td></tr>";						

		return $retorno;
		}
		
		// pega data com / e inverte para - para ser pesquisada no BD
		function invertedata($data){
			if(count(explode("/",$data)) > 1){
				return implode("-",array_reverse(explode("/",$data)));
			}elseif(count(explode("-",$data)) > 1){
				return implode("/",array_reverse(explode("-",$data)));
			}
		}
		//variaveis que controlam o que ja foi escrito no HTML, para não haver repetições!
		$IdArray = array();
		$contIdArray=0;			
		
		// montando paginação
			    //A quantidade de valor a ser exibida
					$quantidade = 25;
				//a pagina atual
					$pagina     = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
				//Calcula a pagina de qual valor será exibido
					$inicio     = ($quantidade * $pagina) - $quantidade;
			
				//monta navegação da paginação
					$mysqli = new mysqli("10.30.1.1", "rh","123456789","RhSaude");
					$qrtotal = $mysqli->query(" select id from cadastro") OR trigger_error($MySQLi->error, E_USER_ERROR);
					$numTotal= $qrtotal->num_rows;
					
		//O calculo do Total de página ser exibido
					$totalPagina= ceil($numTotal/$quantidade);	
					$exibir =7;
		    		$anterior  = (($pagina - 1) == 0) ? 1 : $pagina - 1;
					$posterior = (($pagina+1) >= $totalPagina) ? $totalPagina : $pagina+1;
					
		//verifica se teve post do buscar		
		if (($_POST) AND (!empty($_POST["search"]))){
		
					$mysqli = new mysqli("10.30.1.1", "rh","123456789","RhSaude");
					$con = $mysqli;
					$buscar = mysqli_real_escape_string($con,$_POST["search"]);
					
					//informação do buscar
					echo "<p><strong>Buscando por: </strong>".$buscar."</p><br>";
					
								//monta o head da tabela
					echo "<table class=\"table table-striped\" cellspacing=\"0\" cellpadding=\"0\">
											<thead>
												<tr>
													<th>Matrícula</th>
													<th>Nome</th>
													<th>RG</th>
													<th>Data Nascimento</th>
													<th class=\"actions\">Ações</th>
												</tr>
											</thead>
											<tbody>";
					
					//buscar por informação do buscar
					$seach1 = $mysqli->query("SELECT `id` from cadastro  WHERE matricula LIKE \"%$buscar%\" OR  nome_completo LIKE \"%$buscar%\" OR setor LIKE \"%$buscar%\" OR cargo LIKE \"%$buscar%\" OR data_admissao LIKE \"%".date('Y-m-d', strtotime(invertedata($buscar)))."%\" OR vinculo_empregaticio LIKE \"%$buscar%\" OR data_demissao_aposentadoria LIKE \"%".date('Y-m-d', strtotime(invertedata($buscar)))."%\" OR carga_horaria LIKE \"%$buscar%\" ")  OR trigger_error($MySQLi->error, E_USER_ERROR);
					$contlinhas1= $seach1->num_rows;	//quantos resultados encontrados nesta tabela					
					
					if($contlinhas1>0){						 
						while ($tabseach1= $seach1->fetch_object()) {
							$ideach = $tabseach1->id;
								$true=0;
								foreach($IdArray as $index=>$value){
									if ($IdArray[$index]== $ideach){
										$true=1;
									}
								}
								if($true==0){
									$IdArray[$contIdArray]=$ideach;					
									echo escreversearch($ideach);
									$contIdArray=$contIdArray +1;
								}	
						}
					}				
					 
					
					$seach2 = $mysqli->query("SELECT `id_cadastro` from documentacao  WHERE cpf LIKE \"%$buscar%\" OR  data_nascimento LIKE \"%".date('Y-m-d', strtotime(invertedata($buscar)))."%\" OR local_nascimento LIKE \"%$buscar%\" OR estado_nascimento LIKE \"%$buscar%\" OR carteira_trabalho LIKE \"%$buscar%\" OR serie_trabalho LIKE \"%$buscar%\" OR uf_trabalho LIKE \"%$buscar%\" OR exp_trabalho LIKE \"%".date('Y-m-d', strtotime(invertedata($buscar)))."%\" OR rg LIKE \"%$buscar%\" OR org_emissor_rg LIKE \"%$buscar%\" OR exp_rg LIKE \"%".date('Y-m-d', strtotime(invertedata($buscar)))."%\" OR titulo_eleitor LIKE \"%$buscar%\" OR zona_titulo LIKE \"%$buscar%\" OR secao_titulo LIKE \"%$buscar%\" OR pis_pasep LIKE \"%$buscar%\" ")  OR trigger_error($MySQLi->error, E_USER_ERROR);
					
					$contlinhas2= $seach2->num_rows; //quantos resultados encontrados nesta tabela		
				
					if($contlinhas2>0){						 
						while ($tabseach2= $seach2->fetch_object()) {
							$ideach = $tabseach2->id_cadastro;
								$true=0;
								foreach($IdArray as $index=>$value){
									if ($IdArray[$index]== $ideach){
										$true=1;
									}
								}
								if($true==0){
									$IdArray[$contIdArray]=$ideach;					
									echo escreversearch($ideach);
									$contIdArray=$contIdArray +1;
								}	
						}
					}
											
					
					$seach3 = $mysqli->query("SELECT `id_cadastro` from filiacao  WHERE pai LIKE \"%$buscar%\" OR  mae LIKE \"%$buscar%\" OR estado_civil LIKE \"%$buscar%\" OR escolaridade LIKE \"%$buscar%\" OR num_conselho LIKE \"%$buscar%\"")  OR trigger_error($MySQLi->error, E_USER_ERROR);
					
					$contlinhas3= $seach3->num_rows;	
					
					if($contlinhas3>0){						 
						while ($tabseach3= $seach3->fetch_object()) {
							$ideach = $tabseach3->id_cadastro;
								$true=0;
								foreach($IdArray as $index=>$value){
									if ($IdArray[$index]== $ideach){
										$true=1;
									}
								}
								if($true==0){
									$IdArray[$contIdArray]=$ideach;					
									echo escreversearch($ideach);
									$contIdArray=$contIdArray +1;
								}	
						}
					}
				
					$seach4 = $mysqli->query("SELECT `id_cadastro` from pessoal  WHERE endereco LIKE \"%$buscar%\" OR  bairro LIKE \"%$buscar%\" OR cidade LIKE \"%$buscar%\" OR email LIKE \"%$buscar%\" OR telefone LIKE \"%$buscar%\"")  OR trigger_error($MySQLi->error, E_USER_ERROR);
					
					$contlinhas4= $seach4->num_rows;	
					
					if($contlinhas4>0){						 
						while ($tabseach4= $seach4->fetch_object()) {
							$ideach = $tabseach4->id_cadastro;
								$true=0;
								foreach($IdArray as $index=>$value){
									if ($IdArray[$index]== $ideach){
										$true=1;
									}
								}
								if($true==0){
									$IdArray[$contIdArray]=$ideach;					
									echo escreversearch($ideach);
									$contIdArray=$contIdArray +1;
								}	
						}
					}	
					
					//fecha tabela
					echo "</tbody></table> ";
					if($contlinhas1==0 && $contlinhas2==0 && $contlinhas3==0 && $contlinhas4==0){
							echo "<p><strong>Nenhum resultado encontrado!</strong>";
					}	
		// se não veio informações do buscar, deve-se escrever a tabela com os cadastros normalmente			
		}else{
					
					$mysqli = new mysqli("10.30.1.1", "rh","123456789","RhSaude");
					
					$res = $mysqli->query("select cadastro.id, cadastro.matricula, cadastro.nome_completo, documentacao.rg, documentacao.data_nascimento from cadastro, documentacao where cadastro.id = documentacao.id_cadastro  ORDER BY  cadastro.id DESC LIMIT $inicio,$quantidade")  OR trigger_error($MySQLi->error, E_USER_ERROR);
				
					
					//$tab = $res->fetch_all(MYSQLI_ASSOC);	
					$total= $res->num_rows;										
						
						
						//monta o head da tabela
								echo "<table class=\"table table-striped\" cellspacing=\"0\" cellpadding=\"0\">
											<thead>
												<tr>
													<th>Matrícula</th>
													<th>Nome</th>
													<th>RG</th>
													<th>Data Nascimento</th>
													<th class=\"actions\">Ações</th>
												</tr>
											</thead>
											<tbody>";	
											
					//monta dados do banco					
						if($total >0){
							while ($tab = $res->fetch_object() ) {																		
									echo "<tr><td>".$tab->matricula."</td><td>".$tab->nome_completo."</td><td>".$tab->rg."</td><td>". date('d/m/Y', strtotime($tab->data_nascimento))."</td><td class=\"actions\"><a class=\"btn btn-success btn-xs\" href=\"view.php?id=".$tab->id."\">Visualizar</a><a class=\"btn btn-warning btn-xs\" href=\"edit.php?id=".$tab->id."\">Editar</a><a name=\"remove_levels\" id=".$tab->id." class=\"btn btn-danger btn-xs\"   data-toggle=\"modal\" data-target=\"#delete-modal\">Excluir</a></td></tr>";						
							}
						}
						
						echo "</tbody></table> ";
						
							
		//else continua depois do bloco html
		?>
     </div>
 </div> <!-- /#list -->
 
 
 <!-- /.pagination -->
     <div id="bottom" class="row">
      <div class="col-md-12">         
        <ul class="pagination">
		<?php       
			
			if ($pagina==1){
				echo "<li class=\"disabled\"><a  href=\"?pagina=1\" > Primeira</a></li>";
				echo "<li class=\"disabled\"><a>&lt; Anterior</a></li>";
			}else{
				echo "<li class=\"previous\"><a  href=\"?pagina=1\" >&lt; Primeira</a></li>";
				echo "<li class=\"previous\"><a href=\"?pagina=$anterior\">&lt; Anterior</a></li>";
			}
			
			for($i = $pagina; $i < $pagina+$exibir; $i++){
				if ($i== 1){
					if($i <= $totalPagina)
						echo "<li class=\"disabled\"><a href=\"?pagina=$i\"> $i </a></li>";
				}else{
					if($i <= $totalPagina)
						echo "<li><a href=\"?pagina=$i\"> $i </a></li>";
				}
			}
			
			

			if ($pagina!=$totalPagina){
				echo "<li class=\"next\"><a href=\"?pagina=$posterior\" >Proxima ></a></li>";
				echo "<li class=\"next\"><a href=\"?pagina=$totalPagina\" >Última</a></li>";
			}else{
				echo "<li class=\"disabled\"><a href=\"?pagina=$posterior\" >Proxima ></a></li>";
				echo "<li class=\"disabled\"><a href=\"?pagina=$totalPagina\" >Última</a></li>";
			}	
		
		}
		?>	
        </ul> 
     </div>
    </div> <!-- /#bottom -->




<br/><br/>


 <script src="js/bootstrap.min.js"></script>

</body>
</html>