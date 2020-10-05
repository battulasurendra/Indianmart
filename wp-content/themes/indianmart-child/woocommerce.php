<?php
/**
 * The template for displaying all Product Listing pages like shop page, categories page, tags page, attributes 
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Indianmart
 */

get_header(); ?>
<?php 
    do_action('woocommerce_before_main_content');
        if ( is_singular( 'product' ) ) {

			while ( have_posts() ) : the_post();

				wc_get_template_part( 'content', 'single-product' );

			endwhile;

		} else { ?>    
        
    <?php if(!is_search()): ?>
        <section id="shopSec1">
    <?php else : ?>
        <section id="shopSec1" class="searchSec">
    <?php endif; ?>
            <div class="container-fluid">
                <div class="shopSec1row1 text-center">
                    <div class="secHeaderRow">
                        <h3 class="secHeader inline"><?php woocommerce_page_title(); ?></h3>
                    </div>        
                </div>
                <?php if(!is_search()): ?>
                    <div class="shopSec1row2 row">
                        <?php
                            if(is_shop()){
                                echo do_shortcode('[Offer_slider]');
                            }else{
                                do_action('woocommerce_category_banner');
                            }
                        ?>
                    </div>
                <?php endif;?>
            </div>
        </section>
        <section id="shopSec2">
            <div class="container-fluid">
                <div class="shopSec2row1 products-grid">
                    <div class="products-filters">
                    <?php 
                        woocommerce_result_count();
                        woocommerce_catalog_ordering();
                    ?>
                    </div>
                    <div class="clear"></div>
                    <div class="products-container">
                        <?php 
                            if ( have_posts() ) {
                                while ( have_posts() ) : the_post();

                                    wc_get_template_part( 'content', 'custom-product' );

                                endwhile;
                            } elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) {
                                do_action( 'woocommerce_no_products_found' );
                            }
                        ?>
                    </div>
                    <div class="clear"></div>
                    <div class="products-pagination text-center">
                        <?php 
                            wc_get_template( 'loop/pagination.php' );
                        ?>
                    </div>
                </div>
            </div>
        </section>
<?php
        }

get_sidebar();
get_footer();