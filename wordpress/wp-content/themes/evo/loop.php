<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="article">
	<div class="grid3col sharing right">
		<?php addThis(); ?>
	</div>
	<div class="grid13col">
		<?php if(is_singular()) :
			global $post;
			$parent = get_post($post->post_parent);
			if($parent->ID!=$post->ID && $parent->post_name=="information-for") { ?>
		<h1><span class="subhead">Information for </span><?php the_title(); ?></h1>
			<?php } else {
		?>
		<h1><?php the_title(); ?></h1>
			<?php } ?>
		<?php else : ?>
			<?php if(is_search()) { ?>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php } else { ?>
		<h2><?php the_title(); ?></h2>
			<?php } ?>
		<?php endif; ?>
		<?php if(get_post_type()=='post') : ?>
		<hr />
		<?php the_date('d.m.y'); ?>
		<?php endif; ?>
		<p class="large"><?php echo get_the_excerpt(); ?></p>
		<?php if(!is_search()) { 
			the_content(); ?>
		<?php } ?>
		<br class="clearboth" />
	</div>
</div>
<?php endwhile; endif; ?>