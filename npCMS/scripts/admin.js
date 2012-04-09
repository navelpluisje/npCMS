// 
//  main.js
//  npCMS
//  
//  Created by Erwin Goossen on 2011-09-23.
//  Copyright 2011 Erwin Goossen. All rights reserved.
// 

$(document).ready(function() {
	// set Tooltips
	$('[title]').npTooltip();
	$('.userImage img').live('click', function() {
		$('#imageFile').trigger('click');
	});
	$('.buttons a.logout').live('click', function() {
		var url = '/admin/logout/1'
		document.location.href = url;
	});
});
