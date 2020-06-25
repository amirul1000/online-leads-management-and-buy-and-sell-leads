<?php 
$dashboard_id = get_theme_mod( 'workforce_pages_dashboard', null ); 
$dashboard_login = get_theme_mod( 'segments_demo_login', null );
$dashboard_password = get_theme_mod( 'segments_demo_password', null );

$client_login = get_theme_mod( 'segments_demo_client_login', null );
$client_password = get_theme_mod( 'segments_demo_client_password', null );
?>

<?php if ( ( ! empty( $dashboard_login ) && ! empty ( $dashboard_password ) ) || ( ! empty( $client_login ) && ! empty( $client_password ) ) ) : ?>	
	<div class="dashboard-actions">    
		<?php if ( ! empty( $dashboard_login ) && ! empty( $dashboard_password ) && ! empty( $dashboard_id ) ) : ?>
			<a href="?login-demo-user=1" class="dashboard-action zone-user">
				<span><?php echo esc_html__( 'User Dashboard', 'segments' ); ?></span>
			</a><!-- /.dashboard-action -->
		<?php endif; ?>

		<?php if ( ! empty( $client_login ) && ! empty( $client_password ) ) : ?>
			<a href="?login-client-user=1" class="dashboard-action zone-client">
				<span><?php echo esc_html__( 'Client Zone', 'segments' ); ?></span>
			</a><!-- /.dashboard-action -->
		<?php endif; ?>
	</div><!-- /.dashboard-actions -->
<?php endif; ?>