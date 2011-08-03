<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="article">
	<div class="grid3col sharing right">
		<?php addThis(); ?>
	</div>
	<div class="grid13col">
		<?php if(is_singular()) : ?>
		<h1><?php the_title(); ?></h1>
		<?php else : ?>
		<h2><?php the_title(); ?></h2>
		<?php endif; ?>
		<?php if(get_post_type()=='post') : ?>
		<hr />
		<?php the_date('d.m.y'); ?>
		<?php endif; ?>
		<p class="large"><?php echo get_the_excerpt(); ?></p>
		<?php the_content(); ?>
	</div>
</div>
<?php endwhile; endif; ?>