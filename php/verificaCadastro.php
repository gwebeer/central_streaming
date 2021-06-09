<?php 
    // Obtem configuracoes banco
    require "config.php";

    // 
    $email = $_POST['email'];

    // Verifica se o e-mail já está cadastrado
    $queryVerifEmail = "SELECT * FROM `usuario` WHERE email = '$email'";
    $resultVerifEmail = $conexao->query($queryVerifEmail);
    $qnt_linhas = mysqli_num_rows($resultVerifEmail);

    // Imprime e da retorno ao JavaScript
    if ($qnt_linhas > 0){ 
        echo json_encode(true);        
    } else {
        echo json_encode(false);
    }
?>