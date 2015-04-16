<?php 

//Load jQuery from CDN in footer
function my_init()   
{  
    if (!is_admin())   
    {  
        wp_deregister_script('jquery');  
  
        wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js', FALSE, '1.11.2', TRUE);  
  
        wp_enqueue_script('jquery');  
    }  
}  
add_action('init', 'my_init');  


function add_custom_types_to_tax( $query ) {
	if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {

		// Get all your post types
		$post_types = get_post_types();

		$query->set( 'post_type', $post_types );
			return $query;
	}
}
add_filter( 'pre_get_posts', 'add_custom_types_to_tax' );


//Remove excess p tags from when outputting content
remove_filter ('the_content',  'wpautop');
remove_filter ('comment_text', 'wpautop');


//If needed, shortcode for displaying page content [get_content id='page id' title= true to show title]
function get_post_page_content( $atts ) {
	extract( shortcode_atts( array(
		'id' => null,
		'title' => false,
			), $atts 
		) 
	);

	$the_query = new WP_Query( 'page_id='.$id );
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		if($title == true){
			the_title();
		}
			the_content();
		}
	wp_reset_postdata();

}
add_shortcode( 'get_content', 'get_post_page_content' );




?>