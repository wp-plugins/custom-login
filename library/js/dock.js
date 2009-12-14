window.onload = function() {
	
	jQuery( window ).scroll( function( ){ 

		var scroller_object = jQuery( '#dock' );
	
		if( document.documentElement.scrollTop >= 299 || window.pageYOffset >= 299 )
		{
			scroller_object.addClass( 'fixed' );
		}
		else if( document.documentElement.scrollTop < 314 || window.pageYOffset < 314 )
		{
			scroller_object.removeClass( 'fixed' );
		}
	
	} );

}