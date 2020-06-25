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
                <?php the_post_thumbnail( 'large' ); ?>
            </div><!-- /.post-thumbnail-single -->
        <?php endif; ?>
    <?php endif; ?>

    <div class="post-content-wrapper">
        <?php if ( ! is_singular() ) : ?>
        <div class="post-meta">
            <div class="post-meta-item post-meta-author">
                <?php the_author_posts_link(); ?>
            </div><!-- /.post-meta-item -->
            ,
            <div class="post-meta-item post-meta-date">
                <?php echo apply_filters( 'the_date', get_the_date(), get_option( 'date_format' ), '', '' ); ?>
            </div><!-- /.post-meta-item -->
        </div><!-- /.post-meta -->
        <?php endif; ?>

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
            <?php $excerpt = get_the_excerpt(); ?>
            
            <?php if ( ! empty( $excerpt ) ) : ?>
        		<div class="post-excerpt">
        	    	<?php the_excerpt(); ?>
        	    </div><!-- /.post-excerpt -->
            <?php endif; ?>
    	<?php endif; ?>
    </div><!-- /.post-content-wrapper -->

    <?php if ( is_single() && has_tag() ) : ?>
        <div class="post-meta-tags clearfix">            
            <ul><?php the_tags( '<li class="tag">', '</li><li class="tag">', '</li>' ); ?></ul>
        </div><!-- /.post-meta -->
    <?php endif; ?>	

    <?php wp_link_pages( [
        'before'      => '<div class="pagination page-links"><span class="page-links-title">' . esc_attr__( 'Post Pages:', 'segments' ) . '</span>',
        'after'       => '</div>',
        'link_before' => '<span class="page-numbers">',
        'link_after'  => '</span>',
    ] ); ?>

	<?php if ( comments_open() || get_comments_number() ) : ?>

		<?php comments_template(); ?>
	<?php endif; ?>	
</div>
