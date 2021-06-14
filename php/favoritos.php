<?php 

    // Obtem configuracoes banco
    require "../php/config.php";

    // Puxa o email do usuario logado
    session_start();
    $email = $_SESSION['usuario'];

    // Seta query para puxar titulo e imagem de todos filmes favoritos
    $sql = "SELECT usuario.email, titulo.titulo, titulo.genero, titulo.ano, titulo.duracao, titulo.sinopse, titulo.trailer, titulo.imagem, titulo.idTitulo
    FROM titulo JOIN favoritos
    ON favoritos.idTitulo = titulo.idTitulo
    JOIN usuario
    ON usuario.email = '$email'";

    // Executa funcao sql
    $result = $conexao->query($sql);
    $qnt_linhas = mysqli_num_rows($result);

    // Verifica se existem filmes nos favoritos
    if ($qnt_linhas > 0){ 
        echo json_encode($result->fetch_all(PDO::FETCH_ASSOC));
        
    } else {
        echo json_encode('Nenhum filme encontrado');
    }
?>