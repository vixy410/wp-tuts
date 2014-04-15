<?php

/* 
 * Plugin Name: Vik Custom
 * Plugin URI : www.openworld.com
 * Description: Not any
 * Author: Vikas
 * Author  URI: www.lol.com
 * Version: 1.0
 * Tags: Happiness, New
 */

add_filter('the_content',function($content){
	//get id of the post
	$id = get_the_ID();
	if( !is_singular('post') ){
		return $content;
	}
	$terms = get_the_category( $id );
	//$terms = get_the_terms($id, 'product_cat');
	//print_r($terms);
	$cats = array();
	
	//get an array of id  category of that post
	foreach ( $terms as $term ){
		$cats[] = $term->cat_ID;
		
	}  
	
	//return $content .='<h2>You also like </h2>';
	
	//loop
	$loop = new WP_Query(array(
			'posts_per_page' =>3,
			'category__in' => $cats,
			'orderby' => 'rand',
			'post__not_in'=>array($id)
			)
			
			);
	
	if( $loop->have_posts() ){
		//append to content
		$content .= '<h2>You also might like...</h2><ul>';
		
		while ($loop->have_posts()){
			$loop->the_post();
			$content .= '<li> 
							<a href = " '.get_permalink().' ">'.  get_the_title().'</a>
					  </li>';
		}
		$content .= '</ul>';
		wp_reset_query();
		
	}
	return $content;
});

