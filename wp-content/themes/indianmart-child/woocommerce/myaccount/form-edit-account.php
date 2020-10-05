<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
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
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_edit_account_form' ); ?>

<div class="secHeaderRow text-center loginHeader">
    <h2 class="secHeader inline">ACCOUNT INFORMATION</h2>
    <i class="sprite sprite-checkoutIcon1"></i>
</div>
<form class="woocommerce-EditAccountForm edit-account" action="" method="post">

	<?php do_action( 'woocommerce_edit_account_form_start' ); ?>

	<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
		<label for="account_first_name"><?php _e( 'First name', 'woocommerce' ); ?> <span class="required">*</span></label>
		<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" value="<?php echo esc_attr( $user->first_name ); ?>" placeholder="First Name"/>
	</p>
	<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
		<label for="account_last_name"><?php _e( 'Last name', 'woocommerce' ); ?> <span class="required">*</span></label>
		<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" value="<?php echo esc_attr( $user->last_name ); ?>" placeholder="Last Name"/>
	</p>
	<div class="clear"></div>

	<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
		<label for="display_name"><?php _e( 'Display name', 'woocommerce' ); ?> <span class="required">*</span></label>
		<input type="text" class="woocommerce-Input input-text" name="display_name" id="display_name" value="<?php echo esc_attr( $user->display_name ); ?>" placeholder="Display name"/>
	</p>
	<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
		<label for="account_email"><?php _e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
		<input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" value="<?php echo esc_attr( $user->user_email ); ?>" placeholder="Email"/>
	</p>
    <div class="clear"></div>
    <div class="accountOptions">
        <h3 id="generalSubscription" class="col-xs-12 no-padding">
            <div class="btn-group" data-toggle="buttons">
                <label class="btn checkboxlabel">
                   <input id="generalSubscriptionCheckbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" type="checkbox" name="sign_up_for_newsletter" value="1">
                    <span class="checkBtn"></span>
                </label>
            </div>
            <label for="sign-up-for-newsletter-checkbox" class="checkboxText woocommerce-form__label woocommerce-form__label-for-checkbox inline">General Subscription</label>
        </h3>
        <h3 id="changePassword" class="col-xs-12 no-padding">
            <div class="btn-group" data-toggle="buttons">
                <label class="btn checkboxlabel">
                   <input id="changePasswordCheckbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" type="checkbox" name="sign_up_for_newsletter" value="1">
                    <span class="checkBtn"></span>
                </label>
            </div>
            <label for="sign-up-for-newsletter-checkbox" class="checkboxText woocommerce-form__label woocommerce-form__label-for-checkbox inline">Change Password</label>
        </h3>
    </div>
    <div class="passwordRow" style="display:none;">
        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="password_current"><?php _e( 'Current password', 'woocommerce' ); ?></label>
            <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" placeholder="Current password"/>
        </p>
        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="password_1"><?php _e( 'New password', 'woocommerce' ); ?></label>
            <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" placeholder="New password"/>
        </p>
        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="password_2"><?php _e( 'Confirm new password', 'woocommerce' ); ?></label>
            <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" placeholder="Confirm new password"/>
        </p>
    </div>
	
    <fieldset>
		<!--<legend><?php /*_e( 'Password change', 'woocommerce' );*/ ?></legend>-->
	</fieldset>
	<div class="clear"></div>

	<?php do_action( 'woocommerce_edit_account_form' ); ?>

	<div class="btnHolder text-right">
		<?php wp_nonce_field( 'save_account_details' ); ?>
		<input type="submit" class="btn noarrow" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>" />
		<input type="hidden" name="action" value="save_account_details" />
	</div>

	<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
</form>

<?php do_action( 'woocommerce_after_edit_account_form' ); ?>
