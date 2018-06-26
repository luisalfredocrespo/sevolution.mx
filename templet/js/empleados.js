$(document).ready(function() {
    
    $("#actualizar").click(function(){
        let formulario = {
            nombre:$("#nombre").val(),
            puesto:$("#puesto").val(),
            direccion:$("#direccion").val(),
            telefono:$("#telefono").val(),
            fecha_de_nacimiento:$("#fecha_de_nacimiento").val(),
            horario_matutino_inicio:$("#horario_matutino_inicio").val(),
            horario_matutino_final:$("#horario_matutino_final").val(),
            horario_vezpertino_inicio:$("#horario_vezpertino_inicio").val(),
            horario_vezpertino_final:$("#horario_vezpertino_final").val(),
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
            puesto:$("#puesto").val(),
            direccion:$("#direccion").val(),
            telefono:$("#telefono").val(),
            fecha_de_nacimiento:$("#fecha_de_nacimiento").val(),
            horario_matutino_inicio:$("#horario_matutino_inicio").val(),
            horario_matutino_final:$("#horario_matutino_final").val(),
            horario_vezpertino_inicio:$("#horario_vezpertino_inicio").val(),
            horario_vezpertino_final:$("#horario_vezpertino_final").val(),
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
        $("#direccion").val(),
        $("#telefono").val(),
        $("#fecha_de_nacimiento").val(),
        $("#horario_matutino_inicio").val(),
        $("#horario_matutino_final").val(),
        $("#horario_vezpertino_inicio").val(),
        $("#horario_vezpertino_final").val(),
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