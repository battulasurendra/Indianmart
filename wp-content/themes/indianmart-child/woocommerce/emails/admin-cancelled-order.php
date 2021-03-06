<?php
/**
 * Admin cancelled order email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/admin-cancelled-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates/Emails
 * @version 2.5.0
 */

 if ( ! defined( 'ABSPATH' ) ) {
 	exit;
 }

 /**
  * @hooked WC_Emails::email_header() Output the email header
  */
 do_action( 'woocommerce_email_header', $email_heading, $email ); ?>
    <tr>
        <td style="font-family: 'Open Sans', sans-serif;font-weight: 600; font-size:17px;line-height:24px;color:#000000; padding-top: 40px; padding-right: 10px;padding-bottom: 15px;padding-left: 10px;" align="center" width="470px">
            The order #<span style="display: block;color:#ed5b30;text-align:center;font-weight: 600;"><?php echo $order->get_order_number(); ?></span> from <?php echo $order->get_formatted_billing_full_name(); ?> has been <span style="display: block;color:#ed5b30;text-align:center;font-weight: 600;">cancelled</span>.
        </td>
    </tr>
    <tr>
        <td style="padding-bottom:15px;" align="center" width="470px">
            <table width="150" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#808285" height="1">
            <tbody>
            <tr>
                <td style="padding: 1px 0 0 0;" align="center" height="1"></td>
            </tr>
            </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td style="font-family: 'Open Sans', sans-serif;font-size:14px;line-height:24px;color:#353535;" align="center" width="470px">
            Order details are below.
        </td>
    </tr>
 <?php

 /**
  * @hooked WC_Emails::order_details() Shows the order details table.
  * @hooked WC_Structured_Data::generate_order_data() Generates structured data.
  * @hooked WC_Structured_Data::output_structured_data() Outputs structured data.
  * @since 2.5.0
  */
 do_action( 'woocommerce_email_order_details', $order, $sent_to_admin, $plain_text, $email );

 /**
  * @hooked WC_Emails::order_meta() Shows order meta data.
  */
 do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text, $email );

 /**
  * @hooked WC_Emails::customer_details() Shows customer details
  * @hooked WC_Emails::email_address() Shows email address
  */
 do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text, $email );

 /**
  * @hooked WC_Emails::email_footer() Output the email footer
  */
 do_action( 'woocommerce_email_footer', $email );
