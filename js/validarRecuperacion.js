function comprobarDatosFormulario(){    
    var nombre = document.getElementById('Name').value;
    var apellido = document.getElementById('LastName').value;
    var email = document.getElementById('Email').value;

    var expReg = /[\s\S]{3}/;
    var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    var cont=0;

    if(!expReg.test(nombre)){
        document.getElementById('errorName').innerHTML='Error al introducir el nombre.';
    }else{
        cont++;
        document.getElementById('errorName').innerHTML='';
    }

    if(!expReg.test(apellido)){
        document.getElementById('errorLastName').innerHTML='Error al introducir el apellido.';
    }else{
        cont++;
        document.getElementById('errorLastName').innerHTML='';
    }

    if(!emailRegex.test(email)){
        document.getElementById('errorEmail').innerHTML='Error al introducir el email.';
    }else{
        cont++;
        document.getElementById('errorEmail').innerHTML='';
    }

    if(cont==3){
        return true;
    }else{
        return false;
    }
}