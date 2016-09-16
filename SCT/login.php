<!--<?php/*

	$host = "10.30.1.1";
	$user = "rh";
	$password = "123456789";

	$usuario = $_POST['usuario'];
	$entrar = $_POST['entrar'];
	$senha = $_POST['senha'];
	$connect = mysql_connect($host, $user, $password);
	$db = mysql_select_db('RhSaude');
		if (isset($entrar)) {
			


			$verifica = mysql_query("SELECT * FROM login");
			$resultado = mysql_fetch_assoc($verifica);
			 if ($resultado['usuario'] != $usuario || $resultado['senha'] != $senha){
                    echo "<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='index.html';</script>";
                   session_destroy();
				   die();
                }else{
                   setcookie("login",$login);
				    if (!isset($_SESSION))
						session_start();
					 $_SESSION['logado']=true;
                    header("Location:cadastros.php");
                }
        }
*/?>-->
      
