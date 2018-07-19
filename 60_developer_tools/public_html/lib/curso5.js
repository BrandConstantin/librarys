jQuery(function ($) {
    $('.slider').sss();
});

(function () {
    Galleria.loadTheme('plugins/galleria/themes/classic/galleria.classic.min.js');
    Galleria.run('.galleria');
}());

var swiper = new Swiper('.slideshow1');
//var swiper = new Swiper('.slideshow2');

var swiper = new Swiper('.slideshow2', {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});