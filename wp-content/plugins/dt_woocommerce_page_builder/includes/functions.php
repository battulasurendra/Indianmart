<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

function dtwpb_the_product_page_content( $more_link_text = null, $strip_teaser = false){
	global $dtwpb_product_page;
	$content = $dtwpb_product_page->post_content;
	$content = apply_filters( 'the_content', $content );
	$content = str_replace( ']]>', ']]&gt;', $content );
	echo $content;
}