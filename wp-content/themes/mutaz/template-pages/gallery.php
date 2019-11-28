<?php
/*
Template name: Gallery
*/
get_header();
?>
<div class="banner_section" id="section1">
	<div class="main_heading">
	<h1><?php the_field('banner_heading'); ?></h1>
	</div>
	<div class="banner_image">
		<img src="<?php the_field('banner_image'); ?>" alt="image"/>
	</div>
	<div class="banner_icons">
	<ul>
	<li><a href="<?php echo get_theme_mod('insta_link'); ?>"><i class="fa fa-instagram"></i></a></li>
	</ul>
	</div>
		<a href="#section2"><span></span>Scroll</a>
	</div>
	</div>
</div>
<section id="section2" class="demo">
 <div id="gallery_section" class="main_gallery"  style="background-image:url('<?php the_field('gallery_background_image'); ?>');">
<div class="container">	
<?php the_field('main_gallery'); ?>		   
    </div> 
</div>
</section>
<?php get_footer(); ?>