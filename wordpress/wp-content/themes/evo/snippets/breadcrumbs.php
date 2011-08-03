<?php
// generate breadcrumbs based on any parent pages, starting with the home page
$front_page_id = get_option('page_on_front');
$front_page = get_post($front_page_id);
$parent_pages = array();
if(is_home()) {
	echo "is home";
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