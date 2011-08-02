<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="article">
	<?php the_title(); ?>
	<?php the_content(); ?>
</div>
<?php endwhile; endif; ?>