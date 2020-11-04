<?php
/**
 * Template for edit gallery page
 * @var $gallery \NextcodeGallery\Models\Gallery
 */

use NextcodeGallery\Controllers\Frontend\GalleryPreviewController as Preview;

global $wpdb;

$gallery->setViewStyles();

$items = $gallery->getItems(true);

$gallery_data = $gallery->getGallery();

$list = $gallery->getGalleriesUrl();

$new_gallery_link = admin_url('admin.php?page=nextcodegallery&task=create_new_gallery');

$new_gallery_link = wp_nonce_url($new_gallery_link, 'nextcode_gallerycreate_new_gallery');

$id = $gallery->getId();


$save_data_nonce = wp_create_nonce('nextcode_gallerynonce_save_data' . $id);

$hidden_class = "nextcode_galleryhidden";
$display_type_opt = (in_array($gallery_data->view_type, array(0, 1))) ? "" : $hidden_class;
$show_title_opt = (isset($gallery_data->show_title) && $gallery_data->show_title == 1) ? "" : $hidden_class;


?>

<ul class="switch_gallery">
    <?php foreach ($list as $val): ?>
        <?php if ($val["id_gallery"] == $id): ?>
            <li class='active_gallery' id='nextcode_galleryactive'>
                <a href="#" id="nextcode_galleryedit_name"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                <a href="<?= $val["url"] ?>" id="gallery_active_name"><?= stripslashes($val["name"]) ?></a>
                <input type='text' name='edit_name' id='edit_name_input' value='<?= stripslashes($val["name"]) ?>'
                       class="nextcode_galleryhidden">
            </li>
        <?php else: ?>
            <li>
                <a href="<?= $val["url"] ?>"><?= $val["name"] ?></a>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
    <li class="add_gallery_li">
        <a href="<?= $new_gallery_link ?>"><?= __('ADD GALLERY', 'nextcodegallery') ?> <i class="fa fa-plus"
                                                                                    aria-hidden="true"></i></a>
    </li>
</ul>
<form action="admin.php?page=nextcodegallery&id=<?php echo $id; ?>&save_data_nonce=<?php echo $save_data_nonce; ?>"
      method="post" name="nextcode_galleryimages_form" id="nextcode_galleryimages_form">
    <div class="wrap nextcode_galleryedit_gallery_container">
        <div class="nextcode_gallerynav">


            <div id="nextcode_gallerytabs">
                <div style="clear: both"></div>
                <div class="settings-toogled-container">

                    <ul class="nextcode_gallerytabs">
                        <li class="Tabs__tab nextcode_galleryactive_Tab nextcode_galleryTab">
                            <a href="#nextcode_gallery_style"><?php _e('Gallery Style', 'nextcodegallery'); ?></a>
                        </li>
                        <li class="Tabs__tab nextcode_galleryTab">
                            <a href="#nextcode_gallerygeneral_settings"><?php _e('General Settings', 'nextcodegallery'); ?></a>
                        </li>
                        <li class="Tabs__tab nextcode_galleryTab">
                            <a href="#nextcode_gallerycustom_css"><?php _e('Custom CSS', 'nextcodegallery'); ?></a>
                        </li>
                        <li class="Tabs__tab nextcode_galleryTab">
                            <a href="#nextcode_galleryget_shortcode"><?php _e('Get Shortcode', 'nextcodegallery'); ?></a>
                        </li>
                        <li class="Tabs__presentation-slider" role="presentation"></li>
                        <a href="<?php echo Preview::previewUrl($gallery->getId(), false); ?>"
                           class="single_gallery_preview" target="_blank"><?php _e('Preview Changes', 'nextcodegallery'); ?>
                            <img
                                    src="<?= NEXTCODEGALLERY_IMAGES_URL ?>icons/preview.png"></a>
                        <input type="submit" value="<?= _e('Save', 'nextcodegallery'); ?>"
                               id="nextcodegallery-save-buttom"
                               class="nextcodegallery-save-buttom nextcodegallery-save-all">
                        <span class="spinner"></span>

                    </ul>
                    <div id="nextcode_gallery_style" style="display: none;">
                        <?php foreach ($gallery->getViewStyles() as $key => $view): ?>
                            <div class="nextcode_galleryview_item <?php if ($gallery_data->view_type == $key) echo "checked_view" ?>">
                                <label>
                                    <p><?= $view[0] ?></p>
                                    <input type="radio" <?php if ($gallery_data->view_type == $key) echo "checked" ?>
                                           name="nextcode_galleryview_type" value="<?= $key ?>"/>
                                    <img src="<?= $view[1] ?>">

                                </label>
                            </div>
                        <?php endforeach; ?>

                    </div>
                    <div id="nextcode_gallerygeneral_settings">
                        <div class="gallery_title_div">
                            <input type="text" id="gallery_name" name="nextcode_galleryname"
                                   value="<?php if ($gallery->getName() != "New Created Gallery") echo $gallery->getName(); ?>"
                                   placeholder="<?= _e('Name Your Gallery', 'nextcodegallery'); ?>">
                            <input type="hidden" id="nextcode_galleryid_gallery" name="nextcode_galleryid_gallery"
                                   value="<?php echo $id; ?>">

                        </div>
                        <ul class="nextcode_gallerygeneral_settings">
                            <?php if (isset($gallery_data->show_title)) { ?>
                                <li class="nextcode_galleryshow_title_section">
                                    <h4><?= _e('Show Gallery Title', 'nextcodegallery'); ?></h4>
                                    <input type="checkbox" id="nextcode_galleryshow_title"
                                           name="nextcode_galleryshow_title" <?php if ($gallery_data->show_title == 1) echo "checked"; ?>>
                                </li>
                                <li class="nextcode_gallerytitle_position_section <?php echo $show_title_opt; ?>">
                                    <h4><?= _e('Gallery Title Position', 'nextcodegallery'); ?></h4>
                                    <select name="nextcode_galleryposition" id="nextcode_galleryposition">
                                        <option value="left" <?php if ($gallery_data->position == 'left') echo "selected" ?>>
                                            <?= _e('Left', 'nextcodegallery'); ?>
                                        </option>
                                        <option value="center" <?php if ($gallery_data->position == 'center') echo "selected" ?>>
                                            <?= _e('Center', 'nextcodegallery'); ?>
                                        </option>
                                        <option value="right" <?php if ($gallery_data->position == 'right') echo "selected" ?>>
                                            <?= _e('Right', 'nextcodegallery'); ?>
                                        </option>
                                    </select>
                                </li>
                            <?php } ?>
                            <li class="nextcode_gallerydisplay_type_section <?= $display_type_opt ?>">
                                <h4><?= _e('Content Display Type', 'nextcodegallery'); ?>&nbsp;&nbsp;<span style="color:red;font-weight: 700">PRO</span></h4>
                                <select>
                                    <option value="0" <?php if ($gallery_data->display_type == 0) echo "selected" ?>>
                                        <?= _e('Show All', 'nextcodegallery'); ?>
                                    </option>
                                    <option value="1" <?php if ($gallery_data->display_type == 1) echo "selected" ?>>
                                        <?= _e('Load more', 'nextcodegallery'); ?>
                                    </option>
                                    <option value="2" <?php if ($gallery_data->display_type == 2) echo "selected" ?>>
                                        <?= _e('Pagination', 'nextcodegallery'); ?>
                                    </option>
                                </select>
                            </li>
                            <li class="nextcode_galleryitems_per_page_section <?php if ($gallery_data->display_type == 0) echo "nextcode_galleryhidden" ?>  <?= $display_type_opt ?>">
                                <h4>  <?= _e('Items Per Page', 'nextcodegallery'); ?></h4>
                                <input type="number" min="0" max="100" name="nextcode_galleryitems_per_page"
                                       id="nextcode_galleryitems_per_page" class="nextcode_galleryitems_per_page"
                                       value="<?= $gallery_data->items_per_page ?>">
                            </li>
                            <li class="nextcode_gallerysorting_section">
                                <h4><?= _e('Image Sorting', 'nextcodegallery'); ?>&nbsp;&nbsp;<span style="color:red;font-weight: 700">PRO</span></h4>
                                <select>
                                    <option value="0" <?php if ($gallery_data->sort_by == 0) echo "selected" ?>>
                                        <?= _e('Custom Sorting', 'nextcodegallery'); ?>
                                    </option>
                                    <option value="1" <?php if ($gallery_data->sort_by == 1) echo "selected" ?>>
                                        <?= _e('Numeric / Alphabetical', 'nextcodegallery'); ?>
                                    </option>
                                    <option value="2" <?php if ($gallery_data->sort_by == 2) echo "selected" ?>>
                                        <?= _e('Upload Date', 'nextcodegallery'); ?>
                                    </option>
                                </select>
                            </li>
                            <li class="nextcode_galleryordering_section">
                                <h4><?= _e('Image order', 'nextcodegallery'); ?>&nbsp;&nbsp;<span style="color:red;font-weight: 700">PRO</span></h4>
                                <select>
                                    <option value="0" <?php if ($gallery_data->order_by == 0) echo "selected" ?>>
                                        <?= _e('Ascending', 'nextcodegallery'); ?>
                                    </option>
                                    <option value="1" <?php if ($gallery_data->order_by == 1) echo "selected" ?>>
                                        <?= _e('Descending', 'nextcodegallery'); ?>
                                    </option>
                                    <option value="2" <?php if ($gallery_data->order_by == 2) echo "selected" ?>>
                                        <?= _e('Random', 'nextcodegallery'); ?>
                                    </option>
                                </select>
                            </li>

                        </ul>


                    </div>

                    <div id="nextcode_gallerycustom_css">
                        <div class="custom_css_col">
                            <textarea cols="8" name="custom_css"><?php
                                if ($gallery_data->custom_css != "") {
                                    echo stripslashes($gallery_data->custom_css);
                                } else {
                                    echo "#nextcode_gallerycontainer_" . $id . "{}";
                                }
                                ?></textarea>
                        </div>
                    </div>
                    <div id="nextcode_galleryget_shortcode">
                        <div class="nextcode_galleryshortcode_types">
                            <div class="nextcode_galleryexample">
                                <h3> <?= _e('Shortcode', 'nextcodegallery'); ?></h3>
                                <p> <?= _e('Copy and paste this shortcode into your posts or pages.', 'nextcodegallery'); ?></p>
                                <div class="nextcode_galleryhighlighted">
                                    <span id="nextcode_galleryeditor_code">[nextcode_gallery id_gallery="<?= $id ?>"]</span>
                                    <a href="#" onclick="copyToClipboard('nextcode_galleryeditor_code')"
                                       class="copy_shortcode" title="<?= _e('Copy shortecode', 'nextcodegallery'); ?>"><i
                                                class="fa fa-files-o" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="nextcode_galleryexample">
                                <h3> <?= _e('PHP Shortcode', 'nextcodegallery'); ?></h3>
                                <p> <?= _e('Paste the PHP Shortcode into your template file', 'nextcodegallery'); ?></p>
                                <div class="nextcode_galleryhighlighted">
                                    <span id="nextcode_galleryphp_code">
                                    &lt;?php <br>
                                    echo do_shortcode('[nextcode_gallery id_gallery="<?= $id ?>"]'); <br>
                                    ?&gt;
                                    </span>
                                    <a href="#" onclick="copyToClipboard('nextcode_galleryphp_code')"
                                       class="copy_shortcode" title="<?= _e('Copy PHP script', 'nextcodegallery'); ?>"><i
                                                class="fa fa-files-o" aria-hidden="true"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="nextcode_galleryitems_section">
                <?php if (!empty($items)) { ?>
                    <p class="nextcode_galleryselect_all_items">
                        <label for="nextcode_galleryselect_all_items"> <?= _e('Select All', 'nextcodegallery'); ?></label> <input
                                type="checkbox"
                                id="nextcode_galleryselect_all_items"
                                name="select_all_items"/>
                    </p>
                    <a href="#"
                       class="nextcode_galleryremove_selected_images">  <?= _e('Remove selected items', 'nextcodegallery'); ?> <i
                                class="fa fa-times"
                                aria-hidden="true"></i></a>
                    <a href="#" class="nextcode_galleryedit_gallery_images">  <?= _e('Edit Images Info', 'nextcodegallery'); ?> <i
                                class="fa fa-pencil"
                                aria-hidden="true"></i></a>
                <?php } ?>
                <div class="nextcode_galleryclearfix"></div>
                <div class="nextcode_galleryadd_new nextcode_galleryadd_new_image" id="_unique_name_button">
                    <div class="nextcode_galleryadd_new_plus"></div>
                    <p>  <?= _e('NEW IMAGE', 'nextcodegallery'); ?></p>
                </div>
                <div class="nextcode_galleryadd_new nextcode_galleryadd_new_video">
                    <div class="nextcode_galleryadd_new_plus"></div>
                    <p> <?= _e('NEW VIDEO', 'nextcodegallery'); ?>&nbsp; <strong style="color:red">PRO</strong></p>
                </div>

                <ul class="nextcode_galleryitems_list">
                    <li class="empty_space">

                    </li>
                    <?php
                    if (!empty($items)) {
                        foreach ($items as $item):
                            $icon = ($item->type == "youtube") ? "fa-youtube-play" : (($item->type == "vimeo") ? "fa-vimeo" : "fa-picture-o");
                            ?>
                            <li class="nextcode_galleryitem" style="background-image: url('<?= $item->url ?>');">
                                <input type="hidden"
                                       name="nextcode_galleryordering[<?= $item->id_image ?>]"
                                       value="<?= $item->ordering ?>">

                                <p class="nextcode_galleryitem_title"><?= $item->name ?>
                                    <i class="fa <?= $icon ?>" aria-hidden="true"></i></p>
                                <div class="nextcode_galleryitem_overlay">
                                    <input type="checkbox" name="items[]"
                                           value="<?= $item->id_image; ?>" class="items_checkbox"/>
                                    <div class="nextcode_galleryitem_edit">
                                        <a href="<?php echo ($item->id_post != 0) ? admin_url() . "post.php?post=" . $item->id_post . "&action=edit&image-editor" : "#"; ?>"
                                           target="_blank" data-post-id="<?= $item->id_post ?>"
                                           data-image-id="<?= $item->id_image ?>"> <?= _e('EDIT', 'nextcodegallery'); ?></a>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach;
                    } else {
                        echo "No items in this gallery";
                    } ?>
                </ul>
            </div>
        </div>
</form>
<?php \NextcodeGallery\Helpers\View::render('admin/add-video.php', array('id_gallery' => $id, "save_data_nonce" => $save_data_nonce)); ?>
<?php \NextcodeGallery\Helpers\View::render('admin/edit-images.php', array('items' => $items, 'id_gallery' => $id, "save_data_nonce" => $save_data_nonce)); ?>



