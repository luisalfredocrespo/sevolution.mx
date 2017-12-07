$(document).ready(function(){
	
	//  BOTONES 
	$(".JMYcarrito").on("click", function (){
		var ac = $(this).data("accion");
		var id = $(this).data("id");
		/*
		var data = {	valor: valor,
							nomd: nomd,
							id: idproyecto,
							tab: tab,
							actualizar: actualizar
						};
			$.ajax({
			   url: "ws.php?lug=modulos-opv-c&fn=etapa&accion=guardar_ex",
			   dataType: 'JSON',
			   type: 'POST',
			   data: data,
			   success: function(response) {
				  console.log(data);	
				  console.log(response);	
				  $(this).val(response.out);
				  toastr.success("Actualizado correctamente",nomd);
				},error: function(response){
					toastr.success("Error 500",'No se pudo crear la etapa, intnete mas tarde o consulte con soporte t&eacute;cnico.');
				  console.log("actividad_proyecto error");		
				  console.log(response);	
				}
			  });
			  */
	});
	
});