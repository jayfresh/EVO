<?php
// generate breadcrumbs based on any parent pages
$parent_pages = array($post);
$page_target = $post;
while($page_target->post_parent) {
	$page_target = get_post($page_target->post_parent);
	array_unshift($parent_pages,$page_target);
} ?>
<ul class="breadcrumb grid18col right">
<?php foreach($parent_pages as $post) : ?>
	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
<?php endforeach; ?>
</ul>
