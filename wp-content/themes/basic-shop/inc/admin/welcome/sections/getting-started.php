<?php
/**
 * Welcome screen getting started template
 */
?>
<?php $theme_data = wp_get_theme('basic-shop'); ?>
<h1 class="theme-name">
    <?php echo $theme_data->Name .'<sup class="version">' . esc_attr(  $theme_data->Version ) . '</sup>'; ?>
</h1>
<p><?php esc_html_e( 'Here you can read the documentation and know how to get the most out of your new theme.', 'basic-shop' ); ?></p>
<div id="getting_started" class="panel">
    <div class="col2 evidence">
        <h3><?php printf(esc_html__('%s Premium', 'basic-shop'), $theme_data->Name); ?></h3>
           <p>
                <?php esc_html_e( 'Basic Shop Premium expands the already powerful free version of this theme and gives access to our priority support service.', 'basic-shop' ); ?>
            <ul>
                <li><?php esc_html_e( 'More advanced options', 'basic-shop' ); ?></li>
                <li><?php esc_html_e( 'New fonts', 'basic-shop' ); ?></li>
                <li><?php esc_html_e( 'Shop customizer', 'basic-shop' ); ?></li>
                <li><?php esc_html_e( 'Custom widgets', 'basic-shop' ); ?></li>
                <li><?php esc_html_e( 'New post and page settings', 'basic-shop' ); ?></li>
                <li><?php esc_html_e( 'Premium support', 'basic-shop' ); ?></li>
                <li><?php esc_html_e( 'Money back guarantee', 'basic-shop' ); ?></li>
            </ul>
            <a href="<?php echo esc_url( 'http://www.iograficathemes.com/downloads/basic-shop' ); ?>" target="_blank" class="button-upgrade">
                <?php esc_html_e('upgrade to premium', 'basic-shop'); ?>
            </a>
        </p>
    </div>
     <div class="col2 omega">
        <h3><?php esc_html_e( 'Enjoying the theme?', 'basic-shop' ); ?></h3>
        <p class="about"><?php esc_html_e( 'If you like this theme why not leave us a review on WordPress.org?  We\'d really appreciate it!', 'basic-shop' ); ?></p>
        <p>
            <a href="<?php echo esc_url( 'https://wordpress.org/support/theme/'. $theme_data->get( 'TextDomain' ) .'/reviews/#new-post' ); ?>" target="_blank" class="button button-secondary"><?php esc_html_e('Add Your Review', 'basic-shop'); ?></a>
        </p>
        <h3><?php esc_html_e( 'Theme Documentation', 'basic-shop' ); ?></h3>
        <p class="about"><?php printf(esc_html__('Need any help to setup and configure %s? Please have a look at our documentations instructions.', 'basic-shop'), $theme_data->Name); ?></p>
        <p>
            <a href="<?php echo esc_url( 'http://www.iograficathemes.com/documentation/'. $theme_data->get( 'TextDomain' ) .'-premium/' ); ?>" target="_blank" class="button button-secondary"><?php esc_html_e('View Documentation', 'basic-shop'); ?></a>
        </p>
        <h3><?php esc_html_e( 'Theme Customizer', 'basic-shop' ); ?></h3>
        <p class="about"><?php printf(esc_html__('%s supports the Theme Customizer for all theme settings. Click "Customize" to start customize your site.', 'basic-shop'), $theme_data->Name); ?></p>
        <p>
            <a href="<?php echo admin_url('customize.php'); ?>" class="button button-secondary"><?php esc_html_e('Start Customize', 'basic-shop'); ?></a>
        </p>
    </div>

</div><!-- end ig-started -->
