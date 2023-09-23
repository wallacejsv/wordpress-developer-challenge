(function ($) {

	function aosLazyloading() {

        document.querySelectorAll('img')
        .forEach((img) =>
            img.addEventListener('load', () =>
                AOS.refresh(),
            )
        );
    }

	function initAOS() {
		AOS.init({
			once: true,
		});
	}

	function menuAnimation() {
        var scroll = $(window).scrollTop();
        if (scroll > 0) {
            $('header .nav-top-full.scroll').addClass('on-screen');
        } else {
            $('header .nav-top-full.scroll').removeClass('on-screen');
        }
	}

	$(window).scroll(function () {
        menuAnimation();
    });

	$(document).ready(function () {
		aosLazyloading();
		initAOS();
		$('.sliders').slick({
			lazyLoad: 'ondemand',
			slidesToShow: 5,
			slidesToScroll: 2,
			responsive: [
				{
				  breakpoint: 1024,
				  settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
					infinite: true,
					dots: true
				  }
				},
				{
				  breakpoint: 600,
				  settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				  }
				},
				{
				  breakpoint: 480,
				  settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				  }
				}
			]
		});
	});

})(jQuery);
