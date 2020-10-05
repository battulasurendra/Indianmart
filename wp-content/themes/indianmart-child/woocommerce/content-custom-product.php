<?php
/**
 * The template for displaying custom product listing layout in all pages.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

$result .= custom_product_structure($product->id);

echo $result;