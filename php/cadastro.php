<?php

    // Obtem configuracoes banco
    require "config.php";

    // Recebe os dados do JavaScript para cadastrar
    $nome = $_POST["nome"] ;
    $senha = $_POST["senha"] ;
    $email = $_POST["email"] ;
    $plano =  $_POST["plano"] ;
    $nomeCartao = $_POST["nomeCartao"] ;
    $numeroCartao = $_POST["numeroCartao"];
    $dataVencimento = $_POST["dataVencimentoCartao"] ;
    $cvc = $_POST["cvc"];

    // Seta query de cadastro
    $resultado = mysqli_query($conexao, "INSERT INTO usuario (nome, senha, email, plano, nomecartao, numerocartao, datavencimento, cvc) VALUES ('$nome', '$senha', '$email', '$plano', '$nomeCartao', '$numeroCartao', '$dataVencimento', '$cvc')");

    // Seta retorno padrao (negativo)
    $retorno["status"] = "n";
	$retorno["mensagem"] = "erro ao cadastrar usuario";
	$retorno["funcao"] = "cadastro";

    if($resultado == true) {
        // Seta retorno positivo
		$retorno["status"] = "s";
		$retorno["mensagem"] = "usuario cadastrado";
	}

    // Seta retorno JavaScript
    echo json_encode($retorno);
?>