<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 7/13/2017
 * Time: 10:00 AM
 */

namespace NextcodeGallery\Controllers\Admin;

use NextcodeGallery\Helpers\SettingsPageBuilder;
use NextcodeGallery\Helpers\View;
use NextcodeGallery\Models\Gallery;


class SettingsController
{

    private $options;

    /* public function __construct()
     {
         $this->settingsFileds();
     }*/

    public function settingsFileds()
    {
        $builder = new SettingsPageBuilder();

        $builder->setPageTitle(__('Views / Styles', 'nextcodegallery'));

        $builder->addTabs(array(
            "justified" => array('title' => __('Justified', 'nextcodegallery')),
            "tiles" => array('title' => __('Tiles', 'nextcodegallery')),
            "carousel" => array('title' => __('Carousel', 'nextcodegallery')),
            "slider" => array('title' => __('Slider', 'nextcodegallery')),
            "grid" => array('title' => __('Grid', 'nextcodegallery')),
            "lightbox" => array('title' => __('Lightbox settings', 'nextcodegallery')),
        ));

        $builder->addSections(array(
            'element_style_justified' => array(
                'title' => __('Element Styles and Settings', 'nextcodegallery'),
                'description' => __('Set image title options from this section', 'nextcodegallery'),
                "tab" => "justified"
            ),
            'load_more_justified' => array(
                'title' => __('Load More Styles', 'nextcodegallery'),
                'description' => __('Set load more options from this section', 'nextcodegallery'),
                "tab" => "justified"
            ),
            'pagination_justified' => array(
                'title' => __('Pagination Styles', 'nextcodegallery'),
                'description' => __('Set Pagination styles from this section ', 'nextcodegallery'),
                "tab" => "justified"
            ),
            'element_style_tiles' => array(
                'title' => __('Element Styles and Settings', 'nextcodegallery'),
                'description' => __('Set image title options from this section ', 'nextcodegallery'),
                "tab" => "tiles"
            ),
            'load_more_tiles' => array(
                'title' => __('Load More Styles', 'nextcodegallery'),
                'description' => __('Set load more options from this section ', 'nextcodegallery'),
                "tab" => "tiles"
            ),
            'pagination_tiles' => array(
                'title' => __('Pagination Styles', 'nextcodegallery'),
                'description' => __('Set Pagination styles from this section ', 'nextcodegallery'),
                "tab" => "tiles"
            ),
            'element_style_carousel' => array(
                'title' => __('Element Styles and Settings', 'nextcodegallery'),
                'description' => __('Set image title options from this section ', 'nextcodegallery'),
                "tab" => "carousel"
            ),
            'components_carousel' => array(
                'title' => __('Navigation Styles and Settings', 'nextcodegallery'),
                'description' => __('Set navigation options from this section ', 'nextcodegallery'),
                "tab" => "carousel"
            ),
            'element_style_slider' => array(
                'title' => __('Element Styles and Settings', 'nextcodegallery'),
                'description' => __('Set image title options from this section', 'nextcodegallery'),
                "tab" => "slider"
            ),
            'components_slider' => array(
                'title' => __('Navigation Styles and Settings', 'nextcodegallery'),
                'description' => __('Set navigation options from this section ', 'nextcodegallery'),
                "tab" => "slider"
            ),
            'element_style_grid' => array(
                'title' => __('Element Styles and Settings', 'nextcodegallery'),
                'description' => __('Set image title options from this section', 'nextcodegallery'),
                "tab" => "grid"
            ),
            'components_grid' => array(
                'title' => __('Navigation Styles and Settings', 'nextcodegallery'),
                'description' => __('Set navigation options from this section ', 'nextcodegallery'),
                "tab" => "grid"
            ),
            'wide_lightbox' => array(
                'title' => __('Wide Type Styles', 'nextcodegallery'),
                'description' => __('Set lightbox options for "Wide" type from this section ', 'nextcodegallery'),
                "tab" => "lightbox"
            ),
            'compact_lightbox' => array(
                'title' => __('Compact Type Styles', 'nextcodegallery'),
                'description' => __('Set lightbox options for "Compact" type from this section ', 'nextcodegallery'),
                "tab" => "lightbox"
            ),


        ));

        $builder->addFields(array(
            /*********** Justify options  ****************/

            'show_title_justified' => array(
                'type' => 'select',
                'label' => __('Title Option', 'nextcodegallery'),
                'options' => array(
                    '0' => __('Always on', 'nextcodegallery'),
                    '1' => __('On hover', 'nextcodegallery'),
                    '2' => __('Disable', 'nextcodegallery')
                ),
                'section' => 'element_style_justified',
                'help' => __('Choose how to display Image title', 'nextcodegallery')
            ),
            'title_position_justified' => array(
                'type' => 'select',
                'label' => __('Title Horizontal Position', 'nextcodegallery'),
                'options' => array(
                    'left' => __('Left', 'nextcodegallery'),
                    'center' => __('Center', 'nextcodegallery'),
                    'right' => __('Right', 'nextcodegallery')
                ),
                'section' => 'element_style_justified',
                'help' => __('Choose title position', 'nextcodegallery')
            ),
            'title_vertical_position_justified' => array(
                'type' => 'select',
                'label' => __('Title Vertical Position', 'nextcodegallery'),
                'options' => array(
                    'inside_top' => __('Top', 'nextcodegallery'),
                    'inside_bottom' => __('Bottom', 'nextcodegallery'),
                ),
                'section' => 'element_style_justified',
                'help' => __('Choose title position', 'nextcodegallery')
            ),
            'title_appear_type_justified' => array(
                'type' => 'select',
                'label' => __('Title On Hover Type', 'nextcodegallery'),
                'options' => array(
                    'slide' => __('Slide', 'nextcodegallery'),
                    'fade' => __('Fade', 'nextcodegallery'),
                ),
                'section' => 'element_style_justified',
                'help' => __('Choose title on hover effect', 'nextcodegallery')
            ),
            'title_size_justified' => array(
                'type' => 'number',
                'label' => __('Title Font Size', 'nextcodegallery'),
                'section' => 'element_style_justified',
                'help' => __('Set title font size in px', 'nextcodegallery')
            ),
            'title_color_justified' => array(
                'type' => 'color',
                'label' => __('Title Color', 'nextcodegallery'),
                'section' => 'element_style_justified',
                'help' => __('Set title color in HEXadecimal color system', 'nextcodegallery')
            ),
            'title_background_color_justified' => array(
                'type' => 'color',
                'label' => __('Title Background Color', 'nextcodegallery'),
                'section' => 'element_style_justified',
                'help' => __('Set title background color in HEXadecimal color system', 'nextcodegallery')
            ),
            'title_background_opacity_justified' => array(
                'type' => 'number',
                'label' => __('Title Background Opacity (%)', 'nextcodegallery'),
                'section' => 'element_style_justified',
                'help' => __('Set title background opacity in percentage', 'nextcodegallery')
            ),
            'margin_justified' => array(
                'type' => 'number',
                'label' => __('Image Margin', 'nextcodegallery'),
                'section' => 'element_style_justified',
                'help' => __('Set image margin in px', 'nextcodegallery')
            ),
            'height_justified' => array(
	            'type' => 'number',
	            'label' => __('Row Height', 'nextcodegallery'),
	            'section' => 'element_style_justified',
	            'help' => __('Set row height in px', 'nextcodegallery')
            ),
            'border_width_justified' => array(
                'type' => 'number',
                'label' => __('Image Border Width', 'nextcodegallery'),
                'section' => 'element_style_justified',
                'help' => __('Set image border width in px', 'nextcodegallery')
            ),
            'border_color_justified' => array(
                'type' => 'color',
                'label' => __('Image Border Color', 'nextcodegallery'),
                'section' => 'element_style_justified',
                'help' => __('Set image border color in HEXadecimal color system', 'nextcodegallery')
            ),
            'border_radius_justified' => array(
                'type' => 'number',
                'label' => __('Image Border Radius', 'nextcodegallery'),
                'section' => 'element_style_justified',
                'help' => __('Set image border radius in px', 'nextcodegallery')
            ),

            'show_icons_justified' => array(
                'type' => 'checkbox',
                'label' => __('Lightbox', 'nextcodegallery'),
                'section' => 'element_style_justified',
                'help' => __('Choose whether to turn Lightbox on/off', 'nextcodegallery')
            ),
            'show_link_icon_justified' => array(
                'type' => 'checkbox',
                'label' => __('URL Icon', 'nextcodegallery'),
                'section' => 'element_style_justified',
                'help' => __('Choose whether to turn URL icon on/off', 'nextcodegallery')
            ),
            'item_as_link_justified' => array(
                'type' => 'checkbox',
                'label' => __('Image As Link', 'nextcodegallery'),
                'section' => 'element_style_justified',
                'help' => __('Set image as link', 'nextcodegallery'),
            ),
            'link_new_tab_justified' => array(
                'type' => 'checkbox',
                'label' => __('Open Link In New Tab', 'nextcodegallery'),
                'section' => 'element_style_justified',
                'help' => __('Choose whether to open the link in a new tab', 'nextcodegallery')
            ),
            'on_hover_overlay_justified' => array(
                'type' => 'checkbox',
                'label' => __('On Hover Overlay', 'nextcodegallery'),
                'section' => 'element_style_justified',
                'help' => __('Turn on hover overlay on/off ', 'nextcodegallery')
            ),
            'image_hover_effect_justified' => array(
                'type' => 'select',
                'label' => __('Image Hover Effect', 'nextcodegallery'),
                'options' => array(
                    'blur' => __('none', 'nextcodegallery'),
                    'bw' => __('Black and White', 'nextcodegallery'),
                    'sepia' => __('Sepia', 'nextcodegallery')
                ),
                'section' => 'element_style_justified',
                'help' => __('Choose image hover effect', 'nextcodegallery')
            ),
            'image_hover_effect_reverse_justified' => array(
                'type' => 'checkbox',
                'label' => __('Image On Hover Reversed Effect', 'nextcodegallery'),
                'section' => 'element_style_justified',
                'help' => __('Choose whether to turn reversed effect on/off', 'nextcodegallery')
            ),
            'shadow_justified' => array(
                'type' => 'checkbox',
                'label' => __('Image Element Shadow', 'nextcodegallery'),
                'section' => 'element_style_justified',
                'help' => __('Choose whether to turn image element shadow on/off', 'nextcodegallery')
            ),


            'lightbox_type_justified' => array(
                'type' => 'select',
                'label' => __('Lightbox Type', 'nextcodegallery'),
                'options' => array(
                    'wide' => __('Wide', 'nextcodegallery'),
                    'compact' => __('Compact', 'nextcodegallery')
                ),
                'section' => 'element_style_justified',
                'help' => __('Choose Lightbox type', 'nextcodegallery')
            ),
            'load_more_text_justified' => array(
                'type' => 'text',
                'label' => __('Load More', 'nextcodegallery'),
                'section' => 'load_more_justified',
                'help' => __('Set the text you want to appear on the button', 'nextcodegallery')
            ),
            'load_more_position_justified' => array(
                'type' => 'select',
                'label' => __('Load More Position', 'nextcodegallery'),
                'options' => array(
                    'left' => __('Left', 'nextcodegallery'),
                    'center' => __('Center', 'nextcodegallery'),
                    'right' => __('Right', 'nextcodegallery'),
                ),
                'section' => 'load_more_justified',
                'help' => __('Set load more button position', 'nextcodegallery')
            ),
            'load_more_font_size_justified' => array(
                'type' => 'number',
                'label' => __('Font Size', 'nextcodegallery'),
                'section' => 'load_more_justified',
                'help' => __('Set load more text font size in px', 'nextcodegallery')
            ),
            'load_more_vertical_padding_justified' => array(
                'type' => 'number',
                'label' => __('Vertical Padding', 'nextcodegallery'),
                'section' => 'load_more_justified',
                'help' => __('Set load more vertical padding in px', 'nextcodegallery')
            ),
            'load_more_horisontal_padding_justified' => array(
                'type' => 'number',
                'label' => __('Horizontal Padding', 'nextcodegallery'),
                'section' => 'load_more_justified',
                'help' => __('Set load more horizontal padding in px', 'nextcodegallery')
            ),
            'load_more_border_width_justified' => array(
                'type' => 'number',
                'label' => __('Border Width', 'nextcodegallery'),
                'section' => 'load_more_justified',
                'help' => __('Set load more button border width in px', 'nextcodegallery')
            ),
            'load_more_border_radius_justified' => array(
                'type' => 'number',
                'label' => __('Border Radius', 'nextcodegallery'),
                'section' => 'load_more_justified',
                'help' => __('Set load more button border radius in px', 'nextcodegallery')
            ),
            'load_more_border_color_justified' => array(
                'type' => 'color',
                'label' => __('Border Color', 'nextcodegallery'),
                'section' => 'load_more_justified',
                'help' => __('Set load more button border color in HEXadecimal color system', 'nextcodegallery')
            ),
            'load_more_color_justified' => array(
                'type' => 'color',
                'label' => __('Button Text Color', 'nextcodegallery'),
                'section' => 'load_more_justified',
                'help' => __('Set load more button text color in HEXadecimal color system', 'nextcodegallery')
            ),
            'load_more_background_color_justified' => array(
                'type' => 'color',
                'label' => __('Background Color', 'nextcodegallery'),
                'section' => 'load_more_justified',
                'help' => __('Set load more button background color in HEXadecimal color system', 'nextcodegallery')
            ),
            'load_more_font_family_justified' => array(
                'type' => 'select',
                'label' => __('Font Type', 'nextcodegallery'),
                'options' => array(
                    'monospace' => __('monospace', 'nextcodegallery'),
                    'cursive' => __('cursive', 'nextcodegallery'),
                    'fantasy' => __('fantasy', 'nextcodegallery'),
                    'sans-serif' => __('sans-serif', 'nextcodegallery'),
                    'serif' => __('serif', 'nextcodegallery'),
                ),
                'section' => 'load_more_justified',
                'help' => __('Choose load more button text font type', 'nextcodegallery')
            ),
            'load_more_hover_border_color_justified' => array(
                'type' => 'color',
                'label' => __('On Hover Border Color', 'nextcodegallery'),
                'section' => 'load_more_justified',
                'help' => __('Set load more button border on hover color in HEXadecimal color system', 'nextcodegallery')
            ),
            'load_more_hover_color_justified' => array(
                'type' => 'color',
                'label' => __('Text On Hover Color', 'nextcodegallery'),
                'section' => 'load_more_justified',
                'help' => __('Set text on hover color in HEXadecimal color system', 'nextcodegallery')
            ),
            'load_more_hover_background_color_justified' => array(
                'type' => 'color',
                'label' => __('On Hover Background Color', 'nextcodegallery'),
                'section' => 'load_more_justified',
                'help' => __('Set background color for load more button text on hover in HEXadecimal color system', 'nextcodegallery')
            ),
            'load_more_loader_justified' => array(
                'type' => 'checkbox',
                'label' => __('Show Loading Icon', 'nextcodegallery'),
                'section' => 'load_more_justified',
                'help' => __('Choose whether to turn loading icon on/off', 'nextcodegallery')
            ),
            'load_more_loader_color_justified' => array(
                'type' => 'color',
                'label' => __('Loading Icon color', 'nextcodegallery'),
                'section' => 'load_more_justified',
                'help' => __('Set color for loading icon in HEXadecimal color system', 'nextcodegallery')
            ),


            'pagination_position_justified' => array(
                'type' => 'select',
                'label' => __('Position', 'nextcodegallery'),
                'options' => array(
                    'left' => __('Left', 'nextcodegallery'),
                    'center' => __('Center', 'nextcodegallery'),
                    'right' => __('Right', 'nextcodegallery'),
                ),
                'section' => 'pagination_justified',
                'help' => __('Set pagination position', 'nextcodegallery')
            ),
            'pagination_font_size_justified' => array(
                'type' => 'number',
                'label' => __('Font size', 'nextcodegallery'),
                'section' => 'pagination_justified',
                'help' => __('Set pagination font size in px', 'nextcodegallery')
            ),
            'pagination_vertical_padding_justified' => array(
                'type' => 'number',
                'label' => __('Vertical Padding', 'nextcodegallery'),
                'section' => 'pagination_justified',
                'help' => __('Set pagination vertical padding in px', 'nextcodegallery')
            ),
            'pagination_horisontal_padding_justified' => array(
                'type' => 'number',
                'label' => __('Horizontal Padding', 'nextcodegallery'),
                'section' => 'pagination_justified',
                'help' => __('Set pagination horizontal padding in px', 'nextcodegallery')
            ),
            'pagination_margin_justified' => array(
                'type' => 'number',
                'label' => __('Margin', 'nextcodegallery'),
                'section' => 'pagination_justified',
                'help' => __('Set margin value between elements in px', 'nextcodegallery')
            ),
            'pagination_border_width_justified' => array(
                'type' => 'number',
                'label' => __('Border Width', 'nextcodegallery'),
                'section' => 'pagination_justified',
                'help' => __('Set border width value in px', 'nextcodegallery')
            ),
            'pagination_border_radius_justified' => array(
                'type' => 'number',
                'label' => __('Border Radius', 'nextcodegallery'),
                'section' => 'pagination_justified',
                'help' => __('Set border radius value in px', 'nextcodegallery')
            ),
            'pagination_border_color_justified' => array(
                'type' => 'color',
                'label' => __('Border Color', 'nextcodegallery'),
                'section' => 'pagination_justified',
                'help' => __('Set border color in HEXadecimal color system', 'nextcodegallery')
            ),
            'pagination_color_justified' => array(
                'type' => 'color',
                'label' => __('Pagination Elements Color', 'nextcodegallery'),
                'section' => 'pagination_justified',
                'help' => __('Set pagination elements color in HEXadecimal color system', 'nextcodegallery')
            ),
            'pagination_background_color_justified' => array(
                'type' => 'color',
                'label' => __('Background Color', 'nextcodegallery'),
                'section' => 'pagination_justified',
                'help' => __('Set pagination elements background color in HEXadecimal color system', 'nextcodegallery')
            ),
            'pagination_font_family_justified' => array(
                'type' => 'select',
                'label' => __('Font Type', 'nextcodegallery'),
                'options' => array(
                    'monospace' => __('monospace', 'nextcodegallery'),
                    'cursive' => __('cursive', 'nextcodegallery'),
                    'fantasy' => __('fantasy', 'nextcodegallery'),
                    'sans-serif' => __('sans-serif', 'nextcodegallery'),
                    'serif' => __('serif', 'nextcodegallery'),
                ),
                'section' => 'pagination_justified',
                'help' => __('Choose pagination element font type', 'nextcodegallery')
            ),
            'pagination_hover_border_color_justified' => array(
                'type' => 'color',
                'label' => __('On Hover Border Color', 'nextcodegallery'),
                'section' => 'pagination_justified',
                'help' => __('Set pagination element border on hover color', 'nextcodegallery')
            ),
            'pagination_hover_color_justified' => array(
                'type' => 'color',
                'label' => __('On Hover Color', 'nextcodegallery'),
                'section' => 'pagination_justified',
                'help' => __('Set pagination element on hover color', 'nextcodegallery')
            ),
            'pagination_hover_background_color_justified' => array(
                'type' => 'color',
                'label' => __('On Hover Background Color', 'nextcodegallery'),
                'section' => 'pagination_justified',
                'help' => __('Set pagination element on hover background color', 'nextcodegallery')
            ),
            'pagination_nav_type_justified' => array(
                'type' => 'select',
                'label' => __('Navigation Type', 'nextcodegallery'),
                'options' => array(
                    '0' => __('Arrows', 'nextcodegallery'),
                    '1' => __('Text', 'nextcodegallery'),
                    '2' => __('Only Numbers', 'nextcodegallery')
                ),
                'section' => 'pagination_justified',
                'help' => __('Choose navigation type', 'nextcodegallery')
            ),
            'pagination_nav_text_justified' => array(
                'type' => 'text',
                'label' => __('Navigation Text', 'nextcodegallery'),
                'section' => 'pagination_justified',
                'help' => __('Set navigation text. Note that text must be separated with comma', 'nextcodegallery')
            ),
            'pagination_nearby_pages_justified' => array(
                'type' => 'select',
                'label' => __('Visible Page Quantity', 'nextcodegallery'),
                'options' => array(
                    'All' => __('All', 'nextcodegallery'),
                    '1' => "1",
                    '2' => "2",
                    '3' => "3",
                    '4' => "4",
                    '5' => "5",
                ),
                'section' => 'pagination_justified',
                'help' => __('Visible Page Quantity (Set visible page quantity)', 'nextcodegallery')
            ),


            /****************** tiles options *******************/
            'show_title_tiles' => array(
                'type' => 'select',
                'label' => __('Title Option', 'nextcodegallery'),
                'options' => array(
                    '0' => __('Always on', 'nextcodegallery'),
                    '1' => __('On hover', 'nextcodegallery'),
                    '2' => __('Disable', 'nextcodegallery')
                ),
                'section' => 'element_style_tiles',
                'help' => __('Show / Hide Title', 'nextcodegallery')
            ),
            'title_position_tiles' => array(
                'type' => 'select',
                'label' => __('Title Horizontal Position', 'nextcodegallery'),
                'options' => array(
                    'left' => __('Left', 'nextcodegallery'),
                    'center' => __('Center', 'nextcodegallery'),
                    'right' => __('Right', 'nextcodegallery')
                ),
                'section' => 'element_style_tiles',
                'help' => __('Choose title position', 'nextcodegallery')
            ),
            'title_vertical_position_tiles' => array(
                'type' => 'select',
                'label' => __('Title Vertical Position', 'nextcodegallery'),
                'options' => array(
                    'inside_top' => __('Top', 'nextcodegallery'),
                    'inside_bottom' => __('Bottom', 'nextcodegallery'),
                ),
                'section' => 'element_style_tiles',
                'help' => __('Choose title position', 'nextcodegallery')
            ),
            'title_appear_type_tiles' => array(
                'type' => 'select',
                'label' => __('Title On Hover Type', 'nextcodegallery'),
                'options' => array(
                    'slide' => __('Slide', 'nextcodegallery'),
                    'fade' => __('Fade', 'nextcodegallery'),
                ),
                'section' => 'element_style_tiles',
                'help' => __('Choose title on hover effect', 'nextcodegallery')
            ),
            'title_size_tiles' => array(
                'type' => 'number',
                'label' => __('Title Font Size', 'nextcodegallery'),
                'section' => 'element_style_tiles',
                'help' => __('Set title font size in px', 'nextcodegallery')
            ),
            'title_color_tiles' => array(
                'type' => 'color',
                'label' => __('Title Color', 'nextcodegallery'),
                'section' => 'element_style_tiles',
                'help' => __('Set title color in HEXadecimal color system', 'nextcodegallery')
            ),
            'title_background_color_tiles' => array(
                'type' => 'color',
                'label' => __('Title Background Color', 'nextcodegallery'),
                'section' => 'element_style_tiles',
                'help' => __('Choose title background color in HEXadecimal color system', 'nextcodegallery')
            ),
            'title_background_opacity_tiles' => array(
                'type' => 'number',
                'label' => __('Title Background Opacity (%)', 'nextcodegallery'),
                'section' => 'element_style_tiles',
                'help' => __('Set title background opacity in percentage', 'nextcodegallery')
            ),
            'margin_tiles' => array(
                'type' => 'number',
                'label' => __('Image Margin', 'nextcodegallery'),
                'section' => 'element_style_tiles',
                'help' => __('Set image margin in px', 'nextcodegallery')
            ),
            'col_width_tiles' => array(
                'type' => 'number',
                'label' => __('Image Width', 'nextcodegallery'),
                'section' => 'element_style_tiles',
                'help' => __('Set image width in px', 'nextcodegallery')
            ),
            'min_col_tiles' => array(
                'type' => 'number',
                'label' => __('Minimal Columns', 'nextcodegallery'),
                'section' => 'element_style_tiles',
                'help' => __('Set minimal column number', 'nextcodegallery')
            ),
            'border_width_tiles' => array(
                'type' => 'number',
                'label' => __('Image Border Width', 'nextcodegallery'),
                'section' => 'element_style_tiles',
                'help' => __('Set image border width in px', 'nextcodegallery')
            ),
            'border_color_tiles' => array(
                'type' => 'color',
                'label' => __('Image Border Color', 'nextcodegallery'),
                'section' => 'element_style_tiles',
                'help' => __('Set image border color in HEXadecimal color system', 'nextcodegallery')
            ),
            'border_radius_tiles' => array(
                'type' => 'number',
                'label' => __('Image Border Radius', 'nextcodegallery'),
                'section' => 'element_style_tiles',
                'help' => __('Set image border radius in px', 'nextcodegallery')
            ),

            'show_icons_tiles' => array(
                'type' => 'checkbox',
                'label' => __('Lightbox', 'nextcodegallery'),
                'section' => 'element_style_tiles',
                'help' => __('Choose whether to turn Lightbox on/off', 'nextcodegallery')
            ),
            'show_link_icon_tiles' => array(
                'type' => 'checkbox',
                'label' => __('URL Icon', 'nextcodegallery'),
                'section' => 'element_style_tiles',
                'help' => __('Choose whether to turn URL icon on/off', 'nextcodegallery')
            ),
            'item_as_link_tiles' => array(
                'type' => 'checkbox',
                'label' => __('Image As Link', 'nextcodegallery'),
                'section' => 'element_style_tiles',
                'help' => __('Set image as link', 'nextcodegallery')
            ),
            'link_new_tab_tiles' => array(
                'type' => 'checkbox',
                'label' => __('Open Link In New Tab', 'nextcodegallery'),
                'section' => 'element_style_tiles',
                'help' => __('Choose whether to open the link in a new tab', 'nextcodegallery')
            ),
            'on_hover_overlay_tiles' => array(
                'type' => 'checkbox',
                'label' => __('On Hover Overlay', 'nextcodegallery'),
                'section' => 'element_style_tiles',
                'help' => __('Turn on hover overlay on/off ', 'nextcodegallery')
            ),
            'image_hover_effect_tiles' => array(
                'type' => 'select',
                'label' => __('Image Hover Effect', 'nextcodegallery'),
                'options' => array(
                    'blur' => __('none', 'nextcodegallery'),
                    'bw' => __('Black and White', 'nextcodegallery'),
                    'sepia' => __('Sepia', 'nextcodegallery')
                ),
                'section' => 'element_style_tiles',
                'help' => __('Choose image hover effect', 'nextcodegallery')
            ),
            'image_hover_effect_reverse_tiles' => array(
                'type' => 'checkbox',
                'label' => __('Image On Hover Reversed Effect', 'nextcodegallery'),
                'section' => 'element_style_tiles',
                'help' => __('Choose whether to turn reversed effect on/off', 'nextcodegallery')
            ),
            'shadow_tiles' => array(
                'type' => 'checkbox',
                'label' => __('Image Element Shadow', 'nextcodegallery'),
                'section' => 'element_style_tiles',
                'help' => __('Choose whether to turn image element shadow on/off', 'nextcodegallery')
            ),


            'lightbox_type_tiles' => array(
                'type' => 'select',
                'label' => __('Lightbox Type', 'nextcodegallery'),
                'options' => array(
                    'wide' => __('Wide', 'nextcodegallery'),
                    'compact' => __('Compact', 'nextcodegallery')
                ),
                'section' => 'element_style_tiles',
                'help' => __('Choose Lightbox type', 'nextcodegallery')
            ),
            'load_more_text_tiles' => array(
                'type' => 'text',
                'label' => __('Load More', 'nextcodegallery'),
                'section' => 'load_more_tiles',
                'help' => __('Set the text you want to appear on the button', 'nextcodegallery')
            ),
            'load_more_position_tiles' => array(
                'type' => 'select',
                'label' => __('Load More Position', 'nextcodegallery'),
                'options' => array(
                    'left' => __('Left', 'nextcodegallery'),
                    'center' => __('Center', 'nextcodegallery'),
                    'right' => __('Right', 'nextcodegallery'),
                ),
                'section' => 'load_more_tiles',
                'help' => __('Set load more button position', 'nextcodegallery')
            ),
            'load_more_font_size_tiles' => array(
                'type' => 'number',
                'label' => __('Font Size', 'nextcodegallery'),
                'section' => 'load_more_tiles',
                'help' => __('Set load more text font size in px', 'nextcodegallery')
            ),
            'load_more_vertical_padding_tiles' => array(
                'type' => 'number',
                'label' => __('Vertical Padding', 'nextcodegallery'),
                'section' => 'load_more_tiles',
                'help' => __('Set load more vertical padding in px', 'nextcodegallery')
            ),
            'load_more_horisontal_padding_tiles' => array(
                'type' => 'number',
                'label' => __('Horizontal Padding', 'nextcodegallery'),
                'section' => 'load_more_tiles',
                'help' => __('Set load more horizontal padding in px', 'nextcodegallery')
            ),
            'load_more_border_width_tiles' => array(
                'type' => 'number',
                'label' => __('Border Width', 'nextcodegallery'),
                'section' => 'load_more_tiles',
                'help' => __('Set load more button border width in px', 'nextcodegallery')
            ),
            'load_more_border_radius_tiles' => array(
                'type' => 'number',
                'label' => __('Border Radius', 'nextcodegallery'),
                'section' => 'load_more_tiles',
                'help' => __('Set load more button border radius in px', 'nextcodegallery')
            ),
            'load_more_border_color_tiles' => array(
                'type' => 'color',
                'label' => __('Border Color', 'nextcodegallery'),
                'section' => 'load_more_tiles',
                'help' => __('Set load more button border color in HEXadecimal color system', 'nextcodegallery')
            ),
            'load_more_color_tiles' => array(
                'type' => 'color',
                'label' => __('Button Text Color', 'nextcodegallery'),
                'section' => 'load_more_tiles',
                'help' => __('Set load more button text color in HEXadecimal color system', 'nextcodegallery')
            ),
            'load_more_background_color_tiles' => array(
                'type' => 'color',
                'label' => __('Background Color', 'nextcodegallery'),
                'section' => 'load_more_tiles',
                'help' => __('Set load more button background color in HEXadecimal color system', 'nextcodegallery')
            ),
            'load_more_font_family_tiles' => array(
                'type' => 'select',
                'label' => __('Font Type', 'nextcodegallery'),
                'options' => array(
                    'monospace' => __('monospace', 'nextcodegallery'),
                    'cursive' => __('cursive', 'nextcodegallery'),
                    'fantasy' => __('fantasy', 'nextcodegallery'),
                    'sans-serif' => __('sans-serif', 'nextcodegallery'),
                    'serif' => __('serif', 'nextcodegallery'),
                ),
                'section' => 'load_more_tiles',
                'help' => __('Choose load more button text font type', 'nextcodegallery')
            ),
            'load_more_hover_border_color_tiles' => array(
                'type' => 'color',
                'label' => __('On Hover Border Color', 'nextcodegallery'),
                'section' => 'load_more_tiles',
                'help' => __('Set load more button border on hover color in HEXadecimal color system', 'nextcodegallery')
            ),
            'load_more_hover_color_tiles' => array(
                'type' => 'color',
                'label' => __('Text On Hover Color', 'nextcodegallery'),
                'section' => 'load_more_tiles',
                'help' => __('Set text on hover color in HEXadecimal color system', 'nextcodegallery')
            ),
            'load_more_hover_background_color_tiles' => array(
                'type' => 'color',
                'label' => __('On Hover Background Color', 'nextcodegallery'),
                'section' => 'load_more_tiles',
                'help' => __('Set background color for load more button text on hover in HEXadecimal color system', 'nextcodegallery')
            ),
            'load_more_loader_tiles' => array(
                'type' => 'checkbox',
                'label' => __('Show Loading Icon', 'nextcodegallery'),
                'section' => 'load_more_tiles',
                'help' => __('Choose whether to turn loading icon on/off', 'nextcodegallery')
            ),
            'load_more_loader_color_tiles' => array(
                'type' => 'color',
                'label' => __('Loading Icon color', 'nextcodegallery'),
                'section' => 'load_more_tiles',
                'help' => __('Set color for loading icon in HEXadecimal color system', 'nextcodegallery')
            ),


            'pagination_position_tiles' => array(
                'type' => 'select',
                'label' => __('Position', 'nextcodegallery'),
                'options' => array(
                    'left' => __('Left', 'nextcodegallery'),
                    'center' => __('Center', 'nextcodegallery'),
                    'right' => __('Right', 'nextcodegallery'),
                ),
                'section' => 'pagination_tiles',
                'help' => __('Set pagination position', 'nextcodegallery')
            ),
            'pagination_font_size_tiles' => array(
                'type' => 'number',
                'label' => __('Font Size', 'nextcodegallery'),
                'section' => 'pagination_tiles',
                'help' => __('Set pagination font size in px', 'nextcodegallery')
            ),
            'pagination_vertical_padding_tiles' => array(
                'type' => 'number',
                'label' => __('Vertical Padding', 'nextcodegallery'),
                'section' => 'pagination_tiles',
                'help' => __('Set pagination vertical padding in px', 'nextcodegallery')
            ),
            'pagination_horisontal_padding_tiles' => array(
                'type' => 'number',
                'label' => __('Horizontal Padding', 'nextcodegallery'),
                'section' => 'pagination_tiles',
                'help' => __('Set pagination horizontal padding in px', 'nextcodegallery')
            ),
            'pagination_margin_tiles' => array(
                'type' => 'number',
                'label' => __('Margin', 'nextcodegallery'),
                'section' => 'pagination_tiles',
                'help' => __('Set margin value between elements in px', 'nextcodegallery')
            ),
            'pagination_border_width_tiles' => array(
                'type' => 'number',
                'label' => __('Border Width', 'nextcodegallery'),
                'section' => 'pagination_tiles',
                'help' => __('Set border width value in px', 'nextcodegallery')
            ),
            'pagination_border_radius_tiles' => array(
                'type' => 'number',
                'label' => __('Border Radius', 'nextcodegallery'),
                'section' => 'pagination_tiles',
                'help' => __('Set border radius value in px', 'nextcodegallery')
            ),
            'pagination_border_color_tiles' => array(
                'type' => 'color',
                'label' => __('Border Color', 'nextcodegallery'),
                'section' => 'pagination_tiles',
                'help' => __('Set border color in HEXadecimal color system', 'nextcodegallery')
            ),
            'pagination_color_tiles' => array(
                'type' => 'color',
                'label' => __('Pagination Elements Color', 'nextcodegallery'),
                'section' => 'pagination_tiles',
                'help' => __('Set pagination elements color in HEXadecimal color system', 'nextcodegallery')
            ),
            'pagination_background_color_tiles' => array(
                'type' => 'color',
                'label' => __('Background Color', 'nextcodegallery'),
                'section' => 'pagination_tiles',
                'help' => __('Set pagination elements background color in HEXadecimal color system', 'nextcodegallery')
            ),
            'pagination_font_family_tiles' => array(
                'type' => 'select',
                'label' => __('Font Type', 'nextcodegallery'),
                'options' => array(
                    'monospace' => __('monospace', 'nextcodegallery'),
                    'cursive' => __('cursive', 'nextcodegallery'),
                    'fantasy' => __('fantasy', 'nextcodegallery'),
                    'sans-serif' => __('sans-serif', 'nextcodegallery'),
                    'serif' => __('serif', 'nextcodegallery'),
                ),
                'section' => 'pagination_tiles',
                'help' => __('Choose pagination element font type', 'nextcodegallery')
            ),
            'pagination_hover_border_color_tiles' => array(
                'type' => 'color',
                'label' => __('On Hover Border Color', 'nextcodegallery'),
                'section' => 'pagination_tiles',
                'help' => __('Set pagination element border on hover color', 'nextcodegallery')
            ),
            'pagination_hover_color_tiles' => array(
                'type' => 'color',
                'label' => __('On Hover Color', 'nextcodegallery'),
                'section' => 'pagination_tiles',
                'help' => __('Set pagination element on hover color', 'nextcodegallery')
            ),
            'pagination_hover_background_color_tiles' => array(
                'type' => 'color',
                'label' => __('On Hover Background Color', 'nextcodegallery'),
                'section' => 'pagination_tiles',
                'help' => __('Set pagination element background color on hover', 'nextcodegallery')
            ),
            'pagination_nav_type_tiles' => array(
                'type' => 'select',
                'label' => __('Navigation Type', 'nextcodegallery'),
                'options' => array(
                    '0' => __('Arrows', 'nextcodegallery'),
                    '1' => __('Text', 'nextcodegallery'),
                    '2' => __('Only Numbers', 'nextcodegallery')
                ),
                'section' => 'pagination_tiles',
                'help' => __('Choose navigation type', 'nextcodegallery')
            ),
            'pagination_nav_text_tiles' => array(
                'type' => 'text',
                'label' => __('Navigation Text', 'nextcodegallery'),
                'section' => 'pagination_tiles',
                'help' => __('Set navigation text. Note that text must be separated with comma', 'nextcodegallery')
            ),
            'pagination_nearby_pages_tiles' => array(
                'type' => 'select',
                'label' => __('Visible Page Quantity', 'nextcodegallery'),
                'options' => array(
                    'All' => __('All', 'nextcodegallery'),
                    '1' => "1",
                    '2' => "2",
                    '3' => "3",
                    '4' => "4",
                    '5' => "5",
                ),
                'section' => 'pagination_tiles',
                'help' => __('Set visible page quantity', 'nextcodegallery')
            ),

            /*****************  carousel options  ******************/
            'show_title_carousel' => array(
                'type' => 'select',
                'label' => __('Title Option', 'nextcodegallery'),
                'options' => array(
                    '0' => __('Always on', 'nextcodegallery'),
                    '1' => __('On hover', 'nextcodegallery'),
                    '2' => __('Disable', 'nextcodegallery')
                ),
                'section' => 'element_style_carousel',
                'help' => __('Choose how to display Image title', 'nextcodegallery')
            ),
            'title_position_carousel' => array(
                'type' => 'select',
                'label' => __('Title Horizontal Position', 'nextcodegallery'),
                'options' => array(
                    'left' => __('Left', 'nextcodegallery'),
                    'center' => __('Center', 'nextcodegallery'),
                    'right' => __('Right', 'nextcodegallery')
                ),
                'section' => 'element_style_carousel',
                'help' => __('Choose title position', 'nextcodegallery')
            ),
            'title_vertical_position_carousel' => array(
                'type' => 'select',
                'label' => __('Title Vertical Position', 'nextcodegallery'),
                'options' => array(
                    'inside_top' => __('Top', 'nextcodegallery'),
                    'inside_bottom' => __('Bottom', 'nextcodegallery'),
                ),
                'section' => 'element_style_carousel',
                'help' => __('Choose title position', 'nextcodegallery')
            ),
            'title_appear_type_carousel' => array(
                'type' => 'select',
                'label' => __('Title On Hover Type', 'nextcodegallery'),
                'options' => array(
                    'slide' => __('Slide', 'nextcodegallery'),
                    'fade' => __('Fade', 'nextcodegallery'),
                ),
                'section' => 'element_style_carousel',
                'help' => __('Choose title on hover effect', 'nextcodegallery')
            ),
            'title_size_carousel' => array(
                'type' => 'number',
                'label' => __('Title Font Size', 'nextcodegallery'),
                'section' => 'element_style_carousel',
                'help' => __('Set title font size in px', 'nextcodegallery')
            ),
            'title_color_carousel' => array(
                'type' => 'color',
                'label' => __('Title Color', 'nextcodegallery'),
                'section' => 'element_style_carousel',
                'help' => __('Choose title color in HEXadecimal color system', 'nextcodegallery')
            ),
            'title_background_color_carousel' => array(
                'type' => 'color',
                'label' => __('Title Background Color', 'nextcodegallery'),
                'section' => 'element_style_carousel',
                'help' => __('Set title background color in HEXadecimal color system', 'nextcodegallery')
            ),
            'title_background_opacity_carousel' => array(
                'type' => 'number',
                'label' => __('Title Background Opacity (%)', 'nextcodegallery'),
                'section' => 'element_style_carousel',
                'help' => __('Set title background opacity in percentage', 'nextcodegallery')
            ),
            'margin_carousel' => array(
                'type' => 'number',
                'label' => __('Image Margin', 'nextcodegallery'),
                'section' => 'element_style_carousel',
                'help' => __('Set image margin in px', 'nextcodegallery')
            ),
            'width_carousel' => array(
                'type' => 'number',
                'label' => __('Image Width', 'nextcodegallery'),
                'section' => 'element_style_carousel',
                'help' => __('Set image width in px', 'nextcodegallery')
            ),
            'height_carousel' => array(
                'type' => 'number',
                'label' => __('Image Height', 'nextcodegallery'),
                'section' => 'element_style_carousel',
                'help' => __('Set image height in px', 'nextcodegallery')
            ),
            'position_carousel' => array(
                'type' => 'select',
                'label' => __('Carousel Position', 'nextcodegallery'),
                'options' => array(
                    'left' => __('left', 'nextcodegallery'),
                    'center' => __('center', 'nextcodegallery'),
                    'right' => __('right', 'nextcodegallery'),
                ),
                'section' => 'element_style_carousel',
                'help' => __('Choose carousel position', 'nextcodegallery')
            ),
            'show_background_carousel' => array(
                'type' => 'checkbox',
                'label' => __('Background', 'nextcodegallery'),
                'section' => 'element_style_carousel',
                'help' => __('Choose whether to turn background on/off', 'nextcodegallery')
            ),
            'background_color_carousel' => array(
                'type' => 'color',
                'label' => __('Background Color', 'nextcodegallery'),
                'section' => 'element_style_carousel',
                'help' => __('Set carousel background color', 'nextcodegallery')
            ),
            'border_width_carousel' => array(
                'type' => 'number',
                'label' => __('Image Border Width', 'nextcodegallery'),
                'section' => 'element_style_carousel',
                'help' => __('Set image border width in px', 'nextcodegallery')
            ),
            'border_color_carousel' => array(
                'type' => 'color',
                'label' => __('Image Border Color', 'nextcodegallery'),
                'section' => 'element_style_carousel',
                'help' => __('Set image border color in HEXadecimal color system', 'nextcodegallery')
            ),
            'border_radius_carousel' => array(
                'type' => 'number',
                'label' => __('Image Border Radius', 'nextcodegallery'),
                'section' => 'element_style_carousel',
                'help' => __('Set element border radius in px', 'nextcodegallery')
            ),

            'show_icons_carousel' => array(
                'type' => 'checkbox',
                'label' => __('Lightbox', 'nextcodegallery'),
                'section' => 'element_style_carousel',
                'help' => __('Choose whether to turn Lightbox on/off', 'nextcodegallery')
            ),
            'show_link_icon_carousel' => array(
                'type' => 'checkbox',
                'label' => __('URL Icon', 'nextcodegallery'),
                'section' => 'element_style_carousel',
                'help' => __('Choose whether to turn URL icon on/off', 'nextcodegallery')
            ),
            'item_as_link_carousel' => array(
                'type' => 'checkbox',
                'label' => __('Image As Link', 'nextcodegallery'),
                'section' => 'element_style_carousel',
                'help' => __('Set image as link', 'nextcodegallery')
            ),
            'link_new_tab_carousel' => array(
                'type' => 'checkbox',
                'label' => __('Open Link In New Tab', 'nextcodegallery'),
                'section' => 'element_style_carousel',
                'help' => __('Choose whether to open the link in a new tab', 'nextcodegallery')
            ),
            'on_hover_overlay_carousel' => array(
                'type' => 'checkbox',
                'label' => __('On Hover Overlay', 'nextcodegallery'),
                'section' => 'element_style_carousel',
                'help' => __('Turn on hover overlay on/off', 'nextcodegallery')
            ),
            'image_hover_effect_carousel' => array(
                'type' => 'select',
                'label' => __('Image Hover Effect', 'nextcodegallery'),
                'options' => array(
                    'blur' => __('none', 'nextcodegallery'),
                    'bw' => __('Black and White', 'nextcodegallery'),
                    'sepia' => __('Sepia', 'nextcodegallery')
                ),
                'section' => 'element_style_carousel',
                'help' => __('Choose image hover effect', 'nextcodegallery')
            ),
            'image_hover_effect_reverse_carousel' => array(
                'type' => 'checkbox',
                'label' => __('Image On Hover Reversed Effect', 'nextcodegallery'),
                'section' => 'element_style_carousel',
                'help' => __('Choose whether to turn reversed effect on/off', 'nextcodegallery')
            ),
            'shadow_carousel' => array(
                'type' => 'checkbox',
                'label' => __('Image Element Shadow', 'nextcodegallery'),
                'section' => 'element_style_carousel',
                'help' => __('Choose whether to turn image element shadow on/off', 'nextcodegallery')
            ),


            'lightbox_type_carousel' => array(
                'type' => 'select',
                'label' => __('Lightbox Type', 'nextcodegallery'),
                'options' => array(
                    'wide' => __('Wide', 'nextcodegallery'),
                    'compact' => __('Compact', 'nextcodegallery')
                ),
                'section' => 'element_style_carousel',
                'help' => __('Choose Lightbox type', 'nextcodegallery')
            ),
            'enable_nav_carousel' => array(
                'type' => 'checkbox',
                'label' => __('Enable Navigation', 'nextcodegallery'),
                'section' => 'components_carousel',
                'help' => __('Turn navigation on/off', 'nextcodegallery')
            ),
            'nav_num_carousel' => array(
                'type' => 'number',
                'label' => __('Number Of Navigated Elements ', 'nextcodegallery'),
                'section' => 'components_carousel',
                'help' => __('Set number of elements to scroll after clicking on next/prev button', 'nextcodegallery'),
                "max" => 5
            ),
            'scroll_duration_carousel' => array(
                'type' => 'number',
                'label' => __('Scrolling Duration (ms)', 'nextcodegallery'),
                'section' => 'components_carousel',
                'help' => __('Set scrolling duration in ms', 'nextcodegallery')
            ),
            'autoplay_carousel' => array(
                'type' => 'checkbox',
                'label' => __('Autoplay', 'nextcodegallery'),
                'section' => 'components_carousel',
                'help' => __('Choose whether to turn autoplay on/off', 'nextcodegallery')
            ),
            'autoplay_timeout_carousel' => array(
                'type' => 'number',
                'label' => __('Autoplay Timeout (ms)', 'nextcodegallery'),
                'section' => 'components_carousel',
                'help' => __('Set autoplay timeout in ms', 'nextcodegallery')
            ),
            'autoplay_direction_carousel' => array(
                'type' => 'select',
                'label' => __('Autoplay Direction', 'nextcodegallery'),
                'options' => array(
                    'left' => __('left', 'nextcodegallery'),
                    'right' => __('right', 'nextcodegallery')
                ),
                'section' => 'components_carousel',
                'help' => __('Choose autoplay direction', 'nextcodegallery')
            ),
            'autoplay_pause_hover_carousel' => array(
                'type' => 'checkbox',
                'label' => __('Autoplay Pause On Hover', 'nextcodegallery'),
                'section' => 'components_carousel',
                'help' => __('Choose whether to turn autoplay pause on hover on/off', 'nextcodegallery')
            ),
            'enable_nav_carousel' => array(
                'type' => 'checkbox',
                'label' => __('Enable Navigation', 'nextcodegallery'),
                'section' => 'components_carousel',
                'help' => __('Choose whether to turn navigation on/off', 'nextcodegallery')
            ),
            'nav_vertical_position_carousel' => array(
                'type' => 'select',
                'label' => __('Navigation Vertical Position', 'nextcodegallery'),
                'options' => array(
                    'top' => __('Top', 'nextcodegallery'),
                    'bottom' => __('Bottom', 'nextcodegallery')
                ),
                'section' => 'components_carousel',
                'help' => __('Choose navigation vertical position', 'nextcodegallery')
            ),
            'nav_horisontal_position_carousel' => array(
                'type' => 'select',
                'label' => __('Navigation Horizontal Position', 'nextcodegallery'),
                'options' => array(
                    'left' => __('Left', 'nextcodegallery'),
                    'center' => __('Center', 'nextcodegallery'),
                    'right' => __('Right', 'nextcodegallery')
                ),
                'section' => 'components_carousel',
                'help' => __('Choose navigation horizontal position', 'nextcodegallery')
            ),
            'play_icon_carousel' => array(
                'type' => 'checkbox',
                'label' => __('Play/Pause Icon', 'nextcodegallery'),
                'section' => 'components_carousel',
                'help' => __('Choose whether to turn play/pause icon on/off', 'nextcodegallery')
            ),
            'icon_space_carousel' => array(
                'type' => 'number',
                'label' => __('Space Between Icons', 'nextcodegallery'),
                'section' => 'components_carousel',
                'help' => __('Set space between icons in px', 'nextcodegallery')
            ),


            /********* Slider options ************/
            'width_slider' => array(
                'type' => 'number',
                'label' => __('Image Width', 'nextcodegallery'),
                'section' => 'element_style_slider',
                'help' => __('Set image width in px', 'nextcodegallery')
            ),
            'height_slider' => array(
                'type' => 'number',
                'label' => __('Image Height', 'nextcodegallery'),
                'section' => 'element_style_slider',
                'help' => __('Set image height in px', 'nextcodegallery')
            ),
            'autoplay_slider' => array(
                'type' => 'checkbox',
                'label' => __('Autoplay', 'nextcodegallery'),
                'section' => 'element_style_slider',
                'help' => __('Choose whether to turn autoplay on/off', 'nextcodegallery')
            ),
            'play_interval_slider' => array(
                'type' => 'number',
                'label' => __('Autoplay Timeout (ms)', 'nextcodegallery'),
                'section' => 'element_style_slider',
                'help' => __('Set autoplay timeout in ms', 'nextcodegallery')
            ),
            'transition_speed_slider' => array(
                'type' => 'number',
                'label' => __('Autoplay Speed (ms)', 'nextcodegallery'),
                'section' => 'element_style_slider',
                'help' => __('Set autoplay speed in ms', 'nextcodegallery')
            ),
            'pause_on_hover_slider' => array(
                'type' => 'checkbox',
                'label' => __('Pause On Hover', 'nextcodegallery'),
                'section' => 'element_style_slider',
                'help' => __('Choose whether to turn pause on hover on/off', 'nextcodegallery')
            ),
            'scale_mode_slider' => array(
                'type' => 'select',
                'label' => __('Image Behavior', 'nextcodegallery'),
                'options' => array(
                    'fit' => __('Fit', 'nextcodegallery'),
                    'fill' => __('Fill', 'nextcodegallery'),
                ),
                'section' => 'element_style_slider',
                'help' => __('Choose image behavior type', 'nextcodegallery')
            ),
            'transition_slider' => array(
                'type' => 'select',
                'label' => __('Effects', 'nextcodegallery'),
                'options' => array(
                    'slide' => __('Slide', 'nextcodegallery'),
                    'fade' => __('Fade', 'nextcodegallery'),
                ),
                'section' => 'element_style_slider',
                'help' => __('Choose image effect type', 'nextcodegallery')
            ),


            'loader_type_slider' => array(
                'type' => 'select',
                'label' => __('Loading Icon Type', 'nextcodegallery'),
                'options' => array(
                    '1' => __('type 1', 'nextcodegallery'),
                    '2' => __('type 2', 'nextcodegallery'),
                    '3' => __('type 3', 'nextcodegallery'),
                    '4' => __('type 4', 'nextcodegallery'),
                    '5' => __('type 5', 'nextcodegallery'),
                    '6' => __('type 6', 'nextcodegallery'),
                    '7' => __('type 7', 'nextcodegallery'),
                ),
                'section' => 'element_style_slider',
                'help' => __('Choose loading type', 'nextcodegallery'),
                'html_class' => array("show_loader")
            ),
            'loader_color_slider' => array(
                'type' => 'select',
                'label' => __('Loading Icon Color', 'nextcodegallery'),
                'options' => array(
                    'white' => __('white', 'nextcodegallery'),
                    'black' => __('black', 'nextcodegallery'),
                ),
                'section' => 'element_style_slider',
                'help' => __('Choose loading color', 'nextcodegallery')
            ),
            'bullets_slider' => array(
                'type' => 'checkbox',
                'label' => __('Bullets', 'nextcodegallery'),
                'section' => 'components_slider',
                'help' => __('Choose whether to turn bullets on/off', 'nextcodegallery')
            ),
            'bullets_horisontal_position_slider' => array(
                'type' => 'select',
                'label' => __('Bullets Horizontal Position', 'nextcodegallery'),
                'options' => array(
                    'left' => __('Left', 'nextcodegallery'),
                    'center' => __('Center', 'nextcodegallery'),
                    'right' => __('Right', 'nextcodegallery'),
                ),
                'section' => 'components_slider',
                'help' => __('Choose bullets horizontal position', 'nextcodegallery')
            ),
            'bullets_vertical_position_slider' => array(
                'type' => 'select',
                'label' => __('Bullets Vertical Position', 'nextcodegallery'),
                'options' => array(
                    'top' => __('Top', 'nextcodegallery'),
                    'bottom' => __('Bottom', 'nextcodegallery'),
                ),
                'section' => 'components_slider',
                'help' => __('Choose bullets vertical position', 'nextcodegallery')
            ),
            'arrows_slider' => array(
                'type' => 'checkbox',
                'label' => __('Arrows', 'nextcodegallery'),
                'section' => 'components_slider',
                'help' => __('Choose whether to turn arrows on/off', 'nextcodegallery')
            ),
            'controls_always_on_slider' => array(
                'type' => 'checkbox',
                'label' => __('Controls Always On', 'nextcodegallery'),
                'section' => 'components_slider',
                'help' => __('Choose whether to turn controls always on on/off', 'nextcodegallery')
            ),
            'progress_indicator_slider' => array(
                'type' => 'checkbox',
                'label' => __('Progress Indicator', 'nextcodegallery'),
                'section' => 'components_slider',
                'help' => __('Choose whether to turn progress indicator on/off')
            ),
            'progress_indicator_type_slider' => array(
                'type' => 'select',
                'label' => __('Progress Indicator Type', 'nextcodegallery'),
                'options' => array(
                    'pie' => __('Pie', 'nextcodegallery'),
                    'bar' => __('Bar', 'nextcodegallery'),
                ),
                'section' => 'components_slider',
                'help' => __('Choose progress indicator type', 'nextcodegallery')
            ),
            'progress_indicator_horisontal_position_slider' => array(
                'type' => 'select',
                'label' => __('Progress Indicator Horizontal Position', 'nextcodegallery'),
                'options' => array(
                    'left' => __('Left', 'nextcodegallery'),
                    'center' => __('Center', 'nextcodegallery'),
                    'right' => __('Right', 'nextcodegallery'),
                ),
                'section' => 'components_slider',
                'help' => __('Choose progress indicator position', 'nextcodegallery')
            ),
            'progress_indicator_vertical_position_slider' => array(
                'type' => 'select',
                'label' => __('Progress Indicator Vertical Position', 'nextcodegallery'),
                'options' => array(
                    'top' => __('Top', 'nextcodegallery'),
                    'bottom' => __('Bottom', 'nextcodegallery'),
                ),
                'section' => 'components_slider',
                'help' => __('Choose progress indicator position', 'nextcodegallery')
            ),
            'play_slider' => array(
                'type' => 'checkbox',
                'label' => __('Play/Pause Button', 'nextcodegallery'),
                'section' => 'components_slider',
                'help' => __('Choose whether to turn play/pause button on/off', 'nextcodegallery')
            ),
            'play_horizontal_position_slider' => array(
                'type' => 'select',
                'label' => __('Play/Pause Button Horizontal Position', 'nextcodegallery'),
                'options' => array(
                    'left' => __('Left', 'nextcodegallery'),
                    'center' => __('Center', 'nextcodegallery'),
                    'right' => __('Right', 'nextcodegallery'),
                ),
                'section' => 'components_slider',
                'help' => __('Choose play/pause button horizontal position', 'nextcodegallery')
            ),
            'play_vertical_position_slider' => array(
                'type' => 'select',
                'label' => __('Play/Pause Button Vertical Position', 'nextcodegallery'),
                'options' => array(
                    'top' => __('Top', 'nextcodegallery'),
                    'bottom' => __('Bottom', 'nextcodegallery'),
                ),
                'section' => 'components_slider',
                'help' => __('Choose play/pause button vertical position', 'nextcodegallery')
            ),
            'fullscreen_slider' => array(
                'type' => 'checkbox',
                'label' => __('Fullscreen', 'nextcodegallery'),
                'section' => 'element_style_slider',
                'help' => __('Choose whether to turn fullscreen button on/off', 'nextcodegallery')
            ),
            'fullscreen_horisontal_position_slider' => array(
                'type' => 'select',
                'label' => __('Fullscreen Icon Horizontal Position', 'nextcodegallery'),
                'options' => array(
                    'left' => __('Left', 'nextcodegallery'),
                    'center' => __('Center', 'nextcodegallery'),
                    'right' => __('Right', 'nextcodegallery'),
                ),
                'section' => 'element_style_slider',
                'help' => __('Choose fullscreen icon horizontal position', 'nextcodegallery')
            ),
            'fullscreen_vertical_position_slider' => array(
                'type' => 'select',
                'label' => __('Fullscreen  Icon Vertical Position', 'nextcodegallery'),
                'options' => array(
                    'top' => __('Top', 'nextcodegallery'),
                    'bottom' => __('Bottom', 'nextcodegallery'),
                ),
                'section' => 'element_style_slider',
                'help' => __('Choose fullscreen icon vertical position', 'nextcodegallery')
            ),
            'zoom_slider' => array(
                'type' => 'checkbox',
                'label' => __('Zoom', 'nextcodegallery'),
                'section' => 'element_style_slider',
                'help' => __('Choose whether to turn zoom control on/off', 'nextcodegallery')
            ),
            'zoom_panel_slider' => array(
                'type' => 'checkbox',
                'label' => __('Zoom Panel', 'nextcodegallery'),
                'section' => 'element_style_slider',
                'help' => __('Choose whether to turn zoom control on/off', 'nextcodegallery')
            ),
            'zoom_horisontal_panel_position_slider' => array(
                'type' => 'select',
                'label' => __('Zoom Panel Horizontal Position', 'nextcodegallery'),
                'options' => array(
                    'left' => __('Left', 'nextcodegallery'),
                    'center' => __('Center', 'nextcodegallery'),
                    'right' => __('Right', 'nextcodegallery'),
                ),
                'section' => 'element_style_slider',
                'help' => __('Choose zoom panel horizontal position', 'nextcodegallery')
            ),
            'zoom_vertical_panel_position_slider' => array(
                'type' => 'select',
                'label' => __('Zoom Panel Vertical Position', 'nextcodegallery'),
                'options' => array(
                    'top' => __('Top', 'nextcodegallery'),
                    'bottom' => __('Bottom', 'nextcodegallery'),
                ),
                'section' => 'element_style_slider',
                'help' => __('Choose zoom panel vertical position', 'nextcodegallery')
            ),

            'video_play_type_slider' => array(
                'type' => 'select',
                'label' => __('Video Play Button Type', 'nextcodegallery'),
                'options' => array(
                    'round' => __('Round', 'nextcodegallery'),
                    'square' => __('Square', 'nextcodegallery'),
                ),
                'section' => 'element_style_slider',
                'help' => __('Choose video play button type', 'nextcodegallery')
            ),
            'text_panel_slider' => array(
                'type' => 'checkbox',
                'label' => __('Text Panel', 'nextcodegallery'),
                'section' => 'element_style_slider',
                'help' => __('Choose whether to turn text panel on/off', 'nextcodegallery')
            ),
            'text_panel_always_on_slider' => array(
                'type' => 'checkbox',
                'label' => __('Text Panel Always On', 'nextcodegallery'),
                'section' => 'element_style_slider',
                'help' => __('Choose whether to turn text panel always on on/off', 'nextcodegallery')
            ),
            'text_title_slider' => array(
                'type' => 'checkbox',
                'label' => __('Title', 'nextcodegallery'),
                'section' => 'element_style_slider',
                'help' => __('Choose whether to turn title on/off', 'nextcodegallery')
            ),
            'text_panel_title_size_slider' => array(
                'type' => 'number',
                'label' => __('Title Font Size', 'nextcodegallery'),
                'section' => 'element_style_slider',
                'help' => __('Set title font size in px', 'nextcodegallery')
            ),
            'text_panel_title_color_slider' => array(
                'type' => 'color',
                'label' => __('Title Color', 'nextcodegallery'),
                'section' => 'element_style_slider',
                'help' => __('Set title color in HEXadecimal color system', 'nextcodegallery')
            ),
            'text_description_slider' => array(
                'type' => 'checkbox',
                'label' => __('Description', 'nextcodegallery'),
                'section' => 'element_style_slider',
                'help' => __('Choose whether to turn description on/off', 'nextcodegallery')
            ),
            'text_panel_desc_size_slider' => array(
                'type' => 'number',
                'label' => __('Description Font Size', 'nextcodegallery'),
                'section' => 'element_style_slider',
                'help' => __('Set description font size in px', 'nextcodegallery')
            ),
            'text_panel_desc_color_slider' => array(
                'type' => 'color',
                'label' => __('Description Color', 'nextcodegallery'),
                'section' => 'element_style_slider',
                'help' => __('Set description color in HEXadecimal color system', 'nextcodegallery')
            ),
            'text_panel_bg_slider' => array(
                'type' => 'checkbox',
                'label' => __('Text Panel Background', 'nextcodegallery'),
                'section' => 'element_style_slider',
                'help' => __('Choose whether to turn text panel background on/off', 'nextcodegallery')
            ),
            'text_panel_bg_color_slider' => array(
                'type' => 'color',
                'label' => __('Text Panel background Color', 'nextcodegallery'),
                'section' => 'element_style_slider',
                'help' => __('Set text panel background color in HEXadecimal color system', 'nextcodegallery')
            ),
            'text_panel_bg_opacity_slider' => array(
                'type' => 'number',
                'label' => __('Text Panel background Opacity (%)', 'nextcodegallery'),
                'section' => 'element_style_slider',
                'help' => __('Set Text Panel background Opacity in percentage', 'nextcodegallery')
            ),
            'carousel_slider' => array(
                'type' => 'checkbox',
                'label' => __('Gallery Loop', 'nextcodegallery'),
                'section' => 'element_style_slider',
                'help' => __('Choose whether to turn the gallery loop on/off', 'nextcodegallery')
            ),
            'playlist_slider' => array(
                'type' => 'checkbox',
                'label' => __('Playlist', 'nextcodegallery'),
                'section' => 'element_style_slider',
                'help' => __('Choose whether to turn playlist on/off', 'nextcodegallery')
            ),
            'playlist_pos_slider' => array(
                'type' => 'select',
                'label' => __('Playlist Position', 'nextcodegallery'),
                'options' => array(
                    'right' => __('Right', 'nextcodegallery'),
                    'left' => __('Left', 'nextcodegallery'),
                    'bottom' => __('Bottom', 'nextcodegallery'),
                    'top' => __('Top', 'nextcodegallery'),
                ),
                'section' => 'element_style_slider',
                'help' => __('Choose playlist position', 'nextcodegallery')
            ),
            'thumb_width_slider' => array(
                'type' => 'number',
                'label' => __('Thumbnails width', 'nextcodegallery'),
                'section' => 'element_style_slider',
                'help' => __('Set playlist thumbnails width in px', 'nextcodegallery')
            ),
            'thumb_height_slider' => array(
                'type' => 'number',
                'label' => __('Thumbnails Height', 'nextcodegallery'),
                'section' => 'element_style_slider',
                'help' => __('Set playlist thumbnails height in px', 'nextcodegallery')
            ),
            'playlist_bg_slider' => array(
                'type' => 'color',
                'label' => __('Playlist background color', 'nextcodegallery'),
                'section' => 'element_style_slider',
                'help' => __('Set playlist background color in HEXadecimal color system', 'nextcodegallery')
            ),


            /********************  Grid options  ***********************/
            'width_grid' => array(
                'type' => 'number',
                'label' => __('Image Width', 'nextcodegallery'),
                'section' => 'element_style_grid',
                'help' => __('Choose image width in px', 'nextcodegallery')
            ),
            'height_grid' => array(
                'type' => 'number',
                'label' => __('Image Height', 'nextcodegallery'),
                'section' => 'element_style_grid',
                'help' => __('Choose image height in px', 'nextcodegallery')
            ),
            'num_rows_grid' => array(
                'type' => 'number',
                'label' => __('Gallery Rows Quantity', 'nextcodegallery'),
                'section' => 'element_style_grid',
                'help' => __('Set space between rows in px', 'nextcodegallery')
            ),
            'space_cols_grid' => array(
                'type' => 'number',
                'label' => __('Space Between Columns', 'nextcodegallery'),
                'section' => 'element_style_grid',
                'help' => __('Set space between columns in px', 'nextcodegallery')
            ),
            'space_rows_grid' => array(
                'type' => 'number',
                'label' => __('Space Between Rows', 'nextcodegallery'),
                'section' => 'element_style_grid',
                'help' => __('Set space between rows in px', 'nextcodegallery')
            ),
            'gallery_width_grid' => array(
                'type' => 'number',
                'label' => __('Container Width (%)', 'nextcodegallery'),
                'section' => 'element_style_grid',
                'help' => __('Set container width in percentage', 'nextcodegallery'),
                'max' => '100'
            ),
            'gallery_bg_grid' => array(
                'type' => 'checkbox',
                'label' => __('Gallery Background', 'nextcodegallery'),
                'section' => 'element_style_grid',
                'help' => __('Choose whether to turn gallery background on/off', 'nextcodegallery')
            ),
            'gallery_bg_color_grid' => array(
                'type' => 'color',
                'label' => __('Gallery Background Color', 'nextcodegallery'),
                'section' => 'element_style_grid',
                'help' => __('Set gallery background color in HEXadecimal color system', 'nextcodegallery')
            ),

            'show_title_grid' => array(
                'type' => 'select',
                'label' => __('Title Option', 'nextcodegallery'),
                'options' => array(
                    '0' => __('Always On', 'nextcodegallery'),
                    '1' => __('On Hover', 'nextcodegallery'),
                    '2' => __('Never', 'nextcodegallery')
                ),
                'section' => 'element_style_grid',
                'help' => __('Choose how to display Image title', 'nextcodegallery')
            ),
            'title_position_grid' => array(
                'type' => 'select',
                'label' => __('Title Horizontal Position', 'nextcodegallery'),
                'options' => array(
                    'left' => __('Left', 'nextcodegallery'),
                    'center' => __('Center', 'nextcodegallery'),
                    'right' => __('Right', 'nextcodegallery')
                ),
                'section' => 'element_style_grid',
                'help' => __('Choose title horizontal position', 'nextcodegallery')
            ),
            'title_vertical_position_grid' => array(
                'type' => 'select',
                'label' => __('Title Vertical Position', 'nextcodegallery'),
                'options' => array(
                    'inside_top' => __('Top', 'nextcodegallery'),
                    'inside_bottom' => __('Bottom', 'nextcodegallery'),
                ),
                'section' => 'element_style_grid',
                'help' => __('Choose title vertical position', 'nextcodegallery')
            ),
            'title_appear_type_grid' => array(
                'type' => 'select',
                'label' => __('Title On Hover Type', 'nextcodegallery'),
                'options' => array(
                    'slide' => __('Slide', 'nextcodegallery'),
                    'fade' => __('Fade', 'nextcodegallery'),
                ),
                'section' => 'element_style_grid',
                'help' => __('Choose title on hover effect', 'nextcodegallery')
            ),
            'title_size_grid' => array(
                'type' => 'number',
                'label' => __('Title Font Size', 'nextcodegallery'),
                'section' => 'element_style_grid',
                'help' => __('set title font size in px', 'nextcodegallery')
            ),
            'title_color_grid' => array(
                'type' => 'color',
                'label' => __('Title Color', 'nextcodegallery'),
                'section' => 'element_style_grid',
                'help' => __('Set title color in HEXadecimal color system', 'nextcodegallery')
            ),
            'title_background_color_grid' => array(
                'type' => 'color',
                'label' => __('Title Background Color', 'nextcodegallery'),
                'section' => 'element_style_grid',
                'help' => __('Choose title background color in HEXadecimal color system', 'nextcodegallery')
            ),
            'title_background_opacity_grid' => array(
                'type' => 'number',
                'label' => __('Title Background Opacity (%)', 'nextcodegallery'),
                'section' => 'element_style_grid',
                'help' => __('Set title background opacity in percentage', 'nextcodegallery')
            ),
            'border_width_grid' => array(
                'type' => 'number',
                'label' => __('Image Border Width', 'nextcodegallery'),
                'section' => 'element_style_grid',
                'help' => __('Set image border width in px', 'nextcodegallery')
            ),
            'border_color_grid' => array(
                'type' => 'color',
                'label' => __('Image Border Color', 'nextcodegallery'),
                'section' => 'element_style_grid',
                'help' => __('Set image border color in HEXadecimal color system', 'nextcodegallery')
            ),
            'border_radius_grid' => array(
                'type' => 'number',
                'label' => __('Image Border Radius', 'nextcodegallery'),
                'section' => 'element_style_grid',
                'help' => __('Set image border radius in px', 'nextcodegallery')
            ),

            'show_icons_grid' => array(
                'type' => 'checkbox',
                'label' => __('Lightbox', 'nextcodegallery'),
                'section' => 'element_style_grid',
                'help' => __('Choose whether to turn Lightbox on/off', 'nextcodegallery')
            ),
            'show_link_icon_grid' => array(
                'type' => 'checkbox',
                'label' => __('URL Icon', 'nextcodegallery'),
                'section' => 'element_style_grid',
                'help' => __('Choose whether to turn URL icon on/off', 'nextcodegallery')
            ),
            'item_as_link_grid' => array(
                'type' => 'checkbox',
                'label' => __('Image As Link', 'nextcodegallery'),
                'section' => 'element_style_grid',
                'help' => __('Set image as link', 'nextcodegallery')
            ),
            'link_new_tab_grid' => array(
                'type' => 'checkbox',
                'label' => __('Open Link In New Tab', 'nextcodegallery'),
                'section' => 'element_style_grid',
                'help' => __('Choose whether to open the link in a new tab', 'nextcodegallery')
            ),
            'on_hover_overlay_grid' => array(
                'type' => 'checkbox',
                'label' => __('On Hover Overlay', 'nextcodegallery'),
                'section' => 'element_style_grid',
                'help' => __('Turn on hover overlay on/off', 'nextcodegallery')
            ),
            'image_hover_effect_grid' => array(
                'type' => 'select',
                'label' => __('Image Hover Effect', 'nextcodegallery'),
                'options' => array(
                    'blur' => __('none', 'nextcodegallery'),
                    'bw' => __('Black and White', 'nextcodegallery'),
                    'sepia' => __('Sepia', 'nextcodegallery')
                ),
                'section' => 'element_style_grid',
                'help' => __('Choose image hover effect', 'nextcodegallery')
            ),
            'image_hover_effect_reverse_grid' => array(
                'type' => 'checkbox',
                'label' => __('Image On Hover Reversed Effect', 'nextcodegallery'),
                'section' => 'element_style_grid',
                'help' => __('Choose whether to turn reversed effect on/off', 'nextcodegallery')
            ),
            'shadow_grid' => array(
                'type' => 'checkbox',
                'label' => __('Image Element Shadow', 'nextcodegallery'),
                'section' => 'element_style_grid',
                'help' => __('Choose whether to turn image element shadow on/off', 'nextcodegallery')
            ),
            'lightbox_type_grid' => array(
                'type' => 'select',
                'label' => __('Lightbox Type', 'nextcodegallery'),
                'options' => array(
                    'wide' => __('Wide', 'nextcodegallery'),
                    'compact' => __('Compact', 'nextcodegallery')
                ),
                'section' => 'element_style_grid',
                'help' => __('Choose Lightbox type', 'nextcodegallery')
            ),
            'nav_type_grid' => array(
                'type' => 'select',
                'label' => __('Navigation Type', 'nextcodegallery'),
                'options' => array(
                    'bullets' => __('Bullets', 'nextcodegallery'),
                    'arrows' => __('Arrows', 'nextcodegallery'),
                ),
                'section' => 'components_grid',
                'help' => __('Choose navigation type', 'nextcodegallery')
            ),
            'nav_position_grid' => array(
                'type' => 'select',
                'label' => __('Navigation Position', 'nextcodegallery'),
                'options' => array(
                    'left' => __('Left', 'nextcodegallery'),
                    'center' => __('Center', 'nextcodegallery'),
                    'right' => __('Right', 'nextcodegallery')
                ),
                'section' => 'components_grid',
                'help' => __('Choose navigation position', 'nextcodegallery')
            ),
            'nav_offset_grid' => array(
                'type' => 'number',
                'label' => __('Navigation Offset', 'nextcodegallery'),
                'section' => 'components_grid',
                'help' => __('Navigation Offset in px', 'nextcodegallery')
            ),
            'bullets_margin_grid' => array(
                'type' => 'number',
                'label' => __('Bullets Margin from Top', 'nextcodegallery'),
                'section' => 'components_grid',
                'help' => __('Set bullets margin from the top in px', 'nextcodegallery')
            ),
            'bullets_color_grid' => array(
                'type' => 'select',
                'label' => __('Bullets color', 'nextcodegallery'),
                'options' => array(
                    'gray' => __('Gray', 'nextcodegallery'),
                    'blue' => __('Blue', 'nextcodegallery'),
                    'brown' => __('Brown', 'nextcodegallery'),
                    'green' => __('Green', 'nextcodegallery'),
                    'red' => __('Red', 'nextcodegallery'),
                ),
                'section' => 'components_grid',
                'help' => __('Choose bullets color type', 'nextcodegallery')
            ),
            'bullets_space_between_grid' => array(
                'type' => 'number',
                'label' => __('Space Between Bullets', 'nextcodegallery'),
                'section' => 'components_grid',
                'help' => __('Set space between bullets in px', 'nextcodegallery')
            ),
            'arrows_margin_grid' => array(
                'type' => 'number',
                'label' => __('Arrows margin from Top', 'nextcodegallery'),
                'section' => 'components_grid',
                'help' => __('Set arrows margin from the top in px', 'nextcodegallery')
            ),
            'arrows_space_between_grid' => array(
                'type' => 'number',
                'label' => __('Space Between Arrows', 'nextcodegallery'),
                'section' => 'components_grid',
                'help' => __('Set space between arrows in px', 'nextcodegallery')
            ),


            /*****  Lightbox ****/
            /*****  wide ****/
            'arrows_offset_wide' => array(
                'type' => 'number',
                'label' => __('Arrows Offset', 'nextcodegallery'),
                'section' => 'wide_lightbox',
                'help' => __('Set arrows offset in px', 'nextcodegallery')
            ),
            'overlay_color_wide' => array(
                'type' => 'color',
                'label' => __('Overlay Color', 'nextcodegallery'),
                'section' => 'wide_lightbox',
                'help' => __('Set overlay color in HEXadecimal color system', 'nextcodegallery')
            ),
            'overlay_opacity_wide' => array(
                'type' => 'number',
                'label' => __('Overlay Opacity (%)', 'nextcodegallery'),
                'section' => 'wide_lightbox',
                'help' => __('Set overlay opacity in percentage', 'nextcodegallery')
            ),
            'top_panel_bg_color_wide' => array(
                'type' => 'color',
                'label' => __('Top Panel Background Color', 'nextcodegallery'),
                'section' => 'wide_lightbox',
                'help' => __('Set top panel background color in HEXadecimal color system', 'nextcodegallery')
            ),
            'top_panel_opacity_wide' => array(
                'type' => 'number',
                'label' => __('Top Panel Opacity (%)', 'nextcodegallery'),
                'section' => 'wide_lightbox',
                'help' => __('Set top panel opacity in percentage', 'nextcodegallery')
            ),
            'show_numbers_wide' => array(
                'type' => 'checkbox',
                'label' => __('Image Count', 'nextcodegallery'),
                'section' => 'wide_lightbox',
                'help' => __('Choose whether to turn image count on/off', 'nextcodegallery')
            ),
            'number_size_wide' => array(
                'type' => 'number',
                'label' => __('Image Count Text Size', 'nextcodegallery'),
                'section' => 'wide_lightbox',
                'help' => __('Set image count text font size in px', 'nextcodegallery')
            ),
            'number_color_wide' => array(
                'type' => 'color',
                'label' => __('Image Count Text Color', 'nextcodegallery'),
                'section' => 'wide_lightbox',
                'help' => __('Set image count text color in in HEXadecimal color system', 'nextcodegallery')
            ),
            'image_border_width_wide' => array(
                'type' => 'number',
                'label' => __('Image Border Width', 'nextcodegallery'),
                'section' => 'wide_lightbox',
                'help' => __('Set image border width in px', 'nextcodegallery')
            ),
            'image_border_color_wide' => array(
                'type' => 'color',
                'label' => __('Image Border Color', 'nextcodegallery'),
                'section' => 'wide_lightbox',
                'help' => __('Set image border color in HEXadecimal color system', 'nextcodegallery')
            ),
            'image_border_radius_wide' => array(
                'type' => 'number',
                'label' => __('Image Border radius', 'nextcodegallery'),
                'section' => 'wide_lightbox',
                'help' => __('Set image border radius in px', 'nextcodegallery')
            ),
            'image_shadow_wide' => array(
                'type' => 'checkbox',
                'label' => __('Image Shadow', 'nextcodegallery'),
                'section' => 'wide_lightbox',
                'help' => __('Choose whether to turn image shadow on/off', 'nextcodegallery')
            ),
            'swipe_control_wide' => array(
                'type' => 'checkbox',
                'label' => __('Image Swipe', 'nextcodegallery'),
                'section' => 'wide_lightbox',
                'help' => __('Choose whether to turn Image Swipe on/off', 'nextcodegallery')
            ),
            'zoom_control_wide' => array(
                'type' => 'checkbox',
                'label' => __('Image Zoom', 'nextcodegallery'),
                'section' => 'wide_lightbox',
                'help' => __('Choose whether to turn image zoom on/off', 'nextcodegallery')
            ),

            'show_text_panel_wide' => array(
                'type' => 'checkbox',
                'label' => __('Text panel', 'nextcodegallery'),
                'section' => 'wide_lightbox',
                'help' => __('Choose whether to turn text panel on/off', 'nextcodegallery')
            ),
            'texpanel_paddind_vert_wide' => array(
                'type' => 'number',
                'label' => __('Text panel Vertical Padding', 'nextcodegallery'),
                'section' => 'wide_lightbox',
                'help' => __('Set text panel vertical padding in px', 'nextcodegallery')
            ),
            'texpanel_paddind_hor_wide' => array(
                'type' => 'number',
                'label' => __('Text panel Horizontal Padding', 'nextcodegallery'),
                'section' => 'wide_lightbox',
                'help' => __('Set text panel horizontal padding in px', 'nextcodegallery')
            ),
            'enable_title_wide' => array(
                'type' => 'checkbox',
                'label' => __(' Title', 'nextcodegallery'),
                'section' => 'wide_lightbox',
                'help' => __('Choose whether to turn title on/off', 'nextcodegallery')
            ),
            'title_color_wide' => array(
                'type' => 'color',
                'label' => __('Title Color', 'nextcodegallery'),
                'section' => 'wide_lightbox',
                'help' => __('Set title color in HEXadecimal color system', 'nextcodegallery')
            ),
            'title_font_size_wide' => array(
                'type' => 'number',
                'label' => __('Title Font Size', 'nextcodegallery'),
                'section' => 'wide_lightbox',
                'help' => __('Set title font size in px', 'nextcodegallery')
            ),
            'enable_desc_wide' => array(
                'type' => 'checkbox',
                'label' => __('Description', 'nextcodegallery'),
                'section' => 'wide_lightbox',
                'help' => __('Choose whether to turn description on/off', 'nextcodegallery')
            ),
            'desc_color_wide' => array(
                'type' => 'color',
                'label' => __('Description Color', 'nextcodegallery'),
                'section' => 'wide_lightbox',
                'help' => __('Set description color in HEXadecimal color system', 'nextcodegallery')
            ),

            'desc_font_size_wide' => array(
                'type' => 'number',
                'label' => __('Description Font Size', 'nextcodegallery'),
                'section' => 'wide_lightbox',
                'help' => __('Set description font size in px', 'nextcodegallery')
            ),
            'text_position_wide' => array(
                'type' => 'select',
                'options' => array(
                    'left' => __('Left', 'nextcodegallery'),
                    'center' => __('Center', 'nextcodegallery'),
                    'right' => __('Right', 'nextcodegallery')
                ),
                'label' => __('Text Position', 'nextcodegallery'),
                'section' => 'wide_lightbox',
                'help' => __('Choose text position', 'nextcodegallery')
            ),

            /*****  compact ****/
            'arrows_offset_compact' => array(
                'type' => 'number',
                'label' => __('Arrows Offset', 'nextcodegallery'),
                'section' => 'compact_lightbox',
                'help' => __('Set arrows offset in px', 'nextcodegallery')
            ),
            'overlay_color_compact' => array(
                'type' => 'color',
                'label' => __('Overlay Color', 'nextcodegallery'),
                'section' => 'compact_lightbox',
                'help' => __('Set overlay color in HEXadecimal color system', 'nextcodegallery')
            ),
            'overlay_opacity_compact' => array(
                'type' => 'number',
                'label' => __('Overlay Opacity (%)', 'nextcodegallery'),
                'section' => 'compact_lightbox',
                'help' => __('Set overlay opacity in percentage', 'nextcodegallery')
            ),
            'show_numbers_compact' => array(
                'type' => 'checkbox',
                'label' => __('Image Count', 'nextcodegallery'),
                'section' => 'compact_lightbox',
                'help' => __('Choose whether to turn image count on/off', 'nextcodegallery')
            ),
            'number_size_compact' => array(
                'type' => 'number',
                'label' => __('Image Count Text Size', 'nextcodegallery'),
                'section' => 'compact_lightbox',
                'help' => __('Set image count text font size in px', 'nextcodegallery')
            ),
            'number_color_compact' => array(
                'type' => 'color',
                'label' => __('Image Count Text Color', 'nextcodegallery'),
                'section' => 'compact_lightbox',
                'help' => __('Set image count text color in in HEXadecimal color system', 'nextcodegallery')
            ),
            'image_border_width_compact' => array(
                'type' => 'number',
                'label' => __('Image Border Width', 'nextcodegallery'),
                'section' => 'compact_lightbox',
                'help' => __('Set image border width in px', 'nextcodegallery')
            ),
            'image_border_color_compact' => array(
                'type' => 'color',
                'label' => __('Image Border Color', 'nextcodegallery'),
                'section' => 'compact_lightbox',
                'help' => __('Set image border color in HEXadecimal color system', 'nextcodegallery')
            ),
            'image_border_radius_compact' => array(
                'type' => 'number',
                'label' => __('Image Border radius', 'nextcodegallery'),
                'section' => 'compact_lightbox',
                'help' => __('Set image border radius in px', 'nextcodegallery')
            ),
            'image_shadow_compact' => array(
                'type' => 'checkbox',
                'label' => __('Image Shadow', 'nextcodegallery'),
                'section' => 'compact_lightbox',
                'help' => __('Choose whether to turn image shadow on/off', 'nextcodegallery')
            ),
            'swipe_control_compact' => array(
                'type' => 'checkbox',
                'label' => __('Image Swipe', 'nextcodegallery'),
                'section' => 'compact_lightbox',
                'help' => __('Choose whether to turn Image Swipe on/off', 'nextcodegallery')
            ),
            'zoom_control_compact' => array(
                'type' => 'checkbox',
                'label' => __('Image Zoom', 'nextcodegallery'),
                'section' => 'compact_lightbox',
                'help' => __('Choose whether to turn image zoom on/off', 'nextcodegallery')
            ),

            'show_text_panel_compact' => array(
                'type' => 'checkbox',
                'label' => __('Text panel', 'nextcodegallery'),
                'section' => 'compact_lightbox',
                'help' => __('Choose whether to turn text panel on/off', 'nextcodegallery')
            ),
            'texpanel_paddind_vert_compact' => array(
                'type' => 'number',
                'label' => __('Text panel Vertical Padding', 'nextcodegallery'),
                'section' => 'compact_lightbox',
                'help' => __('Set text panel vertical padding in px', 'nextcodegallery')
            ),
            'texpanel_paddind_hor_compact' => array(
                'type' => 'number',
                'label' => __('Text panel Horizontal Padding', 'nextcodegallery'),
                'section' => 'compact_lightbox',
                'help' => __('Set text panel horizontal padding in px', 'nextcodegallery')
            ),
            'enable_title_compact' => array(
                'type' => 'checkbox',
                'label' => __(' Title', 'nextcodegallery'),
                'section' => 'compact_lightbox',
                'help' => __('Choose whether to turn title on/off', 'nextcodegallery')
            ),
            'title_color_compact' => array(
                'type' => 'color',
                'label' => __('Title Color', 'nextcodegallery'),
                'section' => 'compact_lightbox',
                'help' => __('Set title color in HEXadecimal color system', 'nextcodegallery')
            ),
            'title_font_size_compact' => array(
                'type' => 'number',
                'label' => __('Title Font Size', 'nextcodegallery'),
                'section' => 'compact_lightbox',
                'help' => __('Set title font size in px', 'nextcodegallery')
            ),
            'enable_desc_compact' => array(
                'type' => 'checkbox',
                'label' => __('Description', 'nextcodegallery'),
                'section' => 'compact_lightbox',
                'help' => __('Choose whether to turn description on/off', 'nextcodegallery')
            ),
            'desc_color_compact' => array(
                'type' => 'color',
                'label' => __('Description Color', 'nextcodegallery'),
                'section' => 'compact_lightbox',
                'help' => __('Set description color in HEXadecimal color system', 'nextcodegallery')
            ),

            'desc_font_size_compact' => array(
                'type' => 'number',
                'label' => __('Description Font Size', 'nextcodegallery'),
                'section' => 'compact_lightbox',
                'help' => __('Set description font size in px', 'nextcodegallery')
            ),
            'text_position_compact' => array(
                'type' => 'select',
                'options' => array(
                    'left' => __('Left', 'nextcodegallery'),
                    'center' => __('Center', 'nextcodegallery'),
                    'right' => __('Right', 'nextcodegallery')
                ),
                'label' => __('Text Position', 'nextcodegallery'),
                'section' => 'compact_lightbox',
                'help' => __('Choose text position', 'nextcodegallery')
            ),

        ));

        $builder->render();

    }

    public function setOption($options)
    {
        $this->options = $options;
    }

    public function getOption()
    {
        return $this->options;
    }

    /**
     * Save settings
     */
    public static function save()
    {

        if (!isset($_POST['_wpnonce']) || !wp_verify_nonce($_POST['_wpnonce'], 'nextcode_gallerysettings')) {
            die(0);
        }

        if (!isset($_POST['settings']) || empty($_POST['settings']) || !is_array($_POST['settings'])) {
            die(0);
        }

        $s = array_map(array(__CLASS__, 'sanitize_field_value'), $_POST['settings']);

        foreach ($s as $key => $value) {
            \NextcodeGallery()->settings->setOption(sanitize_text_field($key), $value);
        }

        echo 'ok';
        die;
    }

    public static function sanitize_field_value($value)
    {
        if (is_array($value) || is_object($value) || is_bool($value)) {
            $value = serialize($value);
        } else {
            $value = sanitize_text_field($value);
        }

        if ($value === 'true') {
            $value = 'b:1;';
        } elseif ($value === 'false') {
            $value = 'b:0;';
        }

        return $value;
    }

}
