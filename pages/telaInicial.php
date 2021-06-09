<?php 
    /* // Inicia a sessao
    session_start();
    
    // Verifica se a sessao ja foi autenticada
    if($_SESSION['usuario'] != "") {
        header("Location: ../pages/catalogo.php");
        die();
    } */
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Central Streaming</title>

    <!-- IMPORTANDO BULMA -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bulma-pricingtable.min.css"> 
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.1/css/bulma.min.css"> -->

    <link rel="stylesheet" href="../css/telaInicial.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    
    <script type="text/javascript" src="../js/jquery-3.6.0.js"> </script>
    <script type="text/javascript" src="../js/sjcl.js"> </script>    
    <script type="text/javascript" src="../js/telaInicial.js"> </script>

</head>
<body>
    <div class="backgroundImage">

        <div class="planos">
            <div class="content-planos">
                <div class="pricing-table" style="display: flex; justify-content: center; align-items: center;">
                    <div class="pricing-plan is-warning">
                        <div class="plan-header"> Plano Básico </div>
                        <div class="plan-price"><span class="plan-price-amount"><span class="plan-price-currency">R$</span>15</span>/mes</div>
                        <div class="plan-items">
                            <div class="plan-item"> 1 Perfil </div>
                            <div class="plan-item"> 1 Conteudo por dia </div>
                            <div class="plan-item"> - </div>
                        </div>
                        <div class="plan-footer">
                            <button class="button is-fullwidth" id="btPlanoBasico" onclick="fBtPlanoBasicoClick()"> Selecionar </button>
                        </div>
                    </div>
            
                    <div class="pricing-plan is-active">
                        <div class="plan-header"> Plano Intermediário </div>
                        <div class="plan-price"><span class="plan-price-amount"><span class="plan-price-currency">R$</span>25</span>/mes</div>
                        <div class="plan-items">
                            <div class="plan-item"> 3 Perfis </div>
                            <div class="plan-item"> 3 Conteudos por dia </div>
                            <div class="plan-item"> - </div>
                        </div>
                        <div class="plan-footer">
                            <button class="button is-fullwidth" id="btPlanoIntermediario" onclick="fBtPlanoIntermediarioClick()"> Selecionar </button>
                        </div>
                    </div>
            
                    <div class="pricing-plan is-danger">
                        <div class="plan-header"> Plano Premium </div>
                        <div class="plan-price"><span class="plan-price-amount"><span class="plan-price-currency">R$</span>35</span>/mes</div>
                        <div class="plan-items">
                            <div class="plan-item"> Perfis Ilimitados </div>
                            <div class="plan-item"> Conteudo Ilimitados </div>
                            <div class="plan-item"> Acesso Simultaneo </div>
                        </div>
                        <div class="plan-footer">
                            <button class="button is-fullwidth" id="btPlanoPremium" onclick="fBtPlanoPremiumClick()"> Selecionar </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pagamento">
            <div class="content-pagamento">
                <div class="infoPagamentos">
                    <h2 class="title title-second" style="line-height: 5px; text-align: center;">Informações do Pagamento</h2>
            
                    <p class="description description-second" style="text-align: center;">Insira os dados do seu cartão de crédito</p>
                    <p class="description description-second" style="text-align: center;">Fique tranquilo! Seus dados estão seguros!</p>
                    <form class="form form-pagamento">
                        <label class="label-input" for="">
                            <i class="far fa-user icon-modify"></i>
                            <input type="text" name="nome" placeholder="Nome do Titular" id="tNomeCartao">
                        </label>

                        <label class="label-input" for="">
                            <i class="far fa-user icon-modify"></i>
                            <input type="text" name="nome" placeholder="CPF do Titular" id="tCpfCartao">
                        </label>
            
                        <label class="label-input" for="">
                            <i class="far fa-envelope icon-modify"></i>
                            <input type="text" name="numeroCartao" placeholder="Numero do Cartão" id="tNumCartao">
                        </label>
            
                        <label class="label-input" for="">
                            <i class="fas fa-lock icon-modify"></i>
                            <input type="text" name="dataVencimentoCartao" placeholder="Data de Vencimento" id="tDtVencimentoCartao">
                        </label>

                        <label class="label-input" for="">
                            <i class="fas fa-lock icon-modify"></i>
                            <input type="text" name="cvc" placeholder="CVC" id="tCvc">
                        </label>
                        
                        <a href="telaInicial.html" > <button class="btn btn-second" id="btPagamento" onclick="fBtFinalizaClick()"> Finalizar</button> </a>

                    </form>
                </div>
            </div>
        </div>

        <div class="container">
            
            <div class="content first-content">
                <div class="first-column">
                    <img class="logoIndex" src="../images/logo.png" style="width: 35%; margin-bottom: 20px;" />
                    <h2 class="title title-primary">Já tem uma conta?</h2>
                    <p class="description description-primary">Faça o login e continue</p>
                    <p class="description description-primary">a maratonar suas séries e filmes preferidos!</p>
                    <button id="signin" class="btn btn-primary">Entrar</button>
                </div>    
                
                <!-- HTML DINAMICO -->
                <div class="second-column second-column-cadastro">

                    <h2 class="title title-second">Crie sua conta</h2>
    
                    <div class="social-media">
                        <ul class="list-social-media">
                            <a class="link-social-media" href="#">
                                <li class="item-social-media">
                                    <i class="fab fa-facebook-f"></i>
                                </li>
                            </a>
              
                            <a class="link-social-media" href="#">
                                <li class="item-social-media">
                                    <i class="fab fa-google-plus-g"></i>
                                </li>
                            </a>
              
                            <a class="link-social-media" href="#">
                                <li class="item-social-media">
                                    <i class="fab fa-linkedin-in"></i>
                                </li>
                            </a>
                       </ul>
                    </div>
          
                    <p class="description description-second">ou use seu endereço de e-mail:</p>
                    <div class="form">
                        <label class="label-input" for="">
                            <i class="far fa-user icon-modify"></i>
                            <input type="text" name="nome" placeholder="Nome Completo" id="tNome">
                        </label>
          
                        <label class="label-input" for="">
                            <i class="far fa-envelope icon-modify"></i>
                            <input type="email" name="email" placeholder="E-mail" id="tEmail">
                        </label>
          
                        <label class="label-input" for="">
                            <i class="fas fa-lock icon-modify"></i>
                            <input type="password" placeholder="Senha" id="tSenha">
                        </label>
          
                        <button class="btn btn-second" id="btCadastro"> Cadastrar </button>     
                        
                    </div>
          
                </div>
                <!-- FIM HTML DINAMICO -->
            </div><!-- first content -->
            
            
            
            <div class="content second-content">
                <div class="first-column">
                    <img class="description description-primary" src="../images/logo.png" style="width: 35%; margin-bottom: 20px;" />
                    <h2 class="title title-primary">Novo por aqui?</h2>
                    <p class="description description-primary">Cadastre-se agora para</p>
                    <p class="description description-primary">maratonar suas séries e filmes preferidos!</p>
                    <button id="signup" class="btn btn-primary">Cadastrar</button>
                </div>
                <div class="second-column">
                    <h2 class="title title-second"> Bem-vindo de volta! </h2>
                    <div class="social-media">
                        <ul class="list-social-media">
                            <a class="link-social-media" href="#">
                                <li class="item-social-media">
                                    <i class="fab fa-facebook-f"></i>
                                </li>
                            </a>
                            <a class="link-social-media" href="#">
                                <li class="item-social-media">
                                    <i class="fab fa-google-plus-g"></i>
                                </li>
                            </a>
                            <a class="link-social-media" href="#">
                                <li class="item-social-media">
                                    <i class="fab fa-linkedin-in"></i>
                                </li>
                            </a>
                        </ul>
                    </div><!-- social media -->
                    <p class="description description-second">ou use seu endereço de e-mail:</p>
                    <form class="form">
                    
                        <label class="label-input" for="">
                            <i class="far fa-envelope icon-modify"></i>
                            <input type="email" placeholder="E-mail" id="tEmailLogin" name="usuario">
                        </label>
                    
                        <label class="label-input" for="">
                            <i class="fas fa-lock icon-modify"></i>
                            <input type="password" placeholder="Senha" id="tSenhaLogin">
                        </label>

                        <input type="hidden" placeholder="Senha" name="senhaHash">
                    </form>

                    <button class="btn btn-second" id="btEntrar"> Entrar </button>
                    <button class="password" id="btEsquece">Esqueci minha senha</button>

                </div>
            </div>
        </div>
    </div>
    <script src="../js/templateTelaInicial.js"></script>
</body>
</html>