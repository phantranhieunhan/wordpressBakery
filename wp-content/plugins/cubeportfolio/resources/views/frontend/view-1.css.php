<?php
/**
 * @var $id_gallery \NextcodeGallery\Models\Gallery
 * @var $gallery_data \NextcodeGallery\Models\Gallery
 */



$container = "#nextcodegallery-container-".$id_gallery;
$pager =  ".nextcodegallery-pagination-".$id_gallery;
$load = $container." .nextcode_galleryload_more";


echo "<style>";
?>

<?= $container ?> {
    text-align: <?= $gallery_data->position ?>
}

<?= $pager ?>{
    text-align: <?= $options["pagination_position_tiles"]; ?> !important;
}

<?= $pager ?> a{
    font-size: <?= $options["pagination_font_size_tiles"]; ?>px !important;
    padding: <?= $options["pagination_vertical_padding_tiles"]; ?>px <?= $options["pagination_horisontal_padding_tiles"]; ?>px !important;
    margin: <?= $options["pagination_margin_tiles"]; ?>px !important;
    border: <?= $options["pagination_border_width_tiles"]; ?>px solid #<?= $options["pagination_border_color_tiles"]; ?> !important;
    border-radius: <?= $options["pagination_border_radius_tiles"]; ?>px !important;
    color: #<?= $options["pagination_color_tiles"]; ?> !important;
    background-color: #<?= $options["pagination_background_color_tiles"]; ?> !important;
    font-family: <?= $options["pagination_font_family_tiles"]; ?> !important;
}

<?= $pager ?> a:hover, <?= $pager ?> a.nextcodegallery-pagination-icon-active{
                  color: #<?= $options["pagination_hover_color_tiles"]; ?> !important;
                  background-color: #<?= $options["pagination_hover_background_color_tiles"]; ?> !important;
                  border-color: #<?= $options["pagination_hover_border_color_tiles"]; ?> !important;
              }

<?= $container ?> .nextcode_galleryload_more_space{
                      margin-top: 20px !important;
                      text-align: <?= $options["load_more_position_tiles"]; ?> !important;
                  }

<?= $container ?> .nextcode_galleryload_more_space button{
                      padding: <?= $options["load_more_vertical_padding_tiles"]; ?>px <?= $options["load_more_horisontal_padding_tiles"]; ?>px !important;
                      font-size: <?= $options["load_more_font_size_tiles"]; ?>px !important;
                      background-color: #<?=$options["load_more_background_color_tiles"]; ?> !important;
                      color: #<?=$options["load_more_color_tiles"]; ?> !important;
                      border:<?=$options["load_more_border_width_tiles"]; ?>px solid #<?=$options["load_more_border_color_tiles"]; ?> !important;
                      border-radius: <?= $options["load_more_border_radius_tiles"]; ?>px !important;
                      font-family: <?= $options["load_more_font_family_tiles"]; ?> !important;
                  }
<?= $container ?> .nextcode_galleryload_more_space button:hover{
                      background-color: #<?=$options["load_more_hover_background_color_tiles"]; ?> !important;
                      color: #<?=$options["load_more_hover_color_tiles"]; ?> !important;
                      border-color: #<?= $options["load_more_hover_border_color_tiles"]; ?> !important;
                  }

<?= $container ?> .nextcode_galleryload_more_space button,
<?= $container ?> .nextcode_galleryload_more_space button:hover,
<?= $container ?> .nextcode_galleryload_more_space button:active,
<?= $container ?> .nextcode_galleryload_more_space button:focus{
  outline: none !important;
}

<?= $container ?> .nextcode_galleryloading li{
                      border: 3px solid #<?=$options["load_more_loader_color_tiles"]; ?> !important;
                  }

.ug-lightbox .ug-lightbox-top-panel-overlay{
    background-color: #<?= $options['top_panel_bg_color_wide']; ?> !important;
}

<?=  $gallery_data->custom_css; ?>

<?= "</style>" ?>



