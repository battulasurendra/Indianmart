<?php
/**
 * Customer new account email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-new-account.php.
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
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

    <!--<tr>
        <td style="font-family: 'Open Sans', sans-serif;font-weight: bold;font-size: 18px;line-height:28px;text-transform: uppercase;color: #353535;padding: 10px;" align="center"  width="470px">
            Hi, <?php /*echo esc_html( $user_login );*/ ?>
        </td>
    </tr>
    <tr>
        <td align="center" width="470px">
            <img style="display:block; border:none; outline:none; text-decoration:none;-ms-interpolation-mode:bicubic; color:#eeeeee;" width="50" height="4" alt="---------" src="<?php /*echo get_site_url() .'/wp-content/uploads/2018/02/line_small.png';*/ ?>"/>
        </td>
    </tr>
    <tr>
        <td style="font-family: 'Open Sans', sans-serif;font-weight: 600; font-size:17px;line-height:24px;color:#000000; padding-top: 40px; padding-right: 10px;padding-bottom: 15px;padding-left: 10px;" align="center" width="470px">
            Thanks for creating an account on Indianmart
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
    </tr>-->

<?php if ( 'yes' === get_option( 'woocommerce_registration_generate_password' ) && $password_generated ) : ?>
    <tr>
        <td style="font-family: 'Open Sans', sans-serif;font-size:14px;line-height:24px;color:#353535;padding: 15px;" align="center" width="470px">
            <?php printf( __( 'Your password has been automatically generated: %s', 'woocommerce' ), '<span style="font-weight: 500;">' . esc_html( $user_pass ) . '</span>' ); ?>
        </td>
    </tr>

<?php endif; ?>
    <!--<tr>
        <td style="font-family: 'Open Sans', sans-serif;font-size:14px;line-height:24px;color:#353535;padding: 15px" align="center" width="470px">
             <a href="<?php /*echo esc_url( wc_get_page_permalink( 'myaccount' ));*/ ?>" style="color:#ed5b30;text-align:center;text-decoration: underline;font-weight: bold;">
                Click here to login
            </a>&nbsp;to your account and continue shopping, discovering and experimenting with our delectable range of flavours                                        
        </td>
    </tr>-->

<?php do_action( 'woocommerce_email_footer', $email );
