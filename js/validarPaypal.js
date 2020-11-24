function comprobarDatosFormulario(){

    var nombre = document.getElementById('AddName').value;
    var apellido = document.getElementById('AddLastName').value;
    var email = document.getElementById('AddEmail').value;
    var password = document.getElementById('AddPassword').value;
    var EmailPaypal = document.getElementById('EmailPaypal').value;
    var tel = document.getElementById('AddTelf').value;

    var expReg = /[\s\S]{3}/;
    var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    var passRegex =/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,15}[^'\s]/i;
    var telRegex=/^([9,7,6]{1})+([0-9]{8})$/;
    var cont=0;
    
    if(!expReg.test(nombre)){
        document.getElementById('errorAddName').innerHTML='Error al introducir el nombre.';
    }else{
        cont++;
        document.getElementById('errorAddName').innerHTML='';
    }

    if(!expReg.test(apellido)){
        document.getElementById('errorAddLastName').innerHTML='Error al introducir el apellido.';
    }else{
        cont++;
        document.getElementById('errorAddLastName').innerHTML='';
    }

    if(!emailRegex.test(email)){
        document.getElementById('errorAddEmail').innerHTML='Error al introducir el email.';
    }else{
        cont++;
        document.getElementById('errorAddEmail').innerHTML='';
    }

    if(!passRegex.test(password)){
        document.getElementById('errorAddPassword').innerHTML='Error al introducir la contraseña.Entre 8-15 caracteres,al menos una letra mayúscula ,al menos una letra minucula,al menos un dígito no espacios en blanco y al menos 1 caracter especial.';
    }else{
        cont++;
        document.getElementById('errorAddPassword').innerHTML='';
    }

    if ( document.getElementById( 'EmailPaypal' )) {
        if(!emailRegex.test(EmailPaypal)){
            document.getElementById('EmailPaypal').style.borderColor="red";
        }else{
            cont++;
            document.getElementById('EmailPaypal').style.borderColor="green";
        }
    }

    if(tel!=""){
        if(telRegex.test(tel)){
            cont++;
        }else{
            document.getElementById('errorAddTelf').innerHTML='Error al introducir el telefono.';
        }
    }

    if(cont>=5){
        return true;
    }else{
        return false;
    }
}