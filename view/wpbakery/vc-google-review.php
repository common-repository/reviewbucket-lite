<?php 
add_action( 'vc_before_init', 'reviewbucketlite_google_reviews' );
function reviewbucketlite_google_reviews() {

	// vc_map check
	if( function_exists( 'vc_map' ) ){
		vc_map( array(
		  "name" => esc_html__( "Google Reviews", "reviewbucketlite" ),
		  "base" => "vc_google_reviews",
		  "class" => "",
		  "icon" => REVIEWBUCKETLITE_DIR_URL."assets/reviewbucketlite-review-icon.png",
		  "category" => esc_html__( "Reviewbucket", "reviewbucketlite"),
		  "params" => array(
			array(
				"type" => "floatnumber",
				"heading" => esc_html__( "Max Reviews", "reviewbucketlite" ),
				"param_name" => "max_rows",
				"value" => '5', //Default value
				"description" => esc_html__( "Set how many reviews you want to show.", "reviewbucketlite" ),
				'group' => esc_html__( 'Review Settings', 'reviewbucketlite' ),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__( "Min Rating", "reviewbucketlite" ),
				"param_name" => "min_rating",
				"value" => '1', //Default value
				'group' => esc_html__( 'Review Settings', 'reviewbucketlite' ),
				'value' => array(
                    esc_html__( '1', 'reviewbucketlite' ) => '1',
                    esc_html__( '2', 'reviewbucketlite' ) => '2',
                    esc_html__( '3', 'reviewbucketlite' ) => '3',
                    esc_html__( '4', 'reviewbucketlite' ) => '4',
                    esc_html__( '5', 'reviewbucketlite' ) => '5',
                )
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__( "Place Info", "reviewbucketlite" ),
				"param_name" => "place_info",
				"value" => 'show', //Default value
				'group' => esc_html__( 'Review Settings', 'reviewbucketlite' ),
				'value' => array(
                    esc_html__( 'Show', 'reviewbucketlite' ) => 'show',
                    esc_html__( 'Hide', 'reviewbucketlite' ) => 'hide',
                )
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__( "Style", "reviewbucketlite" ),
				"param_name" => "style",
				"value" => '1', //Default value
				"description" => esc_html__( "Select review style", "reviewbucketlite" ),
				"group" => esc_html__( "Review Settings", 'reviewbucketlite' ),
				"value" => array(
                    esc_html__( 'Style 1 ( Slider )', 'reviewbucketlite' )  => '1',
                    esc_html__( 'Style 2 ( Slider )', 'reviewbucketlite' )  => '2',
                    esc_html__( 'Style 3 (Grid)', 'reviewbucketlite' )  => '3',
                    esc_html__( 'Style 4 ( Slider )', 'reviewbucketlite' )  => '4',
                    esc_html__( 'Style 5 (Grid)', 'reviewbucketlite' )  => '5',
                    esc_html__( 'Style 6 (Grid)', 'reviewbucketlite' )  => '6',
                    esc_html__( 'Style 7 (Grid)', 'reviewbucketlite' )  => '7',                
                    esc_html__( 'Style 8 (Grid)', 'reviewbucketlite' )  => '8'                
                )
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__( "Column", "reviewbucketlite" ),
				"param_name" => "column",
				"value" => '4', //Default value
				"description" => esc_html__( "Select Column", "reviewbucketlite" ),
				"group" => esc_html__( "Review Settings", 'reviewbucketlite' ),
				"value" => array(
                    esc_html__( 'Select Column', 'reviewbucketlite' )  => '',
                    esc_html__( '1 Column', 'reviewbucketlite' )  => '12',
                    esc_html__( '2 Column', 'reviewbucketlite' )  => '6',
                    esc_html__( '3 Column', 'reviewbucketlite' )  => '4',
                    esc_html__( '4 Column', 'reviewbucketlite' )  => '3',
                ),
                'dependency'=> array(
		                'element'=>'style',
		                'value'=>array( '3','5','6','7','8' ),
            	)
			),
			array(
				"type" => "floatnumber",
				"heading" => esc_html__( "Section Padding Top", "reviewbucketlite" ),
				"param_name" => "padding_top",
				"value" => '50', //Default Red color
				"description" => esc_html__( "Set section top padding", "reviewbucketlite" ),
				'group' => esc_html__( 'Review Settings', 'reviewbucketlite' ),
			),
			array(
				"type" => "floatnumber",
				"heading" => esc_html__( "Section Padding Bottom", "reviewbucketlite" ),
				"param_name" => "padding_bottom",
				"value" => '50', //Default Red color
				"description" => esc_html__( "Set section bottom padding", "reviewbucketlite" ),
				'group' => esc_html__( 'Review Settings', 'reviewbucketlite' ),
			),
			array(
				"type" => "colorpicker",
				"heading" => esc_html__( "Background Color", "reviewbucketlite" ),
				"param_name" => "bg_color",
				"value" => '#fff', //Default Red color
				"description" => esc_html__( "Set section background color", "reviewbucketlite" ),
				'group' => esc_html__( 'Review Settings', 'reviewbucketlite' ),
			),

		  )
		) );
	} // end vc_map Check


}