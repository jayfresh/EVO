<div id="search" class="grid6col left box darkgrey marginleft">
	<form action="<?php bloginfo('url'); ?>" method="get">
		<input id="field" name="s" type="text" placeholder="Search" />
		<input id="searchButton" type="submit" value="search" /> 
	</form>
	<?php wp_nav_menu( array(
		'container'		 => 'false',
		'theme_location' => 'search_box_menu',
		'menu_id' => '',
		'menu_class' => ''
		)
	); ?>
</div>
