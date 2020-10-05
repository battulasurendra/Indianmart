<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
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
 * @version 3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php wc_print_notices(); ?>

<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

<?php endif; ?>
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
        <div class="col-sm-6 col-xs-12 woo_account_login_form_sec text-center">
            <div class="secHeaderRow text-center loginHeader">
                <h2 class="secHeader inline">LOGIN</h2>
                <h4 class="secHeaderTag">Welcome to IndianMart</h4>
            </div>
            <form class="woocommerce-form woocommerce-form-login login" method="post">
                <?php do_action( 'woocommerce_login_form_start' ); ?>

                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <label for="username">
                        <?php _e( 'Username or email address', 'woocommerce' ); ?> <span class="required">*</span>
                    </label>
                    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( $_POST['username'] ) : ''; ?>" placeholder="Username"/>
                </p>
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <label for="password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
                    <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" placeholder="Password"/>
                </p>
                <p class="woocommerce-LostPassword lost_password">
                    <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php _e( 'Forgot?', 'woocommerce' ); ?></a>
                </p>
                
                <div class="col-xs-12 no-padding loginFormAction form-row">
                    <?php do_action( 'woocommerce_login_form' ); ?>
                </div>
                
                <div class="col-xs-12 no-padding loginActionsRow">
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn checkboxlabel">
                                <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" />
                                <span class="checkBtn"></span>
                            </label>
                        </div>
                        <label for="rememberme" class="checkboxText woocommerce-form__label woocommerce-form__label-for-checkbox inline"><?php _e( 'Keep me signed in', 'woocommerce' ); ?></label>
                    </div>
                    <div class="btnHolder col-xs-12 text-right col-sm-6 no-padding">
                        <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
                        <input type="submit" class="btn noarrow" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>" />
                    </div>
                </div>
                <div class="col-xs-12 woo_login_footer text-center">
                    <div class="socialLoginSec">
                        <div class="socialLoginHeader">
                            <h6>Or Login With</h6>
                        </div>
                        <div class="socialLoginBtns">
                            <i class="fb-login"></i>
                            <i class="gplus-login"></i>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 text-center">
                    <div class="registerCallText">If you don’t have an Account?</div>
                    <div class="btnHolder inline">
                        <a href="#customer_registration" id="registerCall" class="continueBtn btn noarrow yellowBtn">Register</a>
                    </div>
                </div>
                <?php do_action( 'woocommerce_login_form_end' ); ?>
            </form>
        </div>

	</div>
<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

    <div class="woocommerce_form_section" id="customer_registration">
        <div class="secHeaderRow text-center loginHeader">
            <h2 class="secHeader inline">REGISTER</h2>
            <h4 class="secHeaderTag">Welcome to IndianMart</h4>
        </div>

		<form method="post" class="register">

			<?php do_action( 'woocommerce_register_form_start' ); ?>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="reg_username"><?php _e( 'Username', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( $_POST['username'] ) : ''; ?>" placeholder="Username"/>
				</p>

			<?php endif; ?>
            
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="reg_billing_first_name"><?php _e( 'First name', 'woocommerce' ); ?><span class="required">*</span></label>
                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" placeholder="First Name" />
            </p>
            
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="reg_billing_last_name"><?php _e( 'Last name', 'woocommerce' ); ?><span class="required">*</span></label>
                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" placeholder="Last Name" />
            </p>
            
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="reg_billing_phone"><?php _e( 'Phone', 'woocommerce' ); ?></label>
                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="billing_phone" id="reg_billing_phone" value="<?php esc_attr_e( $_POST['billing_phone'] ); ?>" placeholder="Phone" />
            </p>
            
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="reg_email"><?php _e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
				<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( $_POST['email'] ) : ''; ?>" placeholder="Email"/>
			</p>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="reg_password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" placeholder="Password"/>
				</p>
            
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <label for="reg_password2"><?php _e( 'Confirm password', 'woocommerce' ); ?> <span class="required">*</span></label>
                    <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password2" id="reg_password2" value="<?php if ( ! empty( $_POST['password2'] ) ) echo esc_attr( $_POST['password2'] ); ?>" placeholder="Confirm Password"/>
                </p>

			<?php endif; ?>

            <div class="col-xs-12 no-padding registerFormAction form-row">
                <?php do_action( 'woocommerce_register_form' ); ?>
            </div>
            
            <div class="col-xs-12 no-padding registerActionsRow">
                <div class="col-sm-6 col-xs-12 text-left">
                    <div class="loginCallText">
                        Already Have an Account?
                        <a href="#customer_login" id="loginCall" class="continueBtn loginbtn inline">LOGIN</a>
                    </div>
                </div>
                <div class="btnHolder text-right" class="col-xs-12 col-sm-6 no-padding">
                    <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
                    <input type="submit" class="btn noarrow" name="register" value="<?php esc_attr_e( 'Create an Account', 'woocommerce' ); ?>" />
                </div>
            </div>

			<?php do_action( 'woocommerce_register_form_end' ); ?>
		</form>
        
        <div class="woo_register_footer text-right">
            <div class="socialLoginSec text-center inline">
                <div class="socialLoginHeader">
                    <h6>Or Register with</h6>
                </div>
                <div class="socialLoginBtns">
                    <i class="fb-login"></i>
                    <i class="gplus-login"></i>
                </div>
            </div>
        </div>
        <div class="woo_register_image">
            <img src="<?php echo get_site_url()?>/wp-content/uploads/2017/12/register-bottom.png">
        </div>
    </div>
<?php endif; ?>
            
        </div>
	</div>
</section>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
