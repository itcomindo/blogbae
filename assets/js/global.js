window.addEventListener('DOMContentLoaded', (event) => {
    jQuery(function () {
        //JQuery start below.

        function screenWidth() {
            var $screenWidth = jQuery(window).width();
            return $screenWidth;
        }


        // StickyJS Start.
        function stickyJs() {
            var $screenWidth = screenWidth();
            if ($screenWidth > 768) {
                var sticky = new Sticky('.sidebars');
            }
        }
        stickyJs();
        // StickyJS End.


        // Resize Function Start.
        jQuery(window).resize(function () {
            stickyJs();
        });
        // Resize Function End.









        //JQuery end above.
    });
});