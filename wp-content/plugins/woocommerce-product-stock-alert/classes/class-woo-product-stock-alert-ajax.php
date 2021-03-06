<?php
class WOO_Product_Stock_Alert_Ajax {

	public function __construct() {
		
		// Save customer email in database
		add_action( 'wp_ajax_alert_ajax', array(&$this, 'stock_alert_function') );
		add_action( 'wp_ajax_nopriv_alert_ajax', array(&$this, 'stock_alert_function') );
		
		// Show Alert Box for Out of Stock Product
		add_action( 'wp_ajax_alert_box_ajax', array(&$this, 'alert_box_function') );
		add_action( 'wp_ajax_nopriv_alert_box_ajax', array(&$this, 'alert_box_function') );

		// Delete unsubscribed users
		add_action( 'wp_ajax_unsubscribe_button', array($this, 'unsubscribe_users') );
		add_action( 'wp_ajax_nopriv_unsubscribe_button', array($this, 'unsubscribe_users') );
		
		// Export data
		add_action( 'wp_ajax_export_subscribers', array($this, 'export_stock_alert_data') );
	}
	
	function export_stock_alert_data() {
		$headers_str = '';
		$headers_arr = $all_products = $all_products = $get_subscribed_user = $stock_alert_export_datas = array();
		$file_name = 'list_subscribers.csv';
		
		// Set page headers to force download of CSV
		header("Content-type: text/x-csv");
		header("Content-Disposition: File Transfar");
		header("Content-Disposition: attachment;filename={$file_name}");
		
		// Set CSV headers
		$headers = array(
			'product_id',
			'subscribers'
		);
		
		foreach($headers as $header) {
			$headers_arr[] = '"' . $header . '"';
		}
		$headers_str = implode(',', $headers_arr);
		
		$all_products = get_posts(
			array(
				'post_type' => 'product',
				'post_status' => 'publish',
				'numberposts' => -1
			)
		);
		
		if( !empty($all_products) && is_array($all_products) ) {
			foreach( $all_products as $products_each ) {
				$child_ids = $product_obj = array();
				$product_obj = wc_get_product( $products_each->ID );
				if( $product_obj->is_type('variable') ) {
					if( $product_obj->has_child() ) {
						$child_ids = $product_obj->get_children();
						if( isset($child_ids) && !empty($child_ids) ) {
							foreach( $child_ids as $child_id ) {
								$all_product_ids[] = $child_id;
							}
						}
					}
				} else {
					$all_product_ids[] = $products_each->ID;
				}
			}
		}
		
		if( !empty($all_product_ids) && is_array($all_product_ids) ) {
			foreach( $all_product_ids as $all_product_id ) {
				$_product_subscriber = get_post_meta($all_product_id, '_product_subscriber', true);
				if ( $_product_subscriber && !empty($_product_subscriber) ) {
					$get_subscribed_user[$all_product_id] = get_post_meta( $all_product_id, '_product_subscriber', true );
				}
			}
		}
		
		if( isset($get_subscribed_user) && !empty($get_subscribed_user) ) {
			foreach( $get_subscribed_user as $pro_id => $subscribers ) {
				$subscribers_string = implode(",", $subscribers);
				$stock_alert_export_datas[] = array(
					'"#'.$pro_id.'"',
					'"'.$subscribers_string.'"'
				);
			}
		}
		
		echo $headers_str;
		if( isset($stock_alert_export_datas) && !empty($stock_alert_export_datas) ) {
			foreach( $stock_alert_export_datas as $stock_alert_export_data ) {
				echo "\r\n";
				echo implode(",", $stock_alert_export_data);
			}
		}
		
		exit();
	}

	function unsubscribe_users() {

		$customer_email = sanitize_email($_POST['customer_email']);
		$product_id = (int)$_POST['product_id'];
		$current_subscriber = array();
		$success = 'false';

		$current_subscriber = get_post_meta( $product_id, '_product_subscriber', true );
		
		if( isset($current_subscriber) && !empty($current_subscriber) ) {
			if( in_array( $customer_email, $current_subscriber ) ) {
				$found_key = array_search( $customer_email, $current_subscriber );
				unset($current_subscriber[$found_key]);
				update_post_meta( $product_id, '_product_subscriber', $current_subscriber );
				$success = 'true';
			}
		}

		$interest_persons = get_no_subscribed_persons($product_id);
		$product = wc_get_product($product_id);
		if(!empty($interest_persons) && $interest_persons != 0){
			if($product->get_parent_id() != 0){
				update_post_meta($product->get_parent_id(), 'no_of_subscribers', $interest_persons);
			}else{
				update_post_meta($product_id, 'no_of_subscribers', $interest_persons);
			}
		}else{
			delete_post_meta( $product_id, '_product_subscriber' );
			delete_post_meta( $product_id, 'no_of_subscribers' );
		}
		
		echo $success;

		die();
	}
	
	function stock_alert_function() {
		$customer_email = sanitize_email($_POST['email']);
		$product_id = (int)$_POST['product_id'];
		$status = '';
		$current_subscriber = array();
		$admin_email = '';
		$admin_email = get_option('admin_email');

		$current_subscriber = get_post_meta( $product_id, '_product_subscriber', true );
		$admin_mail = WC()->mailer()->emails['WC_Admin_Email_Stock_Alert'];
		$cust_mail = WC()->mailer()->emails['WC_Subscriber_Confirmation_Email_Stock_Alert'];

		if( empty($current_subscriber) ) {
			$current_subscriber = array( $customer_email );
			$status = update_post_meta( $product_id, '_product_subscriber', $current_subscriber );

			$admin_mail->trigger( $admin_email, $product_id, $customer_email );
			$cust_mail->trigger( $customer_email, $product_id );
			
		} else {
			if( !in_array( $customer_email, $current_subscriber ) ) {
				array_push( $current_subscriber, $customer_email );
				$status = update_post_meta( $product_id, '_product_subscriber', $current_subscriber );

				$admin_mail->trigger( $admin_email, $product_id, $customer_email );
				$cust_mail->trigger( $customer_email, $product_id );
				
			} else {
				$status = '/*?%already_registered%?*/';
			}
		}

		$interest_persons = get_no_subscribed_persons($product_id);
		$product = wc_get_product($product_id);
		if(!empty($interest_persons) && $interest_persons != 0){
			if($product->get_parent_id() != 0){
				update_post_meta($product->get_parent_id(), 'no_of_subscribers', $interest_persons);
			}else{
				update_post_meta($product_id, 'no_of_subscribers', $interest_persons);
			}
		}else{
			delete_post_meta( $product_id, 'no_of_subscribers' );
		}
		
		echo $status;
		
		die();
	}
	
	
	function alert_box_function() {
		
		$child_id = (int)$_POST['child_id'];
		$display_stock_alert_form = 'false';
		
		if( $child_id && !empty($child_id) ) {
			$child_obj = new WC_Product_Variation($child_id);
			$dc_settings = get_dc_plugin_settings();
			$stock_quantity = $child_obj->get_stock_quantity();
			$manage_stock = $child_obj->get_manage_stock();
			$managing_stock = $child_obj->managing_stock();
			$stock_status = $child_obj->get_stock_status();
                        
                        $is_in_stock = $child_obj->is_in_stock();
                        $is_on_backorder = $child_obj->is_on_backorder( 1 );

                        if ( ! $is_in_stock ) {
                                $display_stock_alert_form = 'true';
                        } elseif ( $managing_stock && $is_on_backorder && isset($dc_settings['is_enable_backorders']) && $dc_settings['is_enable_backorders'] == 'Enable' ) {
                                $display_stock_alert_form = 'true';
                        } elseif ( $managing_stock ) {
                            if(get_option('woocommerce_notify_no_stock_amount')){
                                if($stock_quantity <= (int) get_option('woocommerce_notify_no_stock_amount') && isset($dc_settings['is_enable_backorders']) && $dc_settings['is_enable_backorders'] == 'Enable' ){
                                    $display_stock_alert_form = 'true';
                                }
                            }
                        }

//			if( isset($stock_quantity) && $manage_stock ) {
//				if($managing_stock && $stock_quantity <= (int)get_option( 'woocommerce_notify_no_stock_amount' )){ 
//					if( $child_obj->backorders_allowed() && isset($dc_settings['is_enable_backorders']) && $dc_settings['is_enable_backorders'] == 'Enable') {
//						if( $stock_status == 'outofstock' || $stock_quantity  <= 0 ) {
//							$display_stock_alert_form = 'true';
//						}
//					} else {
//						$display_stock_alert_form = 'true';
//					}
//				}elseif( $stock_quantity <= 0 ) {
//					if( $child_obj->backorders_allowed() && isset($dc_settings['is_enable_backorders']) && $dc_settings['is_enable_backorders'] == 'Enable') {
//						if( $stock_status == 'outofstock' || $stock_quantity  <= 0 ) {
//							$display_stock_alert_form = 'true';
//						}
//					} else {
//						$display_stock_alert_form = 'true';
//					}
//				}
//			}
		}
			
		echo $display_stock_alert_form;
		
		die();
	}

}
