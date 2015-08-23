<?php
/*
 * Template Name: Collaboration list page
 * Description: A Page Portfolio page template
 */

//

?>


<?php get_header('subnav'); ?>

	<div class="clear"></div>
	<!-- end of the header and navigation -->
	<!-- start main content product -->
	<div class="category-intro">
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

	<section class="main-columns category-list"> <!-- main category intro wrapper -->
		<!-- start three columns for category content -->
			<div class="row row-effect"> 
			  <div class="col-md-3">  <!-- first column for portait work -->
			  	<figure class="effect-hover"> 
			  		<img class="port-sml" src="<?php bloginfo('template_directory'); ?>/images/portrait.png" />
						<figcaption>
							<p>Title</p>
							<p>34" x 44"</p>
						</figcaption>			  		
			  	</figure>
			  	<figure class="effect-hover"> 			  	
			  		<img class="port-sml" src="<?php bloginfo('template_directory'); ?>/images/portrait-2.png" />
						<figcaption>
							<p>Title</p>
							<p>34" x 44"</p>
						</figcaption>
				</figure>	
			  	<figure class="effect-hover"> 			  	
			  		<img class="port-sml" src="<?php bloginfo('template_directory'); ?>/images/portrait-2.png" />
						<figcaption>
							<p>Title</p>
							<p>34" x 44"</p>
						</figcaption>
				</figure>							  	
			  </div>
			  <div class="col-md-3"> <!-- second column for small landscape work -->
			  	<figure class="effect-hover"> 			  	
			  		<img class="land-sml" src="<?php bloginfo('template_directory'); ?>/images/landscape-small.jpg" />
						<figcaption>
							<p>Title</p>
							<p>34" x 44"</p>
						</figcaption>			  		
			  	</figure>	
			  	<figure class="effect-hover"> 			  			  		
				  	<img class="land-sml" src="<?php bloginfo('template_directory'); ?>/images/landscape-small-2.jpg" />
						<figcaption>
							<p>Title</p>
							<p>34" x 44"</p>
						</figcaption>			  		
			  	</figure>				  	
			  	<figure class="effect-hover"> 				  	
				  	<img class="land-sml" src="<?php bloginfo('template_directory'); ?>/images/landscape-small-3.jpg" />	
						<figcaption>
							<p>Title</p>
							<p>34" x 44"</p>
						</figcaption>			  		
			  	</figure>				  	
			  	<figure class="effect-hover"> 				  	
					<img class="land-sml" src="<?php bloginfo('template_directory'); ?>/images/landscape-small.jpg" />
						<figcaption>
							<p>Title</p>
							<p>34" x 44"</p>
						</figcaption>			  		
			  	</figure>					
			  	<figure class="effect-hover"> 					
				  	<img class="land-sml" src="<?php bloginfo('template_directory'); ?>/images/landscape-small-2.jpg" />
						<figcaption>
							<p>Title</p>
							<p>34" x 44"</p>
						</figcaption>			  		
			  	</figure>				  	
			  	<figure class="effect-hover"> 				  	
				  	<img class="land-sml" src="<?php bloginfo('template_directory'); ?>/images/landscape-small-3.jpg" />	
						<figcaption>
							<p>Title</p>
							<p>34" x 44"</p>
						</figcaption>			  		
			  	</figure>			  					  			  				  	
			  </div> 
			  <div class="col-md-6">  <!-- third column for large landscape work -->
			  	<figure class="effect-hover"> 			  	 
				  	 <img class="land-lrg" src="<?php bloginfo('template_directory'); ?>/images/landscape-large.jpg" />
						<figcaption>
							<p>Title</p>
							<p>34" x 44"</p>
						</figcaption>
			  	</figure>				  	 
			  	<figure class="effect-hover"> 	
				  	 <img class="land-lrg" src="<?php bloginfo('template_directory'); ?>/images/landscape-large-2.jpg" /> 
						<figcaption>
							<p>Title</p>
							<p>34" x 44"</p>
						</figcaption>
			  	</figure>	
			  	<figure class="effect-hover"> 					  	 
				  	 <img class="land-lrg" src="<?php bloginfo('template_directory'); ?>/images/landscape-large.jpg" />
						<figcaption>
							<p>Title</p>
							<p>34" x 44"</p>
						</figcaption>
			  	</figure>	
			  	<figure class="effect-hover"> 					  	 
				  	 <img class="land-lrg" src="<?php bloginfo('template_directory'); ?>/images/landscape-large-2.jpg" /> 
						<figcaption>
							<p>Title</p>
							<p>34" x 44"</p>
						</figcaption>
			  	</figure>	
			  	<figure class="effect-hover"> 					  	 
				  	 <img class="land-lrg" src="<?php bloginfo('template_directory'); ?>/images/landscape-large.jpg" />
						<figcaption>
							<p>Title</p>
							<p>34" x 44"</p>
						</figcaption>
			  	</figure>	
			  	<figure class="effect-hover"> 					  	 
				  	 <img class="land-lrg" src="<?php bloginfo('template_directory'); ?>/images/landscape-large-2.jpg" />
						<figcaption>
							<p>Title</p>
							<p>34" x 44"</p>
						</figcaption>
			  	</figure>	
			  	<figure class="effect-hover"> 					  	 
				  	 <img class="land-lrg" src="<?php bloginfo('template_directory'); ?>/images/landscape-large.jpg" />	
						<figcaption>
							<p>Title</p>
							<p>34" x 44"</p>
						</figcaption>
			  	</figure>					  	 		  	 			  	 
			  </div>
			</div>
		<!-- end three column for category content -->

	</section> <!-- end category intro wrapper -->

	<!-- end main content product -->
<!-- start the footer -->
<?php
get_footer();