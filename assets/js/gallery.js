window.addEventListener('DOMContentLoaded', (event) => {
    jQuery(function () {
        //JQuery start below.
        function galleryFlickity() {
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
        galleryFlickity();
        //JQuery end above.
    });
});