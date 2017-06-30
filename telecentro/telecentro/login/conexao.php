<?php

	error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
	
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "db_ctc";

    /*faz a conexão com o servidor*/
    $conexao = mysql_connect($servidor, $usuario, $senha, $banco) or die("Não foi possível conectar ao servidor de banco de dados!".mysqli_error());

    /*faz a conexão com o banco de dados*/
    mysql_select_db($banco)or die  ("Não foi possível conectar ao banco de dados!".mysqli_errno());

    mysql_query("SET NAMES 'utf8'");
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET character_set_client=utf8');
	mysql_query('SET character_set_results=utf8');
?>

