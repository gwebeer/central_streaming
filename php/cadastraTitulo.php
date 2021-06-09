<?php

    // Obtem configuracoes banco
    require "config.php";

    // Recebe os dados do JavaScript para cadastrar
    $titulo = $_POST["titulo"] ;
    $genero = $_POST["genero"] ;
    $ano = $_POST["ano"] ;
    $duracao =  $_POST["duracao"] ;
    $sinopse = $_POST["sinopse"] ;
    $trailer = $_POST["trailer"];
    $imagem = $_POST["imagem"] ;

    // Seta query de cadastro
    $resultado = mysqli_query($conexao, "INSERT INTO titulo (titulo, genero, ano, duracao, sinopse, trailer, imagem) 
    VALUES ('$titulo', '$genero', '$ano', '$duracao', '$sinopse', '$trailer', '$imagem')");

    // Seta retorno padrao (negativo)
    $retorno["status"] = "n";
	$retorno["mensagem"] = "erro ao cadastrar";

    if($resultado == true) {
        // Seta retorno positivo
		$retorno["status"] = "s";
		$retorno["mensagem"] = "cadastro realizado";
	}

    // Seta retorno JavaScript
    echo json_encode($retorno);
?>