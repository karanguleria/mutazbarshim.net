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
 <section id="section02">
 <div id="competetion-section">
  <div class="container">
 	<?php
                        $argss = array('post_type' => 'Schedule', 'posts_per_page' => -1, 'order' => 'ASC');
                        $mypostss = get_posts($argss);
                        foreach ($mypostss as $post) : setup_postdata($post);
                        	 if (get_field('competetion_date')): ?>
                        	 	<a href="<?php the_field('event_link'); ?>" target="blank">
                        	 		<div class="competetion-section">
                             <img src="<?php the_field('flag'); ?>">
                             <div class="schedule-column">
                             	<h4><?php the_title(); ?></h4>
                                <span><?php the_field('competetion_date'); ?></span>
                           </div>
                             </div>
                        	 	</a>
                             <?php else: ?>
                             	<a href="<?php the_field('event_link'); ?>" target="blank">
                             	<div class="competetion-section final">
                             <img src="<?php the_field('flag'); ?>">
                             <div class="schedule-column">
                             	<h4><?php the_title(); ?></h4>
                             <span><?php the_field('qualification_and_final_competetion'); ?></span>
                           </div>
                             </div></a>
                             	
                             <?php endif ?>
                            <?php
                        endforeach;
                        wp_reset_postdata();
                        ?>
                    </div>
 </div>
 </section>
<?php get_footer(); ?>                        




