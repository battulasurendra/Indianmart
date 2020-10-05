<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
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
                <h2 class="secHeader inline">Forgot Password</h2>
            </div>
            <div class="forgotText text-left"><?php echo apply_filters( 'woocommerce_lost_password_message', __( 'Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'woocommerce' ) ); ?></div>
            <form method="post" class="woocommerce-ResetPassword lost_reset_password">
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <label for="user_login"><?php _e( 'Username or email', 'woocommerce' ); ?></label>
                    <input class="woocommerce-Input woocommerce-Input--text input-text" type="text" name="user_login" id="user_login" placeholder="Username or email"/>
                </p>

                <div class="clear"></div>

                <?php do_action( 'woocommerce_lostpassword_form' ); ?>
                
                <div class="col-xs-12 no-padding loginActionsRow">
                    <div class="btnHolder col-xs-12 text-right no-padding">
                        <input type="hidden" name="wc_reset_password" value="true" />
                        <input type="submit" class="btn noarrow" value="<?php esc_attr_e( 'Reset password', 'woocommerce' ); ?>" />
                    </div>
                </div>

                <?php wp_nonce_field( 'lost_password' ); ?>
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