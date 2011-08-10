<div class="sidebarWrap grid6col dottop padtop">
	<div class="sidebar push4">
		<h2>News Archive</h2>
		<?php if ( is_active_sidebar( 'news-sidebar' ) ) : ?>
			<?php dynamic_sidebar( 'news-sidebar' ); ?>
		<?php endif; ?>
	</div>
</div>