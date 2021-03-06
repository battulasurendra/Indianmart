<?php
/*
 * Contain all shortcodes for WooCommerce page builder
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Single product page builder
vc_map(array(
		"name" => __ ( "Single Product Image", 'dt_woocommerce_page_builder' ),
		"base" => "dtwpb_single_product_image",
		"category" => __ ( "DT Woo Single product", 'dt_woocommerce_page_builder' ),
		"icon" => "dt-vc-icon-dt_woo",
		"params" => array (
			array (
				"type" => "textfield",
				"heading" => __ ( "Extra class name", 'dt_woocommerce_page_builder' ),
				"param_name" => "el_class",
				'value'=>'',
				"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'dt_woocommerce_page_builder' )
			)
		)
));

vc_map(array(
		"name" => __ ( "Single Product Title", 'dt_woocommerce_page_builder' ),
		"base" => "dtwpb_single_product_title",
		"category" => __ ( "DT Woo Single product", 'dt_woocommerce_page_builder' ),
		"icon" => "dt-vc-icon-dt_woo",
		"params" => array (
			array (
				"type" => "textfield",
				"heading" => __ ( "Extra class name", 'dt_woocommerce_page_builder' ),
				"param_name" => "el_class",
				'value'=>'',
				"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'dt_woocommerce_page_builder' )
			)
		)
));

vc_map(array(
		"name" => __ ( "Single Product Rating", 'dt_woocommerce_page_builder' ),
		"base" => "dtwpb_single_product_rating",
		"category" => __ ( "DT Woo Single product", 'dt_woocommerce_page_builder' ),
		"icon" => "dt-vc-icon-dt_woo",
		"params" => array (
			array (
				"type" => "textfield",
				"heading" => __ ( "Extra class name", 'dt_woocommerce_page_builder' ),
				"param_name" => "el_class",
				'value'=>'',
				"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'dt_woocommerce_page_builder' )
			)
		)
));

vc_map(array(
		"name" => __ ( "Single Product Price", 'dt_woocommerce_page_builder' ),
		"base" => "dtwpb_single_product_price",
		"category" => __ ( "DT Woo Single product", 'dt_woocommerce_page_builder' ),
		"icon" => "dt-vc-icon-dt_woo",
		"params" => array (
			array (
				"type" => "textfield",
				"heading" => __ ( "Extra class name", 'dt_woocommerce_page_builder' ),
				"param_name" => "el_class",
				'value'=>'',
				"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'dt_woocommerce_page_builder' )
			)
		)
));

vc_map(array(
		"name" => __ ( "Single Product Excerpt", 'dt_woocommerce_page_builder' ),
		"base" => "dtwpb_single_product_excerpt",
		"category" => __ ( "DT Woo Single product", 'dt_woocommerce_page_builder' ),
		"icon" => "dt-vc-icon-dt_woo",
		"params" => array (
			array (
				"type" => "textfield",
				"heading" => __ ( "Extra class name", 'dt_woocommerce_page_builder' ),
				"param_name" => "el_class",
				'value'=>'',
				"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'dt_woocommerce_page_builder' )
			)
		)
));

vc_map(array(
		"name" => __ ( "Single Product Add To Cart", 'dt_woocommerce_page_builder' ),
		"base" => "dtwpb_single_product_add_to_cart",
		"category" => __ ( "DT Woo Single product", 'dt_woocommerce_page_builder' ),
		"icon" => "dt-vc-icon-dt_woo",
		"params" => array (
			array (
				"type" => "textfield",
				"heading" => __ ( "Extra class name", 'dt_woocommerce_page_builder' ),
				"param_name" => "el_class",
				'value'=>'',
				"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'dt_woocommerce_page_builder' )
			)
		)
));

vc_map(array(
		"name" => __ ( "Single Product Meta", 'dt_woocommerce_page_builder' ),
		"base" => "dtwpb_single_product_meta",
		"category" => __ ( "DT Woo Single product", 'dt_woocommerce_page_builder' ),
		"icon" => "dt-vc-icon-dt_woo",
		"params" => array (
			array (
				"type" => "textfield",
				"heading" => __ ( "Extra class name", 'dt_woocommerce_page_builder' ),
				"param_name" => "el_class",
				'value'=>'',
				"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'dt_woocommerce_page_builder' )
			)
		)
));

vc_map(array(
		"name" => __ ( "Single Product Share", 'dt_woocommerce_page_builder' ),
		"base" => "dtwpb_single_product_share",
		"category" => __ ( "DT Woo Single product", 'dt_woocommerce_page_builder' ),
		"icon" => "dt-vc-icon-dt_woo",
		"params" => array (
			array (
				"type" => "textfield",
				"heading" => __ ( "Extra class name", 'dt_woocommerce_page_builder' ),
				"param_name" => "el_class",
				'value'=>'',
				"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'dt_woocommerce_page_builder' )
			)
		)
));

vc_map(array(
		"name" => __ ( "Single Product Tabs", 'dt_woocommerce_page_builder' ),
		"base" => "dtwpb_single_product_tabs",
		"category" => __ ( "DT Woo Single product", 'dt_woocommerce_page_builder' ),
		"icon" => "dt-vc-icon-dt_woo",
		"params" => array (
			array (
				"type" => "textfield",
				"heading" => __ ( "Extra class name", 'dt_woocommerce_page_builder' ),
				"param_name" => "el_class",
				'value'=>'',
				"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'dt_woocommerce_page_builder' )
			)
		)
));

vc_map(array(
		"name" => __ ( "Single Product Additional Information", 'dt_woocommerce_page_builder' ),
		"base" => "dtwpb_single_product_additional_information",
		"category" => __ ( "DT Woo Single product", 'dt_woocommerce_page_builder' ),
		"icon" => "dt-vc-icon-dt_woo",
		"params" => array (
			array (
				"type" => "textfield",
				"heading" => __ ( "Extra class name", 'dt_woocommerce_page_builder' ),
				"param_name" => "el_class",
				'value'=>'',
				"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'dt_woocommerce_page_builder' )
			)
		)
));

vc_map(array(
		"name" => __ ( "Single Product Description", 'dt_woocommerce_page_builder' ),
		"base" => "dtwpb_single_product_description",
		"category" => __ ( "DT Woo Single product", 'dt_woocommerce_page_builder' ),
		"icon" => "dt-vc-icon-dt_woo",
		"params" => array (
			array (
				"type" => "textfield",
				"heading" => __ ( "Extra class name", 'dt_woocommerce_page_builder' ),
				"param_name" => "el_class",
				'value'=>'',
				"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'dt_woocommerce_page_builder' )
			)
		)
));

vc_map(array(
		"name" => __ ( "Single Product Reviews", 'dt_woocommerce_page_builder' ),
		"base" => "dtwpb_single_product_reviews",
		"category" => __ ( "DT Woo Single product", 'dt_woocommerce_page_builder' ),
		"icon" => "dt-vc-icon-dt_woo",
		"params" => array (
			array (
				"type" => "textfield",
				"heading" => __ ( "Extra class name", 'dt_woocommerce_page_builder' ),
				"param_name" => "el_class",
				'value'=>'',
				"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'dt_woocommerce_page_builder' )
			)
		)
));

vc_map(array(
		"name" => __ ( "Single Product Related Products", 'dt_woocommerce_page_builder' ),
		"base" => "dtwpb_single_product_related_products",
		"category" => __ ( "DT Woo Single product", 'dt_woocommerce_page_builder' ),
		"icon" => "dt-vc-icon-dt_woo",
		"params" => array (
			array (
				"type" => "textfield",
				"heading" => __ ( "Product Per Page", 'dt_woocommerce_page_builder' ),
				"param_name" => "posts_per_page",
				"value" => 4
			),
			array (
				"type" => "textfield",
				"heading" => __ ( "Columns", 'dt_woocommerce_page_builder' ),
				"param_name" => "columns",
				"value" => 4
			),
			array (
				"type" => "dropdown",
				"heading" => __ ( "Products Ordering", 'dt_woocommerce_page_builder' ),
				"param_name" => "orderby",
				'class' => 'dhwc-woo-product-page-dropdown',
				"value" => array (
					__ ( 'Publish Date', 'dt_woocommerce_page_builder' ) => 'date',
					__ ( 'Modified Date', 'dt_woocommerce_page_builder' ) => 'modified',
					__ ( 'Random', 'dt_woocommerce_page_builder' ) => 'rand',
					__ ( 'Alphabetic', 'dt_woocommerce_page_builder' ) => 'title',
					__ ( 'Popularity', 'dt_woocommerce_page_builder' ) => 'popularity',
					__ ( 'Rate', 'dt_woocommerce_page_builder' ) => 'rating',
					__ ( 'Price', 'dt_woocommerce_page_builder' ) => 'price'
				)
			),
			array (
				"type" => "textfield",
				"heading" => __ ( "Extra class name", 'dt_woocommerce_page_builder' ),
				"param_name" => "el_class",
				'value'=>'',
				"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'dt_woocommerce_page_builder' )
			)
		)
));

vc_map(array(
		"name" => __ ( "Single Product up-sells", 'dt_woocommerce_page_builder' ),
		"base" => "dtwpb_single_product_upsells",
		"category" => __ ( "DT Woo Single product", 'dt_woocommerce_page_builder' ),
		"icon" => "dt-vc-icon-dt_woo",
		"params" => array (
			array (
				"type" => "textfield",
				"heading" => __ ( "Product Per Page", 'dt_woocommerce_page_builder' ),
				"param_name" => "posts_per_page",
				"value" => 4
			),
			array (
				"type" => "textfield",
				"heading" => __ ( "Columns", 'dt_woocommerce_page_builder' ),
				"param_name" => "columns",
				"value" => 4
			),
			array (
				"type" => "dropdown",
				"heading" => __ ( "Products Ordering", 'dt_woocommerce_page_builder' ),
				"param_name" => "orderby",
				'class' => 'dhwc-woo-product-page-dropdown',
				"value" => array (
					__ ( 'Publish Date', 'dt_woocommerce_page_builder' ) => 'date',
					__ ( 'Modified Date', 'dt_woocommerce_page_builder' ) => 'modified',
					__ ( 'Random', 'dt_woocommerce_page_builder' ) => 'rand',
					__ ( 'Alphabetic', 'dt_woocommerce_page_builder' ) => 'title',
					__ ( 'Popularity', 'dt_woocommerce_page_builder' ) => 'popularity',
					__ ( 'Rate', 'dt_woocommerce_page_builder' ) => 'rating',
					__ ( 'Price', 'dt_woocommerce_page_builder' ) => 'price'
				)
			),
			array (
				"type" => "textfield",
				"heading" => __ ( "Extra class name", 'dt_woocommerce_page_builder' ),
				"param_name" => "el_class",
				'value'=>'',
				"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'dt_woocommerce_page_builder' )
			)
		)
));

/*
 * Support YITH WooCommerce Wishlist plugin
 */
if ( defined( 'YITH_WCWL' ) ){
	if ( get_option('yith_wcwl_button_position') == 'shortcode' ){}
		vc_map(array(
			"name" => __ ( "YITH WooCommerce Wishlist Single Add To Wishlist", 'dt_woocommerce_page_builder' ),
			"base" => "dtwpb_yith_wcwl_add_to_wishlist",
			"category" => __ ( "DT Woo Single product", 'dt_woocommerce_page_builder' ),
			"icon" => "dt-vc-icon-dt_woo",
			"params" => array (
				array (
					"type" => "textfield",
					"heading" => __ ( "Extra class name", 'dt_woocommerce_page_builder' ),
					"param_name" => "el_class",
					'value'=>'',
					"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'dt_woocommerce_page_builder' )
				)
			)
		));
}

/*
 * Support YITH WooCommerce Compare plugin
 */
if ( defined( 'YITH_WOOCOMPARE' ) ){
	if ( get_option('yith_woocompare_compare_button_in_product_page') == 'yes' )
		vc_map(array(
			"name" => __ ( "YITH WooCommerce Compare Single Add Compare Link", 'dt_woocommerce_page_builder' ),
			"base" => "dtwpb_yith_woocompare_compare_button_in_product_page",
			"category" => __ ( "DT Woo Single product", 'dt_woocommerce_page_builder' ),
			"icon" => "dt-vc-icon-dt_woo",
			"params" => array (
				array (
					"type" => "textfield",
					"heading" => __ ( "Extra class name", 'dt_woocommerce_page_builder' ),
					"param_name" => "el_class",
					'value'=>'',
					"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'dt_woocommerce_page_builder' )
				)
			)
		));
}

/*
 * Support WooCommerce_Germanized plugin
 */
if( class_exists('WooCommerce_Germanized') ){
	if ( get_option( 'woocommerce_gzd_display_product_detail_unit_price' ) == 'yes' )
		vc_map(array(
			"name" => __ ( "WooCommerce Germanized Single Price Unit", 'dt_woocommerce_page_builder' ),
			"base" => "dtwpb_gzd_template_single_price_unit",
			"category" => __ ( "DT Woo Single product", 'dt_woocommerce_page_builder' ),
			"icon" => "dt-vc-icon-dt_woo",
			"params" => array (
				array (
					"type" => "textfield",
					"heading" => __ ( "Extra class name", 'dt_woocommerce_page_builder' ),
					"param_name" => "el_class",
					'value'=>'',
					"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'dt_woocommerce_page_builder' )
				)
			)
		));
	
	if ( get_option( 'woocommerce_gzd_display_product_detail_tax_info' ) == 'yes' || get_option( 'woocommerce_gzd_display_product_detail_shipping_costs' ) == 'yes' )
		vc_map(array(
			"name" => __ ( "WooCommerce Germanized Single Legal Info", 'dt_woocommerce_page_builder' ),
			"base" => "dtwpb_gzd_template_single_legal_info",
			"category" => __ ( "DT Woo Single product", 'dt_woocommerce_page_builder' ),
			"icon" => "dt-vc-icon-dt_woo",
			"params" => array (
				array (
					"type" => "textfield",
					"heading" => __ ( "Extra class name", 'dt_woocommerce_page_builder' ),
					"param_name" => "el_class",
					'value'=>'',
					"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'dt_woocommerce_page_builder' )
				)
			)
		));
	
	if ( get_option( 'woocommerce_gzd_display_product_detail_delivery_time' ) == 'yes' )
		vc_map(array(
			"name" => __ ( "WooCommerce Germanized Single Delivery Time Info", 'dt_woocommerce_page_builder' ),
			"base" => "dtwpb_gzd_template_single_delivery_time_info",
			"category" => __ ( "DT Woo Single product", 'dt_woocommerce_page_builder' ),
			"icon" => "dt-vc-icon-dt_woo",
			"params" => array (
				array (
					"type" => "textfield",
					"heading" => __ ( "Extra class name", 'dt_woocommerce_page_builder' ),
					"param_name" => "el_class",
					'value'=>'',
					"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'dt_woocommerce_page_builder' )
				)
			)
		));
	
}

// Cart page builder
vc_map(array(
	"name" => __ ( "Cart Table", 'dt_woocommerce_page_builder' ),
	"base" => "dtwpb_cart_table",
	"category" => __ ( "DT Woo Cart", 'dt_woocommerce_page_builder' ),
	"icon" => "dt-vc-icon-dt_woo",
	"params" => array (
		array (
			"type" => "textfield",
			"heading" => __ ( "Extra class name", 'dt_woocommerce_page_builder' ),
			"param_name" => "el_class",
			'value'=>'',
			"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'dt_woocommerce_page_builder' )
		)
	)
));

vc_map(array(
	"name" => __ ( "Cart Totals", 'dt_woocommerce_page_builder' ),
	"base" => "dtwpb_cart_totals",
	"category" => __ ( "DT Woo Cart", 'dt_woocommerce_page_builder' ),
	"icon" => "dt-vc-icon-dt_woo",
	"params" => array (
		array (
			"type" => "textfield",
			"heading" => __ ( "Extra class name", 'dt_woocommerce_page_builder' ),
			"param_name" => "el_class",
			'value'=>'',
			"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'dt_woocommerce_page_builder' )
		)
	)
));


vc_map(array(
	"name" => __ ( "Cross Sells", 'dt_woocommerce_page_builder' ),
	"base" => "dtwpb_cross_sell",
	"category" => __ ( "DT Woo Cart", 'dt_woocommerce_page_builder' ),
	"icon" => "dt-vc-icon-dt_woo",
	"params" => array (
		array (
			"type" => "textfield",
			"heading" => __ ( "Product Per Page", 'dt_woocommerce_page_builder' ),
			"param_name" => "posts_per_page",
			"value" => 4
		),
		array (
			"type" => "textfield",
			"heading" => __ ( "Columns", 'dt_woocommerce_page_builder' ),
			"param_name" => "columns",
			"value" => 4
		),
		array (
			"type" => "dropdown",
			"heading" => __ ( "Products Ordering", 'dt_woocommerce_page_builder' ),
			"param_name" => "orderby",
			'class' => 'dhwc-woo-product-page-dropdown',
			"value" => array (
			__ ( 'Random', 'dt_woocommerce_page_builder' ) => 'rand',
			__ ( 'Publish Date', 'dt_woocommerce_page_builder' ) => 'date',
			__ ( 'Modified Date', 'dt_woocommerce_page_builder' ) => 'modified',
			__ ( 'Alphabetic', 'dt_woocommerce_page_builder' ) => 'title',
			__ ( 'Popularity', 'dt_woocommerce_page_builder' ) => 'popularity',
			__ ( 'Rate', 'dt_woocommerce_page_builder' ) => 'rating',
			__ ( 'Price', 'dt_woocommerce_page_builder' ) => 'price'
				)
		),
		array (
			"type" => "textfield",
			"heading" => __ ( "Extra class name", 'dt_woocommerce_page_builder' ),
			"param_name" => "el_class",
			'value'=>'',
			"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'dt_woocommerce_page_builder' )
		)
	)
));

// Checkout page builder
vc_map(array(
	"name" => __ ( "Checkout Before Customer Details", 'dt_woocommerce_page_builder' ),
	"base" => "dtwpb_checkout_before_customer_details",
	"category" => __ ( "DT Woo Checkout", 'dt_woocommerce_page_builder' ),
	"icon" => "dt-vc-icon-dt_woo",
	"description" => __ ( "Required. Add before 'Billing Information element'.", 'dt_woocommerce_page_builder' ),
	"params" => array (
		array (
			"type" => "textfield",
			"heading" => __ ( "Extra class name", 'dt_woocommerce_page_builder' ),
			"param_name" => "el_class",
			'value'=>'',
			"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'dt_woocommerce_page_builder' )
		)
	)
));

vc_map(array(
	"name" => __ ( "Billing Information", 'dt_woocommerce_page_builder' ),
	"base" => "dtwpb_form_billing",
	"category" => __ ( "DT Woo Checkout", 'dt_woocommerce_page_builder' ),
	"icon" => "dt-vc-icon-dt_woo",
	"params" => array (
		array (
			"type" => "textfield",
			"heading" => __ ( "Extra class name", 'dt_woocommerce_page_builder' ),
			"param_name" => "el_class",
			'value'=>'',
			"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'dt_woocommerce_page_builder' )
		)
	)
));

vc_map(array(
	"name" => __ ( "Shipping information form", 'dt_woocommerce_page_builder' ),
	"base" => "dtwpb_form_shipping",
	"category" => __ ( "DT Woo Checkout", 'dt_woocommerce_page_builder' ),
	"icon" => "dt-vc-icon-dt_woo",
	"params" => array (
		array (
			"type" => "textfield",
			"heading" => __ ( "Extra class name", 'dt_woocommerce_page_builder' ),
			"param_name" => "el_class",
			'value'=>'',
			"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'dt_woocommerce_page_builder' )
		)
	)
));

vc_map(array(
	"name" => __ ( "Checkout After Customer Details", 'dt_woocommerce_page_builder' ),
	"base" => "dtwpb_checkout_after_customer_details",
	"category" => __ ( "DT Woo Checkout", 'dt_woocommerce_page_builder' ),
	"icon" => "dt-vc-icon-dt_woo",
	"description" => __ ( "Required. Add after 'Shipping information form'.", 'dt_woocommerce_page_builder' ),
	"params" => array (
		array (
			"type" => "textfield",
			"heading" => __ ( "Extra class name", 'dt_woocommerce_page_builder' ),
			"param_name" => "el_class",
			'value'=>'',
			"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'dt_woocommerce_page_builder' )
		)
	)
));

vc_map(array(
	"name" => __ ( "Order review", 'dt_woocommerce_page_builder' ),
	"base" => "dtwpb_checkout_order_review",
	"category" => __ ( "DT Woo Checkout", 'dt_woocommerce_page_builder' ),
	"icon" => "dt-vc-icon-dt_woo",
	"params" => array (
		array (
			"type" => "textfield",
			"heading" => __ ( "Extra class name", 'dt_woocommerce_page_builder' ),
			"param_name" => "el_class",
			'value'=>'',
			"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'dt_woocommerce_page_builder' )
		)
	)
));

// My Account page before login builder
vc_map(array(
	"name" => __ ( "My Account Login Form", 'dt_woocommerce_page_builder' ),
	"base" => "dtwpb_woocommerce_myaccount_form_login",
	"category" => __ ( "DT Woo My Account Before Login", 'dt_woocommerce_page_builder' ),
	"icon" => "dt-vc-icon-dt_woo",
	"params" => array (
		array (
			"type" => "textfield",
			"heading" => __ ( "Extra class name", 'dt_woocommerce_page_builder' ),
			"param_name" => "el_class",
			'value'=>'',
			"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'dt_woocommerce_page_builder' )
		)
	)
));

vc_map(array(
	"name" => __ ( "My Account Register Form", 'dt_woocommerce_page_builder' ),
	"base" => "dtwpb_woocommerce_myaccount_form_register",
	"category" => __ ( "DT Woo My Account Before Login", 'dt_woocommerce_page_builder' ),
	"icon" => "dt-vc-icon-dt_woo",
	"params" => array (
		array (
			"type" => "textfield",
			"heading" => __ ( "Extra class name", 'dt_woocommerce_page_builder' ),
			"param_name" => "el_class",
			'value'=>'',
			"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'dt_woocommerce_page_builder' )
		)
	)
));

// My Account page builder
vc_map(array(
	"name" => __ ( "My Account Dashboard", 'dt_woocommerce_page_builder' ),
	"base" => "dtwpb_woocommerce_myaccount_dashboard",
	"category" => __ ( "DT Woo My Account", 'dt_woocommerce_page_builder' ),
	"icon" => "dt-vc-icon-dt_woo",
	'description' => __( 'Shows account dashboard.', 'dt_woocommerce_page_builder' ),
	"params" => array (
		array(
			'type' => 'textarea_html',
			'heading' => __( 'Custom My Account Dashboard', 'dt_woocommerce_page_builder' ),
			'value' => '',
			'save_always' => true,
			'param_name' => 'content',
			'description' => __( 'Overridden woocommerce/myaccount/dashboard.php. Leave blank to use the template dashboard.php file', 'dt_woocommerce_page_builder' ),
		),
		array (
			"type" => "textfield",
			"heading" => __ ( "Extra class name", 'dt_woocommerce_page_builder' ),
			"param_name" => "el_class",
			'value'=>'',
			"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'dt_woocommerce_page_builder' )
		)
	)
));

vc_map(array(
	"name" => __ ( "My Account Orders", 'dt_woocommerce_page_builder' ),
	"base" => "dtwpb_woocommerce_myaccount_orders",
	"category" => __ ( "DT Woo My Account", 'dt_woocommerce_page_builder' ),
	"icon" => "dt-vc-icon-dt_woo",
	'description' => __( 'Shows orders on the account page.', 'dt_woocommerce_page_builder' ),
	"params" => array (
		array (
			"type" => "textfield",
			"heading" => __ ( "Extra class name", 'dt_woocommerce_page_builder' ),
			"param_name" => "el_class",
			'value'=>'',
			"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'dt_woocommerce_page_builder' )
		)
	)
));

vc_map(array(
	"name" => __ ( "My Account Downloads", 'dt_woocommerce_page_builder' ),
	"base" => "dtwpb_woocommerce_myaccount_downloads",
	"category" => __ ( "DT Woo My Account", 'dt_woocommerce_page_builder' ),
	"icon" => "dt-vc-icon-dt_woo",
	'description' => __( 'Shows orders on the account page.', 'dt_woocommerce_page_builder' ),
	"params" => array (
		array (
			"type" => "textfield",
			"heading" => __ ( "Extra class name", 'dt_woocommerce_page_builder' ),
			"param_name" => "el_class",
			'value'=>'',
			"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'dt_woocommerce_page_builder' )
		)
	)
));

vc_map(array(
	"name" => __ ( "My Account Addresses", 'dt_woocommerce_page_builder' ),
	"base" => "dtwpb_woocommerce_myaccount_addresses",
	"category" => __ ( "DT Woo My Account", 'dt_woocommerce_page_builder' ),
	"icon" => "dt-vc-icon-dt_woo",
	'description' => __( 'My Addresses.', 'dt_woocommerce_page_builder' ),
	"params" => array (
		/*array(
			'type' => 'textarea_html',
			'heading' => __( 'Custom My Account Addresses Description', 'dt_woocommerce_page_builder' ),
			'value' => '',
			'save_always' => true,
			'param_name' => 'content',
			'description' => __( 'filter woocommerce_my_account_my_address_description', 'dt_woocommerce_page_builder' ),
		),*/
		array (
			"type" => "textfield",
			"heading" => __ ( "Extra class name", 'dt_woocommerce_page_builder' ),
			"param_name" => "el_class",
			'value'=>'',
			"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'dt_woocommerce_page_builder' )
		)
	)
));

vc_map(array(
	"name" => __ ( "My Account Details", 'dt_woocommerce_page_builder' ),
	"base" => "dtwpb_woocommerce_myaccount_edit_account",
	"category" => __ ( "DT Woo My Account", 'dt_woocommerce_page_builder' ),
	"icon" => "dt-vc-icon-dt_woo",
	'description' => __( 'Edit account form.', 'dt_woocommerce_page_builder' ),
	"params" => array (
		array (
			"type" => "textfield",
			"heading" => __ ( "Extra class name", 'dt_woocommerce_page_builder' ),
			"param_name" => "el_class",
			'value'=>'',
			"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'dt_woocommerce_page_builder' )
		)
	)
));

vc_map(array(
	"name" => __ ( "My Account Logout", 'dt_woocommerce_page_builder' ),
	"base" => "dtwpb_woocommerce_myaccount_logout",
	"category" => __ ( "DT Woo My Account", 'dt_woocommerce_page_builder' ),
	"icon" => "dt-vc-icon-dt_woo",
	'description' => '',
	"params" => array (
		array (
			"type" => "textfield",
			"heading" => __ ( "Extra class name", 'dt_woocommerce_page_builder' ),
			"param_name" => "el_class",
			'value'=>'',
			"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'dt_woocommerce_page_builder' )
		)
	)
));
