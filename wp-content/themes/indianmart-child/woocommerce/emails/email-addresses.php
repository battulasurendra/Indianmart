<?php
/**
 * Email Addresses
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-addresses.php.
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
 * @version     3.2.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<tr>
    <td align="center" width="470px" style="padding: 10px 0 5px 0;">
        <table width="440" border="0" align="center" cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th style="font-family: 'Open Sans', sans-serif;font-size: 14px;line-height:28px;text-transform: uppercase;color: #353535;font-weight: 400;" align="left" width="220px">
                Billing Info
            </th>
            <th style="font-family: 'Open Sans', sans-serif;font-size: 14px;line-height:28px;text-transform: uppercase;color: #353535;font-weight: 400;" align="right" width="220px">
                 Shipping Info
            </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td style="font-family: 'Open Sans', sans-serif;font-size: 12px;line-height:20px;text-transform: capitalize;color: #808285;" align="left" width="220px" valign="top">
                <address style="font-family: 'Open Sans', sans-serif;font-size: 12px;line-height:20px;text-transform: capitalize;color: #808285;font-style: normal;">
                    <?php echo ( $address = $order->get_formatted_billing_address() ) ? $address : __( 'N/A', 'woocommerce' ); ?>
                    <?php if ( $order->get_billing_phone() ) : ?>
                        <br/><?php echo esc_html( $order->get_billing_phone() ); ?>
                    <?php endif; ?>
                    <?php if ( $order->get_billing_email() ): ?>
                        <br>
                        <?php echo esc_html( $order->get_billing_email() ); ?>
                    <?php endif; ?>
                </address>
            </td>
            <td style="font-family: 'Open Sans', sans-serif;font-size: 12px;line-height:20px;text-transform: capitalize;color: #808285;" align="right" width="220px" valign="top">
                <address style="font-family: 'Open Sans', sans-serif;font-size: 12px;line-height:20px;text-transform: capitalize;color: #808285;font-style: normal;">                    
                    <?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() && ( $shipping = $order->get_formatted_shipping_address() ) ) : ?>
                        <?php echo $shipping; ?>
                    <?php else: ?>
                        <?php echo ( $address = $order->get_formatted_billing_address() ) ? $address : __( 'N/A', 'woocommerce' ); ?>
                        <?php if ( $order->get_billing_phone() ) : ?>
                            <br/><?php echo esc_html( $order->get_billing_phone() ); ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </address>
            </td>
        </tr>
        </tbody>
        </table>
    </td>
</tr>
<tr>
    <td align="center" width="470px">
        <img style="display:block; border:none; outline:none; text-decoration:none;-ms-interpolation-mode:bicubic; color:#eeeeee;" src="<?php echo get_site_url() .'/wp-content/uploads/2018/02/line_big.png'; ?>" width="450" height="7" alt="---------"/>
    </td>
</tr>
<tr>
    <td style="font-family: 'Open Sans', sans-serif;font-size:14px;line-height:24px;color:#353535;padding: 15px 15px 0 15px" align="center" width="470px">
        If you have questions about your order, you can email us at<br>
        <a href="mailto:support@indianmart.com" style="display: block;color:#ed5b30;text-align:center;text-decoration: none;font-weight: 600;">
            support@indianmart.com
        </a>
    </td>
</tr>