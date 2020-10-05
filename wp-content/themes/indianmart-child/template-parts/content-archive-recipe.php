<?php
/**
 * Template part for displaying recipes list
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Indianmart
 */

?>

<div class="recipeBlock">
    <div class="recipeBlockRow1">
        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full')?>" class="recipeimg">
        <div class="recipename"><?php the_title(); ?></div>
    </div>
    <div class="recipeBlockRow2">
        <div class="recipeBlockRow2Col1 recipeBlockText text-left">
            <?php echo recipe_excerpt(); ?>
        </div>
        <div class="recipeBlockRow2Col2 recipeMetaBlock">
            <div class="innerMetaBlock">
                <div class="recipeMetaList">
                    <div class="recipeMetaIcon"><i class="spriteRecipe r-icon-01"></i></div>
                    <div class="recipeMetaText"><?php echo types_render_field("serves-count", array( )); ?></div>
                </div>
                <div class="recipeMetaList">
                    <div class="recipeMetaIcon"><i class="spriteRecipe r-icon-02"></i></div>
                    <div class="recipeMetaText"><?php echo types_render_field("cooking-time", array()) ?></div>
                </div>
                <div class="recipeMetaList">
                    <div class="recipeMetaIcon"><i class="spriteRecipe r-icon-03"></i></div>
                    <div class="recipeMetaText"><?php echo types_render_field("cooking-difficulty", array()) ?></div>
                </div>
                <div class="recipeMetaList">
                    <?php $kind = types_render_field("recipe-kind", array()); ?>
                    <div class="recipeMetaIcon">
                        <i class="spriteRecipe <?php echo $kind == 'Veg' ? 'veg' : 'nonveg'; ?> r-icon-04">
                            <?php echo $kind == 'Veg' ? 'V' : 'N'; ?>
                        </i>
                    </div>
                    <div class="recipeMetaText"><?php echo $kind == 'Veg' ? 'Vegetarian' : 'Non- Vegetarian'; ?></div>
                </div>
                <div class="recipeMetaList">
                    <div class="recipeMetaIcon">
                        <i class="spriteSpicy-sm spicy<?php echo types_render_field("spicy-level", array('raw'=>'true'));?>"></i>
                    </div>
                    <div class="recipeMetaText"><?php echo types_render_field("spicy-level", array()); ?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="recipeBlockRow3">
        <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="recipeauthor">Recipe by <?php echo the_author_link() ?></div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="btnHolder text-right">
                <a class="btn recipeBlockBtn noarrow" href="<?php echo get_permalink() ?>">View Recipe</a>
            </div>
        </div>
    </div>
</div>