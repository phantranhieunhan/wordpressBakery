var nextcodegalleryModalGallery = {

    show: function (elementId, args) {
        var el = jQuery('#' + elementId);
        if (el.length) {
            el.css('display', 'block');
        }
    },

    hide: function (elementId) {
        var el = jQuery('#' + elementId);
        el.css('display', 'none');
    }
};

jQuery(document).ready(function () {
    jQuery('body').on('click', '.-nextcodegallery-modal-close', function () {
        nextcodegalleryModalGallery.hide(jQuery(this).closest('.-nextcodegallery-modal').attr('id'));
    });
});
