window.addEventListener('DOMContentLoaded', (event) => {
    jQuery(function () {
        //JQuery start below.


        function bbPostTypeVideo() {
            var $postType = jQuery('body').attr('data-post-type');
            if ($postType === 'video') {
                var $firstVideoId = jQuery('.video:first-child').attr('data-videoid');
                if ($firstVideoId) {
                    jQuery('iframe').attr('src', 'https://www.youtube.com/embed/' + $firstVideoId);
                }


                jQuery('.video').click(function () {
                    var $videoId = jQuery(this).attr('data-videoid');
                    jQuery('iframe').attr('src', 'https://www.youtube.com/embed/' + $videoId);
                });



            }
        }

        bbPostTypeVideo();




        //JQuery end above.
    });
});