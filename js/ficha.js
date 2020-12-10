$(document).ready(function(){
    $( ".temporada" ).on('change' ,function()  {
        var season=$("#temporada option:selected").val();
        if(season!=0){
            var peticion=$.ajax({
                url:"Capitulos.php",
                type:"Post",
                async:true,
                data:{
                    season:season
                },
                success:function(data){
                    var ok=peticion.responseText;
                    if(ok){
                        $("#container-series").html(peticion.responseText);
                    }else{
                        document.getElementById('container-series').innerHTML='No se ha podido acceder a los capitulos.';
                    }
                }
            })  
        }else{
            document.getElementById('container-series').innerHTML='';
        }
    });

    //Este script hace que se pause el video cuando se cierra la modal 
    $("#ModalTrailer").on('hidden.bs.modal', function (e) {
        $('#trailer').get(0).pause()
    });

    $("#ModalPelicula").on('hidden.bs.modal', function (e) {
        $('#pelicula').get(0).pause()
    });

})