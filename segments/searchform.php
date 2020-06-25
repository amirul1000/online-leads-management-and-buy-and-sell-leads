<?php $query = ! empty( $_GET['s'] ) ? esc_attr( $_GET['s'] ) : ''; // Input var okay; sanitization okay. ?>

<form method="get" class="form-search site-search" action="<?php echo esc_attr( home_url( '/' ) ); ?>">
    <div class="form-group-addon">
        <div class="form-control-before">
            <i class="icon-search"></i>
        </div><!-- /.form-control-before -->

        <input class="search-query form-control" type="text" name="s" id="s" value="<?php echo esc_attr( $query ); ?>" placeholder="<?php echo esc_attr__( 'Type to search site', 'segments' ); ?>">
    </div><!-- /.form-group-->
</form><!-- /.site-search -->