<?php
// HTML5 Blank navigation
function ck_nav()
{
	$defaults = array( 
				'theme_location'	=>	'header-menu',
				'menu_class'		=>	'nav navbar-nav',
				'depth'				=>	3,
				'fallback_cb'		=>	false,
				'walker'			=>	new The_Bootstrap_Nav_Walker);

   wp_nav_menu( $defaults );
}

// Register HTML5 Blank Navigation
function register_ck_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'ck'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'ck'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'ck') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}
add_action('init', 'register_ck_menu'); // Add HTML5 Blank Menu
?>
