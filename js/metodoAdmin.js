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
        url:"../php/Home.php",
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
        url:"../php/Users.php",
        type:"Post",
        async:true,
        data:{
        },
        success:function(){
            $("#contenido").html(peticion.responseText);
        }
    })
}

function mostrarFilms(){
    var peticion=$.ajax({
        url:"../php/Films.php",
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
        url:"../php/SeriesAdmin.php",
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
        url:"../php/Capital.php",
        type:"Post",
        async:true,
        data:{
        },
        success:function(data){
            $("#contenido").html(peticion.responseText);
        }
    })
}