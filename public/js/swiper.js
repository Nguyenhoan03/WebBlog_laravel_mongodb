document.addEventListener("DOMContentLoaded", function () {
    new Swiper('.mySwiper', {
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        spaceBetween: 10,
        slidesPerView: 1, 
        slidesPerGroup: 1,

        breakpoints: {
            // Mobile (default): 1 slide
            480: {
                slidesPerView: 1,
            },
            // Tablet
            768: {
                slidesPerView: 2,
            },
            // Small desktop
            1024: {
                slidesPerView: 3,
            },
            // Full desktop
            1280: {
                slidesPerView: 4,
            },
        },
    });
});
