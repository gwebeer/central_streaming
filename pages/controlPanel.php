<?php 
    // Inicia a sessao
    session_start();
        
    // Verifica se a sessao ja foi autenticada
    if($_SESSION['usuario'] == "") {
        header("Location: ../pages/telaInicial.php");
        die();
    } else {
        // Verifica se o usuario e admin
        if($_SESSION['admin'] == 0) {
            header("Location: ../pages/catalogo.php");
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

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    
    <!-- TEMPLATE SITE -->
    <link rel="stylesheet" href="../css/templateHome.css">
    <!-- ESTILO PAGINA -->
    <link rel="stylesheet" href="../css/controlPanel.css">

    <!-- IMPORTA JQUERY -->
    <script type="text/javascript" src="../js/jquery-3.6.0.js"> </script>
    <!-- IMPORTA JS PAGINA -->
    <script type="text/javascript" src="../js/controlPanel.js"> </script>    
</head>
<body>
    <div class="page">
        <div class="header">
            <img src="../images/logo.png" class="imgHeader">
            <div class="menu">
                <a href="../html/catalogo.html" class="menuItem">INICIO</a>
                <a href="#" class="menuItem">CATEGORIAS</a>
                <a href="../HTML/listaFavoritos.html" class="menuItem">MEUS FAVORITOS</a>
                <a href="#" class="menuItem">ASSISTIDOS</a>
            </div>
    
            <div class="menu user">
                <a href="../html/minhaConta.html" class="menuItem">MINHA CONTA</a>
                <a href="#" class="menuItem">SAIR</a>
            </div>
        </div>

        <div class="content">
            <div class="conteudo">
                <div class="admins">
                    <h2 class="subtitle">Gerenciar Administradores</h2>
                    <label>Para controlar o acesso de administrador ao usuário <br> desejado, digite o e-mail dele:</label> <br>
                    <input type="text" id="email" placeholder="E-mail Usuário"> <br>
                    <button id="btAddAdmin" class="btAdmin">Tornar Administrador</button>
                    <button id="btRemoveAdmin" class="btAdmin">Remover Administrador</button>
                </div>

                <div class="novosTitulos">
                    <h2 class="subtitle">Adicionar Filme/Série</h2>
                    <label>Preencha as informações abaixo: </label> <br> <br>
                    <label>Título:</label> <br>
                    <input type="text" class="inputAddTitulo" id="titulo" placeholder="Titulo"> <br>
                    <label>Gênero:</label> <br>
                    <input type="text" class="inputAddTitulo" id="genero" placeholder="Gênero"> <br>
                    <label>Ano:</label> <br>
                    <input type="text" class="inputAddTitulo" id="ano" placeholder="Ano"> <br>
                    <label>Duração:</label> <br>
                    <input type="text" class="inputAddTitulo" id="duracao" placeholder="Duracao   (Ex:. 2h30)"> <br>
                    <label>Sinopse:</label> <br>
                    <input type="text" class="inputAddTitulo" id="sinopse" placeholder="Sinopse"> <br>
                    <!-- <textarea class="inputAddTitulo" id="sinopse"> </textarea> <br>-->
                    <label>Link trailer:</label> <br>
                    <input type="text" class="inputAddTitulo" id="trailer" placeholder="Trailer"> <br>
                    <div class="img-upload">
                        <label>Selecione a capa do filme: </label> <br>
                        <input type="file" class="inputAddTitulo" id="imagem" placeholder="Imagem">
                    </div>
                    <button class="btCadastrarFilme">Cadastrar</button>
                </div>

                <!-- EDITAR TITULOS
                <div class="novosTitulos">
                    <h2 class="subtitle">Editar título</h2>
                    <label>Selecione o filme que deseja editar:</label> <br>
                    <select>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                      </select>
                </div> -->
            </div>
        </div>
    </div>

</body>
</html>