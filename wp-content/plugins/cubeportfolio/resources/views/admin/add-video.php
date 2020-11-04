<div id="nextcodegallery-addvideo-modal" class="-nextcodegallery-modal">
    <div class="-nextcodegallery-modal-content">
        <div class="-nextcodegallery-modal-content-header">
            <div class="-nextcodegallery-modal-header-icon">

            </div>
            <div class="-nextcodegallery-modal-header-info">
                <h3><?= _e('Add Video URL From Youtube or Vimeo', 'nextcodegallery'); ?></h3>
            </div>
            <div class="-nextcodegallery-modal-close">
                <i class="fa fa-close"></i>
            </div>
        </div>
        <div class="-nextcodegallery-modal-content-body">
            <form action="admin.php?page=nextcodegallery&id=<?php echo $id_gallery; ?>&save_data_nonce=<?php echo $save_data_nonce; ?>"
                  method="post" id="nextcode_galleryadd_video_form" name="nextcode_galleryadd_video_form">

                <input type="hidden" name="nextcode_galleryid_gallery" value="<?= $id_gallery ?>">
                <ul class="video_fields">

                    <li><label for="nextcode_galleryvideo_url"><?= _e('Video URL (Youtube or Vimeo)', 'nextcodegallery'); ?>
                            :</label><br>
                        <input type="text" id="nextcode_galleryvideo_url"
                               name="nextcode_galleryvideo_url"
                               value="" required>
                    </li>

                    <li><label for="nextcode_galleryvideo_name"> <?= _e('Title', 'nextcodegallery'); ?>:</label><br>
                        <input type="text" id="nextcode_galleryvideo_name"
                               name="nextcode_galleryvideo_name"
                               value="">
                    </li>
                    <li>
                        <label for="nextcode_galleryvideo_description">
                            <?= _e('Description', 'nextcodegallery'); ?>: </label><br>
                        <input type="text" id="nextcode_galleryvideo_description"
                               name="nextcode_galleryvideo_description"
                               value=""></li>
                    <li>
                        <label for="nextcode_galleryvideo_link"> <?= _e('Link', 'nextcodegallery'); ?>:</label><br>
                        <input type="text" name="nextcode_galleryvideo_link"
                               id="nextcode_galleryvideo_link"
                               value=""></li>
                </ul>

                <div class="video_save">
                    <input type="submit" value="<?= _e('Save', 'nextcodegallery'); ?>"
                           id="nextcodegallery-add-video-buttom"
                           class="nextcodegallery-save-buttom">
                    <span class="spinner"></span>
                </div>
            </form>


        </div>
    </div>
</div>
