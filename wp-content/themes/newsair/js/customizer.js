/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	var myCustomizer = window.parent.window.wp.customize;

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	
	// Header text hide and show and text color.
	wp.customize( 'header_textcolor', function( value ) {
		if(value() == 'blank'){
			myCustomizer.control('newsair_title_font_size').container.hide();
		}else{
			myCustomizer.control('newsair_title_font_size').container.show();
		}
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
				$( '.site-branding-text ' ).addClass('d-none');
				myCustomizer.control('newsair_title_font_size').container.hide();
			} else {
				$('.site-title').css('position', 'unset');
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-branding-text ' ).removeClass('d-none');
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
				myCustomizer.control('newsair_title_font_size').container.show();
			}
		} );
	} );
	
	// Site Title Font Size.
	wp.customize( 'newsair_title_fontsize_desktop', function( value ) {
		value.bind( function( newVal ) {
			$( '.site-title a' ).css( {
				'font-size': newVal+'px',
			} );
		} );
	} );
	
	// Logo width.
	wp.customize( 'desktop_side_logo_width', function( value ) {
		value.bind( function( newVal ) {
			$( '.bs-header-main .navbar-brand img, .bs-headfour .navbar-header img' ).css( {
				'width': newVal+'px',
			} );
		} );
	} );

	// Header Banner, Site Title and Site Tagline Center Alignment.
	wp.customize( 'newsair_center_logo_title', function( value ) {
		value.bind( function( newVal ) {
			var firstChild = $('.bs-header-main .row.align-items-center').children(':nth-child(1)');
			var secondChild = $('.bs-header-main .row.align-items-center').children(':nth-child(2)');	
			if(newVal == true){
				if(firstChild.hasClass('col-lg-4 text-start')){
					firstChild.removeClass('col-lg-4 text-start');
				} 
				firstChild.addClass('col-lg-12 text-center');

				if(secondChild.hasClass('col-lg-8')){
					secondChild.removeClass('col-lg-8');
				} 
				secondChild.addClass('col-lg-12');
				
				
				secondChild.children(':nth-child(1)').addClass('d-flex justify-content-center mt-3');
			}else{
				if(firstChild.hasClass('col-lg-12 text-center')){
					firstChild.removeClass('col-lg-12 text-center');
				} 
				firstChild.addClass('col-lg-4 text-start');

				if(secondChild.hasClass('col-lg-12')){
					secondChild.removeClass('col-lg-12');
				} 
				secondChild.addClass('col-lg-8');
				
				if(secondChild.children(':nth-child(1)').hasClass('d-flex justify-content-center mt-3')){
					secondChild.children(':nth-child(1)').removeClass('d-flex justify-content-center mt-3');
				} 
			}
			console.log(newVal);
		} );
	} );

	// Footer Widget Area Column.
	wp.customize( 'newsair_footer_column_layout', function( value ) {
		var colum = 12 / value();
		var wclass = $('.animated.bs-widget');
		if(wclass.hasClass('col-md-12')){
			wclass.removeClass('col-md-12');
		}else if(wclass.hasClass('col-md-6')){
			wclass.removeClass('col-md-6');
		}else if(wclass.hasClass('col-md-4')){
			wclass.removeClass('col-md-4');
		}else if(wclass.hasClass('col-md-3')){
			wclass.removeClass('col-md-3');
		}
		wclass.addClass(`col-md-${colum}`);

		value.bind( function( newVal ) {
			colum = 12 / newVal;
			wclass = $('.animated.bs-widget');
			if(wclass.hasClass('col-md-12')){
				wclass.removeClass('col-md-12');
			}else if(wclass.hasClass('col-md-6')){
				wclass.removeClass('col-md-6');
			}else if(wclass.hasClass('col-md-4')){
				wclass.removeClass('col-md-4');
			}else if(wclass.hasClass('col-md-3')){
				wclass.removeClass('col-md-3');
			}
			wclass.addClass(`col-md-${colum}`);
			console.log(wclass);
		} );
	} );
} )( jQuery );
