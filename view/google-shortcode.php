<?php 
 /**
  * 
  * @package    ReviewBucket - Business and google Place Review WordPress Plugin
  * @version    1.0
  * @author     WPBucket
  * @Websites: http://wpbucket.net
  *
  */

add_shortcode( 'reviewbucketlite_google_place' , 'reviewbucketlite_google_place_shortcode' );
function reviewbucketlite_google_place_shortcode( $atts ) {

		$atts = shortcode_atts( array(
			'style' 	 => '1',
			'place_id' 	 => '',
			'place_info' => 'show',
			'max_rows' 	 => 5,
			'min_rating' => '1',
			'column' => '3',
			'padding_top' => '50',
			'padding_bottom' => '50',
			'bg_color' 	  => '#fff',
		), $atts );

	ob_start();


	$data = reviewbucketlite_get_google_reviews();


	/****************/

	$args = array(
		'data' => $data , 
		'atts' => $atts
	);


	reviewbucketlite_google_review_template_init( $args );


return ob_get_clean();


}