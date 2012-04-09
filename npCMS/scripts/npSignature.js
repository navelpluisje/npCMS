(function($) {
	$.fn.npSignature = function(opt) {
		var defaults = {
			image     : 'http://navelpluisje.nl/img/ik.png',
			close     : 'http://navelpluisje.nl/img/closeSignature.png',
			mailTo    : 'yourName@yourHost.com',
			url       : 'http://yourWebsite.com',
			createdBy : 'yourSelf',
			name      : 'yourName'
		};

		//overwrite defaullt settings with user-defined ones
		var options = $.extend(defaults, opt);
		var site = options.url.substr(7);
		var mailAddress = options.mailTo.replace('@', ' at ');

		//optionlists
		return this.each( function() {
			obj = $(this);

			var html = '<div id="npsTag">';
			html    += '<img src="' + options.close + '" alt="X" class="npsClose""/>';
			html    += '<img src="' + options.image + '" alt="ik" />';
			html    += '<b>' + options.name + '</b><br /><br />';
			html    += '<a href="' + options.url + '">' + site + '</a><br/>';
			html    += '<a href="mailto:' + options.mailTo.replace('@', '%40') + '">' + mailAddress + '</a>';
			html    += '</div>';
			html    += 'created by: <span class="npSignature">' + options.createdBy + '</span>';
			
			obj.append(html);
			
			$('#npsTag').hide();
			$('.npSignature').click(function() {       
				$('#npsTag').show(1000);
			});
			$('#npsTag').click(function() {
				$('#npsTag').hide(1000);
			});
			$('.npsClose').click(function() {
				$('#npsTag').hide(1000);
			});
		});
	};
})(jQuery);
