//jQuery code
jQuery(function($) {
	"use strict";

	$('.insMainSlider').bxSlider({
	 	hideControlOnEnd: true,
	 	pager: false
	});
	/* END: HOME SLIDER */

	$('.insPeople').bxSlider({
	 	hideControlOnEnd: true,
	 	pager: false,
	});
	/* END: PEOPLE SLIDER */

	$('.insRoomSlider').bxSlider({
	 	hideControlOnEnd: true,
	 	pagerType: 'short'
	});
	/* END: ROOM SLIDER */

	

    $(window).load(function(){
		$('.gallery').isotope({
			itemSelector: '.gallery__item',
			masonry: {
				columnWidth: 158
			}
		});
		/* END: ISOTOP MASONRY */
	
        $('.blogPosts').isotope({
            itemSelector: '.blogPost',
            masonry: {
                columnWidth: 240
            }
        });
    });
    /* END: BLOG POSTS */

	$(".pull_insNav").on('click', function(e) {
		e.preventDefault();
		$(".insNav").slideToggle();
	});
	/* END: DROP NAV */


	$('.pull_insCategory').on('click', function(e) {
		e.preventDefault();
		$('.insCategories').slideToggle();
	});
	/* END: DROP CATEGORIES */

	$(body).fitVids();
	/* END: FIT */

});

