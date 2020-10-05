<?php
/**
 * The template for displaying all Product Listing pages like shop page, categories page, tags page, attributes 
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Indianmart
 */

get_header(); ?>
        <section id="shopSec1">
            <nav class="woocommerce-breadcrumb" itemprop="breadcrumb">
                <span property="itemListElement" typeof="ListItem">
                    <a property="item" typeof="WebPage" title="Go to Home." href="<?php echo get_site_url();?>" class="home">
                        <span property="name">Home</span>
                    </a>
                    <meta property="position" content="1">
                </span>
                <span class="brdcrmb_seperator">&gt;</span>
                <span property="itemListElement" typeof="ListItem">
                    <span property="name">New Launches</span>
                    <meta property="position" content="2">
                </span>
            </nav>
            <div class="container-fluid">
                <div class="shopSec1row1 text-center">
                    <div class="secHeaderRow">
                        <h3 class="secHeader inline">NEW LAUNCHES</h3>
                    </div>        
                </div>
                <div class="shopSec1row2 row"><?php echo do_shortcode('[Offer_slider]') ?></div>
            </div>
        </section>
        <section id="shopSec2" class="newLaunches">
            <div class="container-fluid">
                <div class="shopSec2row1 products-grid">
                    <div class="products-filters">
                        <form class="woocommerce-filtering" method="get">
                            <div class="sort-prefix inline">sort by</div>
                                <?php 
                                    $url = get_permalink();
                                    wc_product_dropdown_categories( array(
                                        'orderby'            => 'name',
                                        'hierarchical'       => 1,
                                        'show_uncategorized' => 0,
                                        'show_count'         => 0,
                                        'option_none_value'  => '',
                                    ));
                                ?>
                        </form>
                    </div>
                    <div class="clear"></div>
                    <div class="products-container">
                        <?php 
                            $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => 12,
                                'orderby' => 'date',
                                'order' => 'desc',
                                'product_cat' => isset( $wp_query->query_vars['product_cat'] ) ? $wp_query->query_vars['product_cat']: ''
                            );
                        
                            $loop = new WP_Query( $args );
                        
                            if ( $loop->have_posts() ) {
                                while ( $loop->have_posts() ) : $loop->the_post();
                                    wc_get_template_part( 'content', 'product' );
                                endwhile;
                            } else {
                                echo __( 'No products found' );
                            }
                            wp_reset_postdata();
                        ?>
                    </div>
                </div>
                <div class="shopSec2row2">
                    <div class="exploreRow text-center">
                        <div class="btnHolder inline">
                            <?php 
                                $cat = isset( $wp_query->query_vars['product_cat'] ) ? $wp_query->query_vars['product_cat']: '';
                            
                                if($cat != ''){
                                    $link = get_site_url() . '/product-category/' . $cat;
                                } else {
                                    $link = get_permalink( wc_get_page_id( 'shop' ) );                                    
                                }
                            ?>
                            <a class="btn nakedBtn blackArrow fullRangeBtn" href="<?php echo $link ?>">Explore the full range</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php

get_sidebar();
get_footer();

?>
<script>
    $( '.woocommerce-filtering' ).on( 'change', 'select#product_cat', function() {
        if ( jQuery(this).val() != '' ) {
            var this_page = '';
            var home_url  = '<?php echo $url ?>';
            if ( home_url.indexOf( '?' ) > 0 ) {
                this_page = home_url + '&product_cat=' + jQuery(this).val();
            } else {
                this_page = home_url + '?product_cat=' + jQuery(this).val();
            }
            location.href = this_page;
        }
    });
</script>