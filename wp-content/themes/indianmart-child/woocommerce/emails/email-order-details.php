<?php
/**
 * Order details table shown in emails.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-order-details.php.
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

$text_align = is_rtl() ? 'right' : 'left';

do_action( 'woocommerce_email_before_order_table', $order, $sent_to_admin, $plain_text, $email ); ?>

<tr>
    <td align="center" width="470px" style="padding: 10px 0 10px 0;">
        <table width="440" border="0" align="center" cellpadding="0" cellspacing="0">
        <tbody>
        <tr>
            <td style="font-family: 'Open Sans', sans-serif;font-size: 14px;line-height:28px;text-transform: uppercase;color: #353535;" align="left" width="220px">

            <?php if ( ! $sent_to_admin ) : ?>
                
                Your Order: <span style="color:#ed5b30;font-weight: 600;">#<?php echo $order->get_order_number(); ?></span>
                
            <?php else : ?>
                
                Order Id: <a style="color:#ed5b30;font-weight: 600;" href="<?php echo esc_url( admin_url( 'post.php?post=' . $order->get_id() . '&action=edit' ) ); ?>"><?php printf( __( 'Order #%s', 'woocommerce' ), $order->get_order_number() ); ?></a>
                
            <?php endif; ?>
                
            </td>
            <td style="font-family: 'Open Sans', sans-serif;font-size: 14px;line-height:28px;text-transform: uppercase;color: #353535;" align="right" width="220px">
                 date: <span style="color:#ed5b30;font-weight: 600;text-transform: capitalize;"><?php printf( '<time datetime="%s">%s</time>', $order->get_date_created()->format( 'c' ), wc_format_datetime( $order->get_date_created(),'d M Y' ) ); ?></span>
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
    <td align="center" width="470px" style="padding: 15px 0 10px 0;">
        <table width="440" border="0" align="center" cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th style="font-family: 'Open Sans', sans-serif;font-size: 13px;line-height:28px;text-transform: uppercase;color: #353535;font-weight: 600;padding: 7px 10px;" align="left" width="300px" bgcolor="#daf0fb">
                Items
            </th>
            <th style="font-family: 'Open Sans', sans-serif;font-size: 13px;line-height:28px;text-transform: uppercase;color: #353535;font-weight: 600;padding: 7px 0;" align="center" width="70px" bgcolor="#daf0fb">
                 Qty
            </th>
            <th style="font-family: 'Open Sans', sans-serif;font-size: 13px;line-height:28px;text-transform: uppercase;color: #353535;font-weight: 600;padding: 7px 10px;" align="right" width="100px" bgcolor="#daf0fb">
                 Price
            </th>
        </tr>
        </thead>
		<tbody>
			<?php echo wc_get_email_order_items( $order, array(
				'show_sku'      => $sent_to_admin,
				'show_image'    => false,
				'image_size'    => array( 32, 32 ),
				'plain_text'    => $plain_text,
				'sent_to_admin' => $sent_to_admin,
			) ); ?>
		</tbody>
        <tfoot>
<?php
    if ( $totals = $order->get_order_item_totals() ) {
        $i = 0;
        foreach ( $totals as $total ) {
            $i++;
?>
        <tr>
            <td style="font-family: 'Open Sans', sans-serif;font-size: 13px;line-height:20px;text-transform: capitalize;color: #808285;font-weight:400;padding: 10px 10px 0 10px;" align="right" width="300px" bgcolor="#daf0fb" valign="top">
                <?php echo $total['label']; ?>
            </td>
            <td style="font-family: 'Open Sans', sans-serif;font-size: 13px;line-height:20px;text-transform: capitalize;color: #808285;font-weight:400;padding: 10px 10px 0 10px;" align="right" width="170px" bgcolor="#daf0fb" colspan="2" valign="top">
                <?php echo $total['value']; ?>
            </td>
        </tr>
<?php
        }
    }
    if ( $order->get_customer_note() ) { ?>            
        <tr>
            <td style="font-family: 'Open Sans', sans-serif;font-size: 13px;line-height:28px;text-transform: capitalize;color: #353535;font-weight:600;padding: 0px 10px 10px 10px;" align="right" width="300px" bgcolor="#daf0fb">
                <?php _e( 'Note:', 'woocommerce' ); ?>
            </td>
            <td style="font-family: 'Open Sans', sans-serif;font-size: 13px;line-height:28px;text-transform: capitalize;color: #353535;font-weight:600;padding: 0px 10px 10px 10px;" align="right" width="170px" bgcolor="#daf0fb" colspan="2">
                 <?php echo wptexturize( $order->get_customer_note() ); ?>
            </td>
        </tr>
        <?php
    }
?>
        </tfoot>
        </table>
    </td>
</tr>

<?php do_action( 'woocommerce_email_after_order_table', $order, $sent_to_admin, $plain_text, $email ); ?>
