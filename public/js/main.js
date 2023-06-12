AOS.init();

    var swiper = new Swiper(".mySwiper", {
        grabCursor: true,
        centeredSlides: false,
        spaceBetween: 20,
        slidesPerView: "auto",
        navigation: {
            nextEl: ".bi-caret-right-square-fill",
            prevEl: ".bi-caret-left-square-fill",
        },
    });
