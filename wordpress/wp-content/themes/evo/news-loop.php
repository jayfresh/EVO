<div class="article">
	<?php
	global $wp_query;
	if(is_home()) {
		$this_page = get_post(get_option('page_for_posts'));
	} else if(is_search()) {
		$this_page = get_post_by_slug( 'search', 'page' );
	} ?>
	<h1><?php echo get_the_title($this_page); ?></h1>
	<?php if(is_search()) { ?>
	<?php get_search_form(); ?>
	<div id="searchMeta" class="grid13col">
		<p id="searchedFor" class="left">Searched for: <?php echo $_REQUEST['s']; ?></p>
		<?php $start_count = 1;
		if($wp_query->is_paged) {
			$start_count += $wp_query->post_count * ($wp_query->query['paged']-1);
		} ?>
		<p id="results" class="right">Results <span class="bold"><?php echo $start_count; ?></span> to <span class="bold"><?php echo $start_count+$wp_query->post_count; ?></span> of <span class="bold"><?php echo $wp_query->found_posts; ?></span></p>
	</div>
	<?php } ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="grid3col sharing right">
		<?php addThis(get_permalink(),get_the_title()); ?>
	</div>
	<div class="grid13col newsArticle">
		<p class="push3 date"><?php echo get_the_date('d.m.y'); ?></p>
		<?php if(!is_singular()) : ?>
		<h2 class="pull2"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<?php else : ?>
		<h2><?php the_title(); ?></h2>
		<?php endif; ?>
		<!--<p class="large"><?php //echo get_the_excerpt(); ?></p>-->
		<?php the_excerpt(); ?>
		<a href="<?php the_permalink(); ?>"><?php the_permalink(); ?></a>
		
		
	</div>
	<?php endwhile; endif; ?>
	
	<?php
		global $wp_rewrite;
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
		} elseif(!is_search()) { ?>
			<div class="pagination">
				<a href="<?php bloginfo("url"); ?>/news">&lt; Back</a>
			</div>
		<?php }
	?>
</div>