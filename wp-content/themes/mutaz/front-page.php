<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
get_header();
?>
<div class="banner_section demo" id="section01">
	<div class="main_heading">
	<h1><?php the_field('banner_heading',5); ?></h1>
	</div>
	<div class="banner_image">
		<img src="<?php the_field('banner_image',5); ?>" alt="image"/>
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
	<section  id="section02" class="demo">
	<div class="jumper"id="me-sec">
	<div class="jumper_banner"style="background-image:url('<?php the_field('second_section_background_image',5); ?>');">
	<div class="container">
	<div class="jumper_banner_content">
	<h3><?php the_field('first_heading'); ?></h3>
	<h2><?php the_field('second_section_title'); ?></h2>
	<h4><?php the_field('second_heading'); ?></h4>
	<?php the_field('second_section_content'); ?>
	</div>
	</div>
	</div>
	</div>
	</section>
	<section id="section_three" class="new-section white grounds-section sliderss">
	<div class="container-fluid">
			<div class="grounds_outer grounds" >
				<div class="gallery_section_content">
					<h2 class="section_heading">reaching</br> higher grounds</h2>
				</div>
				<div class="owl-carousel grounds-slider owl-theme">
				  <?php 
                $args = array( 'posts_per_page' => 3,'post_type' => 'Grounds','orderby' => 'rand' );
                $myposts = get_posts( $args );
                foreach ( $myposts as $post ) : setup_postdata( $post );  
                ?> 
					<div class="item">
						<div class="distance-box">
							<h2><?php the_field('distance_covered'); ?></h2>
						</div>
						<div class="detail-box">
							<p class="champianship-name"><?php the_title(); ?></p>
							<p class="champianship-place"><?php the_field('championship_place'); ?></p>
							<div class="detail">
								<div class="prize-section"><?php the_field('rank'); ?></div>
								<div class="date-section"><?php the_field('year_of_record'); ?> <i class="fa fa-calendar" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
						<?php endforeach; wp_reset_postdata();?>
				</div>
			</div>
	</div>
</section>
	<section id="section_four" class="record section">
	<div class="fourth_section_left" style="background-image:url('<?php the_field('fourth_section_background_image'); ?>');">
	<div class="row record-row">
	<div class="col-lg-5 record-col">
	<div class="fourth_section_left">
	<img src="<?php the_field('forth_section_left_block_image'); ?>" alt="image">
	</div>
	</div>
		<div class="col-lg-7 record-col">
		<div class="fourth_section_right">
		<h2 class="section_heading"><?php the_field('jumping_records_section_heading'); ?></h2>
<?php the_field('records_table'); ?>
		</div>
	</div>
	</div>
	</div>
	</section>
	<section id="medal_records_section" class="new-section white" style="background-image:url('<?php the_field('medals_section_background_image'); ?>');">
	<div class="medal_records_outer">
	<div class="container">
		<h2 class="records_heading"><?php the_field('medals_section_heading'); ?></h2>
		<div class="medal_records_inner">
		<div class="row medal-row">
		 <div class="col-md-4 medal-col">
                <img src="<?php  the_field('gold_medal_image'); ?>" alt="image">
			<p> <?php the_field('gold_medal_title'); ?></p>
            </div>  
 	 <div class="col-md-4 medal-col">
                <img src="<?php the_field('silver_medal_image'); ?>">
					<p> <?php the_field('silver_medal_title'); ?></p>
            </div>  
			 <div class="col-md-4 medal-col">
                <img src="<?php the_field('bronze_medal_image'); ?>">
					<p> <?php the_field('bronze_medal_title'); ?></p>
            </div>  
       </div>
		</div>
		</div>
	</section>
	<section id="sponsers_section" class="new-section yellow" style="background-image:url('<?php the_field('sponsers_section_background_image'); ?>');">
	<div class="sponsers_outer" id="sponsors" >
	<div class="container">
	  <h2 class="section_heading"><?php the_field('sponsers_section_heading'); ?></h2>
		<div class="owl-carousel sponsers">
			<?php
				$args = array('post_type' => 'Sponser', 'posts_per_page' => 5, "order" => "DESC");
				$query = new WP_Query( $args );
				$cc = count($query);
				if ( $query->have_posts() ) {
				$i=0;
				while ( $query->have_posts() ) { 
				$query->the_post();
			?>
			<div class="sponsers_slider"><?php the_post_thumbnail(); ?></div>
				<?php $i++; } }
					wp_reset_query();                                       
					wp_reset_postdata(); 
				?> 
		</div>
		</div>
		</div>
	</section>
<section id="gallery_section" class="new-section black sliderss">
	<div class="container-fluid">
			<div class="gallery_outer">
			<div class="gallery_section_content">
			<h2 class="section_heading"><?php the_field('gallery_heading'); ?></h2>
			<a href="<?php the_field('gallery_page_link'); ?>"><?php the_field('gallery_section_see_more_button'); ?></a>
			</div>
			<div class="owl-carousel gallary">
			<?php
						$args1 = array('post_type' => 'Grid Gallery',  "order" => "DESC");
						$query1 = new WP_Query( $args1 );
						$cc1 = count($query1);
						if ( $query1->have_posts() ) {
						$j=0;
						while ( $query1->have_posts() ) { 
						$query1->the_post();
					?>
					<div>
					<?php the_post_thumbnail(); ?>
					</div>
			<?php $j++; } }
							wp_reset_query();                                       
							wp_reset_postdata(); 
						?> 
		</div>
		</div>
	</div>
</section>

<?php
get_footer();?>