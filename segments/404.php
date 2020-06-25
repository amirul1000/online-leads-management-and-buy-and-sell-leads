<?php get_header(); ?>

<div class="page-not-found">
    <h1><?php echo esc_html__( 'Oops! 404, page not found.', 'segments' ); ?></h1>
    <a href="<?php echo home_url( '/' ); ?>" class="btn btn-secondary"><?php echo esc_html__( 'Head Back Home', 'segments' ); ?></a>
</div><!-- /.page-not-found -->

<?php get_footer(); ?>