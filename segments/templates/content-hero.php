<div class="hero-wrapper">
    <div class="hero">
        <?php $background_type = get_theme_mod( 'segments_hero_background_type', 'particles' ); ?>
        <?php if ( 'particles' === $background_type ) : ?>
            <div id="hero-particles"></div>
        <?php elseif ( 'image' === $background_type ) : ?>
            <?php $background_image = get_theme_mod( 'segments_hero_background_image', null ); ?>            
            <?php $background_image_path = get_theme_mod( 'segments_hero_background_image_path', null ); ?>
            <?php $background_opacity = get_theme_mod( 'segments_hero_background_opacity', 1 ); ?>
            <?php $background_size = get_theme_mod( 'segments_hero_background_size', 'auto auto' ); ?>

            <?php if ( ! empty( $background_image_path ) ) : ?>
                <?php $background_image = $background_image_path; ?>
            <?php endif; ?>
            <div class="hero-image" style="background-image: url('<?php echo esc_attr( $background_image ); ?>'); background-size: <?php echo esc_attr( $background_size ); ?>; opacity: <?php echo esc_attr( $background_opacity ); ?>;"></div>
        <?php endif; ?>

        <div class="hero-content">
            <div class="hero-content-inner">
                <?php $title = get_theme_mod( 'segments_hero_title', null ); ?>
                <?php $text = get_theme_mod( 'segments_hero_text', null ); ?>

                <?php if ( ! empty( $title ) || ! empty( $text ) ) : ?>
                    <div class="hero-title">
                        <?php if ( ! empty( $title ) ) : ?>
                            <h1><?php echo esc_html( $title ); ?></h1>
                        <?php endif; ?>

                        <?php if ( ! empty( $text ) ) : ?>
                            <p><?php echo esc_html( $text ); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php $below = get_theme_mod( 'segments_hero_below', null ); ?>
                <?php if ( ! empty( $below ) ) : ?>
                    <div class="hero-below">
                        <?php echo wp_kses( $below, wp_kses_allowed_html( 'post' ) ); ?>
                    </div><!-- /.hero-below -->
                <?php endif; ?>
            </div><!-- /.hero-content-inner -->
        </div><!-- /.hero-content -->
    </div><!-- /.hero -->
</div><!-- /.hero-wrapper -->