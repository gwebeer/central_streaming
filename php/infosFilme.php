<?php 
    // Obtem configuracoes banco
    require "../php/config.php";

    // Puxa informacoes JavaScript
    $titulo = $_POST['titulo'];

    // Seta a query de puxar informações do titulo
    $sql = "SELECT * FROM `titulo` WHERE titulo = '$titulo'";

    // Puxa informações banco
    $result = $conexao->query($sql);
    $qnt_linhas = mysqli_num_rows($result);

    // Seta retorno ao JavaScript
    if ($qnt_linhas > 0){ 
        echo json_encode($result->fetch_all(PDO::FETCH_ASSOC));
        
    } else {
        echo json_encode('Nenhum filme encontrado');
    }
?>