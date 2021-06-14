$(document).ready(function () {
    recuperaFilmes("sem_filtro", "");
    buscar();
    resetar();
});

function recuperaFilmes(filtro, valor){
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../php/exibeFilmes.php",
        data: {
            filtro: filtro,
            valorFiltro: valor,
        }, success: function(result){
            listaFilmes(result);
        }
    })
}

function listaFilmes(result){
    if(result == "Nenhum filme encontrado") {
        var msg_erro = '<h3 class="msg-erro"> Ops... Não encontramos resultados de busca! </h3>';
        $(".cards").append(msg_erro);
        return;
    }
    for(var i = 0; i < result.length; i++){
        
        var conteudo = "";

        conteudo += '<div class="card-filme">';
        conteudo +=     '<img src="../images/'+result[i][1]+'" class="img-filme">';
        conteudo +=     '<h3 class="title-filme">' + result[i][0] + '</h3>';
        conteudo +=     '<button class="btn-filme" id="'+result[i][2]+'">Ver Detalhes</button>'; /* Alterar para id do filme */
        conteudo += '</div>';

        $(".cards").append(conteudo);
    }

    $(".btn-filme").unbind("click");
    $(".btn-filme").click(function(){
        var id = $(this).attr("id");
        window.location.href = "../pages/paginaFilme.php?id=" + id;
    })

}

function buscar(){
    $("#bt-buscar").unbind("click");
    $("#bt-buscar").click(function(){
        var valor = $("#tInfoTitulo").val();
        var filtro = $(".filtros-opt option:selected").attr('id');

        $(".cards").html("");
        recuperaFilmes(filtro, valor);
    })
}
function resetar(){
    $("#bt-resetar").unbind("click");
    $("#bt-resetar").click(function(){
        $(".cards").html("");
        recuperaFilmes("sem_filtro", "");
        $("#tInfoTitulo").val("");
        document.getElementsByClassName("filtros-opt")[0].options.selectedIndex = 0;
    })
}