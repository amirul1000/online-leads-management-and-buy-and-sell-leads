<div id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?>>
    <?php if ( has_post_thumbnail() ) : ?>
        <?php if ( ! is_single() ) : ?>
            <div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail( 'large' ); ?>
                </a>
            </div><!-- /.post-thumbnail -->     
        <?php else : ?>
            <div class="post-thumbnail-single">
                <div class="post-thumbnail-single-inner" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
                </div><!-- /.post-thumbnail-single-inner -->
            </div><!-- /.post-thumbnail-single -->
        <?php endif; ?>
    <?php endif; ?>

    <div class="post-content-wrapper">
    	<?php if ( ! is_singular() ) : ?>
    		<h2 class="post-title">
                <a href="<?php the_permalink(); ?>">
                    <?php $title = get_the_title(); ?>

                    <?php if ( ! empty( $title ) ) : ?>                         
                        <?php echo esc_attr( $title ); ?>
                    <?php else : ?>
                        <?php the_date(); ?>
                    <?php endif; ?>     
                </a>
            </h2>
    	<?php endif; ?>

    	<?php if ( is_singular() ) : ?>
    		<div class="post-content">
    	    	<?php the_content(); ?>
    	    </div><!-- /.post-content -->
    	<?php else : ?>
    		<div class="post-excerpt">
    	    	<?php the_excerpt(); ?>
    	    </div><!-- /.post-excerpt -->
    	<?php endif; ?>
    </div><!-- /.post-content-wrapper -->

	<?php if ( comments_open() || get_comments_number() ) : ?>
		<?php comments_template(); ?>
	<?php endif; ?>	
</div>
