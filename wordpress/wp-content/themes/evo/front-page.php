<?php
get_header();
get_template_part('snippets/top-menu'); ?>
<!-- home page structure here -->

<p>carousel</p>

<p>get involved</p>

<p>global partnerships</p>

<p>information for:</p>
<?php $top_page = get_post_by_slug('information-for','page');
$child_pages = new WP_Query("post_type=page&post_parent=".$top_page->ID."&orderby=menu_order&order=asc");
if($child_pages->have_posts()) : ?>
<ul>
	<?php while($child_pages->have_posts()) : $child_pages->the_post(); ?>
	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	<?php endwhile; ?>
</ul>
<?php endif; ?>
<?php get_template_part('snippets/footer-menu'); ?>
<?php get_footer(); ?>