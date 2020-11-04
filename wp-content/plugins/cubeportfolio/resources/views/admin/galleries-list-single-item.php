<?php
/**
 * Template for galleries list single item
 *
 * @var $gallery \NextcodeGallery\Models\Gallery
 */

$GalleryId = $gallery->getId();

$EditUrl = admin_url('admin.php?page=nextcodegallery&task=edit_gallery&id=' . $GalleryId);

$EditUrl = wp_nonce_url($EditUrl, 'nextcode_galleryedit_gallery_' . $GalleryId);

$RemoveUrl = admin_url('admin.php?page=nextcodegallery&task=remove_gallery&id=' . $GalleryId);

$RemoveUrl = wp_nonce_url($RemoveUrl, 'nextcode_galleryremove_gallery_' . $GalleryId);

$DuplicateUrl = admin_url('admin.php?page=nextcodegallery&task=duplicate_gallery&id=' . $GalleryId);

$DuplicateUrl = wp_nonce_url($DuplicateUrl, 'nextcode_galleryduplicate_gallery_' . $GalleryId);


?>
<tr>
    <td class="form-id">
        <?= $gallery->getId(); ?>
    </td>
    <td class="form-name"><a
                href="<?php echo $EditUrl; ?>"><?php echo esc_html(stripslashes($gallery->getName())); ?></a></td>
    <?php $items = $gallery->getItems(); ?>
    <td class="form-fields"><?php echo ($items ? count($items) : 0);; ?></td>
    <td class="form-shortcode">[nextcode_gallery id_gallery="<?php echo $GalleryId; ?>"]

        <span class="use_another_shortcode">or use php shortcode</span>

        <span class="nextcode_galleryphp_shortcode"> &lt;?php echo do_shortcode('[nextcode_gallery id_gallery=<?php echo $GalleryId; ?>
            ]'); ?&gt;</span>
    </td>
    <td class="form-actions">
        <a class="nextcode_galleryedit_form" href="<?php echo $EditUrl; ?>"><i class="nextcodeicon nextcodeicon-setting"
                                                                         aria-hidden="true"></i></a>
        <a class="nextcode_galleryduplicate_form" href="<?php echo $DuplicateUrl; ?>"><i class="nextcodeicon nextcodeicon-duplicate"
                                                                                   aria-hidden="true"></i></a>
        <a class="nextcode_gallerydelete_form" href="<?php echo $RemoveUrl; ?>"><i class="nextcodeicon nextcodeicon-remove"
                                                                             aria-hidden="true"></i></a>
        <a class="nextcode_gallerypreview_form" target="_blank"
           href="<?php echo \NextcodeGallery\Controllers\Frontend\GalleryPreviewController::previewUrl($gallery->getId(), false); ?>"><i
                    class="nextcodeicon nextcodeicon-eye"
                    aria-hidden="true"></i></a>
    </td>
</tr>

