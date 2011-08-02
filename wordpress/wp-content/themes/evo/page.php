<?php
/* for content pages */
get_header();
get_template_part('snippets/header');
get_template_part('snippets/left-hand-menu');
get_template_part('snippets/breadcrumbs');
?>
<ol>
	<li>a thing</li>
	<li>another thing</li>
</ol>
<?php
get_template_part('loop');
get_template_part('snippets/footer');
get_footer();
?>