<?php
    // Obtem configuracoes banco
    require "../php/config.php";

    // Puxa informacoes JavaScript
    $email = $_POST["email"] ;

    // Seta a query de atualizar dados
    $sql = "UPDATE usuario SET tipoConta = '0' WHERE email = '$email'";

    // Retorna o status da atualizacao de dados
    if ($conexao->query($sql) === TRUE) {
        echo json_encode("Record updated successfully");
    } else {
        echo json_encode("Error updating record: " . $conexao->error);
    }
?>