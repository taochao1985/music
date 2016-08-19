/*
Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
    config.filebrowserBrowseUrl = '/static/ckeditor/ckfinder/ckfinder.html?type=Files';
    config.filebrowserImageBrowseUrl = '/static/ckeditor/ckfinder/ckfinder.html?Type=Images';
    config.filebrowserFlashBrowseUrl = '/static/ckeditor/ckfinder/ckfinder.html?Type=Flash';
    config.filebrowserUploadUrl = '/static/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.filebrowserImageUploadUrl = '/static/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
    config.filebrowserFlashUploadUrl = '/static/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
