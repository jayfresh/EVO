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
	<form action="<?php bloginfo('url'); ?>" method="get">
		<input id="inline_s" type="search" name="s" value="<?php echo $_REQUEST['s']; ?>"/>
	</form>
	<p>Searched for: <?php echo $_REQUEST['s']; ?></p>
	<?php $start_count = 1;
	if($wp_query->is_paged) {
		$start_count += $wp_query->post_count * ($wp_query->query['paged']-1);
	} ?>
	<p>Results <?php echo $start_count; ?> to <?php echo $start_count+$wp_query->post_count; ?> of <?php echo $wp_query->found_posts; ?></p>
	<?php } ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="grid3col sharing right">
		<a id="facebook" href="#">Share on Facebook</a>
		<a id="twitter" href="#">Share on Twitter</a>
		<a id="email" href="#">Share by email</a>
		<a id="print" href="#">Print this page</a>
	</div>
	<div class="grid13col newsArticle">
		<p class="push3 date"><?php echo get_the_date('d.m.y'); ?></p>
		<?php if(!is_singular()) : ?>
		<h2 class="pull2"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<?php else : ?>
		<h2><?php the_title(); ?></h2>
		<?php endif; ?>
		<!--<p class="large"><?php //echo get_the_excerpt(); ?></p>-->
		<?php the_content(); ?>
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