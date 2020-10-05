<?php
/**
 * The template for Recipe Submit form
 *
 * @package Indianmart
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main"> 
        <section id="submitSec1">
            <nav class="woocommerce-breadcrumb" itemprop="breadcrumb">
                <span property="itemListElement" typeof="ListItem">
                    <a property="item" typeof="WebPage" title="Go to Home." href="http://18.216.61.11/Indianmart" class="home">
                        <span property="name">Home</span>
                    </a>
                    <meta property="position" content="1">
                </span>
                <span class="brdcrmb_seperator">&gt;</span>
                <span property="itemListElement" typeof="ListItem1">
                    <span property="name">Submit Your Recipe</span>
                    <meta property="position" content="2">
                </span>
            </nav>
            <div class="container-fluid">
                <div class="submitSec1row1 secHeaderRow text-center">
                    <h2 class="secHeader inline">Submit your recipe</h2>
                </div>
                <div class="submitSec1row2 row">
                    <img src="<?php echo get_site_url()?>/wp-content/uploads/2017/12/recipe-submit-banner.jpg">
                </div>
            </div>
        </section>
        <section id="submitSec2">
            <div class="container">
                <div class="form_section has_inner row">
                    <form name="submit_form" id="submit_form" class="form" enctype="multipart/form-data">
                        <div class="form_inner_sec submitSec2row1" id="description_fields">
                            <div class="secHeaderRow text-center">
                                <h2 class="secHeader inline">Description</h2>
                                <i class="sprite sprite-submitIcon1"></i>
                            </div>
                            <div class="description_field-wrapper">
                                <p class="form-row validate-required">
                                    <input type="text" class="input-text" name="dishName" placeholder="Name of the dish">
                                </p>
                                <p class="form-row form-row-last validate-required">
                                    <textarea class="input-text" name="dishDescription" placeholder="A tempting description of the dish" rows="4"></textarea>
                                </p>
                                <!--<p class="form-row validate-required">
                                    <input type="text" class="input-text" name="authorName" placeholder="Name of the author">
                                </p>-->
                                <div class="col-xs-12 dishDetailsSec text-left no-padding">
                                    <div class="detailTile">
                                        <div class="recipeIcon">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 60 36" style="enable-background:new 0 0 60 36;fill:#ee5b31;" xml:space="preserve">
                                                <path d="M56.6,27.8c-0.3-0.2-0.7-0.3-1.1-0.3l-0.9,0h-3.5h-0.6c-0.1-4.6-1.8-9.2-4.9-12.7c-2.9-3.5-7.1-5.9-11.5-6.8c0.4-0.7,0.5-1.4,0.5-2.2c0-1.2-0.5-2.4-1.4-3.3C32.4,1.6,31.2,1,30,1.1c-1.2,0-2.4,0.5-3.3,1.4c-0.9,0.9-1.4,2.1-1.4,3.3c0,0.8,0.2,1.5,0.5,2.2c-4.5,0.9-8.6,3.4-11.5,6.8c-3,3.5-4.8,8.1-4.9,12.7H8.9H5.4l-0.9,0c-0.4,0-0.8,0.1-1.1,0.3c-0.7,0.4-1.1,1.1-1.1,1.9c0,0.8,0.4,1.5,1.1,1.9c0.3,0.2,0.7,0.3,1.1,0.3l0.9,0h3.5h3.9c0.1,0.7,0.4,1.4,0.9,1.9c0.6,0.7,1.5,1,2.4,1.1l4.6,0H30h9.2l4.6,0c0.9,0,1.8-0.4,2.4-1.1c0.5-0.5,0.8-1.2,0.9-1.9h3.9h3.5l0.9,0c0.4,0,0.8-0.1,1.1-0.3c0.7-0.4,1.1-1.1,1.1-1.9C57.7,29,57.3,28.2,56.6,27.8z M27.4,3.2C28.1,2.5,29,2.1,30,2.1c1,0,1.9,0.4,2.6,1.1c0.7,0.7,1.1,1.6,1.1,2.6c0,1-0.4,1.9-1.1,2.6C31.9,9,31,9.4,30,9.3c-1,0-1.9-0.4-2.6-1.1c-0.7-0.7-1.1-1.6-1.1-2.6C26.4,4.8,26.8,3.8,27.4,3.2z M15.2,15.4c2.9-3.4,7-5.8,11.4-6.6c0,0.1,0.1,0.1,0.1,0.2c0.9,0.9,2.1,1.4,3.3,1.4c1.2,0,2.4-0.5,3.3-1.4c0.1-0.1,0.1-0.1,0.1-0.2c4.4,0.8,8.5,3.1,11.4,6.6c2.9,3.3,4.5,7.7,4.6,12.1h-5.4H30H15.9h-5.4C10.7,23.1,12.3,18.8,15.2,15.4z M45.5,33.1c-0.4,0.5-1.1,0.7-1.7,0.8l-4.6,0H30h-9.2l-4.6,0c-0.6,0-1.2-0.3-1.7-0.8c-0.3-0.3-0.5-0.7-0.6-1.2h2H30h14.1h2C46,32.4,45.8,32.8,45.5,33.1z M56.1,30.7c-0.2,0.1-0.4,0.2-0.6,0.2l-0.9,0h-3.5h-7H30H15.9h-7H5.4l-0.9,0c-0.2,0-0.4-0.1-0.6-0.2c-0.4-0.2-0.6-0.6-0.6-1c0-0.4,0.2-0.8,0.6-1c0.2-0.1,0.4-0.2,0.6-0.2l0.9,0h3.5h7H30h14.1h7h3.5l0.9,0c0.2,0,0.4,0.1,0.6,0.2c0.4,0.2,0.6,0.6,0.6,1S56.4,30.5,56.1,30.7z"></path>
                                                <path d="M39.2,35.1l-23,0c-0.9,0-1.9-0.4-2.5-1.1c-0.5-0.5-0.8-1.2-1-1.9l-8.3,0c-0.4,0-0.8-0.1-1.2-0.3c-0.7-0.4-1.2-1.2-1.2-2c0-0.8,0.4-1.6,1.2-2c0.3-0.2,0.7-0.3,1.2-0.3l4.9,0c0.1-4.7,1.9-9.2,4.9-12.7c2.9-3.5,7-5.9,11.4-6.8c-0.3-0.7-0.5-1.4-0.5-2.1c0-1.3,0.5-2.5,1.4-3.4c0.9-0.9,2.1-1.4,3.4-1.4h0c1.3,0,2.5,0.5,3.4,1.4c0.9,0.9,1.4,2.1,1.4,3.4c0,0.7-0.2,1.4-0.5,2.1c4.4,0.9,8.5,3.4,11.4,6.8c3,3.5,4.8,8,4.9,12.7l4.9,0c0.4,0,0.8,0.1,1.2,0.3c0.7,0.4,1.2,1.2,1.2,2c0,0.8-0.4,1.6-1.2,2c-0.3,0.2-0.7,0.3-1.2,0.3l-8.3,0c-0.1,0.7-0.5,1.4-1,1.9c-0.6,0.7-1.6,1.1-2.5,1.1L39.2,35.1z M5.4,27.6l-0.9,0c-0.4,0-0.7,0.1-1,0.3c-0.6,0.4-1,1.1-1,1.8c0,0.7,0.4,1.5,1,1.8c0.3,0.2,0.7,0.3,1,0.3l8.5,0l0,0.1c0.1,0.7,0.4,1.4,0.9,1.9c0.6,0.6,1.5,1,2.3,1l23,0l4.6,0c0.9,0,1.7-0.4,2.3-1c0.5-0.5,0.8-1.1,0.9-1.9l0-0.1l8.5,0c0.4,0,0.7-0.1,1-0.3c0.6-0.4,1-1.1,1-1.8c0-0.7-0.4-1.5-1-1.8c-0.3-0.2-0.7-0.3-1-0.3l-5.1,0l0-0.1c-0.1-4.7-1.8-9.2-4.8-12.7c-2.9-3.5-7-5.9-11.4-6.8L34,8L34,7.9c0.4-0.7,0.5-1.4,0.5-2.1c0-1.2-0.5-2.4-1.3-3.2c-0.8-0.8-2-1.3-3.2-1.3h0c-1.2,0-2.4,0.5-3.2,1.3c-0.8,0.8-1.3,2-1.3,3.2c0,0.7,0.2,1.5,0.5,2.1L26,8l-0.2,0c-4.4,0.9-8.5,3.3-11.4,6.8c-3,3.5-4.7,8-4.8,12.7l0,0.1H5.4z M39.2,34l-23,0c-0.7,0-1.3-0.3-1.8-0.8c-0.3-0.3-0.6-0.8-0.7-1.2l0-0.1h32.5l0,0.1c-0.1,0.5-0.3,0.9-0.7,1.2c-0.5,0.5-1.1,0.8-1.8,0.8L39.2,34z M14.1,32.1c0.1,0.4,0.3,0.7,0.6,1c0.4,0.4,1,0.7,1.6,0.7l23,0l4.6,0c0.6,0,1.2-0.3,1.6-0.7c0.3-0.3,0.5-0.6,0.6-1H14.1z M54.6,31L4.5,31c-0.2,0-0.5-0.1-0.6-0.2c-0.4-0.2-0.6-0.7-0.6-1.1c0-0.5,0.3-0.9,0.6-1.1c0.2-0.1,0.4-0.2,0.6-0.2l4.4,0l46.6,0c0.2,0,0.5,0.1,0.6,0.2c0.4,0.2,0.6,0.7,0.6,1.1c0,0.5-0.2,0.9-0.6,1.1C56,30.9,55.8,31,55.5,31L54.6,31z M5.4,28.7l-0.9,0c-0.2,0-0.4,0.1-0.5,0.1c-0.3,0.2-0.5,0.5-0.5,0.9c0,0.4,0.2,0.7,0.5,0.9c0.1,0.1,0.3,0.1,0.5,0.1l4.4,0l46.6,0c0.2,0,0.4-0.1,0.5-0.1c0.3-0.2,0.5-0.5,0.5-0.9c0-0.4-0.2-0.7-0.5-0.9c-0.1-0.1-0.3-0.1-0.5-0.1l-4.4,0H5.4z M49.6,27.6H10.4l0-0.1c0.1-4.5,1.8-8.8,4.6-12.1c2.9-3.4,7.1-5.8,11.5-6.6l0.1,0l0.1,0.1c0,0,0.1,0.1,0.1,0.1c0.8,0.8,2,1.3,3.2,1.3h0c1.2,0,2.4-0.5,3.2-1.3c0,0,0.1-0.1,0.1-0.1l0.1-0.1l0.1,0c4.4,0.8,8.6,3.2,11.4,6.6c2.9,3.4,4.5,7.7,4.6,12.1L49.6,27.6z M10.7,27.4h38.7c-0.1-4.4-1.8-8.6-4.6-11.9c-2.8-3.4-6.9-5.7-11.2-6.5l0,0c0,0-0.1,0.1-0.1,0.1c-0.9,0.9-2.1,1.4-3.4,1.4h0c-1.3,0-2.5-0.5-3.4-1.4c0,0-0.1-0.1-0.1-0.1l0,0c-4.3,0.8-8.4,3.1-11.2,6.5C12.4,18.8,10.8,23,10.7,27.4z M30,9.5l0-0.1L30,9.5L30,9.5c-1,0-2-0.4-2.7-1.1c-0.7-0.7-1.1-1.7-1.1-2.6c0-1,0.4-1.9,1.1-2.6C28,2.4,29,2,30,2c1,0,2,0.4,2.7,1.1c0.7,0.7,1.1,1.7,1.1,2.6c0,1-0.4,1.9-1.1,2.6C32,9.1,31,9.5,30,9.5z M30,9.2l0,0.1L30,9.2c0.9,0,1.8-0.4,2.5-1c0.7-0.7,1-1.6,1-2.5c0-0.9-0.4-1.8-1-2.5c-0.6-0.7-1.5-1-2.5-1c-0.9,0-1.8,0.4-2.5,1c-0.7,0.7-1,1.6-1,2.5c0,0.9,0.4,1.8,1,2.5C28.2,8.9,29.1,9.2,30,9.2L30,9.2z"></path>
                                                <path d="M21.9,14.6l-0.5-0.9c-3.2,1.8-5.6,5-6.5,8.6l1,0.3C16.7,19.2,18.9,16.3,21.9,14.6z"></path>
                                                <path d="M15.9,22.6l-1.3-0.3l0-0.1c0.9-3.6,3.3-6.8,6.6-8.7l0.1-0.1l0.6,1.1l-0.1,0.1c-2.9,1.7-5.2,4.6-6,7.8L15.9,22.6z M15,22.2l0.8,0.2c0.8-3.2,3-6.1,5.9-7.8l-0.4-0.7C18.2,15.6,15.8,18.7,15,22.2z"></path>
                                            </svg>
                                        </div>
                                        <div class="iconOptions variableOptionsList dropdown btnHolder inline validate-required form-row ">
                                            <button class="iconOptionBtn input-text btn dropdown-toggle blackArrow nakedBtn noeffect" type="button" data-toggle="dropdown">Serves</button>
                                            <input type="hidden" class="input-text listSelect" name="dishServeCount">
                                            <ul class="dropdown-menu">
                                                <li class="iconOption" data-value="1">1</li>
                                                <li class="iconOption" data-value="2">2</li>
                                                <li class="iconOption" data-value="3">3</li>
                                                <li class="iconOption" data-value="4">4</li>
                                                <li class="iconOption" data-value="5">5</li>
                                                <li class="iconOption" data-value="6">6</li>
                                                <li class="iconOption" data-value="7">7</li>
                                                <li class="iconOption" data-value="8">8</li>
                                                <li class="iconOption" data-value="9">9</li>
                                                <li class="iconOption" data-value="10">10</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="detailTile">
                                        <div class="recipeIcon">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 36" style="enable-background:new 0 0 40 36;fill:#ee5b31;" xml:space="preserve">
                                                <path d="M20,0.2c-9.8,0-17.8,8-17.8,17.8s8,17.8,17.8,17.8s17.8-8,17.8-17.8S29.8,0.2,20,0.2zM20,34.5c-9.1,0-16.5-7.4-16.5-16.5S10.9,1.5,20,1.5S36.5,8.9,36.5,18S29.1,34.5,20,34.5z"></path>
                                                <path d="M20.7,14.8V4.2c0-0.4-0.3-0.7-0.7-0.7c-0.4,0-0.7,0.3-0.7,0.7v10.6c-1.3,0.3-2.3,1.3-2.6,2.6h-6c-0.4,0-0.7,0.3-0.7,0.7s0.3,0.7,0.7,0.7h6c0.3,1.5,1.6,2.6,3.2,2.6c1.8,0,3.3-1.5,3.3-3.3C23.3,16.4,22.2,15.1,20.7,14.8zM20,20c-1.1,0-2-0.9-2-2c0-1.1,0.9-2,2-2c1.1,0,2,0.9,2,2C22,19.1,21.1,20,20,20z"></path>
                                            </svg>
                                        </div>
                                        <div class="iconOptions variableOptionsList dropdown btnHolder inline validate-required form-row ">
                                            <button class="iconOptionBtn btn dropdown-toggle blackArrow nakedBtn noeffect" type="button" data-toggle="dropdown">Time</button>
                                            <input type="hidden" class="input-text listSelect" name="dishTime">
                                            <ul class="dropdown-menu">
                                                <li class="iconOption" data-value="10">10 mins</li>
                                                <li class="iconOption" data-value="15">15 mins</li>
                                                <li class="iconOption" data-value="20">20 mins</li>
                                                <li class="iconOption" data-value="30">30 mins</li>
                                                <li class="iconOption" data-value="45">45 mins</li>
                                                <li class="iconOption" data-value="60">60 mins</li>
                                                <li class="iconOption" data-value="90">90 mins</li>
                                                <li class="iconOption" data-value="120">120 mins</li>
                                                <li class="iconOption" data-value="150">150 mins</li>
                                                <li class="iconOption" data-value="180">180 mins</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="detailTile">
                                        <div class="recipeIcon">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 36" style="enable-background:new 0 0 40 36;fill:#ee5b31;stroke:#ee5b31;stroke-miterlimit:10;" xml:space="preserve">
                                                <path d="M27,8.3c-0.1,0-0.3-0.1-0.4-0.2l-2.9-3.3l-3.6,2.6c-0.2,0.1-0.5,0.1-0.7-0.1c-0.2-0.2-0.1-0.5,0.1-0.6l3.9-2.9c0.2-0.1,0.5-0.1,0.7,0.1l3.1,3.7c0.2,0.2,0.1,0.5-0.1,0.6C27.2,8.3,27.1,8.3,27,8.3L27,8.3z M27,8.3"></path>
                                                <path d="M8.8,18.6c-0.3,0-0.5-0.2-0.5-0.4c0-0.2,0.2-0.4,0.5-0.4c8,0,14.6-6.1,14.6-13.5c0-0.2,0.2-0.4,0.5-0.4c0.3,0,0.5,0.2,0.5,0.4C24.3,12.1,17.4,18.6,8.8,18.6L8.8,18.6z M8.8,18.6"></path>
                                                <path d="M8.8,32.2c-0.3,0-0.5-0.2-0.5-0.4v-6.6c0-0.2,0.2-0.4,0.5-0.4c0.3,0,0.5,0.2,0.5,0.4v6.6C9.3,32,9.1,32.2,8.8,32.2L8.8,32.2z M8.8,32.2"></path>
                                                <path d="M16.3,32.2c-0.3,0-0.5-0.2-0.5-0.4V21c0-0.2,0.2-0.4,0.5-0.4c0.3,0,0.5,0.2,0.5,0.4v10.8C16.7,32,16.5,32.2,16.3,32.2L16.3,32.2z M16.3,32.2"></path>
                                                <path d="M23.7,32.2c-0.3,0-0.5-0.2-0.5-0.4V18c0-0.2,0.2-0.4,0.5-0.4c0.3,0,0.5,0.2,0.5,0.4v13.8C24.2,32,24,32.2,23.7,32.2L23.7,32.2z M23.7,32.2"></path>
                                                <path d="M31.2,32.2c-0.3,0-0.5-0.2-0.5-0.4V13.5c0-0.2,0.2-0.4,0.5-0.4c0.3,0,0.5,0.2,0.5,0.4v18.3C31.6,32,31.4,32.2,31.2,32.2L31.2,32.2z M31.2,32.2"></path>
                                            </svg>
                                        </div>
                                        <div class="iconOptions variableOptionsList dropdown btnHolder inline validate-required form-row ">
                                            <button class="iconOptionBtn input-text btn dropdown-toggle blackArrow nakedBtn noeffect" type="button" data-toggle="dropdown">Cooking</button>
                                            <input type="hidden" class="input-text listSelect" name="dishCooking">
                                            <ul class="dropdown-menu">
                                                <li class="iconOption" data-value="0">Easy</li>
                                                <li class="iconOption" data-value="1">Medium</li>
                                                <li class="iconOption" data-value="2">Hard</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="detailTile">
                                        <div class="recipeIcon">
                                            <div class="foodkind veg"><span class="v">V</span><span class="n">N</span></div>
                                        </div>
                                        <div class="iconOptions variableOptionsList dropdown btnHolder inline validate-required form-row ">
                                            <button class="iconOptionBtn input-text btn dropdown-toggle blackArrow nakedBtn noeffect" type="button" data-toggle="dropdown">diet</button>
                                            <input type="hidden" class="input-text listSelect" name="dishDiet">
                                            <ul class="dropdown-menu">
                                                <li class="iconOption dietOption" data-value="0">Veg</li>
                                                <li class="iconOption dietOption" data-value="1">Non-Veg</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form_inner_sec submitSec2row2" id="category_fields">
                            <div class="secHeaderRow text-center">
                                <h2 class="secHeader inline">Category</h2>
                                <i class="sprite sprite-submitIcon2"></i>
                            </div>
                            <div class="category_field-wrapper">
                                <h3>Choose your category</h3>
                                <div class="form-row validate-required categoryOptions radio-group">
                                    <div class="radio">
                                        <input type="radio" class="input-text" name="dishCategory" id="category1" value="appetizers-snacks">
                                        <label for="category1">
                                            <span class="checkBtn naked"></span>
                                            Appetizers &amp; snacks
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" name="dishCategory" id="category2" value="condiments">
                                        <label for="category2">
                                            <span class="checkBtn naked"></span>
                                            Condiments
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" name="dishCategory" id="category3" value="sweets-desserts">
                                        <label for="category3">
                                            <span class="checkBtn naked"></span>
                                            Sweets &amp; Desserts
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" name="dishCategory" id="category4" value="miscellaneous">
                                        <label for="category4">
                                            <span class="checkBtn naked"></span>
                                            Vegan
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" name="dishCategory" id="category5" value="curries-mains">
                                        <label for="category5">
                                            <span class="checkBtn naked"></span>
                                            Curries &amp; Mains
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" name="dishCategory" id="category6" value="rice">
                                        <label for="category6">
                                            <span class="checkBtn naked"></span>
                                            Rice
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" name="dishCategory" id="category7" value="beverages">
                                        <label for="category7">
                                            <span class="checkBtn naked"></span>
                                            Beverages
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" name="dishCategory" id="category8" value="parathas-breads">
                                        <label for="category8">
                                            <span class="checkBtn naked"></span>
                                            Parathas &amp; Breads
                                        </label>
                                    </div>
                                </div>
                                <p class="form-row validate-required">
                                    <input type="text" class="input-text" name="dishState" id="dishState" placeholder="Which state in India does the Recipe belong to">
                                </p>
                            </div>
                        </div>
                        <div class="form_inner_sec submitSec2row3" id="ingredients_fields">
                            <div class="secHeaderRow text-center">
                                <h2 class="secHeader inline">Ingredients</h2>
                                <i class="sprite sprite-submitIcon3"></i>
                            </div>
                            <h3>Add Your Ingredient</h3>
                            <div class="ingredients_field-wrapper">
                                <div class="form-row-group">
                                    <div class="form-row validate-required col-sm-8 col-xs-12">
                                        <input type="text" class="input-text" name="ingredient1" id="ingredient1" placeholder="Ingredient1">
                                        <input type="hidden" class="input-text" name="ingredientName1" id="ingredientName1">
                                    </div>
                                    <div class="form-row validate-required col-sm-4 col-xs-12">
                                        <input type="text" class="input-text" name="quantity1" placeholder="Quantity">
                                    </div>
                                </div>
                                <div class="form-row-group">
                                    <div class="form-row validate-required col-sm-8 col-xs-12">
                                        <input type="text" class="input-text" name="ingredient2" id="ingredient2" placeholder="Ingredient2">
                                        <input type="hidden" class="input-text" name="ingredientName2" id="ingredientName2">
                                    </div>
                                    <div class="form-row validate-required col-sm-4 col-xs-12">
                                        <input type="text" class="input-text" name="quantity2" placeholder="Quantity">
                                    </div>
                                </div>
                                <div class="form-row-group">
                                    <div class="form-row validate-required col-sm-8 col-xs-12">
                                        <input type="text" class="input-text" name="ingredient3" id="ingredient3" placeholder="Ingredient3">
                                        <input type="hidden" class="input-text" name="ingredientName3" id="ingredientName3">
                                    </div>
                                    <div class="form-row validate-required col-sm-4 col-xs-12">
                                        <input type="text" class="input-text" name="quantity3" placeholder="Quantity">
                                    </div>
                                </div>
                            </div>
                            <p class="form-row ">
                                <button type="button" class="addBtn" id="addIngredient">Add Ingredient <i class="plus">+</i></button>
                            </p>
                        </div>
                        <div class="form_inner_sec submitSec2row4" id="method_fields">
                            <div class="secHeaderRow text-center">
                                <h2 class="secHeader inline">METHOD</h2>
                                <i class="sprite sprite-submitIcon4"></i>
                            </div>
                            <h3>Add Your Method</h3>
                            <div class="method_field-wrapper">
                                <p class="form-row validate-required">
                                    <input type="text" class="input-text" name="step1" placeholder="Step 1">
                                </p>
                                <p class="form-row validate-required">
                                    <input type="text" class="input-text" name="step2" placeholder="Step 2">
                                </p>
                                <p class="form-row validate-required">
                                    <input type="text" class="input-text" name="step3" placeholder="Step 3">
                                </p>
                            </div>
                            <p class="form-row ">
                                <button type="button" class="addBtn" id="addStep">Add Step <i class="plus">+</i></button>
                            </p>
                        </div>
                        <div class="form_inner_sec submitSec2row6" id="spice_fields">
                            <div class="secHeaderRow text-center">
                                <h2 class="secHeader inline">SPICY LEVEL</h2>
                            </div>
                            <h3>Select your spice level</h3>
                            <div class="form-row validate-required spicyOptions radio-group">
                                <div class="radio text-center">
                                    <input type="radio" class="input-text" name="dishSpicy" id="spicy1" value="0">
                                    <label for="spicy1">
                                        <i class="spriteSpicy spicy1"></i>
                                        Not Spicy
                                    </label>
                                </div>
                                <div class="radio text-center">
                                    <input type="radio" name="dishSpicy" id="spicy2" value="1">
                                    <label for="spicy2">
                                        <i class="spriteSpicy spicy2"></i>
                                        Mildly Spicy
                                    </label>
                                </div>
                                <div class="radio text-center">
                                    <input type="radio" name="dishSpicy" id="spicy3" value="2">
                                    <label for="spicy3">
                                        <i class="spriteSpicy spicy3"></i>
                                        Medium Spicy
                                    </label>
                                </div>
                                <div class="radio text-center">
                                    <input type="radio" name="dishSpicy" id="spicy4" value="3">
                                    <label for="spicy4">
                                        <i class="spriteSpicy spicy4"></i>
                                        Extremely Spicy
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form_inner_sec submitSec2row5" id="image_fields">
                            <div class="secHeaderRow text-center">
                                <h2 class="secHeader inline">IMAGE</h2>
                                <i class="sprite sprite-submitIcon5"></i>
                            </div>
                            <div class="image_field-wrapper">
                                <h3>Upload Your Image</h3>
                                <div class="form-row-group">
                                    <div class="form-row validate-required col-xs-12">
                                        <input type="file"id="dishImage1" class="inputfile input-text" name="dishImage1" placeholder="Click to upload" accept="image/*">
                                        <label for="dishImage1" class="addBtn text-center">Click to upload <i class="plus">+</i></label>
                                    </div>
                                    <!--<div class="form-row col-md-6 col-sm-6 col-xs-12">
                                        <input type="file" id="dishImage2" class="inputfile input-text" name="dishImage2" placeholder="Click to upload" accept="image/*">
                                        <label for="dishImage2" class="addBtn text-center">Click to upload <i class="plus">+</i></label>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                        <div class="btnHolder text-center" id="submit_field">
                            <button type="submit" class="btn noarrow">Submit recipe</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
?>

<script>
jQuery(function($){
    var statesObj = [
        {"id":"IN-AP","name":"Andhra Pradesh"},
        {"id":"IN-AR","name":"Arunachal Pradesh"},
        {"id":"IN-AS","name":"Assam"},
        {"id":"IN-BR","name":"Bihar"},
        {"id":"IN-CT","name":"Chhattisgarh"},
        {"id":"IN-GA","name":"Goa"},
        {"id":"IN-GJ","name":"Gujarat"},
        {"id":"IN-HR","name":"Haryana"},
        {"id":"IN-HP","name":"Himachal Pradesh"},
        {"id":"IN-JK","name":"Jammu and Kashmir"},
        {"id":"IN-JH","name":"Jharkhand"},
        {"id":"IN-KA","name":"Karnataka"},
        {"id":"IN-KL","name":"Kerala"},
        {"id":"IN-MP","name":"Madhya Pradesh"},
        {"id":"IN-MH","name":"Maharashtra"},
        {"id":"IN-MN","name":"Manipur"},
        {"id":"IN-ML","name":"Meghalaya"},
        {"id":"IN-MZ","name":"Mizoram"},
        {"id":"IN-NL","name":"Nagaland"},
        {"id":"IN-OR","name":"Odisha"},
        {"id":"IN-PB","name":"Punjab"},
        {"id":"IN-RJ","name":"Rajasthan"},
        {"id":"IN-SK","name":"Sikkim"},
        {"id":"IN-TN","name":"Tamil Nadu"},
        {"id":"IN-TG","name":"Telangana"},
        {"id":"IN-TR","name":"Tripura"},
        {"id":"IN-UP","name":"Uttar Pradesh"},
        {"id":"IN-UT","name":"Uttarakhand"},
        {"id":"IN-WB","name":"West Bengal"}
    ];
    
    var form_actions = {
		$checkout_form: $('#submit_form'),
		init: function() {
			// Prevent HTML5 validation which can conflict.
			this.$checkout_form.attr( 'novalidate', 'novalidate' );

			// Form submission
			this.$checkout_form.on( 'submit', this.submit );
            
			this.$checkout_form.on( 'input blur change', '.input-text, input:checkbox, input:radio', this.validate_field );
            
            $("#dishState").tokenInput(statesObj,{tokenLimit: 1});
            
            $('#ingredient1, #ingredient2, #ingredient3').each(function(){getIngredients(this)});
		},
		validate_field: function( e ) {
			var $this             = $( this ),
				$parent           = $this.closest( '.form-row' ),
				validated         = true,
				validate_required = $parent.is( '.validate-required' ),
				validate_email    = $parent.is( '.validate-email' ),
				validate_quantity = $parent.is( '.validate-quantity' ),
				event_type        = e.type;

			if ( 'input' === event_type ) {
				$parent.removeClass( 'invalid invalid-email validated' );
			}

			if ( 'focusout' === event_type || 'change' === event_type ) {

				if ( validate_required ) {
					if ( 'checkbox' === $this.attr( 'type' ) && ! $this.is( ':checked' ) ) {
						$parent.removeClass( 'validated' ).addClass( 'invalid' );
						validated = false;
					} else if ( 'radio' === $this.attr( 'type' ) ) {
						var rname = $this.attr('name');
                        if(!$('input:radio[name='+rname+']').is(':checked')){
                            $parent.removeClass( 'validated' ).addClass( 'invalid' );
                            validated = false;
                        }
					} else if ( $this.val() === '' ) {
						$parent.removeClass( 'validated' ).addClass( 'invalid' );
						validated = false;
					}
				}

				if ( validate_email ) {
					if ( $this.val() ) {
						var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);

						if ( ! pattern.test( $this.val()  ) ) {
							$parent.removeClass( 'validated' ).addClass( 'invalid invalid-email' );
							validated = false;
						}
					}
				}
                
                if(validate_quantity){
                    if($parent.siblings('.validate-ingredient').find("input[name^='ingredientName']").val() && !$this.val()){
                        $parent.removeClass( 'validated' ).addClass( 'invalid' );
                        validated = false;
                    } else if(!$parent.siblings('.validate-ingredient').find("input[name^='ingredientName']").val() && $this.val()) {
                        $parent.siblings('.validate-ingredient').removeClass( 'validated' ).addClass( 'invalid' );
                        validated = false;                        
                    }
                }

				if ( validated ) {
					$parent.removeClass( 'invalid invalid-email' ).addClass( 'validated' );
				}
			}
		},
		submit: function(e) {
            e.preventDefault();
            var $form = $( this );
            $form.find( '.input-text, select, input:checkbox' ).blur();
            
            if($('.invalid').length){
                $('html,body').animate({
                    scrollTop: $('.invalid').offset().top - 100
                }, 500);
                
                return false;
            }
            
            submitRecipe($form);
		}
	};
    
    $(document).ready(function() {
        form_actions.init();
    });
    
    $('.iconOptions li').click(function(){
        var ele = $(this),
            input = ele.parent().prev(),
            option = ele.data('value');
        
        input.val(option).change();
        
        if(ele.hasClass('dietOption')){
            if(option == 0){
                $('.foodkind').removeClass('nonveg').addClass('veg');
            } else {
                $('.foodkind').removeClass('veg').addClass('nonveg');
            }
        }
    });
    
    $('#addIngredient').click(function (){
        var template = '', parent = $('.ingredients_field-wrapper');       
        var count = parent.children().length;
        count = count+1;
        template = '<div class="form-row-group">'+
                '<div class="form-row col-sm-8 col-xs-12 validate-ingredient">'+
                    '<input type="text" class="input-text" name="ingredient'+ count +'" id="ingredient'+ count +'" placeholder="Ingredient'+ count +'">'+
                    '<input type="hidden" class="input-text" name="ingredientName'+ count +'" id="ingredientName'+ count +'">'+
                '</div>'+
                '<div class="form-row col-sm-4 col-xs-12 validate-quantity">'+
                    '<input type="text" class="input-text" name="quantity'+ count +'" placeholder="Quantity">'+
                '</div>'+
            '</div>';
        parent.append(template);
        getIngredients('#ingredient'+ count);
    });
    
    $('#addStep').click(function (){
        var template = '', parent = $('.method_field-wrapper');       
        var count = parent.children().length;
        count = count+1;
        template = '<p class="form-row ">'+
                '<input type="text" class="input-text" name="step'+ count +'" placeholder="Step '+ count +'">'+
            '</p>';
        parent.append(template);
    });
    
    /*File upload input function to show file name*/
    (function ( document, window, index ){
        var inputs = document.querySelectorAll( '.inputfile' );
        Array.prototype.forEach.call( inputs, function( input ){
            var label	 = input.nextElementSibling,
                labelVal = label.innerHTML;
            
            input.addEventListener( 'change', function(e){
                var fileName = e.target.value.split( '\\' ).pop();
                if( fileName ){
                    label.innerHTML = fileName;
                } else {
                    label.innerHTML = labelVal;
                }
            });

            // Firefox bug fix
            input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
            input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
        });
    }(document, window, 0));
    /*File upload input function to show file name*/
    
    function getIngredients(ele){
        $(ele).tokenInput(im_ajax.ajaxurl+'?action=search_ingredients&security='+im_ajax.security,{
            tokenLimit: 1,
            method: 'POST',
            allowCreation:true,
            creationId : 0,
            minChars: 3,
            onAdd: function (item) {
                $(this).next().val(item.name);
            },
            onDelete: function (item) {
                $(this).next().val('');
            }
        });
    }
    
    function submitRecipe($form){
        $('#page_loader').css('background','rgba(255, 255, 255, 0.4)').fadeIn('slow');
        if (window.FormData) {
            var formdata = new FormData();
        }
        
        formdata.append('action', 'save_submit_recipe');
        formdata.append('security', im_ajax.security);
        
        var eles = $form.find(':input'); //<-- Should return all input elements in that specific form.
        for(i=0;i<eles.length;i++){
            var ele = $(eles[i]);
            if(ele.is('input')){
                var etype = ele.attr('type'),
                    ename = ele.attr('name'),
                    eval = ele.val() ? ele.val() : "";
                
                if(!ename || !eval){continue;}
                
                var c = ename.replace(/\D/g,'');
                c = parseInt(c);
                c--;

                if(etype == ('radio' || 'checkbox')){
                    eval = $('input[name="'+ ename +'"]:checked').val();
                }

                if(ename.includes("ingredientName")){
                    formdata.append('ingredients[' + c + '][name]', eval);
                } else if(ename.includes("ingredient")){
                    formdata.append('ingredients[' + c + '][id]', eval);
                } else if(ename.includes("quantity")){
                    formdata.append('ingredients[' + c + '][quantity]', eval);
                } else if(ename.includes("step")){
                    formdata.append('steps[' + c + ']', eval);
                } else if(ename.includes("dishImage")){
                    $.each($(ele), function(i, obj) {
                        $.each(obj.files, function(j, file) {
                            formdata.append('files[' + j + ']', file);
                        })
                    });
                } else {
                    formdata.append(ename, eval);
                }

            } else if(ele.is('select') || ele.is('textarea')){
                formdata.append(ele.attr('name'), ele.val() ? ele.val() : "");
            }
        }
        
        $.ajax({
            url: im_ajax.ajaxurl,
            type: 'POST',
            data: formdata,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(response) {
                $('#page_loader').fadeOut('fast').css('background','rgba(255, 255, 255, 1)');
                if(response[0].status != ''){
                    jQuery('#popmake-1609').popmake('open', function(){});
                } else {
                    jQuery('#popmake-1613').popmake('open', function(){});
                }
                $form[0].reset;
            },
            error: function(error){
                //console.log(error);
                jQuery('#popmake-1613').popmake('open', function(){});
            }
        });

    }
});
</script>
<?php ?>