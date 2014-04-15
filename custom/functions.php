<?php 

	function theme_setup(){
	require_once( get_template_directory() . '/inc/assets/dev/assets.php' );
	require_once( get_template_directory() . '/inc/nav-menu-walker.php' );
	require_once( get_template_directory() . '/inc/widgets.php' );
	require_once( get_template_directory() . '/inc/gen_functions.php' );
	require_once( get_template_directory() . '/inc/menu.php' );

	}	
add_action( 'after_setup_theme', 'theme_setup' );

// Create the Custom Excerpts callback
function ckwp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}
// Remove the <div> surrounding the dynamic navigation to cleanup markup
    function my_wp_nav_menu_args($args = '')
    {
        $args['container'] = false;
        return $args;
    }
    add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
    // Remove Injected classes, ID's and Page ID's from Navigation <li> items
    function my_css_attributes_filter($var)
    {
        return is_array($var) ? array() : '';
    }
    // Remove invalid rel attribute values in the categorylist
    function remove_category_rel_from_category_list($thelist)
    {
        return str_replace('rel="category tag"', 'rel="tag"', $thelist);
    }
    add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute

    // Add page slug to body class, love this - Credit: Starkers Wordpress Theme
    function add_slug_to_body_class($classes)
    {
        global $post;
        if (is_home()) {
            $key = array_search('blog', $classes);
            if ($key > -1) {
                unset($classes[$key]);
            }
        } elseif (is_page()) {
            $classes[] = sanitize_html_class($post->post_name);
        } elseif (is_singular()) {
            $classes[] = sanitize_html_class($post->post_name);
        }

        return $classes;
    }

    add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)

    // Remove wp_head() injected Recent Comment styles
    function my_remove_recent_comments_style()
    {
        global $wp_widget_factory;
        remove_action('wp_head', array(
            $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
            'recent_comments_style'
        ));
    }
    add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()

    // Remove Admin bar
    function remove_admin_bar()
    {
        return false;
    }
    add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar

    // Remove 'text/css' from our enqueued stylesheet
    function ck_style_remove($tag)
    {
        return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
    }
    add_filter('style_loader_tag', 'ck_style_remove'); // Remove 'text/css' from enqueued stylesheet

    // Threaded Comments
    function enable_threaded_comments()
    {
        if (!is_admin()) {
            if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
                wp_enqueue_script('comment-reply');
            }
        }
    }
    add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments

    


 ?>
