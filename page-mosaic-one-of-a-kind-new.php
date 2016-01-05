<?php
/*
 * Template Name: One of a kind mosaic
 * Description: A Page Portfolio page template
 */

//

?>


<?php get_header(); ?>

	<div class="clear"></div>
	<!-- end of the header and navigation -->


	<!-- start to filtration bar -->
	<nav class="sub-nav filter">
		<ul class="sub-nav-links">
			<li><a href="#">all mosaic</a></li>
			<li><a href="#">|</a></li>
			<li><a href="#">one of a kind</a></li>
		</ul>
	</nav>
	<!-- end to filtration bar -->	

	<section class="main-columns category-list mosaic"> <!-- main category intro wrapper -->
		<!-- start three columns for category content -->
			<div class="row row-effect"> 

	  		<!-- go get the posts -->
			<?php 
			    query_posts(array( 
			        'post_type' => 'acme_product',
			        'showposts' => 40,
			        'category__in' => array( 12 )
			    ) );  
			?>
			
			<?php if(have_posts()) : while(have_posts()) : the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>	

			  <div class="col-md-4">  <!-- first column for portait work -->

			  	<a href="<?php the_permalink(); ?>">
				  	<figure class="effect-hover"> 

						<?php if(get_post_meta()) { ?>
							
							<img class="lazyload" src="<?php echo get_post_meta(); ?>" />
							
						<?php } else { ?>
							
							<img class="lazyload" src="<?php echo $imgsrc[0]; ?>" />
							
						<?php } ?>

						<figcaption>
							<p><?php echo get_post_meta($post->ID, 'latitude_name', true); ?></p>
						</figcaption>			  		
				  	</figure>
			  	</a>
			  </div>
					
			<?php endwhile; endif; wp_reset_query(); ?>  					  	

			</div>
		<!-- end three column for category content -->

	</section> <!-- end category intro wrapper -->

	<!-- end main content product -->
<!-- start the footer -->
<?php
get_footer();