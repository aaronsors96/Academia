window.onload = iniciar;
function iniciar(){
    //programa principal
    escuchar();
    capturarMensaje();
}

function escuchar(){
    document.getElementById("volver").addEventListener("click", volver);
}
function capturarMensaje(){
    //fase1 capturamos todos los campos del search de la url
    let mensaje =  window.location.search;
    //fase2 creamos un objeto que recoge cada campo de la url
    let urlParams = new URLSearchParams(mensaje);
    //Mensaje tiene todos los campos de la url, el nuestro: mensaje.
    //http://localhost/pooBBDD2022/webs/carreras/menuCarreras.html?mensaje=100
    mensaje = urlParams.get('mensaje');
    
    /** trabajando con los mensajes... */
    if(mensaje == "100"){
        verOcultar("Alumno dado de alta");
    }else if(mensaje == "101"){
        verOcultar("Alumno no dado de alta, verifique.");
    }else if(mensaje == "200"){
        verOcultar("Alumno dado de baja");
    }else if(mensaje == "201"){
        verOcultar("Alumno no dado de baja, verifique.");
    }else if(mensaje == "202"){
        verOcultar("Alumno no dado de baja, a petición del usuario.");
    }else if(mensaje == "300"){
        verOcultar("Regresa de consulta de alumnos.");
    }else if(mensaje == "400"){
        verOcultar("Alumno modificado con éxito.");
    }else if(mensaje == "401"){
        verOcultar("Error en la zona de desplegable.");
    }else if(mensaje == "402"){
        verOcultar("Error en la zona de modificacion.");
    }else if(mensaje == "403"){
        verOcultar("Error no se ha modificado el alumno.");
    }
}
function verOcultar($mensaje){
    //FORMA DE HACERLO MAS REDUCIDA
    let panel = document.getElementById("panelInformativo");

    panel.innerHTML = $mensaje;
    panel.style.display = "block";
    setTimeout(function(){
        panel.style.display = "none";
    }, 5000);

    //FORMA DE HACERLO MAS EXTENSA
    /*document.getElementById("panelInformativo").innerHTML = $mensaje;
    document.getElementById("panelInformativo").style.display = "block";
    setTimeout(function(){
        document.getElementById("panelInformativo").style.display = "none";
    }, 5000);*/
}    
function volver(){
    //window.history.go(-1);
    alert ("ok");
    window.location.assign("../index.html");
}