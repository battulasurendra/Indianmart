<?php
/**
 * Single Product Sale Flash
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/sale-flash.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

?>
<?php if ( $product->is_on_sale() ) : ?>

	
<?php 
    if($product->get_type() == 'variable'){
        $sale_off = 0;
        $varOptions = $product->get_available_variations();
        foreach ($varOptions as $key => $value) {
            $variable_product = new WC_Product_Variation( $value['variation_id'] );
            if($variable_product->is_on_sale()){
                $percentage = round( ( ( $variable_product->regular_price - $variable_product->sale_price ) / $variable_product->regular_price ) * 100 );
                
                $sale_off = ($percentage > $sale_off) ? $percentage : $sale_off;
            }
        }
    } else if($product->get_type() == 'simple'){
        $sale_off = round( ( ( $product->regular_price - $product->sale_price ) / $product->regular_price ) * 100 );
    }

    $saleText = '<div class="prodSale"><div class="sale-text">'. $sale_off .'% off</div></div>';
?>
	<?php echo apply_filters( 'woocommerce_sale_flash', $saleText, $post, $product ); ?>

<?php endif;

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
