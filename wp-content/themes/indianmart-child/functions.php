<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

add_filter( 'login_url', 'my_login_page', 10, 3 );
function my_login_page( $login_url, $redirect, $force_reauth ) {
    return home_url( '/my-account/?redirect_to=' . urlencode ( $redirect ) );
}

add_filter( 'woocommerce_login_redirect', 'wc_custom_user_redirect', 10, 2 );
function wc_custom_user_redirect( $redirect, $user ) {
	// Get the first of all the roles assigned to the user
	$role = $user->roles[0];
	$dashboard = admin_url();
	$myaccount = get_permalink( wc_get_page_id( 'myaccount' ) );
    
    if( $_GET['redirect_to'] ) {
        $referer = $_GET['redirect_to']; //When the referer page was a redirection
    } else{
        $referer = wp_get_referer();
    }
    
	if( $role == 'administrator' ) {
        
		$redirect = $referer ? $referer : $dashboard;
        
	} elseif ( $role == 'shop-manager' ) {
        
		$redirect = $dashboard;
        
	} elseif ( $role == 'editor' ) {
        
		$redirect = $dashboard;
        
	} elseif ( $role == 'author' ) {
        
		$redirect = $dashboard;
        
	} elseif ( $role == 'customer' || $role == 'subscriber' ) {
        
		$redirect =$referer ? $referer : $myaccount;
        
	} else {
        
		$redirect = $referer ? $referer : home_url();
        
	}
	return $redirect;
}

//add_filter( 'template_include', 'first_time_landing_page', 99 );
function first_time_landing_page( $template ) {
    if(is_page(22)){
        if(isset($_COOKIE['siteFirstVisit']) && $_COOKIE['siteFirstVisit']){
			
		} elseif (is_feed()) {
			//If feed page we will do nothing or will be a bug :D
			//https://wordpress.org/support/topic/rss-feed-not-working-if-redirect-wordpress-to-welcome-or-landing-page-is-on
		} else {
            //days * hours * minutes * seconds
            $expiration = 30*24*60*60; //for 30 days
            setcookie('siteFirstVisit', true, time()+$expiration);
            $new_template = locate_template( array('page-about.php') );
            if ( $new_template != '' ) {
                return $new_template ;
            }
        }
    }
    
    if(is_page(38)){
        if(isset($_COOKIE['siteFirstVisit']) && $_COOKIE['siteFirstVisit']){
			
		} elseif (is_feed()) {
			//If feed page we will do nothing or will be a bug :D
			//https://wordpress.org/support/topic/rss-feed-not-working-if-redirect-wordpress-to-welcome-or-landing-page-is-on
		} else {
            $expiration = 30*24*60*60; //for 30 days
            setcookie('siteFirstVisit', true, time()+$expiration);
        }
    }
    return $template;
}

add_filter( 'template_include', 'submit_redirect', 98 );
function submit_redirect( $template ) {
    if(is_page(358) && !is_user_logged_in()){
        $url = get_permalink( get_option('woocommerce_myaccount_page_id') );
        $url .= '?redirect_to=' . urlencode(get_permalink()) ;
        wp_redirect( $url );
        exit;
    }
    if(is_page(638) && !is_user_logged_in()){
        $url = get_permalink( get_option('woocommerce_myaccount_page_id') );
        $url .= '?redirect_to=' . urlencode(get_permalink()) ;
        wp_redirect( $url );
        exit;
    }
    return $template;
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

// Register Custom Navigation Walker
require_once('wp-bootstrap-navwalker.php');

function wpdocs_dequeue_dashicon() {
    if (current_user_can( 'update_core' )) {
        return;
    }
    wp_deregister_style('dashicons');
}
add_action( 'wp_enqueue_scripts', 'wpdocs_dequeue_dashicon' );

if ( !function_exists( 'chld_thm_cfg_parent_css_first' ) ):
    function chld_thm_cfg_parent_css_first() {
        wp_deregister_script('jquery');
        wp_register_script('jquery', get_stylesheet_directory_uri(). '/js/jquery.min.js', false, '3.1.1');
        
        wp_enqueue_script( 'jquery-migrate-file', get_stylesheet_directory_uri(). '/js/jquery-migrate-3.0.0.min.js');
        wp_enqueue_script( 'plugins-Js', get_stylesheet_directory_uri(). '/js/all.min.js');
    }
endif;

if ( !function_exists( 'chld_thm_cfg_parent_css_last' ) ):
    function chld_thm_cfg_parent_css_last() {
        
        wp_enqueue_script( 'custom-Js', get_stylesheet_directory_uri(). '/js/custom.js');
        
        wp_enqueue_style( 'custom-plugins-css',  get_stylesheet_directory_uri(). '/css/all.min.css', array() );
                
        wp_enqueue_style( 'chld_thm_cfg_parent', get_stylesheet_uri(), array(), 1.1 );
        wp_enqueue_style( 'style-responsive', get_stylesheet_directory_uri(). '/style-responsive.css', array(), 1.1 );

        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
        
        wp_localize_script( 'custom-Js', 'im_ajax', array(
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'security' => wp_create_nonce( 'ajax-security-string' )
        ));
    }
endif;

add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css_first', 1);
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css_last', 998);

/*Remove edit link in the bottom of page*/
add_filter( 'edit_post_link', '__return_false' );

function register_my_menus() {
    register_nav_menus(
        array(
            'header-submenu' => __( 'Header submenu' ),
            'footer-menu1' => __( 'Footer Menu(Home)' ),
            'footer-menu2' => __( 'Footer Menu(Shopping)' ),
            'footer-menu3' => __( 'Footer Menu(Contact Info)' )
        )
    );
}
add_action( 'init', 'register_my_menus' );

add_action('wp_head','jg_user_nav_visibility');
function jg_user_nav_visibility() {

    if ( is_user_logged_in() ) {
        $output="<style> .loginBtn { display: none !important; } </style>";
    } else {
        $output="<style> .myAcntBtn { display: none !important; } </style>";
    }

    echo $output;
}

// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php).
// Compatible with 3.0.1+, for lower versions, remove "woocommerce_" from the first mention on Line 4
add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
 
function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	
	?>
	<a href="<?php echo wc_get_cart_url(); ?>" class="cart-link " title="<?php _e( 'View your shopping cart' ); ?>">My Bag <i class="svgSprite size1 svgicon-menu5 alpha"></i><span class="cart-count"><?php echo sprintf ( _n( '%d', '%d', count(WC()->cart->get_cart()) ), count(WC()->cart->get_cart()) ); ?></span></a>
	<?php
	
	$fragments['a.cart-customlocation'] = ob_get_clean();
    $fragments['cart_count'] = sprintf ( _n( '%d', '%d', count(WC()->cart->get_cart()) ), count(WC()->cart->get_cart()) );
    $fragments['cart_link'] = wc_get_cart_url();
	
	return $fragments;
}

add_filter( 'woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments', 10, 1 );

function iconic_cart_count_fragments( $fragments ) {
    
    $fragments['span.cart-count'] = '<span class="cart-count">' . count(WC()->cart->get_cart()) . '</span>';
    return $fragments;
}

/*add_action('woocommerce_before_mini_cart', 'update_cart_count');

function update_cart_count(){
    global $woocommerce;
    echo '<script>jQuery(".cart-count").html('. count(WC()->cart->get_cart()) .')</script>';
}*/

add_filter('woocommerce_available_variation', function ($value, $object = null, $variation = null) {
    if ($value['price_html'] == '') {
        $value['price_html'] = '<span class="price">' . $variation->get_price_html() . '</span>';
    }
    return $value;
}, 10, 3);

function dateChangeIST($d){
    $timestamp = strtotime($d);
    date_default_timezone_set("Asia/Calcutta");
    return date('M j, Y', $timestamp);
}

function get_products_custom($atts){
    global $wpdb;
    $result = '';
        
    $atts = shortcode_atts(array(
        'post_type' => 'product',
        'total_products' => 10,
        'orderby' => 'date',
        'order' => 'desc',
        'product_cat' => ''
    ), $atts );
    
    $args = array(
        'post_type' => $atts['post_type'],
        'posts_per_page' => $atts['total_products'],
        'orderby' => $atts['orderby'],
        'order' => $atts['order'],
        'product_cat' => $atts['product_cat'],
        'meta_query' =>  array(
            array(
                'key' => '_stock_status',
                'value' => 'instock',
                'compare' => '='
            )
        )
    );
    
    if($atts['product_cat']){
        $catLink = get_category_link($atts['product_cat']);
    } else{
        $catLink = get_permalink( wc_get_page_id( 'shop' ) );
    }
    
    $posts = get_posts($args);
    if( $posts ){
        $result = '<div class="prodSlider owl-carousel">';
        foreach( $posts as $post ):
            $result .= custom_product_structure($post->ID);
        endforeach;
        $result .= '</div>
            <div class="exploreRow text-center">
                <div class="btnHolder inline">
                    <a href="'. $catLink .'" class="btn nakedBtn blackArrow fullRangeBtn">Explore the full range</a>
                </div>
            </div>';
    }    
    echo $result;
        wp_reset_postdata();
        wp_reset_query();
}
add_shortcode( 'custom_prod_slider', 'get_products_custom' );

function custom_product_structure($post_id){
    $html = '';
    $product = wc_get_product($post_id);
    $prodLink = get_permalink( $post_id );
    $extraClass = $product->is_on_sale() ? 'sale' : 'normal';
    $sale_off = 0;
    $saleText = '';
    
    if(('' != $product->get_stock_quantity()) && ($product->get_stock_quantity() < 10)){
        $stock = 'Only '.$product->get_stock_quantity() .' left';
    } else {
        $stock = '';
    }
    /*************** Add to cart button classes and quantity function taken from woocommerce ***************/
    $class = implode( ' ', array_filter( array(
                'btn noarrow cartBtn',
                'product_type_' . $product->get_type(),
                $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                $product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
    ) ) );
    /*************** Add to cart button classes and quantity function taken from woocommerce ***************/

    /*************** Price row depends on product type ***************/        
    $priceText = '';
    $cartText = '';
    if($product->get_type() == 'variable'){
        $i = 0;
        $varOptions = $product->get_available_variations();
        $priceText.= '<div class="prodOptions variableOptionsList dropdown btnHolder">';
        foreach ($varOptions as $key => $value) {
            ++$i;

            $arr = $value['attributes'];
            $attr = array_keys($arr)[0];
            $id = $value['variation_id'];
            $val = implode('/',$value['attributes']);
            
            $variable_product = new WC_Product_Variation( $id );
            if($variable_product->is_on_sale()){
                $percentage = round( ( ( $variable_product->regular_price - $variable_product->sale_price ) / $variable_product->regular_price ) * 100 );
                
                $sale_off = ($percentage > $sale_off) ? $percentage : $sale_off;
            }
            // Removing 'attribute_' from Product attribute slugs
            $term_attribute = str_replace('attribute_', '', $attr);
            $arr_name_object = get_term_by( 'slug', $val, $term_attribute );

            // Get the attribute name value (instead of the slug)
            $arr_name = $arr_name_object->name;

            if($i==1){
                $attr1 = $attr;
                $id1 = $id;
                $val1 = $val;

                $priceText.= '
                <button class="prodOptionBtn btn dropdown-toggle grayArrow nakedBtn noeffect" type="button" data-toggle="dropdown">'.$arr_name.' - '.$value['price_html'].'
                </button><ul class="dropdown-menu"><li class="prodVariableOptions prodTilePrice selected" data-variation_id="'.$id.'" data-variation="'.$arr_name.'" data-attribute="'.$attr.'">'.$arr_name.' - '.$value['price_html'].'</li>';
            } else {
                $priceText.= '<li class="prodVariableOptions prodTilePrice" data-variation_id="'.$id.'" data-variation="'.$val.'" data-attribute="'.$attr.'">'.$arr_name.' - '.$value['price_html'].'</li>';
            }
        }
        
        if($product->is_on_sale()){
            $saleText = '<div class="prodSale"><div class="sale-text">'. $sale_off .'% off</div></div>';
        }

        $priceText.= '</ul></div>';
        $cartText.='<div class="addCart btnHolder">
            '.sprintf( '<a rel="nofollow" href="%s" data-quantity="1" data-product_id="%s" data-product_sku="%s" data-variation_id="%s" data-variation="%s" data-attribute="%s" class="%s custom_alpha">ADD <i class="cartBtnBag"></i></a>',
                esc_url( $product->add_to_cart_url() ),
                esc_attr( $product->get_id() ),
                esc_attr( $product->get_sku() ),
                esc_attr( $id1 ),
                esc_attr( $val1 ),
                esc_attr( $attr1 ),
                esc_attr( isset( $class ) ? $class : 'btn noarrow cartBtn' )
            ) .'
        </div>';        
    } else if($product->get_type() == 'simple'){
        if($product->is_on_sale()){
            $sale_off = round( ( ( $product->regular_price - $product->sale_price ) / $product->regular_price ) * 100 );
            $saleText = '<div class="prodSale"><div class="sale-text">'. $sale_off .'% off</div></div>';
        }
        
        $priceText.= '<div class="prodTilePrice prodOptions">' . $product->get_price_html() . '</div>';
        $cartText.= '
        <div class="addCart btnHolder">
            '.sprintf( '<a rel="nofollow" href="%s" data-quantity="1" data-product_id="%s" data-product_sku="%s" class="%s">ADD <i class="cartBtnBag"></i></a>',
                esc_url( $product->add_to_cart_url() ),
                esc_attr( $product->get_id() ),
                esc_attr( $product->get_sku() ),
                esc_attr( isset( $class ) ? $class : 'btn noarrow cartBtn' )
            ) .'
        </div>';
    }
    /*************** Price row depends on product type ***************/
    $html_cart = apply_filters( 'wcps_filter_cart', do_shortcode('[add_to_cart_url id="'.$post_id.'"]') );
    
    
    $html .= '
    <div class="prodSlide inline">
        <div class="prodTile inline '.$extraClass.'">
            '.$saleText.'
            <div class="prodTileImg">
                <a href="' . $prodLink . '">' . $product->get_image() . '</a>
            <div class="prodWishlistIcon">';
    if(is_user_logged_in()):
        ob_start();
        do_action( 'custom_whishlist_button_action_loop' );
        $html .= ob_get_contents();
        ob_end_clean();
    endif;
    $html .= '</div></div>
            <div class="prodTileContent">
                <div class="prodTileRow1">
                    <div class="prodTileHead">
                        <a href="' . $prodLink . '"><h5 title="'.$product->name.'">' . productNameTrim($product->name) . '</h5></a>
                    </div>
                </div>
                <div class="prodTileRow2 text-left">'.$priceText.'</div>
                <div class="prodTileRow3">
                    <div class="tileQuantitySec">
                        <div class="input-group quantity">
                            <span class="qntyText input-group-addon">Qty</span>
                            <input type="number" class="form-control text-center productQuantity" min="1" max="99" step="1" value="1">
                        </div>
                    </div>
                    '.$cartText.'
                </div>
                <div class="prodTileRow4 text-left">'/*.$stock*/.'</div>
            </div>
        </div>
    </div>';
    return $html;
}

function productNameTrim($name){
    if(strlen($name) > 20){
        $name = preg_replace('/((\w+\W*){2}(\w+))(.*)/', '${1}', $name) .'..';
    }
    
    if (strlen($name) > 20){
        $name = preg_replace('/((\w+\W*){1}(\w+))(.*)/', '${1}', $name) .'..';
    }
    
    if (strlen($name) > 20){
        $name = preg_replace('/((\w+\W*){1}(\w+))(.*)/', '${1}', $name) .'..';
    }
    
    return $name;
}

function recipe_homepage_slider($atts) {
    global $wpdb;
    $msg = '';
        
    $atts = shortcode_atts(array(
        'post_type' => 'recipe',
        'total_posts' => 3,
        'orderby' => 'meta_value_num',
        'order' => 'desc'
    ), $atts );
    
    $args = array(
        'post_type'         => $atts['post_type'],
        'post_status'       => array( 'published' ),
        'posts_per_page'    => $atts['total_posts'],
        'meta_key'          => 'votes_count',
        'orderby'           => $atts['orderby'],
        'order'             => $atts['order']
    );
        
    // Retrieve posts
    $loop = new WP_Query($args);
    
    if($loop->have_posts()){
        $msg = '<div class="recipeSlider owl-carousel">';
        
        while($loop->have_posts()):
            $loop->the_post();
            $diet = types_render_field("recipe-kind", array());
            $dietClass = ($diet == 'Veg') ? 'V' : 'N';
            $dietText = ($diet == 'Veg') ? 'Vegetarian' : 'Non- Vegetarian';
            $msg .= '<div class="recepieSlide">
                        <div class="recepieSliderImage maxColumn">
                            <div class="rsImage">
                                <img src="'.get_the_post_thumbnail_url(get_the_ID(),'full').'">
                            </div>
                        </div>
                        <div class="recepieSliderContent">
                            <div class="rsTitleRow">
                                <h3 class="secHeader white">'.get_the_title().'</h3>
                                <h4 class="secHeaderTag white">Recipe by '.get_the_author_link().'</h4>
                            </div>
                            <div class="rsDesc secTxt white">'.get_the_excerpt().'</div>
                            <div class="rsAttributes white">
                                <div class="recipeAttribute inline">
                                    <i class="svgSprite size2 svgicon-plate"></i>
                                    '.types_render_field("serves-count", array()).'
                                </div>
                                <div class="recipeAttribute inline">
                                    <i class="svgSprite size2 svgicon-clock"></i>
                                    '.types_render_field("cooking-time", array()).'
                                </div>
                                <div class="recipeAttribute inline">
                                    <i class="svgSprite size2 svgicon-graph"></i>
                                    '.types_render_field("cooking-difficulty", array()).'
                                </div>
                                <div class="recipeAttribute inline">
                                    <i class="svgSprite size2 svgicon-dietIcon">'.$dietClass.'</i>
                                    '.$dietText.'
                                </div>
                            </div>
                            <div class="rsBtnSec btnHolder"><a class="btn rsBtn" href="'.get_permalink().'">EXPLORE NOW</a></div>
                        </div>
                    </div>';
        endwhile;
        
        $msg .='</div>';
        wp_reset_postdata();
        wp_reset_query();
        
    } else {
        // If the query returns nothing, we throw an error message
        $msg .= '<p class = "bg-danger">No Recipes found.</p>';
    }
    return $msg;
}
add_shortcode( 'recipe_homepage_slider', 'recipe_homepage_slider' );

function custom_testimonial_slider($atts) {
    global $wpdb;
    $msg = '';
        
    $atts = shortcode_atts(array(
        'post_type' => 'testimonial',
        'total_posts' => 10,
        'orderby' => 'date',
        'order' => 'desc'
    ), $atts );
    
    $args = array(
        'post_type' => $atts['post_type'],
        'posts_per_page' => $atts['total_posts'],
        'orderby' => $atts['orderby'],
        'order' => $atts['order']
    );
        
    // Retrieve posts
    $posts = get_posts($args);
    
    if( $posts ){
        $msg = '<div class="testimonialSlider owl-carousel">';
        // Iterate thru each item
        foreach( $posts as $post ):
            $msg .= '
                <div class="testimonialSlide">
                    <div class="testimonialContent"><div class="testimonialText">'.$post->post_content.'</div></div>
                    <div class="reviewerContent">
                        <div class="reviewerImage">
                            '. types_render_field("reviewer-photo-company-logo", array( "id" => $post->ID)) .'
                        </div>
                        <div class="reviewerDetails">
                            <div class="reviewerName">
                                '.types_render_field("reviewer-name", array( "id" => $post->ID)).',
                            </div>
                            <div class="reviewerDesignation">
                                '.types_render_field("reviewer-designation", array( "id" => $post->ID)).'
                            </div>
                        </div>
                    </div>
                </div>';
        endforeach;
        $msg .='</div>';
    // If the query returns nothing, we throw an error message
    }else{
        $msg .= '<p class = "bg-danger">No testimonials to show.</p>';
    }
    return $msg;
        wp_reset_postdata();
        wp_reset_query();
}
add_shortcode( 'custom_testimonial_slider', 'custom_testimonial_slider' );

function products_offer_slider($atts) {
    $msg = '
    <div class="offerSlider owl-carousel">
        <div class="offerSlide bannerSlide offerBanner1 comboBanner">
            <div class="bannerImage col-md-6 col-sm-6 col-xs-12 no-padding">
                <img src="'. get_stylesheet_directory_uri() .'/images/offers/offer1.jpg"  class="no-stretch">
            </div>
            <div class="bannerContent content_bg col-md-6 col-sm-6 col-xs-12 no-padding text-center">
                <div class="content_bg_image">
                    <img src="'. get_site_url() .'/wp-content/uploads/2017/11/content-bg2.png">
                </div>
                <div class="bannerTitle inline">
                    <div class="textHolder">
                        <div class="bannerRibbon">BEST</div>
                    </div>
                    <div class="textHolder">
                        <div class="bannerTitle2">COMBO</div>
                    </div>
                    <div class="textHolder">
                        <div class="bannerBand orange">OFFERS</div>
                    </div>
                </div>
                <div class="textHolder">
                    <div class="bannerText3 text-center">
                        Save more and enjoy more<br>You won’t find it cheaper anywhere.
                    </div>
                </div>
            </div>
        </div>
        <div class="offerSlide bannerSlide offerBanner2 min25Banner">
            <div class="bannerImage col-md-6 col-sm-6 col-xs-12 no-padding">
                <img src="'. get_stylesheet_directory_uri() .'/images/offers/offer2.jpg"  class="no-stretch">
            </div>
            <div class="bannerContent content_bg col-md-6 col-sm-6 col-xs-12 no-padding text-center">
                <div class="content_bg_image">
                    <img src="'. get_site_url() .'/wp-content/uploads/2017/11/content-bg2.png">
                </div>
                <div class="bannerTitle inline">
                    <div class="textHolder">
                        <div class="bannerSideKick">MIN</div>
                        <div class="bannerTitle5">25<span class="bannerSub">%</span></div>
                    </div>
                    <div class="textHolder">
                        <div class="bannerTitle2">OFFER</div>
                    </div>
                </div>
                <div class="textHolder">
                    <div class="bannerText3 text-center">
                        25% Cashback on first order.<br>Use Code: INDIANMART25
                    </div>
                </div>
            </div>
        </div>
        <div class="offerSlide bannerSlide offerBanner3 min30Banner">
            <div class="bannerImage col-md-6 col-sm-6 col-xs-12 no-padding">
                <img src="'. get_stylesheet_directory_uri() .'/images/offers/offer3.jpg"  class="no-stretch">
            </div>
            <div class="bannerContent content_bg col-md-6 col-sm-6 col-xs-12 no-padding text-center">
                <div class="content_bg_image">
                    <img src="'. get_site_url() .'/wp-content/uploads/2017/11/content-bg2.png">
                </div>
                <div class="bannerTitle inline">
                    <div class="textHolder">
                        <div class="bannerRibbon">UP TO</div>
                        <div class="bannerTitle5">30<span class="bannerSub">%</span></div>
                    </div>
                    <div class="textHolder">
                        <div class="bannerTitle2">OFFER</div>
                    </div>
                </div>
                <div class="textHolder">
                    <div class="bannerText3 text-center">
                        Enhance the taste of everyday meals with our Pickles.Get offers upto 30% on all pickles. Its now or never !
                    </div>
                </div>
            </div>
        </div>
    </div>';
    return $msg;
}
add_shortcode( 'Offer_slider', 'products_offer_slider' );

/*function jk_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => ' <span class="brdcrmb_seperator">&gt;</span> ',
            'wrap_before' => '<nav class="woocommerce-breadcrumb" itemprop="breadcrumb">',
            'wrap_after'  => '</nav>',
            'before'      => '',
            'after'       => '',
            'home'        => _x( 'Shop', 'breadcrumb', 'woocommerce' ),
        );
}
add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );

function woo_custom_breadrumb_home_url() {
    return get_permalink(wc_get_page_id( 'shop' ));
}
add_filter( 'woocommerce_breadcrumb_home_url', 'woo_custom_breadrumb_home_url' );*/

remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);

add_action( 'woocommerce_before_main_content','page_breadcrumb', 20, 0);

function page_breadcrumb(){
    
    $html ='<nav class="woocommerce-breadcrumb" itemprop="breadcrumb">';
    ob_start();
    if(function_exists('bcn_display')){
        bcn_display();
    }
    $html .= ob_get_contents();
    ob_end_clean();
    $html .= '</nav>';
    echo $html;
}
add_shortcode( 'page_breadcrumb', 'page_breadcrumb' );

function available_information_data(){
    global $product; 

    $contains = types_get_field_meta_value('available-field-list',$product->get_id());
    if($contains){
        $contains = implode('</li><li>', $contains);
        $html .= '<div class="woocommerce_sp_available_list col-xs-12 no-padding"><h6 class="attribute_header">Available:</h6><ul class="secList col-md-6 col-sm-8 col-xs-11"><li>' . $contains . '</li></ul></div>';
        return $html;
    }
}
add_shortcode( 'available_information_list', 'available_information_data' );

function custom_out_of_stock(){
    do_action('custom_out_of_stock_alert');
}
add_shortcode( 'out_of_stock_form', 'custom_out_of_stock' );

function nutritional_info_data(){
    global $product;
    
    $product_description = get_post($product->get_id())->post_content;
    $table_data = types_get_field_meta_value('nutritional_info_table',$product->get_id());
    $html = '';
    
    if($product_description){
        if($table_data){
            $html .= '<div class="descriptionSec col-sm-6 col-xs-12">';
        } else {
            $html .= '<div class="descriptionSec col-xs-12">';
        }
        $html .= '<div class="secHeaderRow text-center"><h2 class="secHeader inline">Product Details</h2></div>';
        $html .= '<div class="woocommerce_sp_description col-xs-12 no-padding">' . $product_description . '</div>';
        $html .= '</div>';
    }
    
    if($table_data){
        if($product_description){
            $html .= '<div class="nutritionalSec col-sm-6 col-xs-12">';
        } else {
            $html .= '<div class="nutritionalSec col-xs-12">';
        }
        $html .= '<div class="secHeaderRow text-center"><h2 class="secHeader inline">Nutritional Info</h2></div>';
        $html .= '<div class="table_sec col-xs-12 no-padding">
        <table class="woocommerce_sp_table text-left col-xs-12">
            <thead>
                <tr>
                    <th colspan="2" class="text-center">Amount per 100g</th>
                </tr>
            </thead><tbody>';

        $table_data = explode(',',$table_data);
        foreach($table_data as $row_data){
            if($row_data){
                $row_data = explode('|', $row_data);
                $html .= '<tr>';
                foreach($row_data as $cell_data){
                    $html .= '<td>' . $cell_data . '</td>';
                }
                if(sizeof($row_data) < 2){
                    $html .= '<td></td>';
                }
                $html .= '</tr>';
            }
        }
        
        $html .= '</tbody>';
        
        $totalCalories = types_get_field_meta_value('calories-per-100gm',$product->get_id());
        if($totalCalories){
            $html .= '<tfoot>
                <tr>
                    <td>Total Calories </td>
                    <td>'.types_get_field_meta_value('calories-per-100gm',$product->get_id()).'</td>
                </tr>
            </tfoot>';
        }
        
        $html .= '</table></div></div>';
        /*<td>Calories from Fat '.types_get_field_meta_value('calories-from-fat',$product->get_id()).'</td>*/
    }
    return $html;
}
add_shortcode( 'nutritional_info_table', 'nutritional_info_data' );

function woocommerce_quantity_input($args) {
    if ( is_null( $product ) ) {
        $product = $GLOBALS['product'];
    }
    
    $defaults = array(
        'input_name'  => 'quantity',
        'input_value' => '1',
        'max_value'   => apply_filters( 'woocommerce_quantity_input_max', -1, $product ),
        'min_value'   => apply_filters( 'woocommerce_quantity_input_min', 0, $product ),
        'step'        => apply_filters( 'woocommerce_quantity_input_step', 1, $product ),
        'pattern'     => apply_filters( 'woocommerce_quantity_input_pattern', has_filter( 'woocommerce_stock_amount', 'intval' ) ? '[0-9]*' : '' ),
        'inputmode'   => apply_filters( 'woocommerce_quantity_input_inputmode', has_filter( 'woocommerce_stock_amount', 'intval' ) ? 'numeric' : '' ),
    );

    $args = apply_filters( 'woocommerce_quantity_input_args', wp_parse_args( $args, $defaults ), $product );

    // Apply sanity to min/max args - min cannot be lower than 0.
    $args['min_value'] = max( $args['min_value'], 1 );
    $args['max_value'] = 0 < $args['max_value'] ? $args['max_value'] : 5;

    // Max cannot be lower than min if defined.
    if ( '' !== $args['max_value'] && $args['max_value'] < $args['min_value'] ) {
        $args['max_value'] = $args['min_value'];
    }
    
    // Max cannot be lower than present selected value in cart if defined.
    if( '' !== $args['max_value'] && $args['max_value'] < $args['input_value']){
        $args['max_value'] = $args['input_value'] + 5;
    }
    
    $min = $args['min_value'];
    $max = ($args['max_value'] > 9) ? 10 : $args['max_value'];
    $input = $args['input_value'];
    $step = 1;
    $options = '<div class="woocommerce_sp_select_qnty select-qty">
        <select name="'. $args['input_name'] .'" id="custom_select_qty">
        <option disabled>Qty</option>';
   
    for ( $count = $min; $count <= $max; $count = $count+$step ) {
        if($input == $count){
            $options .= '<option value="' . $count . '" selected>' . $count . '</option>';
        } else {
            $options .= '<option value="' . $count . '">' . $count . '</option>';            
        }
    }
   
    $options .= '</select></div>';
    
    echo $options;
}

            /*************** custom quantity inputs for cart page ***************/
function woocommerce_quantity_input_cart($args) {
    if ( is_null( $product ) ) {
        $product = $GLOBALS['product'];
    }
    
    $defaults = array(
        'input_name'  => 'quantity',
        'input_value' => '1',
        'max_value'   => apply_filters( 'woocommerce_quantity_input_max', -1, $product ),
        'min_value'   => apply_filters( 'woocommerce_quantity_input_min', 0, $product ),
        'step'        => apply_filters( 'woocommerce_quantity_input_step', 1, $product ),
        'pattern'     => apply_filters( 'woocommerce_quantity_input_pattern', has_filter( 'woocommerce_stock_amount', 'intval' ) ? '[0-9]*' : '' ),
        'inputmode'   => apply_filters( 'woocommerce_quantity_input_inputmode', has_filter( 'woocommerce_stock_amount', 'intval' ) ? 'numeric' : '' ),
    );

    $args = apply_filters( 'woocommerce_quantity_input_args', wp_parse_args( $args, $defaults ), $product );

    // Apply sanity to min/max args - min cannot be lower than 0.
    $args['min_value'] = max( $args['min_value'], 1 );
    $args['max_value'] = 0 < $args['max_value'] ? $args['max_value'] : '';

    // Max cannot be lower than min if defined.
    if ( '' !== $args['max_value'] && $args['max_value'] < $args['min_value'] ) {
        $args['max_value'] = $args['min_value'];
    }
    
    // Max cannot be lower than present selected value in cart if defined.
    if( '' !== $args['max_value'] && $args['max_value'] < $args['input_value']){
        $args['max_value'] = $args['input_value'] + 5;
    }
    wc_get_template( 'global/quantity-input.php', $args );
}

function add_content_after_addtocart() {
    $current_product_id = get_the_ID();
    $product = wc_get_product( $current_product_id );
    $checkout_url = WC()->cart->get_checkout_url();
    $alpha = '';
    if ( $product && $product->is_purchasable() && $product->is_in_stock() && ! $product->is_sold_individually() ) {
        if( $product->is_type( 'simple' ) ){
            $alpha .= '<div class="btnHolder inline"><a href="'.$checkout_url.'?add-to-cart='.$current_product_id.'" class="btn single_add_to_cart_button alt custom_simple_checkout">Buy Now</a></div>';
            $alpha .= '<script>
                jQuery(function($) {
                    // if our custom button is clicked
                    $(".custom_simple_checkout").on("click", function(e) {
                        e.preventDefault();
                        window.location.href = $(this).attr("href")+ "&quantity=" + $("#custom_select_qty").val();
                    });
                });
            </script>';
        } else if( $product->is_type('variable')){
            $alpha = '<div class="btnHolder inline"><a href="'.$checkout_url.'?add-to-cart='.$current_product_id.'" class="btn single_add_to_cart_button btn custom_variable_checkout">Buy Now</a></div>';
            $alpha .= '<script>
                jQuery(function($) {
                    // if our custom button is clicked
                    $(".custom_variable_checkout").on("click", function(e) {
                        e.preventDefault();

                        var $varTxt = $(this).attr("href"),
                            $variation_form = $( this ).closest(".variations_form");

                        $varTxt += "&variation_id="+ $variation_form.find("input[name=variation_id]").val();

                        if($("#custom_select_qty").val()){
                            $varTxt += "&quantity="+ $("#custom_select_qty").val();
                        } else {
                            $varTxt += "&quantity="+ $variation_form.find("[name=quantity]").val();
                        }

                        variations = $variation_form.find("select[name^=attribute]");

                        /* Updated code to work with radio button - mantish - WC Variations Radio Buttons - 8manos */ 
                        if ( !variations.length) {
                            variations = $variation_form.find("[name^=attribute]:checked");
                        }

                        /* Backup Code for getting input variable */
                        if ( !variations.length) {
                            variations = $variation_form.find("input[name^=attribute]");
                        }

                        variations.each( function() {
                            var $this = $( this ),
                                attributeName = $this.attr("name"),
                                attributevalue = $this.val(),
                                index,
                                attributeTaxName;

                            $this.removeClass("error");
                            if ( attributevalue.length === 0 ) {
                                index = attributeName.lastIndexOf(\'_\');
                                attributeTaxName = attributeName.substring( index + 1 );
                                $this.addClass("required error").after(\'<div class="ajaxerrors"><p>Please select \' + attributeTaxName + \'</p></div>\');
                                return false;
                            } else {
                                $varTxt += "&"+ attributeName +"="+ attributevalue;
                            }
                        });
                        console.log($varTxt);
                        window.location.href = $varTxt;
                    });
                });
            </script>';
        }
        
    }
    echo $alpha;
}
add_action( 'woocommerce_after_add_to_cart_button', 'add_content_after_addtocart', 1);

remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation', 10 );
add_action( 'woocommerce_before_single_variation', 'woocommerce_single_variation', 30 );

add_filter('woocommerce_variable_sale_price_html', 'shop_variable_product_price', 10, 2);
add_filter('woocommerce_variable_price_html','shop_variable_product_price', 10, 2 );
function shop_variable_product_price( $price, $product ){
    $prices = $product->get_variation_prices( true );
    $price = '<span class="woocommerce_sp_variable_price_range">';
    if (!empty( $prices['price'] ) ) {
        $min_price     = current( $prices['price'] );
        $max_price     = end( $prices['price'] );
        $min_reg_price = current( $prices['regular_price'] );
        $max_reg_price = end( $prices['regular_price'] );

        if ( $min_price !== $max_price ) {
            $price .= wc_format_price_range( $min_price, $max_price );
        } elseif ( $product->is_on_sale() && $min_reg_price === $max_reg_price ) {
            $price .= wc_format_sale_price( wc_price( $max_reg_price ), wc_price( $min_price ) );
        } else {
            $price .= wc_price( $min_price );
        }
        $price .= '</span>';
    }
    return $price;
}

add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );
function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options -> Reading
  // Return the number of products you wanna show per page.
  $cols = 12;
  return $cols;
}

add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
function jk_related_products_args( $args ) {
	$args['posts_per_page'] = 10; // 4 related products
	$args['columns'] = 4; // arranged in 2 columns
	return $args;
}

/*add_action('template_redirect', 'remove_page_breadcrumbs' );
function remove_page_breadcrumbs(){
    if (is_shop()){
        remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
    }
}*/

add_theme_support( 'wc-product-gallery-lightbox' );
/*add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-slider' );*/

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<section id="shopSec">';
}

function my_theme_wrapper_end() {
  echo '</section>';
}

add_filter( 'woocommerce_default_catalog_orderby_options', 'sv_custom_woocommerce_catalog_orderby' );
add_filter( 'woocommerce_catalog_orderby', 'sv_custom_woocommerce_catalog_orderby' );

function sv_custom_woocommerce_catalog_orderby( $sortby ) {
    $sortby['alphabetical'] = 'Sort by name';
    return $sortby;
}

function woocommerce_category_image() {
    if ( is_product_category() ){
	    global $wp_query;
	    $cat = $wp_query->get_queried_object();
	    $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
	    $image = wp_get_attachment_url( $thumbnail_id );
	    if ( $image ) {
		    $result = '<img src="' . $image . '" alt="' . $cat->name . '" />';
            return $result;
		}
	}
        wp_reset_postdata();
        wp_reset_query();
}

function woocommerce_category_description() {
    if ( is_product_category() ){
	    global $wp_query;
	    $cat = $wp_query->get_queried_object();
	    $description = $cat->description;
	    if ( $description ) {
            return $description;
		}
	}
        wp_reset_postdata();
        wp_reset_query();
}

function wc_cart_totals_coupon_label_custom( $coupon, $echo = true ) {
	if ( is_string( $coupon ) ) {
		$coupon = new WC_Coupon( $coupon );
	}

	$label = apply_filters( 'woocommerce_cart_totals_coupon_label', sprintf( esc_html__( 'Discount:', 'woocommerce' ), $coupon->get_code() ), $coupon );

	if ( $echo ) {
		echo $label;
	} else {
		return $label;
	}
}

function wc_cart_totals_coupon_html_custom( $coupon ) {
	if ( is_string( $coupon ) ) {
		$coupon = new WC_Coupon( $coupon );
	}

	$discount_amount_html = '';

	if ( $amount = WC()->cart->get_coupon_discount_amount( $coupon->get_code(), WC()->cart->display_cart_ex_tax ) ) {
		$discount_amount_html = '-' . wc_price( $amount );
	} elseif ( $coupon->get_free_shipping() ) {
		$discount_amount_html = __( 'Free shipping coupon', 'woocommerce' );
	}

	$discount_amount_html = apply_filters( 'woocommerce_coupon_discount_amount_html', $discount_amount_html, $coupon );
	$coupon_html          = $discount_amount_html . ' <a href="' . esc_url( add_query_arg( 'remove_coupon', urlencode( $coupon->get_code() ), defined( 'WOOCOMMERCE_CHECKOUT' ) ? wc_get_checkout_url() : wc_get_cart_url() ) ) . '" class="woocommerce-remove-coupon" title="Remove coupon" data-coupon="' . esc_attr( $coupon->get_code() ) . '">' . __( '&times;', 'woocommerce' ) . '</a>';

	echo wp_kses( apply_filters( 'woocommerce_cart_totals_coupon_html', $coupon_html, $coupon, $discount_amount_html ), array_replace_recursive( wp_kses_allowed_html( 'post' ), array( 'a' => array( 'data-coupon' => true ) ) ) );
}

add_filter( 'woocommerce_product_variation_title_include_attributes', '__return_false' );
add_filter( 'woocommerce_is_attribute_in_product_name', '__return_false' );

function get_cart_item_variation_data( $empty, $cart_item, $flat = false ) {
    $item_data = array();

    $empty = $empty ? $empty : '';
    // Variation values are shown only if they are not found in the title as of 3.0.
    // This is because variation titles display the attributes.
    if ( $cart_item['data']->is_type( 'variation' ) && is_array( $cart_item['variation'] ) ) {
        foreach ( $cart_item['variation'] as $name => $value ) {
            $taxonomy = wc_attribute_taxonomy_name( str_replace( 'attribute_pa_', '', urldecode( $name ) ) );

            // If this is a term slug, get the term's nice name
            if ( taxonomy_exists( $taxonomy ) ) {
                $term = get_term_by( 'slug', $value, $taxonomy );
                if ( ! is_wp_error( $term ) && $term && $term->name ) {
                    $value = $term->name;
                }
                $label = wc_attribute_label( $taxonomy );

            // If this is a custom option slug, get the options name.
            } else {
                $value = apply_filters( 'woocommerce_variation_option_name', $value );
                $label = wc_attribute_label( str_replace( 'attribute_', '', $name ), $cart_item['data'] );
            }

            // Check the nicename against the title.
            /*if ( '' === $value || wc_is_attribute_in_product_name( $value, $cart_item['data']->get_name() ) ) {
                continue;
            }*/

            $item_data[] = array(
                'key'   => $label,
                'value' => $value,
            );
        }
    }

    // Filter item data to allow 3rd parties to add more to the array
    $item_data = apply_filters( 'woocommerce_get_item_data', $item_data, $cart_item );

    // Format item data ready to display
    foreach ( $item_data as $key => $data ) {
        // Set hidden to true to not display meta on cart.
        if ( ! empty( $data['hidden'] ) ) {
            unset( $item_data[ $key ] );
            continue;
        }
        $item_data[ $key ]['key']     = ! empty( $data['key'] ) ? $data['key'] : $data['name'];
        $item_data[ $key ]['display'] = ! empty( $data['display'] ) ? $data['display'] : $data['value'];
    }

    // Output flat or in list format
    if ( sizeof( $item_data ) > 0 ) {
        ob_start();

        if ( $flat ) {
            foreach ( $item_data as $data ) {
                echo esc_html( $data['key'] ) . ': ' . wp_kses_post( $data['display'] ) . "\n";
            }
        } else {
            if ( sizeof( $item_data ) > 1 ) {
                foreach ( $item_data as $data ) {
                    echo esc_html( $data['key'] ) . '- ' . wp_kses_post( $data['display'] ) . "\n";
                }
            } else {
                echo wp_kses_post( $item_data[0]['display'] ) . "\n";
            }
            //wc_get_template( 'cart/cart-item-data.php', array( 'item_data' => $item_data ) );
        }

        return ob_get_clean();
    } else {
        echo $empty;
    }

    return '';
}

function coupon_applied_message(){
    global $woocommerce;
    $coupons = WC()->cart->get_applied_coupons();
    $result = '<div class="couponMessage inline text-left">';
    $result .= '<div class="couponIcon">
        <svg id="couponSvg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 76" style="enable-background:new 0 0 50 76;fill:#BAD484;" xml:space="preserve">
            <path d="M0.8,37.9c0-10.4,0.1-20.8,0-31.3c0-3.3,2.3-5.8,5.8-5.8C18.9,1,31.4,1,43.8,1c3.3,0,5.4,2.1,5.4,5.5c0,21,0,41.9,0,62.9c0,2.9-1.4,4.9-3.9,5.6c-0.5,0.1-1.1,0.2-1.7,0.2c-3.1,0-6.2,0-9.4,0c-2.2,0-3.3-0.9-3.8-3c-0.7-2.7-2.8-4.5-5.5-4.5c-2.7,0-4.9,1.8-5.6,4.5c-0.6,2.2-1.6,3-3.9,3c-3.2,0-6.3,0-9.5,0c-3.2,0-5.4-2.1-5.4-5.4C0.8,59.1,0.8,48.5,0.8,37.9z M45.2,56.1c0-0.3,0-0.6,0-0.8c0-16.2,0-32.4,0-48.7C45.2,5.2,45,5,43.6,5c-12.3,0-24.7,0-37,0C5,5,4.8,5.1,4.8,6.7c0,14.9,0,29.7,0,44.6c0,1.6,0,3.2,0,4.8c1,0.1,2.2,0.1,2.2,1.4c0.1,1.5-1.2,1.4-2.2,1.6c0,3.4,0,6.8,0,10.2c0,0.3,0,0.5,0,0.8c0.1,0.8,0.6,1,1.3,1c2.9,0,5.8,0,8.8,0c0.6,0,0.8-0.2,1-0.7c1.4-4.2,5-6.8,9.2-6.8c4.2,0,7.8,2.7,9.2,6.9c0.1,0.2,0.1,0.4,0.2,0.6c3.1,0,6.2,0,9.3,0c1.2,0,1.5-0.3,1.5-1.5c0-3.2,0-6.4,0-9.6c0-0.3-0.1-0.6-0.1-1c-1.2-0.2-2.5,0.2-2.7-1.4C42.3,56.7,43,56.4,45.2,56.1z"/>
            <path fill="#333333" d="M31.2,30.6c0.9,1.3,1.8,2.5,2.7,3.7c0.9,1.2,0.9,2.2,0.2,3.2c-0.7,0.9-1.7,1.2-3,0.7c-1.1-0.4-2.2-0.7-3.3-1.1c-0.6-0.2-1-0.2-1.4,0.4c-0.7,1.1-1.4,2.1-2.1,3.1c-0.7,1-1.7,1.4-2.7,1c-1-0.4-1.3-1.2-1.4-2.2c0-1.4,0-2.9,0-4.3c0-0.6-0.2-0.9-0.8-1c-1.3-0.4-2.7-0.8-4-1.2c-1.4-0.4-2.2-1.3-2.2-2.4c0-1.1,0.8-2,2.2-2.4c1.3-0.4,2.6-0.9,4-1.2c0.6-0.2,0.8-0.4,0.8-1c0-1.4,0-2.9,0-4.3c0-0.9,0.3-1.7,1.2-2.1c0.9-0.4,1.8-0.2,2.4,0.7c0.8,1.1,1.7,2.3,2.5,3.5c0.3,0.5,0.7,0.6,1.2,0.4c1.2-0.4,2.4-0.8,3.7-1.2c1.2-0.4,2.3-0.1,2.9,0.8c0.7,0.9,0.6,2-0.1,3C33.1,28,32.1,29.3,31.2,30.6z"/>
            <path d="M20.8,56.1c0.5,0.1,1.1,0,1.5,0.2c0.4,0.3,0.9,0.9,0.9,1.3c0,0.4-0.6,1.1-1.1,1.2c-0.8,0.2-1.7,0.2-2.4,0c-0.5-0.1-1-0.7-1.1-1.2c0-0.4,0.4-1,0.9-1.3C19.8,56.1,20.4,56.2,20.8,56.1z"/>
            <path d="M29.4,56.1c0.3,0,0.9,0,1.2,0.2c0.4,0.3,1,0.9,0.9,1.3c-0.1,0.5-0.7,1.1-1.2,1.2c-0.7,0.2-1.4,0.1-2.2,0.1c-0.7,0-1.3-0.4-1.3-1.2c-0.1-0.8,0.4-1.3,1.1-1.5C28.4,56.2,28.8,56.2,29.4,56.1z"/>
            <path d="M12.6,58.9c-0.4,0-0.9,0.1-1.2,0c-0.5-0.3-1.1-0.8-1.2-1.2c-0.1-0.4,0.5-1.2,0.9-1.3c0.9-0.2,1.9-0.2,2.8,0c0.7,0.1,1,0.7,1,1.4c-0.1,0.7-0.6,1.1-1.2,1.2C13.3,59,12.9,58.9,12.6,58.9L12.6,58.9z"/>
            <path d="M37.5,56.1c0.5,0.1,0.9,0.1,1.4,0.2c0.7,0.2,1.2,0.7,1,1.4c-0.2,0.5-0.7,1-1.2,1.2c-0.6,0.2-1.4,0.1-2.1,0.1c-0.8,0-1.4-0.5-1.4-1.3c0-0.8,0.5-1.2,1.3-1.4C36.7,56.1,37.1,56.2,37.5,56.1C37.5,56.2,37.5,56.2,37.5,56.1z"/>
        </svg>
    </div>';
    $result .= '<div class="couponContent">
        <div class="couponHead">Coupon Applied!</div>
        <div class="couponText">';
    
    if(sizeof($coupons) > 1){
        foreach($coupons as $coupon){
            $result.= '<b>Coupon1:</b>'. strtoupper($coupon);
        }
        $result .= '<p>are successfully added.</p>';
    } else {
        $result.= '<b>COUPON:</b>'. strtoupper($coupons[0]);
        $result .= '<p>is successfully added.</p>';
    }
    
    $result .= '</div></div></div>';
    
    echo $result;
}

// uncheck ship to different address checkbox in checkout page
add_filter( 'woocommerce_ship_to_different_address_checked', '__return_false' );

// Change placeholder to label text
add_filter( 'woocommerce_checkout_fields' , 'custom_placeholder_wc_checkout_fields' );
function custom_placeholder_wc_checkout_fields( $fields ) {
    $dontChangeFields = ['billing_address_1','billing_address_2','shipping_address_1','shipping_address_2'];
    
    foreach($fields as $key1 => $field){
        foreach($field as $key2 => $arr){
            $label = $arr['label'];
            if($label != '' && !in_array($key2, $dontChangeFields)){
                if($label == 'County'){
                    $label = 'State / Province';
                }
                $fields[$key1][$key2]['placeholder'] = $label;
            }
        }
    }
    
    //unset($fields['order']['order_comments']);
    return $fields;
}

// Our hooked in function - $address_fields is passed via the filter!
add_filter( 'woocommerce_default_address_fields' , 'custom_override_default_address_fields' );
function custom_override_default_address_fields( $address_fields ) {
     unset($address_fields['company']);
     return $address_fields;
}

add_action( 'woocommerce_register_post', 'wooc_validate_extra_register_fields', 10, 3 );
function wooc_validate_extra_register_fields( $username, $email, $validation_errors ) {
    if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {
        $validation_errors->add( 'billing_first_name_error', __( '<strong>Error</strong>: First name is required!', 'woocommerce' ) ); 
    }

    if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {
        $validation_errors->add( 'billing_last_name_error', __( '<strong>Error</strong>: Last name is required!.', 'woocommerce' ) );
    }
    return $validation_errors;
}

add_action( 'woocommerce_created_customer', 'wooc_save_extra_register_fields' );
function wooc_save_extra_register_fields( $customer_id ) {
    if ( isset( $_POST['billing_phone'] ) ) {
        // Phone input filed which is used in WooCommerce
        update_user_meta( $customer_id, 'billing_phone', sanitize_text_field( $_POST['billing_phone'] ) );
    }
    
    if ( isset( $_POST['billing_first_name'] ) ) {
        //First name field which is by default
        update_user_meta( $customer_id, 'first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
        // First name field which is used in WooCommerce
        update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
    }
    
    if ( isset( $_POST['billing_last_name'] ) ) {
        // Last name field which is by default
        update_user_meta( $customer_id, 'last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
        // Last name field which is used in WooCommerce
        update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
    }
 
}

add_filter('woocommerce_registration_errors', 'woocommerce_registration_errors_validation', 10, 3);
function woocommerce_registration_errors_validation($reg_errors, $sanitized_user_login, $user_email) {
	global $woocommerce;
	extract( $_POST );
	if ( strcmp( $password, $password2 ) !== 0 ) {
		return new WP_Error( 'registration-error', __( 'Passwords do not match.', 'woocommerce' ) );
	}
	return $reg_errors;
}

function get_ingredients_posts_for_recipes($id){
    $childargs = array(
        'post_type' => 'recipe-ingredient',
        'numberposts' => -1,
        'order' => 'ASC',
        'meta_query' => array(array('key' => '_wpcf_belongs_recipe_id', 'value' => $id))
    );
    $child_posts = get_posts($childargs);
    $result = '<table class="table recipe_ingredient_checkbox_table">';
    
    
    foreach ($child_posts as $child_post) {
        $result .= '<tr>';
        
        $product_id = types_get_field_meta_value('recipe-ingredient-product-id', $child_post->ID);
        
        $woo_product = '';
        $woo_product = wc_get_product($product_id);
        $result .= '<td>
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn checkboxlabel">';
        
        if(!empty($woo_product)){
            $result .= '<input id="recepie_ingredient_checkbox_'.$product_id.'" class="recepie_ingredient_checkbox" type="checkbox" name="recipe-ingredients-checkbox" value="'.$product_id.'">';
        }
        
        $result .= '<span class="checkBtn"></span>
                </label>
            </div>
        </td>';
        
        $result .= '<td><label for="recepie_ingredient_checkbox_'.$product_id.'" class="checkboxText inline">' . types_get_field_meta_value('recipe-ingredient-name', $child_post->ID) . '</label></td>';
        $result .= '<td class="text-right">' . types_get_field_meta_value('recipe-ingredient-quantity', $child_post->ID) . '</td>';
        $result .= '</tr>';
    }
    $result .= '</table>';
    echo $result;
}

add_action('wp_ajax_nopriv_send_selected_ingredients', 'send_selected_ingredients');
add_action('wp_ajax_send_selected_ingredients', 'send_selected_ingredients');

function send_selected_ingredients() {
    check_ajax_referer( 'ajax-security-string', 'security' );
	
    $selected = explode(",",$_POST['selected']);
    $result = '';
	
    foreach($selected as $select) {
        $result .= custom_product_structure($select);
    }
    
    echo $result;
    
	wp_die(); // this is required to terminate immediately and return a proper response
}

add_action('wp_ajax_nopriv_save_submit_recipe', 'add_recipe_submit');
add_action('wp_ajax_save_submit_recipe', 'add_recipe_submit');

function add_recipe_submit() {
    
    check_ajax_referer( 'ajax-security-string', 'security' );
    
    $valid_image_formats = array("jpg", "png", "gif", "bmp", "jpeg"); // Supported file types
    $max_file_size = 1024 * 1024 ; // 1 MB = (1024x1024)
    $max_image_upload = 2; // Define how many images can be uploaded to the current post
    $wp_upload_dir = wp_upload_dir();
    $path = $wp_upload_dir['path'] . '/';
    
    $ingredients = $_POST['ingredients'];
    $steps = $_POST['steps'];
    
    // create post object with the form values
    $recipe_post_args = array(
        'post_type' => 'recipe',
        'post_status'   => 'pending',
        'post_title'    => $_POST['dishName'],
        'post_excerpt'  => $_POST['dishDescription'],
        'meta_input'  => array(
            'wpcf-serves-count'  => $_POST['dishServeCount'],
            'wpcf-cooking-time'  => $_POST['dishTime'],
            'wpcf-cooking-difficulty'  => $_POST['dishCooking'],
            'wpcf-recipe-kind'  => $_POST['dishDiet'],
            'wpcf-recipe-state'  => $_POST['dishState'],
            'wpcf-spicy-level'  => $_POST['dishSpicy']
        )
    );

    // insert the post into the database
    $recipe_id = wp_insert_post($recipe_post_args, $wp_error);
    
    wp_set_object_terms( $recipe_id, $_POST['dishCategory'], 'recipe-category' );
    
    foreach($steps as $s => $step) {
        add_post_meta( $recipe_id, 'wpcf-recipe-steps', $step );
    }
    
    foreach($ingredients as $i => $ingredient) {
        $recipe_post_args = array(
            'post_type' => 'recipe-ingredient',
            'post_status'   => 'publish',
            'comment_status'   => 'closed',
            'ping_status'   => 'closed',
            'meta_input'  => array(
                'wpcf-recipe-ingredient-product-id'   => $ingredients[$i]['id'],
                'wpcf-recipe-ingredient-name'   => $ingredients[$i]['name'],
                'wpcf-recipe-ingredient-quantity'   => $ingredients[$i]['quantity'],
                '_wpcf_belongs_recipe_id'   => $recipe_id
            )
        );
        
        $ingredient_id = wp_insert_post( $recipe_post_args, $wp_error);
        
        $update_title = array(
            'ID'           => $ingredient_id,
            'post_title'   => 'recipe-ingredient ' . $ingredient_id
        );
        
         wp_update_post( $update_title );
    }
    
    $files = reArrayFiles($_FILES['files']);
    foreach( $files as $file ){
        if( is_array($file) ){
            $attachment_id = upload_user_file( $file, false );
            if ( is_numeric($attachment_id) ) {
                set_post_thumbnail( $recipe_id, $attachment_id );
            }
        }
    }
    
    // Loop through each error then output it to the screen
    if ( isset( $upload_message ) ) :
        foreach ( $upload_message as $msg ){        
            printf( __('<p class="bg-danger">%s</p>', 'wp-trade'), $msg );
        }
    endif;
    
    $result[] = array(
        'status' => 'success'
    );
    
    echo json_encode( $result );
    
	wp_die(); // this is required to terminate immediately and return a proper response
}

function upload_user_file( $file = array(), $title = false ) {
    require_once ABSPATH.'wp-admin/includes/admin.php';
    $file_return = wp_handle_upload($file, array('test_form' => false));
    if(isset($file_return['error']) || isset($file_return['upload_error_handler'])){
        return false;
    }else{
        $filename = $file_return['file'];
        $attachment = array(
            'post_mime_type' => $file_return['type'],
            'post_content' => '',
            'post_type' => 'attachment',
            'post_status' => 'inherit',
            'guid' => $file_return['url']
        );
        if($title){
            $attachment['post_title'] = $title;
        }
        $attachment_id = wp_insert_attachment( $attachment, $filename );
        require_once(ABSPATH . 'wp-admin/includes/image.php');

        $attachment_data = wp_generate_attachment_metadata( $attachment_id, $filename );
        wp_update_attachment_metadata( $attachment_id, $attachment_data );
        if( 0 < intval( $attachment_id ) ) {
            return $attachment_id;
        }
    }
    return false;
}

function reArrayFiles(&$file_post) {
    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);
    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }
    return $file_ary;
}

add_action('wp_ajax_nopriv_search_ingredients', 'search_products');
add_action('wp_ajax_search_ingredients', 'search_products');

function search_products(){
    check_ajax_referer( 'ajax-security-string', 'security' );
    
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 10,
        's' => $_POST['q']
    );
    
    $loop = new WP_Query($args);
    
    $ingredients = array();
    
    if($loop->have_posts()){
        while($loop->have_posts()): $loop->the_post();
            $ingredients[] = array(
                'id' => get_the_id(),
                'name' => get_the_title()
            );
        endwhile;
        wp_reset_postdata();
        wp_reset_query();
    }
    
    echo json_encode( $ingredients );
    
    wp_die();
}

function search_posts_by_title_only( $search, &$wp_query ){
    if ( ! empty( $search ) && ! empty( $wp_query->query_vars['search_terms'] ) ) {
        global $wpdb;

        $q = $wp_query->query_vars;
        $n = ! empty( $q['exact'] ) ? '' : '%';

        $search = array();

        foreach ( ( array ) $q['search_terms'] as $term ){   
            $search[] = $wpdb->prepare( "$wpdb->posts.post_title LIKE %s", $n . $wpdb->esc_like( $term ) . $n );
        }
        
        if ( ! is_user_logged_in() ){   
            $search[] = "$wpdb->posts.post_password = ''";
        }

        $search = ' AND ' . implode( ' AND ', $search );
    }
        wp_reset_postdata();
        wp_reset_query();

    return $search;
}
add_filter( 'posts_search', 'search_posts_by_title_only', 500, 2 );


add_action('wp_ajax_nopriv_post-like', 'post_like');
add_action('wp_ajax_post-like', 'post_like');

function post_like(){
	check_ajax_referer( 'ajax-security-string', 'security' );
		
	if(isset($_POST['post_like'])){
        $like = $_POST['post_like'];
        $swap = ($like==0) ? 1 : 0;
        
		$ip = get_current_user_id() ? get_current_user_id() : $_SERVER['REMOTE_ADDR'];
		$post_id = $_POST['post_id'];
		
		$meta_IP = get_post_meta($post_id, "voted_IP");
		
		$meta_count = get_post_meta($post_id, "votes_count", true);
        
        $voted_IP = $meta_IP[0];

        if(!is_array($voted_IP)){
            $voted_IP = array();
        }
        
        $voted_IP[$ip] = $like;
        update_post_meta($post_id, "voted_IP", $voted_IP);

		if($like == 1){
            update_post_meta($post_id, "votes_count", ++$meta_count);
		} elseif($meta_count > 1) {
            update_post_meta($post_id, "votes_count", --$meta_count);
        }
        
        echo $meta_count;
	}
	exit;
}

function hasAlreadyVoted($post_id){
	$meta_IP = get_post_meta($post_id, "voted_IP");
	$voted_IP = $meta_IP[0];
	
    if(!is_array($voted_IP)){
        $voted_IP = array();
    }
    
    $ip = get_current_user_id() ? get_current_user_id() : $_SERVER['REMOTE_ADDR'];
	
	if(in_array($ip, array_keys($voted_IP))){		
		if($voted_IP[$ip] == 0){
			return false;
        }
        return true;
	}
	return false;
}

function recipe_excerpt($len = 110){
    $excerpt = get_the_excerpt();
    $excerpt = preg_replace(" ([.*?])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    if(strlen($excerpt) > $len){
        $excerpt = substr($excerpt, 0, $len);
        $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
        $excerpt .= '...';
    } 
    return $excerpt;
}

add_action('wp_ajax_nopriv_recipes_list', 'get_recipes_list');
add_action('wp_ajax_recipes_list', 'get_recipes_list');

function get_recipes_list(){
    check_ajax_referer( 'ajax-security-string', 'security' );
    
    if(isset($_POST['sortby']) && ($_POST['sortby'] == 'popular')){
        $orderby = 'meta_value_num';
    } else {
        $orderby = 'date';
    }
    
    $args = array(
        'post_type'         => 'recipe',
        'post_status'       => 'publish',
        'nopaging'          => false,
        'paged'             => $_POST['page'],
        'posts_per_page'    => 12,
        'meta_key'          => 'votes_count',
        'orderby'           => $orderby,
        'order'             => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => 'recipe-category',
                'field' => 'slug',
                'terms' => $_POST['category']
            ),
        )
    );
    
    $loop = new WP_Query($args);
    
    $recipes = array();
    
    if($loop->have_posts()){
        while($loop->have_posts()): $loop->the_post();
            $recipes[] = array(
                'name' => get_the_title(),
                'image' => get_the_post_thumbnail_url(get_the_ID(),'full'),
                'description' => recipe_excerpt(240),
                'serves' => types_render_field("serves-count", array( )),
                'time' => types_render_field("cooking-time", array( )),
                'difficulty' => types_render_field("cooking-difficulty", array( )),
                'diet' => types_render_field("recipe-kind", array( )),
                'author' => get_the_author_link(),
                'link' => get_permalink(),
                'spicy' => types_render_field("spicy-level", array()),
                'spice' => types_render_field("spicy-level", array('raw'=>'true'))
            );
        endwhile;
        wp_reset_postdata();
        wp_reset_query();
    }
    
    echo json_encode( $recipes );
    
    wp_die();
}

add_action( 'save_post', 'save_vote_meta', 10, 3 );
function save_vote_meta( $post_id, $post, $update ) {

    if ( wp_is_post_revision( $post_id ) )return;
    
    /*
     * In production code, $slug should be set only once in the plugin,
     * preferably as a class property, rather than in each function that needs it.
     */
    $post_type = get_post_type($post_id);

    // If this isn't a 'book' post, don't update it.
    if ( "recipe" != $post_type ) return;

    // - Update the post's metadata.
    $votes = get_post_meta($post_id, 'votes_count', true);
    if ( empty ($votes) ){
        update_post_meta($post_id, "votes_count", 0);
    }
}

add_action( 'custom_whishlist_button_action_loop', 'tm_woowishlist_add_button_loop', 35 );
add_action( 'custom_whishlist_button_action_single', 'tm_woowishlist_add_button_single', 35 );

function menu_recipe($atts){
    global $wpdb;
    $result = '';
        
    $atts = shortcode_atts(array(
        'post_type' => 'recipe',
        'total_posts' => 1,
        'orderby' => 'meta_value_num',
        'order' => 'desc'
    ), $atts );
    
    $args = array(
        'post_type'         => $atts['post_type'],
        'post_status'       => array( 'published' ),
        'posts_per_page'    => $atts['total_posts'],
        'meta_key'          => 'votes_count',
        'orderby'           => $atts['orderby'],
        'order'             => $atts['order']
    );
        
    // Retrieve posts
    $loop = new WP_Query($args);
    
    if($loop->have_posts()){
        
        while($loop->have_posts()):
            $loop->the_post();
            $result = '<div class="menuRecipePost">';
            $result .= '<div class="menuRecipeImage maxColumn">
                            <div class="rsImage">
                                <img src="'.get_the_post_thumbnail_url(get_the_ID(),'medium').'">
                            </div>
                        </div>
                        <div class="menuRecipeContent">
                            <div class="menuRecipeTitle">'.get_the_title().'</div>
                            <div class="menuRecipeDesc secTxt white">'.recipe_excerpt(30).'</div>
                            <div class="menuRecipeBtnSec btnHolder"><a class="btn menuRecipeBtn" href="'.get_permalink().'">EXPLORE NOW</a></div>
                        </div>
                    </div>';
        endwhile;
    }
        wp_reset_postdata();
        wp_reset_query();
    return $result;
}
add_shortcode( 'featured_recipe', 'menu_recipe' );

function menu_banner($atts){
    global $wpdb;
    $result = '';
        
    $atts = shortcode_atts(array(
        'cat' => 'beverages',
        'taxonomy_name' => 'product_cat'
    ), $atts );
    
    $term = get_term_by( 'slug', $atts['cat'], $atts['taxonomy_name'] );
    $term_link = get_term_link( $term );

    if($atts['taxonomy_name'] == 'product_cat'){
        $thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
        $image = wp_get_attachment_url( $thumbnail_id );
    }

    $result = '<div class="menuBanner">';
    $result .= '<div class="menuBannerImage maxColumn">
                    <div class="rsImage">
                        <img src="'. $image .'">
                    </div>
                </div>
                <div class="menuBannerContent">
                    <div class="menuBannerTitle">'.$term->name.'</div>
                    <div class="menuBannerDesc secTxt white">'.$term->description.'</div>
                    <div class="menuBannerBtnSec btnHolder"><a class="btn menuRecipeBtn" href="'.esc_url( $term_link ).'">EXPLORE NOW</a></div>
                </div>
            </div>';
    return $result;
}
add_shortcode( 'custom_banner', 'menu_banner' );

function get_recipes_by_state($atts){
    global $wpdb;
    $result = '';
        
    $atts = shortcode_atts(array(
        'post_type'     => 'recipe',
        'total_posts'   => 6,
        'orderby'       => 'meta_value_num',
        'meta_key'      => 'votes_count',
        'state'         => 'all'
    ), $atts );
    /*put 'meta_key' in the bottom for state filtering*/
    $args = array(
        'post_type'         => 'recipe',
        'post_status'       => array( 'published' ),
        'posts_per_page'    => 6,
        'orderby'           => 'rand',
        'order'             => 'ASC'
    );
    
    $loop = new WP_Query($args);
    
    if($loop->have_posts()){
        
        $result = '<div class="owl-carousel recipeShortSlider">';
        
        while($loop->have_posts()): $loop->the_post();
            $result .= '<div class="recipeSliderItem"><a href="'.get_permalink().'"><img src="'.get_the_post_thumbnail_url(get_the_ID(),"thumbnail").'"></a>
                <span class="recipeName" title="'.get_the_title().'">'.get_the_title().'</span></div>';
        endwhile;
        
        $result .= '</div>';
        
    }
    
    echo $result;
        wp_reset_postdata();
        wp_reset_query();
}
add_shortcode( 'recipes_by_state', 'get_recipes_by_state' );

function get_file_dir() {
    global $argv;
    $dir = dirname(getcwd() . '/' . $argv[0]);
    $curDir = getcwd();
    chdir($dir);
    $dir = getcwd();
    chdir($curDir);
    return $dir;
}

add_action('wp_ajax_nopriv_region-post', 'region_post');
add_action('wp_ajax_region-post', 'region_post');

function region_post(){
    check_ajax_referer( 'ajax-security-string', 'security' );
    
    $path = 'templates-html/';
    
	if(isset($_POST['region'])){
        $region = $_POST['region'];
    } else {
        $region = 'northindia';
    }
    
    $region .= '.php';
    
    $html = '';
    
    ob_start();
    include $path.$region;
    $html .= ob_get_contents();
    ob_end_clean();

    echo $html;
    
	exit;
}


function wpb_woo_my_account_order() {
	$myorder = array(
		'edit-account'       => __( 'ACCOUNT INFORMATION', 'woocommerce' ),
		//'dashboard'          => __( 'Dashboard', 'woocommerce' ),
		'orders'             => __( 'Orders', 'woocommerce' ),
		//'downloads'          => __( 'Download MP4s', 'woocommerce' ),
		'edit-address'       => __( 'DELIVERY ADDRESS', 'woocommerce' ),
		'payment-methods'    => __( 'MY CARDS', 'woocommerce' ),
		//'customer-logout'    => __( 'Logout', 'woocommerce' ),
	);
	return $myorder;
}
add_filter ( 'woocommerce_account_menu_items', 'wpb_woo_my_account_order' );

function account_address_values( $load_address = 'billing' ){
    $current_user = wp_get_current_user();
    $load_address = sanitize_key( $load_address );

    $address = WC()->countries->get_address_fields( get_user_meta( get_current_user_id(), $load_address . '_country', true ), $load_address . '_' );

    // Prepare values
    foreach ( $address as $key => $field ) {

        $value = get_user_meta( get_current_user_id(), $key, true );

        if ( ! $value ) {
            switch ( $key ) {
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
    
    $address = apply_filters( 'woocommerce_address_to_edit', $address, $load_address );
    
    return $address;
}

add_filter( 'bcn_breadcrumb_title', 'filter_bcn_breadcrumb_title', 10, 3 ); 
function filter_bcn_breadcrumb_title( $title, $this_type, $this_id ) {
    if($this_type[0] == 'home'){
        $title = 'Home';
    }
    
    return $title; 
}

/**
 * Registers users by date registered by default. When user clicks
 * other sortable column headers, those will take effect instead.
 */
add_action( 'pre_user_query', 'wpse209591_order_users_by_date_registered_by_default' );
function wpse209591_order_users_by_date_registered_by_default( $query ) {
    global $pagenow;

    if ( ! is_admin() || 'users.php' !== $pagenow || isset( $_GET['orderby'] ) ) {
        return;
    }
    $query->query_orderby = 'ORDER BY user_registered ASC';
}

/**
 * Registers column for display
 */
add_filter( 'manage_users_columns', 'wpse209591_users_columns');
function wpse209591_users_columns( $columns ) {
    $columns['registerdate'] = _x( 'Registered', 'user', 'your-text-domain' );
    return $columns;
}

/**
 * Handles the registered date column output.
 * 
 * This uses the same code as column_registered, which is why
 * the date isn't filterable.
 *
 * @global string $mode
 */
add_action( 'manage_users_custom_column', 'wpse209591_users_custom_column', 10, 3);
function wpse209591_users_custom_column( $value, $column_name, $user_id ) {

    global $mode;
    $mode = empty( $_REQUEST['mode'] ) ? 'list' : $_REQUEST['mode'];

    if ( 'registerdate' != $column_name ) {
         return $value;
    } else {
        $user = get_userdata( $user_id );

        if ( is_multisite() && ( 'list' == $mode ) ) {
            $formated_date = __( 'Y/m/d' );
        } else {
            $formated_date = __( 'Y/m/d g:i:s a' );
        }

        $registered   = strtotime( get_date_from_gmt( $user->user_registered ) );
        $registerdate = '<span>'. date_i18n( $formated_date, $registered ) .'</span>' ;

        return $registerdate;
    }
}

/**
 * Makes the column sortable
 */
add_filter( 'manage_users_sortable_columns', 'wpse209591_users_sortable_columns' );
function wpse209591_users_sortable_columns( $columns ) {

    $custom = array(
        // meta column id => sortby value used in query
        'registerdate' => 'registered',
    );

    return wp_parse_args( $custom, $columns );
}

/**
 * Calculate the order if we sort by date.
 *
 */
add_filter( 'request', 'wpse209591_users_orderby_column' );
function wpse209591_users_orderby_column( $vars ) {

    if ( isset( $vars['orderby'] ) && 'registerdate' == $vars['orderby'] ) {
        $vars = array_merge( $vars, array(
            'meta_key' => 'registerdate',
            'orderby' => 'meta_value'
        ) );
    }

    return $vars;
}

function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function wpb_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}