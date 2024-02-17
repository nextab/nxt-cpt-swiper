const swiper = new Swiper('.nxt-swiper', {
	// Optional parameters
	loop: true,
	a11y: true,
	autoplay: false,
	/* {
		delay: 7000,
	}, */
	slidesPerView: 1.33,
	spaceBetween: 20,
	// Responsive breakpoints
	breakpoints: {
		768: {
			slidesPerView: 2.33,
		},
		// when window width is >= 640px
		1400: {
			slidesPerView: 2.66,
		}
	},
	// If we need pagination
	/* pagination: {
		el: '.swiper-pagination',
	}, */

	// Navigation arrows
	navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
	},
	keyboard: {
		enabled: true,
	},
	// And if we need scrollbar
	/* scrollbar: {
		el: '.swiper-scrollbar',
	}, */
});