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
 <title>SCT</title>
 <link rel="icon" type="image/png" href="">
 <link href="css/bootstrap.min.css" rel="stylesheet">
 <link href="css/style.css" rel="stylesheet">
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
   <a class="navbar-brand" href="#">Sistema de cadastro de trabalhadores</a>
  </div>
  <div id="navbar" class="navbar-collapse collapse">
   <ul class="nav navbar-nav navbar-right">
    <li><a href="cadastros.php">HOME</a></li>
     <li><a href="logout.php">Sair</a></li>
   </ul>
  </div>
 </div>
</nav><br/><br/>

<div id="main" class="container-fluid">
 <h3 class="page-header">Adicionar Trabalhador</h3>

 <form action="add.php" method="post" data-toggle="validator" role="form">
  
<div class="row">
    <div class="form-group col-md-2">
      <label for="campo2">Nome Completo</label>
      <input type="text" class="form-control" id="campo2" name="campo1" required>
    </div>

    <div class="form-group col-md-2">
      <label for="campo9">Endereço</label>
      <input type="text" class="form-control" id="campo9" name="campo2" required>
    </div>

    <div class="form-group col-md-2">
      <label for="campo10">Bairro</label>
      <input type="text" class="form-control" id="campo10" name="campo3" required>
    </div>

    <div class="form-group col-md-2">
      <label for="campo11">Cidade</label>
      <input type="text" class="form-control" id="campo11" name="campo4" required>
    </div>

    <div class="form-group col-md-2">
      <label for="campo12">Telefone</label>
      <input type="tel" class="form-control" id="campo12" name="campo5" required>
    </div>

    <div class="form-group col-md-2">
      <label for="campo13">Email</label>
      <input type="e-mail" class="form-control" id="campo13" name="campo6">
    </div>
</div>

<div class="row">
    <div class="form-group col-md-3">
      <label for="campo5">Data Admissão</label>
      <input type="date" class="form-control" id="campo5" name="campo7" >
    </div>

    <div class="form-group col-md-3">
      <label for="campo8">Carga Horaria</label>
      <input type="number" class="form-control" id="campo8" name="campo8" required>
    </div>

    <div class="form-group col-md-3">
      <label for="campo3">Setor</label>
      <input type="text" class="form-control" id="campo3" name="campo9" required>
    </div>

     <div class="form-group col-md-3">
      <label for="campo3">Cargo</label>
      <input type="text" class="form-control" id="campo3" name="campo10" required>
    </div>
</div>

  <h3>Pessoal</h3></br>

<div class="row">
    <div class="form-group col-md-2">
      <label for="campo16">Estado Civil</label>
      <input type="text" class="form-control" id="campo16" name="campo11">
    </div>

    <div class="form-group col-md-2">
      <label for="campo17">Escolaridade</label>
      <input type="text" class="form-control" id="campo17" name="campo12" required>
    </div>

    <div class="form-group col-md-2">
      <label for="campo19">Data Nascimento</label>
      <input type="date" class="form-control" id="campo19" name="campo13" required>
    </div>

    <div class="form-group col-md-2">
      <label for="campo20">Local</label>
      <input type="text" class="form-control" id="campo20" name="campo14" required>
    </div>

    <div class="form-group col-md-2">
      <label for="campo26">CPF</label>
      <input type="number" class="form-control" id="campo26" name="campo15" required>
    </div>

    <div class="form-group col-md-2">
      <label for="campo28">&nbsp;&nbsp;&nbsp;&nbsp;RG</label>
      <input type="text" class="form-control" id="campo28" name="campo16" required>
    </div>
</div>


  <hr />
  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="cadastros.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>
</div>

<br/><br/>

 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
</body>
</html>