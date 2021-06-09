$(document).ready(function () {
    recuperaFilmes();
});

var registerError = false;
const entry_point = "http://localhost/central_streaming/";

function recuperaFilmes() {
    let end_point = "./php/exibeFilmes.php";
    let url = `${entry_point}${end_point}`;
    $.ajax({
        url: url,
        method: 'GET',
        dataType: 'json'
    }).done(function (result) {
        listaFilmes(result);
        console.log(result)
     });   
}

function listaFilmes(result){
    for(var i = 0; i < result.length; i++){
        
        var conteudo = "";

        conteudo += '<div class="card-filme">';
        conteudo +=     '<img src="../images/'+result[i][1]+'" class="img-filme">';
        conteudo +=     '<h3 class="title-filme">' + result[i][0] + '</h3>';
        conteudo +=     '<button class="btn-filme" id="'+result[i][2]+'">Ver Detalhes</button>'; /* Alterar para id do filme */
        conteudo += '</div>';

        $(".cards").append(conteudo);
    }

    alert(result.length)

    $("#" + result[result.length - (result.length-2)][2]).click(function(){
        alert("teste");
    })

}

function click(){
    alert("teste");
}