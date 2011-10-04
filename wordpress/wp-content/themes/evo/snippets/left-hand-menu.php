<?php
// generate menu based on child pages
// it is anticipated this will only show on single pages



$page_target = $post;
if($page_target->post_parent) {
	$page_target = get_post($page_target->post_parent);
	if($page_target->post_parent) {
		$page_target = get_post($page_target->post_parent);
	}
} ?>
	<div class="sidebarWrap grid6col dottop padtop">
	<?php
	if(!is_search()) {
		$page_title = get_the_title();
		$query = new WP_query("post_type=page&post_parent=".$page_target->ID."&posts_per_page=-1&orderby=menu_order&order=asc");
		if($query->have_posts()) : ?>
		<ul class="sidebar push4">
			<li class="active"><a href="<?php echo get_permalink($page_target->ID); ?>"><?php echo get_the_title($page_target->ID); ?></a></li>
			<?php while ( $query->have_posts() ) : $query->the_post();
				$current_title = get_the_title();
				$class="";
				if($page_title==$current_title) {
					$class = ' class="active"';
				}
			?>
			<li<?php echo $class; ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			<?php endwhile; wp_reset_query(); ?>
		</ul>
		<?php endif;
	} ?>
	</div>