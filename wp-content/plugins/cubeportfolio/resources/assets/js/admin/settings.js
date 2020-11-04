jQuery(document).ready(function () {

    /* save plugin settings */
    jQuery('.nextcode_gallerycontent').on("click", "#save-form-button", function () {

        var nextcodeForm = jQuery('#nextcode-gallery');

        formData = nextcodeForm.serializeArray();

        var general_data = {
            action: "nextcode_gallerysave_plugin_settings",
            nonce: nextcode_gallerysettingsSave.nonce,
            formData: formData,
        };

        jQuery(this).attr("disabled", "disabled")
        jQuery.post(ajaxurl, general_data, function (response) {
            if (response.success) {
                jQuery('#save-form-button').removeAttr('disabled');
                toastr.success('Saved Successfully');
            } else {
                toastr.error('Error while saving');
            }
        }, "json");

        return false;
    });
});
