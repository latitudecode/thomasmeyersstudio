<?php
/*
 * Template Name: New Info 
 * Description: Places tom shows at
 */

//

?>
<!-- start the header -->
<?php get_header(); ?>

<!-- main playground -->

<section class="main-content info"> <!-- main product wrapper -->
	<div class="product-section"> <!-- product wrap -->
			<!-- start the framework here -->
	<h1 style="text-align: left;">galleries</h1>		
		

			<div class="row row-effect"> 
							  		<!-- go get the posts -->
					<?php 
					    query_posts(array( 
					        'post_type' => 'galleries',
					        'showposts' => 40,
					    ) );  
					?>

					<?php if(have_posts()) : while(have_posts()) : the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>	


			  <div class="col-md-3">  
			  		<p>
						<?php the_title(); ?><br />
						<?php echo get_post_meta($post->ID, 'smashing_post_class', true); ?>, <?php echo get_post_meta($post->ID, 'smashing_post_classs', true); ?><br />
						<a target="_blank" href="http://www.google.com">www.<?php echo get_post_meta($post->ID, 'smashing_post_classss', true); ?>.com</a>
					</p>				  	
				</div>
		
				<?php endwhile; endif; wp_reset_query(); ?> 				 			  					  			  				  	

			</div> 

	<h1 style="text-align: left;">shows</h1>		
		
			  		<!-- go get the posts -->
					<?php 
					    query_posts(array( 
					        'post_type' => 'shows',
					        'showposts' => 40,
					    ) );  
					?>

					<?php if(have_posts()) : while(have_posts()) : the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>	


			<div class="row row-effect"> 
			  <div class="col-md-3">  
			  		<p>
						<?php the_title(); ?><br />
						<?php echo get_post_meta($post->ID, 'smashing_post_class', true); ?>, <?php echo get_post_meta($post->ID, 'smashing_post_classs', true); ?><br />
						<a target="_blank" href="http://www.<?php echo get_post_meta($post->ID, 'smashing_post_classss', true); ?>.com">www.<?php echo get_post_meta($post->ID, 'smashing_post_classss', true); ?>.com</a>
					</p>				  	
				</div>
		
				<?php endwhile; endif; wp_reset_query(); ?> 				 			  					  			  				  	

			</div> 


			<!-- end framwork here -->
																					
	</div> <!-- end product wrap -->
</section>

<!-- end main playground -->



<!-- start the footer -->
<?php get_footer();