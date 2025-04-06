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
        slidesPerView: 1,
        spaceBetween: 10,
        breakpoints: {
            1024: { slidesPerView: 1 }, 
            768: { slidesPerView: 1 }, 
            480: { slidesPerView: 1 }, 
        },
    });
});