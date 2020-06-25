<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div class="sidebar">
		<div class="sidebar-inner"> 
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- /.sidebar-inner -->
	</div><!-- /.sidebar -->
<?php endif; ?>