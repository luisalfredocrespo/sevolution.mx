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
    { name: 'insert', groups: [ 'insert' ] }

  ];

  config.removeButtons = 'Preview,SelectAll,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Subscript,Superscript,CopyFormatting,CreateDiv,BidiLtr,BidiRtl,Language,Anchor,Flash,Iframe,Font,BGColor,About';
	  
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
};
