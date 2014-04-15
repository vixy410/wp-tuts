<?php 
   function ck_head(){
 ?>

 <!DOCTYPE html>
<html lang="<?php language_attributes( $doctype ); ?>">
	<head>

		<title>	
			<?php if (function_exists('is_tag') && is_tag()) {
			single_tag_title('Tag Archive for &quot;'); echo '&quot; - ';
			} elseif (is_archive()) {
			wp_title(''); echo ' Archive - ';
			} elseif (is_search()) {
			echo 'Search for &quot;'.wp_specialchars($s).'&quot; - ';
			} elseif (!(is_404()) && (is_single()) || (is_page())) {
			wp_title(''); echo ' - ';
			} elseif (is_404()) {
			echo 'Not Found - ';
			}
			if (is_home()) {
			bloginfo('name'); echo ' - '; bloginfo('description');
			} else {
			bloginfo('name');
			}
			if ($paged > 1) {
			echo ' - page '. $paged;
			} ?>
		</title>

		<meta charset="<?php bloginfo( 'charset'); ?>">
		<meta name=description content="">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap CSS -->
		
		<?php wp_head(); ?>
	</head>

 <?php } ?>

 <?php 
 	// dynamic background from admin section
		$defaults = array(
			'default-color'          => '',
			'default-image'          => '',
			'default-repeat'         => '',
			'default-position-x'     => '',
			'wp-head-callback'       => '_custom_background_cb',
			'admin-head-callback'    => '',
			'admin-preview-callback' => ''
		);
		add_theme_support( 'custom-background', $defaults );


  ?>

  <?php 
  	// Hide php version
  	function killVersion() { return ''; }
	add_filter('the_generator','killVersion');
	



	remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
	remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
	remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
	remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
	remove_action('wp_head', 'index_rel_link'); // Index link
	remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
	remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
	remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
	remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
	remove_action('wp_head', 'start_post_rel_link', 10, 0);
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
	remove_action('wp_head', 'rel_canonical');
	remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
	remove_action('wp_head', 'feed_links_extra', 3);

   ?>