<?php

namespace NextcodeGallery\Controllers\Widgets;

class WidgetsController
{
    public static function init()
    {
        register_widget('NextcodeGallery\Controllers\Widgets\GalleryWidgetController');
    }
}
