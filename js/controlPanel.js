$(document).ready(function () {
    carregaImagem();
    fAddTituloClick();
    fAddAdminClick();
    fRemoveAdminClick();
});


/* -+-+-+-+- OUTRAS FUNCOES -+-+-+-+- */ 
function carregaImagem(){
    $("#imagem").change(function(){
        arquivo = document.getElementById("imagem").files[0];

        formData = new FormData();
        formData.append("file", arquivo);
        console.log(formData)
    })
}
function extract_file_name(){
    var arquivo = $("#imagem").val();
    var arrayArquivo = arquivo.split("\\");
    nomeArquivo = arrayArquivo[arrayArquivo.length - 1];
    return nomeArquivo;
}


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
            imagem: extract_file_name(),
        }, success: function(retorno){
            if(retorno.status == "s"){
                enviarImagem();
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
function enviarImagem(){
    $.ajax({
        url: "../php/carregaImagem.php",
        type: "post",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        success: function(retorno){

        }
    })
}