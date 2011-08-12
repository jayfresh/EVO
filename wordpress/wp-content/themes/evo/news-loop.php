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
	<div class="grid13col newsArticle">
		<p class="push2 date"><?php echo get_the_date('d.m.y'); ?></p>
		<?php if(!is_singular()) : ?>
		<h2 class="small"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<?php else : ?>
		<h2><?php the_title(); ?></h2>
		<?php endif; ?>
		<p class="large"><?php //echo get_the_excerpt(); ?></p>
		<?php the_content(); ?>
	</div>
	<?php endwhile; endif; ?>
	
	<?php
		global $wp_query, $wp_rewrite;
		$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
		
		$pagination = array(
			'base' => @add_query_arg('paged','%#%'),
			'format' => '',
			'prev_text' => '&lt;',
			'next_text' => '&gt;',
			'total' => $wp_query->max_num_pages,
			'current' => $current,
			'show_all' => true,
			'type' => 'plain'
		);

		if( $wp_rewrite->using_permalinks() )
			$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
		
		if( !empty($wp_query->query_vars['s']) )
			$pagination['add_args'] = array( 's' => get_query_var( 's' ) );
		
		$pagination_html = paginate_links( $pagination );
		if($pagination_html) {
			echo $pagination_html;
		} else { ?>
			<a href="<?php bloginfo("url"); ?>/news">&lt; Back</a>
		<?php }
	?>
</div>