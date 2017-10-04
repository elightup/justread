( function( document, window ) {
	var form = document.querySelector( '.search-form' ),
		open = document.querySelector( '.icon-search' ),
		close = document.getElementById( 'search-close' ),
		click = 'ontouchstart' in window ? 'touchstart' : 'click';
	open.addEventListener( click, openSearchForm, false );
	close.addEventListener( click, closeSearchForm, false );

	function openSearchForm() {
		form.classList.add( 'is-visible' );
		form.querySelector( '.search-field' ).focus();
	}
	function closeSearchForm( event ) {
		event.preventDefault();
		form.classList.remove( 'is-visible' );
	}
} )( document, window );