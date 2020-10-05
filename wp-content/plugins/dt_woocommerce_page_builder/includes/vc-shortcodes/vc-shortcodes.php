<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class DTWPB_Shorcodes{
	public function __construct(){
		
		$shortcodes = array(
			'dtwpb_single_product_image' 		=> 'dtwpb_single_product_image_sc',
			'dtwpb_single_product_title' 		=> 'dtwpb_single_product_title_sc',
			'dtwpb_single_product_rating'		=> 'dtwpb_single_product_rating_sc',
			'dtwpb_single_product_price' 		=> 'dtwpb_single_product_price_sc',
			'dtwpb_single_product_excerpt' 		=> 'dtwpb_single_product_excerpt_sc',
			'dtwpb_single_product_add_to_cart' 	=> 'dtwpb_single_product_add_to_cart_sc',
			'dtwpb_single_product_meta' 		=> 'dtwpb_single_product_meta_sc',
			'dtwpb_single_product_share' 		=> 'dtwpb_single_product_share_sc',
			'dtwpb_single_product_tabs' 		=> 'dtwpb_single_product_tabs_sc',
			'dtwpb_single_product_additional_information' => 'dtwpb_single_product_additional_information_sc',
			'dtwpb_single_product_description' 	=> 'dtwpb_single_product_description_sc',
			'dtwpb_single_product_reviews' 		=> 'dtwpb_single_product_reviews_sc',
			'dtwpb_single_product_related_products' => 'dtwpb_single_product_related_products_sc',
			'dtwpb_single_product_upsells' 		=> 'dtwpb_single_product_upsells_sc',
			
			
			'dtwpb_cart_table'					=> 'dtwpb_cart_table_sc',
			'dtwpb_cart_totals'					=> 'dtwpb_cart_totals_sc',
			'dtwpb_cross_sell'					=> 'dtwpb_cross_sell_sc',
			
			'dtwpb_checkout_before_customer_details' => 'dtwpb_checkout_before_customer_details_sc',
			'dtwpb_form_billing'				=> 'dtwpb_form_billing_sc',
			'dtwpb_form_shipping'				=> 'dtwpb_form_shipping_sc',
			'dtwpb_checkout_after_customer_details' => 'dtwpb_checkout_after_customer_details_sc',
			'dtwpb_checkout_order_review' 		=> 'dtwpb_checkout_order_review_sc',
			
			'dtwpb_woocommerce_myaccount_form_login'	=> 'dtwpb_woocommerce_myaccount_form_login',
			'dtwpb_woocommerce_myaccount_form_register'	=> 'dtwpb_woocommerce_myaccount_form_register',
			
			'dtwpb_woocommerce_myaccount_dashboard'	=> 'dtwpb_woocommerce_myaccount_dashboard',
			'dtwpb_woocommerce_myaccount_orders'	=> 'dtwpb_woocommerce_myaccount_orders',
			'dtwpb_woocommerce_myaccount_downloads'	=> 'dtwpb_woocommerce_myaccount_downloads',
			'dtwpb_woocommerce_myaccount_addresses'	=> 'dtwpb_woocommerce_myaccount_addresses',
			'dtwpb_woocommerce_myaccount_edit_account'	=> 'dtwpb_woocommerce_myaccount_edit_account',
			'dtwpb_woocommerce_myaccount_logout'	=> 'dtwpb_woocommerce_myaccount_logout',
		);
		
		/*
		 * Support YITH WooCommerce Wishlist plugin
		 */
		if ( defined( 'YITH_WCWL' ) ){
			$shortcodes['dtwpb_yith_wcwl_add_to_wishlist'] = 'dtwpb_yith_wcwl_add_to_wishlist_sc';
		}
		/*
		 * Support YITH WooCommerce Compare plugin
		 */
		if ( defined( 'YITH_WOOCOMPARE' ) ){
			$shortcodes['dtwpb_yith_woocompare_compare_button_in_product_page'] = 'dtwpb_yith_woocompare_compare_button_in_product_page_sc';
		}
		
		/*
		 * Support WooCommerce_Germanized plugin
		 */
		if( class_exists('WooCommerce_Germanized') ){
			$shortcodes['dtwpb_gzd_template_single_price_unit'] = 'dtwpb_gzd_template_single_price_unit_sc';
			$shortcodes['dtwpb_gzd_template_single_legal_info'] = 'dtwpb_gzd_template_single_legal_info_sc';
			$shortcodes['dtwpb_gzd_template_single_delivery_time_info'] = 'dtwpb_gzd_template_single_delivery_time_info_sc';
		}
		
		foreach ($shortcodes as $shortcode => $function){
			add_shortcode($shortcode, array(&$this, $function));
		}
	}
	
	public function dtwpb_single_product_image_sc( $atts, $content = null ){
		global $product;
		extract( shortcode_atts(array(
			'el_class' => ''
		), $atts) );
		ob_start();
		if(	! empty($el_class) )
			echo '<div class="'.esc_attr($el_class).'">';
		woocommerce_show_product_sale_flash();
		woocommerce_show_product_images ();
		if(	! empty($el_class) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_single_product_title_sc( $atts, $content = null ){
		global $product;
		extract( shortcode_atts(array(
			'el_class' => ''
		), $atts) );
		ob_start();
		if(	! empty($el_class) )
			echo '<div class="'.esc_attr($el_class).'">';
		woocommerce_template_single_title ();
		if(	! empty($el_class) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_single_product_rating_sc( $atts, $content = null ){
		global $product;
		extract( shortcode_atts(array(
			'el_class' => ''
		), $atts) );
		ob_start();
		if(	! empty($el_class) )
			echo '<div class="'.esc_attr($el_class).'">';
		woocommerce_template_single_rating ();
		if(	! empty($el_class) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_single_product_price_sc( $atts, $content = null ){
		global $product;
		extract( shortcode_atts(array(
			'el_class' => ''
		), $atts) );
		ob_start();
		if(	! empty($el_class) )
			echo '<div class="'.esc_attr($el_class).'">';
		woocommerce_template_single_price ();
		if(	! empty($el_class) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_single_product_excerpt_sc( $atts, $content = null ){
		global $product;
		extract( shortcode_atts(array(
			'el_class' => ''
		), $atts) );
		ob_start();
		if(	! empty($el_class) )
			echo '<div class="'.esc_attr($el_class).'">';
		woocommerce_template_single_excerpt ();
		if(	! empty($el_class) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_single_product_add_to_cart_sc( $atts, $content = null ){
		global $product;
		extract( shortcode_atts(array(
			'el_class' => ''
		), $atts) );
		ob_start();
		if(	! empty($el_class) )
			echo '<div class="'.esc_attr($el_class).'">';
		woocommerce_template_single_add_to_cart ();
		if(	! empty($el_class) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_single_product_meta_sc( $atts, $content = null ){
		global $product;
		extract( shortcode_atts(array(
			'el_class' => ''
		), $atts) );
		ob_start();
		if(	! empty($el_class) )
			echo '<div class="'.esc_attr($el_class).'">';
		woocommerce_template_single_meta ();
		if(	! empty($el_class) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_single_product_share_sc( $atts, $content = null ){
		global $product;
		extract( shortcode_atts(array(
			'el_class' => ''
		), $atts) );
		ob_start();
		if(	! empty($el_class) )
			echo '<div class="'.esc_attr($el_class).'">';
		woocommerce_template_single_sharing ();
		if(	! empty($el_class) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_single_product_tabs_sc( $atts, $content = null ){
		global $product;
		extract( shortcode_atts(array(
			'el_class' => ''
		), $atts) );
		ob_start();
		if(	! empty($el_class) )
			echo '<div class="'.esc_attr($el_class).'">';
		woocommerce_output_product_data_tabs ();
		if(	! empty($el_class) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_single_product_additional_information_sc( $atts, $content = null ){
		global $product;
		extract( shortcode_atts(array(
			'el_class' => ''
		), $atts) );
		ob_start();
		if(	! empty($el_class) )
			echo '<div class="'.esc_attr($el_class).'">';
			
			if ( $product && ( $product->has_attributes() || ( $product->enable_dimensions_display() && ( $product->has_dimensions() || $product->has_weight() ) ) ) ) {
				wc_get_template( 'single-product/tabs/additional-information.php' );
			}
			
		if(	! empty($el_class) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_single_product_description_sc( $atts, $content = null ){
		global $product;
		extract( shortcode_atts(array(
			'el_class' => ''
		), $atts) );
		ob_start();
		if(	! empty($el_class) )
			echo '<div class="'.esc_attr($el_class).'">';
			
			the_content();
			
		if(	! empty($el_class) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_single_product_reviews_sc( $atts, $content = null ){
		global $product;
		extract( shortcode_atts(array(
			'el_class' => ''
		), $atts) );
		ob_start();
		if(	! empty($el_class) )
			echo '<div class="'.esc_attr($el_class).'">';
			
			if(comments_open() ){
				comments_template();
			}
			
		if(	! empty($el_class) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_single_product_related_products_sc( $atts, $content = null ){
		global $product;
		$atts = extract( shortcode_atts( array(
			'posts_per_page' => '4',
			'columns'  => '4',
			'orderby'  => 'date',
			'el_class' => '',
		), $atts ));
		
		$args = array(
			'posts_per_page' => $posts_per_page,
			'columns'        => $columns,
			'orderby'        => $orderby,
		);
		
		ob_start();
		if(	! empty($el_class) )
			echo '<div class="'.esc_attr($el_class).'">';
			
			woocommerce_related_products($args);
			
		if(	! empty($el_class) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_single_product_upsells_sc( $atts, $content = null ){
		global $product;
		$atts = extract( shortcode_atts( array(
			'posts_per_page' => '4',
			'columns'  => '4',
			'orderby'  => 'date',
			'el_class' => ''
		), $atts ));
		
		ob_start();
		if(	! empty($el_class) )
			echo '<div class="'.esc_attr($el_class).'">';
			
			woocommerce_upsell_display($posts_per_page, $columns, $orderby);
			
		if(	! empty($el_class) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	/*
	 * Support YITH WooCommerce Wishlist plugin
	 */
	public function dtwpb_yith_wcwl_add_to_wishlist_sc(){
		ob_start();
		echo do_shortcode('[yith_wcwl_add_to_wishlist]');
		return ob_get_clean();
	}
	/*
	 * Support YITH WooCommerce Compare plugin
	 */
	public function dtwpb_yith_woocompare_compare_button_in_product_page_sc(){
		ob_start();
		echo do_shortcode('[yith_compare_button]');
		return ob_get_clean();
	}
	
	/*
	 * Support WooCommerce_Germanized plugin
	 */
	public function dtwpb_gzd_template_single_price_unit_sc ( $atts, $content = null ){
		if( function_exists('woocommerce_gzd_template_single_price_unit') ){
			ob_start();
			woocommerce_gzd_template_single_price_unit();
			return ob_get_clean();
		}
	}
	public function dtwpb_gzd_template_single_legal_info_sc ( $atts, $content = null ){
		if( function_exists('woocommerce_gzd_template_single_legal_info') ){
			ob_start();
			woocommerce_gzd_template_single_legal_info();
			return ob_get_clean();
		}
	}
	public function dtwpb_gzd_template_single_delivery_time_info_sc ( $atts, $content = null ){
		if( function_exists('woocommerce_gzd_template_single_delivery_time_info') ){
			ob_start();
			woocommerce_gzd_template_single_delivery_time_info();
			return ob_get_clean();
		}
	}
	
	
	/*
	 * Checkout page builder
	 */
	public function dtwpb_checkout_before_customer_details_sc( $atts, $content = null ){
		$checkout = WC()->checkout();
		extract( shortcode_atts(array(
			'el_class' => ''
		), $atts) );
		ob_start();
		if(	! empty($el_class) )
			echo '<div class="'.esc_attr($el_class).'">';
			if ( sizeof( $checkout->checkout_fields ) > 0 ) :
				do_action( 'woocommerce_checkout_before_customer_details' );
			endif;
		if(	! empty($el_class) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_form_billing_sc( $atts, $content = null ){
		$checkout = WC()->checkout();
		extract( shortcode_atts(array(
			'el_class' => ''
		), $atts) );
		ob_start();
		if(	! empty($el_class) )
			echo '<div class="'.esc_attr($el_class).'">';
			if ( sizeof( $checkout->checkout_fields ) > 0 ) :
				do_action( 'woocommerce_checkout_billing' );
			endif;
		if(	! empty($el_class) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_form_shipping_sc( $atts, $content = null ){
		$checkout = WC()->checkout();
		extract( shortcode_atts(array(
			'el_class' => ''
		), $atts) );
		ob_start();
		if(	! empty($el_class) )
			echo '<div class="'.esc_attr($el_class).'">';
			if ( sizeof( $checkout->checkout_fields ) > 0 ) :
				do_action( 'woocommerce_checkout_shipping' );
			endif;
		if(	! empty($el_class) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_checkout_after_customer_details_sc( $atts, $content = null ){
		$checkout = WC()->checkout();
		extract( shortcode_atts(array(
			'el_class' => ''
		), $atts) );
		ob_start();
		if(	! empty($el_class) )
			echo '<div class="'.esc_attr($el_class).'">';
			if ( sizeof( $checkout->checkout_fields ) > 0 ) :
				do_action( 'woocommerce_checkout_after_customer_details' );
			endif;
		if(	! empty($el_class) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_checkout_order_review_sc( $atts, $content = null ){
		$checkout = WC()->checkout();
		extract( shortcode_atts(array(
			'el_class' => ''
		), $atts) );
		ob_start();
		if(	! empty($el_class) )
			echo '<div class="'.esc_attr($el_class).'">';?>
			
			<h3 id="order_review_heading"><?php _e( 'Your order', 'woocommerce' ); ?></h3>
		
			<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
		
			<div id="order_review" class="woocommerce-checkout-review-order">
				<?php do_action( 'woocommerce_checkout_order_review' ); ?>
			</div>
		
			<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
		<?php
		if(	! empty($el_class) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	
	/*
	 * Cart page shortcodes
	 */
	public function dtwpb_cart_table_sc( $atts, $content = null ){
		extract( shortcode_atts(array(
			'el_class' => ''
		), $atts) );
		ob_start();
		if(	! empty($el_class) )
			echo '<div class="'.esc_attr($el_class).'">';
			
			echo DT_WC_Shortcode_Cart::output( $atts );
			
		if(	! empty($el_class) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_cart_totals_sc( $atts, $content = null ){
		if(WC()->cart->is_empty())
			return '';
		
		extract( shortcode_atts(array(
			'el_class' => ''
		), $atts) );
		ob_start();
		
		echo '<div class="woocommerce '.esc_attr($el_class).'">';
		
			woocommerce_cart_totals();
		
		echo '</div>';

		return ob_get_clean();
	}
	
	public function dtwpb_cross_sell_sc( $atts, $content = null ){
		extract( shortcode_atts(array(
			'posts_per_page'=> 4,
			'columns'=> 4,
			'orderby'=> 'rand',
			'el_class' => ''
		), $atts) );
		ob_start();
		if(	! empty($el_class) )
			echo '<div class="'.esc_attr($el_class).'">';
		?>

			<?php woocommerce_cross_sell_display( $posts_per_page, $columns, $orderby); ?>
		
		<?php
		if(	! empty($el_class) )
			echo '</div>';

		return ob_get_clean();
	}
	
	/*
	 * Custom MyAccount before login page
	 */
	
	public function dtwpb_woocommerce_myaccount_form_login( $atts, $content = null ){
		extract( shortcode_atts(array(
		'el_class' => ''
			), $atts) );
		ob_start();
		if(	! empty($el_class) )
			echo '<div class="'.esc_attr($el_class).'">';
		
		wc_get_template( 'myaccount/form-login.php', array( 'woocommerce-page-builder-custom-templates' => 1 ), DT_WOO_PAGE_BUILDER_DIR . 'woocommerce-page-builder-templates/', DT_WOO_PAGE_BUILDER_DIR . 'woocommerce-page-builder-templates/' );
		
		if(	! empty($el_class) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_woocommerce_myaccount_form_register( $atts, $content = null ){
		extract( shortcode_atts(array(
		'el_class' => ''
			), $atts) );
		ob_start();
		if(	! empty($el_class) )
			echo '<div class="'.esc_attr($el_class).'">';
		
		wc_get_template( 'myaccount/form-register.php', array( 'woocommerce-page-builder-custom-templates' => 1 ), DT_WOO_PAGE_BUILDER_DIR . 'woocommerce-page-builder-templates/', DT_WOO_PAGE_BUILDER_DIR . 'woocommerce-page-builder-templates/' );
		
		if(	! empty($el_class) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	/*
	 * Custom MyAccount page
	 */
	public function dtwpb_woocommerce_myaccount_dashboard( $atts, $content = null ){
		extract( shortcode_atts(array(
		'el_class' => ''
		), $atts) );
		ob_start();
		if(	! empty($el_class) )
			echo '<div class="'.esc_attr($el_class).'">';
		
		if( !empty($content) ){
			global $current_user;
			?>
			<p>
				<?php
					echo sprintf( esc_attr__( 'Hello %s%s%s (not %2$s? %sSign out%s)', 'woocommerce' ), '<strong>', esc_html( $current_user->display_name ), '</strong>', '<a href="' . esc_url( wc_get_endpoint_url( 'customer-logout', '', wc_get_page_permalink( 'myaccount' ) ) ) . '">', '</a>' );
				?>
			</p>
			<p>
				<?php echo $content;?>
			</p>
			<?php
		}else{
			wc_get_template( 'myaccount/dashboard.php', array(
			'current_user' => get_user_by( 'id', get_current_user_id() ),
			) );
		}
		
		if(	! empty($el_class) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_woocommerce_myaccount_orders( $atts, $content = null ){
		extract( shortcode_atts(array(
		'el_class' => ''
			), $atts) );
			ob_start();
			if(	! empty($el_class) )
				echo '<div class="'.esc_attr($el_class).'">';
		
		global $wp,$dtwbp_my_account_current_order_id,$dtwpb_wc_get_endpoint_url_tab_id;
		
		VcShortcodeAutoloader::getInstance()->includeClass( 'WPBakeryShortCode_VC_Tta_Section' );
		$tab_id = end(WPBakeryShortCode_VC_Tta_Section::$section_info);
		if($tab_id){
			do_action('dtwpb_account_orders_in_tab',$tab_id);
			do_action('dtwpb_wc_get_endpoint_url',$tab_id);
		}
		
		if( isset($wp->query_vars['orders']) ){
			$value = $wp->query_vars['orders'];
			do_action( 'woocommerce_account_orders_endpoint', $value );
			
		}elseif( isset($wp->query_vars['view-order']) ){
			$value = $wp->query_vars['view-order'];
			if($tab_id){
				$myaccount_url = get_permalink().'#'.$tab_id['tab_id'];
				do_action('dtwpb_woocommerce_account_view_order_backorder',$myaccount_url);
			}
			do_action( 'woocommerce_account_view-order_endpoint', $value );
			
		}elseif( isset($wp->query_vars['payment-methods']) ){
			$value = $wp->query_vars['payment-methods'];
			do_action( 'woocommerce_account_view-order_endpoint', $value );
			
		}elseif( isset($wp->query_vars['add-payment-method']) ){
			$value = $wp->query_vars['add-payment-method'];
			do_action( 'woocommerce_account_view-order_endpoint', $value );
			
		}else{
			$value = '';
			do_action( 'woocommerce_account_orders_endpoint', $value );
		}
		/*
		foreach ( $wp->query_vars as $key => $value ) {
			// Ignore pagename param.
			if ( 'pagename' === $key ) {
				continue;
			}

			if ( has_action( 'woocommerce_account_' . $key . '_endpoint' ) ) {
				do_action( 'woocommerce_account_' . $key . '_endpoint', $value );
				return;
			}
		}*/
		if(	! empty($el_class) )
			echo '</div>';
		$dtwbp_my_account_current_order_id = null;
		$dtwpb_wc_get_endpoint_url_tab_id = null;
		return ob_get_clean();
	}
	
	public function dtwpb_woocommerce_myaccount_downloads( $atts, $content = null ){
		extract( shortcode_atts(array(
		'el_class' => ''
			), $atts) );
			ob_start();
			if(	! empty($el_class) )
				echo '<div class="'.esc_attr($el_class).'">';
		
		do_action('woocommerce_account_downloads_endpoint');
		
		if(	! empty($el_class) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_woocommerce_myaccount_addresses( $atts, $content = null ){
		global $wp, $dtwpb_wc_get_endpoint_url_tab_id;
		
		$type = '';
		
		if( isset($wp->query_vars['edit-address']) ){
			$type = $wp->query_vars['edit-address'];
		}else{
			$type = wc_edit_address_i18n( sanitize_title( $type ), true );
		}
		
		VcShortcodeAutoloader::getInstance()->includeClass( 'WPBakeryShortCode_VC_Tta_Section' );
		$tab_id = end(WPBakeryShortCode_VC_Tta_Section::$section_info);
		if($tab_id){
			do_action('dtwpb_wc_get_endpoint_url',$tab_id);
		}
		
		
		extract( shortcode_atts(array(
		'el_class' => ''
			), $atts) );
			ob_start();
			if(	! empty($el_class) )
				echo '<div class="'.esc_attr($el_class).'">';
		
		WC_Shortcode_My_Account::edit_address( $type );
		
		if(	! empty($el_class) )
			echo '</div>';
		$dtwpb_wc_get_endpoint_url_tab_id = null;
		return ob_get_clean();
	}
	
	public function dtwpb_woocommerce_myaccount_edit_account( $atts, $content = null ){
		extract( shortcode_atts(array(
		'el_class' => ''
			), $atts) );
			ob_start();
			if(	! empty($el_class) )
				echo '<div class="'.esc_attr($el_class).'">';
		
		do_action('woocommerce_account_edit-account_endpoint');
		
		if(	! empty($el_class) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_woocommerce_myaccount_logout($atts, $content = null){
		extract( shortcode_atts(array(
		'el_class' => ''
			), $atts) );
			ob_start();
			if(	! empty($el_class) )
				echo '<div class="'.esc_attr($el_class).'">';
		
		foreach ( wc_get_account_menu_items() as $endpoint => $label ) :
			if( $endpoint == 'customer-logout' ):
			?>
			<a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
			<?php 
			endif;
		endforeach;
		
		if(	! empty($el_class) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
}
new DTWPB_Shorcodes();




/**
 * Cart Shortcode
 * DT_WC_Shortcode_Cart 
 */
class DT_WC_Shortcode_Cart extends WC_Shortcode_Cart{
	/**
	 * Output the cart shortcode.
	 */
	public static function output( $atts ) {
		// Constants
		if ( ! defined( 'WOOCOMMERCE_CART' ) ) {
			define( 'WOOCOMMERCE_CART', true );
		}
		
		$atts = shortcode_atts( array(), $atts, 'woocommerce_cart' );

		// Update Shipping
		if ( ! empty( $_POST['calc_shipping'] ) && wp_verify_nonce( $_POST['_wpnonce'], 'woocommerce-cart' ) ) {
			self::calculate_shipping();

			// Also calc totals before we check items so subtotals etc are up to date
			WC()->cart->calculate_totals();
		}

		// Check cart items are valid
		do_action( 'woocommerce_check_cart_items' );

		// Calc totals
		WC()->cart->calculate_totals();

		if ( WC()->cart->is_empty() ) {
			wc_get_template( 'cart/cart-empty.php',  array('woocommerce-page-builder-custom-templates' => 1), DT_WOO_PAGE_BUILDER_DIR . 'woocommerce-page-builder-templates/', DT_WOO_PAGE_BUILDER_DIR . 'woocommerce-page-builder-templates/' );
		} else {
			wc_get_template( 'cart/cart.php',  array('woocommerce-page-builder-custom-templates' => 1), DT_WOO_PAGE_BUILDER_DIR . 'woocommerce-page-builder-templates/', DT_WOO_PAGE_BUILDER_DIR . 'woocommerce-page-builder-templates/'  );
		}
	}
}

/**
 * WC_Shortcode_My_Account
 * DTWPB_WC_Shortcode_My_Account extends WC_Shortcode_My_Account
 */
class DTWPB_WC_Shortcode_My_Account extends WC_Shortcode_My_Account{
		
	/**
	 * Get the shortcode content.
	 *
	 * @param array $atts
	 * @return string
	 */
	public static function get( $atts ) {
		return WC_Shortcodes::shortcode_wrapper( array( __CLASS__, 'output' ), $atts );
	}

	/**
	 * Output the shortcode.
	 *
	 * @param array $atts
	 */
	public static function output( $atts ) {
		global $wp;

		// Check cart class is loaded or abort
		if ( is_null( WC()->cart ) ) {
			return;
		}

		if ( ! is_user_logged_in() ) {
			$message = apply_filters( 'woocommerce_my_account_message', '' );

			if ( ! empty( $message ) ) {
				wc_add_notice( $message );
			}
			
			// After password reset, add confirmation message.
			if ( ! empty( $_GET['password-reset'] ) ) {
				wc_add_notice( __( 'Your password has been reset successfully.', 'woocommerce' ) );
			}

			if ( isset( $wp->query_vars['lost-password'] ) ) {
				self::lost_password();
			} else {
				wc_get_template( 'myaccount/form-login.php' );
			}
		 } else {
			// Start output buffer since the html may need discarding for BW compatibility
			ob_start();

			// Collect notices before output
			$notices = wc_get_notices();

			// Output the new account page
			self::my_account( $atts );

			/**
			 * Deprecated my-account.php template handling. This code should be
			 * removed in a future release.
			 *
			 * If woocommerce_account_content did not run, this is an old template
			 * so we need to render the endpoint content again.
			 */
			if ( ! did_action( 'woocommerce_account_content' ) ) {
				foreach ( $wp->query_vars as $key => $value ) {
					if ( 'pagename' === $key ) {
						continue;
					}
					if ( has_action( 'woocommerce_account_' . $key . '_endpoint' ) ) {
						ob_clean(); // Clear previous buffer
						wc_set_notices( $notices );
						wc_print_notices();
						do_action( 'woocommerce_account_' . $key . '_endpoint', $value );
						break;
					}
	 			}

				wc_deprecated_function( 'Your theme version of my-account.php template', '2.6', 'the latest version, which supports multiple account pages and navigation, from WC 2.6.0' );
			}

			// Send output buffer
			ob_end_flush();
		}
	}

	/**
	 * My account page.
	 *
	 * @param  array $atts
	 */
	private static function my_account( $atts ) {
		extract( shortcode_atts( array(
			'order_count' => 15 // @deprecated 2.6.0. Keep for backward compatibility.
		), $atts ) );

		wc_get_template( 'myaccount/my-account.php', array(
			'current_user' => get_user_by( 'id', get_current_user_id() ),
			'order_count'  => 'all' == $order_count ? -1 : $order_count,
		) );
	}

	/**
	 * View order page.
	 *
	 * @param  int $order_id
	 */
	public static function view_order( $order_id ) {
		$order   = wc_get_order( $order_id );

		if ( ! current_user_can( 'view_order', $order_id ) ) {
			echo '<div class="woocommerce-error">' . __( 'Invalid order.', 'woocommerce' ) . ' <a href="' . wc_get_page_permalink( 'myaccount' ).'" class="wc-forward">'. __( 'My Account', 'woocommerce' ) .'</a>' . '</div>';
			return;
		}

		// Backwards compatibility
		$status       = new stdClass();
		$status->name = wc_get_order_status_name( $order->get_status() );

		wc_get_template( 'myaccount/view-order.php', array(
			'status'    => $status, // @deprecated 2.2
			'order'     => wc_get_order( $order_id ),
			'order_id'  => $order_id
		) );
	}

	/**
	 * Edit account details page.
	 */
	public static function edit_account() {
		wc_get_template( 'myaccount/form-edit-account.php', array( 'user' => get_user_by( 'id', get_current_user_id() ) ) );
	}

	/**
	 * Edit address page.
	 *
	 * @access public
	 * @param string $load_address
	 */
	public static function edit_address( $load_address = 'billing' ) {
		$current_user = wp_get_current_user();
		$load_address = sanitize_key( $load_address );

		$address = WC()->countries->get_address_fields( get_user_meta( get_current_user_id(), $load_address . '_country', true ), $load_address . '_' );

		// Enqueue scripts
		wp_enqueue_script( 'wc-country-select' );
		wp_enqueue_script( 'wc-address-i18n' );

		// Prepare values
		foreach ( $address as $key => $field ) {

			$value = get_user_meta( get_current_user_id(), $key, true );

			if ( ! $value ) {
				switch( $key ) {
					case 'billing_email' :
					case 'shipping_email' :
						$value = $current_user->user_email;
					break;
					case 'billing_country' :
					case 'shipping_country' :
						$value = WC()->countries->get_base_country();
					break;
					case 'billing_state' :
					case 'shipping_state' :
						$value = WC()->countries->get_base_state();
					break;
				}
			}

			$address[ $key ]['value'] = apply_filters( 'woocommerce_my_account_edit_address_field_value', $value, $key, $load_address );
		}

		wc_get_template( 'myaccount/form-edit-address.php', array(
			'load_address' 	=> $load_address,
			'address'		=> apply_filters( 'woocommerce_address_to_edit', $address )
		) );
	}

	/**
	 * Lost password page.
	 */
	public static function lost_password() {
		/**
		 * Process reset key / login from email confirmation link
		 */
		if ( ! empty( $_GET['key'] ) && ! empty( $_GET['login'] ) ) {

			$user = self::check_password_reset_key( $_GET['key'], $_GET['login'] );

			// reset key / login is correct, display reset password form with hidden key / login values
			if ( is_object( $user ) ) {
				return wc_get_template( 'myaccount/form-reset-password.php', array(
					'key'   => wc_clean( $_GET['key'] ),
					'login' => wc_clean( $_GET['login'] ),
				) );
			}

		/**
		 * After sending the reset link, don't show the form again.
		 */
		 } elseif ( ! empty( $_GET['reset-link-sent'] ) ) {
			return wc_get_template( 'myaccount/lost-password-confirmation.php' );

		/**
		 * After reset, show confirmation message.
		 */
		 } elseif ( ! empty( $_GET['reset'] ) ) {
			wc_add_notice( __( 'Your password has been reset.', 'woocommerce' ) . ' <a class="button" href="' . esc_url( wc_get_page_permalink( 'myaccount' ) ) . '">' . __( 'Log in', 'woocommerce' ) . '</a>' );
		}

		// Show lost password form by default
		wc_get_template( 'myaccount/form-lost-password.php', array(
			'form'  => 'lost_password',
		) );
	}

	/**
	 * Handles sending password retrieval email to customer.
	 *
	 * Based on retrieve_password() in core wp-login.php.
	 *
	 * @access public
	 * @uses $wpdb WordPress Database object
	 * @return bool True: when finish. False: on error
	 */
	public static function retrieve_password() {
		global $wpdb, $wp_hasher;

		$login = trim( $_POST['user_login'] );

		if ( empty( $login ) ) {

			wc_add_notice( __( 'Enter a username or e-mail address.', 'woocommerce' ), 'error' );
			return false;

		} else {
			// Check on username first, as customers can use emails as usernames.
			$user_data = get_user_by( 'login', $login );
		}

		// If no user found, check if it login is email and lookup user based on email.
		if ( ! $user_data && is_email( $login ) && apply_filters( 'woocommerce_get_username_from_email', true ) ) {
			$user_data = get_user_by( 'email', $login );
		}

		do_action( 'lostpassword_post' );

		if ( ! $user_data ) {
			wc_add_notice( __( 'Invalid username or e-mail.', 'woocommerce' ), 'error' );
			return false;
		}

		if ( is_multisite() && ! is_user_member_of_blog( $user_data->ID, get_current_blog_id() ) ) {
			wc_add_notice( __( 'Invalid username or e-mail.', 'woocommerce' ), 'error' );
			return false;
		}

		// redefining user_login ensures we return the right case in the email
		$user_login = $user_data->user_login;

		do_action( 'retrieve_password', $user_login );

		$allow = apply_filters( 'allow_password_reset', true, $user_data->ID );

		if ( ! $allow ) {

			wc_add_notice( __( 'Password reset is not allowed for this user', 'woocommerce' ), 'error' );
			return false;

		} elseif ( is_wp_error( $allow ) ) {

			wc_add_notice( $allow->get_error_message(), 'error' );
			return false;
		}

		$key = wp_generate_password( 20, false );

		do_action( 'retrieve_password_key', $user_login, $key );

		// Now insert the key, hashed, into the DB.
		if ( empty( $wp_hasher ) ) {
			require_once ABSPATH . 'wp-includes/class-phpass.php';
			$wp_hasher = new PasswordHash( 8, true );
		}

		$hashed = $wp_hasher->HashPassword( $key );

		$wpdb->update( $wpdb->users, array( 'user_activation_key' => $hashed ), array( 'user_login' => $user_login ) );

		// Send email notification
		WC()->mailer(); // load email classes
		do_action( 'woocommerce_reset_password_notification', $user_login, $key );

		return true;
	}

	/**
	 * Retrieves a user row based on password reset key and login.
	 *
	 * @uses $wpdb WordPress Database object
	 *
	 * @param string $key Hash to validate sending user's password
	 * @param string $login The user login
	 * @return WP_USER|bool User's database row on success, false for invalid keys
	 */
	public static function check_password_reset_key( $key, $login ) {
		global $wpdb, $wp_hasher;

		$key = preg_replace( '/[^a-z0-9]/i', '', $key );

		if ( empty( $key ) || ! is_string( $key ) ) {
			wc_add_notice( __( 'Invalid key', 'woocommerce' ), 'error' );
			return false;
		}

		if ( empty( $login ) || ! is_string( $login ) ) {
			wc_add_notice( __( 'Invalid key', 'woocommerce' ), 'error' );
			return false;
		}

		$user = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $wpdb->users WHERE user_login = %s", $login ) );

		if ( ! empty( $user ) ) {
			if ( empty( $wp_hasher ) ) {
				require_once ABSPATH . 'wp-includes/class-phpass.php';
				$wp_hasher = new PasswordHash( 8, true );
			}

			$valid = $wp_hasher->CheckPassword( $key, $user->user_activation_key );
		}

		if ( empty( $user ) || empty( $valid ) ) {
			wc_add_notice( __( 'Invalid key', 'woocommerce' ), 'error' );
			return false;
		}

		return get_userdata( $user->ID );
	}

	/**
	 * Handles resetting the user's password.
	 *
	 * @param object $user The user
	 * @param string $new_pass New password for the user in plaintext
	 */
	public static function reset_password( $user, $new_pass ) {
		do_action( 'password_reset', $user, $new_pass );

		wp_set_password( $new_pass, $user->ID );

		wp_password_change_notification( $user );
	}

	/**
	 * Show the add payment method page.
	 */
	public static function add_payment_method() {

		if ( ! is_user_logged_in() ) {

			wp_safe_redirect( wc_get_page_permalink( 'myaccount' ) );
			exit();

		} else {

			do_action( 'before_woocommerce_add_payment_method' );

			wc_print_notices();

			wc_get_template( 'myaccount/form-add-payment-method.php' );

			do_action( 'after_woocommerce_add_payment_method' );

		}

	}
}

