	    </div><!-- /.container -->
	</div><!-- /.main-wrapper -->

    <div class="footer-wrapper">
        <div class="container">
            <div class="footer">
                <?php if ( is_active_sidebar( 'footer-top-first' ) || is_active_sidebar( 'footer-top-second' ) || is_active_sidebar( 'footer-top-third' ) ) : ?>
                    <div class="footer-top">
                        <?php if ( is_active_sidebar( 'footer-top-first' ) ) : ?>
                            <div class="footer-top-first">
                                <?php dynamic_sidebar( 'footer-top-first' ); ?>
                            </div><!-- /.footer-top-first -->
                        <?php endif; ?>

                        <?php if ( is_active_sidebar( 'footer-top-second' ) ) : ?>
                            <div class="footer-top-second">
                                <?php dynamic_sidebar( 'footer-top-second' ); ?>
                            </div><!-- /.footer-top-second -->
                        <?php endif; ?>

                        <?php if ( is_active_sidebar( 'footer-top-third' ) ) : ?>
                            <div class="footer-top-third">
                                <?php dynamic_sidebar( 'footer-top-third' ); ?>
                            </div><!-- /.footer-top-third -->
                        <?php endif; ?>

                        <?php if ( is_active_sidebar( 'footer-top-fourth' ) ) : ?>
                            <div class="footer-top-fourth">
                                <?php dynamic_sidebar( 'footer-top-fourth' ); ?>
                            </div><!-- /.footer-top-third -->
                        <?php endif; ?>
                    </div><!-- /.footer-top -->
                <?php endif; ?>

                <?php if ( is_active_sidebar( 'footer-bottom-first' ) || is_active_sidebar( 'footer-bottom-second' ) ) : ?>
                    <div class="footer-bottom">
                        <?php if ( is_active_sidebar( 'footer-bottom-first' ) ) : ?>
                            <div class="footer-bottom-first">
                                <?php dynamic_sidebar( 'footer-bottom-first' ); ?>
                            </div><!-- /.footer-bottom-first -->
                        <?php endif; ?>

                        <?php if ( is_active_sidebar( 'footer-bottom-second' ) ) : ?>
                            <div class="footer-bottom-second">
                                <?php dynamic_sidebar( 'footer-bottom-second' ); ?>
                            </div><!-- /.footer-bottom-second -->
                        <?php endif; ?>
                    </div><!-- /.footer-bottom -->
                <?php endif; ?>
            </div><!-- /.footer -->
        </div><!-- /.container -->
    </div><!-- /.footer-wrapper -->
</div><!-- /.page-wrapper -->