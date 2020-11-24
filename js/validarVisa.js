function comprobarDatosFormulario(){

    var nombre = document.getElementById('AddName').value;
    var apellido = document.getElementById('AddLastName').value;
    var email = document.getElementById('AddEmail').value;
    var password = document.getElementById('AddPassword').value;
    var NombreyApellidos = document.getElementById('NombreyApellidos').value;
    var NumeroTarjeta = document.getElementById('NumeroTarjeta').value;
    var ano = document.getElementById('ano').value;
    var d = new Date();
    var n = d.getFullYear();
    var m = d.getMonth();
    m = m+1;
    var mes = document.getElementById('mes').value;
    var CVV = document.getElementById('CVV').value;
    var tel = document.getElementById('AddTelf').value;


    var regCVV = /^[0-9]{3,3}$/;
    var visaReg = /^4\d{3}-?\d{4}-?\d{4}-?\d{4}$/;
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

    if ( document.getElementById( 'NombreyApellidos' ) && document.getElementById( 'NumeroTarjeta' ) 
    && document.getElementById( 'ano' ) && document.getElementById( 'mes' ) && document.getElementById( 'CVV' )) {
        if(!expReg.test(NombreyApellidos)){
            document.getElementById('NombreyApellidos').style.borderColor="red";
        }else{
            document.getElementById('NombreyApellidos').style.borderColor="green";
            cont++;
        }
    
        if(!visaReg.test(NumeroTarjeta)){
            document.getElementById('NumeroTarjeta').style.borderColor="red";
        }else{
            document.getElementById('NumeroTarjeta').style.borderColor="green";
            cont++;
        }
    
        if(ano>n){
            document.getElementById('ano').style.borderColor="green";
            document.getElementById('mes').style.borderColor="green";
            cont++;
        }else if(n<=ano){
            if(mes>=m){
                document.getElementById('mes').style.borderColor="green";
                cont++;
            }else{
                document.getElementById('mes').style.borderColor="red";
            }
        }else{
            document.getElementById('ano').style.borderColor="red";
        }
    
        if(!regCVV.test(CVV)){
            document.getElementById('CVV').style.borderColor="red";
        }else{
            document.getElementById('CVV').style.borderColor="green";
            cont++;
        }
    }

    if(tel!=""){
        if(telRegex.test(tel)){
            cont++;
        }else{
            document.getElementById('errorAddTelf').innerHTML='Error al introducir el telefono.';
        }
    }

    if(cont>=8){
        return true;
    }else{
        return false;
    }
}