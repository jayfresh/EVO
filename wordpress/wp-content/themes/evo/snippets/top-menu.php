<?php wp_nav_menu( array(
	'container'		 => 'false',
	'theme_location' => 'main_menu',
	'menu_id' => 'nav',
	'menu_class' => 'left margintop',
	'walker' => new Multiple_UL_Walker
	)
); ?>