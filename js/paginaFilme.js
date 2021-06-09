$(document).ready(function () {
    sessionStorage.setItem('titulo', "Norbit");
    var titulo = sessionStorage.getItem('titulo');
    recuperaFilme(titulo);
});


var registerError = false;
const entry_point = "http://localhost/central_streaming/";

function recuperaFilme(titulo) {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../php/infosFilme.php",
        data: {
            titulo: titulo,
        },
        success: function(result){
            console.log(result);
            verificaFavorito(result[0][0], result);
        }
    });  
}

function listaFilmes(result, labelFavorito){
    for(var i = 0; i < 1; i++){      

    var conteudoCard = "";

    conteudoCard += '<h1 class="nomeFilme">' + result[0][1] + '</h1>';
    conteudoCard += '<h4 class="labelInfo">Sinopse</h4>';
    
    conteudoCard += '<p class="descInfo">' + result[0][5] + '</p>';

    conteudoCard += '<div class="infoFlex">';
    conteudoCard += '   <div class="infoMenor">';
    conteudoCard += '       <h4 class="labelMenor">Gênero</h4>';
    conteudoCard += '           <p class="descMenor">' + result[0][2] + '</p>';
    conteudoCard += '   </div>';

    conteudoCard += '   <div class="infoMenor">';
    conteudoCard += '   <h4 class="labelMenor">Ano</h4>';
    conteudoCard += '       <p class="descMenor">' + result[0][3] + '</p>';
    conteudoCard += '   </div>';

    conteudoCard += '   <div class="infoMenor">';
    conteudoCard += '       <h4 class="labelMenor">Duração</h4>';
    conteudoCard += '       <p class="descMenor">' + result[0][4] + '</p>';
    conteudoCard += '   </div>';
    conteudoCard += '</div>';

    conteudoCard += '<button class="btFilme" id="btFavorito" onclick="fBtFavoritoClick(' + result[0][0] + ')">' + labelFavorito + '</button>';
    conteudoCard += '<button class="btFilme" id="btAssistir"> Assistir </button>';

    $(".infoFilme").append(conteudoCard);

    var conteudoTrailer = "";

    conteudoTrailer = '<iframe class="videoTrailer" src="'+ result[0][6] +'"></iframe>';

    $(".trailerFilme").append(conteudoTrailer);
    }

}

function fBtFavoritoClick(id) {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../php/verificaFavorito.php",
        data: {
            idTitulo: id,
        },
        success: function(result){
            if(result == "Esta nos favoritos") {
                teste = 'Adicionar aos favoritos'; 
                $("#btFavorito").text(teste);
                fRemoveFavorito(id);
            } else {
                teste = 'Remover dos Favoritos'; 
                $("#btFavorito").text(teste);
                fAddFavorito(id);
            }
        }
    });
}

function fAddFavorito(id){
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../php/addFavorito.php",
        data: {
            idTitulo: id,
        },
        success: function(retorno){
        }
    });
}

function fRemoveFavorito(id){
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../php/removeFavorito.php",
        data: {
            idTitulo: id,
        },
        success: function(retorno){
        }
    });
}

function verificaFavorito(titulo, listaDados) {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../php/verificaFavorito.php",
        data: {
            idTitulo: titulo,
        },
        success: function(result){
            if(result == "Nao esta nos favoritos") {
                listaFilmes(listaDados, 'Adicionar aos favoritos');
            } else {
                listaFilmes(listaDados, 'Remover dos favoritos');
            }
        }
    }); 
}