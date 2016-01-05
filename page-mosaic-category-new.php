<?php
/*
 * Template Name: New mosaic list page
 * Description: A Page Portfolio page template
 */

//

?>


<?php get_header('subnav'); ?>

	<div class="clear"></div>
	<!-- end of the header and navigation -->
	<!-- start main content product -->
	<div class="category-intro-mosaic">
		<!-- main intro category copy image -->
			<div class="intro">
				<div class="intro-copy">
					<p>
						<?php
						// Start the Loop.
						while ( have_posts() ) : the_post();

						// Include the page content template.
						get_template_part( 'content', 'page' );


						endwhile;
						?>

						<!-- get body copy -->
						<?php
						$content = get_the_content('');
						print $content;
						?>
					</p>
				</div>
			</div>
		<!-- end main intro category copy -->
	</div>

	<!-- start to filtration bar -->
	<nav class="sub-nav filter">
		<ul class="sub-nav-links">
				<?php wp_nav_menu( array( 'theme_location' => 'tertiary', 'menu_class' => 'nav-menu' ) ); ?>
		</ul>
	</nav>
	<!-- end to filtration bar -->	

	<section class="main-columns category-list mosaic filter"> <!-- main category intro wrapper -->
		<!-- start three columns for category content -->
			<div class="row row-effect"> 

			  		<!-- go get the posts -->
					<?php 
					    query_posts(array( 
					        'post_type' => 'acme_product',
					        'showposts' => 40,
					        'category__in' => array( 5 )
					    ) );  
					?>

			  <div class="col-md-3">  <!-- first column for portait work -->

					<?php if(have_posts()) : while(have_posts()) : the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>	
			  	
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
					<?php endwhile; endif; wp_reset_query(); ?>  					  	
			  </div>

			  		<!-- go get the posts -->
					<?php 
					    query_posts(array( 
					        'post_type' => 'acme_product',
					        'showposts' => 40,
					        'category__in' => array( 6 )
					    ) );  
					?>

			  <div class="col-md-3"> <!-- second column for small landscape work -->

					<?php if(have_posts()) : while(have_posts()) : the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>	

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
					<?php endwhile; endif; wp_reset_query(); ?> 				 			  					  			  				  	
			  </div> 

			  		<!-- go get the posts -->
					<?php 
					    query_posts(array( 
					        'post_type' => 'acme_product',
					        'showposts' => 40,
					        'category__in' => array( 7 )
					    ) );  
					?>

			  <div class="col-md-6"> <!-- second column for small landscape work -->

					<?php if(have_posts()) : while(have_posts()) : the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>	

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
					<?php endwhile; endif; wp_reset_query(); ?> 				 			  					  			  				  	
			  </div>

			</div>
		<!-- end three column for category content -->

	</section> <!-- end category intro wrapper -->

	<!-- end main content product -->
<!-- start the footer -->
<?php
get_footer();