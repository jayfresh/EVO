<?php
// generate menu based on child pages
// it is anticipated this will only show on single pages
$query = new WP_query("post_parent=".$post->ID);
if($query->have_posts()) : ?>
	<ul>
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
		<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		<?php endwhile; ?>
	</ul>
<?php endif; ?>