<?php
/*
 * Template Name: Work
 * Description: A Page Portfolio page template
 */

//

?>


<?php get_header(); ?>
	<!-- start main content product -->

	<section class="main-content product-details"> <!-- main product wrapper -->
		<div class="product-section"> <!-- product wrap -->
				<div class="row row-effect"> <!-- columns of mediums -->				

            			<?php query_posts('page_id=141'); if(have_posts()) : while(have_posts()) : the_post(); ?><!-- starting the WordPress loop -->

							<div class="col-md-4">  <!-- medium entry -->
								<ul class="media">
									<li>
										<a href="<?php the_permalink(); ?>">	
											<figure class="effect-hover"> 
									          <?php 
					                            if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
					                              the_post_thumbnail();
					                            } 
					                            ?>		
											</figure> 
										</a>
									</li>
									<li>	
										<h2><?php the_title(); ?></h2>
										<?php the_excerpt(); ?>
									</li>
								</ul>
							</div>	<!-- medium entry -->

						<?php endwhile; ?>
			            <?php else : ?>
			                <p>Whoops! We are working on it.</p>
			            <?php endif; ?> <!-- end loop -->

            			<?php query_posts('page_id=139'); if(have_posts()) : while(have_posts()) : the_post(); ?><!-- starting the WordPress loop -->

							<div class="col-md-4">  <!-- medium entry -->
								<ul class="media">
									<li>
										<a href="<?php the_permalink(); ?>">	
											<figure class="effect-hover"> 
									          <?php 
					                            if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
					                              the_post_thumbnail();
					                            } 
					                            ?>		
											</figure> 
										</a>
									</li>
									<li>	
										<h2><?php the_title(); ?></h2>
										<?php the_excerpt(); ?>
									</li>
								</ul>
							</div>	<!-- medium entry -->

						<?php endwhile; ?>
			            <?php else : ?>
			                <p>Whoops! We are working on it.</p>
			            <?php endif; ?> <!-- end loop -->

            			<?php query_posts('page_id=137'); if(have_posts()) : while(have_posts()) : the_post(); ?><!-- starting the WordPress loop -->
			            
							<div class="col-md-4">  <!-- medium entry -->
								<ul class="media">
									<li>
										<a href="#">	
											<figure class="effect-hover"> 
									          <?php 
					                            if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
					                              the_post_thumbnail();
					                            } 
					                            ?>
												<figcaption>
													<p>Coming Soon</p>
												</figcaption>			
											</figure> 
										</a>
									</li>
									<li>	
										<h2><?php the_title(); ?></h2>
										<?php the_excerpt(); ?>
									</li>
								</ul>
							</div>	<!-- medium entry -->

						<?php endwhile; ?>
			            <?php else : ?>
			                <p>Whoops! We are working on it.</p>
			            <?php endif; ?> <!-- end loop -->							

				</div> <!-- end columns of mediums -->
		</div> <!-- end product wrap -->
	</section> <!-- end main product wrapper -->

	<!-- end main content product -->
<?php
get_footer();