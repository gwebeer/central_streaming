<?php 
    // Inicia a sessao
    session_start();
    
    // Verifica se a sessao ja foi autenticada
    if($_SESSION['usuario'] == "") {
        header("Location: ../pages/telaInicial.php");
        die();
    } else {
        // Verifica se o usuario e admin
        if($_SESSION['admin'] == 1) {
            header("Location: ../pages/controlPanel.php");
            die();;
        }
    }
?>


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

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <!-- IMPORTA JQUERY -->
    <script type="text/javascript" src="../js/jquery-3.6.0.js"> </script>
    <!-- IMPORTA JS PAGINA -->
    <script type="text/javascript" src="../js/catalogo.js"> </script>    
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

        <div class="filtros"> 

            <label class="filtro-esc"> Filtrar por: </label>

            <select class="filtros-opt">
                <option class="options" id="sem_filtro"> Sem filtro </option>
                <option class="options" id="titulo"> Título </option>    
                <option class="options" id="genero"> Gênero </option>
                <option class="options" id="ano"> Ano </option>
            </select>

            <label class="filtro-esc"> Buscar por: </label>
            <input type="text" id="tInfoTitulo" class="info-filtros">

            <button class="bt-filtro" id="bt-buscar"> <i class="fas fa-search icon-bt"></i></i> </button>
            <button class="bt-filtro" id="bt-resetar"> <i class="fas fa-undo-alt icon-bt"></i> </button>
        <div>


        

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