$(document).ready(function () {
    fAddTituloClick();
    fAddAdminClick();
    fRemoveAdminClick();
});


/* -+-+-+-+- EVENTOS DE CLICK -+-+-+-+- */ 
function fAddTituloClick(){
    $(".btCadastrarFilme").click(function(){
        cadastraTitulo();
    })
}
function fAddAdminClick(){
    $("#btAddAdmin").click(function(){
        tornaAdmin();
    })
}
function fRemoveAdminClick(){
    $("#btRemoveAdmin").click(function(){
        removeAdmin();
    })
}


/* -+-+-+-+- COMUNICACOES AJAX -+-+-+-+- */ 
function cadastraTitulo(){
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../php/cadastraTitulo.php",
        data: {
            titulo: $("#titulo").val(),
            genero: $("#genero").val(),
            ano: $("#ano").val(),
            duracao: $("#duracao").val(),
            sinopse: $("#sinopse").val(),
            trailer: $("#trailer").val(),
            imagem: $("#imagem").val(),
        }, success: function(retorno){
            if(retorno.status == "s"){
                alert("Titulo Cadastrado com sucesso!");
            } else {
                alert("Ops! Algo deu errado. Tente novamente!");
            }
        }
    })
}
function tornaAdmin(){
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../php/tornaAdmin.php",
        data: {
            email: $("#email").val(),
        }, success: function(retorno){
            if(retorno == "Record updated successfully"){
                alert("O usuário agora é administrador!");
            } else {
                alert("Ops.. Algo deu errado! Tente novamente!")
            }
        }
    })
}
function removeAdmin(){
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../php/removeAdmin.php",
        data: {
            email: $("#email").val(),
        }, success: function(retorno){
            if(retorno == "Record updated successfully"){
                alert("O usuário não é mais administrador!");
            } else {
                alert("Ops.. Algo deu errado! Tente novamente!")
            }
        }
    })
}