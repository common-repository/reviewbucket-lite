<?php 
 /**
  * 
  * @package    ReviewBucket - Business and google Place Review WordPress Plugin
  * @version    1.0
  * @author     WPBucket
  * @Websites: http://wpbucket.net
  *
  */
  
	// Blocking direct access
	if( ! defined( 'ABSPATH' ) ) {
		die ( REVIEWBUCKETLITE_ALERT_MSG );
	}



	// Metabox fields object  Blood Request
	function metabox_field_obj(){
		
		return $obj = new Main_MetaBox();
		
	}
	
	// Prefix
	$prefix = 'reviewbucketlite';
	

	/**
	 *  Meta field for custom review post type
	 * 
	 */

	// Init meta object
	$obj = metabox_field_obj();
	
	// Meta Box Create
	$obj->SetMetaBox = array(
		'uniq_id' 	=> 'reviewbucketlite_reviewbucketlite_meta_field',
		'title' 	=> esc_html__( 'Review Settings', 'reviewbucketlite'),
		'type' 		=> array( 'reviewbucketlite' ),
	);
	
	// Meta Fields
	$obj->SetMetaFields = array( 

		array(
			'type' 	=> 'text',
			'id' 	=> $prefix.'reviewer_name',
			'label' => esc_html__( 'Reviewer Name', 'reviewbucketlite' ),
		),
		array(
			'type' 	=> 'date',
			'id' 	=> $prefix.'reviewer_date',
			'label' => esc_html__( 'Reviewe Date', 'reviewbucketlite' ),
		),
		array(
			'type' 	=> 'text',
			'id' 	=> $prefix.'reviewe_url',
			'label' => esc_html__( 'Reviewe Url', 'reviewbucketlite' ),
		),
		array(
			'type' 	=> 'media',
			'id' 	=> $prefix.'reviewer_pic',
			'label' => esc_html__( 'Reviewer Image', 'reviewbucketlite' ),
		),
		array(
			'type' 	=> 'select',
			'id' 	=> $prefix.'review_rating',
			'label' => esc_html__( 'Rating', 'reviewbucketlite' ),
			'options' => array(
				'1' 	=> '1',
				'2' 	=> '2',
				'3' 	=> '3',
				'4' 	=> '4',
				'5' 	=> '5'
			)
		),
		array(
			'type' 	=> 'select',
			'id' 	=> $prefix.'_platform',
			'label' => esc_html__( 'Platform', 'reviewbucketlite' ),
			'options' => array(
				'google' 	=> 'Google',
				'facebook' 	=> 'Facebook',
				'yelp'		=> 'Yelp',
				'trustpilot' => 'Trustpilot',
				'tripadvisor' => 'Trip Advisor',
				'other'		=> 'Other'
			)
		),
		array(
			'type' 	=> 'text',
			'id' 	=> $prefix.'platform_name',
			'label' => esc_html__( 'Platform Name', 'reviewbucketlite' ),
			'class' => 'other-platform-name'
		),
		array(
			'type' 	=> 'media',
			'id' 	=> $prefix.'platform_pic',
			'label' => esc_html__( 'Platform Image', 'reviewbucketlite' ),
			'class' => 'other-platform-pic'
		),
		array(
			'type' 	=> 'textarea',
			'id' 	=> $prefix.'content',
			'label' => esc_html__( 'Review Content', 'reviewbucketlite' ),
		),

	);
	

	/**
	 * Meta field for review badges post type 
	 * 
	 */

	// Init meta object
	$obj = metabox_field_obj();

	// Meta Box Create
	$obj->SetMetaBox = array(
		'uniq_id' 	=> 'reviewbucketlite_badges_meta_field',
		'title' 	=> esc_html__( 'Review Badges Settings', 'reviewbucketlite' ),
		'type' 		=> array( 'reviewbadges' ),
	);

	// Meta Fields
	$obj->SetMetaFields = array( 
		array(
			'type' 	=> 'text',
			'id' 	=> $prefix.'plarform_name',
			'label' => esc_html__( 'Platform Name', 'reviewbucketlite' ),
		),
		array(
			'type' 	=> 'select',
			'id' 	=> $prefix.'badges_platform',
			'label' => esc_html__( 'Select Platform', 'reviewbucketlite' ),
			'options' => array(
				'google' 	=> 'Google',
				'facebook' 	=> 'Facebook',
				'yelp'		=> 'Yelp',
				'trustpilot' => 'Trustpilot',
				'tripadvisor' => 'Trip Advisor',
				'other' => 'Other'
			)
		),
		array(
			'type' 	=> 'media',
			'id' 	=> $prefix.'platform_pic',
			'label' => esc_html__( 'Platform Image', 'reviewbucketlite' ),
		),
		array(
			'type' 	=> 'text',
			'id' 	=> $prefix.'ratings',
			'label' => esc_html__( 'Ratings', 'reviewbucketlite' ),
		),
		array(
			'type' 	=> 'number',
			'id' 	=> $prefix.'total_reviews',
			'label' => esc_html__( 'Total Reviews', 'reviewbucketlite' ),
		),
		array(
			'type' 	=> 'text',
			'id' 	=> $prefix.'reviews_url',
			'label' => esc_html__( 'Reviews Url', 'reviewbucketlite' ),
		),

	);


	/**
	 * Meta field for emoji reaction review post type 
	 * 
	 */

	// Init meta object
	$obj = metabox_field_obj();

	// Meta Box Create
	$obj->SetMetaBox = array(
		'uniq_id' 	=> 'reviewbucketlite_emoji_reaction_meta_field',
		'title' 	=> esc_html__( 'Emoji Reaction Settings', 'reviewbucketlite' ),
		'type' 		=> array( 'emoji_reaction' ),
	);

	// Meta Fields
	$obj->SetMetaFields = array(

		array(
			'type' 	=> 'info',
			'id' 	=> $prefix.'_emoji_info',
			'info_type' => 'danger',
			'label' => esc_html__( 'Use This Shortcode', 'reviewbucketlite' )
		),
		array(
			'type' 	=> 'select',
			'id' 	=> $prefix.'_emoji_style',
			'label' => esc_html__( 'Select Emoji Reaction Style', 'reviewbucketlite' ),
			'options' => array(
				'style1' 	=> esc_html__( 'Style 1 ( Emoji )', 'reviewbucketlite' ),
				'style2' 	=> esc_html__( 'Style 2 ( Emoji pro feature )', 'reviewbucketlite' ),
				'style3' 	=> esc_html__( 'Style 3 ( Emoji pro feature )', 'reviewbucketlite' ),
				'style4' 	=> esc_html__( 'Style 4 ( Like/Unlike pro feature )', 'reviewbucketlite' )
			)
		),
		array(
			'type' 	=> 'text',
			'id' 	=> $prefix.'_title',
			'class' => 'style-3-field',
			'label' => esc_html__( 'Title', 'reviewbucketlite' ),
		),
		array(
			'type' 	=> 'text',
			'id' 	=> $prefix.'_desc',
			'class' => 'style-3-field',
			'label' => esc_html__( 'Description', 'reviewbucketlite' ),
		),
		array(
			'type' 	=> 'color',
			'id' 	=> $prefix.'_bgcolor',
			'label' => esc_html__( 'Background Color', 'reviewbucketlite' ),
		),
		array(
			'type' 	=> 'rangeslider',
			'id' 	=> $prefix.'_margin_top',
			'label' => esc_html__( 'Margin Top', 'reviewbucketlite' ),
		),
		array(
			'type' 	=> 'rangeslider',
			'id' 	=> $prefix.'_margin_bottom',
			'label' => esc_html__( 'Margin Bottom', 'reviewbucketlite' ),
		),

	);
