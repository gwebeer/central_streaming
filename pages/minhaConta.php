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
    <link rel="stylesheet" href="../css/minhaConta.css">

    <!-- IMPORTA JQUERY -->
    <script type="text/javascript" src="../js/jquery-3.6.0.js"> </script>
    <!-- IMPORTA JS PAGINA -->
    <script type="text/javascript" src="../js/minhaConta.js"> </script>    
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

        <div class="container">
            <h3 class="subtitle">Alterar Dados de Cartão</h3>
            <div class="formCartao">
                <div class='divCampo'>
                    <p class="labelCampo"> Nome do Titular do Cartão </p>
                    <input class="campoForm" type="text" id="tNovoNome">
                </div>

                <div class='divCampo'>
                    <p class="labelCampo"> Numero do Cartao </p>
                    <input class="campoForm" type="text" id="tNovoNumero">
                </div>

                <div class='divCampo'>
                    <p class="labelCampo"> Data de Vencimento  </p>
                    <input class="campoForm" type="text" id="tNovaDtVenc">
                </div>

                <div class='divCampo'>
                    <p class="labelCampo"> CVC </p>
                    <input class="campoForm" type="text" id="tNovoCvc">
                </div>

                <button class="btAlteraCartao"> Alterar </button>
            </div>
        </div>

    </div>

</body>
</html>