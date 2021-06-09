<?php
    // Obtem configuracoes banco
    require "../php/config.php";

    // Puxa o email do usuario logado
    session_start();
    $email = $_SESSION['usuario'];

    // Puxa informacoes JavaScript
    $nome = $_POST["nome"] ;
    $numero = $_POST["numero"] ;
    $dtVencimento = $_POST["dtVencimento"] ;
    $cvc = $_POST["cvc"] ;

    // Seta a query de atualizar dados
    $sql = "UPDATE usuario SET nomeCartao = '$nome', numeroCartao = '$numero', dataVencimento = '$dtVencimento', cvc = '$cvc' WHERE email = '$email'";

    // Retorna o status da atualizacao de dados
    if ($conexao->query($sql) === TRUE) {
    echo json_encode("Record updated successfully");
    } else {
    echo json_encode("Error updating record: " . $conexao->error);
    }
?>