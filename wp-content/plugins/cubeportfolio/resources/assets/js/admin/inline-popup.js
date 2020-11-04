jQuery(document).ready(function () {
    jQuery('#nextcode_gallery_insert').on('click', function () {
        var id = jQuery('#nextcode_gallery_select option:selected').val();
        window.send_to_editor('[nextcode_gallery id_gallery="' + id + '"]');
        tb_remove();
        return false;
    });
});
