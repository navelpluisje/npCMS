(function($) {
	$.fn.npTooltip = function(opt) {
		var defaults = {
		};

		//overwrite defaullt settings with user-defined ones
		var options = $.extend(defaults, opt);

		//optionlists
		return this.each( function() {
			obj = $(this);
			var titleText;
			obj.mouseover(function(e, o) {
				titleText = '';
				titleText = $(this).attr('title');
				$(this).attr('title', '');
				var html = '<div class="nptContent">';
				html    += '<p>' + titleText + '</p>';
				html    += '</div>';
			 	var xPos = e.pageX;
				var yPos = e.pageY;
				$('#wrapper').append(html);
				$('.nptContent').hide();
				$('.nptContent').css({
					'position' : 'fixed', 
					'top' : yPos + 'px', 
					'left' : (xPos+15) + 'px'
					})
					.delay(1000)
					.show(500);
			});
			obj.mouseout(function() {
				$(this).attr('title', titleText);
				$('.nptContent').hide(500);
				$('.nptContent').remove();
			});
			
		});
	};
	function hideTooltip(obj) {
		obj.attr('title', titleText);
		$('.nptContent').hide(500);
		$('.nptContent').remove();
	}
})(jQuery);