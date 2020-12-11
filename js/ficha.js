$(document).ready(function(){
    //Este script hace que se pause el video cuando se cierra la modal 
    $("#ModalTrailer").on('hidden.bs.modal', function (e) {
        $('#trailer').get(0).pause()
    });

    $("#ModalPelicula").on('hidden.bs.modal', function (e) {
        $('#pelicula').get(0).pause()
    });

    $("#ModalCapitulo").on('hidden.bs.modal', function (e) {
        $('#capitulo').get(0).pause();
        $('#capitulo').get(0).currentTime = 0;
    });

})