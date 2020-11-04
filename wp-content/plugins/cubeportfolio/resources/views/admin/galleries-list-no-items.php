<?php
$new_gallery_link = admin_url('admin.php?page=nextcodegallery&task=create_new_gallery');

$new_gallery_link = wp_nonce_url($new_gallery_link, 'nextcode_gallerycreate_new_gallery');
?>
<tr>
    <td colspan="5"><?php _e('No Galleries Found.', NEXTCODEGALLERY_TEXT_DOMAIN); ?> <a
                href="<?php echo $new_gallery_link; ?>"><?php _e('Add New', NEXTCODEGALLERY_TEXT_DOMAIN); ?></a></td>
</tr>
