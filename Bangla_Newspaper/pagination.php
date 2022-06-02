<?php 

bootstrap_pagination();

function bootstrap_pagination() {
    global $wp_query;
    if ( $wp_query->max_num_pages <= 1 ) return; 
    $big = 999999999; // need an unlikely integer
    $pages = paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'type'  => 'array',
        'prev_text'          => __( '<span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span>', 'uniapps' ),
        'next_text'          => __( '<span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span>', 'uniapps' ),
    ) );
    if( is_array( $pages ) ) {
        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
        echo '<nav aria-label="Page navigation example"><ul class="pagination pagination-lg justify-content-center mb-0">';
        foreach ( $pages as $page ) { 
            echo  '<li class="page-item">' . $page . '</li>';
    }
       echo '</ul></nav>';
    }
}

?>
