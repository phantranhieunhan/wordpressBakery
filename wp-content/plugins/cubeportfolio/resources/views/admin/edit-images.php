<div id="nextcodegallery-editimages-modal" class="-nextcodegallery-modal">
    <div class="-nextcodegallery-modal-content">
        <form action="admin.php?page=nextcodegallery&id=<?php echo $id_gallery; ?>&save_data_nonce=<?php echo $save_data_nonce; ?>"
              method="post" id="nextcode_galleryedited_images_form" name="nextcode_galleryedited_images_form">
            <div class="-nextcodegallery-modal-content-header">
                <div class="-nextcodegallery-modal-header-icon">

                </div>
                <div class="-nextcodegallery-modal-header-info">
                    <h3> <?= _e('Images Info', 'nextcodegallery'); ?></h3>
                </div>
                <span class="spinner"></span>
                <input type="submit" value="<?= _e('Save', 'nextcodegallery'); ?>"
                       id="nextcodegallery-save-buttom"
                       class="nextcodegallery-save-buttom images-save">
                <div class="-nextcodegallery-modal-close">
                    <i class="fa fa-close"></i>
                </div>
            </div>
            <div class="-nextcodegallery-modal-content-body">


                <input type="hidden" name="nextcode_galleryimages_id_gallery" value="<?= $id_gallery ?>">
                <table class="quick_edit_table grid" id="nextcode_gallerysort">
                    <tbody>
                    <?php
                    if (!empty($items)) {
                        foreach ($items as $key => $item): ?>
                            <tr>
                                <td class="index"><input type="hidden"
                                                         name="nextcode_galleryimages_ordering[<?= $item->id_image ?>]"
                                                         value="<?= $item->ordering ?>"></td>
                                <td class="img_td">
                                    <img src="<?= $item->url ?>">
                                </td>
                                <td>
                                    <label for="nextcode_galleryimages_name[<?= $item->id_image ?>]"> <?= _e('Name', 'nextcodegallery'); ?>
                                        :</label>
                                    <input type="text" id="nextcode_galleryimages_name[<?= $item->id_image ?>]"
                                           name="nextcode_galleryimages_name[<?= $item->id_image ?>]"
                                           value="<?= $item->name ?>">
                                </td>
                                <td><label for="nextcode_galleryimages_description[<?= $item->id_image ?>]">
                                        <?= _e('Description', 'nextcodegallery'); ?>
                                        : </label>
                                    <input type="text" id="nextcode_galleryimages_description[<?= $item->id_image ?>]"
                                           name="nextcode_galleryimages_description[<?= $item->id_image ?>]"
                                           value="<?= $item->description ?>"></td>
                                <td>
                                    <label for="nextcode_galleryimages_link[<?= $item->id_image ?>]"><?= _e('Link', 'nextcodegallery'); ?>
                                        :</label>
                                    <input type="text" name="nextcode_galleryimages_link[<?= $item->id_image ?>]"
                                           id="nextcode_galleryimages_link[<?= $item->id_image ?>]"
                                           value="<?= $item->link ?>">
                                </td>
                               
                            </tr>
                        <?php endforeach;
                    } ?>
                    </tbody>
                </table>


            </div>
        </form>
    </div>
</div>
