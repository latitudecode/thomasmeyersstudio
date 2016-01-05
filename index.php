<?php get_header(); ?>

	<!--- start to the slider -->

	<section class="slider">
			<div id="cbp-fwslider" class="cbp-fwslider">

			<?php 
			    query_posts(array( 
			        'post_type' => 'slides',
			        'showposts' => 40,
			    ) );  
			?>

			<?php if(have_posts()) : while(have_posts()) : the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>	

				<ul>
					<li>
							<?php 
							if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
								the_post_thumbnail();
							} 
							?>

							<?php $featuredImage = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
					</li>
				</ul>
			
			<?php endwhile; endif; wp_reset_query(); ?>  

			</div>
	</section>

	<!-- end of the slider section -->
	<!-- start the medium seleciton with secondary nav -->
	
	<section class="cat-section row-effect">
		<?php query_posts('page_id=141'); if(have_posts()) : while(have_posts()) : the_post(); ?><!-- starting the WordPress loop -->

			<div class="media-entry-mosaic fl"> <!-- nav for selecting medium type -->
				 <ul>
					<li class="title"><h2>mosaic</h2></li>
					<li class="cat-img">
						<a href="<?php the_permalink(); ?>">	
							<figure class="effect-hover cat"> 
					          <?php 
	                            if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
	                              the_post_thumbnail();
	                            } 
	                            ?>				
							</figure> 
						</a>					
					</li>
				</ul>
			</div> <!-- end nav for selecting type -->

		<?php endwhile; ?>
		<?php else : ?>
		    <p>Whoops! We are working on it.</p>
		<?php endif; ?> <!-- end loop -->

		<?php query_posts('page_id=139'); if(have_posts()) : while(have_posts()) : the_post(); ?><!-- starting the WordPress loop -->	

			<div class="media-entry-collage fr"> <!-- nav for selecting medium type -->
				 <ul>
					<li class="title"><h2>collage</h2></li>
					<li class="cat-img">						
						<a href="<?php the_permalink(); ?>">	
							<figure class="effect-hover cat"> 
					          <?php 
	                            if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
	                              the_post_thumbnail();
	                            } 
	                            ?>				
							</figure> 
						</a>
					</li>
				</ul>
			</div> <!-- end nav for selecting type -->

		<?php endwhile; ?>
		<?php else : ?>
		    <p>Whoops! We are working on it.</p>
		<?php endif; ?> <!-- end loop -->

	</section>
	<div class="clear"></div>

	<!-- end medium selection section -->
	<!-- start the footer -->
<?php
get_footer();
	