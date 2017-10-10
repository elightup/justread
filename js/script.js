( function( document, window, undefined ) {
	var form = document.getElementById( 'form-wrapper' ),
		open = document.getElementById( 'search-toggle' ),
		close = document.getElementById( 'search-close' ),
		click = 'ontouchstart' in window ? 'touchstart' : 'click';
	open.addEventListener( click, openSearchForm );
	close.addEventListener( click, closeSearchForm );

	function openSearchForm() {
		form.classList.add( 'is-visible' );
		form.querySelector( '.search-field' ).focus();
	}
	function closeSearchForm() {
		form.classList.remove( 'is-visible' );
	}

	// Press ESC key close search form.
	document.addEventListener( 'keyup', function( event ) {
		if ( 27 === event.keyCode ) {
			closeSearchForm();
		}
	} );

	// Sticky share button for single posts. Applied only for large screens and icon style.
	if ( window.innerWidth >= 1200 && 'undefined' !== typeof StickySidebar ) {
		var adminBarHeight = document.body.classList.contains( 'admin-bar' ) ? 32 : 0,
			sharedaddy = new StickySidebar( '.entry-body .sharedaddy', {
				containerSelector: '.entry-body',
				innerWrapperSelector: '.sd-social-icon',
				topSpacing: adminBarHeight
			} );
	}


} )( document, window );