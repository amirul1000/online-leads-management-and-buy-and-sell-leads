<?php
/**
 * Template name: Login
 */

get_header( 'empty' ); ?>

<div class="split-wrapper">
    <div class="split-content">
    	<div class="split-content-inner">
	        <?php if ( shortcode_exists( 'workforce_account_login' ) ) : ?>
	        	<h1><?php echo esc_html__( 'Welcome Back', 'segments' ); ?></h1>
	        	<?php echo do_shortcode( '[workforce_account_login]' ); ?>
	        <?php endif; ?>
        </div><!-- /.split-content-inner -->
    </div><!-- /.split-content -->

    <div class="split-sidebar">
    	<div class="split-sidebar-inner">
	    	<?php if ( have_posts() ) : ?>
	    		<?php while ( have_posts() ) : the_post(); ?>
	    			<?php the_content(); ?>
	    		<?php endwhile; ?>
	    	<?php endif; ?>
    	</div><!-- /.split-sidebar-inner -->
    </div><!-- /.split-sidebar -->
</div><!-- /.split-wrapper -->

<?php get_footer( 'empty' ); ?>
