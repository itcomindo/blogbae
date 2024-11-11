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




        //JQuery end above.
    });
});