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
 <link rel="icon" type="image/png" href="">
 <link href="css/bootstrap.min.css" rel="stylesheet">
 <link href="css/style.css" rel="stylesheet">
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
      <div class="modal-body">
        Deseja realmente excluir este item?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Sim</button>
 <button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
      </div>
    </div>
  </div>
</div> <!-- /.modal -->

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
 <h3 class="page-header">Visualizar cadastro</h3>

 <div class="row">
   <div class="form-group col-md-2">
    <p><strong>Nome Completo</strong></p>
    <p><?php echo $tab1->nome_completo;  ?></p>
   </div>

   <div class="form-group col-md-2">
    <p><strong>Endereço</strong></p>
    <p><?php echo $tab4->endereco;  ?></p>
    </div>

   <div class="form-group col-md-2">
    <p><strong>Bairro</strong></p>
    <p><?php echo $tab4->bairro;  ?></p>
   </div>

   <div class="form-group col-md-2">
    <p><strong>Cidade</strong></p>
    <p><?php echo $tab4->cidade;  ?></p>
   </div>

   <div class="form-group col-md-2">
    <p><strong>Telefone</strong></p>
    <p><?php echo $tab4->telefone;  ?></p>
   </div>

    <div class="form-group col-md-2">
    <p><strong>Email</strong></p>
    <p><?php echo $tab4->email;  ?></p>
    </div>
</div>

  <div class="row">
   <div class="form-group col-md-2">
    <p><strong>Data Nacimento</strong></p>
    <p><?php $data_nascimento = date('d/m/Y', strtotime($tab2->data_nascimento)); echo $data_nascimento;  ?></p>
    </div>

   <div class="form-group col-md-2">
    <p><strong>Local</strong></p>
    <p><?php echo $tab2->local_nascimento;  ?></p>
   </div>

  <div class="form-group col-md-2">
    <p><strong>CPF</strong></p>
    <p><?php echo $tab2->cpf;  ?></p>
   </div>

    <div class="form-group col-md-2">
    <p><strong>RG</strong></p>
    <p><?php echo $tab2->rg;  ?></p>
    </div>

   <div class="form-group col-md-2">
    <p><strong>Estado Civil</strong></p>
    <p><?php echo $tab3->estado_civil;  ?></p>
    </div>

   <div class="form-group col-md-2">
    <p><strong>Escolaridade</strong></p>
    <p><?php echo $tab3->escolaridade;  ?></p>
   </div>
</div>

<div class="row">
   <div class="form-group col-md-3">
    <p><strong>Setor</strong></p>
    <p><?php echo $tab1->setor;  ?></p>
   </div>

   <div class="form-group col-md-3">
    <p><strong>Cargo</strong></p>
    <p><?php echo $tab1->cargo;  ?></p>
   </div>

   <div class="form-group col-md-3">
    <p><strong>Data Admissão</strong></p>
    <p><?php $data_admissao = date('d/m/Y', strtotime($tab1->data_admissao)); echo $data_admissao;  ?></p>
    </div>

   <div class="form-group col-md-3">
    <p><strong>Carga horária</strong></p>
    <p><?php echo $tab1->carga_horaria;  ?> horas</p>
   </div>
</div>


<hr />
<div id="actions" class="row">
 <div class="col-md-12">
  <a href="<?php echo "edit.php?id=".$id; ?>" class="btn btn-primary">Editar</a>
  <a href="cadastros.php" class="btn btn-default">Cancelar</a>
 </div>
</div>



 

<br/><br/>

 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
</body>
</html>