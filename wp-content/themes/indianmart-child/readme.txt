Please read this file before updating and editing Indianmart files/plugins.

/*************** Customized plugins ***************/

    Plugin Name : ajax-search-for-woocommerce
    
    Plugin File : ajax-search-for-woocommerce/includes/functions.php
    Edited Function: dgwt_wcas_print_ico_loupe().

    Edit: Changed svg code for search icon in search bar in header menu. Plugin default icon is different. Customized icon avaialble in child theme folder 'images/searchIcon.svg'.
    ----------------------
    
    Plugin File : ajax-search-for-woocommerce/includes/tmpl/single-product.php
    Edited element: <div class="dgwt-wcas-pd-addtc">.

    Edit: Added two child elements '<div class="product">' and '<div class="woocommerce_sp_addtocart">' before calling php function.

    -----------------------------------------------

    Plugin Name : tm-woocommerce-compare-wishlist
    
    Plugin File : tm-woocommerce-compare-wishlist/includes/wishlist/wishlist.php
    Edited Function: tm_woowishlist_render_table().

    Edit: Changed class name from 'row' to 'products-container' in the first html element. Product structure has been change from default to custom by commenting default code and adding custom_product_structure() function.
    ----------------------
    
    Plugin File : tm-woocommerce-compare-wishlist/includes/wishlist/buttons.php
    Edited Function: tm_woowishlist_add_button().

    Edit1: added 'global $product' and changed method of get_id() to a latest syntax.
    Edit2: added remove class and text in  if condition to replace 'Added to wishlist' button to remove item from wishlist.
    ----------------------
    
    Plugin File : tm-woocommerce-compare-wishlist/assets/js/tm-woowishlist.js
    Edited Function: productButtonsInit().

    Edit1: changed class name in button.hasClass() check in if condition from 'in_wishlist' to tmWooAddedClass variable
    Edit2: changed tmWooAddedClass variable value from 'added in_wishlist' to 'tm-woowishlist-remove'
    ----------------------
    
    Plugin File : tm-woocommerce-compare-wishlist/tm-woocommerce-compare-wishlist.php
    Edited Function: get_loader().

    Edit: Changed loader from svg to common gif.

    -----------------------------------------------

    Plugin Name : woocommerce-category-banner
    
    Plugin File : woocommerce-category-banner/woocommerce-category-banner.php
    Edited Function: woocommerce_category_banner().

    Edit: Changed banned action from 'woocommerce_before_main_content' to custom action 'wcb_show_category_banner'.

    -----------------------------------------------

    Plugin Name : woocommerce
    
    Plugin Files : All files in indianmart-child/woocommerce
    
    Edit: There are so many edits done in these templates to match design
    
    -----------------------------------------------

    Plugin Name : UberMenu
    
    Plugin Files : ubermenu\pro\menuitems\UberMenuItemDynamicPosts.class.php
    Edited Function: alter().
    
    Edit: Added metaquery in line 233 for dynamic posts, if dynamic menu ite is product this metaquery will remove outofstock products. This will be resulted in the menubar listing products in category sub menu.
    
    -----------------------------------------------

    Plugin Name : UberMenu
    
    Plugin Files : \woocommerce-product-stock-alert\classes\class-woo-product-stock-alert-frontend.php
    Edited Function: __construct().
    
    Edit: Added alert to new custom add_action of 'custom_out_of_stock_alert' and commented default added action 'woocommerce_single_product_summary'.
    
/*************** Customized plugins ***************/