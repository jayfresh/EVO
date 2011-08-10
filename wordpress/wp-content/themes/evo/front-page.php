<?php
get_header();
get_template_part('snippets/header');
global $post;
?>
<!-- home page structure here -->
<div class="grid24col innerWrap push2">
	<?php $query = new WP_Query('name=get-involved&post_type=page');
	if($query->have_posts()) :
		while($query->have_posts()) : $query->the_post(); ?>
	<div id="getInvolved" class="grid8col right box grey border">
		<h2 class="fixed"><?php the_title(); ?></h2>
		<p class="large"><?php echo get_the_excerpt(); ?></p>
		<?php the_content(); ?>
		<a class="readMore pull1" href="<?php the_permalink(); ?>">Read More</a>
	</div>
	<?php endwhile;
		endif;
	$q_a_query = new WP_Query("post_type=q_a&posts_per_page=-1&orderby=menu_order&order=asc"); ?>
	<div class="carouselWrapper grid16col">
		<div class="strip">
			<?php if($q_a_query->have_posts()) :
				while($q_a_query->have_posts()) : $q_a_query->the_post(); ?>
			<div class="grid16col carousel">
				<?php the_post_thumbnail('carousel'); ?>
				<p><?php the_title(); ?></p>
				<a href="<?php echo get_post_meta($post->ID,'_q_a_link', true); ?>" class="answer"><span></span> Answer</a>
				<span class="prev">prev</span>
				<span class="next">next</span>
			</div>
			<?php endwhile;
			else : ?>
			<div class="grid16col carousel">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/carousel.jpg" />
				<p>No Q&amp;A found</p>
			</div>			
			<?php endif; ?>
		</div>
	</div>
</div>
<div class="grid24col innerWrap push4">
	<?php $query = new WP_Query('name=global-partnerships&post_type=page');
	if($query->have_posts()) :
		while($query->have_posts()) : $query->the_post(); ?>
	<div id="globalPartnerships" class="grid8col left box border">
		<h2 class="fixed"><?php the_title(); ?></h2>
		<p class="large"><?php echo get_the_excerpt(); ?></p>
		<?php the_content(); ?>
		<a class="readMore pull1" href="<?php the_permalink(); ?>">Read More</a>
	</div>
	<?php endwhile;
		endif; ?>
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