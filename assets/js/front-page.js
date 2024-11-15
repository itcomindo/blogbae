window.addEventListener('DOMContentLoaded', (event) => {
    jQuery(function () {
        //JQuery start below.


        // sticky post flickity start.
        function stickyPostFlickity() {
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
        // infiniteScroll();










        //JQuery end above.
    });
});