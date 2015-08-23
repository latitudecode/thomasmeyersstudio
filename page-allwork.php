<?php
/*
 * Template Name: All work
 * Description: A Page Portfolio page template
 */

//

?>


<?php get_header(); ?>

	<div class="clear"></div>
	<!-- end of the header and navigation -->
	<!-- start main content product -->
	<!-- removed temp
	<div class="category-intro-collage">
		<!-- main intro category copy image 
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

						<!-- get body copy 
						<?php
						$content = get_the_content('');
						print $content;
						?>
					</p>
				</div>
			</div>
		<!-- end main intro category copy 
	</div>
-->

	<section style="top: 0px;" class="main-columns category-list"> <!-- main category intro wrapper -->
		<!-- start three columns for category content -->
			<div class="row row-effect"> 

			  		<!-- go get the posts -->
					<?php 
					    query_posts(array( 
					        'post_type' => 'acme_product',
					        'showposts' => 40,
					        'category__in' => array( 4, 5 )
					    ) );  
					?>

			  <div class="col-md-3">  <!-- first column for portait work -->

					<?php if(have_posts()) : while(have_posts()) : the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>	
			  	
			  	<a href="<?php the_permalink(); ?>">
				  	<figure class="effect-hover"> 

					<?php 
					if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
						the_post_thumbnail();
					} 
					?>

					<?php $featuredImage = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>

						<figcaption>
							<p>Title</p>
							<p>34" x 44"</p>
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
					        'category__in' => array( 3, 6 )
					    ) );  
					?>

			  <div class="col-md-3"> <!-- second column for small landscape work -->

					<?php if(have_posts()) : while(have_posts()) : the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>	

				<a href="<?php the_permalink(); ?>">	
				  	<figure class="effect-hover"> 
					
					<?php 
					if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
						the_post_thumbnail();
					} 
					?>

					<?php $featuredImage = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>

						<figcaption>
							<p>Title</p>
							<p>34" x 44"</p>
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
					        'category__in' => array( 2, 7 )
					    ) );  
					?>

			  <div class="col-md-6"> <!-- second column for small landscape work -->

					<?php if(have_posts()) : while(have_posts()) : the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>	

				<a href="<?php the_permalink(); ?>">	
				  	<figure class="effect-hover"> 
					
					<?php 
					if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
						the_post_thumbnail();
					} 
					?>

					<?php $featuredImage = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>

						<figcaption>
							<p>Title</p>
							<p>34" x 44"</p>
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