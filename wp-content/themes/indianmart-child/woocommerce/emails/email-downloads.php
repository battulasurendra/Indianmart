<?php
/**
 * Email Downloads.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-downloads.php.
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

$text_align = is_rtl() ? 'right' : 'left';

?>

<tr>
    <td style="font-family: 'Open Sans', sans-serif;font-weight: 600; font-size:17px;line-height:24px;color:#000000; padding-top: 40px; padding-right: 10px;padding-bottom: 15px;padding-left: 10px;" align="center" width="470px">
        <?php _e( 'Downloads', 'woocommerce' ); ?>
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
    <td align="center" width="470px" style="padding: 25px 0 10px 0;">
        <table width="440" border="0" align="center" cellpadding="0" cellspacing="0">
        <thead>
        <tr>
        <?php foreach ( $columns as $column_id => $column_name ) : ?>
            <th style="font-family: 'Open Sans', sans-serif;font-size: 13px;line-height:28px;text-transform: uppercase;color: #353535;font-weight: 600;padding: 7px 10px;" align="left" width="300px" bgcolor="#daf0fb">
                <?php echo esc_html( $column_name ); ?>
            </th>
        <?php endforeach; ?>
        </tr>
        </thead>
        <tbody>
        <?php foreach ( $downloads as $download ) : ?>
            <tr>
                <td style="font-family: 'Open Sans', sans-serif;font-size: 13px;line-height:20px;text-transform: capitalize;color: #808285;padding:15px 10px;" align="left" width="300px">
                    <?php
                        if ( has_action( 'woocommerce_email_downloads_column_' . $column_id ) ) {
                            do_action( 'woocommerce_email_downloads_column_' . $column_id, $download );
                        } else {
                            switch ( $column_id ) {
                                case 'download-product' : ?>
                                    <a style="color:#353535;text-decoration:none;" href="<?php echo esc_url( get_permalink( $download['product_id'] ) ); ?>"><?php echo esc_html( $download['product_name'] ); ?></a>
                                    <?php
                                break;
                                case 'download-file' : ?>
                                    <a style="color:#ed5b30;text-decoration:underline;" href="<?php echo esc_url( $download['download_url'] ); ?>" class="woocommerce-MyAccount-downloads-file button alt"><?php echo esc_html( $download['download_name'] ); ?></a>
                                    <?php
                                break;
                                case 'download-expires' : ?>
                                    <?php if ( ! empty( $download['access_expires'] ) ) : ?>
                                        <time datetime="<?php echo date( 'd M Y', strtotime( $download['access_expires'] ) ); ?>" title="<?php echo esc_attr( strtotime( $download['access_expires'] ) ); ?>"><?php echo date_i18n( get_option( 'date_format' ), strtotime( $download['access_expires'] ) ); ?></time>
                                    <?php else : ?>
                                        <?php _e( 'Never', 'woocommerce' ); ?>
                                    <?php endif;
                                break;
                            }
                        }
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        </table>
    </td>
</tr>
