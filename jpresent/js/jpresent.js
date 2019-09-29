var parametros={
    Original:{
        width:0,
        height:0,
    },
    OriginalIF:false
};

function tammDel(){
    $('.tam-content').css('height','');
    $('.tam').css('position','');
    $('.tam').css('width','');
    $('.tam').css('left','');
    $('.tam').css('text-align','');
    $('.tam').css('padding-top','');
    $('.tam').css('padding-bottom','');
    $('.tam').children('div').css('display','');
    $('.tam').children('div').css('max-width','');

    $('.tam-content').css('height','auto');
    $('.tam').css('height','auto');
    $('.tam2-content').css('height','auto');
    $('.tam2').css('height','auto');

    $('.blancanieves1').hide();
    $('.tam').css('text-align','center');

    parametros.OriginalIF=false;
}

function tamm(){

    if(parametros.OriginalIF==false){

        parametros.OriginalIF		=true;
        parametros.Original.width 	= $($('.tam').parent()).width();
        parametros.Original.height 	= $($('.tam').parent()).height();
        if(parametros.Original.height < 800){
            parametros.Original.height 	= 800;
        }
        

    }

    var ventana 	= $(window).width();

    if(ventana<770){

        tammDel();
        return;
    }
    
    $('.blancanieves1').show();
    var calculo 	= ventana - parametros.Original.width;

    $('.tam-content').css('height',parametros.Original.height+'px');
    $('.tam').css('height',parametros.Original.height+'px');
    $('.tam').css('position','absolute');
    $('.tam').css('width',ventana+'px');
    //$('.tam').css('left','-'+parseInt((calculo/2))+'px');
    $('.tam').css('left','0px');
    $('.tam').css('text-align','center');
    $('.tam').children('div').css('display','inline-block');
    $('.tam').children('div').css('max-width','1200px');
    $('.tam2-content').css('height','250px');
    $('.tam2').css('height','250px');

}

tiempo = setInterval(ComprobarCarga, 100);
function ComprobarCarga(){
    if(typeof($) !== 'undefined'){
        clearInterval(tiempo);
        tamm();

        $( window ).resize(function() {
            tammDel();
            tamm();
        });
    }
}
