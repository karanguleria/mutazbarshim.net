 <?php
/*
Template name: Shop New
*/
get_header();
global $woocommerce;
?>
<div class="banner_section demo" id="section01">

  <div class="main_heading">
  <h1><?php the_field('banner_heading'); ?></h1>
  </div>
 
  <div class="banner_image">
    <img src="<?php the_field('banner_image'); ?>" alt="image"/>
  </div>
  <div class="banner_icons">
  <ul>
        <li><a href="<?php echo get_theme_mod('fb_link'); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
        <li><a href="<?php echo get_theme_mod('insta_link'); ?>"><i class="fa fa-instagram"></i></a></li>
        <li><a href="<?php echo get_theme_mod('twitter_link'); ?>"><i class="fa fa-twitter"></i></a></li>
        <li><a href="<?php echo get_theme_mod('snap_link'); ?>"><i class="fa fa-snapchat-ghost" aria-hidden="true"></i></a></li>
      </ul>
  </div>
  
  <a href="#section02"><span></span>Scroll</a>
  </div>
  </div>
</div>
<div class="container shop_p_cont" >
   <div class="filter_wrap controls" id="section02">
   <?php
        $taxonomy     = 'product_cat';
        $orderby      = 'name';  
        $show_count   = 0;      // 1 for yes, 0 for no
        $pad_counts   = 0;      // 1 for yes, 0 for no
        $hierarchical = 1;      // 1 for yes, 0 for no  
        $title        = '';  
        $empty        = 0;
        $args = array(
            'taxonomy'     => $taxonomy,
            'orderby'      => $orderby,
            'show_count'   => $show_count,
            'pad_counts'   => $pad_counts,
            'hierarchical' => $hierarchical,
            'title_li'     => $title,
            'hide_empty'   => $empty
        );
    ?>

    <?php 
        $all_categories = get_categories( $args );

        foreach ($all_categories as $cat) 
        {
             
            if($cat->category_parent == 0) 
            {
                
                $category_id = $cat->term_id;
$thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
$image_url = wp_get_attachment_url( $thumbnail_id ); 
        echo '<div class="fill_icon control" data-filter=".'.$cat->slug.'">';
       // echo '<pre>',var_dump($cat) , '</pre>';
        echo '<img src="'.$image_url.'">';   
        echo '<a href="#'.$category_id.'">'. $cat->name .'</a>'; 
        echo'</div>';
            }
                     
    }
     ?>
     </div>
     <section  id="murtza_products" class="demo_murtza">
<div class="container" data-ref="mixitup-container">
 <div class="row">
 
<ul class="products">
    <?php
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 12
            );
        $loop = new WP_Query( $args );
        if ( $loop->have_posts() ) {
            while ( $loop->have_posts() ) : $loop->the_post();

    global $product;
    $pId = $product->get_id();
$term_list = wp_get_post_terms($pId,'product_cat',array('fields'=>'ids'));
$cat_id = (int)$term_list[0];
 $category = wp_get_object_terms($product->get_id(), 'product_cat');
 //echo '<pre>' , var_dump($category[0]->slug) , '</pre>';
 
 $catslug = '';
 
 foreach($category as $cat){
 $catslug .= $cat->slug.' ';    
}
 

?><div class="product_wrap <?php echo $catslug ?>" data-ref="mixitup-target" >

  <form action="https://mutazbarshim.net/api/cart/add/" method="post">
          <div class="card flex-md-row mb-4">
            <div class="card-body d-flex flex-column align-items-start">
             <h1><?php echo $product->get_title(); ?></h1>
                <div class="color_box">
                  <p>choose your color</p>
                  <?php 
     $variations = $product->get_available_variations();
        foreach($variations as $key=>$item){
        //echo '<pre>' , var_dump($item) , '</pre>';
        //echo '<pre>' , var_dump() ,  '</pre>';
        //echo '<pre>' , var_dump($product->get_default_attributes()),'</pre>';
        ($product->get_available_variations()); 
        $item_image = $item['image']['url'];
        $item_title = $item['image']['title'];
        $variation_id= $item['variation_id'];
        $mb_color = $item['attributes']['attribute_pa_color'];  ?>
         
         <input type="radio" value="<?php echo $variation_id; ?>" data-item-image="<?php echo $item_image; ?>" data-item-title="<?php echo $item_title; ?>"   id="<?php echo $mb_color; ?>-<?php echo $product->get_id();?>"  class="<?php echo $mb_color; ?>"  name="color"   <?php echo  ($key ==-1) ? 'checked': '';?>>
                  <label   for="<?php echo $mb_color; ?>-<?php echo $product->get_id();?>"><?php echo $mb_color; ?></label>
        <?php
         }
     ?>
         </div>
      <div class="unit_box">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text" id="btnGroupAddon2">unit</div>
                      </div>
                      <input type="text" class="form-control stQuantity" value="1" name="stQuantity" placeholder="number" aria-label="Input group example" aria-describedby="btnGroupAddon2">
                      <input type="hidden" class="stProduct" name="stProduct" value="<?php echo $product->get_id(); ?>">
                    </div>
                </div>
            </div>
            <div class="cart_box">
              <div class="input-group">
               <div class="btn-group mr-2" role="group" aria-label="First group">
                <button type="submit" name="cart_item" class="btn btn-secondary cart">add to cart</button>
                <button type="submit" class="btn btn-secondary buy">buy it now</button>
              </div>
              </div>
            </div>

            <div class="image_box">
                            <img class="card-img-right" alt="Thumbnail" src="<?php echo get_the_post_thumbnail_url($pId);?>">
                            <div class="price_tag">
                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="123px" height="71px" viewBox="0 0 1230 710" preserveAspectRatio="xMidYMid meet"> <g id="layer101" fill="#000000" stroke="none"> <path d="M14 697 c-14 -17 -16 -102 -2 -159 9 -36 9 -50 -1 -62 -13 -16 -14 -192 -1 -211 4 -5 7 -25 7 -44 0 -24 6 -38 19 -45 10 -6 30 -23 44 -37 28 -29 110 -47 110 -25 0 19 108 12 123 -8 7 -8 33 -18 60 -21 41 -6 47 -5 48 11 0 11 3 14 6 7 2 -7 17 -13 33 -13 16 0 31 -6 33 -12 4 -10 6 -10 6 0 1 7 6 10 12 6 6 -3 36 -6 65 -5 74 1 186 -15 194 -29 11 -17 45 -7 42 12 -3 22 37 12 46 -11 11 -30 42 -42 42 -16 0 14 4 14 31 0 29 -15 32 -15 50 1 17 16 19 16 19 1 0 -10 8 -17 20 -17 11 0 20 7 20 15 0 8 -5 15 -12 15 -6 0 -9 2 -7 4 3 3 24 0 48 -6 30 -8 39 -13 29 -19 -11 -7 -10 -11 2 -19 22 -14 33 -12 26 6 -3 9 -3 14 1 12 5 -2 20 -10 35 -17 50 -26 54 -10 55 219 0 113 -4 210 -8 216 -5 6 -8 20 -8 30 4 40 -2 53 -36 73 -19 11 -35 27 -35 36 0 10 -10 15 -27 15 -16 0 -38 3 -50 6 -17 5 -23 2 -23 -9 0 -13 -10 -15 -57 -10 -32 4 -62 12 -68 19 -5 6 -31 15 -57 19 -42 5 -48 4 -49 -12 0 -10 -3 -13 -6 -5 -2 6 -18 12 -34 12 -16 0 -29 5 -29 13 0 8 -3 8 -9 -2 -7 -11 -15 -12 -33 -5 -13 5 -45 7 -71 4 -27 -3 -50 -3 -52 1 -3 3 -28 9 -56 11 -28 3 -55 11 -59 18 -9 15 -46 8 -43 -8 3 -13 -19 -14 -57 -2 -17 5 -19 8 -7 9 21 1 22 17 1 25 -22 8 -24 8 -24 -9 0 -13 -5 -12 -35 2 -34 16 -36 16 -50 -3 -13 -17 -14 -17 -15 -1 0 21 -40 24 -40 2 0 -8 5 -15 12 -15 6 0 9 -2 7 -4 -3 -3 -24 0 -48 6 -26 7 -38 14 -31 18 16 10 4 30 -17 30 -9 0 -13 -6 -9 -15 3 -8 1 -15 -5 -15 -5 0 -12 7 -15 15 -7 18 -45 19 -60 2z m1073 -584 c-4 -3 -10 -3 -14 0 -3 4 0 7 7 7 7 0 10 -3 7 -7z"></path> <path d="M945 610 c-3 -5 -1 -10 4 -10 6 0 11 5 11 10 0 6 -2 10 -4 10 -3 0 -8 -4 -11 -10z"></path> <path d="M260 100 c0 -5 5 -10 10 -10 6 0 10 5 10 10 0 6 -4 10 -10 10 -5 0 -10 -4 -10 -10z"></path> </g> </svg>
                                <span><sub>$</sub> <?php echo $product->get_price(); ?></span>
                            </div>
                      </div>
            
          </div>
        </form>
     </div>
    <?php
     //wc_get_template_part( 'content', 'product' );
            endwhile;
        } else {
            echo __( 'No products found' );
        }
        wp_reset_postdata();
    ?>
</ul><!--/.products-->

</div>

</div>
</section>
</div>
<div class="modal cart-popup" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

    <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <?php 
       
     echo apply_filters('the_content', '[woocommerce_cart]');
        
        ?>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<div class="modal check-popup" id="checkModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <?php 
         echo do_shortcode( '[woocommerce_checkout]' );
        
        ?>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<script type='text/javascript' src='http://mutazbarshim.net/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min.js?ver=3.6.4'></script>
<script type='text/javascript' src='http://mutazbarshim.net/wp-content/plugins/woocommerce/assets/js/js-cookie/js.cookie.min.js?ver=2.1.4'></script>

<?php get_footer(); ?>