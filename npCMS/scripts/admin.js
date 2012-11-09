//
//  main.js
//  npCMS
//
//  Created by Erwin Goossen on 2011-09-23.
//  Copyright 2011 Erwin Goossen. All rights reserved.
//
_ROOT = 'http://localhost:8888';

$(document).ready(function() {
	// set Tooltips
	$('[title]').npTooltip();
	$('.userImage img').live('click', function() {
		$('#imageFile').trigger('click');
	});
	$('.buttons a.logout').live('click', function() {
		var url = _ROOT + '/admin.php/logout/1';
		document.location.href = url;
	});

	$('#body_text').tinymce({
		script_url : 'js/tiny_mce/tiny_mce.js',
		theme    : 'advanced',
		mode     : 'exact',
		elements : 'body_text',
		plugins : 'pagebreak, advimage, advlink, inlinepopups',
		theme_advanced_buttons1 : 'bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,formatselect,bullist,numlist,outdent,indent',
		theme_advanced_buttons2 : 'link,unlink,anchor,image,|,undo,redo,cleanup,code,|,sub,sup,charmap,|,pagebreak',
		theme_advanced_buttons3 : '',
		theme_advanced_toolbar_location : 'top',
		theme_advanced_toolbar_align : 'left',
		theme_advanced_statusbar_location : 'bottom',
		height:'350px',
		width:'600px',
		convert_urls : false,
		language : 'nl',
		file_browser_callback:'openKCFinder'
	});

	if ($('.items').hasClass('documents')) {
		$('.documents iframe').attr('src', '/kcfinder/browse.php?type=file&lang=nl');
	}

	if ($('.items').hasClass('images')) {
		$('.images iframe').attr('src', '/kcfinder/browse.php?type=image&lang=nl');
	}

});

function openKCFinder(field_name, url, type, win) {
	console.log('test openKCFEditor');
	tinyMCE.activeEditor.windowManager.open({
			file : '/kcfinder/browse.php?opener=tinymce&lang=nl&	type='+type,
			title : 'npCMS ',
			width : 700,
			height : 500,
			resizable : 'yes',
			inline : true,
			close_previous : 'no',
			popup_css : false
		},{
			window:win,input:field_name
	});
	return false;
}

function loadKcFinder(dir, lang) {
	$.get(_ROOT + '/kcfinder/browse.php?type=' + dir + '&lang=nl',
		function(data) {
			alert(data);
			$('.documents').html(data);
		});
}
