<?php
/**
 * Customer Reset Password email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-reset-password.php.
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
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php do_action( 'woocommerce_email_header', $email_heading, $email ); ?>
    <tr>
        <td style="font-family: 'Open Sans', sans-serif;font-weight: bold;font-size: 18px;line-height:28px;text-transform: uppercase;color: #353535;padding: 10px;" align="center"  width="470px">
            Hi, <?php echo esc_html( $user_login ); ?>
        </td>
    </tr>
    <tr>
        <td align="center" width="470px">
            <img style="display:block; border:none; outline:none; text-decoration:none;-ms-interpolation-mode:bicubic; color:#eeeeee;" width="50" height="4" alt="---------" src="<?php echo get_site_url() .'/wp-content/uploads/2018/02/line_small.png'; ?>"/>
        </td>
    </tr>
    <tr>
        <td style="font-family: 'Open Sans', sans-serif;font-size:14px;line-height:24px;color:#353535;padding: 15px;" align="center" width="470px">
            We just received a request to reset the password for your account, which holds the following user name
        </td>
    </tr>
    <tr>
        <td align="center" width="470px" style="padding: 10px 0;">
            <table width="300" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#eeb931" style="border-radius: 6px;">
            <tbody>
            <tr>
                <td style="font-family: 'Open Sans', sans-serif;font-weight: bold;font-size: 18px;line-height:28px;text-transform: uppercase;color: #353535;padding: 7px;" align="center" width="300px">
                    <?php echo $user_login; ?>
                </td>
            </tr>
            </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td style="font-family: 'Open Sans', sans-serif;font-size:14px;line-height:24px;color:#353535;padding: 15px" align="center" width="470px">
            If this was a mistake, please ignore this email.<br>
            If you do need to reset your password, please visit this link:<br>
            <a href="<?php echo esc_url( add_query_arg( array( 'key' => $reset_key, 'login' => rawurlencode( $user_login ) ), wc_get_endpoint_url( 'lost-password', '', wc_get_page_permalink( 'myaccount' ) ) ) ); ?>" style="display: block;color:#ed5b30;text-align:center;text-decoration: underline;font-weight: bold;">
                Click here to reset password
            </a>
        </td>
    </tr>
<?php do_action( 'woocommerce_email_footer', $email ); ?>
