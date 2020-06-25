<div class="page-header-public-wrapper">
    <?php $background = get_theme_mod( 'segments_archive_backgrounds_' . get_post_type(), null );?>
    <?php if ( ! empty( $background ) && is_archive() ) : ?>
        <div class="page-header-public has-image" style="background-image: url('<?php echo esc_attr( $background ); ?>')">
    <?php else : ?>
        <div class="page-header-public">
    <?php endif; ?>
        <div class="container">
            <?php if ( shortcode_exists( 'workforce_breadcrumb' ) ) : ?>
                <?php echo do_shortcode( '[workforce_breadcrumb]' ); ?>
            <?php endif; ?>

            <?php if ( is_search() ) : ?>
                <h1><?php echo esc_html__( 'Search results matching query', 'segments' ); ?></h1>
            <?php elseif ( get_query_var( 'workforce-client-zone' ) ) : ?>
                <h1><?php echo esc_html__( 'Client Zone', 'workforce' ); ?></h1>
            <?php elseif ( is_home() ) : ?>
                <h1><?php echo esc_html__( 'Recent news from', 'segments' ); ?> <?php bloginfo( 'name' ); ?></h1>
            <?php elseif ( is_archive() ) : ?>
                <h1><?php echo post_type_archive_title(); ?></h1>
            <?php else : ?>
                <?php $title = get_the_title(); ?>
                
                <?php if ( ! empty( $title ) ) : ?>
                    <h1><?php the_title(); ?></h1>
                <?php elseif ( is_single() ) : ?>                    
                    <?php global $post; ?>

                    <h1><?php echo date( get_option( 'date_format' ), strtotime( $post->post_date ) ); ?></h1>
                <?php endif; ?>
            <?php endif; ?>
        </div><!-- /.container -->
    </div><!-- /.page-header-public -->
</div><!-- /.page-header-public-wrapper -->