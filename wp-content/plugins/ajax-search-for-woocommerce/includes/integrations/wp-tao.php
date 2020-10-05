<?php

/*
 * Handles integration between WP Tao and Ajax Search for WooCommerce
 * 
 * Requires: WP Tao 1.2 or higher
 * 
 * @see https://pl.wordpress.org/plugins/wp-tao/
 */

class DGWT_WCAS_WP_Tao_integrate {
	/*
	 * Constructor
	 */

	function __construct() {

		// Run only on WP Tao version
		if ( defined( 'WTBP_WPTAO_VERSION' ) && version_compare( WTBP_WPTAO_VERSION, '1.1.9.3', '>' ) ) {

			add_action( 'wp_footer', array( $this, 'print_track_script' ), 99 );

			add_filter( 'wptao_event_search_title', array( $this, 'event_search_title' ), 10, 2 );

			add_filter( 'wptao_event_search_description', array( $this, 'event_search_desc' ), 10, 2 );
		}
	}

	/*
	 * Print tracking sripts
	 * @see http://wptao.org/documentation/developers-guide/javascript-events/
	 */

	public function print_track_script() {

		ob_start();
		?>
		<script type="text/javascript">
			if ( typeof wptaoEvent == 'function' && window.jQuery ) {
				jQuery( function ( $ ) {

					$( document ).on( 'click', '.dgwt-wcas-suggestion', function () {

						var suggestion = $( this ),
							value = suggestion.find( '.dgwt-wcas-st' ).text(),
							tags = [ 'wp', 'Autocomplete search' ],
							meta = { };

						if ( typeof suggestion.data( 'post-id' ) != 'undefined' ) {
							meta.post_id = suggestion.data( 'post-id' );
						}
						if ( typeof suggestion.data( 'taxonomy' ) != 'undefined' ) {
							meta.taxonomy = suggestion.data( 'taxonomy' );
						}
						if ( typeof suggestion.data( 'term-id' ) != 'undefined' ) {
							meta.term_id = suggestion.data( 'term-id' );
						}

						wptaoEvent( 'search', value, tags, meta );

					} );
				} );
			}
		</script>
		<?php

		$js = ob_get_contents();
		ob_end_clean();

		echo dgwt_wcas_minify_js( $js );
	}

	/*
	 * Change event title
	 */

	function event_search_title( $title, $event ) {

		if ( !empty( $event->value ) ) {

			if ( isset( $event->meta[ 'post_id' ] ) && isset( $event->meta[ 'post_id' ] ) ) {

				$post = get_post( absint( $event->meta[ 'post_id' ] ) );

				if ( !empty( $post ) ) {
					$link	 = get_permalink( $post );
					$phrase	 = '<a href="' . $link . '">' . esc_attr( $post->post_title ) . '</a>';
					$title	 = sprintf( __( 'Autosuggestion was clicked: %s', WTBP_WPTAO_DOMAIN ), $phrase );
				}
			}

			// Clicked category or tag suggestion
			if ( isset( $event->meta[ 'taxonomy' ] ) && isset( $event->meta[ 'term_id' ] ) ) {

				$term_id	 = absint( $event->meta[ 'term_id' ] );
				$taxonomny	 = sanitize_title( $event->meta[ 'taxonomy' ] );

				$term = get_term_by( 'id', $term_id, $taxonomny );

				if ( !empty( $term ) ) {
					$link	 = get_term_link( $term, $taxonomy );
					$phrase	 = '<a href="' . $link . '">' . esc_attr( $term->name ) . '</a>';
					$title	 = sprintf( __( 'Autosuggestion was clicked: %s', WTBP_WPTAO_DOMAIN ), $phrase );
				}
			}
		}



		return $title;
	}

	/*
	 * Change event description
	 */

	public function event_search_desc( $description, $event ) {

		if ( !empty( $event->value ) && (isset( $event->meta[ 'post_id' ] ) || isset( $event->meta[ 'taxonomy' ] )) ) {

			$description .= '<span class="wptao-meta-title">' . __( 'Suggestion type:', WTBP_WPTAO_DOMAIN ) . '</span> ';

			if ( isset( $event->meta[ 'post_id' ] ) && isset( $event->meta[ 'post_id' ] ) ) {

				$description .= __( 'single product', WTBP_WPTAO_DOMAIN ) . '<br />';
			}

			// Clicked category or tag suggestion
			if ( isset( $event->meta[ 'taxonomy' ] ) && isset( $event->meta[ 'term_id' ] ) ) {

				$term_id	 = absint( $event->meta[ 'term_id' ] );
				$taxonomny	 = sanitize_title( $event->meta[ 'taxonomy' ] );

				if ( $event->meta[ 'taxonomy' ] === DGWT_WCAS_WOO_PRODUCT_CATEGORY ) {
					$description .= __( 'product category', WTBP_WPTAO_DOMAIN ) . '<br />';
				} else {
					$description .= __( 'product tag', WTBP_WPTAO_DOMAIN ) . '<br />';
				}
			}

			//$description .= '<span class="wptao-meta-title">' . __( 'Generated by:', WTBP_WPTAO_DOMAIN ) . '</span> Ajax Search for WooCommerce plugin';
		}


		return $description;
	}

}

new DGWT_WCAS_WP_Tao_integrate;
