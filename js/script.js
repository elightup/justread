( function( document, window ) {
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
} )( document, window );