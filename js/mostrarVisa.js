$(document).ready(function(){
    nombreVisa();
    numeroVisa();
    fechaVisa()
    
    $("#NombreyApellidos").keyup(nombreVisa);
    $("#NumeroTarjeta").keyup(numeroVisa);
    $("#mes").change(fechaVisa);
    $("#ano").change(fechaVisa);
})

function nombreVisa(){
    var nombre = document.getElementById('NombreyApellidos').value;
    nombre = nombre.toUpperCase();
    if( nombre == ""){
        document.getElementById('nombre').innerHTML = "JOHN DOE";
    }else{
        document.getElementById('nombre').innerHTML = nombre;
    }
}

function numeroVisa(){
    var numero = document.getElementById('NumeroTarjeta').value;

    if( numero == ""){
        document.getElementById('numero').innerHTML = "1234-5678-9012-3456";
    }else{
        document.getElementById('numero').innerHTML = numero;
    }
}

function fechaVisa(){
    var mes = document.getElementById('mes').value;
    var ano = document.getElementById('ano').value;
    if(mes>=0 && mes<=9){
        mes=mes.toString();
        aux=0+mes;
    }else{
        aux=mes;
    }
    ano = ano.substr(2,3);

    document.getElementById('fecha').innerHTML = "";
    if( aux == "" && ano == ""){
        document.getElementById('fecha').innerHTML = "06/25";
    }else{
        document.getElementById('fecha').innerHTML = aux;
        if(ano == ""){
            document.getElementById('fecha').innerHTML += "/00";
        }else{
            document.getElementById('fecha').innerHTML += "/";
            document.getElementById('fecha').innerHTML += ano;
        }
    }
}