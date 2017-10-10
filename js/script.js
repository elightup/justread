( function( document, window, undefined ) {
	var form = document.getElementById( 'form-wrapper' ),
		open = document.getElementById( 'search-toggle' ),
		close = document.getElementById( 'search-close' ),
		click = 'ontouchstart' in window ? 'touchstart' : 'click';
	open.addEventListener( click, openSearchForm, true );
	close.addEventListener( click, closeSearchForm, true );

	function openSearchForm() {
		form.classList.add( 'is-visible' );
		form.querySelector( '.search-field' ).focus();
	}
	function closeSearchForm( event ) {
		event.preventDefault();
		form.classList.remove( 'is-visible' );
	}

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