<?php 
    // Inicia a sessao
    session_start();
        
    // Verifica se a sessao ja foi autenticada
    if($_SESSION['usuario'] == "") {
        header("Location: ../pages/telaInicial.php");
        die();
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
    <link rel="stylesheet" href="../css/paginaFilme.css">

    <!-- IMPORTA JQUERY -->
    <script type="text/javascript" src="../js/jquery-3.6.0.js"> </script>
    <!-- IMPORTA JS PAGINA -->
    <script type="text/javascript" src="../js/paginaFilme.js"> </script>     
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

        <div class="content">
            <div class="conteudo">
                <div class="infoFilme">
                    <!-- 
                    <h1 class="nomeFilme">TITULO FILME</h1>
                    <h4 class="labelInfo">Sinopse</h4>
                    <p class="descInfo">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                        when an unknown printer took a galley of type and scrambled it to make a type 
                        specimen book.</p>

                    <div class="infoFlex">
                        <div class="infoMenor">
                            <h4 class="labelMenor">Gênero</h4>
                            <p class="descMenor"> Ação </p>
                        </div>

                        <div class="infoMenor">
                            <h4 class="labelMenor">Ano</h4>
                            <p class="descMenor"> 2020 </p>
                        </div>

                        <div class="infoMenor">
                            <h4 class="labelMenor">Duração</h4>
                            <p class="descMenor"> 2h30 </p>
                        </div>
                    </div>

                    <button class="btFilme" id="btFavorito"> Adicionar a Meus Favoritos </button>
                    <button class="btFilme" id="btAssistir"> Assistir </button> -->

                </div>

                <div class="trailerFilme">
                    <!-- <iframe class="videoTrailer" src="https://www.youtube.com/embed/EkjPOpbOlSc"></iframe> -->
                </div>
            </div>
        </div>
    </div>

</body>
</html>