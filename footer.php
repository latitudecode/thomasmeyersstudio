<?php
/**
 * The template for displaying the footer
 *
 * @package WordPress
 */
?>

	<footer>
		<div class="product-menu"> <!-- start product menu -->
			<ul>
				<li class="previous"><a href="#"><i class="fa fa-arrow-circle-left"></i></a></li>
				<li class="product-title">Treasure - 35.5" X 22.5"</li>
				<li class="grid-block"><a href="#"><i class="fa fa-th-large"></i></a></li>
				<li class="next"><a href="#"><i class="fa fa-arrow-circle-right"></i></a></li>												
			</ul>
		</div> <!-- end product menu -->		
		<div class="signup-man fl">
			<input class="signup-field" type="email" required="" placeholder="Email address" id="mce-EMAIL" name="EMAIL" value="">
				<button class="signup-button" id="mc-embedded-subscribe" name="subscribe" type="submit">
	            	<i class="#"></i>
	            </button>
        </div>
		<div class="rightz fr"><h4>&copy; 2014 Thomas Meyers</h4></div>
	</footer>

</div>
  </div>  
</div> <!-- end flyout navigation -->
    <script src="<?php bloginfo('template_directory'); ?>/js/vendor/jquery.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
<?php wp_footer(); ?>
</body>
</html>






