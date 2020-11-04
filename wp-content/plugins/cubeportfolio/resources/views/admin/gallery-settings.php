<?php
/**
 * Template for  gallery settings  page
 * @var $individuals \NextcodeGallery\Models\Settings
 * @var $view_type \NextcodeGallery\Models\Gallery
 */


$section = null;


$pro_options = array(
    "on_hover_overlay_justified",
    "image_hover_effect_justified",
    "on_hover_overlay_tiles",
    "image_hover_effect_tiles",
    "on_hover_overlay_carousel",
    "image_hover_effect_carousel",
    "on_hover_overlay_grid",
    "image_hover_effect_grid",
    "playlist_slider",
    "playlist_pos_slider"
);


foreach ($individuals as $key => $val) {
    if ($key >= 0 && $key < 7) {
        $section = 'justified_section_ind section_individual';
        if ($view_type != "justified") {
            $section .= " nextcode_galleryhidden";
        }
    } elseif ($key >= 7 && $key < 15) {
        $section = 'tiles_section_ind section_individual';
        if ($view_type != "tiles") {
            $section .= " nextcode_galleryhidden";
        }
    } elseif ($key >= 15 && $key < 24) {
        $section = 'carousel_section_ind section_individual';
        if ($view_type != "carousel") {
            $section .= " nextcode_galleryhidden";
        }
    } elseif ($key >= 24 && $key < 33) {
        $section = 'grid_section_ind section_individual';
        if ($view_type != "grid") {
            $section .= " nextcode_galleryhidden";
        }
    } elseif ($key >= 33) {
        $section = 'slider_section_ind section_individual';
        if ($view_type != "slider") {
            $section .= " nextcode_galleryhidden";
        }
    }


    if (in_array($val->option_key, $pro_options)) {
        $disabled = " disabled ";
        $pro_label = " pro_label ";
    } else {
        $disabled = "";
        $pro_label = "";
    }

    $pro_class = (in_array($val->option_key, $pro_options)) ? " disabled pro_label " : "";

    $material = ($val->option_type != "checkbox") ? " group_material" : "";

    echo "<li class='" . $section . $material . $disabled . " ' id='ind_setting_" . $val->option_key . "_section'>";
    ?>
    <h4><?php echo $val->option_title;
        if ($pro_label) { ?>  <span class="<?php echo $pro_label; ?>">PRO</span> <?php } ?></h4>
    <?php
    switch ($val->option_type) {
        case "select":
            ?>
            <select name="<?php echo "ind_setting_" . $val->option_key; ?>"
                    id="<?php echo "ind_setting_" . $val->option_key; ?>">
                <?php
                $option_vals = explode(",", $val->select_options_val);
                $options_titles = explode(",", $val->select_options_title);
                foreach ($option_vals as $k => $v) {
                    ?>
                    <option value="<?php echo $v; ?>" <?php if ($val->option_value == $v) echo "selected"; ?>><?php echo $options_titles[$k]; ?></option>
                    <?php
                }
                ?>
            </select>
            <?php
            break;
        case "checkbox":
            ?>

            <div class="md-checkbox">
                <input id="option-no-<?php echo $key; ?>" type="checkbox"
                       name="<?php echo "ind_setting_" . $val->option_key; ?>" <?php if ($val->option_value == 1) echo "checked"; ?>>
                <!-- Use label even if no text required -->
                <label for="option-no-<?php echo $key; ?>"></label>
            </div>
            <?php
            break;
        case "number":
            ?>
            <input type="number"
                   name="<?php echo "ind_setting_" . $val->option_key; ?>" value="<?php echo $val->option_value; ?>">
            <?php
            break;
    }
    echo "</li>";

}

//echo "</div>";
?>
