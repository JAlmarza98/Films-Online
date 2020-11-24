$(document).ready(function(){
    mailPPal();
    password();
    
    $("#EmailPaypal").keyup(mailPPal);
    $("#PassPaypal").keyup(password);
    
})

function mailPPal(){
    var nombre = document.getElementById('EmailPaypal').value;
    if( nombre == ""){
        document.getElementById('nombre').innerHTML = "JohnDoe@ejemplo.com";
    }else{
        document.getElementById('nombre').innerHTML = nombre;
    }
}

function password(){
    var pass = document.getElementById('PassPaypal').value;
    var show="";
    var i;
    for (i = 1; i <= pass.length; i++) {
        show=show.concat("*");
    }
    
    if( pass == ""){
        document.getElementById('fecha').innerHTML = "password";
    }else{
        document.getElementById('fecha').innerHTML = show;
    }
}