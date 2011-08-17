<?php
get_header();
get_template_part('snippets/header'); ?>

<div class="grid24col innerWrap push2">
	<?php get_template_part('snippets/breadcrumbs'); ?>
	<div class="grid18col right">
	<?php
	$_404page = get_post_by_slug('404-2', 'page');
	if(!isset($_404page)) {
		$content = "no 404 page created yet";
	} else {
		$content = apply_filters('the_content', get_the_content($_404page->ID));
	}
	?>
		<div class="article">
			<?php echo $content; ?>
		</div>
	</div>
	

	<br class="clearboth"/>
</div>

<?php
get_template_part('snippets/footer');
get_footer();
?>