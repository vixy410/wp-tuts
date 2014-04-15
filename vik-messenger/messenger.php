<?php

//error_reporting(E_ALL);

/*
 * Plugin Name: Vik messernger
 * Plugin URI: www.cyber-kings.com
 * Description: Widget Tutorial
 * Author: Vikas
 * Author URI: www.cyber-kings.com
 * Version: 1.0
 */

class Vk_Messenger extends WP_Widget{
	function __construct() {
		$params = array(
			'description' => 'A test Messenger',
			'name' => 'Messenger'
			);
			parent::__construct( 'Vk_Messenger', '', $params );
		}
		
		public function form( $instance ){
			extract( $instance );
			?>
<p>
	<label for="<?php echo $this->get_field_id( $title) ?>">Title</label>
	<input
		class="widefat"
		id="<?php echo $this->get_field_id( $title) ?>"
		name="<?php echo $this->get_field_name(  $title ); ?>"
		value="<?php if(isset($title)) echo esc_attr($title); ?>"
		type="text"
		>
</p>

		<?php 
		}
		
		public function widget( $args, $instance ){
			print_r($args);
		}
		
		
	}
	
	add_action( 'widgets_init', function(){
		register_widget( 'Vk_Messenger' );
	});
