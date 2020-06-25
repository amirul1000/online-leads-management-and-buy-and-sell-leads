<div class="page-wrapper simple">    
    <?php $header_sticky = get_theme_mod( 'segments_general_header_sticky', null ); ?>

    <?php if ( ! empty( $header_sticky ) ) : ?>
        <div class="header-sticky">
            <div class="header-sticky-inner">
                <div class="site-branding">
                    <div class="site-title">
                        <?php $logo_light = get_theme_mod( 'custom_logo_light', null ); ?>
                        <?php if ( ! empty( $logo_light ) ) : ?>
                            <img src="<?php echo $logo_light; ?>" alt="<?php bloginfo( 'name' ); ?>">
                        <?php elseif ( ! has_custom_logo() ) : ?>
                            <a href="<?php echo home_url( '/' ); ?>">
                                <span class="segments-logo"></span>
                            </a>
                        <?php else : ?>
                            <?php the_custom_logo(); ?>
                        <?php endif; ?>
                        
                        <?php if ( 'blank' !== get_theme_mod( 'header_textcolor', true ) ) : ?>
                            <div class="site-name"><?php bloginfo( 'name' ); ?></div><!-- /.site-name -->
                        <?php endif; ?>
                    </div><!-- /.site-title -->
                </div><!-- /.site-branding -->

                <?php if ( has_nav_menu( 'primary' ) ) : ?>
                    <div class="site-navigation">
                        <?php wp_nav_menu( [
                            'fallback_cb'       => '',
                            'theme_location'    => 'primary',
                        ] ); ?>
                    </div><!-- /.site-navigation -->
                <?php endif; ?>
            </div><!-- /.header-sticky-inner -->
        </div><!-- /.header-sticky -->
    <?php endif; ?>

    <?php if ( is_active_sidebar( 'header-top-left' ) || is_active_sidebar( 'header-top-right' ) ) : ?>
        <div class="header-public-top">
            <div class="container">
                <?php if ( is_active_sidebar( 'header-top-left' ) ) : ?>
                    <div class="header-public-top-left">
                        <?php dynamic_sidebar( 'header-top-left'); ?>
                    </div><!-- /.header-public-top-left -->            
                <?php endif; ?>

                <?php if ( is_active_sidebar( 'header-top-right' ) ) : ?>
                    <div class="header-public-top-right">
                        <?php dynamic_sidebar( 'header-top-right'); ?>
                    </div><!-- /.header-public-top-left -->            
                <?php endif; ?>            
            </div><!-- /.container -->
        </div><!-- /.header-public-top -->
    <?php endif; ?>

    <div class="header-public">
        <div class="container">
            <?php if ( has_custom_logo() ) : ?>
                <a href="<?php echo home_url( '/' ); ?>">
                    <?php the_custom_logo(); ?>
                </a>
            <?php else : ?>
                <a href="<?php echo home_url( '/' ); ?>">
                    <span class="segments-logo"></span>
                </a>
            <?php endif; ?>

            <?php if ( 'blank' !== get_theme_mod( 'header_textcolor', true ) ) : ?>
                <a href="<?php echo home_url( '/' ); ?>">
                    <span class="header-public-logo-title"><?php bloginfo( 'name' ); ?></span>
                </a>
            <?php endif; ?>

            <?php wp_nav_menu( [
                'fallback_cb'       => '',
                'theme_location'    => 'social'
            ] ); ?>
            
            <?php if ( has_nav_menu( 'primary' ) ) : ?>
                <div class="header-public-nav">
                    <?php wp_nav_menu( [
                        'fallback_cb'       => '',
                        'theme_location'    => 'primary'
                    ] ); ?>
                </div><!-- /.hero-nav -->

                <div class="header-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div><!-- /.header-toggle -->
            <?php endif; ?>
        </div><!-- /.container -->
    </div><!-- /.header-public -->

    <div class="main-wrapper">
        <div class="container">
            <?php get_template_part( 'templates/content', 'title' ); ?>
