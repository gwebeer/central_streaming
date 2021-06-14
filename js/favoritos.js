$(document).ready(function () {
    recuperaFilmes();

});

var registerError = false;
const entry_point = "http://localhost/central_streaming/";

function recuperaFilmes() {
    let end_point = "./php/favoritos.php";
    let url = `${entry_point}${end_point}`;
    $.ajax({
        url: url,
        method: 'GET',
        dataType: 'json'
    }).done(function (result) {
        console.log(result);
        listaFilmes(result);
     });   
}

function listaFilmes(result){

    for(var i = 0; i < result.length; i++){
        
        var conteudo = "";

        conteudo += '<div class="card-filme">';
        conteudo +=     '<img src="../images/'+result[i][7]+'" class="img-filme">';
        conteudo +=     '<h3 class="title-filme">' + result[i][1] + '</h3>';
        conteudo +=     '<button class="btn-filme" id="'+result[i][8]+'">Ver Detalhes</button>';
        conteudo += '</div>';

        $(".cards").append(conteudo);
    }    

    $(".btn-filme").unbind("click");
    $(".btn-filme").click(function(){
        var id = $(this).attr("id");
        window.location.href = "../pages/paginaFilme.php?id=" + id;
    })
}
