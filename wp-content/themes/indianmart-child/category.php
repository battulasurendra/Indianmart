<?php

get_header(); ?>
<section id="blogSec1">
    <div class="container-fluid">
        <div class="blogSec1row1 text-center row">
            <div class="secHeaderRow">
                <img src="<?php echo get_site_url()?>/wp-content/themes/indianmart-child/images/blog-banner.jpg">
            </div>
        </div>
        <div class="blogSec1row2 row">
        </div>
    </div>
</section>
<section id="blogSec2">
    <div class="container-fluid">
        <div class="blogSec2row1 row">
            <div class="postSection">
                <div class="gridColumn col-lg-9 col-md-8 col-sm-8 col-xs-12">
                    <div class="posts-grid">
                    <?php if( have_posts() ): ?>

                        <div class="posts-container">
                        <?php while( have_posts() ): the_post(); ?>

                                <div class="postSlide inline">
                                    <div class="postTile inline normal">
                                        <div class="postTileImg">
                                            <?php 
                                                if(has_post_thumbnail()):
                                                    the_post_thumbnail( array(200,220));
                                                else:
                                            ?>
                                                <img src="<?php echo get_site_url()?>/wp-content/themes/indianmart-child/images/postSlide-default.jpg">
                                            <?php endif; ?>
                                        </div>
                                        <div class="postTileHead">
                                            <?php the_title(); ?>
                                        </div>
                                        <div class="postTileContent">
                                            <div class="postTileInfo">
                                                <div class="postTileAuthor">
                                                    BY: <span class="highlight"><?php the_author_link(); ?></span>
                                                </div>
                                                <div class="postTileDate"><?php the_time('M j, Y'); ?></div>
                                            </div>
                                            <div class="postTileExcerpt">
                                                <div class="postTileText"><?php echo recipe_excerpt(110); ?></div>
                                                <div class="postTileLink text-right">
                                                    <a href="<?php the_permalink(); ?>" class="d-inline highlight">READ MORE</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile; ?>
                                </div>
                                <div class="clear"></div>
                                <div class="navigation text-center">
                                    <?php 
                                        the_posts_pagination( array(
                                            'prev_text' => '<svg id="navLeft" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 7 12" enable-background="new 0 0 7 12" xml:space="preserve" fill="none"><polyline stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="6,10.1 1,6.1 6,2.1"/></svg>',
                                            'next_text' => '<svg id="navRight" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 7 12" enable-background="new 0 0 7 12" xml:space="preserve" fill="none"><polyline stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="1,2 6,6 1,10"/></svg>'
                                        ));
                                    ?> 
                                </div>

                        <?php else: ?>

                        <div id="post-404" class="noposts">
                            <p><?php _e('None found.','example'); ?></p>
                        </div>

                    <?php endif;?>
                    </div>
                </div>
                <div class="sidebarColumn col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <div class="trendingBlock">
                        <div class="blockHead">Trending Posts</div>
                        <div class="blockList"></div>
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
