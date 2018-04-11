/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	config.language = 'es';
	config.uiColor = '#bcbcbc';
  config.width = 900;
	config.height = 800;
	config.toolbarCanCollapse = true;
    config.extraPlugins = 'image2,newplugin,filebrowser';
    config.removeButtons = 'Underline,Subscript,Superscript,Strike';
    /*
    config.toolbar = 'MyToolbar';
   config.toolbar_MyToolbar = 
      [
         ['Newplugin', 'Preview'],
         ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Scayt', 'doctools','clipboard','basicstyles', 'cleanup'],
         ['Undo', 'Redo', '-', 'Find', 'Replace', '-', 'SelectAll', 'RemoveFormat' ],
         ['styles','colors']
      ];
    */
    config.toolbarGroups = [
    { name: 'others', groups: [ 'others' ] },
    { name: 'document', groups: [ 'document', 'doctools', 'mode' ] },
    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
    { name: 'forms', groups: [ 'forms' ] },
    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
    { name: 'links', groups: [ 'links' ] },
    { name: 'insert', groups: [ 'insert' ] },
    '/',
    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
    { name: 'styles', groups: [ 'styles' ] },
    { name: 'colors', groups: [ 'colors' ] },
    { name: 'tools', groups: [ 'tools' ] },
    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] }
  ];

  config.removeButtons = 'Preview,SelectAll,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Subscript,Superscript,CopyFormatting,CreateDiv,BidiLtr,BidiRtl,Language,Anchor,Flash,Iframe,Font,BGColor,About';
	  /*
	config.toolbarGroups = [
            { name: 'document',    groups: [ 'mode', 'document', 'doctools','Newplugin' ] },
            { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
            { name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ,'code'] },
            { name: 'forms' },
            '/',
            { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
            { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
            { name: 'links' },
            { name: 'insert' },
            '/',
            { name: 'styles' },
            { name: 'colors' },
            { name: 'tools' },
            { name: 'uploadimage' },
            { name: 'filetools' },
        
            { name: 'Newplugin' }
        ];
      */
        
};
