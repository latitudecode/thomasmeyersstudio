<?php 

/* Basic Single Post Template 

*/
get_header(); ?>


	<div class="clear"></div>
	<!-- end of the header and navigation -->
	<!-- start main content product -->

	<section class="main-content product-detail"> <!-- main product wrapper -->
		<div class="product-detail-section"> <!-- product wrap -->

				<?php if(have_posts()) : while(have_posts()) : the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>
				
					<?php 
					if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
						the_post_thumbnail();
					} 
					?>

					<?php $featuredImage = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
				
					<a href="<?php echo $imgsrc[0]; ?>"><i class="fa fa-expand"></i></a> <!-- expander baby -->

				<?php endwhile; endif; wp_reset_query(); ?>	

		</div> <!-- end product wrap -->
	</section> <!-- end main product wrapper -->

	<!-- end main content product -->
	<!-- start the footer -->


	<!-- start the footer -->
<?php
get_footer();