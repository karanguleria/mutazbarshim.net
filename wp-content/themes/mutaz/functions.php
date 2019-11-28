<?php
/*-------------------------------- Child theme style and script adding functions starts --------------------------------------*/
add_action( 'wp_enqueue_scripts', 'enqueue_wp_child_theme' );
function enqueue_wp_child_theme() 
{
	wp_enqueue_style('parent-css', get_template_directory_uri().'/style.css' );
	//wp_enqueue_style('reset-css', get_stylesheet_directory_uri().'/assets/css/reset.css' );
	//wp_enqueue_style('mixit_style-css', get_stylesheet_directory_uri().'/assets/css/mixitup.css' );
//	wp_enqueue_style('owl-css', get_stylesheet_directory_uri().'/assets/css/owl.carousel.min.css' );
	wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/assets/js/custom.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script('boot-js', get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), '1.0', true );	
	wp_enqueue_script('owl-js', get_stylesheet_directory_uri() . '/assets/js/owl.carousel.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script('mixit-js', get_stylesheet_directory_uri() . '/assets/js/mixitup.js', array( 'jquery' ), '1.0', true );

}
/*-------------------------------- woocommerce Proceed to checkout hook --------------------------------------*/

remove_action( 'woocommerce_proceed_to_checkout','woocommerce_button_proceed_to_checkout', 20);
add_action( 'woocommerce_cart_actions', 'move_proceed_button' );
function move_proceed_button( $checkout ) {
	echo '<a href="#"  class="checkout-button button alt wc-forward" >' . __( 'Proceed to Checkout', 'woocommerce' ) . '</a>';
}

/**
 *  Unset Checkout Fields
 **/ 
 
 add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

add_filter( 'woocommerce_return_to_shop_redirect', 'bbloomer_change_return_shop_url' );
 
function bbloomer_change_return_shop_url() {
return home_url();
}

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
      unset($fields['billing']['billing_company']);
      unset($fields['billing']['billing_postcode']);
      unset($fields['billing']['billing_first_name']['label']);
      unset($fields['billing']['billing_last_name']['label']);
      unset($fields['billing']['billing_city']['label']);
      unset($fields['billing']['billing_phone']['label']);
      unset($fields['billing']['billing_email']['label']);
      unset($fields['billing']['billing_state']['label']);
      unset($fields['billing']['billing_country']['label']);
      unset($fields['billing']['billing_address_1']['label']);
      
      $fields['billing']['billing_first_name']['placeholder'] = 'First name...';
      $fields['billing']['billing_last_name']['placeholder'] = 'Last name...';
      $fields['billing']['billing_city']['placeholder'] = 'Enter city...';
      $fields['billing']['billing_phone']['placeholder'] = 'Phone number...';
      $fields['billing']['billing_email']['placeholder'] = 'Email address';
      $fields['billing']['billing_state']['placeholder'] = 'Enter State...';
      $fields['billing']['billing_country']['placeholder'] = 'Choose country...';
      $fields['billing']['billing_address_1']['placeholder'] = 'Street name...';
    
      return $fields;
      }

/*-------------------------------- Grounds Slider Post Function Starts --------------------------------------*/
add_action( 'init', 'wpb_register_cpt_Grounds' );
function wpb_register_cpt_Grounds() {
$labels = array(
'name' => _x( 'Grounds', 'Grounds' ),
'singular_name' => _x( 'Grounds', 'Grounds' ),
'add_new' => _x( 'Add New', 'Grounds' ),
'add_new_item' => _x( 'Add New Grounds', 'Grounds' ),
'edit_item' => _x( 'Edit Grounds', 'Grounds' ),
'new_item' => _x( 'New Grounds', 'Grounds' ),
'view_item' => _x( 'View Grounds', 'Grounds' ),
'search_items' => _x( 'Search Grounds', 'Grounds' ),
'not_found' => _x( 'No Grounds found', 'Grounds' ),
'not_found_in_trash' => _x( 'No Grounds found in Trash', 'Grounds' ),
'parent_item_colon' => _x( 'Parent Grounds:', 'Grounds' ),
'menu_name' => _x( 'Higher Grounds', 'Grounds' ),
);
$args = array(
'labels' => $labels,
'hierarchical' => false,
'supports' => array( 'title', 'thumbnail', 'editor' ),
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'show_in_nav_menus' => true,
'publicly_queryable' => true,
'exclude_from_search' => false,
'has_archive' => true,
'query_var' => true,
'can_export' => true,
'menu_icon' => 'dashicons-images-alt2',
'rewrite' => true,
'capability_type' => 'post'
    );
register_post_type( 'Grounds', $args );
flush_rewrite_rules();
}
function Grounds_taxonomy() {
 register_taxonomy(
  'grounds_categories',  
  'grounds',     
  array(
   'hierarchical'   => true,
   'label'   => 'Grounds Categories',  
   'query_var'   => true,
   'rewrite'  => array(
   'slug'    => 'Grounds', 
   'with_front'  => false 
     )
   )
  );
}
add_action( 'init', 'Grounds_taxonomy');
/*-------------------------------- Grounds Slider Post Function Ends --------------------------------------*/
/*-------------------------------- Sponser Slider Post Function Starts --------------------------------------*/
add_action( 'init', 'wpb_register_cpt_sponser_carousel' );
function wpb_register_cpt_sponser_carousel() {
$labels = array(
'name' => _x( 'Sponser', 'Sponser' ),
'singular_name' => _x( 'Sponser', 'Sponser' ),
'add_new' => _x( 'Add New', 'Sponser' ),
'add_new_item' => _x( 'Add New Sponser', 'Sponser' ),
'edit_item' => _x( 'Edit Sponser', 'Sponser' ),
'new_item' => _x( 'New Sponser', 'Sponser' ),
'view_item' => _x( 'View Sponser', 'Sponser' ),
'search_items' => _x( 'Search Sponser', 'Sponser' ),
'not_found' => _x( 'No Sponser found', 'Sponser' ),
'not_found_in_trash' => _x( 'No Sponser found in Trash', 'Sponser' ),
'parent_item_colon' => _x( 'Parent Sponser:', 'Sponser' ),
'menu_name' => _x( 'Our Sponsers', 'Sponser' ),
);
$args = array(
'labels' => $labels,
'hierarchical' => false,
'supports' => array( 'title', 'thumbnail', 'editor' ),
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'show_in_nav_menus' => true,
'publicly_queryable' => true,
'exclude_from_search' => false,
'has_archive' => true,
'query_var' => true,
'can_export' => true,
'menu_icon' => 'dashicons-images-alt2',
'rewrite' => true,
'capability_type' => 'post'
    );
register_post_type( 'Sponser', $args );
flush_rewrite_rules();
}
function Sponser_taxonomy() {
 register_taxonomy(
  'sponser_categories',  
  'sponser',      
  array(
   'hierarchical'   => true,
   'label'   => 'Sponser Categories',  
   'query_var'   => true,
   'rewrite'  => array(
   'slug'    => 'Sponser', 
   'with_front'  => false 
     )
   )
  );
}
add_action( 'init', 'Sponser_taxonomy');
/*-------------------------------- Sponser Slider Post Function Ends --------------------------------------*/
/*-------------------------------- Gallery Slider Post Function Starts --------------------------------------*/
add_action( 'init', 'wpb_register_cpt_gallery_grid' );
function wpb_register_cpt_gallery_grid() {
$labels = array(
'name' => _x( 'Grid Gallery', 'Grid Gallery' ),
'singular_name' => _x( 'Gallery', 'Grid Gallery' ),
'add_new' => _x( 'Add New', 'Grid Gallery' ),
'add_new_item' => _x( 'Add New Grid Gallery', 'Grid Gallery' ),
'edit_item' => _x( 'Edit Grid Gallery', 'Grid Gallery' ),
'new_item' => _x( 'New Grid Gallery', 'Grid Gallery' ),
'view_item' => _x( 'View Grid Gallery', 'Grid Gallery' ),
'search_items' => _x( 'Search Grid Gallery', 'Grid Gallery' ),
'not_found' => _x( 'No Grid Gallery found', 'Grid Gallery' ),
'not_found_in_trash' => _x( 'No Grid Gallery found in Trash', 'Grid Gallery' ),
'parent_item_colon' => _x( 'Parent Grid Gallery:', 'Grid Gallery' ),
'menu_name' => _x( 'Grid Gallery', 'Grid Gallery' ),
);
$args = array(
'labels' => $labels,
'hierarchical' => false,
'supports' => array( 'title', 'thumbnail', 'editor' ),
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'show_in_nav_menus' => true,
'publicly_queryable' => true,
'exclude_from_search' => false,
'has_archive' => true,
'query_var' => true,
'can_export' => true,
'menu_icon' => 'dashicons-images-alt2',
'rewrite' => true,
'capability_type' => 'post'
    );
register_post_type( 'Grid Gallery', $args );
flush_rewrite_rules();
}
function Grid_Gallery_taxonomy() {
 register_taxonomy(
  'grid_gallery_categories',  
  'grid_gallery',     
  array(
   'hierarchical'   => true,
   'label'   => 'Grid Gallery Categories',  
   'query_var'   => true,
   'rewrite'  => array(
   'slug'    => 'Grid Gallery', 
   'with_front'  => false 
     )
   )
  );
}
add_action( 'init', 'Grid_Gallery_taxonomy');
/*-------------------------------- Gallery Slider Post Function Ends --------------------------------------*/
/*-------------------------------- Widget Making Functions Starts -----------------------------------------*/
register_sidebar( array(
        'name' => __( 'Footer Contact Form', 'tutsplus' ),
        'id' => 'footer-contact-form',
        'description' => __( 'Footer Contact Form', 'tutsplus' ),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
register_sidebar( array(
        'name' => __( 'Footer Image', 'tutsplus' ),
        'id' => 'footer-image',
        'description' => __( 'Footer Image', 'tutsplus' ),   
) );
/*-------------------------------- Widget Making Functions Ends -----------------------------------------*/
/*-------------------------------- Footer Customizer Starts ----------------------------------------------------*/
add_action('customize_register', 'footer_theme_customizer');
function footer_theme_customizer($wp_customize) {
    $wp_customize->add_section('footer_customize', array(
        'title' => __('Mutaz Barshim Social Links', 'footer'),
        'priority' => 60,
        'description' => 'Customize your footer here',
    ));
    $wp_customize->add_setting('fb_link');
    $wp_customize->add_control('fb_link', array(
        'label' => __('Facebook Link', 'footer'),
        'type' => 'textbox',
        'section' => 'footer_customize',
        'settings' => 'fb_link',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_setting('insta_link');
    $wp_customize->add_control('instaLink', array(
        'label' => __('Instagram Link', 'footer'),
        'type' => 'textbox',
        'section' => 'footer_customize',
        'settings' => 'insta_link',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_setting('twitter_link');
    $wp_customize->add_control('twitterLink', array(
        'label' => __('Twitter Link', 'footer'),
        'type' => 'textbox',
        'section' => 'footer_customize',
        'settings' => 'twitter_link',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_setting('snap_link');
    $wp_customize->add_control('snapLink', array(
        'label' => __('Snapchat Link', 'footer'),
        'type' => 'textbox',
        'section' => 'footer_customize',
        'settings' => 'snap_link',
        'transport' => 'postMessage'
    ));
}

/*--------------------- Testimonial Post Type -----------------*/


add_action( 'init', 'wpb_register_cpt_Schedule' );

function wpb_register_cpt_Schedule() {

$labels = array(
'name' => _x(
 'Schedule', 'Schedule' ),
'singular_name' => _x(
 'Schedule', 'Schedule' ),
'add_new' => _x(
 'Add New', 'Schedule' ),
'add_new_item' => _x(
 'Add New Schedule', 'Schedule' ),
'edit_item' => _x(
 'Edit Schedule', 'Schedule' ),
'new_item' => _x(
 'New Schedule', 'Schedule' ),
'view_item' => _x(
 'View Schedule', 'Schedule' ),
'search_items' => _x(
 'Search Schedule', 'Schedule' ),
'not_found' => _x(
 'No Schedule found', 'Schedule' ),
'not_found_in_trash' => _x(
 'No Schedule found in Trash', 'Schedule' ),
'parent_item_colon' => _x(
 'Parent Schedule:', 'Schedule' ),
'menu_name' => _x(
 'Our Schedule', 'Schedule' ),
);

$args = array(
'labels' => $labels,
'hierarchical' => false,
'supports' => array( 'title', 'thumbnail', 'editor' ),
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'show_in_nav_menus' => true,
'publicly_queryable' => true,
'exclude_from_search' => false,
'has_archive' => true,
'query_var' => true,
'can_export' => true,
'menu_icon' => 'dashicons-businessman',
'rewrite' => true,
'capability_type' => 'post'
    );
register_post_type( 'Schedule', $args );
flush_rewrite_rules();
}
function footag_func($atts) {
    ob_start();
     $argss = array('post_type' => 'Schedule', 'posts_per_page' => -1, 'order' => 'ASC');
                        $mypostss = get_posts($argss);

                        foreach ($mypostss as $post) : setup_postdata($post);
                            ?>
                            <div class="competetion-section">
                            <img src="<?php the_field('flag'); ?>">
                             <div class="competetion-date">
                             <h4><?php the_title(); ?></h4>
                             <span><?php the_field('competetion_date'); ?></span>
                             </div>
                             </div>
                             <?php
                        endforeach;
                        wp_reset_postdata();
                        ?>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode('footag', 'footag_func');


register_sidebar( array(
    'name' => 'Product Filter',
     'id' => 'product_filter',
     'description' => 'Appears in the footer area',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget' => '</aside>',
      'before_title' => '<h3 class="widget-title">',
     'after_title' => '</h3>',
) );

// add_filter( 'add_to_cart_text', 'woo_custom_product_add_to_cart_text' );            // < 2.1
// add_filter( 'woocommerce_product_add_to_cart_text', 'woo_custom_product_add_to_cart_text' );  // 2.1 +
  
// function woo_custom_product_add_to_cart_text() {
  
//     return __( 'ADD TO CART', 'woocommerce' );
  
// }

// /**
//  * woocoomerce  remove actions
//  */

// remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 ); 
// remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering',30 );


add_action( 'after_setup_theme', 'setup_woocommerce_support' );

 function setup_woocommerce_support()
{
  add_theme_support('woocommerce');
}
/*------------------------------------Product Quantity----------------------------------------*/
/**
 * Add quantity field on the shop page.
 */
function ace_shop_page_add_quantity_field() {
	/** @var WC_Product $product */
	$product = wc_get_product( get_the_ID() );
	if ( ! $product->is_sold_individually() && 'variable' != $product->get_type() && $product->is_purchasable() ) {
		woocommerce_quantity_input( array( 'min_value' => 1, 'max_value' => $product->backorders_allowed() ? '' : $product->get_stock_quantity() ) );
	}
}
add_action( 'woocommerce_after_shop_loop_item', 'ace_shop_page_add_quantity_field', 12 );
/**
 * Add required JavaScript.
 */
//function ace_shop_page_quantity_add_to_cart_handler() {
	//wc_enqueue_js( '
		//$(".woocommerce .products").on("click", ".quantity input", function() {
// 			return false;
		//});
	//	$(".woocommerce .products").on("change input", ".quantity .qty", function() {
			//var add_to_cart_button = $(this).parents( ".product" ).find(".add_to_cart_button");
			// For AJAX add-to-cart actions
			//add_to_cart_button.data("quantity", $(this).val());
			// For non-AJAX add-to-cart actions
			//add_to_cart_button.attr("href", "?add-to-cart=" + add_to_cart_button.attr("data-product_id") + "&quantity=" + $(this).val());
		//});
		// Trigger on Enter press
		//$(".woocommerce .products").on("keypress", ".quantity .qty", function(e) {
			//if ((e.which||e.keyCode) === 13) {
				//$( this ).parents(".product").find(".add_to_cart_button").trigger("click");
		//	}
		//});
	//' );
//}
//add_action( 'init', 'ace_shop_page_quantity_add_to_cart_handler' );
//function woocommerce_cart_totals() {
//        wc_get_template( 'cart/cart-totals.php' );
//}
//
//function filter_plugin_updates( $value ) {
//    unset( $value->response['akismet/woocommerce.php'] );
//    return $value;
//}
//add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );



//function namespace_force_individual_cart_items( $cart_item_data, $product_id ) {
//  $unique_cart_item_key = md5( microtime() . rand() );
//  $cart_item_data['unique_key'] = $unique_cart_item_key;
//
//  return $cart_item_data;
//}
//add_filter( 'woocommerce_add_cart_item_data', 'namespace_force_individual_cart_items', 10, 2 );
