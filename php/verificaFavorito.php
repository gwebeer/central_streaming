<?php 
    // Obtem configuracoes banco   
    require "../php/config.php";

    // Puxa o email do usuario logado
    session_start();
    $email = $_SESSION['usuario'];

    // Puxa informacoes JavaScript
    $idTitulo = $_POST['idTitulo'];

    // Seta a query de atualizar dados
    $sql = "SELECT * FROM favoritos WHERE email = '$email' AND idTitulo = '$idTitulo'";

    // Retornos banco
    $result = $conexao->query($sql);
    $qnt_linhas = mysqli_num_rows($result);

    // Seta retorno ao JavaScript
    if ($qnt_linhas > 0){ 
        echo json_encode("Esta nos favoritos"); 
    } else {
        echo json_encode('Nao esta nos favoritos');
    }
?>