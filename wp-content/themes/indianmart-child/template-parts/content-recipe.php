<?php
/**
 * Template part for displaying recipe posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Indianmart
 */

?>

<section id="recipeSec1">
    <nav class="woocommerce-breadcrumb" itemprop="breadcrumb">
        <?php
        if(function_exists('bcn_display')){
                bcn_display();
        }?>
    </nav>
    <div class="container-fluid text-center">
        <!--<div class="recipeSec1row1 row">
            <h3 class="secHeader3">Paneer Tikka Masala</h3>
        </div>-->
        <div class="recipeSec1row2 row">
            <div class="headerImage">
                <?php the_post_thumbnail(); ?>
            </div>
        </div>
    </div>
</section>
<section id="recipeSec2">
    <div class="container-fluid text-center">
        <div class="recipeSec2row1 row">
            <?php the_title( '<h2 class="secHeader2">', '</h2>' ); ?>
            <h4 class="secHeaderTag">Recipe by <?php the_author_link() ?></h4>
        </div>
        <div class="recipeSec2row2 row">
            <div class="detailsRow col-sm-offset-2 col-sm-8 col-xs-12">
                <div class="col-xs-4">
                    <div class="recipeIcon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 60 36" style="enable-background:new 0 0 60 36;fill:#333333;" xml:space="preserve">
                            <path d="M56.6,27.8c-0.3-0.2-0.7-0.3-1.1-0.3l-0.9,0h-3.5h-0.6c-0.1-4.6-1.8-9.2-4.9-12.7c-2.9-3.5-7.1-5.9-11.5-6.8c0.4-0.7,0.5-1.4,0.5-2.2c0-1.2-0.5-2.4-1.4-3.3C32.4,1.6,31.2,1,30,1.1c-1.2,0-2.4,0.5-3.3,1.4c-0.9,0.9-1.4,2.1-1.4,3.3c0,0.8,0.2,1.5,0.5,2.2c-4.5,0.9-8.6,3.4-11.5,6.8c-3,3.5-4.8,8.1-4.9,12.7H8.9H5.4l-0.9,0c-0.4,0-0.8,0.1-1.1,0.3c-0.7,0.4-1.1,1.1-1.1,1.9c0,0.8,0.4,1.5,1.1,1.9c0.3,0.2,0.7,0.3,1.1,0.3l0.9,0h3.5h3.9c0.1,0.7,0.4,1.4,0.9,1.9c0.6,0.7,1.5,1,2.4,1.1l4.6,0H30h9.2l4.6,0c0.9,0,1.8-0.4,2.4-1.1c0.5-0.5,0.8-1.2,0.9-1.9h3.9h3.5l0.9,0c0.4,0,0.8-0.1,1.1-0.3c0.7-0.4,1.1-1.1,1.1-1.9C57.7,29,57.3,28.2,56.6,27.8z M27.4,3.2C28.1,2.5,29,2.1,30,2.1c1,0,1.9,0.4,2.6,1.1c0.7,0.7,1.1,1.6,1.1,2.6c0,1-0.4,1.9-1.1,2.6C31.9,9,31,9.4,30,9.3c-1,0-1.9-0.4-2.6-1.1c-0.7-0.7-1.1-1.6-1.1-2.6C26.4,4.8,26.8,3.8,27.4,3.2z M15.2,15.4c2.9-3.4,7-5.8,11.4-6.6c0,0.1,0.1,0.1,0.1,0.2c0.9,0.9,2.1,1.4,3.3,1.4c1.2,0,2.4-0.5,3.3-1.4c0.1-0.1,0.1-0.1,0.1-0.2c4.4,0.8,8.5,3.1,11.4,6.6c2.9,3.3,4.5,7.7,4.6,12.1h-5.4H30H15.9h-5.4C10.7,23.1,12.3,18.8,15.2,15.4z M45.5,33.1c-0.4,0.5-1.1,0.7-1.7,0.8l-4.6,0H30h-9.2l-4.6,0c-0.6,0-1.2-0.3-1.7-0.8c-0.3-0.3-0.5-0.7-0.6-1.2h2H30h14.1h2C46,32.4,45.8,32.8,45.5,33.1z M56.1,30.7c-0.2,0.1-0.4,0.2-0.6,0.2l-0.9,0h-3.5h-7H30H15.9h-7H5.4l-0.9,0c-0.2,0-0.4-0.1-0.6-0.2c-0.4-0.2-0.6-0.6-0.6-1c0-0.4,0.2-0.8,0.6-1c0.2-0.1,0.4-0.2,0.6-0.2l0.9,0h3.5h7H30h14.1h7h3.5l0.9,0c0.2,0,0.4,0.1,0.6,0.2c0.4,0.2,0.6,0.6,0.6,1S56.4,30.5,56.1,30.7z"/>
                            <path d="M39.2,35.1l-23,0c-0.9,0-1.9-0.4-2.5-1.1c-0.5-0.5-0.8-1.2-1-1.9l-8.3,0c-0.4,0-0.8-0.1-1.2-0.3c-0.7-0.4-1.2-1.2-1.2-2c0-0.8,0.4-1.6,1.2-2c0.3-0.2,0.7-0.3,1.2-0.3l4.9,0c0.1-4.7,1.9-9.2,4.9-12.7c2.9-3.5,7-5.9,11.4-6.8c-0.3-0.7-0.5-1.4-0.5-2.1c0-1.3,0.5-2.5,1.4-3.4c0.9-0.9,2.1-1.4,3.4-1.4h0c1.3,0,2.5,0.5,3.4,1.4c0.9,0.9,1.4,2.1,1.4,3.4c0,0.7-0.2,1.4-0.5,2.1c4.4,0.9,8.5,3.4,11.4,6.8c3,3.5,4.8,8,4.9,12.7l4.9,0c0.4,0,0.8,0.1,1.2,0.3c0.7,0.4,1.2,1.2,1.2,2c0,0.8-0.4,1.6-1.2,2c-0.3,0.2-0.7,0.3-1.2,0.3l-8.3,0c-0.1,0.7-0.5,1.4-1,1.9c-0.6,0.7-1.6,1.1-2.5,1.1L39.2,35.1z M5.4,27.6l-0.9,0c-0.4,0-0.7,0.1-1,0.3c-0.6,0.4-1,1.1-1,1.8c0,0.7,0.4,1.5,1,1.8c0.3,0.2,0.7,0.3,1,0.3l8.5,0l0,0.1c0.1,0.7,0.4,1.4,0.9,1.9c0.6,0.6,1.5,1,2.3,1l23,0l4.6,0c0.9,0,1.7-0.4,2.3-1c0.5-0.5,0.8-1.1,0.9-1.9l0-0.1l8.5,0c0.4,0,0.7-0.1,1-0.3c0.6-0.4,1-1.1,1-1.8c0-0.7-0.4-1.5-1-1.8c-0.3-0.2-0.7-0.3-1-0.3l-5.1,0l0-0.1c-0.1-4.7-1.8-9.2-4.8-12.7c-2.9-3.5-7-5.9-11.4-6.8L34,8L34,7.9c0.4-0.7,0.5-1.4,0.5-2.1c0-1.2-0.5-2.4-1.3-3.2c-0.8-0.8-2-1.3-3.2-1.3h0c-1.2,0-2.4,0.5-3.2,1.3c-0.8,0.8-1.3,2-1.3,3.2c0,0.7,0.2,1.5,0.5,2.1L26,8l-0.2,0c-4.4,0.9-8.5,3.3-11.4,6.8c-3,3.5-4.7,8-4.8,12.7l0,0.1H5.4z M39.2,34l-23,0c-0.7,0-1.3-0.3-1.8-0.8c-0.3-0.3-0.6-0.8-0.7-1.2l0-0.1h32.5l0,0.1c-0.1,0.5-0.3,0.9-0.7,1.2c-0.5,0.5-1.1,0.8-1.8,0.8L39.2,34z M14.1,32.1c0.1,0.4,0.3,0.7,0.6,1c0.4,0.4,1,0.7,1.6,0.7l23,0l4.6,0c0.6,0,1.2-0.3,1.6-0.7c0.3-0.3,0.5-0.6,0.6-1H14.1z M54.6,31L4.5,31c-0.2,0-0.5-0.1-0.6-0.2c-0.4-0.2-0.6-0.7-0.6-1.1c0-0.5,0.3-0.9,0.6-1.1c0.2-0.1,0.4-0.2,0.6-0.2l4.4,0l46.6,0c0.2,0,0.5,0.1,0.6,0.2c0.4,0.2,0.6,0.7,0.6,1.1c0,0.5-0.2,0.9-0.6,1.1C56,30.9,55.8,31,55.5,31L54.6,31z M5.4,28.7l-0.9,0c-0.2,0-0.4,0.1-0.5,0.1c-0.3,0.2-0.5,0.5-0.5,0.9c0,0.4,0.2,0.7,0.5,0.9c0.1,0.1,0.3,0.1,0.5,0.1l4.4,0l46.6,0c0.2,0,0.4-0.1,0.5-0.1c0.3-0.2,0.5-0.5,0.5-0.9c0-0.4-0.2-0.7-0.5-0.9c-0.1-0.1-0.3-0.1-0.5-0.1l-4.4,0H5.4z M49.6,27.6H10.4l0-0.1c0.1-4.5,1.8-8.8,4.6-12.1c2.9-3.4,7.1-5.8,11.5-6.6l0.1,0l0.1,0.1c0,0,0.1,0.1,0.1,0.1c0.8,0.8,2,1.3,3.2,1.3h0c1.2,0,2.4-0.5,3.2-1.3c0,0,0.1-0.1,0.1-0.1l0.1-0.1l0.1,0c4.4,0.8,8.6,3.2,11.4,6.6c2.9,3.4,4.5,7.7,4.6,12.1L49.6,27.6z M10.7,27.4h38.7c-0.1-4.4-1.8-8.6-4.6-11.9c-2.8-3.4-6.9-5.7-11.2-6.5l0,0c0,0-0.1,0.1-0.1,0.1c-0.9,0.9-2.1,1.4-3.4,1.4h0c-1.3,0-2.5-0.5-3.4-1.4c0,0-0.1-0.1-0.1-0.1l0,0c-4.3,0.8-8.4,3.1-11.2,6.5C12.4,18.8,10.8,23,10.7,27.4z M30,9.5l0-0.1L30,9.5L30,9.5c-1,0-2-0.4-2.7-1.1c-0.7-0.7-1.1-1.7-1.1-2.6c0-1,0.4-1.9,1.1-2.6C28,2.4,29,2,30,2c1,0,2,0.4,2.7,1.1c0.7,0.7,1.1,1.7,1.1,2.6c0,1-0.4,1.9-1.1,2.6C32,9.1,31,9.5,30,9.5z M30,9.2l0,0.1L30,9.2c0.9,0,1.8-0.4,2.5-1c0.7-0.7,1-1.6,1-2.5c0-0.9-0.4-1.8-1-2.5c-0.6-0.7-1.5-1-2.5-1c-0.9,0-1.8,0.4-2.5,1c-0.7,0.7-1,1.6-1,2.5c0,0.9,0.4,1.8,1,2.5C28.2,8.9,29.1,9.2,30,9.2L30,9.2z"/>
                            <path d="M21.9,14.6l-0.5-0.9c-3.2,1.8-5.6,5-6.5,8.6l1,0.3C16.7,19.2,18.9,16.3,21.9,14.6z"/>
                            <path d="M15.9,22.6l-1.3-0.3l0-0.1c0.9-3.6,3.3-6.8,6.6-8.7l0.1-0.1l0.6,1.1l-0.1,0.1c-2.9,1.7-5.2,4.6-6,7.8L15.9,22.6z M15,22.2l0.8,0.2c0.8-3.2,3-6.1,5.9-7.8l-0.4-0.7C18.2,15.6,15.8,18.7,15,22.2z"/>
                       </svg>
                   </div>
                   <div class="iconText">
                        <?php 
                            $serve = types_render_field("serves-count", array( ));
                            if($serve > 1 ){
                                echo $serve.' Serves';
                            } else if($serve == 1 ){
                                echo $serve.' Serve';
                            }
                        ?>
                   </div>
                </div>
                <div class="col-xs-4">
                    <div class="recipeIcon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 36" style="enable-background:new 0 0 40 36;fill:#333333;" xml:space="preserve">
                            <path d="M20,0.2c-9.8,0-17.8,8-17.8,17.8s8,17.8,17.8,17.8s17.8-8,17.8-17.8S29.8,0.2,20,0.2zM20,34.5c-9.1,0-16.5-7.4-16.5-16.5S10.9,1.5,20,1.5S36.5,8.9,36.5,18S29.1,34.5,20,34.5z"/>
                            <path d="M20.7,14.8V4.2c0-0.4-0.3-0.7-0.7-0.7c-0.4,0-0.7,0.3-0.7,0.7v10.6c-1.3,0.3-2.3,1.3-2.6,2.6h-6c-0.4,0-0.7,0.3-0.7,0.7s0.3,0.7,0.7,0.7h6c0.3,1.5,1.6,2.6,3.2,2.6c1.8,0,3.3-1.5,3.3-3.3C23.3,16.4,22.2,15.1,20.7,14.8zM20,20c-1.1,0-2-0.9-2-2c0-1.1,0.9-2,2-2c1.1,0,2,0.9,2,2C22,19.1,21.1,20,20,20z"/>
                        </svg>
                    </div>
                    <div class="iconText">
                        <?php echo types_render_field("cooking-time", array()) ?>
                    </div>
                </div>
                <div class="col-xs-4">
                    <?php $kind = types_render_field("recipe-kind", array()); ?>
                    <div class="recipeIcon">
                        <div class="foodkind <?php echo $kind == 'Veg' ? 'veg' : 'nonveg'; ?>">
                            <?php echo $kind == 'Veg' ? 'V' : 'N'; ?>
                        </div>
                    </div>
                    <div class="iconText">
                        <?php echo $kind ?>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="recipeIcon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 36" style="enable-background:new 0 0 40 36;fill:#333333;stroke:#333333;stroke-miterlimit:10;" xml:space="preserve">
                            <path d="M27,8.3c-0.1,0-0.3-0.1-0.4-0.2l-2.9-3.3l-3.6,2.6c-0.2,0.1-0.5,0.1-0.7-0.1c-0.2-0.2-0.1-0.5,0.1-0.6l3.9-2.9c0.2-0.1,0.5-0.1,0.7,0.1l3.1,3.7c0.2,0.2,0.1,0.5-0.1,0.6C27.2,8.3,27.1,8.3,27,8.3L27,8.3z M27,8.3"/>
                            <path d="M8.8,18.6c-0.3,0-0.5-0.2-0.5-0.4c0-0.2,0.2-0.4,0.5-0.4c8,0,14.6-6.1,14.6-13.5c0-0.2,0.2-0.4,0.5-0.4c0.3,0,0.5,0.2,0.5,0.4C24.3,12.1,17.4,18.6,8.8,18.6L8.8,18.6z M8.8,18.6"/>
                            <path d="M8.8,32.2c-0.3,0-0.5-0.2-0.5-0.4v-6.6c0-0.2,0.2-0.4,0.5-0.4c0.3,0,0.5,0.2,0.5,0.4v6.6C9.3,32,9.1,32.2,8.8,32.2L8.8,32.2z M8.8,32.2"/>
                            <path d="M16.3,32.2c-0.3,0-0.5-0.2-0.5-0.4V21c0-0.2,0.2-0.4,0.5-0.4c0.3,0,0.5,0.2,0.5,0.4v10.8C16.7,32,16.5,32.2,16.3,32.2L16.3,32.2z M16.3,32.2"/>
                            <path d="M23.7,32.2c-0.3,0-0.5-0.2-0.5-0.4V18c0-0.2,0.2-0.4,0.5-0.4c0.3,0,0.5,0.2,0.5,0.4v13.8C24.2,32,24,32.2,23.7,32.2L23.7,32.2z M23.7,32.2"/>
                            <path d="M31.2,32.2c-0.3,0-0.5-0.2-0.5-0.4V13.5c0-0.2,0.2-0.4,0.5-0.4c0.3,0,0.5,0.2,0.5,0.4v18.3C31.6,32,31.4,32.2,31.2,32.2L31.2,32.2z M31.2,32.2"/>
                        </svg>                    
                    </div>
                    <div class="iconText">
                        <?php echo types_render_field("cooking-difficulty", array()) ?>
                    </div>
                </div>
                <div class="col-xs-6">
                    <?php
                        $spice = types_render_field("spicy-level", array('raw'=>'true'));
                        $spice = $spice ? $spice : 1 ;
                        $spicy = types_render_field("spicy-level", array());
                        $spicy = $spicy ? $spicy : "Mildly Spicy";
                    ?>
                    <div class="recipeIcon">
                        <i class="spriteSpicy-md spicy<?php echo $spice ?>"></i>             
                    </div>
                    <div class="iconText">
                        <?php echo $spicy ?>
                    </div>
                </div>
            </div>
            <div class="shortDescription col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 col-xs-12">
                <?php the_excerpt() ?>
            </div>
        </div>
    </div>
</section>
<section id="recipeSec3">
    <div class="container-fluid no-padding">
        <div class="recipeSec3row1 text-center">
            <div class="col-md-8 col-sm-6 col-xs-12 procedureColumn">
                <h3 class="secHeader3">Methods</h3>
                <div class="columnContent text-left col-xs-12">
                    <?php 
                        $steps = get_post_meta(get_the_ID(), 'wpcf-recipe-steps');
                        foreach($steps as $index => $step){
                            $k = $index + 1;
                            echo '<div class="recipeSteps col-xs-12 no-padding">
                                    <div class="step-index col-xs-1 no-padding text-center">' . $k . '</div>
                                    <div class="step-text col-xs-11">' . $step . '</div></div>';
                        }
                    ?>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 ingredientColumn">
                <h3 class="secHeader3">Ingredients</h3>
                <div class="columnContent text-left">
                    <?php
                        $id = get_the_ID();
                        echo get_ingredients_posts_for_recipes($id);
                    ?>
                    <div class="btnHolder text-center">
                        <button type="button" class="btn noarrow" id="buyIngredients">Buy selected ingredients</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="recipeSec4">
    <div class="container-fluid no-padding">
        <div class="recipeSec4row1 text-center recipeActionsSec col-xs-12">
            <div class="recipeAction col-xs-6">
                <?php 
                    if(hasAlreadyVoted($id)){
                        $likeClass = 'like';
                    } else {
                        $likeClass = 'dislike';
                    }
                ?>
                <button type="button" class="recipeAction-btn <?php echo $likeClass; ?>" data-post_id="<?php echo $id; ?>" id="likeRecipeBtn">
                    <span class="recipeAction-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 36 36" style="enable-background:new 0 0 36 36;fill:#ED5B31;" xml:space="preserve">
                            <path d="M29.7,5.8c0,0-6.3-4.1-11.1,1.2c0,0-0.3,0.3-0.6,0.3c-0.4,0-0.6-0.3-0.6-0.3C12.6,1.8,6.3,5.8,6.3,5.8C0,10.7,2.6,17.6,2.6,17.6C5,27.2,15.4,30.9,15.4,30.9c0.8,0.6,1.7,0.8,2.6,0.7c0.9,0,1.8-0.2,2.7-0.7c0,0,10.4-3.7,12.8-13.3C33.4,17.6,36,10.7,29.7,5.8z"/>
                        </svg>
                    </span>    
                    <span class="recipeAction-text likesCount">
                        Like this recipe
                    </span>    
                </button>
            </div>
            <div class="recipeAction col-xs-6">
                <button type="button" class="recipeAction-btn" id="shareRecipeBtn">
                    <span class="recipeAction-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 36 36" style="enable-background:new 0 0 36 36;fill:#ED5B31;" xml:space="preserve">
                            <path d="M3.9,18.8c-0.1-2.1,1.4-4.1,3.8-4.4c1.2-0.2,2.3,0.2,3.2,1c0.4,0.3,0.4,0.3,0.7,0c2.4-1.8,4.7-3.6,7.1-5.4c1.3-1,2.7-2.1,4-3.1c0.2-0.2,0.3-0.4,0.3-0.7c-0.3-2,0.7-3.8,2.3-4.7c1.7-0.9,3.9-0.4,5.1,1.1c1.2,1.5,1.4,3.1,0.6,4.8c-0.7,1.5-1.9,2.2-3.5,2.4c-1.3,0.1-2.4-0.3-3.3-1.2c-0.2-0.2-0.3-0.2-0.5,0c-2,1.5-4,3.1-6,4.6c-1.6,1.3-3.3,2.5-4.9,3.7c-0.4,0.3-0.5,0.6-0.4,1c0.2,0.9,0,1.8-0.4,2.6c-0.2,0.4-0.2,0.4,0.2,0.6c4,1.9,8,3.8,12,5.7c0.3,0.1,0.5,0.1,0.8-0.1c0.8-0.7,1.7-1,2.7-1.1c1.1,0,2,0.4,2.8,1c1.1,0.9,1.6,2.1,1.5,3.5c-0.1,2.3-1.8,4-3.8,4.2c-2.6,0.2-4.4-1.6-4.7-3.7c-0.1-0.6-0.1-1.2,0.1-1.8c0.1-0.3,0-0.4-0.3-0.5c-1.1-0.5-2.1-1-3.2-1.5c-2.6-1.2-5.3-2.5-7.9-3.7c-0.5-0.2-1-0.5-1.5-0.7c-0.2-0.1-0.4-0.1-0.7,0c-2.6,1.4-5.7-0.4-6.2-3.2C3.9,19.3,3.9,19.1,3.9,18.8z"/>
                        </svg>
                    </span>
                    <span class="recipeAction-text">
                        Share this recipe
                    </span>
                </button>
                <div class="recipeShareSec">
                    <div class="shareActions">
                        <?php echo do_shortcode('[Sassy_Social_Share]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="recipeSec5">
    <div class="container">
        <div class="recipeSec5row1 row" style="display:none">
            <div class="secHeaderRow text-center">
                <h2 class="secHeader inline">Selected Ingredients</h2>
            </div>
            <div id="products-container"></div>
        </div>
        <div class="recipeSec5row2 row">
            <?php 
                $result = '';
                $custom_taxterms = wp_get_object_terms( get_the_ID(), 'recipe-category', array('fields' => 'ids') );
                // arguments
                $args = array(
                    'post_type' => 'recipe',
                    'post_status' => 'publish',
                    'posts_per_page' => 10, // you may edit this number
                    'orderby' => 'rand',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'recipe-category',
                            'field' => 'id',
                            'terms' => $custom_taxterms
                        )
                    ),
                    'post__not_in' => array (get_the_ID()),
                );
                $related_items = new WP_Query( $args );
                // loop over query
                if ($related_items->have_posts()) :
                    echo '
                        <div class="secHeaderRow text-center">
                            <h2 class="secHeader inline">Related recipes</h2>
                        </div>
                        <div class="prodSlider owl-carousel">';
                    while ( $related_items->have_posts() ) : $related_items->the_post();
                ?>
                        <div class="relatedRecipeSlide">
                            <div class="rrImage">
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),"thumbnail");?>">
                                </a>
                            </div>
                            <div class="rrTitle">
                                <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </div>
                            <div class="rrDescription"><?php echo recipe_excerpt(90); ?></div>
                        </div>
                <?php
                    endwhile;
                    echo '</div>';
                endif;
                wp_reset_postdata();
            ?>
        </div>
    </div>
</section>