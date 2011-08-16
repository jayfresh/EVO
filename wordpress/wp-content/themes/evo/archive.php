<?php
/* for search results */
get_header();
get_template_part('snippets/header'); ?>

<div class="grid24col innerWrap push2">
	<?php get_template_part('snippets/breadcrumbs'); ?>
	<div class="grid18col right">
	<?php
	get_template_part('news-loop');
	?>
	</div>
	<?php get_template_part('snippets/left-hand-menu'); ?>
	

	<br class="clearboth"/>
	<div id="sidebarTerminal"></div>
</div>

<?php
get_template_part('snippets/footer');
get_footer();
?>
