window.addEventListener('DOMContentLoaded', (event) => {
    jQuery(function () {
        //JQuery start below.

        function screenWidth() {
            var $screenWidth = jQuery(window).width();
            return $screenWidth;
        }


        // StickyJS Start.
        function initSticky() {
            var screenWidth = screen.width;
            var dataSticky = jQuery('#wrapper-right').attr('data-sticky');

            if (screenWidth > 768 && dataSticky === 'true') {
                var sidebar = document.querySelector('.sidebars');
                var offsetTop = sidebar.offsetTop;

                window.addEventListener('scroll', function () {
                    if (window.pageYOffset > offsetTop) {
                        sidebar.classList.add('is-sticky');
                    } else {
                        sidebar.classList.remove('is-sticky');
                    }
                });
            }
        }
        initSticky();
        // StickyJS End.

        //Call Mobile Menu Start.
        function callMobileMenu() {
            var $screenWidth = screenWidth();
            if ($screenWidth < 841) {
                var $trigger = jQuery('.mm-trigger');

                // Event untuk membuka menu ketika trigger diklik
                $trigger.on('click', function (e) {
                    e.stopPropagation();
                    jQuery('.bars').toggleClass('active');
                    jQuery('#mm').toggleClass('active');
                    setTimeout(function () {
                        jQuery('#mm .close').toggleClass('active');
                    }, 1000);
                });

                // Event untuk menutup menu ketika tombol close diklik
                jQuery('#mm .close').on('click', function () {
                    jQuery('#mm').removeClass('active');
                    jQuery('#mm .close').removeClass('active');
                    jQuery('.bars').removeClass('active');
                });

                // Event untuk menutup menu ketika klik di luar elemen #mm
                jQuery(document).on('click', function (e) {
                    if (!jQuery(e.target).closest('#mm').length && !jQuery(e.target).closest('.mm-trigger').length) {
                        jQuery('#mm').removeClass('active');
                        jQuery('#mm .close').removeClass('active');
                        jQuery('.bars').removeClass('active');
                    }
                });

                // Event untuk menutup menu ketika #mm sendiri diklik
                jQuery('#mm').on('click', function () {
                    jQuery('#mm').removeClass('active');
                    jQuery('#mm .close').removeClass('active');
                    jQuery('.bars').removeClass('active');
                });
            }
        }
        callMobileMenu();
        //Call Mobile Menu End.

        //Call Search Form Start.
        function callSearchForm() {
            var $screenWidth = screenWidth();
            if ($screenWidth < 541) {
                jQuery('#header-search-wr').slideUp();

                // Toggle search form on click of the trigger
                jQuery('.search-trigger').on('click', function (e) {
                    e.stopPropagation(); // Prevent triggering the click event on the document
                    jQuery('#header-search-wr').slideToggle().toggleClass('active');
                });

                // Close the search form when clicking outside
                jQuery(document).on('click', function (e) {
                    if (!jQuery(e.target).closest('#header-search-wr, .search-trigger').length) {
                        if (jQuery('#header-search-wr').hasClass('active')) {
                            jQuery('#header-search-wr').slideUp().removeClass('active');
                        }
                    }
                });
            }
        }
        callSearchForm();

        //Call Search Form End.






        // Resize Function Start.
        jQuery(window).resize(function () {
            initSticky();
            callMobileMenu();
            callSearchForm();
        });
        // Resize Function End.









        //JQuery end above.
    });
});