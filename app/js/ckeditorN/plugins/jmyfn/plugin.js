CKEDITOR.plugins.add('jmyfn',
{
    init: function (editor) {
        var pluginName = 'jmyfn';
        //console.log(editor);
         editor.ui.addButton('jmfnGuardar',
            {
                label: 'Guardar edición',
                command: 'OpenWindowb',
                icon: CKEDITOR.plugins.getPath('jmyfn') + 'guardar.gif'
            });
        var cmd = editor.addCommand('OpenWindowb', { exec: guardar });  
    }
});
function guardar(e) {
    var oEditor = CKEDITOR.currentInstance;   
   var guardar ={   "valor":$("#"+oEditor.name).html(),
                    "pagina":$("#"+oEditor.name).data('page'),
                    "opciones":{"href":$("#jmy_web_href").val()},
                    "tabla":$("#"+oEditor.name).data("tabla"),
                    "id":oEditor.name,
                    };
    if(guardar.href!=undefined){
        $("#"+oEditor.name).attr("href",guardar.href);
    }
    $.ajax({
        url: location.origin+'/jmyWebAjG', 
        type: 'post', 
        dataType: 'json', 
        success: function (res) {
            console.log(res);
         //   mensajeGuardado(); 
        },
        error: function (res) {
           console.log(res);              
        }, data:guardar
    });
   // window.open(location.origin+'/archivos', 'MyWindow', 'width=800,height=700,scrollbars=no,scrolling=no,location=no,toolbar=no');
}