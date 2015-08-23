<?php
/**
 * The template for displaying the footer
 *
 * @package WordPress
 */
?>

	<footer>

		<div class="product-menu"> <!-- start product menu -->
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>			
			<ul>
				<li class="previous"><?php previous_post_link( '%link', _x( '&larr;', 'Previous post link', 'twentytwelve' ) . '</span>' ); ?></li>
				<li class="product-title"><?php the_title(); ?> - <?php echo get_post_meta($post->ID, 'latitude_size', true); ?></li>
				<li class="grid-block"><a href="http://thomasmeyersstudio.com/new/?page_id=215"><i class="fa fa-th-large"></i></a></li>
				<li class="next"><?php next_post_link( '%link', _x( '&rarr;', 'Next post link', 'twentytwelve' ) . '</span>' ); ?></li>												
			</ul>

			<?php endwhile; // end of the loop. ?>

		</div> <!-- end product menu -->	

		<div class="signup-man fl">
			<input class="signup-field" type="email" required="" placeholder="Signup for updates" id="mce-EMAIL" name="EMAIL" value="">
				<button class="signup-button" id="mc-embedded-subscribe" name="subscribe" type="submit">
	            	<a href="http://eepurl.com/benFan"><i class="fa fa-angle-right"></i></a>
	            </button>
        </div>
		<div class="rightz fr"><h4>&copy; 2015 Thomas Meyers</h4></div>
	</footer>

</div>
  </div>  
</div> <!-- end flyout navigation -->
</div> <!-- end pushdown contact -->
    <script src="<?php bloginfo('template_directory'); ?>/js/vendor/jquery.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/foundation.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/classie.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/nav.js"></script>	    
    <script>
      $(document).foundation();
    </script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/jquery.cbpFWSlider.min.js"></script>
	<script>
		$( function() {
			/*
			- how to call the plugin:
			$( selector ).cbpFWSlider( [options] );
			- options:
			{
				// default transition speed (ms)
				speed : 500,
				// default transition easing
				easing : 'ease'
			}
			- destroy:
			$( selector ).cbpFWSlider( 'destroy' );
			*/

			$( '#cbp-fwslider' ).cbpFWSlider();

		} );
	</script>    
<?php wp_footer(); ?>
</body>
</html>
