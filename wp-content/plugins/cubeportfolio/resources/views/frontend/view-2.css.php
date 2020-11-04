<?php

/**
 * @var $id_gallery \NextcodeGallery\Models\Gallery
 * @var $gallery_data \NextcodeGallery\Models\Gallery
 */

$container = "#nextcodegallery-container-".$id_gallery;

echo "<style>";
?>

<?= $container ?> a.ug-thumb-wrapper{
    box-shadow: none !important;
}

.ug-lightbox .ug-lightbox-top-panel-overlay{
    background-color: #<?= $options['top_panel_bg_color_wide']; ?> !important;
}

<?=  $gallery_data->custom_css; ?>
<?= "</style>" ?>
