<div id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?>>
    <div class="post-content">
    	<?php the_content(); ?>
    </div><!-- /.post-content -->
    
    <div class="post-thumbnail">
        <div class="post-thumbnail-inner" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
       	</div><!-- /.post-thumbnail-inner -->       	       	
    </div><!-- /.post-thumbnail-single -->

    <div class="post-title">
    	<?php the_title(); ?>
    </div><!-- /.post-title -->
</div>
