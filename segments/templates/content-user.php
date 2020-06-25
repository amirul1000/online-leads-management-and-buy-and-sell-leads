<?php use Workforce\Type\UserType; ?>

<?php if ( is_active_sidebar( 'secondary' ) ) : ?>
    <div class="header-toggle-secondary">
        <span></span>
        <span></span>
        <span></span>
    </div><!-- /.header-toggle-secondary -->
<?php endif; ?>

<div class="header-user">
    <div class="header-user-avatar">
        <?php $profile_id = get_theme_mod( 'workforce_pages_profile', null ); ?>
        <?php $profile_link = ! empty( $profile_id ) ? get_the_permalink( $profile_id ) : '#'; ?>

        <a href="#">
            <?php $image_id = get_user_meta( get_current_user_id(), WORKFORCE_USER_PREFIX. 'general_image_id', true ); ?>

            <?php if ( ! empty( $image_id ) ) : ?>
                <?php echo wp_get_attachment_image( $image_id );?>
            <?php else : ?>
                <img src="<?php echo get_avatar_url( get_current_user_id() ); ?>"
                     alt="<?php echo UserType::get_name( get_current_user_id(), false ); ?>">
            <?php endif; ?>
        </a>
    </div><!-- /.header-user-avatar -->

    <div class="header-user-name">
        <a href="#">
            <span><?php echo UserType::get_name( get_current_user_id(), false ); ?></span>
        </a>
    </div><!-- /.header-user-name -->

    <?php if ( has_nav_menu( 'authenticated' ) ) : ?>
        <?php wp_nav_menu( [
            'fallback_cb'       => '',
            'theme_location'    => 'authenticated'
        ] ); ?>
    <?php endif; ?>
</div><!-- /.header-user -->