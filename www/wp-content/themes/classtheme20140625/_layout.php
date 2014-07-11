<!Doctype html>
<html>
<head>
<title><?php echo GitWordPressLayout::$Viewbag['sTitle'] ?></title>
<link href='http://fonts.googleapis.com/css?family=Lato:300,100' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css"
	href="<?php echo get_template_directory_uri()  ?>/css/lavish-bootstrap.css">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

<link
	href="//netdna.bootstrapcdn.com/font-awesome/4.0.1/css/font-awesome.css"
	rel="stylesheet" />
<link href="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"
	rel="stylesheet">

</head>
<body>
	<div id="wrapper"
		class="<?php echo GitWordPressLayout::$Viewbag['sPage'] ?>">
		<div id="header">
			<div id="access" role="navigation">

				<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
					<div id="wrapper" class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle"
								data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span> <span
									class="icon-bar"></span> <span class="icon-bar"></span> <span
									class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="<?php echo home_url(); ?>">COFFEE-HANE</a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						
						
						<?php BootStrapMenusPlugin::displayMenu ();?>
						

				</nav>
			</div>
			<!-- #access -->
			<h1><?php echo GitWordPressLayout::$Viewbag['sTitle'] ?></h1>
		</div>
	
<?php GitWordPressLayout::renderBody(); ?>
<div id="delimiter"></div>

<!--------------- FOOTER --------------->
</div>
<div id="wrapper" class="container">
		<div class="panel-footer">
			<p class="pull-right">
				<a href="#">Back to top</a>
			</p>
			<p>
				&copy; 2013 Company, Inc. <a href="#">Privacy</a> <a href="#">Terms</a>
			</p>
		</div>
	</div>
<!--------------- /FOOTER --------------->
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.js"></script>
</body>
</html>