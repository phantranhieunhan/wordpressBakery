<?php

$galleries = \NextcodeGallery\Models\Gallery::get();


?>
<style>
    .tb_popup_form {
        position: relative;
        display: block;
    }

    .tb_popup_form li {
        display: block;
        height: 35px;
        width: 70%;
    }

    .tb_popup_form li label {
        float: left;
        width: 35%
    }

    .tb_popup_form li input {
        float: left;
        width: 60%;
    }

    .slider, .slider-container {
        display: block;
        position: relative;
        height: 35px;
        line-height: 35px;
    }


</style>
<div id="nextcodegallery" style="display:none;">

    <?php

    $new_gallery_link = admin_url('admin.php?page=nextcodegallery&task=create_new_gallery');

    $new_gallery_link = wp_nonce_url($new_gallery_link, 'nextcode_gallerycreate_new_gallery');

    if ($galleries && !empty($galleries)) {
        \NextcodeGallery\Helpers\View::render('admin/inline-popup-gallery.php', array('galleries' => $galleries));
    } else {
        printf(
            '<p>%s<a class="button" href="%s">%s</a></p>',
            __('You have not created any galleries yet', NEXTCODEGALLERY_TEXT_DOMAIN) . '<br>',
            $new_gallery_link,
            __('Create New Gallery', NEXTCODEGALLERY_TEXT_DOMAIN)
        );
    }

    ?>
</div>
