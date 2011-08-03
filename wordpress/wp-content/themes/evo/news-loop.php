
<div class="article">
	<?php $news_page = get_post(get_option('page_for_posts')); ?>
	<h1><?php echo get_the_title($news_page); ?></h1>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="grid3col sharing right">
		<a id="facebook" href="#">Share on Facebook</a>
		<a id="twitter" href="#">Share on Twitter</a>
		<a id="email" href="#">Share by email</a>
		<a id="print" href="#">Print this page</a>
	</div>
	<div class="grid13col">
		<hr />
		<?php the_date('d.m.y'); ?>
		<h2><?php the_title(); ?></h2>
		<p class="large"><?php echo get_the_excerpt(); ?></p>
		<?php the_content(); ?>
	</div>
	<?php endwhile; endif; ?>
</div>