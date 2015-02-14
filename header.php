<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<!-- This is a website for Thomas Meyers -->
<!-- core css -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/normalize.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/custom.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/media.css" />
<!-- google fonts -->
<link href='http://fonts.googleapis.com/css?family=Muli:300,400,300italic,400italic|Nunito:400,300,700' rel='stylesheet' type='text/css'>
<!-- font awesome for icons -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/font-awesome.css" />
<!-- foundation css -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/foundation.css" />
<!-- make it responsive -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- foundation script -->
<script src="<?php bloginfo('template_directory'); ?>/js/foundation/foundation.offcanvas.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/foundation/foundation.js"></script>
<!-- hover action -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/hover.css" />	
<!-- form css -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/forms.css" />	
<?php wp_head(); ?>
</head>
<body>
<div class="off-canvas-wrap" data-offcanvas> <!-- start flyout navigation -->
  <div class="inner-wrap"> <!-- start flyout navigation content -->
	<!-- end of the heading with most of the source files -->
	<!-- start contact information pushd down goes here -->

	<section class="pushdown">
		<div class="push-content">
			<ul class="contact">
				<li class="title">contact</li>
				<li>thomas meyers</li>
				<li>phone: 603.525.3528</li>
				<li>email: tom@thomasmeyersstudio.com</li>
			</ul>
			<div class="push-exit"><i class="#"></i></div>	
		</div>		
	</section>

	<!-- end of pushdown contact -->
	<!-- start the header and navigation -->

	<header>
		
		<div class="flyout">
			 <a class="left-off-canvas-toggle" href="#" ><i class="fa fa-bars"></i></a> <!-- flyout menu icon -->
		</div>

		<div class="mail fr">
			<a href="#"><i class="fa fa-envelope"></i></a>
		</div>
		
		<!-- start to main navigation and logo -->
		<div class="logo fl">
			<ul>
				<li><a href="#"><img width="60" src="<?php bloginfo('template_directory'); ?>/images/logo.png" /></a></li>
				<li class="logo-text">thomas meyers studio</li>
			</ul>
		</div>
		<nav class="primary-nav">
			<ul class="nav-links fr">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
				<!-- <li class="pushup"><a href="#">contact</a></li> figure out -->								
			</ul>
		</nav>
		<!-- end to main navigation and logo -->
	</header>

	<!-- end of the header and navigation -->
	<!-- begin flyout menu -->

	<div class="flyout"> <!-- start main flyout menu content -->
	    <!-- Off Canvas Menu -->
	    <aside class="left-off-canvas-menu">
	    	  <a class="exit-off-canvas"><i class="fa fa-times"></i></a>
	        <!-- whatever you want goes here -->
	        <ul>
	        	<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
				<!-- <li><a href="#">work</a></li>
				<li><a href="#">studio</a></li>
				<li><a href="#">explore</a></li>
				<li><a href="#">info</a></li>
				<li><a href="#">contact</a></li>
				-->										
			</ul>
	    </aside>
	</div> <!-- end main flyout menu content -->
  <!-- close the off-canvas menu -->
