<?php
/**
 * @var $gallery \NextcodeGallery\Models\Gallery
 * @var $options \NextcodeGallery\Models\Settings
 */

$options = \NextcodeGallery()->settings->getOptions();
$gallery_data = $gallery->getGallery();
$view = intval($gallery_data->view_type);
$id_gallery = $gallery->getId();
$images = array();

if (in_array($view, array(0, 1))) {
    switch ($gallery_data->display_type) {
        case 0:
            $images = $gallery->getItems();
            break;
        case 1:
            $images = $gallery->getItemsPerPage($gallery_data);
            break;
        case 2:
            $images = $gallery->getItemsPerPage($gallery_data);
            break;
    }
} else {
    $images = $gallery->getItems();
}

?>
<div class="nextcodegallery-gallery-container" id="nextcodegallery-container-<?= $id_gallery ?>" data-id="<?= $id_gallery ?>">
    <?php
    if (isset($gallery_data->show_title) && $gallery_data->show_title == 1) {
        echo "<h3 class='nextcode_gallerytitle_h3' style='text-align: " . $gallery_data->position . ";'>" . $gallery_data->name . "</h3>";
    }
    \NextcodeGallery\Helpers\View::render('frontend/view-' . $view . '.php', compact('gallery_data', 'images', 'options'));
    \NextcodeGallery\Helpers\View::render('frontend/view-' . $view . '.css.php', compact('id_gallery', 'gallery_data', 'options'));
    ?>

</div>





