<div class="sidebarWrap grid6col dottop padtop">
	<div class="sidebar push4">
		<h2 id="newsArchive">News Archive</h2>
		<div id="twitterWidget" class="box grey border">
			<?php if ( is_active_sidebar( 'news-sidebar' ) ) : ?>
				<?php dynamic_sidebar( 'news-sidebar' ); ?>
			<?php endif; ?>
		</div>
	</div>
</div>