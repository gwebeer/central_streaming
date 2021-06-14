<?php

    $arquivo_nome = $_FILES['file']["name"];

    $arquivoFoto = explode("/", $arquivo_nome);
    $nome_foto = strtolower(end($arquivoFoto));
    $nome_banco = "../images/" . $nome_foto;
    
    $arquivo = explode(".", $arquivo_nome);
    $arquivo_ext = strtolower(end($arquivo));

    $largura = 200;
    $altura = 200;

    if($arquivo_ext == "png") {
        $imagem_temp = imagecreatefrompng($_FILES['file']["tmp_name"]);
        $largura_original = imagesx($imagem_temp);
        $altura_original = imagesy($imagem_temp);

        $porcentagem = (($largura * 100) / $largura_original) * 0.01;
        
        $largura_nova = $largura_original * $porcentagem;
        $altura_nova = $altura_original * $porcentagem;

        $imagem_redimensionada = imagecreatetruecolor($largura_nova, $altura_nova);

        imagecopyresampled($imagem_redimensionada, $imagem_temp, 0, 0, 0, 0, $largura_nova, $altura_nova, $largura_original, $altura_original);

        imagepng($imagem_redimensionada, $nome_banco);
    } else if($arquivo_ext == "jpg") {
        $imagem_temp = imagecreatefromjpg($_FILES['file']["tmp_name"]);
        $largura_original = imagesx($imagem_temp);
        $altura_original = imagesy($imagem_temp);

        $porcentagem = (($largura * 100) / $largura_original) * 0.01;
        
        $largura_nova = $largura_original * $porcentagem;
        $altura_nova = $altura_original * $porcentagem;

        $imagem_redimensionada = imagecreatetruecolor($largura_nova, $altura_nova);

        imagecopyresampled($imagem_redimensionada, $imagem_temp, 0, 0, 0, 0, $largura_nova, $altura_nova, $largura_original, $altura_original);

        imagejpg($imagem_redimensionada, $nome_banco);
    }

?>