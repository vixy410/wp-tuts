<?php

/*
 * Plugin Name: Custom Post type
 * Plugin URI: http://cyber-kings.com
 * Description: A custom post by vikas
 * Author: Vikas
 * Author URI: http://facebook.com
 * Version: 1.0.1
 */


class Vk_Custom_Post_Type{
	public function __construct() {
		$this->register_post_type();
	}
	
	public function register_post_type(){
		
		$args = array(
			'labels' => array(
				'name' =>'Movies',
				'singular_name' =>'Movie',
				'add_new' =>'Add New Movie',
				'add_new_item' => 'Add new movie',
				'edit_item' => 'Edit Item',
				'new_item' =>'Add New item',
				'view_item' => 'View Movies',
				'search_items' => 'Search Movies',
				'not_found' => 'No movie found',
				'not_found_in_trash' => 'No movie found in trash'
			),
			'query_post' => 'movies',
			'rewrite' => array(
				'slug' => 'movies/'
			),
			'public' => true
		);
		register_post_type('vk_posts', $args);
	}
}

add_action('init',function(){
	new Vk_Custom_Post_Type;
});

