$(document).ready(function(){
    $("input[name=buscar]").click(cambiar);
    $("#anadirGenero").hide();
    $("#anadirAno").hide();
    $("#anadirPuntuacion").hide();

    function cambiar(){
        var buscar=$('input:radio[name=buscar]:checked').val();
        if(buscar=="genero"){
            $("#anadirGenero").show();
            $("#anadirAno").hide();
            $("#anadirPuntuacion").hide();        
        }else if(buscar=="ano"){
            $("#anadirAno").show();
            $("#anadirGenero").hide();
            $("#anadirPuntuacion").hide();
        }else if(buscar=="puntuacion"){
            $("#anadirPuntuacion").show();
            $("#anadirGenero").hide();
            $("#anadirAno").hide();
        }else{
            $("#anadirGenero").hide();
            $("#anadirAno").hide();
            $("#anadirPuntuacion").hide();
            location.href="Series.php";
        }
        
    }

    $("input[name=genero]").click(buscarGenero);
    $("input[name=ano]").click(buscarAno);
    $("input[name=puntuacion]").click(buscarPuntuacion);

    function buscarGenero(){
        var genero=$('input:radio[name=genero]:checked').val();
        location.href="Series.php?genero="+genero;
    }

    function buscarAno(){
        var ano=$('input:radio[name=ano]:checked').val();
        location.href="Series.php?ano="+ano;
    }

    function buscarPuntuacion(){
        var puntuacion=$('input:radio[name=puntuacion]:checked').val();
        location.href="Series.php?puntuacion="+puntuacion;
    }
})