// 
//  main.js
//  npCMS
//  
//  Created by Erwin Goossen on 2011-09-23.
//  Copyright 2011 Erwin Goossen. All rights reserved.
// 

// Global vars
var menuItems = {"3" : [{"x":-260, "y":-150}, {"x":260, "y":-150}, {"x":0, "y":300}],
                 "4" : [{"x":-212, "y":-212}, {"x":212, "y":-212}, {"x":212, "y":212}, {"x":-212, "y":212}],
                 "5" : [{"x":-198, "y":-198}, {"x":198, "y":-198}, {"x":0, "y":300}, {"x":310, "y":136}, {"x":-310, "y":136}],
				 "6" : [{"x":-260, "y":-150}, {"x":0, "y":-300}, {"x":260, "y":-150}, {"x":260, "y":150}, {"x":0, "y":300}, {"x":-260, "y":150}]};
var colors    = ['#00aeef', '#a7cd3d', '#ff7a03', '#ffc400', '#e8008f'];
				 

$(document).ready(function() {
	// Align the menuItems
	if ($('#menu li a').size() > 0) {
		var count = 0
		var size  = $('#menu li').size() + '';
		$('#menu li a').each(function(i,e) {
			$(this).css({'top'  : (300 + menuItems[size][i].y) + 'px',
			       'left' : (312 + menuItems[size][i].x) + 'px',
			       'color' : colors[(i > 4 ? i - 5 : i)],
			       'textShadow' : '0 0 7px ' + colors[(size > 5 ? i - size : i)]
			       });
		});
	}

	// Get menuItemcolor
	var item = $('.contentBlock h1').text().toLowerCase().replace(/\s/gi, '');
	if (item.length > 0) {
		var color = $('.' + item + ' a').css('color');
		$('.contentBlock h1').css('color', color);
		$('.contentBlock h3').css('borderColor', color);
		$('#content .background').css('borderColor', color);
		var parts = color.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
		$('.close a img').attr('src', '/functions/image.php?r=' + parts[1] + '&g=' + parts[2] + '&b=' + parts[3]);
	}
	
	// Create navelpluisje footer
	$('#npFooter').npSignature({
		image     : 'http://navelpluisje.nl/img/ik.png',
		mailTo    : 'info@navelpluisje.nl',
		url       : 'http://navelpluisje.nl',
		createdBy : 'Navelpluisje.nl',
		name      : 'Erwin Goossen'
	});
	
	// set Tooltips
	$('[title]').npTooltip();
	
	// Move stars on mousemove
	$(document).mousemove(function(event) {
		var hCenter = Math.floor(getWindowWidth() / 2);
		var vCenter = Math.floor($('#wrapper').css('height').replace('px', '') / 2);
		var mouseLeftPos = event.pageX - hCenter;
		var vertVar = mouseLeftPos / 200;
		var mouseTopPos  = event.pageY - vCenter;
		var horiVar = mouseTopPos / 200;
		var pos  = (10-vertVar) + '%' + (10-horiVar) + '%,';
		    pos += (80-vertVar*.25) + '%' + (25-horiVar*.25) + '%,';
		    pos += (40-vertVar*.45) + '%' + (70-horiVar*.45) + '%,';
		    pos += (90-vertVar*.35) + '%' + (85-horiVar*.35) + '%,'; 
		    pos += (05-vertVar*.25) + '%' + (75-horiVar*.25) + '%,';
		    pos += (85-vertVar*.45) + '%' + (05-horiVar*.45) + '%,';
		    pos += (30-vertVar*.35) + '%' + (95-horiVar*.35) + '%,'; 
		    pos += (25-vertVar*.25) + '%' + (30-horiVar*.25) + '%,';
		    pos += (70-vertVar*.45) + '%' + (65-horiVar*.45) + '%,';
		    pos += 'left top';
		$('#wrapper').css({backgroundPosition: pos});
	});
	
	// Set jScrollPane
	$('.itemList').jScrollPane();
});

function getWindowWidth() {
	var windowWidth;
	if (document.body && document.body.offsetWidth) {
		windowWidth = document.body.offsetWidth;
	}
	if (document.compatMode=='CSS1Compat' && document.documentElement && document.documentElement.offsetWidth ) {
		windowWidth = document.documentElement.offsetWidth;
	}
	if (window.innerWidth && window.innerHeight) {
		windowWidth = window.innerWidth;
	}
	return windowWidth;
}

function menuPosition(items) {
	var menuItems = items;
	var angle = 360/menuItems;
	var posX  = 0;
	var posY  = 0;
	for (i=1; i < Math.ceil(menuItems/2); i++) {
		posX = Math.cos(72) * 300; 
		posY = Math.sin(72) * 300; 
//		alert('x: ' + Math.floor(posX * -1) +'\ny: ' + Math.floor(posY * -1));
	}
}