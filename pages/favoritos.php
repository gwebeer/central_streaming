<?php 
    // Inicia a sessao
    session_start();
    
    // Verifica se a sessao ja foi autenticada
    if($_SESSION['usuario'] == "") {
        header("Location: ../pages/telaInicial.php");
        die();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Central Streaming </title>
    <!-- TEMPLATE SITE -->
    <link rel="stylesheet" href="../css/templateHome.css">
    <!-- ESTILO PAGINA -->
    <link rel="stylesheet" href="../css/catalogo.css">

    <script type="text/javascript" src="../js/jquery-3.6.0.js"> </script>
    <script type="text/javascript" src="../js/favoritos.js"> </script>    
</head>
<body>
    <div class="page">
    <div class="header">
            <img src="../images/logo.png" class="imgHeader">
            <div class="menu">
                <a href="../pages/catalogo.php" class="menuItem">INICIO</a>
                <a href="#" class="menuItem">CATEGORIAS</a>
                <a href="../pages/favoritos.php" class="menuItem">MEUS FAVORITOS</a>
                <a href="#" class="menuItem">ASSISTIDOS</a>
            </div>
    
            <div class="menu user">
                <a href="../pages/minhaConta.php" class="menuItem">MINHA CONTA</a>
                <a href="#" class="menuItem">SAIR</a>
            </div>
        </div>

        <div class="cards">
            <!-- MODEL 
            <div class="card-filme">
                <img src="../images/capa1.jpeg" class="img-filme"> 
                <h3 class="title-filme"> TENET </h3>
                <button type="button" class="btn-filme">Assistir</button>
            </div> -->
        </div>
    </div>

</body>
</html>