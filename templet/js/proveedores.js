$(document).ready(function() {
    
    $("#actualizar").click(function(){
        let formulario = {
            nombre:$("#nombre").val(),
            marca:$("#marca").val(),
            direccion:$("#direccion").val(),
            telefono:$("#telefono").val(),
            
            ide:$("#ide").val()
        };
        console.log("le dio actualizar");
        console.log(formulario);
        if(formulario.nombre!="" &&
            formulario.marca!=""
            ){
            enviar(formulario);
        }else{
            alerta("Faltan datos");
        }
    });
    $("#guardar").click(function(){
        let formulario = {
            nombre:$("#nombre").val(),
            marca:$("#marca").val(),
            direccion:$("#direccion").val(),
            telefono:$("#telefono").val(),
            
        };
        console.log("le dio guardar");//excepciones
        console.log(formulario);
        if(formulario.nombre!="" &&
            formulario.marca!=""
            ){
            enviar(formulario);
                   
            limpiarFormulario();
            alerta("Registro guardaro");
        }else{
            alerta("Faltan datos");
        }
    });
    function limpiarFormulario(){
        $("#nombre").val("");
        $("#marca").val("");
        $("#direccion").val(),
        $("#telefono").val(),
       
    function alerta(mensaje){
        $("#alerta").html("");
        $("#alerta").html(mensaje);
    }
    function enviar(d){
        $.post("/citas/agregar_proveedores_guardar",
        d,
        function(data,status){
            let respuesta = JSON.parse(data);
            console.log(respuesta);     
        });
    }

});