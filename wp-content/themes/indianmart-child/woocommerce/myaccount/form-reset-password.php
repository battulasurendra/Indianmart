<?php
/**
 * Lost password reset form.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-reset-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices(); ?>
<section id="loginSec">
    <div class="loginSecrow1 container">
        <div class="col-xs-12">
            
    <div class="woocommerce_form_section" id="customer_login">
        <div class="col-sm-6 col-xs-12 woo_account_login_image_sec">
            <div class="loginImage">
                <img src="<?php echo get_site_url()?>/wp-content/uploads/2017/12/loginText-bg.png">
                <div class="loginTextImage">
                    <img src="<?php echo get_site_url()?>/wp-content/uploads/2017/12/loginText.svg">
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xs-12 woo_account_forgot_form_sec text-center">
            <div class="secHeaderRow text-center loginHeader">
                <h2 class="secHeader inline">Reset Password</h2>
            </div>
            <form method="post" class="woocommerce-ResetPassword lost_reset_password">
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <label for="password_1"><?php _e( 'New password', 'woocommerce' ); ?> <span class="required">*</span></label><input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password_1" id="password_1" placeholder="New Password" />
                </p>
                <p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
                    <label for="password_2"><?php _e( 'Re-enter new password', 'woocommerce' ); ?> <span class="required">*</span></label>
                    <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password_2" id="password_2" placeholder="Re-enter new password" />
                </p>

                <input type="hidden" name="reset_key" value="<?php echo esc_attr( $args['key'] ); ?>" />
                <input type="hidden" name="reset_login" value="<?php echo esc_attr( $args['login'] ); ?>" />

                <div class="clear"></div>

	           <?php do_action( 'woocommerce_resetpassword_form' ); ?>
                
                <div class="col-xs-12 no-padding loginActionsRow">
                    <div class="btnHolder col-xs-12 text-right no-padding">
                        <input type="hidden" name="wc_reset_password" value="true" />
                        <input type="submit" class="btn noarrow" value="<?php esc_attr_e( 'Save', 'woocommerce' ); ?>" />
                    </div>
                </div>

	           <?php wp_nonce_field( 'reset_password' ); ?>
                <div class="col-xs-12 text-center woo_forget_footer">
                    <div class="registerCallText">Or Back To</div>
                    <div class="btnHolder inline">
                        <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="btn noarrow yellowBtn">Login</a>
                    </div>
                </div>
            </form>
        </div>
	</div>
        </div>
	</div>
</section>