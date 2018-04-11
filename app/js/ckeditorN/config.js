/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {

  	config.width = 900;
	config.height = 800;
  	extraPlugins = 'imageuploader';

	config.toolbarCanCollapse = true;
    config.extraPlugins = 'jmyfn';
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
	  
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
};
