<?php
/**
 * Order Customer Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-customer.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="woocommerce-customer-details">

	<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() ) : ?>

		<section class="woocommerce-columns--addresses addresses">

			<div class="woocommerce-column--billing-address">

				<?php endif; ?>

                <div class="secHeaderRow text-center">
                    <h2 class="secHeader inline"><?php _e( 'Billing address', 'woocommerce' ); ?></h2>
                    <i class="sprite sprite-checkoutIcon4"></i>
                </div>

				<address>
					<?php
                        $new_address = ( $address = $order->get_formatted_billing_address() ) ? $address : __( 'N/A', 'woocommerce' );
                        if($new_address != 'N/A'){
                            $new_address = explode('<br/>',$new_address);
                            echo '<b>'. array_shift($new_address) .'</b>';
                            echo implode( ', ', $new_address );
                        }
                    ?>
                    <div class="clear"></div>
					<?php if ( $order->get_billing_phone() ) : ?>
						<div class="woocommerce-customer-phone inline">
                            <?php echo esc_html( $order->get_billing_phone() ); ?>
                        </div>
					<?php endif; ?>
					<?php if ( $order->get_billing_email() ) : ?>
						<div class="woocommerce-customer-email inline">
                            <?php echo esc_html( $order->get_billing_email() ); ?>
                        </div>
					<?php endif; ?>
				</address>

				<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() ) : ?>

			</div><!-- /.col-1 -->

			<div class="woocommerce-column--shipping-address">

                <div class="secHeaderRow text-center">
                    <h2 class="secHeader inline"><?php _e( 'Shipping address', 'woocommerce' ); ?></h2>
                    <i class="sprite sprite-checkoutIcon4"></i>
                </div>

				<address>
					<?php
                    $new_address = ( $address = $order->get_formatted_shipping_address() ) ? $address : __( 'N/A', 'woocommerce' );
                        if($new_address != 'N/A'){
                            $new_address = explode('<br/>',$new_address);
                            echo '<b>'. array_shift($new_address) .'</b>';
                            echo implode( ', ', $new_address );
                        }
                    ?>
				</address>

			</div><!-- /.col-2 -->

		</section><!-- /.col2-set -->

	<?php endif; ?>

</section>
