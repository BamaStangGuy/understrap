<?php
/**
 * Pagination layout.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists ( 'understrap_pagination' ) ) {

	function understrap_pagination( $args = array(), $class = 'pagination' ) {

        if ($GLOBALS['wp_query']->max_num_pages <= 1) return;

		$args = wp_parse_args( $args, array(
			'mid_size'           => 4,
			'prev_next'          => true,
			'prev_text'          => __('&laquo;', 'understrap'),
			'next_text'          => __('&raquo;', 'understrap'),
			'screen_reader_text' => __('Posts navigation', 'understrap'),
			'type'               => 'array',
			'current'            => max( 1, get_query_var('paged') ),
		) );

        $links = paginate_links($args);

        $html .= '<nav aria-label="' . $args['screen_reader_text'] . '">

            <ul class="pagination">';

                    foreach ( $links as $key => $link ) {

                        $html .= '<li class="page-item ';
                        if ( strpos( $link, 'current' ) ) { 
                            $html .= 'active'; 
                        } else { 
                            $html .= ''; 
                        } 
                        $html .= '">';

                            $html .= str_replace( 'page-numbers', 'page-link', $link );

                        $html .= '</li>';

                    }

            $html .= '</ul>

        </nav>';

        return $html;
    }
}
