<?php
/*
Template name: Shop
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
  </div>
</div>


<div class="container shop_p_cont">
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
          echo '<img src="'.$image_url.'">';      
        echo '<br /><a href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a>'; 
            }
                     
    }
     ?>
          <section  id="murtza_products" class="demo_murtza">
            <div class="container">
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
                      echo $product->get_name();
                                  //wc_get_template_part( 'content', 'product' );
                              endwhile;
                          } else {
                              echo __( 'No products found' );
                          }
                          wp_reset_postdata();
                      ?>
                  </ul><!--/.products-->
                </div>


                <div class="product_wrap">
                    <form action="#">
                      <div class="card flex-md-row">
                        <div class="card-body d-flex flex-column align-items-start">
                         <h1>mutaz barshim snapback cap</h1>
                            <div class="color_box">
                              <p>choose your color</p>
                              <input type="radio" class="orange" name="radio-group" checked>
                              <label for="orange">orange</label>
                      
                              <input type="radio" class="blue" name="radio-group">
                              <label for="blue">blue</label>

                              <input type="radio" class="purple" name="radio-group">
                              <label for="purple">purple</label>
                              
                              <input type="radio" class="yellow" name="radio-group">
                              <label for="yellow">yellow</label>

                              <input type="radio" class="green" name="radio-group">
                              <label for="green">green</label>

                              <input type="radio" class="red" name="radio-group">
                              <label for="red">red</label>

                              <input type="radio" class="black" name="radio-group">
                              <label for="black">black</label>

                              <input type="radio" class="grey" name="radio-group">
                              <label for="grey">grey</label>

                              <input type="radio" class="white" name="radio-group">
                              <label for="white">white</label>
                            </div>

                            <div class="unit_box">
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text" id="btnGroupAddon2">unit</div>
                                  </div>
                                  <input type="text" class="form-control" placeholder="number" aria-label="Input group example" aria-describedby="btnGroupAddon2">
                                </div>
                            </div> 
                        </div>


                          <div class="cart_box">
                            <button type="button" class="btn btn-secondary cart">add to cart</button>
                            <button type="button" class="btn btn-secondary buy">buy it now</button>
                          </div>
                      
                        <div class="image_box">
                            <img class="card-img-right flex-auto d-none d-md-block" alt="Thumbnail" src="http://mutazbarshim.net/wp-content/uploads/2019/06/Cap-Mockup.png">
                            <div class="price_tag">
                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="123px" height="71px" viewBox="0 0 1230 710" preserveAspectRatio="xMidYMid meet"> <g id="layer101" fill="#000000" stroke="none"> <path d="M14 697 c-14 -17 -16 -102 -2 -159 9 -36 9 -50 -1 -62 -13 -16 -14 -192 -1 -211 4 -5 7 -25 7 -44 0 -24 6 -38 19 -45 10 -6 30 -23 44 -37 28 -29 110 -47 110 -25 0 19 108 12 123 -8 7 -8 33 -18 60 -21 41 -6 47 -5 48 11 0 11 3 14 6 7 2 -7 17 -13 33 -13 16 0 31 -6 33 -12 4 -10 6 -10 6 0 1 7 6 10 12 6 6 -3 36 -6 65 -5 74 1 186 -15 194 -29 11 -17 45 -7 42 12 -3 22 37 12 46 -11 11 -30 42 -42 42 -16 0 14 4 14 31 0 29 -15 32 -15 50 1 17 16 19 16 19 1 0 -10 8 -17 20 -17 11 0 20 7 20 15 0 8 -5 15 -12 15 -6 0 -9 2 -7 4 3 3 24 0 48 -6 30 -8 39 -13 29 -19 -11 -7 -10 -11 2 -19 22 -14 33 -12 26 6 -3 9 -3 14 1 12 5 -2 20 -10 35 -17 50 -26 54 -10 55 219 0 113 -4 210 -8 216 -5 6 -8 20 -8 30 4 40 -2 53 -36 73 -19 11 -35 27 -35 36 0 10 -10 15 -27 15 -16 0 -38 3 -50 6 -17 5 -23 2 -23 -9 0 -13 -10 -15 -57 -10 -32 4 -62 12 -68 19 -5 6 -31 15 -57 19 -42 5 -48 4 -49 -12 0 -10 -3 -13 -6 -5 -2 6 -18 12 -34 12 -16 0 -29 5 -29 13 0 8 -3 8 -9 -2 -7 -11 -15 -12 -33 -5 -13 5 -45 7 -71 4 -27 -3 -50 -3 -52 1 -3 3 -28 9 -56 11 -28 3 -55 11 -59 18 -9 15 -46 8 -43 -8 3 -13 -19 -14 -57 -2 -17 5 -19 8 -7 9 21 1 22 17 1 25 -22 8 -24 8 -24 -9 0 -13 -5 -12 -35 2 -34 16 -36 16 -50 -3 -13 -17 -14 -17 -15 -1 0 21 -40 24 -40 2 0 -8 5 -15 12 -15 6 0 9 -2 7 -4 -3 -3 -24 0 -48 6 -26 7 -38 14 -31 18 16 10 4 30 -17 30 -9 0 -13 -6 -9 -15 3 -8 1 -15 -5 -15 -5 0 -12 7 -15 15 -7 18 -45 19 -60 2z m1073 -584 c-4 -3 -10 -3 -14 0 -3 4 0 7 7 7 7 0 10 -3 7 -7z"></path> <path d="M945 610 c-3 -5 -1 -10 4 -10 6 0 11 5 11 10 0 6 -2 10 -4 10 -3 0 -8 -4 -11 -10z"></path> <path d="M260 100 c0 -5 5 -10 10 -10 6 0 10 5 10 10 0 6 -4 10 -10 10 -5 0 -10 -4 -10 -10z"></path> </g> </svg>
                                <span><sub>qar</sub> 150</span>
                            </div>
                      </div>



                    </div>
                    </form>
                </div>
                <div class="product_wrap">
                    <form action="#">
                      <div class="card flex-md-row">
                        <div class="card-body d-flex flex-column align-items-start">
                         <h1>mutaz barshim snapback cap</h1>
                            <div class="color_box">
                              <p>choose your color</p>
                              <input type="radio" class="orange" name="radio-group" checked>
                              <label for="orange">orange</label>
                      
                              <input type="radio" class="blue" name="radio-group">
                              <label for="blue">blue</label>

                              <input type="radio" class="purple" name="radio-group">
                              <label for="purple">purple</label>
                              
                              <input type="radio" class="yellow" name="radio-group">
                              <label for="yellow">yellow</label>

                              <input type="radio" class="green" name="radio-group">
                              <label for="green">green</label>

                              <input type="radio" class="red" name="radio-group">
                              <label for="red">red</label>

                              <input type="radio" class="black" name="radio-group">
                              <label for="black">black</label>

                              <input type="radio" class="grey" name="radio-group">
                              <label for="grey">grey</label>

                              <input type="radio" class="white" name="radio-group">
                              <label for="white">white</label>
                            </div>

                            <div class="unit_box">
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text" id="btnGroupAddon2">unit</div>
                                  </div>
                                  <input type="text" class="form-control" placeholder="number" aria-label="Input group example" aria-describedby="btnGroupAddon2">
                                </div>
                            </div> 
                        </div>


                          <div class="cart_box">
                            <button type="button" class="btn btn-secondary cart">add to cart</button>
                            <button type="button" class="btn btn-secondary buy">buy it now</button>
                          </div>
                      
                        <div class="image_box">
                            <img class="card-img-right flex-auto d-none d-md-block" alt="Thumbnail" src="http://mutazbarshim.net/wp-content/uploads/2019/06/Cap-Mockup.png">
                            <div class="price_tag">
                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="123px" height="71px" viewBox="0 0 1230 710" preserveAspectRatio="xMidYMid meet"> <g id="layer101" fill="#000000" stroke="none"> <path d="M14 697 c-14 -17 -16 -102 -2 -159 9 -36 9 -50 -1 -62 -13 -16 -14 -192 -1 -211 4 -5 7 -25 7 -44 0 -24 6 -38 19 -45 10 -6 30 -23 44 -37 28 -29 110 -47 110 -25 0 19 108 12 123 -8 7 -8 33 -18 60 -21 41 -6 47 -5 48 11 0 11 3 14 6 7 2 -7 17 -13 33 -13 16 0 31 -6 33 -12 4 -10 6 -10 6 0 1 7 6 10 12 6 6 -3 36 -6 65 -5 74 1 186 -15 194 -29 11 -17 45 -7 42 12 -3 22 37 12 46 -11 11 -30 42 -42 42 -16 0 14 4 14 31 0 29 -15 32 -15 50 1 17 16 19 16 19 1 0 -10 8 -17 20 -17 11 0 20 7 20 15 0 8 -5 15 -12 15 -6 0 -9 2 -7 4 3 3 24 0 48 -6 30 -8 39 -13 29 -19 -11 -7 -10 -11 2 -19 22 -14 33 -12 26 6 -3 9 -3 14 1 12 5 -2 20 -10 35 -17 50 -26 54 -10 55 219 0 113 -4 210 -8 216 -5 6 -8 20 -8 30 4 40 -2 53 -36 73 -19 11 -35 27 -35 36 0 10 -10 15 -27 15 -16 0 -38 3 -50 6 -17 5 -23 2 -23 -9 0 -13 -10 -15 -57 -10 -32 4 -62 12 -68 19 -5 6 -31 15 -57 19 -42 5 -48 4 -49 -12 0 -10 -3 -13 -6 -5 -2 6 -18 12 -34 12 -16 0 -29 5 -29 13 0 8 -3 8 -9 -2 -7 -11 -15 -12 -33 -5 -13 5 -45 7 -71 4 -27 -3 -50 -3 -52 1 -3 3 -28 9 -56 11 -28 3 -55 11 -59 18 -9 15 -46 8 -43 -8 3 -13 -19 -14 -57 -2 -17 5 -19 8 -7 9 21 1 22 17 1 25 -22 8 -24 8 -24 -9 0 -13 -5 -12 -35 2 -34 16 -36 16 -50 -3 -13 -17 -14 -17 -15 -1 0 21 -40 24 -40 2 0 -8 5 -15 12 -15 6 0 9 -2 7 -4 -3 -3 -24 0 -48 6 -26 7 -38 14 -31 18 16 10 4 30 -17 30 -9 0 -13 -6 -9 -15 3 -8 1 -15 -5 -15 -5 0 -12 7 -15 15 -7 18 -45 19 -60 2z m1073 -584 c-4 -3 -10 -3 -14 0 -3 4 0 7 7 7 7 0 10 -3 7 -7z"></path> <path d="M945 610 c-3 -5 -1 -10 4 -10 6 0 11 5 11 10 0 6 -2 10 -4 10 -3 0 -8 -4 -11 -10z"></path> <path d="M260 100 c0 -5 5 -10 10 -10 6 0 10 5 10 10 0 6 -4 10 -10 10 -5 0 -10 -4 -10 -10z"></path> </g> </svg>
                                <span><sub>qar</sub> 150</span>
                            </div>
                      </div>



                    </div>
                    </form>
                </div>
            </div>
          </section>
    </div>


<?php get_footer(); ?>