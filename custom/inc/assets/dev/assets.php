<?php
// Load HTML5 Blank scripts (header.php)
function ck_header_scripts()
{
    if (!is_admin()) {
		
		wp_register_script('jquery', get_template_directory_uri() . '/js/jquery.js', array(), '1.11.0'); // Custom scripts
        wp_enqueue_script('jquery'); // Enqueue it!
		
		
		wp_register_script('bt', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.1.1', true); // Custom scripts
        wp_enqueue_script('bt'); // Enqueue it!
    
	
	    //wp_register_script('stick', get_template_directory_uri() . '/js/stickUp.min.js', array(), '1.0.0'); // Custom scripts
        //wp_enqueue_script('stick'); // Enqueue it!
    	
		/*wp_deregister_script('jquery'); // Deregister WordPress jQuery
    	wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js', array(), '1.9.1'); // Google CDN jQuery
    	wp_enqueue_script('jquery'); // Enqueue it!*/
    	
    	/*wp_register_script('conditionizr', 'http://cdnjs.cloudflare.com/ajax/libs/conditionizr.js/2.2.0/conditionizr.min.js', array(), '2.2.0'); // Conditionizr
        wp_enqueue_script('conditionizr'); // Enqueue it!
        
        wp_register_script('modernizr', 'http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js', array(), '2.6.2'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!*/
        
        wp_register_script('ckscripts', get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0', true); // Custom scripts
        wp_enqueue_script('ckscripts'); // Enqueue it!
    }
}
add_action('init', 'ck_header_scripts'); // Add Custom Scripts to wp_head

// Load HTML5 Blank styles
function ck_styles()
{
    wp_register_style('ck', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('ck'); // Enqueue it!

	wp_register_style('btcsst', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.1.1', 'all');
    wp_enqueue_style('btcsst'); // Enqueue it!
	//wp_register_style('btcss', get_template_directory_uri() . '/css/bootstrap-theme.min.css', array(), '1.0', 'all');
    //wp_enqueue_style('btcss'); // Enqueue it!
	
	wp_register_style('custom', get_template_directory_uri() . '/css/custom.css', array(), '1.0', 'all');
    wp_enqueue_style('custom'); // Enqueue it!
	
	
	
   /* wp_register_style('normalize', get_template_directory_uri() . '/normalize.css', array(), '1.0', 'all');
    wp_enqueue_style('normalize'); // Enqueue it*/
    
  
}
add_action('wp_enqueue_scripts', 'ck_styles'); // Add Theme Stylesheet
?>