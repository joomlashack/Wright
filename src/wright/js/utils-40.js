// @todo optimize all the code on this file
var disableToolbarResize = false;

(function($) {
	function wToolbar() {
		if (typeof wrightWrapperToolbar === 'undefined')
			wrightWrapperToolbar = '#toolbar .navbar';
			
		$('.wrapper-toolbar').css('min-height', $(wrightWrapperToolbar).outerHeight() + 'px');
	}
	
	function fixImagesIE() {
		$('img').each(function() {
			if ($(this).attr('width') != undefined)
				$(this).width($(this).attr('width'));
		});
	}

    // Mobile menu dropdown
    function mobileMenu() {
        if (window.outerWidth < 992) {
            $wMenus = $('#menu, #toolbar, #bottom-menu');
            if($($wMenus).find('.dropdown-menu').length > 0) {

                $($wMenus).find('.dropdown-toggle .caret').on('click', function(e){
                    e.preventDefault();

                    $wToggleIcon       = $(this);
                    $wDropdown         = $(this).parent().siblings('.dropdown-menu');
                    $wMenuContainer    = $(this).closest('.nav-collapse');

                    // Switch icon
                    if ($($wToggleIcon).is('.wMinus-icon')) {
                        $($wToggleIcon).removeClass('wMinus-icon');
                    }else{
                        $($wToggleIcon).addClass('wMinus-icon');
                    }

                    // Show/hide submenu
                    if ($($wDropdown).is('.wDropdown-open')) {
                        $($wDropdown).removeClass('wDropdown-open');
                    }else{
                        $($wDropdown).addClass('wDropdown-open');
                    }

                    // Resize container
                    $wTotalHeight = 0;
                    $($wMenuContainer).children().each(function(){
                        $wTotalHeight = $wTotalHeight + $(this).outerHeight(true);
                    });

                    $($wMenuContainer).css('height', $wTotalHeight);

                    e.stopImmediatePropagation();
                });
            }
        }
    }

	wToolbar();
	fixImagesIE();

	$(window).on('load', function () {
        mobileMenu();
		if (!disableToolbarResize)
			wToolbar();
	});
	$(window).resize(function() {
        mobileMenu();
		if (!disableToolbarResize)
			wToolbar();
	});

	// Hover change images
	$('img.wrightHover').mouseenter(function() {
		if ($(this).data('wrighthover') != '') {
			$(this).attr('src', $(this).data('wrighthover'));
		}
	}).mouseleave(function() {
		if ($(this).data('wrighthover') != '') {
			$(this).attr('src', $(this).data('wrighthoverorig'));
		}
	});

	// Hover change images
	$('img.wrightHoverNewsflash').closest('div').parent().mouseenter(function() {
		var img = $(this).find('img.wrightHoverNewsflash');
		if (img) {
			if (img.data('wrighthover') != '') {
				img.attr('src', img.data('wrighthover'));
			}
		}
	}).mouseleave(function() {
		var img = $(this).find('img.wrightHoverNewsflash');
		if (img) {
			if (img.data('wrighthover') != '') {
				img.attr('src', img.data('wrighthoverorig'));
			}
		}
	});
})(jQuery);

jQuery(document).ready( function () {

    /*jQuery( '.dropdown-menu a.dropdown-toggle' ).on( 'click', function ( e ) {
        var $el = jQuery( this );
        var $parent = jQuery( this ).offsetParent( ".dropdown-menu" );
        if ( !jQuery( this ).next().hasClass( 'show' ) ) {
            jQuery( this ).parents( '.dropdown-menu' ).first().find( '.show' ).removeClass( "show" );
        }
        var $subMenu = jQuery( this ).next( ".dropdown-menu" );
        $subMenu.toggleClass( 'show' );

        jQuery( this ).parent( "li" ).toggleClass( 'show' );

        jQuery( this ).parents( 'li.nav-item.dropdown.show' ).on( 'hidden.bs.dropdown', function ( e ) {
            jQuery( '.dropdown-menu .show' ).removeClass( "show" );
        } );

        if ( !$parent.parent().hasClass( 'navbar-nav' ) ) {
            $el.next().css( { "top": $el[0].offsetTop, "left": $parent.outerWidth() - 4 } );
        }

        return false;
    } );*/

    // Sticky footer
    function stickyFooter() {
        if (jQuery('#footer')) {
            var h = jQuery('#footer').height();
            jQuery('.wrapper-footer').height(h);
            jQuery('body').css({'margin-bottom':h});
        }
    }
    jQuery(window).on('load', function () {
        jQuery('.wrapper-footer.sticky').css('bottom','0')
            .css('position','absolute')
            .css('z-index','100');
        stickyFooter();
    });
    stickyFooter();
    jQuery(window).resize(function() {
        stickyFooter();
    });

} );
