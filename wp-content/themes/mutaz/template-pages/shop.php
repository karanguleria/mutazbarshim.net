<?php
/*
Template name: Schedule
*/
get_header();
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
 <section id="section02" class="Shop_page">
    <div id="products-section">
       <div class="container">
	   <?php
$params = array('posts_per_page' => 5, 'post_type' => 'product');
$wc_query = new WP_Query($params);
?>
<ul>
     <?php if ($wc_query->have_posts()) : ?>
     <?php while ($wc_query->have_posts()) :
                $wc_query->the_post(); ?>
     <li>
          <h3>
               <a href="<?php the_permalink(); ?>">
               <?php the_title(); ?>
               </a>
          </h3>
          <?php the_post_thumbnail(); ?>
          <?php the_excerpt(); ?>
     </li>
     <?php endwhile; ?>
     <?php wp_reset_postdata(); ?>
     <?php else:  ?>
     <li>
          <?php _e( 'No Products' ); ?>
     </li>
     <?php endif; ?>
</ul>
    </div>
 </section>
<?php get_footer(); ?>                        




