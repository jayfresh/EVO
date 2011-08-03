<?php
get_header();
get_template_part('snippets/header');
?>
<!-- home page structure here -->
<div class="grid24col innerWrap push2">
	<?php $post = get_post_by_slug('get-involved','page'); ?>
	<div id="getInvolved" class="grid8col right box grey border">
		<h2 class="fixed"><?php the_title(); ?></h2>
		<p class="large"><?php echo get_the_excerpt(); ?></p>
		<?php the_content(); ?>
		<a class="readMore pull1" href="#">Read More</a>
	</div>
	<div class="grid16col carousel">
		<img src="<?php bloginfo('stylesheet_directory');?>/images/carousel.jpg"/>
	</div>
</div>
<div class="grid24col innerWrap push3">
	<?php $post = get_post_by_slug('global-partnerships','page'); ?>
	<div id="globalPartnerships" class="grid8col left box border">
		<h2 class="fixed"><?php the_title(); ?></h2>
		<p class="large"><?php echo get_the_excerpt(); ?></p>
		<?php the_content(); ?>
		<a class="readMore pull1" href="#">Read More</a>
	</div>
	<div id="informationFor" class="grid16col carousel border right">
		<h2 class="small">Information For</h2>
		<?php $top_page = get_post_by_slug('information-for','page');
		$child_pages = new WP_Query("post_type=page&post_parent=".$top_page->ID."&orderby=menu_order&order=asc");
		if($child_pages->have_posts()) : ?>
		<!-- deliberately no whitespace between li elements -->
		<ul id="homeLinks">
			<?php while($child_pages->have_posts()) : $child_pages->the_post(); ?><li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li><?php endwhile; ?>
			</ul>
		<?php endif; ?>
	</div>	
</div>


<?php get_template_part('snippets/footer'); ?>
<?php get_footer(); ?>