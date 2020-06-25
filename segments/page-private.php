<?php
/**
 * Template name: Private
 */
get_header(); ?>

<div class="page-header">
    <?php do_action( 'workforce_page_header_before' ); ?>

    <h1><?php echo the_title(); ?></h1>

    <?php do_action( 'workforce_page_header_after' ); ?>
</div><!-- .page-header -->

<div id="primary" class="content-area">
    <?php do_action( 'workforce_content_loop_before' );?>

    <main id="main" class="site-main">
        <?php if ( have_posts() ) : ?>
            <div class="main-inner">
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'templates/content', 'simple' ); ?>
                <?php endwhile; ?>
            </div><!-- /.main-inner -->
        <?php endif; ?>

        <?php get_template_part( 'templates/content', 'pagination' ); ?>
    </main><!-- .site-main -->

    <?php do_action( 'workforce_content_loop_after' );?>
</div><!-- .content-area -->

<?php get_footer(); ?>
