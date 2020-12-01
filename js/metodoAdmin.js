$(document).ready(function(){
    mostrarHome();
    $("#home").click(mostrarHome);
    $("#users").click(mostrarUsers);
    $("#movies").click(mostrarFilms);
    $("#series").click(mostrarSeries);
    $("#capital").click(mostrarCapital);
})

function mostrarHome(){
    var peticion=$.ajax({
        url:"home.html",
        type:"Post",
        async:true,
        data:{
        },
        success:function(data){
            $("#contenido").html(peticion.responseText);
        }
    })
}

function mostrarUsers(){
    var peticion=$.ajax({
        url:"users.html",
        type:"Post",
        async:true,
        data:{
        },
        success:function(data){
            $("#contenido").html(peticion.responseText);
        }
    })
}

function mostrarFilms(){
    var peticion=$.ajax({
        url:"films.html",
        type:"Post",
        async:true,
        data:{
        },
        success:function(data){
            $("#contenido").html(peticion.responseText);
        }
    })
}

function mostrarSeries(){
    var peticion=$.ajax({
        url:"series.html",
        type:"Post",
        async:true,
        data:{
        },
        success:function(data){
            $("#contenido").html(peticion.responseText);
        }
    })
}

function mostrarCapital(){
    var peticion=$.ajax({
        url:"capital.html",
        type:"Post",
        async:true,
        data:{
        },
        success:function(data){
            $("#contenido").html(peticion.responseText);
        }
    })
}