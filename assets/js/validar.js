// Valida el formulario de Contacto
function validarContacto(){
var nombre, correo, telefono, regiones, comunas, asunto, message;


nombre = document.getElementById("nombreContacto").value;
correo = document.getElementById("correoContacto").value;
telefono = document.getElementById("telefonoContacto").value;
regiones = document.getElementById("regionesContacto").value;
comunas = document.getElementById("comunasContacto").value;
asunto = document.getElementById("asunto").value;
message = document.getElementById("message").value;

if(nombre === ""){
    alert("Por favor  indique su nombre");
    return false;
}

else if(correo === ""){
    alert("Por favor  indique su correo");
    return false;
}

else if(telefono === ""){
    alert('Por favor  indique su telefono de contacto');
    return false;
}

    
else if(regiones === "sin-region"){
    alert("Por favor indiquenos su regi\u00F3n");
    return false;
}

else if(comunas === "sin-comuna"){
    alert('Por favor indiquenos su comuna');
    return false;
}

else if(asunto === ""){
    alert('Por favor  indique un asunto');
    return false;
}

else if(message === ""){
     alert("Favor indiquenos su mensaje");
    return false;
}

else if (nombre.length>30){
    alert('El nombre es muy largo');
    return false;
}

else if (correo.length>80){
    alert('El correo es muy largo');
    return false;
}

else if (telefono.length>30){
    alert('El nombre es muy largo');
    return false;
}


else if (message.length<20){
    alert('El mensaje es muy corto, debe superar los 20 caract\u00E9res');
    return false;
}

else if (isNaN(telefono)){
    alert('El telefono ingresado no es numero');
    return false;
}

    $.ajax({
        type: "POST",
        url:"php/contact.php",
        data:$("#contactForm").serialize(),
        success: function(data){
            $("#contacterr").addClass("alert alert-success");
            $("#contacterr").html("En breve nos comunicaremos con Usted");
            $('#contactForm').html(function() {
            $("#ContactModalOk").modal();
        });                
        },
		error: function (data) {
		    $("#contacterr").addClass("alert alert-danger");
            $("#contacterr").html("Error");
            $('#cfsubmit').html(function() {
	        $("#ContactModalError").modal();
	    });
        }
        
    });
        document.getElementById("contactForm").reset();
        return false;
        

    
}
/*--------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------*/

// Valida el formulario de Hagase Socio
function validarSocio(){
var nombre, correo, telefono, regiones, comunas;


nombre = document.getElementById("nombre").value;
correo = document.getElementById("correo").value;
regiones = document.getElementById("regiones").value;
comunas = document.getElementById("comunas").value;
telefono = document.getElementById("telefono").value;

if(nombre === ""){
    alert("Por favor  indique su nombre");
    return false;
}

else if(correo === ""){
    alert("Por favor  indique su correo");
    return false;
}

else if(regiones === "sin-region"){
    alert("Por favor indiquenos su regi\u00F3n");
    return false;
}

else if(comunas === "sin-comuna"){
    alert('Por favor indiquenos su comuna');
    return false;
}

else if(telefono === ""){
    alert('Por favor  indique su telefono de contacto');
    return false;
}


else if (nombre.length>30){
    alert('El nombre es muy largo');
    return false;
}

else if (correo.length>80){
    alert('El correo es muy largo');
    return false;
}

else if (telefono.length>30){
    alert('El nombre es muy largo');
    return false;
}


else if (isNaN(telefono)){
    alert('El telefono ingresado no es numero');
    return false;
}

    $.ajax({
        type: "POST",
        url:"php/contactsocio.php",
        data:$("#socioForm").serialize(),
        success: function(data){
            $("#errrform").addClass("alert alert-success");
            $("#errrform").html("En breve nos comunicaremos con Usted");
            $('#socioForm').html(function() {
            $("#SocioModalOk").modal();
        });                
        },
		error: function (data) {
            $("#scfsubmit").html("Error");
            $('#socioForm').html(function() {
	        $("#SocioModalError").modal();
	    });
        }
    });
    document.getElementById("socioForm").reset();
    return false;

    
}

