$(".owl1").owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    dots: false,
    navText: [
        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        '<i class="fa fa-angle-right" aria-hidden="true"></i>',
    ],
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 2,
        },
        1200: {
            items: 3,
        },
        1500: {
            items: 3,
        },
    },
});
