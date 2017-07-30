<?php
/*****************************************************************
* LAYOUT SETTINGS
******************************************************************/
//Images
    $wp_customize->add_setting('blog-layout', array(
        'default'    		=> null,
        'sanitize_callback' => null,
    ));
    $wp_customize->add_control( new IGthemes_Heading( $wp_customize, 'blog-layout', array(
        'label' => esc_html__('Blog layout', 'basic-shop'),
        'description' => esc_html__('', 'basic-shop'),
        'section' => 'layout-settings',
        'settings' => 'blog-layout',
        'priority'   => 1,
    ) ) );
//main layout
    $wp_customize->add_setting(
        'main_sidebar',
        array(
            'sanitize_callback' => 'igthemes_sanitize_choices',
            'default' => 'right',
    ));
    $wp_customize->add_control(
            new IGthemes_Radio_Image_Control(
            // $wp_customize object
            $wp_customize,
            // $id
            'main_sidebar',
            // $args
            array(
                'label'			=> __( '', 'basic-shop' ),
                'description'	=> __( 'Select the blog layout', 'basic-shop' ),
                'priority' =>   2, 
                'type'          => 'radio-image',
                'section'		=> 'layout-settings',
                'settings'      => 'main_sidebar',
                'choices'		=> array(
                    'left' 	    => get_template_directory_uri() . '/inc/admin/options/assetts/images/left.png',
                    'right' 	=> get_template_directory_uri() . '/inc/admin/options/assetts/images/right.png'
                )
            )
    ));
//main post content
    $wp_customize->add_setting('main_post_content', array(
        'sanitize_callback' => 'igthemes_sanitize_checkbox',
        'default' => 0,
    ));
    $wp_customize->add_control('main_post_content', array(
        'label' => esc_html__('Display full posts content', 'basic-shop'),
        'description' => esc_html__('', 'basic-shop'),
        'type' => 'checkbox',
        'section' => 'layout-settings',
        'settings' => 'main_post_content',
        'priority'   => 3
    ));
//Images
    $wp_customize->add_setting('images', array(
        'default'    		=> null,
        'sanitize_callback' => null,
    ));
    $wp_customize->add_control( new IGthemes_Heading( $wp_customize, 'images', array(
        'label' => esc_html__('Images', 'basic-shop'),
        'description' => esc_html__('', 'basic-shop'),
        'section' => 'layout-settings',
        'settings' => 'images',
        'priority'   => 5,
    ) ) );
//main featured images
    $wp_customize->add_setting('main_featured_images', array(
        'sanitize_callback' => 'igthemes_sanitize_checkbox',
        'default' => 1,
    ));
    $wp_customize->add_control('main_featured_images', array(
        'label' => esc_html__('Display posts featured images', 'basic-shop'),
        'description' => esc_html__('', 'basic-shop'),
        'type' => 'checkbox',
        'section' => 'layout-settings',
        'settings' => 'main_featured_images',
        'priority'   => 6,
    ));
//Navigation
    $wp_customize->add_setting('navigation', array(
        'default'    		=> null,
        'sanitize_callback' => null,
    ));
    $wp_customize->add_control( new IGthemes_Heading( $wp_customize, 'navigation', array(
        'label' => esc_html__('Navigation', 'basic-shop'),
        'description' => esc_html__('', 'basic-shop'),
        'section' => 'layout-settings',
        'settings' => 'navigation',
        'priority'   => 8,
    ) ) );
//breadcrumb
    $wp_customize->add_setting(
        'breadcrumb',
        array(
            'sanitize_callback' => 'igthemes_sanitize_checkbox',
    ));
    $wp_customize->add_control(
        'breadcrumb',
        array(
            'label'         => esc_html__('Display breadcrumb?', 'basic-shop'),
            'description'   => __( 'Yoast Breadcrumb supported<br>NavXT Breadcrumb supported', 'basic-shop'),
            'priority'      =>  9, 
            'type'          => 'checkbox',
            'section'       => 'layout-settings',
            'settings'      => 'breadcrumb',
    ));
//numeric_pagination
    $wp_customize->add_setting(
        'numeric_pagination',
        array(
            'sanitize_callback' => 'igthemes_sanitize_checkbox',
    ));
    $wp_customize->add_control(
        'numeric_pagination',
        array(
            'label'         => esc_html__('Use numeric pagination ?', 'basic-shop'),
            'description'   => __( 'WP-PageNavi supported', 'basic-shop'),
            'priority'      => 10,
            'type'          => 'checkbox',
            'section'       => 'layout-settings',
            'settings'      => 'numeric_pagination',
    ));
/*****************************************************************
* HEADER SETTINGS
******************************************************************/
//Header Colors
    $wp_customize->add_setting('header-colors', array(
        'default'    		=> null,
        'sanitize_callback' => null,
    ));
    $wp_customize->add_control( new IGthemes_Heading( $wp_customize, 'header-colors', array(
        'label' => esc_html__('Colors', 'basic-shop'),
        'description' => esc_html__('', 'basic-shop'),
        'section' => 'header-settings',
        'settings' => 'header-colors',
        'priority'   => 6,
    ) ) );        
//header color
    $wp_customize->add_setting(
        'header_background_color',
        array(
        
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => $header_background_color,
        'transport' => 'postMessage'

    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'header_background_color',
            array(
                'label' => __('', 'basic-shop'),
                'description' => __('Background color', 'basic-shop'),
                'type' => 'color',
                'section' => 'header-settings',
                'settings' => 'header_background_color',
            )
    ));
//header text color
    $wp_customize->add_setting(
        'header_text_color',
        array(
        
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => $header_text_color,
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'header_text_color',
            array(
                'label' => __('', 'basic-shop'),
                'description' => __('Text color', 'basic-shop'),
                'type' => 'color',
                'section' => 'header-settings',
                'settings' => 'header_text_color',
            )
    ));
//header link normal
    $wp_customize->add_setting(
        'header_link_normal',
        array(
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => $header_link_normal,
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'header_link_normal',
            array(
                'label' => __('', 'basic-shop'),
                'description' => __('Link color', 'basic-shop'),
                'type' => 'color',
                'section' => 'header-settings',
                'settings' => 'header_link_normal',
            )
    ));
//header link hover
    $wp_customize->add_setting(
        'header_link_hover',
        array(
        
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => $header_link_hover,
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'header_link_hover',
            array(
                'label' => __('', 'basic-shop'),
                'description' => __('Link hover color', 'basic-shop'),
                'type' => 'color',
                'section' => 'header-settings',
                'settings' => 'header_link_hover',
            )
    ));
/*****************************************************************
* TYPOGRAPHY SETTINGS
******************************************************************/
    //Fonts Colors
    $wp_customize->add_setting('font-colors', array(
        'default'    		=> null,
        'sanitize_callback' => null,
    ));
    $wp_customize->add_control( new IGthemes_Heading( $wp_customize, 'font-colors', array(
        'label' => esc_html__('Colors', 'basic-shop'),
        'description' => esc_html__('', 'basic-shop'),
        'section' => 'typography-settings',
        'settings' => 'font-colors',
        'priority' => 1
    ) ) );  
    //body text color
    $wp_customize->add_setting(
        'body_text_color',
        array(
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => $body_text_color,
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'body_text_color',
            array(
                'label' => __('', 'basic-shop'),
                'description' => __('Body text color', 'basic-shop'),
                'priority' => 1,
                'type' => 'color',
                'section' => 'typography-settings',
                'settings' => 'body_text_color',
            )
    ));
    //body headings color
    $wp_customize->add_setting(
        'body_headings_color',
        array(
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => $body_headings_color,
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'body_headings_color',
            array(
                'label' => __('', 'basic-shop'),
                'description' => __('Headings color', 'basic-shop'),
                'priority' => 2,
                'type' => 'color',
                'section' => 'typography-settings',
                'settings' => 'body_headings_color',
            )
    ));
    //body link normal
    $wp_customize->add_setting(
        'body_link_normal',
        array(
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => $body_link_normal,
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'body_link_normal',
            array(
                'label' => __('', 'basic-shop'),
                'description' => __('Link color', 'basic-shop'),
                'priority' => 3,
                'type' => 'color',
                'section' => 'typography-settings',
                'settings' => 'body_link_normal',
            )
    ));
    //body link hover
    $wp_customize->add_setting(
        'body_link_hover',
        array(
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => $body_link_hover,
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'body_link_hover',
            array(
                'label' => __('', 'basic-shop'),
                'description' => __('Link hover color', 'basic-shop'),
                'priority' => 4,
                'type' => 'color',
                'section' => 'typography-settings',
                'settings' => 'body_link_hover',
            )
    ));
/*****************************************************************
* BUTTONS SETTINGS
******************************************************************/
    //Main buttons
    $wp_customize->add_setting('button', array(
        'default'    		=> null,
        'sanitize_callback' => null,
    ));
    $wp_customize->add_control( new IGthemes_Heading( $wp_customize, 'button', array(
        'label' => esc_html__('Colors', 'basic-shop'),
        'description' => esc_html__('', 'basic-shop'),
        'section' => 'buttons-settings',
        'settings' => 'button',
        'priority' => 1
    ) ) ); 
    //button background color
    $wp_customize->add_setting(
        'button_background_normal',
        array(
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => $button_background_normal,
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'button_background_normal',
            array(
                'label' => __('', 'basic-shop'),
                'description' => __('Background color', 'basic-shop'),
                'priority' => 1,
                'type' => 'color',
                'section' => 'buttons-settings',
                'settings' => 'button_background_normal',
            )
    ));
    //button background hover
    $wp_customize->add_setting(
        'button_background_hover',
        array(
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => $button_background_hover,
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'button_background_hover',
            array(
                'label' => __('', 'basic-shop'),
                'description' => __('Background hover', 'basic-shop'),
                'priority' => 2,
                'type' => 'color',
                'section' => 'buttons-settings',
                'settings' => 'button_background_hover',
            )
    ));
    //button text color
    $wp_customize->add_setting(
        'button_text_normal',
        array(
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => $button_text_normal,
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'button_text_normal',
            array(
                'label' => __('', 'basic-shop'),
                'description' => __('Text normal', 'basic-shop'),
                'priority' => 3,
                'type' => 'color',
                'section' => 'buttons-settings',
                'settings' => 'button_text_normal',
            )
    ));
    //button text hover
    $wp_customize->add_setting(
        'button_text_hover',
        array(
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => $button_text_hover,
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'button_text_hover',
            array(
                'label' => __('', 'basic-shop'),
                'description' => __('Text hover', 'basic-shop'),
                'priority' => 4,
                'type' => 'color',
                'section' => 'buttons-settings',
                'settings' => 'button_text_hover',
            )
    ));
/*****************************************************************
* FOOTER SETTINGS
******************************************************************/
    //Footer Colors
    $wp_customize->add_setting('footer-colors', array(
        'default'    		=> null,
        'sanitize_callback' => null,
    ));
    $wp_customize->add_control( new IGthemes_Heading( $wp_customize, 'footer-colors', array(
        'label' => esc_html__('Colors', 'basic-shop'),
        'description' => esc_html__('', 'basic-shop'),
        'section' => 'footer-settings',
        'settings' => 'button',
        'priority' => 1
    ) ) );
    //footer background color
    $wp_customize->add_setting(
        'footer_background_color',
        array(
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => $footer_background_color,
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'footer_background_color',
            array(
                'label' => __('', 'basic-shop'),
                'description' => __('Background color', 'basic-shop'),
                'priority' => 1,
                'type' => 'color',
                'section' => 'footer-settings',
                'settings' => 'footer_background_color',
            )
    ));
    //footer text color
    $wp_customize->add_setting(
        'footer_text_color',
        array(
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => $footer_text_color,
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'footer_text_color',
            array(
                'label' => __('', 'basic-shop'),
                'description' => __('Text color', 'basic-shop'),
                'priority' => 2,
                'type' => 'color',
                'section' => 'footer-settings',
                'settings' => 'footer_text_color',
            )
    ));
    //footer headings color
    $wp_customize->add_setting(
        'footer_headings_color',
        array(
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => $footer_headings_color,
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'footer_headings_color',
            array(
                'label' => __('', 'basic-shop'),
                'description' => __('Hedings color', 'basic-shop'),
                'priority' => 3,
                'type' => 'color',
                'section' => 'footer-settings',
                'settings' => 'footer_headings_color',
            )
    ));
    //footer link normal
    $wp_customize->add_setting(
        'footer_link_normal',
        array(
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => $footer_link_normal,
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'footer_link_normal',
            array(
                'label' => __('', 'basic-shop'),
                'description' => __('Link color', 'basic-shop'),
                'priority' => 4,
                'type' => 'color',
                'section' => 'footer-settings',
                'settings' => 'footer_link_normal',
            )
    ));
    //footer link hover
    $wp_customize->add_setting(
        'footer_link_hover',
        array(
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => $footer_link_hover,
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'footer_link_hover',
            array(
                'label' => __('', 'basic-shop'),
                'description' => __('Link hover color', 'basic-shop'),
                'priority' => 5,
                'type' => 'color',
                'section' => 'footer-settings',
                'settings' => 'footer_link_hover',
            )
    ));
/*****************************************************************
* SOCIAL SETTINGS
******************************************************************/
//facebook
    $wp_customize->add_setting('facebook_url', array(
        'sanitize_callback' => 'igthemes_sanitize_url',
        'default' => ''
    ));
    $wp_customize->add_control('facebook_url', array(
        'label' => esc_html__('Facebook url', 'basic-shop'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => 'facebook_url',
    ));
//twitter
    $wp_customize->add_setting('twitter_url', array(
        
        'sanitize_callback' => 'igthemes_sanitize_url',
        'default' => ''
    ));
    $wp_customize->add_control('twitter_url', array(
        'label' => esc_html__('Twitter url', 'basic-shop'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => 'twitter_url',
    ));
//google
    $wp_customize->add_setting('google_url', array(
        
        'sanitize_callback' => 'igthemes_sanitize_url',
        'default' => ''
    ));
    $wp_customize->add_control('google_url', array(
        'label' => esc_html__('Google plus url', 'basic-shop'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => 'google_url',
    ));
//pinterest
    $wp_customize->add_setting('pinterest_url', array(
        
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('pinterest_url', array(
        'label' => esc_html__('Pinterest url', 'basic-shop'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => 'pinterest_url',
    ));
//tumblr
    $wp_customize->add_setting('tumblr_url', array(
        
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('tumblr_url', array(
        'label' => esc_html__('Tumblr url', 'basic-shop'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => 'tumblr_url',
    ));
//instagram
    $wp_customize->add_setting('instagram_url', array(
        
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('instagram_url', array(
        'label' => esc_html__('Instagram url', 'basic-shop'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => 'instagram_url',
    ));
//linkedin
    $wp_customize->add_setting('linkedin_url', array(
        
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('linkedin_url', array(
        'label' => esc_html__('Linkedin url', 'basic-shop'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => 'linkedin_url',
    ));
//dribbble
    $wp_customize->add_setting('dribbble_url', array(
        
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('dribbble_url', array(
        'label' => esc_html__('Dribble url', 'basic-shop'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => 'dribbble_url',
    ));
//youtube
    $wp_customize->add_setting('youtube_url', array(
        
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('youtube_url', array(
        'label' => esc_html__('Youtube url', 'basic-shop'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => 'youtube_url',
    ));
