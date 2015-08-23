<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<meta content="test">
<!-- This is a website for Thomas Meyers -->
<!-- core css -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/normalize.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/custom.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/media.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/device.css" />  
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/pushdown.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/slider.css" />
<!-- google fonts -->
<link href='http://fonts.googleapis.com/css?family=Muli:300,400,300italic,400italic|Nunito:400,300,700' rel='stylesheet' type='text/css'>
<!-- font awesome for icons -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/font-awesome.css" />
<!-- foundation css -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/foundation.css" />
<!-- make it responsive -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<!-- foundation script -->
<script src="<?php bloginfo('template_directory'); ?>/js/foundation/foundation.offcanvas.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/foundation/foundation.js"></script>
<!-- slider script -->
<script src="<?php bloginfo('template_directory'); ?>/js/modernizr.custom.js"></script>
<!-- hover action -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/hover.css" />	
<!-- form css -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/forms.css" />
<!-- google analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-60492406-1', 'auto');
  ga('send', 'pageview');

</script>
<?php wp_head(); ?>
</head>
<body>
<div id="wrapper">	
<div class="off-canvas-wrap" data-offcanvas> <!-- start flyout navigation -->
  <div class="inner-wrap"> <!-- start flyout navigation content -->
	<!-- end of the heading with most of the source files -->
	<!-- start the header and navigation -->

	<header>

		<div class="flyout">
			 <a class="left-off-canvas-toggle" href="#" ><i class="fa fa-bars"></i></a> <!-- flyout menu icon -->
		</div>

		<div class="mail fr">
			<a href="mailto:info@thomasmeyersstudio.com"><i class="fa fa-envelope"></i></a>
		</div>
		
		<!-- start to main navigation and logo -->
		<div class="logo fl">
			<ul>
				<li><a href="<?php bloginfo('url'); ?>"><img width="60" src="<?php bloginfo('template_directory'); ?>/images/logo.png" /></a></li>
				<li class="logo-text">thomas meyers studio</li>
			</ul>
		</div>
		<nav class="primary-nav">
			<ul class="nav-links fr">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
				<a class="nav-toggler toggle-push-top" href="#">contact</a>									
			</ul>
		</nav>
		<!-- end to main navigation and logo -->
		<!-- start to sub navigation -->
		<nav class="sub-nav">
			<ul class="sub-nav-links">
				<li><a href="/new/?page_id=139">collage</a></li>
				<li><a href="/new/?page_id=141">mosaic</a></li>
				<!-- <li><a href="/work/collaboration">collaboration</a></li>-->
			</ul>
		</nav>
		<!-- end to sub navigation -->	
		<nav class="menu push-menu-top-subnav">
		    <ul>
		        <li><button class="close-menu"><i class="fa fa-times-circle-o"></i></li>
		    </ul>
		    <div class="contact">
		    	<h2>contact</h2>
		    	<p>thomas meyers</p>
				<p>phone: 603.525.3528</p>
				<p>email: tom@thomasmeyersstudio.com</p>
		    </div>
		</nav><!-- /push menu top -->

	    <div id="main">
	        <div class="container">
	            
	            <div class="buttons">
	                <button class="nav-toggler toggle-slide-left">Slide Menu Left</button>
	                <button class="nav-toggler toggle-slide-right">Slide Menu Right</button>
	                <button class="nav-toggler toggle-slide-top">Slide Menu Top</button>
	                <button class="nav-toggler toggle-slide-bottom">Slide Menu Bottom</button><br>
	                <button class="nav-toggler toggle-push-left">Push Menu Left</button>
	                <button class="nav-toggler toggle-push-right">Push Menu Right</button>
	                <button class="nav-toggler toggle-push-top">Push Menu Top</button>
	                <button class="nav-toggler toggle-push-bottom">Push Menu Bottom</button>
	            </div><!-- /buttons -->

	        </div>
	    </div><!-- #main -->

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
	        	<li class="contact-menu"><a href="mailto:info@thomasmeyersstudio.com">contact</a></li>
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