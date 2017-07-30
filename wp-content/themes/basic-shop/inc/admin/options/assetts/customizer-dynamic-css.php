<?php
/************************************************************************************
* TEMPLATE DYNAMIC CSS
*************************************************************************************/
add_action( 'wp_enqueue_scripts', 'igthemes_add_daynamic_css', 20 );
function igthemes_add_daynamic_css() {
    wp_enqueue_style( 'dynamic-style', get_template_directory_uri() . '/css/dynamic.css');   
    
    //DEFAULTS
    include get_template_directory() . '/inc/admin/options/assetts/customizer-defaults.php';
    $bg_color =  '#'.get_theme_mod('background_color', $background_color);
    
    $style = '
    input[type="text"],
    input[type="email"],
    input[type="url"],
    input[type="password"],
    input[type="search"],
    input[type="number"],
    input[type="tel"],
    textarea,
    select  {
        background:  '. igthemes_color_brightness($bg_color,5) .';
        border: 1px solid '. igthemes_color_brightness($bg_color,-20) .';
        color:'. get_theme_mod( 'body_text_color', $body_text_color ).';
    }
    
    table {
        border:1px solid '. igthemes_color_brightness($bg_color,-20) .'; 
        background:'. $bg_color .';
    }
    table th {
        background:'. igthemes_color_brightness($bg_color,-1) .';
        border-bottom: 1px solid '. igthemes_color_brightness($bg_color,-20) .';
    }
    table td {
        background: '. igthemes_color_brightness($bg_color,5 ).';
        border: 1px solid '. igthemes_color_brightness($bg_color,-20) .';
    }
    
    .site-footer table {
        border:1px solid '. igthemes_color_brightness(get_theme_mod('footer_background_color', $footer_background_color ),-20) .'; 
        background:'. $bg_color .';
    }
    .site-footer table th {
        background:'. igthemes_color_brightness(get_theme_mod('footer_background_color', $footer_background_color ),-5) .';
        border-bottom: 1px solid '. igthemes_color_brightness(get_theme_mod('footer_background_color', $footer_background_color ),-20) .';
    }
    .site-footer table td {
        background: '. igthemes_color_brightness( get_theme_mod('footer_background_color', $footer_background_color ),5 ).';
        border: 1px solid '. igthemes_color_brightness(get_theme_mod('footer_background_color', $footer_background_color ),-20) .';
    }
    ul.page-numbers li {
        background: '. igthemes_color_brightness($bg_color,-1 ).';
        border: 1px solid '. igthemes_color_brightness($bg_color,-15 ).';
    }

    ul.page-numbers .current {
        background: '. igthemes_color_brightness($bg_color,-5 ).';
    }
    pre {
        background: ' . igthemes_color_brightness($bg_color,-15) .';
    }
    .format-aside,
    blockquote {
        border-left-color: ' . igthemes_color_brightness($bg_color,-15) .';
    }
    .sticky {
        background: ' . igthemes_color_brightness($bg_color,5) .';
        border: 1px solid '. igthemes_color_brightness($bg_color,-20) .';
    }
    
    .header-widget-region .widget_nav_menu ul,
    .widget-area .widget_nav_menu ul {
        background:'. igthemes_color_brightness($bg_color,5) .'; 
    }
    .footer-widget .widget_nav_menu ul {
        background:'. igthemes_color_brightness(get_theme_mod('footer_background_color', $footer_background_color ),5) .'; 
    }
    
    .woocommerce .shop-table {
        border:1px solid '. igthemes_color_brightness($bg_color,-20) .'; 
        background:'. $bg_color .';
    }
    .woocommerce table.shop_table th {
        background:'. igthemes_color_brightness($bg_color,-1) .';
        border-bottom: 1px solid '. igthemes_color_brightness($bg_color,-20) .';
        border-top:none;
    }
    .woocommerce table.shop_table td {
        background: '. igthemes_color_brightness($bg_color,5 ).';
        border: 1px solid '. igthemes_color_brightness($bg_color,-20) .';
        border-top:none!important;
    }
    .widget_shopping_cart .widget_shopping_cart_content {
        background: '. igthemes_color_brightness($bg_color,15 ).';
        border:1px solid '. igthemes_color_brightness($bg_color,-5) .';
    }
    .woocommerce .woocommerce-tabs ul.tabs {
        background: '. igthemes_color_brightness($bg_color,5 ).';
    }
    .woocommerce div.product .woocommerce-tabs ul.tabs li.active {
        background: '. igthemes_color_brightness($bg_color,15 ).'!important;
    }
    .woocommerce .woocommerce-tabs .panel {
        background: '. igthemes_color_brightness($bg_color,15 ).';
    }
    .woocommerce-error, .woocommerce-info, .woocommerce-message {
        background: '. igthemes_color_brightness($bg_color, -1 ).';
    }
    .woocommerce .woocommerce-checkout #payment, .woocommerce #add_payment_method #payment{
        background: '. igthemes_color_brightness($bg_color,15 ).';
    }
    ';
    wp_add_inline_style( 'dynamic-style', $style );
}
/************************************************************************************
* CUSTOMIZER CSS
*************************************************************************************/
add_action( 'wp_enqueue_scripts', 'igthemes_add_customizer_css', 20 );
//start functions
function igthemes_add_customizer_css() {
    wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/css/custom.css');
        //DEFAULTS
        include dirname( __FILE__ ) . '/customizer-defaults.php';

        $bg_color =  get_theme_mod('background_color', $background_color);

        $style = '
        .main-navigation,
        .site-branding,
        .site-header {
            background:'. get_theme_mod( 'header_background_color', $header_background_color ) .';
            border-color: '. igthemes_color_brightness(get_theme_mod('header_background_color', $header_background_color ),-15) .';
        }
        .site-description {
            color:'. get_theme_mod( 'header_text_color', $header_text_color ) .';
        }
        .header-nav ul li a,
        .site-title a {
            color:'. get_theme_mod('header_link_normal', $header_link_normal ) .';
        }
        .header-nav {
            background:'. igthemes_color_brightness(get_theme_mod('header_background_color', $header_background_color ), -5) .';
            border-bottom: 1px solid '. igthemes_color_brightness(get_theme_mod('header_background_color', $header_background_color ),-15) .';
        }
        .header-nav ul li a:hover {
            color:'. get_theme_mod('header_link_hover', $header_link_hover ) .';
        }
        .main-navigation a {
            color:'. get_theme_mod( 'header_link_normal', $header_link_normal ) .';
        }
        .main-navigation a:hover {
            color:'. get_theme_mod( 'header_link_hover', $header_link_hover ) .';
        }
        .main-navigation ul ul {
           background: '. get_theme_mod('header_background_color', $header_background_color ) .';      
        }
        .main-navigation ul li:hover > a {
            color: '. get_theme_mod( 'header_link_hover', $header_link_hover ) .';
        }
        .site-footer {
            background:'. get_theme_mod('footer_background_color', $footer_background_color) .';
            color:'. get_theme_mod('footer_text_color', $footer_text_color) .';
            border-top:1px solid '. igthemes_color_brightness(get_theme_mod('header_background_color', $header_background_color ),-15) .';
        }
        .site-footer .site-info {
            background:'. igthemes_color_brightness(get_theme_mod('footer_background_color', $footer_background_color), -5) .';
        }
        .site-footer a {
            color:'. get_theme_mod('footer_link_normal', $footer_link_normal) .';
        }
        .site-footer a:hover,
        .site-footer a:focus {
            color:'. get_theme_mod('footer_link_hover', $footer_link_hover) .';
        }
        .site-footer h1,
        .site-footer h2,
        .site-footer h3,
        .site-footer h4,
        .site-footer h5,
        .site-footer h6 {
            color:'. get_theme_mod('footer_headings_color', $footer_headings_color) .';
        }
        .site-content {
            color: '. get_theme_mod('body_text_color', $body_text_color) .';
        }
        .site-content a {
            color: '. get_theme_mod('body_link_normal', $body_link_normal) .';
        }
        .site-content a:hover,
        .site-content a:focus,
        .archive .entry-title a:hover {
            color: '. get_theme_mod('body_link_hover', $body_link_hover) .';
        }
        .site-content h1,
        .site-content h2,
        .site-content h3,
        .site-content h4,
        .site-content h5,
        .site-content h6,
        .archive .entry-title a {
            color: '. get_theme_mod('body_headings_color', $body_headings_color) .';
        }
        .site .button,
        .site input[type="button"],
        .site input[type="reset"],
        .site input[type="submit"] {
            border-color: '. get_theme_mod('button_background_normal', $button_background_normal) .'!important;
            background-color: '. get_theme_mod('button_background_normal', $button_background_normal) .'!important;
            color: '. get_theme_mod('button_text_normal', $button_text_normal) .'!important;
        }
        .site .button:hover,
        .site input[type="button"]:hover,
        .site input[type="reset"]:hover,
        .site input[type="submit"]:hover,
        .site input[type="button"]:focus,
        .site input[type="reset"]:focus,
        .site input[type="submit"]:focus {
            border-color: '. get_theme_mod('button_background_hover', $button_background_hover) .'!important;
            background-color: '. get_theme_mod('button_background_hover', $button_background_hover) .'!important;
            color: '. get_theme_mod('button_text_hover', $button_text_hover) .'!important;
        }
        .posted-on:before,
        .byline:before,
        .cat-links:before ,
        .tags-links:before,
        .comments-link:before,
        .format-quote .entry-title:before,
        .format-video .entry-title:before,
        .format-image .entry-title:before,
        .format-link .entry-title:before,
        .format-gallery .entry-title:before,
        .format-audio .entry-title:before,
        .format-status .entry-title:before,
        .format-chat .entry-title:before,
        .sticky .entry-title:before {
            color: '. get_theme_mod('body_link_hover', $body_link_hover) .';
        }
    ';
   wp_add_inline_style( 'custom-style', $style );
}