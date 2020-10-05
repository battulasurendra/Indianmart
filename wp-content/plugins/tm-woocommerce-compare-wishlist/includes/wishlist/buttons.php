<?php

// register action hooks

add_action( 'woocommerce_after_shop_loop_item', 'tm_woowishlist_add_button_loop', 12 );

add_action( 'woocommerce_single_product_summary', 'tm_woowishlist_add_button_single', 35 );

/**
 * Renders appropriate button for a loop product.
 *
 * @since 1.0.0
 * @action woocommerce_after_shop_loop_item
 */
function tm_woowishlist_add_button_loop( $args ) {

	if ( 'yes' === get_option( 'tm_woowishlist_show_in_catalog' ) ) {

		tm_woowishlist_add_button( $args );
	}
}

/**
 * Renders appropriate button for a product.
 *
 * @since 1.0.0
 */
function tm_woowishlist_add_button( $args ) {
    
    global $product;
    
	$id      = method_exists( $product, 'get_id' ) ? $product->get_id() : get_the_id();
	
    $id      = tm_wc_compare_wishlist()->get_original_product_id( $id );
	$classes = array( 'button', 'tm-woowishlist-button', 'btn', 'btn-default' );
	$nonce   = wp_create_nonce( 'tm_woowishlist' . $id );

	if ( in_array( $id, tm_woowishlist_get_list() ) ) {
		/*$text      = get_option( 'tm_woowishlist_added_text', __( 'Added to Wishlist', 'tm-wc-compare-wishlist' ) );
		$classes[] = ' in_wishlist';*/
        
		$classes[] = 'tm-woowishlist-remove';
        $text = apply_filters( 'tm_woowishlist_dismiss_icon', '<span class="dashicons dashicons-dismiss"></span>' );

	} else {
		$text = get_option( 'tm_woowishlist_add_text', __( 'Add to wishlist', 'tm-wc-compare-wishlist' ) );
        $text      = '<span class="tm_woowishlist_product_actions_tip"><span class="text">' . esc_html( $text ) . '</span></span>';
	}
    
	$preloader = apply_filters( 'tm_wc_compare_wishlist_button_preloader', '' );

	if( $single = ( is_array( $args ) && isset( $args['single'] ) && $args['single'] ) ) {

		$classes[] = 'tm-woowishlist-button-single';
	}
    
    $text .= '<svg id="wishlist-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" style="enable-background:new 0 0 20 20;" xml:space="preserve"><path d="M19.3,8.6c-1.4,3-8,8.9-9.3,10.1c-1.4-1.2-7.9-7.1-9.3-10.1C0.1,7.3,0,5.7,0.5,4.3c0.4-1.2,1.2-2.1,2.2-2.5c0.7-0.3,1.5-0.5,2.3-0.5c1.8,0,3.4,0.8,4.2,2.1l0.4,0.7C9.7,4.2,9.8,4.3,10,4.3c0.1,0,0.3-0.1,0.3-0.2c0,0,0,0,0-0.1l0.4-0.7c0.8-1.3,2.4-2.1,4.2-2.1c0.8,0,1.6,0.2,2.3,0.5c1,0.5,1.8,1.4,2.2,2.5C20,5.7,19.9,7.3,19.3,8.6z"/></svg>';
    
	$html = sprintf( '<button type="button" class="%s" data-id="%s" data-nonce="%s">%s</button>', implode( ' ', $classes ), $id, $nonce, $text . $preloader );
    
	echo apply_filters( 'tm_woowishlist_button', $html, $classes, $id, $nonce, $text, $preloader );

	if ( in_array( $id, tm_woowishlist_get_list() ) && $single ) {

		echo tm_woowishlist_page_button( array( 'btn-primary', 'alt' ) );
	}
}

/**
 * Renders appropriate button for a single product.
 *
 * @since 1.0.0
 * @action woocommerce_single_product_summary
 */
function tm_woowishlist_add_button_single( $args ) {

	if ( 'yes' === get_option( 'tm_woowishlist_show_in_single' ) ) {

		if( empty( $args ) ) {

			$args = array();
		}
		$args['single'] = true;

		tm_woowishlist_add_button( $args );
	}
}

/**
 * Renders wishlist page button for a product.
 *
 * @since 1.0.0
 */
function tm_woowishlist_page_button( $classes = array() ) {

	$link = tm_woowishlist_get_page_link();

	if( ! $link ) {

		return;
	}
	$classes = array_merge( $classes,  array( 'button', 'tm-woowishlist-page-button', 'btn' ) );
	$text    = get_option( 'tm_woowishlist_page_btn_text', __( 'Go to my wishlist', 'tm-wc-compare-wishlist' ) );
	$html    = sprintf( '<a class="%s" href="%s">%s</a>', implode( ' ', $classes ), $link, $text );

	return apply_filters( 'tm_woowishlist_page_button', $html, $classes, $link, $text );
}