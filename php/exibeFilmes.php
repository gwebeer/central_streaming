<?php 

    // Obtem configuracoes banco
    require "../php/config.php";

    // Seta query para puxar titulo e imagem de todos filmes cadastrados
    $sql = "SELECT titulo, imagem, idTitulo FROM titulo";

    // Executa funcao sql
    $result = $conexao->query($sql);
    $qnt_linhas = mysqli_num_rows($result);

    // Verifica se existem filmes cadastrados
    if ($qnt_linhas > 0){ 
        echo json_encode($result->fetch_all(PDO::FETCH_ASSOC));
        
    } else {
        echo json_encode('Nenhum filme encontrado');
    }
?>