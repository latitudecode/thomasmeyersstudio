<?php get_header(); ?>


	<div class="clear"></div>
	<!-- end of the header and navigation -->
	<!-- start main content product -->

	<section class="main-content product-detail"> <!-- main product wrapper -->
		<div class="product-detail-section"> <!-- product wrap -->

				<?php if(have_posts()) : while(have_posts()) : the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>
				
					<?php if(get_post_meta()) { ?>
						
						<img class="product" width=600 src="<?php echo get_post_meta(); ?>" />
						
					<?php } else { ?>
						
						<img class="product" width=600 src="<?php echo $imgsrc[0]; ?>" />
						
					<?php } ?>
				
					<a href="<?php echo $imgsrc[0]; ?>"><i class="fa fa-expand"></i></a> <!-- expander baby -->

				<?php endwhile; endif; wp_reset_query(); ?>	

		</div> <!-- end product wrap -->
	</section> <!-- end main product wrapper -->

	<!-- end main content product -->
	<!-- start the footer -->


	<!-- start the footer -->
<?php
get_footer();