<div class="page-wrapper">
    <div class="side-wrapper">
        <div class="side">
            <div class="side-inner tse-scrollable">
                <div class="tse-content">
                    <div class="side-branding">
                        <div class="side-title">
                            <?php if ( has_custom_logo() ) : ?>
                                <a href="<?php echo home_url( '/' ); ?>"
                                    <?php the_custom_logo(); ?>
                                </a>
                            <?php else : ?>
                                <a href="<?php echo home_url( '/' ); ?>">
                                    <span class="segments-logo"></span>
                                </a>
                            <?php endif; ?>

                            <?php if ( 'blank' !== get_theme_mod( 'header_textcolor', true ) ) : ?>
                                <?php $dashboard_id = get_theme_mod( 'workforce_pages_dashboard', null ); ?>

                                <?php if ( ! empty( $dashboard_id ) ) : ?>
                                    <?php $url = get_permalink( $dashboard_id ); ?>
                                <?php else : ?>
                                    <?php $url = home_url( '/' )?>
                                <?php endif; ?>

                                <a href="<?php echo esc_attr( $url ); ?>" class="side-name"><?php bloginfo( 'name' ); ?></a><!-- /.site-name -->
                            <?php endif; ?>
                        </div><!-- /.side-title -->
                    </div><!-- /.side-branding -->

                    <?php if ( is_active_sidebar( 'backend' ) ) : ?>
                        <div class="side-content">
                            <?php dynamic_sidebar( 'backend' ); ?>
                        </div><!-- /.side-content -->
                    <?php endif; ?>
                </div><!-- /.tse-content -->
            </div><!-- /.side-inner -->        
            
            <div class="side-toggle">
                <i class="icon-arrow-right"></i>
                <i class="icon-arrow-right"></i>
            </div><!-- /.side-toggle -->
        </div><!-- /.side -->
    </div><!-- /.side-wrapper -->

    <div class="main-wrapper">
        <div class="main">