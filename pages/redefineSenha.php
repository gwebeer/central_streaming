<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/redefineSenha.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <script type="text/javascript" src="../js/jquery-3.6.0.js"> </script>
    <script type="text/javascript" src="../js/sjcl.js"> </script>    
    <script type="text/javascript" src="../js/redefineSenha.js"> </script>
</head>


<body>
    <div class="backgroundImage">
        <div class="container">
            <div class="content first-content">
                <div class="first-column">
                    <img class="logoIndex" src="../images/logo.png" style="width: 35%; margin-bottom: 20px;" />
                    <h2 class="title title-primary">Vamos recuperar sua senha?</h2>
                    <p class="description description-primary">Preencha os campos ao lado e pronto!</p>
                    <p class="description description-primary">Sua senha será atualizada!</p>
                </div>    
                
                <div class="second-column second-column-cadastro">

                    <h2 class="title title-second">Esqueci minha senha</h2>
        
                    <p class="description description-second">Digite sua nova senha</p>
                    <p class="description description-second">e volte a assistir!</p>
                    <br>
                    <div class="form">        
                        <label class="label-input" for="">
                            <i class="fas fa-lock icon-modify"></i>
                            <input type="password" placeholder="Nova Senha" id="tMudaSenha">
                        </label>
        
                        <label class="label-input" for="">
                            <i class="fas fa-lock icon-modify"></i>
                            <input type="password" placeholder="Confirmar Nova Senha" id="tMudaSenha2">
                        </label>
        
                        <button class="btn btn-second" id="btAlterar"> Alterar </button>     
                        
                    </div>
        
                </div>
            </div>
        </div>
    </div>
</body>
</html>