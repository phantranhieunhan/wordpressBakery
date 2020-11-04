<?php
/**
 * @var $galleries \NextcodeGallery\Models\Gallery[]
 */

?>

<form method="post" action="">
    <h3><?= _e('Select The Gallery', 'nextcodegallery'); ?></h3>

    <select id="nextcode_gallery_select">
        <?php
        foreach ($galleries as $gallery) {
            ?>
            <option value="<?php echo $gallery->getId(); ?>"><?php echo $gallery->getName(); ?></option>
            <?php
        }
        ?>
    </select>
    <button class='button primary'
            id='nextcode_gallery_insert'><?php _e('Insert Gallery', NEXTCODEGALLERY_TEXT_DOMAIN); ?></button>
</form>
