<?php

namespace NextcodeGallery\Controllers\Frontend;


class FrontendController
{
    public function __construct()
    {
        add_shortcode('nextcode_gallery', array('NextcodeGallery\Controllers\Frontend\ShortcodeController', 'run'));
        new GalleryPreviewController();
        FrontendAssetsController::init();
    }
}
