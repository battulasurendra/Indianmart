<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.2.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_mini_cart' ); ?>

<?php if ( ! WC()->cart->is_empty() ) : ?>
<div class="woocommerce_mini_cart_body">
	<table class="woocommerce-mini-cart cart_list product_list_widget <?php echo esc_attr( $args['list_class'] ); ?>">
        <tbody>
        <?php
            do_action( 'woocommerce_before_mini_cart_contents' );

            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                    $product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
                    $thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                    $product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                    $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                    ?>
                    <tr class="woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
                    <td class="woo_mini_cart_item_image">
                        <?php if ( ! $_product->is_visible() ) : ?>
                            <?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
                        <?php else : ?>
                            <a href="<?php echo esc_url( $product_permalink ); ?>">
                                <?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
                            </a>
                        <?php endif; ?>
                    </td>
                    <td class="woo_mini_cart_item_title">
                        <?php if ( ! $_product->is_visible() ) : ?>
                            <?php 
                                $prod = explode('-', $product_name);
                                echo '<a href="'. esc_url( $product_permalink ) .'">'. $prod[0] .'</a>';
                                echo '<div class="woo_mini_cart_item_details">';

                                if(count($prod)>1){
                                    echo '<div class="woo_mini_cart_item_variant">'. $prod[1] .'</div>';
                                } else {
                                    echo '<div class="woo_mini_cart_item_variant">---</div>';
                                }
                                echo '<div class="woo_mini_cart_item_stock outOfStock">Out of Stock</div>';
                                echo '</div>';
                                echo '<div class="woo_mini_cart_item_price">'. $product_price .'</div>';
                            ?>
                        <?php else : ?>
                            <?php 
                                echo '<a href="'. esc_url( $product_permalink ) .'">'. $product_name .'</a>';
                                echo '<div class="woo_mini_cart_item_details">';
                                
                                $type = wc_get_product( $product_id );
                                if ($type->is_type('variable')) {   
                                    echo '<div class="woo_mini_cart_item_variant">'. get_cart_item_variation_data('', $cart_item) .'</div>';
                                } else {
                                    echo '<div class="woo_mini_cart_item_variant">---</div>';
                                }
                    
                                echo '<div class="woo_mini_cart_item_quantity">QTY : '. $cart_item['quantity'] .'</div>';
                    
                                if(('' != $_product->get_stock_quantity()) && ($_product->get_stock_quantity() < 10)){
                                    echo '<div class="woo_mini_cart_item_stock leftStock">Only '. $_product->get_stock_quantity() .' left</div>';
                                } else {
                                    echo '<div class="woo_mini_cart_item_stock inStock">InStock</div>';
                                }
                                
                                echo '</div>';
                                echo '<div class="woo_mini_cart_item_price">'. $product_price .'</div>';
                            ?>
                        <?php endif; ?>
                    </td>
                    <td class="woo_mini_cart_item_delete_link">
                        <?php
                        echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
							'<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">&times;</a>',
							esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
							__( 'Remove this item', 'woocommerce' ),
							esc_attr( $product_id ),
							esc_attr( $cart_item_key ),
							esc_attr( $_product->get_sku() )
						), $cart_item_key );
                        ?>
                    </td>
                    </tr>
                    <?php
                }
            }

            do_action( 'woocommerce_mini_cart_contents' );
        ?>
        </tbody>
	</table>
</div>

<div class="woocommerce_mini_cart_footer">
        <table class="woocommerce_mini_cart_footer_table">
            <tbody>
                <tr>
                    <td class="td_index"><?php _e( 'Subtotal', 'woocommerce' ); ?>:</td>
                    <td class="td_value"><?php echo WC()->cart->get_cart_subtotal(); ?></td>
                    <td class="td_btn text-right">
                        <div class="btnHolder">
                            <a href="<?php echo wc_get_checkout_url(); ?>" class="btn noarrow">
                                Checkout
                            </a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <!--<p class="woocommerce-mini-cart__total woocommerce_mini_cart_sub_total total">
            <?php /*_e( 'Subtotal', 'woocommerce' );*/ ?>:
            <?php /*echo WC()->cart->get_cart_subtotal();*/ ?>
        </p>
        <p class="woocommerce_mini_cart_tax_total">
            <?php /*_e( 'Tax', 'woocommerce' );*/ ?>:
            <?php /*echo get_woocommerce_currency_symbol().round(WC()->cart->tax_total, 2);*/ ?>
        </p>-->
    <!--<div class="col-xs-6">
        <?php /*do_action( 'woocommerce_widget_shopping_cart_before_buttons' );*/ ?>
        <p class="woocommerce-mini-cart__buttons buttons">
            <?php /*do_action( 'woocommerce_widget_shopping_cart_buttons' );*/ ?>
        </p>
    </div>-->
</div>
<?php else : ?>

    <p class="woocommerce-mini-cart__empty-message"><?php _e( 'Your bag is empty.', 'woocommerce' ); ?></p>

<?php endif; ?>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>
