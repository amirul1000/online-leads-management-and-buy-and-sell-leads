<div id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?>>
    <div class="post-content-wrapper">
		<h2 class="post-title">
			<strong><?php echo esc_html__( 'Q', 'segments' ); ?></strong>
			<?php the_title(); ?>			
		</h2>
        
		<div class="post-content">
			<div class="post-content-answer-sign">
				<?php echo esc_html__( 'A', 'segments' ); ?>					
			</div><!-- /.post-content-answer-sign -->

			<div class="post-content-inner">
	    		<?php the_content(); ?>
	    	</div><!-- /.post-content-inner -->
	    </div><!-- /.post-content -->
    </div><!-- /.post-content-wrapper -->

</div>
