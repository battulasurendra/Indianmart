<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Indianmart
 */

get_header(); ?>

<section id="recipelistSec1">
    <div class="container-fluid">
        <div class="recieplistSec1row1 row">
            <div class="recipelistbanner bannerContent content_bg col-xs-12 no-padding">
                <div class="text-holder col-md-6 col-sm-6 col-xs-12 text-center">
                    <img src="<?php echo get_site_url()?>/wp-content/uploads/2017/12/loginText.svg">
                </div>
            </div>
        </div>
    </div>
</section>
<section id="recipelistSec2">
    <div class="container-fluid no-padding">
        <div class="recipelistSec2row1">
            <div class="recipecategorylist dropdown btnHolder">
                <button class="recipelistoption btn dropdown-toggle noarrow nakedBtn noeffect" type="button" data-toggle="dropdown">
                    <span class="spriteRecipe r-icon-snacks r-icon-snacks-dims"></span>
                    <span class="recipe-category">Appetizers &amp; snacks</span>
                </button>
                <ul class="recipecatlist d-table">
                    <li class="recipe-item active d-cell">
                        <button class="recipelistbtn" type="button" data-category="appetizers-snacks">
                            <span class="spriteRecipe r-icon-snacks"></span>
                            <span class="recipe-category">Appetizers &amp; snacks</span>
                        </button>
                    </li>
                    <li class="recipe-item d-cell">
                        <button class="recipelistbtn" type="button" data-category="curries-mains">
                            <span class="spriteRecipe r-icon-currie"></span>
                            <span class="recipe-category">Curries &amp; Mains</span>
                        </button>
                    </li>
                    <li class="recipe-item d-cell">
                        <button class="recipelistbtn" type="button" data-category="condiments">
                            <span class="spriteRecipe r-icon-condiments"></span>
                            <span class="recipe-category">condiments</span>
                        </button>
                    </li>
                    <li class="recipe-item d-cell">
                        <button class="recipelistbtn" type="button" data-category="rice">
                            <span class="spriteRecipe r-icon-rice"></span>
                            <span class="recipe-category">rice</span>
                        </button>
                    </li>
                    <li class="recipe-item d-cell">
                        <button class="recipelistbtn" type="button" data-category="parathas-breads">
                            <span class="spriteRecipe r-icon-breads"></span>
                            <span class="recipe-category">Parathas &amp; breads</span>
                        </button>
                    </li>
                    <li class="recipe-item d-cell">
                        <button class="recipelistbtn" type="button" data-category="sweets-desserts">
                            <span class="spriteRecipe r-icon-sweets"></span>
                            <span class="recipe-category">Sweets</span>
                        </button>
                    </li>
                    <li class="recipe-item d-cell">
                        <button class="recipelistbtn" type="button" data-category="beverages">
                            <span class="spriteRecipe r-icon-beverages"></span>
                            <span class="recipe-category">Beverages</span>
                        </button>
                    </li>
                    <li class="recipe-item d-cell">
                        <button class="recipelistbtn" type="button" data-category="miscellaneous">
                            <span class="spriteRecipe r-icon-miscellaneous"></span>
                            <span class="recipe-category">Vegan</span>
                        </button>
                    </li>
                </ul>
            </div>  
        </div>
    </div>
</section>
<section id="recipelistSec3">
    <div id="ajax_loader"></div>
    <div class="container-fluid">
        <div class="recipelistSec3row1 row text-center">
            <div class="recipelist inline text-center">
                <?php
                /*if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/content-archive-recipe', get_post_format() );

                    endwhile;

                else :

                    get_template_part( 'template-parts/content', 'none' );

                endif;*/
                /**/?>
            </div>
        </div>
        <div class="recipelistSec3rowbtn row">
            <div class="btnHolder">
                <a href="#" class="btn recipelistviewmore">View More</a>
            </div>
        </div>
    </div>
</section>
<section id="recipelistSec4">
    <div class="container-fluid no-padding">
        <div class="recipelistSec4row1 row disp-table">
            <div class="col-md-6 col-sm-6 col-xs-12 disp-cell">
                <img src="<?php echo get_stylesheet_directory_uri().'/images/bottomimg.png'?>" class="img-responsive recipebottomimg">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 disp-cell recipe-bottom-text">
                <div class="recipelistsec4-text">Here’s your chance to show <br/> off your culinary skills !</div>
                <span class="author">Write your own authentic recipe </span>
                <div class="btnHolder">
                    <a href="<?php echo get_permalink(358) ?>" class="btn recipeBtn">SUBMIT NOW</a>
                </div>
            </div>
        </div>
    </div>  
</section>
<?php
get_sidebar();
get_footer();
?>

<script type="text/javascript">
    jQuery(function($){
        var curPage = 1, curCategory = 'appetizers-snacks', curSort = 'popular', clearList = 0;

        $('.recipecatlist.d-table li').on('click', function () {
            $('.recipecatlist.d-table li').removeClass('active');
            $(this).addClass('active');
        });

        $(window).resize(function () {
            add_dropdown_class();
        });
        
        $('document').ready(function () {
            var loaderContent = $('#page_loader').html();
            $('#ajax_loader').html(loaderContent);
            populateRecipes('appetizers-snacks');
            add_dropdown_class();
            makeSticky($('.recipecategorylist'),'sticky');
            var loaderContent = $('#page_loader').html();
            $('#ajax_loader').html(loaderContent);
        });

        $('.recipelistbtn').click(function () {
            var category = $(this).data('category');
            if(curCategory != category){
                curPage = 1;
            }
            populateRecipes(category);
            $('html,body').animate({scrollTop: $("#recipelistSec2").offset().top - 90},'slow');
            $('.recipelistoption').html($(this).html());
        });

        $('.recipelistviewmore').click(function (e) {
            e.preventDefault();
            populateRecipes(curCategory);
        });

        function populateRecipes(category) {
            $('#ajax_loader').show();
            $('.recipelist').addClass('loading');
            var formdata = new FormData();

            formdata.append('action', 'recipes_list');
            formdata.append('security', im_ajax.security);
            formdata.append('category', category);
            formdata.append('page', curPage);
            formdata.append('sortby', curSort);

            $.ajax({
                url: im_ajax.ajaxurl,
                type: 'POST',
                data: formdata,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function (data) {
                    var txt = "";
                    var len = data.length;

                    if (len > 0) {
                        for (i = 0; i < len; i++) {
                            txt += '<div class="recipeBlock">'+
                                '<div class="recipeBlockRow1">'+
                                '<img src="'+data[i].image+'" class="recipeimg">'+
                                '<div class="recipename">'+data[i].name+'</div>'+
                                '</div>'+
                                '<div class="recipeBlockRow2">'+
                                '<div class="recipeBlockRow2Col1 recipeBlockText text-left">'+data[i].description+'</div>'+
                                '<div class="recipeBlockRow2Col2 recipeMetaBlock">'+
                                '<div class="innerMetaBlock">'+
                                '<div class="recipeMetaList"><div class="recipeMetaIcon"><i class="spriteRecipe r-icon-01"></i></div>'+
                                '<div class="recipeMetaText">'+data[i].serves+'</div></div>'+
                                '<div class="recipeMetaList"><div class="recipeMetaIcon"><i class="spriteRecipe r-icon-02"></i></div>'+
                                '<div class="recipeMetaText">'+data[i].time+'</div></div>'+
                                '<div class="recipeMetaList"><div class="recipeMetaIcon"><i class="spriteRecipe r-icon-03"></i></div>'+
                                '<div class="recipeMetaText">'+data[i].difficulty+'</div></div>'+
                                '<div class="recipeMetaList"><div class="recipeMetaIcon">'+
                                '<i class="spriteRecipe '+(data[i].diet == "Veg" ? "veg" : "nonveg" )+' r-icon-04">'+
                                ''+(data[i].diet == 'Veg' ? 'V' : 'N' )+
                                '</i></div>'+
                                '<div class="recipeMetaText">'+(data[i].diet == 'Veg' ? 'Vegetarian' : 'Non- Vegetarian' )+
                                '</div></div>'+
                                '</div></div></div>'+
                                '<div class="recipeBlockRow3">'+
                                '<div class="col-md-6 col-sm-6 col-xs-6">'+
                                '<div class="recipeauthor">Recipe by '+data[i].author+'</div></div>'+
                                '<div class="col-md-6 col-sm-6 col-xs-6"><div class="btnHolder text-right">'+
                                '<a class="btn recipeBlockBtn noarrow" href="'+data[i].link+'">View Recipe</a>'+
                                '</div></div></div></div>';
                        }

                        curPage++;
                        $('.recipelistSec3rowbtn').slideDown('fast');
                    } else {
                        txt = '<p class="noMoreText">No more recipies available in this category</p>';
                        $('.recipelistSec3rowbtn').slideUp('fast');
                    }

                    if(curCategory != category){
                        curCategory = category;
                        clearList = 1;
                    }

                    if(clearList == 1){
                        $('.recipelist').html(txt);
                    } else {
                        $('.recipelist').append(txt);                    
                    }

                    gridWidthRecipe($('.recipelist'), $('.recipeBlock'));
                    clearList = 0;
                    $('#ajax_loader').hide();
                    $('.recipelist').removeClass('loading');

                },
                error: function (error) {
                    $('#ajax_loader').hide();
                    $('.recipelist').removeClass('loading');
                    console.log(error);
                }
            });
        }

        function add_dropdown_class() {
            if ($(window).width() < 768) {
                $('.recipecatlist.d-table').addClass('dropdown-menu');
            } else {
                $('.recipecatlist.d-table').removeClass('dropdown-menu');
            }
        }

        function makeSticky(ele, stickyClass){
            var eleOffset = ele.offset().top + ele.innerHeight();
            $(window).on('scroll',function(){
                var pos = Math.round($(window).scrollTop());
                if(pos > eleOffset){
                    ele.addClass(stickyClass);
                } else {
                    ele.removeClass(stickyClass);
                }
            });
        }
        
        function gridWidthRecipe(ele, cEle){
            var childWidth = cEle.outerWidth(true),
                eleWidth = ele.innerWidth(),
                cols = (eleWidth/childWidth),
                cEleSelector = cEle.attr('class').replace(/\s/g, '.').replace (/^/,'.');
            cols = Math.floor(cols);
            ele.innerWidth((cols*childWidth) + 5);
            $(cEleSelector+':nth-child('+cols+'n)').after('<div class="clear"></div>');
            console.log(cols);
            console.log(cEleSelector);
        }
    });
</script>
<?php ?>