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
	<!-- start the medium seleciton with secondary nav -->
	
	<section class="cat-section row-effect">
		<div class="media-entry-mosaic fl"> <!-- nav for selecting medium type -->
			 <ul>
				<li class="title"><h2>mosaic</h2></li>
				<li class="cat-img">
					<a href="#">	
						<figure class="effect-hover cat"> 
							<img src="<?php bloginfo('template_directory'); ?>/images/mosaic.png" />
								<figcaption>
									<p></p>
								</figcaption>			
						</figure> 
					</a>					
				</li>
			</ul>
		</div> <!-- end nav for selecting type -->
		
		<div class="media-entry-collage fr"> <!-- nav for selecting medium type -->
			 <ul>
				<li class="title"><h2>collage</h2></li>
				<li class="cat-img">						
					<a href="#">	
						<figure class="effect-hover cat"> 
							<img src="<?php bloginfo('template_directory'); ?>/images/mosaic.png" />
								<figcaption>
									<p></p>
								</figcaption>			
						</figure> 
					</a>
				</li>
			</ul>
		</div> <!-- end nav for selecting type -->
	</section>
	<div class="clear"></div>

	<!-- end medium selection section -->
	<!-- start the footer -->