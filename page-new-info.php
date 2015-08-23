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
	<h1 style="text-align: left;">galleries*</h1>		
		
			  		<!-- go get the posts -->
					<?php 
					    query_posts(array( 
					        'post_type' => 'galleries',
					        'showposts' => 40,
					    ) );  
					?>

					<?php if(have_posts()) : while(have_posts()) : the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>	


			<div class="row row-effect"> 
			  <div class="col-md-3">  
			  	<p>
					<?php the_title(); ?><br />
					<?php echo get_post_meta($post->ID, 'smashing_post_class', true); ?>, <?php echo get_post_meta($post->ID, 'smashing_post_classs', true); ?><br />
					<a target="_blank" href="http://www.oregoncoastgalleries.com">www.oregoncoastgalleries.com</a>
									</p>				  	
								  </div>
								  <div class="col-md-3">  
								  	<p>
					Karyn Gabaldon Fine Arts<br />
					Durango, CO<br />
					<a target="_blank" href="http://www.karyngabaldon.com">www.karyngabaldon.com</a>
									</p>				  	
								  </div>
								  <div class="col-md-3">  
								  	<p>
					Appalachian Spring<br />
					Washington DC, Virginia & Maryland<br />
					<a target="_blank" href="http://www.appalachianspring.com">www.appalachianspring.com</a>
									</p>				  	
								  </div>			  
								  <div class="col-md-3">  
								  	<p>
					Appalachian Spring<br />
					Washington DC, Virginia & Maryland<br />
					<a target="_blank" href="http://www.appalachianspring.com">www.appalachianspring.com</a>
				</p>				  	
			  </div>
			</div> 

		<?php endwhile; endif; wp_reset_query(); ?> 				 			  					  			  				  	


			<!-- end framwork here -->
																					
	</div> <!-- end product wrap -->
</section>

<!-- end main playground -->



<!-- start the footer -->
<?php get_footer();