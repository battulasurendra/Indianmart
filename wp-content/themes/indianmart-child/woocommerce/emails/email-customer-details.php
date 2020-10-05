<?php
/**
 * Additional Customer Details
 *
 * This is extra customer data which can be filtered by plugins. It outputs below the order item table.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-customer-details.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates/Emails
 * @version 2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<?php if ( ! empty( $fields ) ) : ?>

    <tr>
        <td align="center" width="470px" style="padding: 25px 0 10px 0;">
            <table width="440" border="0" align="center" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th colspan="2" style="font-family: 'Open Sans', sans-serif;font-size: 14px;line-height:28px;text-transform: uppercase;color: #353535;font-weight: 400;" align="left" width="220px">
                        <?php _e( 'Customer details', 'woocommerce' ); ?>
                    </th>
                </tr>
            </thead>
            <tbody>                
        <?php foreach ( $fields as $field ) : ?>
            <tr>
                <td style="font-family: 'Open Sans', sans-serif;font-size: 13px;line-height:28px;text-transform: captilize;color: #353535;" align="left" width="220px">
                    <?php echo wp_kses_post( $field['label'] ); ?>: 
                </td>
                <td style="font-family: 'Open Sans', sans-serif;font-size: 14px;line-height:28px;color: #353535;" align="left" width="220px">
                     <?php echo wp_kses_post( $field['value'] ); ?>
                </td>
            </tr>
        <?php endforeach; ?>
            </tbody>
            </table>
        </td>
    </tr>
<?php endif; ?>
