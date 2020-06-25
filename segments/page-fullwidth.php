<?php
/**
 * Template name: Fullwidth
 */

get_header(); ?>

<div id="primary" class="content-area">
    <?php do_action( 'workforce_content_loop_before' );?>

    <main id="main" class="site-main">
        <?php if ( have_posts() ) : ?>
            <div class="main-inner">
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'templates/content', get_post_type() ); ?>
                <?php endwhile; ?>

                <?php get_template_part( 'templates/content', 'pagination' ); ?>
            </div><!-- /.main-inner -->
        <?php endif; ?>
    </main><!-- .site-main -->

    <?php do_action( 'workforce_content_loop_after' );?>
</div><!-- .content-area -->

<?php get_footer(); ?>
