<?php
/**
 * Email Header
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-header.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates/Emails
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<?php
$mailTheme = 1;
$mailColor = "#b4cd78";

switch ($email_heading) {
    case "New customer order": // New order
        $mailTheme = 1;
        $mailColor = "#b4cd78";
        break;
    case "Cancelled order": // Cancelled order
        $mailTheme = 1;
        $mailColor = "#b4cd78";
        break;
    case "Failed order": // Failed order
        $mailTheme = 1;
        $mailColor = "#b4cd78";
        break;
    case "Thank you for your order": // Order on-hold || Processing order
        $mailTheme = 1;
        $mailColor = "#b4cd78";
        break;
    case "Yout order is complete": // Completed order
        $mailTheme = 1;
        $mailColor = "#b4cd78";
        break;
    case "Yout order details": // Customer invoice / Order details
        $mailTheme = 1;
        $mailColor = "#b4cd78";
        break;
    case "A note has been added to your order": // Customer note
        $mailTheme = 1;
        $mailColor = "#b4cd78";
        break;
    case "Password reset instructions": // Reset password 
        $mailTheme = 2;
        $mailColor = "#eeb931";
        break;
    case "Welcome to Indianmart": // New account 
        $mailTheme = 4;
        $mailColor = "#daf0fb";
        break;
    default: //Refunded order - Full refund/Partial refund
        $mailTheme = 1;
        $mailColor = "#b4cd78";
}

$headerImage = get_site_url() . '/wp-content/uploads/2018/02/mailer_header'. $mailTheme .'.png';
$mailBgImage = get_site_url() . '/wp-content/uploads/2018/02/mailer-bg'. $mailTheme .'.png';

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
    <title><?php echo get_bloginfo( 'name', 'display' ); ?></title>
    <style>
        body{
            background-image: url(<?php echo $mailBgImage; ?>);
            background-image: none;
            background-repeat: no-repeat;
            background-position: center top;
            margin: 0 auto;
            padding: 0;
            width: 100%;
            max-width: 600px;
        }
    </style>
</head>
<body>
    <table style="font-family: 'Open Sans', sans-serif; color:#353535; -webkit-font-smoothing:antialiased ; min-width:600px;background-repeat: no-repeat;" bgcolor="<?php echo $mailColor; ?>" width="600" border="0" align="center" cellpadding="0" cellspacing="0" background="<?php echo $mailBgImage; ?>">
    <tbody>
    <tr>
        <td style="display:block;padding:25px 0px 25px 0px;line-height:0px;" align="center" width="600px">
            <table width="530" border="0" align="center" cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td align="center" target="_blank" valign="middle" style="padding:15px;line-height:10px;">
                            <a href="<?php echo get_site_url(); ?>" style="color:#ffffff;text-decoration:none;">
                                <img src="<?php echo get_site_url() .'/wp-content/uploads/2018/02/logo-white.png'; ?>" style="display:block; border:none; outline:none; text-decoration:none;-ms-interpolation-mode:bicubic; color:#ffffff;" width="135" height="70" alt="Indianmart"/>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td align="center" style="padding: 0 0 40px 0;" width="600px">
            <table width="530" border="0" align="center" cellpadding="0" cellspacing="0" style="border: 2px dashed #ffffff;border-radius: 10px;">
            <tbody>
            <tr>
                <td style="padding:10px;" align="center" valign="middle">
                    <table width="510" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="background: #ffffff;border-radius: 10px;">
                    <tbody>
                    <tr>
                        <td style="display:block;" align="center" width="510px">
                            <table width="470" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tbody>
                                <tr>
                                    <td style="padding: 40px 0 15px 0" align="center" width="470px">
                                        <a href="https://indianmart.com" style="color:#ffffff;text-decoration:none;">
                                            <img style="display:block; border:none; outline:none; text-decoration:none;-ms-interpolation-mode:bicubic; color:#eeeeee;" src="<?php echo $headerImage; ?>" width="100" height="100" alt="Indianmart"/>
                                        </a>
                                    </td>
                                </tr>
