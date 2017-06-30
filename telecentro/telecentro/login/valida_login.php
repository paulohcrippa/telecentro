<?php
session_start();

include_once("conexao.php");


$usuario = $_POST['usuario'];
$senha = $_POST['senha'];


$result = mysql_query("SELECT * FROM tb_usuario WHERE LOGIN='$usuario' AND SENHA='$senha' LIMIT 1");
$resultado = mysql_fetch_assoc($result);

//echo "usuario: ".$resultado['nomeusuario'];

	if(empty($resultado)){
		
		//mensagem de erro
		$_SESSION['loginErro'] = "
		<div class ='alert alert-danger' role='alert'>
		<strong>Erro ao logar!</strong> Usuário ou senha invalidos.
		
		</div>";
		
		//manda o usuario para o login
		
		header("Location: login.php");
	}else{
		
		// Define os valores atribuidos na sessao do usuário
		$_SESSION['usuarioCodigo'] 	= $resultado['CDUSUARIO'];
		$_SESSION['usuarioPerfil']	= $resultado['CDPERFIL'];
		$_SESSION['usuarioNome'] 	= $resultado['NMUSUARIO'];
		$_SESSION['usuarioEmail']	= $resultado['EMAIL'];
		$_SESSION['usuarioLogin'] 	= $resultado['LOGIN'];
		$_SESSION['usuarioSenha'] 	= $resultado['SENHA'];
		
		
		if($_SESSION['usuarioPerfil'] == 1){
			
			header("Location: ../principal.php?link=3");
		}	
		elseif($_SESSION['usuarioPerfil'] == 2){
			header("Location: ../principalinst.php?link=56");
		}
		else{
			header("Location: ../inicio.php");
		}
	}
?>