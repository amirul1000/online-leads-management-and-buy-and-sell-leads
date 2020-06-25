<div <?php comment_class( empty( $args['has_children'] ) ? '' : 'comments' ); ?> id="comment-<?php comment_ID() ?>">
    <div class="comment-wrapper">
        <div class="comment-image">
            <?php if ( 0 !== $args['avatar_size']  ) : ?>
                <?php if ( defined( 'WORKFORCE_ACTIVE' ) ): ?>
                    <?php $image_id = get_user_meta( get_current_user_id(), WORKFORCE_USER_PREFIX. 'general_image_id', true ); ?>

                    <?php if ( ! empty( $image_id ) ) : ?>
                        <?php echo wp_get_attachment_image( $image_id );?>
                    <?php else : ?>
                        <?php echo get_avatar( $comment, $args['avatar_size'] ); ?>    
                    <?php endif; ?>
                <?php else : ?>
                    <?php echo get_avatar( $comment, $args['avatar_size'] ); ?>
                <?php endif; ?>
            <?php endif; ?>
        </div><!-- /.comment-image -->

        <div class="comment-inner">
            <div class="comment-header">
                <h2><?php comment_author(); ?></h2>
                
                <div class="comment-meta">
                    <span class="comment-date"><?php echo get_comment_date(); ?></span>

                    <?php comment_reply_link( array_merge( $args, [
    					'add_below'     => 'comment',
    					'depth'         => $depth,
    					'reply_text'    => esc_html__( 'Reply', 'segments' ),
    					'max_depth'     => $args['max_depth'],
    	            ] ) ); ?>
                </div><!-- /.comment-meta -->
            </div><!-- /.comment-header -->

            <div class="comment-content-wrapper">
                <div class="comment-content">
                    <?php comment_text(); ?>
                </div><!-- /.comment-content -->
            </div><!-- /.comment-content-wrapper -->

            <?php if ( '0' == $comment->comment_approved ) : ?>
                <em class="comment-awaiting-moderation"><?php echo esc_html__( 'Your comment is awaiting moderation.', 'segments' ); ?></em>
                <br />
            <?php endif; ?>
        </div><!-- /.comment-content -->
    </div><!-- /.comment -->