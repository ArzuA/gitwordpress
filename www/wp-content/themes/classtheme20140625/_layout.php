<!Doctype html>
<html>
<head>
<title><?php echo GitWordPressLayout::$Viewbag['sTitle'] ?></title>
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Tangerine">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri()  ?>/css/lavish-bootstrap.css">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.1/css/font-awesome.css" rel="stylesheet" />
<link href="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet">
<link href="//cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.css" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.js"></script>

</head>
<body>
<div id="wrapper" class="<?php echo GitWordPressLayout::$Viewbag['sPage'] ?>">
<div id="header">
<div id="access" role="navigation">

<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    <a class="navbar-brand" href="#">SITE TITLE</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-top-collapse">
         <?php
            wp_nav_menu( array(
                'menu'              => 'Menu 1',
                'theme_location'    => 'Primary Menu',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
        		'container_id'      => 'bs-example-navbar-collapse-1',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>
    </div><!-- /.navbar-collapse --> 
</nav>

<?php GitWordPressLayout::renderBody(); ?>
<div id="delimiter"></div>



<!--------------- FOOTER --------------->
<footer>

	<div class="container">
		<div class="panel-footer">
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2013 Company, Inc. <a href="#">Privacy</a> <a href="#">Terms</a></p>
		</div>
	</div>
</footer>


<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.js"></script>

<!--------------- /FOOTER --------------->
</body>
</html>




