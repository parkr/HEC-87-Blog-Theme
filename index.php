<?php get_header(); ?>

<div id="main">

	<div id="content">
		<?php get_template_part( 'loop', 'index' );	?>
	</div>
	<!--end Content-->

<?php get_sidebar('secondary'); ?>

</div>
<!--end Main-->

<?php get_footer(); ?>