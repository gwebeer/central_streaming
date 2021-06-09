$(document).ready(function(){
    fBtAlteraCartaoClick();
})

function fBtAlteraCartaoClick() {
    $(".btAlteraCartao").click(function(){
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "../php/alteraCartao.php",
            data: {
                nome: $("#tNovoNome").val(),
                numero: $("#tNovoNumero").val(),
                dtVencimento: $("#tNovaDtVenc").val(),
                cvc: $("#tNovoCvc").val(),
            },
            success: function(retorno){
                if(retorno == "Record updated successfully"){
                    alert("Dados alterados com sucesso!");
                } else {
                    alert("Ops.. Algo deu errado! Tente novamente!")
                }
            }
        });   
    })
}