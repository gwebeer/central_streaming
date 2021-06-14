$(document).ready(function(){
    
    var url = window.location.href
    var email = url.substring(url.lastIndexOf('?id=') + 4);
    fBotaoAlteraClick(email);
})

function fHashSenhas(senha){
    var bitArray = sjcl.hash.sha256.hash(senha);
    var hashSenha = sjcl.codec.hex.fromBits(bitArray);

    return hashSenha;
}

function fBotaoAlteraClick(email){
    $("#btAlterar").click(function(){
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "../php/redefineSenha.php",
            data: {
                email: email,
                senha: fHashSenhas($("#tMudaSenha").val()),
            },
            success: function(retorno){
                if(retorno == "Alteracao realizada") {
                    alert("Senha alterada com sucesso!")
                    window.location.href = "../pages/telaInicial.php";
                } else {
                    alert("Ops! Algo deu errado. Tente novamente.")
                }
            }

        });
    })
}