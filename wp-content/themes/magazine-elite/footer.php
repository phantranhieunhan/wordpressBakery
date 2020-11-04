<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Magazine_Elite
 */
?>
<?php
if( !is_front_page() ) {
    ?>
    </div><!-- #content -->
    <?php
}
?>

<?php
/**
 * Hook - magazine_elite_before_footer.
 *
 */
do_action('magazine_elite_before_footer');
?>

<footer id="colophon" class="site-footer">
    <?php if (is_active_sidebar('footer-col-one') || is_active_sidebar('footer-col-two') || is_active_sidebar('footer-col-three')): ?>
        <div class="footer-widget-area tertiary-font">
            <div class="container">
                <div class="row">
                    <?php if (is_active_sidebar('footer-col-one')) : ?>
                        <div class="col-md-4">
                            <?php dynamic_sidebar('footer-col-one'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (is_active_sidebar('footer-col-two')) : ?>
                        <div class="col-md-4">
                            <?php dynamic_sidebar('footer-col-two'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (is_active_sidebar('footer-col-three')) : ?>
                        <div class="col-md-4">
                            <?php dynamic_sidebar('footer-col-three'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="site-copyright primary-background tertiary-font">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <span>
                        <?php
                        $copyright_text = magazine_elite_get_option('copyright_text', true);
                        if ($copyright_text) {
                            echo wp_kses_post($copyright_text);
                        }
                        ?>
                    </span>
                    <?php printf(esc_html__('Theme: %1$s by %2$s', 'magazine-elite'), 'Magazine Elite', '<a href="http://themesaga.com/" target = "_blank" rel="designer">Themesaga</a>'); ?>
                </div>
            </div>
        </div>
    </div>

</footer>
</div>
<!-- #page -->


<?php if (is_active_sidebar('offcanvas')) : ?>
    <div id="sidr-nav">
        <div class="sidr-close-holder mb-10 mt-10">
            <a class="sidr-class-sidr-button-close" href="#sidr-nav"><span class="screen-reader-text"><?php echo esc_html__('Close', 'magazine-elite'); ?></span><i class="ion-ios-close-empty"></i></a>
        </div>
        <!-- offcanvas navigation content -->
        <?php dynamic_sidebar('offcanvas'); ?>
    </div>
<?php endif; ?>


<div class="reveal-model">
    <div class="reveal" role="document">
        <div class="table-format">
            <div class="table-format-child">
                <div class="col-md-8 col-md-offset-2">
                    <div class="row">
                        <div class="col-md-6">
                            <?php
                            $google_map_shortcode = magazine_elite_get_option('google_map_shortcode', true);
                            if ($google_map_shortcode) {
                                echo do_shortcode($google_map_shortcode);
                            }
                            ?>
                        </div>
                        <div class="col-md-6">
                            <?php
                            $contact_form_shortcode = magazine_elite_get_option('contact_form_shortcode', true);
                            if ($contact_form_shortcode) {
                                echo do_shortcode($contact_form_shortcode);
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="close-popup"></div>
    </div>
</div>

<?php wp_footer(); ?>

</body>
</html>
