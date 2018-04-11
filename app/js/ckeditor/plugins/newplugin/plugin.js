CKEDITOR.plugins.add('newplugin',
{
    init: function (editor) {
        var pluginName = 'newplugin';
        console.log(editor);
         editor.ui.addButton('Newplugin2',
            {
                label: 'My New Plugin 2',
                command: 'OpenWindowb',
                icon: CKEDITOR.plugins.getPath('newplugin') + 'guardar.gif'
            });
        var cmd = editor.addCommand('OpenWindowb', { exec: jmy_guardar_ckeditor });  
    }
});
function showMyDialog(e) {
    window.open(location.origin+'/archivos', 'MyWindow', 'width=800,height=700,scrollbars=no,scrolling=no,location=no,toolbar=no');
}