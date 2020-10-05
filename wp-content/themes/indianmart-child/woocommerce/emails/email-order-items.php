<?php
/**
 * Email Order Items
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-order-items.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

foreach ( $items as $item_id => $item ) :
	$product = $item->get_product();
	if ( apply_filters( 'woocommerce_order_item_visible', true, $item ) ) {
		?>
        <tr>
            <td style="font-family: 'Open Sans', sans-serif;font-size: 13px;line-height:20px;text-transform: capitalize;color: #808285;padding:15px 10px;" align="left" width="300px">
                <span style="color: #353535;font-weight:600;">
                    <?php echo apply_filters( 'woocommerce_order_item_name', $item->get_name(), $item, false ); ?>
                </span>
                <?php
                    $html    = '';
                    foreach ( $item->get_formatted_meta_data() as $meta_id => $meta ) {
                        $html.= ' '. $meta->value .',';
                    }
                    $html = rtrim($html,',');
                    echo $html;
                ?>
                
                <br>
                
                <?php 
                    // allow other plugins to add additional product information here
                    do_action( 'woocommerce_order_item_meta_start', $item_id, $item, $order, $plain_text );

                    // allow other plugins to add additional product information here
                    do_action( 'woocommerce_order_item_meta_end', $item_id, $item, $order, $plain_text );
        
                    if ( $show_sku && is_object( $product ) && $product->get_sku() ) {
                        echo 'SKU: ' . $product->get_sku() . '';
                    }
                ?>
            </td>
            <td style="font-family: 'Open Sans', sans-serif;font-size: 13px;line-height:20px;text-transform: capitalize;color: #808285;padding:15px 10px;" align="center" width="70px">
                <?php echo apply_filters( 'woocommerce_email_order_item_quantity', $item->get_quantity(), $item ); ?>
            </td>
            <td style="font-family: 'Open Sans', sans-serif;font-size: 13px;line-height:20px;text-transform: capitalize;color: #808285;padding:15px 10px;" align="right" width="100px">
                <?php echo $order->get_formatted_line_subtotal( $item ); ?>
            </td>
        </tr>
		<?php
	}

	if ( $show_purchase_note && is_object( $product ) && ( $purchase_note = $product->get_purchase_note() ) ) : ?>
		<tr>
			<td align="left" colspan="3" style="font-family: 'Open Sans', sans-serif;font-size: 13px;line-height:20px;text-transform: capitalize;color: #808285;padding:15px 10px;" width="470px">
                <?php echo do_shortcode( wp_kses_post( $purchase_note ) ); ?>
            </td>
		</tr>
	<?php endif; ?>

<?php endforeach; ?>
