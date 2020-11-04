<?php

namespace NextcodeGallery\Controllers\Widgets;

use NextcodeGallery\Helpers\View;

class GalleryWidgetController extends \WP_Widget
{
    /**
     * Widget constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'NextcodeGallery_Widget',
            __('NextCode Gallery', NEXTCODEGALLERY_TEXT_DOMAIN),
            array('description' => __('NextCode Gallery', NEXTCODEGALLERY_TEXT_DOMAIN),)
        );
    }

    /**
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance)
    {
        extract($args);

        if (isset($instance['nextcode_gallery_id']) && (absint($instance['nextcode_gallery_id']) == $instance['nextcode_gallery_id'])) {
            $nextcode_gallery_id = $instance['nextcode_gallery_id'];

            $title = apply_filters('widget_title', $instance['title']);

            if (!empty($title)) {
                echo $title;
            }

            echo do_shortcode("[nextcode_gallery id_gallery='{$nextcode_gallery_id}']");
        } else {
            echo __('Select Gallery to Display', NEXTCODEGALLERY_TEXT_DOMAIN);
        }
    }

    /**
     * @param array $new_instance
     * @param array $old_instance
     * @return array
     */
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['nextcode_gallery_id'] = strip_tags($new_instance['nextcode_gallery_id']);
        $instance['title'] = strip_tags($new_instance['title']);

        return $instance;
    }

    /**
     * @param array $instance
     * @var $instance
     * @return string|void
     */
    public function form($instance)
    {
        $galleryInstance = (isset($instance['nextcode_gallery_id']) ? $instance['nextcode_gallery_id'] : 0);
        $title = (isset($instance['title']) ? $instance['title'] : '');

        View::render('admin/Widgets/GalleryWidget.php', array('widget' => $this, 'title' => $title, 'galleryInstance' => $galleryInstance));
    }
}
