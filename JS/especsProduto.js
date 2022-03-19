$(document).ready(function(){
    $("#img2").hide();
    $("#img3").hide();

    var valor = $("#valor").html();
    var novoValor;
    novoValor = valor.replace('.', ',');
    $("#valor").html(novoValor);

})

function mostra(elementoTag) {
    var id;
    id = elementoTag.id;

    if(id == 1){
        $("#img1").show();
        $("#img2").hide();
        $("#img3").hide();
    }
    if(id == 2){
        $("#img1").hide();
        $("#img2").show();
        $("#img3").hide();
    }
    if(id == 3){
        $("#img1").hide();
        $("#img2").hide();
        $("#img3").show();
    }
    
}



