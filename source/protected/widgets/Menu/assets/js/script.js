jQuery(document).ready(function() {  
	  jQuery(function(){
			jQuery('ul.menu').superfish({
				delay		: 500,
				animation	: {opacity:'show',height:'show'},
				speed		: 'fast',
				autoArrows	: false,
				dropShadows : false					   	
			});
		});
});