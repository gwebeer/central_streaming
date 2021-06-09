var dadosCadastrais = [];
var token;

$(document).ready(function(){
    fBotaoEntrarClick();
    fBtEsqueceuSenhaClick();
    fBotaoCadastroClick();
})




/* -+-+-+-+- EVENTOS DE CLICK -+-+-+-+- */ 
function fBotaoEntrarClick(){
    $("#btEntrar").click(function(){
        fComunicaServerLogin();        
    })
}
function fBtEsqueceuSenhaClick(){
    $("#btEsquece").click(function(){
        if($("#tEmailLogin").val() == ""){
            alert("Preencha seu e-mail no campo acima!");
        } else {
            alert("Verifique sua Caixa de Entrada e siga as instruções!");
            fRedefinirSenha(0);
        }
    })
}
function fBotaoCadastroClick(){
    $("#btCadastro").click(function(){
        fVerificaEmailCadastro();
    })
}
function fBtContinuarCadastroClick(){
    $("#btContinuarCadastro").click(function(){
        if(fComparaCodigos(token)){
            fAddTagsBulma();
            alert("Está quase lá! Vamos finalizar seu cadastro!")
            /* Esconde a tela de Login/Cadastro */
            $(".container").css('display','none')
            /* Mostra a tela plano */
            $(".planos").css('display','flex')
        } else {
            alert("Ops! Parece que os códigos não correspondem!")
        }
    })
}
function fBtPlanoBasicoClick(){
    dadosCadastrais[3] = 1;
    /* Esconde a tela de Planos */
    $(".planos").css('display','none');
    /* Mostra a tela pagamento */
    $(".pagamento").css('display','flex');
}
function fBtPlanoIntermediarioClick(){
    dadosCadastrais[3] = 2;
    /* Esconde a tela de Planos */
    $(".planos").css('display','none');
    /* Mostra a tela pagamento */
    $(".pagamento").css('display','flex');
}
function fBtPlanoPremiumClick(){
    dadosCadastrais[3] = 3;
    /* Esconde a tela de Planos */
    $(".planos").css('display','none');
    /* Mostra a tela pagamento */
    $(".pagamento").css('display','flex');
}
function fBtFinalizaClick(){
    dadosCadastrais[4] = $("#tNomeCartao").val();
    dadosCadastrais[5] = $("#tNumCartao").val();
    dadosCadastrais[6] = $("#tDtVencimentoCartao").val();
    dadosCadastrais[7] = $("#tCvc").val();
    console.log(dadosCadastrais);
    fCadastraBanco();
}





/* -+-+-+-+- OUTRAS FUNCOES -+-+-+-+- */ 
function fComparaCodigos(token){
    if(token == $("#tCodSeg").val()){
        return true;
    } else {
        return false;
    }
}
function fHashSenhas(senha){
    var bitArray = sjcl.hash.sha256.hash(senha);
    var hashSenha = sjcl.codec.hex.fromBits(bitArray);

    return hashSenha;
}
function fTokenGenerator(){
    return Math.floor(Math.random() * 999999) + 100000
}
function fConfirmaCadastro(){
    token = fTokenGenerator();
    dadosCadastrais[0] = $("#tNome").val();
    dadosCadastrais[1] = $("#tEmail").val();
    dadosCadastrais[2] = fHashSenhas($("#tSenha").val());
    fEnviaToken(1, token);
    fTelaConfirmaCadastro();
    fBtContinuarCadastroClick();
}



/* -+-+-+-+- COMUNICACOES AJAX -+-+-+-+- */ 
function fComunicaServerLogin(){
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../php/login.php",
        data: {
            emailLogin: $("#tEmailLogin").val(),
            senhaLogin: fHashSenhas($("#tSenhaLogin").val()),
        }, success: function(retorno){
            if(retorno.status == "s"){
                alert("Cadastrado");
                window.open('../pages/catalogo.php');
            } else {
                alert("Usuario ou senha incorretos!");
            }
        }
    })
}
function fRedefinirSenha(operacao){
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../php/sendEmail.php",
        data: {
            operacao: operacao,
            emailRec: $("#tEmailLogin").val(),
        },
        success: function(retorno){
        }
    });
}
function fVerificaEmailCadastro(){
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../php/verificaCadastro.php",
        data: {
            email: $("#tEmail").val(),
        },
        success: function(retorno){
            if(retorno) {
                alert("E-mail já cadastrado!")
            } else {
                fConfirmaCadastro();
            }
        }
    });
}
function fEnviaToken(operacao, token){
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../php/sendEmail.php",
        data: {
            operacao: operacao,
            email: $("#tEmail").val(),
            numero: token
        },
        success: function(retorno){
        }
    });
}
function fCadastraBanco(){
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../php/cadastro.php",
        data: {
            nome: dadosCadastrais[0],
            email: dadosCadastrais[1],
            senha: dadosCadastrais[2],
            plano: dadosCadastrais[3],
            nomeCartao: dadosCadastrais[4],
            numeroCartao: dadosCadastrais[5],
            dataVencimentoCartao: dadosCadastrais[6],
            cvc: dadosCadastrais[7],
        },
        success: function(retorno){
            alert("Cadastro Realizado com Sucesso! Faça o login para continuar")
            window.open('../pages/telaInicial.php');
        }
    });
}





/* ---------- MUDANCAS DINAMICAS HTML ---------- */
function fTelaConfirmaCadastro(){

    $('.second-column-cadastro').html('');
    var conteudo = ""
    conteudo +=     '<h2 class="title title-second">Confirme seu E-mail</h2>';
    conteudo +=     '<p class="description description-second">Verifique sua caixa de entrada!</p>';
    conteudo +=     '<p class="description description-second">Enviamos um código de segurança ao seu e-mail</p>';
    conteudo +=     '<p class="description description-second">Insira abaixo para finalizarmos seu cadastro</p>';
    conteudo +=     '<div class="form">';
    conteudo +=         '<label class="label-input" for="">';
    conteudo +=             '<i class="far fa-user icon-modify"></i>';
    conteudo +=             '<input type="text" placeholder="Código de Segurança" id="tCodSeg">';
    conteudo +=         '</label>';
    conteudo +=         '<button class="btn btn-second" id="btContinuarCadastro"> Continuar </button>';     
    conteudo += '   </div>';

    $(".second-column-cadastro").append(conteudo);

}
function fTelaEscolhePlano(){
    var conteudo = ""
    conteudo +=     '<h2 class="title title-second">Teste</h2>';
    conteudo +=     '<p class="description description-second">Verifique sua caixa de entrada!</p>';
    conteudo +=     '<p class="description description-second">Enviamos um código de segurança ao seu e-mail</p>';
    conteudo +=     '<p class="description description-second">Insira abaixo para finalizarmos seu cadastro</p>';
    
    $(".planos").append(conteudo);
}
function fAddTagsBulma(){
    var conteudo = "";

    conteudo += '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.1/css/bulma.min.css">' 
    
    $("head").append(conteudo);
}