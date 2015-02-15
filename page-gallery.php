<?php
/*
 * Template Name: Studio page
 * Description: Gallery page
 */

//

?>


<?php get_header(); ?>


	<!--- start to the slider -->

	<section class="slider">
		<div class="home-slider"> <!-- pull in royal slider content/images -->
			<ul class="slider-buttons">
				<li><i class="#"></i></li> 
				<li><i class="#"></i></li>
				<li><i class="#"></i></li>								
			</ul>
			<div class="slide">
				<img src="<?php bloginfo('template_directory'); ?>/images/slide1.png" /> <!-- slider image -->
			</div>
			<div class="slide">
				<!-- <img src="#" /> <!-- slider image -->
			</div>
			<div class="slide">
				<!-- <img src="#" /> <!-- slider image -->
			</div>			
		</div>
	</section>

	<!-- end of the slider section -->

	<!-- start the footer -->
<?php
get_footer();
	