<div id="search" class="grid6col left box darkgrey marginleft">
	<form action="<?php bloginfo('url'); ?>" method="get">
		<input id="field" name="s" type="text" placeholder="Search" />
		<button id="searchButton" type="submit">search</button>
	</form>
	<?php wp_nav_menu( array(
		'container'		 => 'false',
		'theme_location' => 'search_box_menu',
		'menu_id' => '',
		'menu_class' => ''
		)
	); ?>
</div>
