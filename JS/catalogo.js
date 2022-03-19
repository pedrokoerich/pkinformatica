$(document).ready(function(){
    $('.hardwares').hide();
    $('.perifericos').hide();
    $('.cadeiras').hide();
    $('.monitores').hide();

    if($('#iHardwares').is(':checked')){
        $('.hardwares').show();
    }else{
        $('.hardwares').hide();
    }

    if($('#iPerifericos').is(':checked')){
        $('.perifericos').show();
    }else{
        $('.perifericos').hide();
    }
    
    if($('#iCadeiras').is(':checked')){
        $('.cadeiras').show();
    }else{
        $('.cadeiras').hide();
    }
    
    if($('#iMonitores').is(':checked')){
        $('.monitores').show();
    }else{
        $('.monitores').hide();
    } 

});

function selectCategoria(elementoTag){
    var cat;

    cat = elementoTag.value;

    if(cat == "1"){
        if(document.getElementById('iHardwares').checked == false){
            var hardwares = document.getElementsByClassName('hardwares');
            console.log(hardwares);

            for(i = 0; i < hardwares.length; i++){
                hardwares[i].style.display = 'none';
            }

        }else{
            var hardwares = document.getElementsByClassName('hardwares');
            console.log(hardwares);

            for(i = 0; i < hardwares.length; i++){
                hardwares[i].style.display = 'block';
            }

        }
        
    }else if(cat == "2"){
        if(document.getElementById('iPerifericos').checked == false){
            var perifericos = document.getElementsByClassName('perifericos');
            console.log(perifericos);

            for(i = 0; i < perifericos.length; i++){
                perifericos[i].style.display = 'none';
            }

        }else{
            var perifericos = document.getElementsByClassName('perifericos');
            console.log(perifericos);

            for(i = 0; i < perifericos.length; i++){
                perifericos[i].style.display = 'block';
            }
        }

    }else if(cat == "3"){
        if(document.getElementById('iCadeiras').checked == false){
            var cadeiras = document.getElementsByClassName('cadeiras');
            console.log(cadeiras);

            for(i = 0; i < cadeiras.length; i++){
                cadeiras[i].style.display = 'none';
            }

        }else{
            var cadeiras = document.getElementsByClassName('cadeiras');
            console.log(cadeiras);

            for(i = 0; i < cadeiras.length; i++){
                cadeiras[i].style.display = 'block';
            }

        }

    }else if(cat == "4"){
        if(document.getElementById('iMonitores').checked == false){
            var monitores = document.getElementsByClassName('monitores');
            console.log(monitores);

            for(i = 0; i < monitores.length; i++){
                monitores[i].style.display = 'none';
            }

        }else{
            var monitores = document.getElementsByClassName('monitores');
            console.log(monitores);

            for(i = 0; i < monitores.length; i++){
                monitores[i].style.display = 'block';
            }

        }
    }
}