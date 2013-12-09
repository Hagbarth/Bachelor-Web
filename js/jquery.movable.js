	jQuery.fn.movable = function() {
		var worldpart = $(this);
		$(document).keyup(function(e) {
			switch (e.which) {
			    case 37:
			        $(worldpart).css('left', $(worldpart).offset().left - 1); //left arrow key
			        break;
			    case 38:
			        $(worldpart).css('top', $(worldpart).offset().top - 1); //up arrow key
			        break;
			    case 39:
			        $(worldpart).css('left', $(worldpart).offset().left + 1); //right arrow key
			        break;
			    case 40:
			        $(worldpart).css('top', $(worldpart).offset().top + 1); //bottom arrow key
			        break;
			    case 187:
			    	$(worldpart).css('height', $(worldpart).height() + 1);
			        $(worldpart).css('width', $(worldpart).width() + 1); //+ key
			        break;
			    case 189:
			    	$(worldpart).css('width', $(worldpart).width() - 1);
			        $(worldpart).css('height', $(worldpart).height() - 1); //- key
			        break;
			    case 65:
			    	alert( 'width: ' + $(worldpart).css('width') + ' height: ' + $(worldpart).css('height') + ' top: ' + $(worldpart).css('top') + ' left: ' + $(worldpart).css('left') );
			        break;
			   }
		});
	}
