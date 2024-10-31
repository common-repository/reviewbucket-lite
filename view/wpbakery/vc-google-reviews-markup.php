<?php 

function reviewbucketlite_google_reviews_component( $atts, $content= null ) {
	$settings = shortcode_atts( array(
		'place_id' 	 	 => '',
		'max_rows' 	 	 => '5',
		'min_rating' 	 => '1',
		'place_info' 	 => 'show',
		'column' 	 	 => '3',
		'style' 	     => '1',
		'padding_top'    => '50',
		'padding_bottom' => '50',
		'bg_color'       => '#fff'
	), $atts );
	
		
	ob_start();

    

    $data = reviewbucketlite_get_google_reviews();


    if( !empty( $data ) ):

    $args = array(
        'data' => $data, 
        'atts' => $settings
    );

    reviewbucketlite_google_review_template_init( $args );

    endif;



	$html = ob_get_clean();
	return $html;
  
}
