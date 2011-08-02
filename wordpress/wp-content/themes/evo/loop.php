<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="article">
	<h1><?php the_title(); ?></h1>
	<p class="large"><?php echo get_the_excerpt(); ?></p>
	<?php the_content(); ?>
</div>
<?php endwhile; endif; ?>