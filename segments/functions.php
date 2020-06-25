<?php

/**
 * Libraries
 */
require_once get_template_directory() . '/assets/libraries/class-tgm-plugin-activation.php';

/**
 * Register fonts
 *
 * Translators: If there are characters in your language that are not supported
 * by chosen font(s), translate this to 'off'. Do not translate into your own language.
 *
 * @see https://gist.github.com/kailoon/e2dc2a04a8bd5034682c
 * @return string
 */
function segments_fonts() {
    $font_url = '';

    if ( 'off' !== _x( 'on', 'Google font: on or off', 'segments' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Roboto:400,500,600,700&subset=latin,latin-ext' ), '//fonts.googleapis.com/css' );
    }
    return $font_url;
}


/**
 * Additional after theme setup functions
 *
 * @see after_setup_theme
 * @return void
 */
function segments_after_theme_setup() {
    load_theme_textdomain( 'segments', get_template_directory() . '/languages' );

    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'menus' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-header' );
    add_theme_support( 'custom-background' );

    if ( ! isset( $content_width ) ) {
        $content_width = 1200;   
    }
}
add_action( 'after_setup_theme', 'segments_after_theme_setup' );

/**
 * Register menus
 *
 * @see init
 * @return void
 */
function segments_menu() {
    register_nav_menu( 'primary', esc_html__( 'Primary', 'segments' ) );
    register_nav_menu( 'social', esc_html__( 'Social', 'segments' ) );
    register_nav_menu( 'authenticated', esc_html__( 'Authenticated', 'segments' ) );
}
add_action( 'init', 'segments_menu' );

/**
 * Custom widget areas
 *
 * @hook widgets_init
 * @return void
 */
function segments_sidebars() {
    $sidebars = [
        'sidebar-1' 			=> esc_html__( 'Primary', 'segments' ),
        'header-top-left'       => esc_html__( 'Header Top Left', 'segments' ),
        'header-top-right'      => esc_html__( 'Header Top Right', 'segments' ),
        'backend' 			    => esc_html__( 'Backend', 'segments' ),
        'secondary'             => esc_html__( 'Secondary', 'segments' ),
        'footer-top-first' 	    => esc_html__( 'Footer Top First', 'segments' ),
        'footer-top-second' 	=> esc_html__( 'Footer Top Second', 'segments' ),
        'footer-top-third' 	    => esc_html__( 'Footer Top Third', 'segments' ),
        'footer-top-fourth' 	=> esc_html__( 'Footer Top Fourth', 'segments' ),
        'footer-bottom-first' 	=> esc_html__( 'Footer Bottom First', 'segments' ),
        'footer-bottom-second' 	=> esc_html__( 'Footer Bottom Second', 'segments' ),
    ];

    foreach ( $sidebars as $key => $value ) {
        register_sidebar( [
            'name'          => $value,
            'id'            => $key,            
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
        ] );
    }
}
add_action( 'widgets_init', 'segments_sidebars' );

/**
 * Enqueue styles and scripts
 *
 * @see wp_enqueue_scripts
 * @return void
 */
function segments_enqueue() {
    wp_enqueue_style( 'font-segments', get_template_directory_uri() . '/assets/fonts/segments/style.css' );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/fonts/font-awesome/css/font-awesome.min.css' );
    wp_enqueue_style( 'segments-fonts', segments_fonts(), [], '1.0.0' );
    wp_enqueue_style( 'jquery-ui-datepicker-style' , get_template_directory_uri() . '/assets/css/jquery-ui.css' );
    wp_enqueue_style( 'tooltipster' , get_template_directory_uri() . '/assets/css/tooltipster.bundle.min.css' );
    wp_enqueue_style( 'trackpad-scroll-emulator' , get_template_directory_uri() . '/assets/css/trackpad-scroll-emulator.css' );

    $name = get_theme_mod( 'segments_general_style', 'segments.css' );
    $style = get_template_directory_uri() . '/assets/css/' . $name; 

    wp_enqueue_style( 'segments', $style );  
    wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/style.css' );

    wp_enqueue_script( 'jquery-cookie', get_template_directory_uri() . '/assets/js/cookie.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'tooltipster', get_template_directory_uri() . '/assets/js/tooltipster.bundle.min.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'trackpad-scroll-emulator', get_template_directory_uri() . '/assets/js/jquery.trackpad-scroll-emulator.min.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'particles', get_template_directory_uri() . '/assets/js/particles.min.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'segments', get_template_directory_uri() . '/assets/js/segments.js', [ 'jquery', 'jquery-cookie', 'tooltipster' ], false, true );

    add_filter( 'cmb2_enqueue_css', '__return_false' );

    if ( is_singular() ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'segments_enqueue' );

/**
 * Custom body classes
 *
 * @param $classes
 * @return array
 */
function segments_body_classes( $classes ) {
    if ( segments_is_private() ) {
        $classes[] = 'private';
    } else {
        $classes[] = 'public';
    }

    if ( is_active_sidebar( 'sidebar-1' ) ) {
        $classes[] = 'has-sidebar';
    }

    if ( ! empty( $_COOKIE['side'] ) && 'yes' === $_COOKIE['side' ]) {
        $classes[] = 'side-xs';
    }

    return $classes;
}
add_filter( 'body_class', 'segments_body_classes' );

/**
 * Disable unnecessary CSS margins
 *
 * @see get_header
 * @return void
 */
function segments_disable_admin_bar_top_margin() {
    remove_action( 'wp_head', '_admin_bar_bump_cb' );
}
add_action( 'get_header', 'segments_disable_admin_bar_top_margin' );

/**
 * Remove 'Archives:' from post type archive title
 *
 * @see get_the_archive_title()
 * @param string $title
 * @return string
 */
function segments_update_archive_title( $title ) {
    if ( is_post_type_archive() ) {
        return post_type_archive_title( '', false );
    }

    return $title;
}
add_filter( 'get_the_archive_title', 'segments_update_archive_title' );

/**
 * Customizations
 *
 * @filter customize_register
 * @param WP_Customize_Manager $wp_customize
 * @return void
 */
function segments_customizations( $wp_customize ) {
    $wp_customize->add_section( 'segments_general', [ 'title' => esc_html__( 'Segments General', 'segments' ), 'priority' => 0 ] );
    
    // Logo light version
    $wp_customize->add_setting( 'custom_logo_light', array( 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'custom_logo_light', [
        'label'         => esc_attr__( 'Logo Light', 'segments' ),
        'section'       => 'title_tagline',
        'settings'      => 'custom_logo_light',
        'description'   => esc_attr__( 'Light version displayed on the dark background.', 'segments' ),
        'priority'      => 40,
    ] ) );

    // Style.
    $wp_customize->add_setting( 'segments_general_style', [
        'default'           => 'segments.css',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ] );

    $wp_customize->add_control( 'segments_general_style', [
        'label'             => esc_html__( 'Style', 'segments' ),
        'section'           => 'segments_general',
        'settings'          => 'segments_general_style',
        'type'              => 'select',
        'choices'           => [
            'segments.css'                          => esc_html__( 'Default', 'segments' ),
            'segments-black-blue.css'               => esc_html__( 'Black / Blue', 'segments' ),
            'segments-black-green.css'              => esc_html__( 'Black / Green', 'segments' ),
            'segments-black-magenta.css'            => esc_html__( 'Black / Magenta', 'segments' ),
            'segments-brown-cyan.css'               => esc_html__( 'Brown / Cyan', 'segments' ),
            'segments-cool-grey-dark-orange.css'    => esc_html__( 'Cool Grey / Dark Orange', 'segments' ),
            'segments-cool-grey-magenta.css'        => esc_html__( 'Cool Grey / Magenta', 'segments' ),
            'segments-dark-brown-red.css'           => esc_html__( 'Dark Brown / Red', 'segments' ),
        ]
    ] );    

    // Sticky header
    $wp_customize->add_setting( 'segments_general_header_sticky', [
        'default'           => null,
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ] );

    $wp_customize->add_control( 'segments_general_header_sticky', [
        'type'          => 'checkbox',
        'label'         => esc_attr__( 'Sticky Header', 'segments' ),
        'section'       => 'segments_general',
        'settings'      => 'segments_general_header_sticky',
    ] );

    // Hero
    $wp_customize->add_section( 'segments_hero', [ 'title' => esc_html__( 'Segments Hero', 'segments' ), 'priority' => 0 ] );

    // Background Type
    $wp_customize->add_setting( 'segments_hero_background_type', [ 'sanitize_callback' => 'sanitize_text_field', 'default' => 'particles' ] );
    $wp_customize->add_control( 'segments_hero_background_type', [
        'label'                 => esc_html__( 'Background Type', 'segments' ),
        'type'                  => 'select',
        'section'               => 'segments_hero',
        'settings'              => 'segments_hero_background_type',
        'choices'               => [
            'particles'         => esc_html__( 'Particles', 'segments' ),
            'image'             => esc_html__( 'Image', 'segments' ),
        ]
    ] );

    // Background Image Path
    $wp_customize->add_setting( 'segments_hero_background_image_path', [ 'sanitize_callback' => 'sanitize_text_field' ] );
    $wp_customize->add_control( 'segments_hero_background_image_path', [
        'label'                 => esc_html__( 'Background Image Path', 'segments' ),
        'type'                  => 'text',
        'section'               => 'segments_hero',
        'settings'              => 'segments_hero_background_image_path',
    ] );

    // Background Image
    $wp_customize->add_setting( 'segments_hero_background_image', [ 'sanitize_callback' => 'sanitize_text_field' ] );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'segments_hero_background_image', [
        'label'         => esc_html__( 'Background Image', 'segments' ),
        'section'       => 'segments_hero',
        'settings'      => 'segments_hero_background_image',
    ] ) );  

    // Background Opacity
    $wp_customize->add_setting( 'segments_hero_background_opacity', [ 'sanitize_callback' => 'sanitize_text_field' ] );
    $wp_customize->add_control( 'segments_hero_background_opacity', [
        'label'                 => esc_html__( 'Background Opacity', 'segments' ),
        'type'                  => 'text',
        'section'               => 'segments_hero',
        'settings'              => 'segments_hero_background_opacity',
    ] );

    // Background Opacity
    $wp_customize->add_setting( 'segments_hero_background_size', [ 'sanitize_callback' => 'sanitize_text_field' ] );
    $wp_customize->add_control( 'segments_hero_background_size', [
        'label'                 => esc_html__( 'Background Size', 'segments' ),
        'type'                  => 'text',
        'section'               => 'segments_hero',
        'settings'              => 'segments_hero_background_size',
    ] );

    // Title
    $wp_customize->add_setting( 'segments_hero_title', [ 'sanitize_callback' => 'sanitize_text_field' ] );
    $wp_customize->add_control( 'segments_hero_title', [
        'label'                 => esc_html__( 'Title', 'segments' ),
        'type'                  => 'text',
        'section'               => 'segments_hero',
        'settings'              => 'segments_hero_title',
    ] );

    // Text
    $wp_customize->add_setting( 'segments_hero_text', [ 'sanitize_callback' => 'sanitize_text_field' ] );
    $wp_customize->add_control( 'segments_hero_text', [
        'label'                 => esc_html__( 'Text', 'segments' ),
        'type'                  => 'textarea',
        'section'               => 'segments_hero',
        'settings'              => 'segments_hero_text',
    ] );

    // Below
    $wp_customize->add_setting( 'segments_hero_below', [ 'sanitize_callback' => 'wp_kses_post' ] );
    $wp_customize->add_control( 'segments_hero_below', [
        'label'                 => esc_html__( 'Below', 'segments' ),
        'type'                  => 'textarea',
        'section'               => 'segments_hero',
        'settings'              => 'segments_hero_below',
    ] );

    // Demo
    $wp_customize->add_section( 'segments_demo', [ 'title' => esc_html__( 'Segments Demo', 'segments' ), 'priority' => 0 ] );

    // Login
    $wp_customize->add_setting( 'segments_demo_login', [ 'sanitize_callback' => 'sanitize_text_field' ] );
    $wp_customize->add_control( 'segments_demo_login', [
        'label'                 => esc_html__( 'Demo Login', 'segments' ),
        'type'                  => 'text',
        'section'               => 'segments_demo',
        'settings'              => 'segments_demo_login',
    ] );

    // Password
    $wp_customize->add_setting( 'segments_demo_password', [ 'sanitize_callback' => 'sanitize_text_field' ] );
    $wp_customize->add_control( 'segments_demo_password', [
        'label'                 => esc_html__( 'Demo Password', 'segments' ),
        'type'                  => 'text',
        'section'               => 'segments_demo',
        'settings'              => 'segments_demo_password',
    ] );

    // Login
    $wp_customize->add_setting( 'segments_demo_client_login', [ 'sanitize_callback' => 'sanitize_text_field' ] );
    $wp_customize->add_control( 'segments_demo_client_login', [
        'label'                 => esc_html__( 'Client Login', 'segments' ),
        'type'                  => 'text',
        'section'               => 'segments_demo',
        'settings'              => 'segments_demo_client_login',
    ] );

    // Password
    $wp_customize->add_setting( 'segments_demo_client_password', [ 'sanitize_callback' => 'sanitize_text_field' ] );
    $wp_customize->add_control( 'segments_demo_client_password', [
        'label'                 => esc_html__( 'Client Password', 'segments' ),
        'type'                  => 'text',
        'section'               => 'segments_demo',
        'settings'              => 'segments_demo_client_password',
    ] );

    $wp_customize->add_section( 'segments_archive_backgrounds', [ 'title' => esc_html__( 'Segments Archive Backgrounds', 'segments' ), 'priority' => 0 ] );

    $post_types = get_post_types( [
        'public' => true,
    ] );

    if ( ! empty( $post_types ) ) {
        foreach( $post_types as $post_type ) {
            $post_type_obj = get_post_type_object( $post_type );                   

            $wp_customize->add_setting( 'segments_archive_backgrounds_' . $post_type, [ 'sanitize_callback' => 'sanitize_text_field' ] );
            $wp_customize->add_control( 'segments_archive_backgrounds_' . $post_type, [
                'label'                 => $post_type_obj->labels->singular_name,
                'type'                  => 'text',
                'section'               => 'segments_archive_backgrounds',
                'settings'              => 'segments_archive_backgrounds_' . $post_type,
            ] );            
        }
    }    
}
add_action( 'customize_register', 'segments_customizations' );

/**
 * Custom excerpt length
 *
 * @see excerpt_length
 * @param int $length String length.
 * @return int
 */
function segments_excerpt_length( $length ) {
    global $post;

    if ( 'post' === $post->post_type ) {
        return 50;
    } elseif ( 'service' === $post->post_type ) {
        return 20;
    }

    return $length;
}
add_filter( 'excerpt_length', 'segments_excerpt_length' );

/**
 * Comments template
 *
 * @param string $comment Comment message.
 * @param array  $args Arguments.
 * @param int    $depth Depth.
 * @return void
 */
function segments_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    extract( $args, EXTR_SKIP );
    include get_template_directory() . '/templates/content-comment.php';
}


/**
 * Custom read more
 *
 * @see excerpt_more
 * @param string $more Read more string.
 * @return string
 */
function segments_excerpt_more( $more ) {
    return sprintf( '... <a href="%s" class="read-more">%s <i class="icon-arrow-right"></i></a>', get_the_permalink(), esc_html__( 'Read more', 'segments' ) );
}
add_filter( 'excerpt_more', 'segments_excerpt_more' );

/**
 * Defines custom colors
 *
 * @link https://material.google.com/style/color.html#color-color-palette
 * @param $colors
 * @return array
 */
function segments_monogram_colors( $colors ) {
    $colors_new = [ '#F44336', '#E91E63', '#9C27B0', '#673AB7', '#3F51B5', '#2196F3', '#03A9F4', '#00BCD4', '#009688', '#4CAF50', '#8BC34A', '#FFAB00', '#FF6D00', '#FF5722', '#607D8B' ];
    return array_merge( $colors, $colors_new );
}
add_filter( 'workforce_monogram_colors', 'segments_monogram_colors' );

/**
 * Display user information in page header
 *
 * @return void
 */
function segments_page_header_after() {
    get_template_part( 'templates/content', 'user' );
}
add_filter( 'workforce_page_header_after', 'segments_page_header_after' );

/**
 * Login demo user by one click
 *
 * @see init
 * @return void
 */
function segments_login_demo_user() {
    if ( empty( $_GET['login-demo-user'] ) ) {
        return;
    }

    $login = get_theme_mod( 'segments_demo_login', null );
    $password = get_theme_mod( 'segments_demo_password', null );
    $dashboard = get_theme_mod( 'workforce_pages_dashboard', null );

    if ( is_user_logged_in() ) {
        wp_logout();
    }

    if ( ! empty( $login ) && ! empty( $password ) && defined( 'WORKFORCE_ACTIVE' ) ) {
        Workforce\Controller\UserController::login_user( $login, $password );
    }

    if ( is_user_logged_in() && ! empty( $dashboard ) ) {
        wp_redirect( get_permalink( $dashboard ) );
        exit();
    }
}
add_action( 'init', 'segments_login_demo_user' );

/**
 * Login client user by one click
 *
 * @see init
 * @return void
 */
function segments_login_client_user() {
    if ( empty( $_GET['login-client-user'] ) ) {
        return;
    }

    $login = get_theme_mod( 'segments_demo_client_login', null );
    $password = get_theme_mod( 'segments_demo_client_password', null );

    if ( is_user_logged_in() ) {
        wp_logout();
    }

    if ( ! empty( $login ) && ! empty( $password ) && defined( 'WORKFORCE_ACTIVE' ) ) {
        Workforce\Controller\UserController::login_user( $login, $password );
    }
}
add_action( 'init', 'segments_login_client_user' );

/**
 * Display demo user links
 */
function segments_demo_actions() {    
    echo get_template_part( 'templates/content', 'dashboard-action' );
}
add_action( 'wp_footer', 'segments_demo_actions' );

/**
 * Register plugins
 *
 * @see tgmpa_register
 * @return void
 */
function segments_register_required_plugins() {
    $plugins = [
        [
            'name'                  => esc_html__( 'Workforce', 'segments' ),
            'slug'                  => 'workforce',
            'source'                => segments_get_plugin_package( 'workforce' ),
            'required'              => false,
            'force_deactivation'    => true,
            'is_automatic'          => true,
            'version'               => segments_get_plugin_version( 'workforce' ),
        ],    
        [
            'name'                  => esc_html__( 'Widget Logic', 'segments' ),
            'slug'                  => 'widget-logic',
            'is_automatic'          => true,
            'required'              => false,
        ],        
        [
            'name'                  => esc_html__( 'Contact Form 7', 'segments' ),
            'slug'                  => 'contact-form-7',
            'is_automatic'          => true,
            'required'              => false,
        ],                
        [
            'name'      			=> esc_html__( 'Envato Market', 'segments' ),
            'slug'      			=> 'envato-market',
            'is_automatic'          => true,
            'required'  			=> false,
            'source'                => get_template_directory() . '/plugins/envato-market.zip',
        ],
        [
            'name'                  => esc_html__( 'Segments Core', 'segments' ),
            'slug'                  => 'segments-core',
            'source'                => segments_get_plugin_package( 'segments-core' ),
            'required'              => false,
            'force_deactivation'    => true,
            'is_automatic'          => true,
            'version'               => segments_get_plugin_version( 'segments-core' ),
        ],        
        [
            'name'                  => esc_html__( 'Widget Logic', 'segments' ),
            'slug'                  => 'widget-logic',
            'is_automatic'          => true,
            'required'              => false,
        ],
        [
            'name'                  => esc_html__( 'WordPress Importer', 'segments' ),
            'slug'                  => 'wordpress-importer',
            'is_automatic'          => false,
            'required'              => false,
        ],        
        [
            'name'                  => esc_html__( 'One Click', 'segments' ),
            'slug'                  => 'one-click',
            'source'                => 'https://github.com/wearecodevision/one-click/archive/master.zip',
            'is_automatic'          => false,
            'required'              => false,
        ],     
        [
            'name'                  => esc_html__( 'Page Builder by SiteOrigin', 'segments' ),
            'slug'                  => 'siteorigin-panels',
            'is_automatic'          => true,
            'required'              => false,
        ],           
    ];

    tgmpa( $plugins );
}
add_action( 'tgmpa_register', 'segments_register_required_plugins' );

/**
 * Helper function to check if we are in private zone
 *
 * @return bool
 */
function segments_is_private() {    
    $login_id = get_theme_mod( 'workforce_pages_login', null );
    $is_private = false;

    if ( 'page-private.php' === get_page_template_slug() ) {
        $is_private = true;
    }

    if ( defined( 'WORKFORCE_ACTIVE' ) && \Workforce\Controller\UserController::is_private() ) {
        $is_private = true;
    }
    
    if ( $is_private && ! is_user_logged_in() ) {
        if ( empty( $login_id ) ) {
            wp_redirect( get_permalink( $login_id ) );
            exit();
        }

        auth_redirect();
        exit();
    }

    return $is_private;
}

/**
 * On public pages remove breadcrumb, we will add it by yourself in template
 * 
 * @see init
 * @return void
 */
function segments_remove_breadcrumb() {
    if ( ! segments_is_private() ) {                        
        remove_action( 'workforce_content_loop_before', ['Workforce\Bootstrap', 'show_breadcrumb' ] );
    }
}
add_action( 'wp', 'segments_remove_breadcrumb' );

/**
 * Adds palette options
 *
 * @hook palette_boxes
 * @param array $boxes
 * @return array
 */
function segments_palette( $boxes ) {
    $boxes['colors'] = [
        'class'     => 'colors',
        'fields'    => [
            [
                'label'         => esc_html__( 'Default Color', 'segments' ),
                'class'         => 'color-default',
                'action'        => [
                    'type'      => 'change-href',
                    'selector'  => '#segments-css',
                    'value'     => get_template_directory_uri() . '/assets/css/segments.css',
                ]
            ],              
            [
                'label'         => esc_html__( 'Black / Blue', 'segments' ),
                'class'         => 'color-blue',
                'action'        => [
                    'type'      => 'change-href',
                    'selector'  => '#segments-css',
                    'value'     => get_template_directory_uri() . '/assets/css/segments-black-blue.css',
                ]
            ],  
            [
                'label'         => esc_html__( 'Black / Green', 'segments' ),
                'class'         => 'color-green',
                'action'        => [
                    'type'      => 'change-href',
                    'selector'  => '#segments-css',
                    'value'     => get_template_directory_uri() . '/assets/css/segments-black-green.css',
                ]
            ],      
            [
                'label'         => esc_html__( 'Black / Magenta', 'segments' ),
                'class'         => 'color-magenta',
                'action'        => [
                    'type'      => 'change-href',
                    'selector'  => '#segments-css',
                    'value'     => get_template_directory_uri() . '/assets/css/segments-black-magenta.css',
                ]
            ],      
            [
                'label'         => esc_html__( 'Brown / Cyan', 'segments' ),
                'class'         => 'color-cyan',
                'action'        => [
                    'type'      => 'change-href',
                    'selector'  => '#segments-css',
                    'value'     => get_template_directory_uri() . '/assets/css/segments-brown-cyan.css',
                ]
            ],     
            [
                'label'         => esc_html__( 'Cool Grey / Dark Orange', 'segments' ),
                'class'         => 'color-orange-dark',
                'action'        => [
                    'type'      => 'change-href',
                    'selector'  => '#segments-css',
                    'value'     => get_template_directory_uri() . '/assets/css/segments-cool-grey-dark-orange.css',
                ]
            ],                  
            [
                'label'         => esc_html__( 'Cool grey / Magenta', 'segments' ),
                'class'         => 'color-cool-grey',
                'action'        => [
                    'type'      => 'change-href',
                    'selector'  => '#segments-css',
                    'value'     => get_template_directory_uri() . '/assets/css/segments-cool-grey-magenta.css',
                ]
            ],      
            [
                'label'         => esc_html__( 'Dark brown / Red', 'segments' ),
                'class'         => 'color-red',
                'action'        => [
                    'type'      => 'change-href',
                    'selector'  => '#segments-css',
                    'value'     => get_template_directory_uri() . '/assets/css/segments-dark-brown-red.css',
                ]
            ],                                         
        ],
    ];

    return $boxes;
}
add_filter( 'palette_boxes', 'segments_palette' );

/**
 * Gets plugins version
 *
 * @param string $plugin_slug
 * @return string
 */
function segments_get_plugin_version( $plugin_slug ) {
    $filename = segments_get_plugin_package( $plugin_slug );
    $parts = explode( '/', $filename );
    $filename = $parts[ count( $parts ) - 1 ];

    // Remove ZIP
    $name = substr( $filename, 0, -4 );

    // Get last string path after "-"
    $parts = explode( '-', $name );
    $version = $parts[ count( $parts ) - 1 ];

    // If the last part can be exploded by dot and have 3 items in array
    if ( 3 === count( explode( '.', $version ) ) ) {
        return $version;
    }

    return '0.1.0';
}

/**
 * Gets plugins package filepath
 *
 * @param string $plugin_slug
 * @return string
 */
function segments_get_plugin_package( $plugin_slug ) {
    $prefix = get_template_directory() . '/plugins/';
    $files = glob( $prefix . '*.zip' );

    foreach ( $files as $file ) {
        $parts = explode( '/', $file );
        $filename = $parts[ count( $parts ) - 1];

        if ( substr( $filename, 0, strlen( $plugin_slug ) ) === $plugin_slug ) {
            return $prefix . $filename;
        }
    }
    return $prefix . $plugin_slug . '.zip';
}