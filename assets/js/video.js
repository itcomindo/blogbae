window.addEventListener('DOMContentLoaded', (event) => {
    jQuery(function () {
        //JQuery start below.


        // sticky post flickity start.
        function videoFlickity() {
            jQuery('#sing .items').flickity({
                //options.
                'cellAlign': 'left',
                'contain': true,
                // 'pageDots': true,
                // 'prevNextButtons': false,
                'wrapAround': true,
                // 'autoPlay': 5000,

            });
        }
        videoFlickity();
        // sticky post flickity end.



        //JQuery end above.
    });
});