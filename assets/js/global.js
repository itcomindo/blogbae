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

        //Call Mobile Menu Start.
        //Call Mobile Menu Start.
        function callMobileMenu() {
            var $screenWidth = screenWidth();
            if ($screenWidth < 769) {
                var $trigger = jQuery('.mm-trigger');

                // Event untuk membuka menu ketika trigger diklik
                $trigger.on('click', function (e) {
                    e.stopPropagation();
                    jQuery(this).hide();
                    jQuery('#mm').toggleClass('active');
                    setTimeout(function () {
                        jQuery('#mm .close').toggleClass('active');
                    }, 1000);
                });

                // Event untuk menutup menu ketika tombol close diklik
                jQuery('#mm .close').on('click', function () {
                    jQuery('#mm').removeClass('active');
                    jQuery('#mm .close').removeClass('active');
                    $trigger.show();
                });

                // Event untuk menutup menu ketika klik di luar elemen #mm
                jQuery(document).on('click', function (e) {
                    if (!jQuery(e.target).closest('#mm').length && !jQuery(e.target).closest('.mm-trigger').length) {
                        jQuery('#mm').removeClass('active');
                        jQuery('#mm .close').removeClass('active');
                        $trigger.show();
                    }
                });

                // Event untuk menutup menu ketika #mm sendiri diklik
                jQuery('#mm').on('click', function () {
                    jQuery('#mm').removeClass('active');
                    jQuery('#mm .close').removeClass('active');
                    $trigger.show();
                });
            }
        }
        callMobileMenu();
        //Call Mobile Menu End.



        // Resize Function Start.
        jQuery(window).resize(function () {
            stickyJs();
            callMobileMenu();
        });
        // Resize Function End.









        //JQuery end above.
    });
});