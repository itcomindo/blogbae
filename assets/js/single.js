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



        function bbPostTypeGallery() {
            var $postType = jQuery('body').attr('data-post-type');
            if ($postType === 'gallery') {
                var $firstPhoto = jQuery('.photo:first-child').attr('data-photoid');
                if ($firstPhoto) {
                    jQuery('.photo-player img').attr('src', $firstPhoto);
                }
                jQuery('.photo').click(function () {
                    var $photoId = jQuery(this).attr('data-photoid');
                    console.log($photoId);
                    jQuery('.photo-player img').attr('src', $photoId);
                });
            }
        }
        bbPostTypeGallery();




        //JQuery end above.
    });
});