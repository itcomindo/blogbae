window.onload = function () {
    const images = document.querySelectorAll("img.find-this");

    images.forEach(function (img) {
        if (!img.hasAttribute('width') || !img.hasAttribute('height')) {
            const wrapper = img.parentElement;

            if (wrapper) {
                const rect = wrapper.getBoundingClientRect();
                img.setAttribute('width', rect.width);
                img.setAttribute('height', rect.height);
            }
        }
    });

    /**
     * Resizes images to match the dimensions of their parent elements.
     * Iterates over each image and sets its width and height attributes
     * based on the bounding rectangle of its parent element.
     *
     * @function resizeImages
     */
    function resizeImages() {
        images.forEach(function (img) {
            const wrapper = img.parentElement;
            if (wrapper) {
                const rect = wrapper.getBoundingClientRect();
                img.setAttribute('width', rect.width);
                img.setAttribute('height', rect.height);
            }
        });
    }

    window.addEventListener('resize', resizeImages);
};