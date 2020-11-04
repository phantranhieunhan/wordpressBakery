<?php
/**
 * Template for gallery list
 */
global $wpdb;

$new_gallery_link = admin_url('admin.php?page=nextcodegallery&task=create_new_gallery');

$new_gallery_link = wp_nonce_url($new_gallery_link, 'nextcode_gallerycreate_new_gallery');

?>

<div class="wrap nextcode_gallerylist_container ">

    <div class="nextcode_gallerycontent">

        <div class="nextcodegallery-list-header">
            <div>
                <a href="<?php echo $new_gallery_link; ?>" id="nextcodegallery-new-gallery">New Gallery</a>
            </div>

        </div>


        <table class="widefat striped fixed forms_table">
            <thead>
            <tr>
                <th scope="col" id="header-id" style="width:10px"><span><?php _e('ID', NEXTCODEGALLERY_TEXT_DOMAIN); ?></span>
                </th>
                <th scope="col" id="header-name" style="width:85px">
                    <span><?php _e('Name', NEXTCODEGALLERY_TEXT_DOMAIN); ?></span>
                </th>
                <th scope="col" id="header-fields" style="width:55px">
                    <span><?php _e('Items', NEXTCODEGALLERY_TEXT_DOMAIN); ?></span></th>

                <th scope="col" id="header-shortcode" style="width:115px">
                    <span><?php _e('Shortcode', NEXTCODEGALLERY_TEXT_DOMAIN); ?></span></th>
                <th style="width:35px"><?php _e('Actions', NEXTCODEGALLERY_TEXT_DOMAIN); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php


            $galleries = \NextcodeGallery\Models\Gallery::get();
            if (!empty($galleries)) {
                foreach ($galleries as $gallery) {
                    \NextcodeGallery\Helpers\View::render('admin/galleries-list-single-item.php', array('gallery' => $gallery));
                }
            } else {
                \NextcodeGallery\Helpers\View::render('admin/galleries-list-no-items.php');
            }
            ?>
            </tbody>

            <tfoot>
            <tr>
                <th scope="col" class="footer-id" style="width:30px"></th>
                <th scope="col" class="footer-name" style="width:85px">
                    <span><?php _e('Name', NEXTCODEGALLERY_TEXT_DOMAIN); ?></span></th>
                <th scope="col" class="footer-fields" style="width:85px">
                    <span><?php _e('Items', NEXTCODEGALLERY_TEXT_DOMAIN); ?></span></th>
                <th scope="col" class="footer-shortcode" style="width:85px">
                    <span><?php _e('Shortcode', NEXTCODEGALLERY_TEXT_DOMAIN); ?></span></th>
                <th style="width:60px"><?php _e('Actions', NEXTCODEGALLERY_TEXT_DOMAIN); ?></th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
