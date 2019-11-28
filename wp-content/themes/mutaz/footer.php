<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>
	<section id="main-footer">
	<div class="contact_form_outer footer">
		<div class="container">
		<?php if(is_front_page()){?>
			<div class="row footer-form-row" id="inner-footer-sec">
				<div class="col-md-4 form-col">
				<?php dynamic_sidebar( 'footer' ); ?>
				</div>
				<div class="col-md-8 form-col">
					<div class="footer_form" method="post">
					<?php dynamic_sidebar( 'footer-contact-form' ); ?>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
<div class="footer-image row">
<div class="container">
		<div class="banner_icons">
			<ul>
				<li><a href="<?php echo get_theme_mod('fb_link'); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href="<?php echo get_theme_mod('insta_link'); ?>"><i class="fa fa-instagram"></i></a></li>
				<li><a href="<?php echo get_theme_mod('twitter_link'); ?>"><i class="fa fa-twitter"></i></a></li>
				<li><a href="<?php echo get_theme_mod('snap_link'); ?>"><i class="fa fa-snapchat-ghost" aria-hidden="true"></i></a></li>
			</ul>
		</div>
		</div>
		<div class="side_footer_image">
		<?php dynamic_sidebar( 'footer-image' ); ?>
		</div>
</div>
	</div>
	</section>
<?php wp_footer(); ?>
<?php if(is_cart()){?>
<script>
jQuery(document).ready(function () {
 var containerEl = document.querySelector('[data-ref~="mixitup-container"]');
            var mixer = mixitup(containerEl, {
                selectors: {
                    target: '[data-ref~="mixitup-target"]'
                }
            });  
});
</script>
<?php } ?>

</body>
</html>




