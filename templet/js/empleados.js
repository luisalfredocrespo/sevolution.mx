$(document).ready(function() {
    
    $("#actualizar").click(function(){
        let formulario = {
            nombre:$("#nombre").val(),
            puesto:$("#puesto").val(),
            ide:$("#ide").val()
        };
        console.log("le dio actualizar");
        console.log(formulario);
        if(formulario.nombre!="" &&
            formulario.puesto!=""
            ){
            enviar(formulario);
        }else{
            alerta("Faltan datos");
        }
    });
    $("#guardar").click(function(){
        let formulario = {
            nombre:$("#nombre").val(),
            puesto:$("#puesto").val()
        };
        console.log("le dio guardar");//excepciones
        console.log(formulario);
        if(formulario.nombre!="" &&
            formulario.puesto!=""
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
        $("#puesto").val("");
    }
    function alerta(mensaje){
        $("#alerta").html("");
        $("#alerta").html(mensaje);
    }
    function enviar(d){
        $.post("/citas/agregar_empleado_guardar",
        d,
        function(data,status){
            let respuesta = JSON.parse(data);
            console.log(respuesta);     
        });
    }

});