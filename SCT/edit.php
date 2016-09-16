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
}

if (!empty($_GET["id"])) {
 
	$id =$_GET["id"];
			$mysqli = new mysqli("10.30.1.1", "rh","123456789","RhSaude");
			
			$res = $mysqli->query("SELECT * from `RhSaude`.`cadastro` WHERE id=".$id)  OR trigger_error($MySQLi->error, E_USER_ERROR);
			$tab1= $res->fetch_object();
			
			$res1 = $mysqli->query("SELECT * from `RhSaude`.`documentacao` WHERE id_cadastro=".$id)  OR trigger_error($MySQLi->error, E_USER_ERROR);
			$tab2 = $res1->fetch_object();
			
			$res2 = $mysqli->query("SELECT * from `RhSaude`.`filiacao` WHERE id_cadastro=".$id)  OR trigger_error($MySQLi->error, E_USER_ERROR);
			$tab3 = $res2->fetch_object();
			
			$res3 = $mysqli->query("SELECT * from `RhSaude`.`pessoal` WHERE id_cadastro=".$id)  OR trigger_error($MySQLi->error, E_USER_ERROR);
			$tab4 = $res3->fetch_object();	
}else{
	header("Location: cadastro.php");
}*/

?>


<html lang="pt-br">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>SCT</title>
 <link rel="icon" type="image/png" href="images/logo.png">
 <link href="css/bootstrap.min.css" rel="stylesheet">
 <link href="css/style.css" rel="stylesheet">
 <script type="text/javascript" language="javascript" src="js/jquery-1.9.1.js"></script>
  <script type="text/javascript" src="js/bootstrap-modalmanager.js"></script>
  <script type="text/javascript" src="js/bootstrap-modal.js"></script>
</head>
<body> 
	<nav class="navbar navbar-inverse navbar-fixed-top">
 <div class="container-fluid">
  <div class="navbar-header">
   <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
   </button>
   <a class="navbar-brand" href="#">FCT</a>
  </div>
  <div id="navbar" class="navbar-collapse collapse">
   <ul class="nav navbar-nav navbar-right">
    <li><a href="cadastros.php">Cadastros</a></li>
    <li><a href="add_form.php">Adicionar Trabalhador</a></li>
    <li><a href="edit.php">Editar Trabalhador</a></li>
    <li><a href="view.php">Visualizar</a></li>
    <li><a href="logout.php">SAIR</a></li>
    <li> <a href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()"></a></li>
   </ul>
  </div>
 </div>
</nav><br/><br/>

<div id="main" class="container-fluid">
 <h3 class="page-header">Editar Trabalhador</h3>

 <form action="update.php" method="post" data-toggle="validator" role="form">
 <div class="row">
   <div class="form-group col-md-2">
      <label for="campo2">Nome Completo</label>
      <input type="text" class="form-control" id="campo2" name="campo1" required value="<?php echo $tab1->nome_completo;?>">
    </div>

    <div class="form-group col-md-2">
      <label for="campo9">Endereço</label>
      <input type="text" class="form-control" id="campo9" name="campo2" required value="<?php echo $tab1->endereco;?>">
    </div>

    <div class="form-group col-md-2">
      <label for="campo10">Bairro</label>
      <input type="text" class="form-control" id="campo10" name="campo3" required value="<?php echo $tab1->bairro;?>">
    </div>

    <div class="form-group col-md-2">
      <label for="campo11">Cidade</label>
      <input type="text" class="form-control" id="campo11" name="campo4" required value="<?php echo $tab1->cidade;?>">
    </div>

    <div class="form-group col-md-2">
      <label for="campo12">Telefone</label>
      <input type="tel" class="form-control" id="campo12" name="campo5" required value="<?php echo $tab1->telefone;?>">
    </div>

    <div class="form-group col-md-2">
      <label for="campo13">Email</label>
      <input type="e-mail" class="form-control" id="campo13" name="campo6" value="<?php echo $tab1->email;?>">
    </div>
</div>

<div class="row">
    <div class="form-group col-md-3">
      <label for="campo5">Data Admissão</label>
      <input type="date" class="form-control" id="campo5" name="campo7" value="<?php echo $tab1->data_admissao;?>" >
    </div>

    <div class="form-group col-md-3">
      <label for="campo8">Carga Horaria</label>
      <input type="number" class="form-control" id="campo8" name="campo8" required value="<?php echo $tab1->carga_horaria;?>">
    </div>

    <div class="form-group col-md-3">
      <label for="campo3">Setor</label>
      <input type="text" class="form-control" id="campo3" name="campo9" required value="<?php echo $tab1->setor;?>">
    </div>

     <div class="form-group col-md-3">
      <label for="campo3">Cargo</label>
      <input type="text" class="form-control" id="campo3" name="campo10" required value="<?php echo $tab1->cargo;?>">
    </div>
</div>

  <h3>Pessoal</h3></br>

<div class="row">
    <div class="form-group col-md-2">
      <label for="campo16">Estado Civil</label>
      <input type="text" class="form-control" id="campo16" name="campo11" value="<?php echo $tab2->estado_civil;?>">
    </div>

    <div class="form-group col-md-2">
      <label for="campo17">Escolaridade</label>
      <input type="text" class="form-control" id="campo17" name="campo12" required value="<?php echo $tab2->escolaridade;?>">
    </div>

    <div class="form-group col-md-2">
      <label for="campo19">Data Nascimento</label>
      <input type="date" class="form-control" id="campo19" name="campo13" required value="<?php echo $tab2->data_nascimento;?>">
    </div>

    <div class="form-group col-md-2">
      <label for="campo20">Local</label>
      <input type="text" class="form-control" id="campo20" name="campo14" required value="<?php echo $tab2->local_nascimento;?>">
    </div>

    <div class="form-group col-md-2">
      <label for="campo26">CPF</label>
      <input type="number" class="form-control" id="campo26" name="campo15" required value="<?php echo $tab2->cpf;?>">
    </div>

    <div class="form-group col-md-2">
      <label for="campo28">RG</label>
      <input type="text" class="form-control" id="campo28" name="campo16" required value="<?php echo $tab2->rg;?>">
    </div>
  </div>

  <div class="row"  hidden>
  <div class="form-group col-md-12"></div>
  <input type="number" name="campo34" value="<?php echo $tab1->id;  ?>">
  </div>

  <hr />
  <div id="actions" class="row">
    <div class="col-md-12">
     <a href="#myModal" data-toggle="modal" ><button class="btn btn-primary" data-toggle="modal"  >Salvar</button></a>
      <a href="cadastros.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</div>

<br/><br/>

<div class="bs-example">
   <!-- Modal HTML -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Atenção!</h4>
                </div>
                <div class="modal-body">
                    <p>Você gostaria realmente de atualizar as informações deste esse cadastro?</p>
                    <!--<p class="text-warning"><small>Se você não salvar, todas as informações serão perdidas</small></p>-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button  class="btn btn-primary" type="submit">SIM</button>
                </div>
            </div>
        </div>
    </div>
</div>    
</form>

 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
</body>
</html>