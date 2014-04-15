<?php

/*
 * Plugin Name: Twitter Shortcode
 * Plugin URI: www.cyber-kings.com
 * Description: A twitter shortcode by vikas
 * Author: Vikas
 * Author URI: www.cyber-kings.com
 * Version: 1.0
 */

/*add_shortcode('twitter', function( $atts, $content ){
	if( !isset($atts['username']) )
		$atts['username'] = 'lovely';
	if( empty($content) )
		$content = 'Follow Me On';
	
	return '<a href="http://twitter.com/'.$atts['username'].'">'.$content.'</a>';
});
 * */
 
add_shortcode('twitter', function( $atts, $content ){
	$atts = shortcode_atts(array(
		'username' => 'lovely',
		'content' => !empty($content)?$content:'Follow Us on'
	), $atts);
	
 extract( $atts );
 return "<a href='http://twitter.com/$username'>$content</a>";
});
