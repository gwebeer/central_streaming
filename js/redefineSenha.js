$(document).ready(function(){
    fBotaoAlteraClick();
})

function fHashSenhas(senha){
    var bitArray = sjcl.hash.sha256.hash(senha);
    var hashSenha = sjcl.codec.hex.fromBits(bitArray);

    return hashSenha;
}

function fBotaoAlteraClick(){
    $("#btAlterar").click(function(){
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "../php/redefineSenha.php",
            data: {
                email: $("#tMudaEmail").val(),
                senha: fHashSenhas($("#tMudaSenha").val()),
            },
            success: function(retorno){
                if(retorno == "Alteracao realizada") {
                    alert("Senha alterada com sucesso!")
                } else {
                    alert("Ops! Algo deu errado. Tente novamente.")
                }
            }

        });
    })
}