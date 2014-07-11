<?php
/*
 Template Name: Page Template
*/
GitWordPressLayout::$Viewbag['sTitle'] = "WAKE UP";
GitWordPressLayout::layout("_layout.php");
?>
<div id="main">
	<div id="content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<!-- <h1><?php the_title(); ?></h1> -->
		<p><?php the_content(__('(more...)')); ?></p>
		<?php endwhile;endif?>
		</div>
</div>