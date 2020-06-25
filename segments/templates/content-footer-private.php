        </div><!-- /.main -->
    </div><!-- /.main-wrapper -->

	<?php if ( is_active_sidebar( 'secondary' ) ) : ?>
	    <div class="secondary-wrapper tse-scrollable">
	    	<div class="tse-content">
	    		<span class="close"></span>
	    		<?php dynamic_sidebar( 'secondary' ); ?>
	    	</div><!-- /.tse-content -->
	    </div><!-- secondary-wrapper -->
	<?php endif; ?>
</div><!-- /.page-wrapper -->