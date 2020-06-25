<?php
/**
 * Template name: Form
 */

get_header( 'empty' ); ?>

<div class="return-back">
    <a href="<?php echo home_url( '/' ); ?>">
        <i class="icon-arrow-backward"></i> <span><?php echo esc_html__( 'Return back', 'segments' ); ?></span>
    </a>
</div><!-- /.return-back -->

<div class="form-wrapper">
    <div class="form-inner">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <h1><?php the_title(); ?></h1>

                <?php if ( shortcode_exists( 'workforce_messages' ) ) : ?>
                    <?php echo do_shortcode( '[workforce_messages]' ); ?>
                <?php endif; ?>
                <?php the_content(); ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div><!-- /.form-inner -->
</div><!-- /.form-wrapper -->

<?php get_footer( 'empty' ); ?>
