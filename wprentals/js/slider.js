jQuery(document).ready(function($) {
    $('.top_slider').slick({
        autoplay: true,
        autoplaySpeed: 2000,
        infinite: true,
        centerMode: true,
        centerPadding: '15%',
        slidesToShow: 1,
        dots: true,
        responsive: [{
            breakpoint: 1024,
            settings: {
                centerPadding: '5%',
            }
        }, {
            breakpoint: 767,
            settings: {
                centerPadding: '5%',
            }
        }],
    });
});
