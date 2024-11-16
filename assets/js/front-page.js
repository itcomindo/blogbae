window.addEventListener('DOMContentLoaded', (event) => {
    jQuery(function () {
        //JQuery start below.


        // sticky post flickity start.
        function stickyPostFlickityxxx() {
            jQuery('.sticky-wr').flickity({
                //options.
                'cellAlign': 'left',
                'contain': true,
                // 'pageDots': false,
                // 'prevNextButtons': false,
                'wrapAround': true,
                // 'autoPlay': 5000,

            });
        }

        function stickyPostFlickity() {
            // Inisialisasi Flickity
            var flkty = jQuery('.sticky-wr').flickity({
                cellAlign: 'left',
                contain: true,
                wrapAround: true,
            });

            // Event untuk mengatur aksesibilitas
            flkty.on('change', function (index) {
                var slides = document.querySelectorAll('.sticky-wr .item');

                slides.forEach(function (slide, i) {
                    if (i === index) {
                        // Slide aktif: aria-hidden false, elemen interaktif diaktifkan
                        slide.setAttribute('aria-hidden', 'false');
                        slide.querySelectorAll('a, button').forEach(function (el) {
                            el.removeAttribute('tabindex');
                        });
                    } else {
                        // Slide tidak aktif: aria-hidden true, elemen interaktif dinonaktifkan
                        slide.setAttribute('aria-hidden', 'true');
                        slide.querySelectorAll('a, button').forEach(function (el) {
                            el.setAttribute('tabindex', '-1');
                        });
                    }
                });
            });
        }
        stickyPostFlickity();
        // sticky post flickity end.

        // InfiniteScroll Start.
        function infiniteScroll() {
            jQuery('.items.infinite').infiniteScroll({
                // options
                path: '.next a',
                append: '.item.infinite',
                history: false,
                loadOnScroll: true,
                checkLastPage: true,
                scrollThreshold: 400,
            });
        }
        infiniteScroll();










        //JQuery end above.
    });
});