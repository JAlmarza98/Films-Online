$(document).ready(function(){
    mostrarVisa();
    $("#visa").change(mostrarVisa);
    $("#paypal").change(mostrarPaypal);
})

function mostrarVisa(){
    var peticion=$.ajax({
        url:"Visa.php",
        type:"Post",
        async:true,
        data:{
        },
        success:function(data){
            $("#destino").html(peticion.responseText);
        }
    })
}

function mostrarPaypal(){
    var peticion=$.ajax({
        url:"Paypal.php",
        type:"Post",
        async:true,
        data:{
        },
        success:function(data){
            $("#destino").html(peticion.responseText);
        }
    })
}