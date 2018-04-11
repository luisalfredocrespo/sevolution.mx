$(document).ready(function() {
	var config = [];
	var sinGuardar = [];
	var WSlider=[];
	var lng=[];	
    var wSSaveTextArr=[];
    var wSSaveTextArrDa=[];
	$.getScript("app/js/jmy/MX-es.js",function(){});
	var leng = {
	guardar:"Guardar",
	guardar_cambios:"Guardar todos los cambios",
	hola:"hola",
	hola:"hola",
	imgLogo:"http://social.comsis.mx/templet/images/logo.png",
	no_data_save:"Falta datos para poder guardar",
	drop_image:"Arrastra aqui las imagen",
	no_data_editable:"No hay datos editables en esta sección",
	dato_guardado:"Dato guardado :)",
	sin_titulo_post:"Primero ingrese el titulo del post",
	nombre_nuevo_post:"Nombre del nuevo post",
	seccion_comas:"Indica el nombre de cada sección separado por comas",
	cont_cant:"Indica en número la cantidad de paginas de este elemento a mostrar",
}
var style = {
	h_guardar:"background-color:rgba(30,140,30,0.8);padding:8px;color:#fff;font-size:16px;border:0;border-radius:5px;",
	h_cancelar:"background-color:rgba(140,30,30,0.8);padding:8px;color:#fff;font-size:16px;border:0;border-radius:5px;",
	b_guardar:"background-color:rgba(30,140,30,0.8);padding:8px;color:#fff;font-size:16px;border:0;border-radius:5px;",
	b_cancelar:"background-color:rgba(140,30,30,0.8);padding:8px;color:#fff;font-size:16px;border:0;border-radius:5px;",
	wS_ima:"margin:5px; width:220px; height:60px; background-color:white; border:3px dashed grey;",
	wS_ima_h3:"margin:25px 5px; color:grey; font-size:16px; font-weight:bold;",
	wS_tx:"margin:5px; width:220px; height:30px; background-color:white; font-size:12px;",
	wS_tx_in:"color:#333 !important",
	wS_gu:"background-color:rgba(30,140,30,0.8);padding:4px;color:#fff;font-size:14px;border:0;border-radius:4px;",
	wS_ca:"background-color:rgba(140,30,30,0.8);padding:4px;color:#fff;font-size:14px;border:0;border-radius:4px;",
	wS_he:"margin:5px; width:220px; height:40px; background-color:white;",
	wS_OP:"position:absolute;top:5px;left:70px;padding:5px;border-radius:5px;background-color:rgba(200,200,200,0.7);color:#333;font-size:12px;",
}
	$("#jmy_web").hide(250);
	$(".jmy_web_contador").hide(250);
	function jmy_web_guardar(d) {
		console.log(d);
		d = d.data;
		if (d.id != '') {
			var v = (d.valor!=undefined)?d.valor:$("#" + d.id).html();
			var g = {
				"valor": v,
				"pagina": d.page,
				"tabla": d.tabla,
				"opciones": {
					"href": $("#jmy_web_href").val()
				},
				"id": d.id,
			};
			if (g.href != undefined) {
				$("#" + d.id).attr("href", g.href);
			}
			$.ajax({
				url: location.origin + '/jmyWebAjG',
				type: 'post',
				dataType: 'json',
				success: function(res) {
					console.log(res);
					mensajeGuardado();
				},
				error: function(res) {
					console.log(res);
				},
				data: g
			});
			console.log(g);
		} else {
			console.log(leng.no_data_save);
		}
	}

	function botones(d = []) {
		var left = d.pageX;
		var top = d.pageY + 30;
		console.log(d);
		d = d.data;
		$("#jmy_web").html("");
		$("#jmy_web").addClass("jmyweb-botones");
		$("#jmy_web").css({
			'left': left + 'px',
			'top': top + 'px',
			'z-index': '10000',
			'position': 'absolute',
			'border-radius': '5px',
			'padding': '5px',
			'background-color': 'rgba(200,200,200,0.65)'
		});
		var href = ($("#" + d.id).attr("href") != undefined) ? $("#" + d.id).attr("href") : false;
		var html = ''; /*if(href!==false)		//	html = html + '<input type="text" value="'+href+'" id="jmy_web_href" placeholder="href:'+data.data.id+'"> ';		*/
		html = html + '<img src="'+leng.imgLogo+'" heigth="60"><button class="jmy_web_guardar" data-id="' + d.id + '" data-page="' + d.page + '" data-tabla="' + d.tabla + '" style="'+style.b_guardar+'">[=] '+leng.guardar+'</button><button class="jmy_web_cancelar" style="'+style.b_cancelar+'">[x]</button>';
		$("#jmy_web").html(html);
		$("#jmy_web").show(250);
		$(".jmy_web_guardar").click(function() {
			jmy_web_guardar({data:d});
		});
		$(".jmy_web_cancelar").click(function(e) {
			$("#jmy_web").hide(250);
		});
	}

	function herramientas(d = []) {
		var left = 100;
		var top = 5;
		$("#jmy_web_tools").html("");
		$("#jmy_web_tools").addClass("jmyweb-botones");
		$("#jmy_web_tools").css({
			'right': left + 'px',
			'top': top + 'px',
			'position': 'fixed',
			'z-index': '100000'
		}); 2
		var html = '';
		/*if(href!==false)	
			html = html + '<input type="text" value="'+href+'" id="jmy_web_href" placeholder="href:'+d.data.id+'"> ';*/
		html = html + '<button class="jmy_t_guardar" style="'+style.h_guardar+'">[+] '+leng.guardar_cambios+'</button><button class="jmy_web_tools_cancelar" style="'+style.h_cancelar+'"> [x] '+leng.guardar_cambios+'</button>';
		$("#jmy_web_tools").html(html);
		$("#jmy_web_tools").show(250);
		$(".jmy_t_guardar").click(function() {
			guardarSinGuardar();
			$("#jmy_web_tools").hide(250);
		});
		$(".jmy_web_tools_cancelar").click(function(e) {
			$("#jmy_web_tools").hide(250);
		});
	}
	function guardarSinGuardar(){
		console.log(sinGuardar);
		var t = [];
		for (var i = 0; i < sinGuardar.length; i++) {
			t = {
				"id": sinGuardar[i],
				"page": $("#" + sinGuardar[i]).data("page"),
				"tabla": $("#" + sinGuardar[i]).data("tabla"),
			};
			console.log(t);
			jmy_web_guardar({
				data: t
			});
		}
		sinGuardar = [];
	}
	function mensajeGuardado(){
		$("#jmy_web").html("");
		$("#jmy_web").html("<p>"+leng.dato_guardado+"</p>").delay(2000).hide(500);
	}
	function agregarSinGuardar(d){/*({id:785})*/
		if(jQuery.inArray(d.id,sinGuardar)== -1) 
			sinGuardar.push(d.id);		
	}
	$(".jmy_web_div").click(function(e) {
		var d = {
			"id": $(this).attr('id'),
			"placeholder": $(this).data("placeholder"),
			"page": $(this).data("page"),
			"tabla": $(this).data("tabla"),
		};
		agregarSinGuardar(d);
		herramientas();
		if ($(this).data('editor') != 'no') { /*CKEDITOR.remove(data.id); CKEDITOR.replace(this);*/ } else {
			$(this).attr("contenteditable", "true");
			CKEDITOR.remove(d.id);
			botones({
				pageX: e.pageX,
				pageY: e.pageY,
				data: d
			});
		}
	}); /*Final de funciones Globales para el tema */ /* Funciones Editor de Blog */
	function msk_add_blog() {
		var html = '<button class="jmy_blog_guardar" >'+leng.agregar_post+'</button>';
		html = html + '<input type="text" id="nombre_nuevo_post" placeholder="'+leng.nombre_nuevo_post+'"> ';
		$("#jmy_web_agregar_blog").html("");
		$("#jmy_web_agregar_blog").html(html);
		$(".jmy_blog_guardar").click(function() {
			var str = $("#nombre_nuevo_post").val();
			if (str != '') {
				var r = str.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-').toLowerCase();
				r = location.origin + "/blog/" + r + "/guardar";
				window.location.href = r;
			} else {
				alert(leng.sin_titulo_post);
			}
		});
	}

	$(".jmy_web_categorias").click(function(e) {
		var d = { 	"t":$(this).data('titulo'),
					"v":$(this).data('value'),
					"p":$(this).data('page'),
					"id":$(this).attr('id'),
				};
		console.log(d);
		var t=(d.t!='')?d.t:leng.seccion_comas;
		var v = prompt(t,d.v);		
		if (v != null) {
			jmy_web_guardar({data:{
					"valor": v,
					"page": d.p,
					"id": d.id,	
				}});
			location.reload();			
		}	    
	}); 

	function html_categorias(d=[]){
		var h='';
		var b='';
		$(".jmy_web_categorias").each(function() {
			h='';			
			b=$(this).data('button');
			console.log(b);
			b=(b!=undefined)?b:"Cambiar titulos de pestañas";
			h = '<div style="background-color:rgba(30,170,30,0.7);padding:4px;font-size:16px;color:fcfcfc;border-radius:5px">'+b+'</div>';
			$(this).html('');	
			$(this).show(250);	
			$(this).html(h);				
		});
	}

	$(".jmy_web_contador").click(function(e) {
		var d = { 	"t":$(this).data('titulo'),
					"v":$(this).data('value'),
					"p":$(this).data('page'),
					"id":$(this).attr('id'),
				};
		console.log(d);
		var t = (d.t!='') ? d.t : leng.cont_cant;
		var v = prompt(t,d.v);		
		if (v != null) {
			v = parseInt(v);
			if (v != null ) {
				jmy_web_guardar({data:{
						"valor": v,
						"page": d.p,
						"id": d.id,	
					}});
				location.reload();
			}else{
				alert('valor incorrecto');
			}
		}	    
	}); 

	function html_contador(d=[]){
		var c='';
		var h='';
		var b='';
		$(".jmy_web_contador").each(function() {
			h='';
			c=$(this).data('value');
			b=$(this).data('button');
			b=(b!=undefined)?b:'Carrucel de '+c+' páginas';
			h = '<div style="background-color:rgba(30,170,30,0.7);padding:4px;font-size:16px;color:fcfcfc;border-radius:5px">'+b+'</div>';
			$(this).html('');	
			$(this).show(250);	
			$(this).html(h);				
		});
	}


    function web_slider(d=[]){	  	
    	var va=JSON.stringify(d.var);
    	var pos = (d.button=='down') ? 'bottom:5px;left:5px;':'top:5px;left:5px;';
      	$("#"+d.id).append("<div style='z-index:10000;position:absolute;"+pos+"' id='"+d.id+"_DI'><img style='width: 66px;height: auto;' id='"+d.id+"_OP' src='http://social.comsis.mx/templet/images/logo.png' data-var='"+va+"' data-page='"+d.page+"' data-tabla='"+d.tabla+"' heigth='60'></div>");    
      	
      	$("#"+d.id+"_OP").click(function(){
      		$(".webSliderOP").remove();
      		web_slider_OP({
      			id:d.id,
      			var:$(this).data('var'),
      			tabla:$(this).data('tabla'),
      			page:$(this).data('page')
      		});
      	});
      	
    };
    
    function guardarSlider(d=[]){
		var t = [];
		for (var i = 0; i < wSSaveTextArr.length; i++) {
			t = wSSaveTextArrDa[wSSaveTextArr[i]];
			t = {
				"id": wSSaveTextArr[i],
				"valor": t.val,
				"page": t.page,
			};
			if(t.type=="text"){
				$("#"+wSSaveTextArr[i]).html("");
				$("#"+wSSaveTextArr[i]).html(t.val);
			}
			jmy_web_guardar({data: t});
      		$(".webSliderOP").remove();
		}
	}
	function addGuardarSlider(d){/*({id:785})*/
		if(jQuery.inArray(d.id,wSSaveTextArr)== -1 && d.id!=undefined) {
			wSSaveTextArr.push(d.id);		
			wSSaveTextArrDa[d.id]=[];
			wSSaveTextArrDa[d.id]=d;
		}
		if(d.id!=undefined){
			var t =wSSaveTextArrDa[d.id];
			console.log(t);
			t.val=d.val;
			wSSaveTextArrDa[d.id]=t;
		}
	}
    function web_slider_OP(d=[]){
      	var h="";
      	var t=[];
      	for(var i=0;i<d.var.length;i++){
      		t=d.var[i];
      		switch (t.type) {
			    case 'imagen':
			        h=h+'<div id="drop-area" data-id_target="'+t.id+'" data-page="'+d.page+'" data-tabla="'+d.tabla+'" style="'+style.wS_ima+'"><h3 class="drop-text" style="'+style.wS_ima_h3+'">'+leng.drop_image+'</h3></div>';
			    break;
			    case 'text':
			        h=h+'<div style="'+style.wS_tx+'"><input data-page="'+d.page+'" data-tabla="'+d.tabla+'" type="text" placeholder="'+t.placeholder+'" value=""  id="'+t.id+'" data-id_target="'+t.id+'" class="wSSaveText" style="'+style.wS_tx_in+'"></div>';
			    break;
			}
      	}
      	if(h=="")
      		h=leng.no_data_editable;
      	else
      		h=h+'<div style="'+style.wS_he+'"><button class="jmy_slider_guardar" style="'+style.wS_gu+'">[+]</button><button class="jmy_web_slider_cancelar" style="'+style.wS_ca+'"> [x] </button></div>';

      	$("#"+d.id+"_DI").append('<div class="webSliderOP" style="'+style.wS_OP+'">'+h+'</div>');

      	$(".wSSaveText").on('input',function(){
      		var t={	id:$(this).data('id_target'),
					page:$(this).data('page'),
					tabla:$(this).data('tabla'),
					val:$(this).val(),
					type:"text"	};			
      		addGuardarSlider(t); 
      	});
      	$(".jmy_slider_guardar").click(function(){
      		guardarSlider();
      	});

      	$(".jmy_web_slider_cancelar").click(function(){
      		var wSSaveTextArr=[];
      		$(".webSliderOP").remove();
      	});
      	$("#drop-area").on('dragenter', function (e){
			e.preventDefault();
			$(this).css('background', '#BBD5B8');
		});

		$("#drop-area").on('dragover', function (e){
			e.preventDefault();
		});

		$("#drop-area").on('drop', function (e){
			$(this).css('background', '#D8F9D3');
			e.preventDefault();
			var im = e.originalEvent.dataTransfer.files;
			uImage(im,{	id:$(this).data('id_target'),
						page:$(this).data('page'),
						tabla:$(this).data('tabla')	});
		});

     }

    function uImage(im,d=[]){
		var fI = new FormData();
		fI.append('userImage', im[0]);
		uForm(fI,d);
	}

	function uForm(formData,d=[]){
		d.tabla=(d.tabla=="undefined")?"":d.tabla;
		$.ajax({
			url: "/jmyWebUpLoIm",
			type: "POST",
			data: formData,
			contentType:false,
    		dataType: 'json',
			cache: false,
			processData: false,
			success: function(r){
				console.log(r);			
				r.url =(r.url!=undefined)?r.url:r.val;
				var h = '<img width="45%" src="../'+r.url+'">';
				$('#drop-area').html(h);
				console.log(d);
				$("#"+d.id).attr("src",'../'+r.url);
				addGuardarSlider({	id:d.id,
									id_target:d.id,
      								tabla:d.tabla,
      								page:d.page,
      								val:'../'+r.url,
      							});
		},error: function(result) {
			console.log(result);
                }
            });
	}

	function cargaSlider(d = []) {
		$(".jmy_web_slider").each(function(e) {
			web_slider({
	            id: $(this).attr('id'),
	            placeholder: $(this).data("placeholder"),
	            page: $(this).data("page"),
	            tabla: $(this).data("tabla"),
	            var: $(this).data("var"),
	            marco: $(this).data("marco"),
	            button: $(this).data("button")
	        });
		});
	}

	function carga(d = []) {
		$(".jmy_web_div").each(function() {
			if ($(this).data('editor') != 'no') $(this).attr("contenteditable", "true");
			else console.log(this);
		});
	}
	$("#jmy_web").draggable({
		cursor: "move",
		cursorAt: {
			top: 20,
			left: 20
		}
	});


	carga();
	cargaSlider();
	html_contador();
	html_categorias();
	msk_add_blog();
});