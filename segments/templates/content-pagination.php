<?php the_posts_pagination( [
    'prev_text'          => esc_html__( 'Previous page', 'segments' ),
    'next_text'          => esc_html__( 'Next page', 'segments' ),
    'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'segments' ) . ' </span>',
] ); ?>