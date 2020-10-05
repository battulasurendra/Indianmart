<?php

get_header(); ?>
<section id="blogSec1">
    <div class="container-fluid">
        <div class="blogSec1row1 text-center row">
            <div class="secHeaderRow">
                <?php if(has_post_thumbnail()):
                    the_post_thumbnail('full');
                 else : ?>
                    <img src="<?php echo get_site_url()?>/wp-content/themes/indianmart-child/images/blog-banner.jpg">
                <?php endif ; ?>
            </div>
        </div>
        <div class="blogSec1row2 row">
        </div>
    </div>
</section>
<section id="blogSec2">
    <div class="container-fluid">
        <div class="blogSec2row1 row">
            <div class="postSection singlePostSection">
                <div class="gridColumn col-lg-9 col-md-8 col-sm-8 col-xs-12">
                <?php while ( have_posts() ) : the_post(); ?>
                    <div class="singlePostBlock">
                        <div class="singlePostTitle text-center">
                            <?php the_title(); ?>
                        </div>
                        <div class="postTileInfo">
                            <div class="postTileAuthor text-right">
                                BY: <span class="highlight"><?php the_author_link(); ?></span>
                            </div>
                            <div class="postTileDate text-left"><?php the_time('M j, Y'); ?></div>
                        </div>
                        <div class="singlePostContent">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="navigation text-center">
                        <?php 
                            the_post_navigation( array(
                                'prev_text' => '<svg id="navLeft" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 7 12" enable-background="new 0 0 7 12" xml:space="preserve" fill="none"><polyline stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="6,10.1 1,6.1 6,2.1"/></svg> <span>Prev</span>',
                                'next_text' => '<span>Next</span> <svg id="navRight" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 7 12" enable-background="new 0 0 7 12" xml:space="preserve" fill="none"><polyline stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="1,2 6,6 1,10"/></svg>'
                            ));
                        ?> 
                    </div>
                    <?php 
                        $previous_post = get_previous_post();
                        $next_post = get_next_post();
                    ?>
                    <div class="singlePostNavigation col-xs-12">
                        <?php if (!empty( $previous_post )): ?>
                            <div class="postSlide pull-left">
                                <div class="postTile inline normal">
                                    <a href="<?php the_permalink($previous_post->ID); ?>" class="d-inline">
                                        <div class="postTileImg">
                                            <?php 
                                                if(has_post_thumbnail($previous_post->ID)):
                                                    echo get_the_post_thumbnail($previous_post->ID);
                                                else:
                                            ?>
                                                <img src="<?php echo get_site_url()?>/wp-content/themes/indianmart-child/images/postSlide-default.jpg">
                                            <?php endif; ?>
                                        </div>
                                        <div class="postTileHead">
                                            <?php echo $previous_post->post_title; ?>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endif ?>
                        <?php if (!empty( $next_post )): ?>
                            <div class="postSlide pull-right">
                                <div class="postTile inline normal">
                                    <a href="<?php the_permalink($next_post->ID); ?>" class="d-inline">
                                        <div class="postTileImg">
                                            <?php 
                                                if(has_post_thumbnail($next_post->ID)):
                                                    echo get_the_post_thumbnail($next_post->ID);
                                                else:
                                            ?>
                                                <img src="<?php echo get_site_url()?>/wp-content/themes/indianmart-child/images/postSlide-default.jpg">
                                            <?php endif; ?>
                                        </div>
                                        <div class="postTileHead">
                                            <?php echo $next_post->post_title; ?>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endif ?>
                    </div>
                <?php endwhile; ?>
                </div>
                <div class="sidebarColumn col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <div class="trendingBlock">
                        <div class="blockHead">Trending Posts</div>
                        <div class="blockList">
                        <?php 
                            $popularpost = new WP_Query( array( 'posts_per_page' => 5, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
                            
                            while ( $popularpost->have_posts() ) : $popularpost->the_post();
                                the_title();
                            endwhile;
                        ?>
                        </div>
                    </div> 
                    <div class="categoryBlock">
                        <div class="blockHead">Categories</div>
                        <div class="blockList"><?php wp_list_categories(array('title_li' => '','exclude' => 1)); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_sidebar();
get_footer();
wpb_set_post_views(get_the_ID());