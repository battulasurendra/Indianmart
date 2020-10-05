
<?php
/**
 * The template for Culture Page
 * Template Name: Regions Template
 * @package Indianmart
 */
 
get_header();
?>

<nav class="navbar navbar-default navbar-fixed-top regionNavbar">
    <div class="container-fluid no-padding">
        <div class="regionlist dropdown btnHolder">
            <button class="regionlistoption btn dropdown-toggle noarrow nakedBtn noeffect" type="button" data-toggle="dropdown">
                <i class="regionSprite-NI-gray"></i>North India
            </button>
            <ul class="regionMenu">
                <li class="regionMenu-item">
                    <button type="button" data-href="northindia.php" class="route-navigation">
                        <i class="regionSprite-NI-gray"></i>
                        North India
                    </button>
                </li>
                <li class="regionMenu-item">
                    <button type="button" data-href="southindia.php" class="route-navigation">
                        <i class="regionSprite-SI-gray"></i>
                        South India
                    </button>
                </li>
                <li class="regionMenu-item">
                    <button type="button" data-href="centralindia.php" class="route-navigation">
                        <i class="regionSprite-CI-gray"></i>
                        Central India
                    </button>
                </li>
                <li class="regionMenu-item">
                    <button type="button" data-href="westindia.php" class="route-navigation">
                        <i class="regionSprite-WI-gray"></i>
                        West India
                    </button>
                </li>
                <li class="regionMenu-item">
                    <button type="button" data-href="eastindia.php" class="route-navigation">
                        <i class="regionSprite-EI-gray"></i>
                        East India
                    </button>
                </li>
                <li class="regionMenu-item">
                    <button type="button" data-href="northeastindia.php" class="route-navigation">
                        <i class="regionSprite-NEI-gray"></i>
                        NorthEast India
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <section id="regionSec1">
            <?php
                if(isset($_GET['region'])){
                    $page = $_GET['region'];
                    $page = $page .'.php';
                    if (!file_exists($page)) {
                        $page = 'northindia.php';
                    }
                    include $page;
                } else {
                    include 'northindia.php';
                }
            ?>
        </section>
    </main><!-- #main -->
</div><!-- #primary -->
<?php
get_sidebar();
get_footer();
?>
<script>
    function addLoadEvent(func) {
        var oldonload = window.onload;
        if (typeof window.onload != 'function') {
            window.onload = func;
        } else {
            window.onload = function() {
                if (oldonload) {
                    oldonload();
                }
                func();
            }
        }
    }
    addLoadEvent(timelineAnimation());
    addLoadEvent(secElementsAnimation());

    $('document').ready(function () {
        add_dropdown_class();
    });

    $(window).resize(function () {
        add_dropdown_class();
    });

    function add_dropdown_class() {
        if ($(window).width() < 768) {
            $('.regionMenu').addClass('dropdown-menu');
        } else {
            $('.regionMenu').removeClass('dropdown-menu');
        }
    }
    
    function timelineAnimation(){
        var controller = new ScrollMagic.Controller(), tween = new TimelineMax();
        $('path.orange_path').each(function(){
            var ele = $(this);
            tween.add(TweenMax.to(ele, 0.16, {strokeDashoffset: 0, ease:Linear.easeNone}))
        });
        var scene = new ScrollMagic.Scene({
            triggerElement: "#regionSec1",
            duration: $('#regionSec1').innerHeight() - window.innerHeight,
            offset: 350,
            tweenChanges: true}).setTween(tween).addTo(controller);
    }

    function secElementsAnimation(){
        var controller = new ScrollMagic.Controller();
        $('.animateElement').each(function(){
            var ele = $(this);
            var triggerClass = ele.parents('.row').attr('class');
            triggerClass = triggerClass.replace(" row", "");
            triggerClass = '.'+triggerClass;
            var scene = new ScrollMagic.Scene({triggerElement: triggerClass, duration: "100%"})
            .addTo(controller).on("enter", function (e) {
                ele.addClass('active');
            });
        });
    }
</script>