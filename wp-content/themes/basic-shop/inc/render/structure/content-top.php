<?php
/*-----------------------------------------------------------------
 * CONTENT TOP
-----------------------------------------------------------------*/
add_action( 'igthemes_content_top', 'igthemes_header_widget', 10 );
add_action( 'igthemes_content_top', 'igthemes_top_breadcrumb', 20 );
/*-----------------------------------------------------------------
 * TOP WIDGETS
-----------------------------------------------------------------*/
if ( ! function_exists( 'igthemes_header_widget' ) ) {
    //start function
    function igthemes_header_widget() {
        if ( is_active_sidebar( 'header-widget' ) ) {
            echo '<div class="header-widget-region" role="complementary">';
                dynamic_sidebar( 'header-widget' );
            echo '</div>';
        }
    }
}
/*-----------------------------------------------------------------
 * BREADCRUMB
-----------------------------------------------------------------*/
if ( ! function_exists( 'igthemes_breadcrumb' ) ) {
    // start function
    function igthemes_breadcrumb() {
        if (get_theme_mod('breadcrumb')) {
            if ( function_exists('bcn_display') && !is_home() ) { ?>
            <div class="breadcrumb" typeof="BreadcrumbList" vocab="http://schema.org/">
                <div class="container">
                    <?php bcn_display(); ?>
                </div>
            </div>
            <?php } elseif ( function_exists('yoast_breadcrumb') ) { 
                yoast_breadcrumb('<div class="breadcrumb"><div class="container">','</div></div>');
            } else {
                if (!is_home()) {
                    echo '<div class="breadcrumb">';
                    echo '<a href="'. esc_url(home_url('/')) .'">';
                    echo esc_html__('Home', 'basic-shop');
                    echo '</a>';
                    if (is_single()) {
                        the_category('');
                        if (is_singular( 'post' )) {
                            echo '<span class="current">';
                            the_title();
                            echo '</span>';
                        } 
                    }
                    echo '</div>';
                }
            }
        }
    }
}
//DISPLAY BREADCRUMBS
if ( ! function_exists( 'igthemes_top_breadcrumb' ) ) {
    //start function
    function igthemes_top_breadcrumb() {
        if (is_singular('post')) {
            igthemes_breadcrumb();
        }
    }
}