<?php
/*
Template Name: Search
*/
get_header();
get_template_part('snippets/header'); ?>
<div class="grid24col innerWrap push2">
	<?php get_template_part('snippets/breadcrumbs'); ?>
	<div class="grid18col right">
		<div class="article">
		<?php the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<?php get_search_form(); ?>
		<?php the_content(); ?>
		</div>
	</div>
	<?php get_template_part('snippets/left-hand-menu'); ?>
	

	<br class="clearboth"/>
	<div id="sidebarTerminal"></div>
</div>

<?php
get_template_part('snippets/footer');
get_footer();
?>