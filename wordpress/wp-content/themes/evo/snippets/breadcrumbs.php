<?php
// generate breadcrumbs based on any parent pages, starting with the home page
$front_page = get_post(get_option('page_on_front'));
$news_page = get_post(get_option('page_for_posts'));
$parent_pages = array();
if(is_home()) {
	$parent_pages = array($news_page);
} else if(is_search()) {
	$search_page = get_post_by_slug( 'search', 'page' );
	$parent_pages = array($search_page);
} else if(get_post_type($post)=='post') {
	$parent_pages = array($news_page,$post);
} else {
	$parent_pages[] = $post;
	$page_target = $post;
	while($page_target->post_parent) {
		$page_target = get_post($page_target->post_parent);
		array_unshift($parent_pages,$page_target);
	}
}
array_unshift($parent_pages,$front_page) ?>
<div class="grid18col right">
	<ul class="breadcrumb">
	<?php foreach($parent_pages as $post) : ?>
	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	<?php endforeach; ?>
	</ul>
</div>