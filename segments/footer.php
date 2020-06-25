    <?php if ( segments_is_private() ) : ?>
        <?php get_template_part( 'templates/content', 'footer-private' ); ?>
    <?php else : ?>
        <?php get_template_part( 'templates/content', 'footer-public' ); ?>
    <?php endif; ?>

    <?php wp_footer(); ?>
</body>
</html>