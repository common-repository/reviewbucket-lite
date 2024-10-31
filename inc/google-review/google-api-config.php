<?php 
 /**
  * 
  * @package    ReviewBucket - Business and google Place Review WordPress Plugin
  * @version    1.0
  * @author     WPBucket
  * @Websites: http://wpbucket.net
  *
  */
 

class ReviewBucket_Google_API {

	private $APIUrl;
	private $apikey;
	public $placeId;


	function __construct( array $args ) {

		$this->apikey = $args['apikey'];
		$this->placeId = $args['placeid'];

		$this->api_url();

		add_action( 'wp_ajax_update_google_review',array( $this, 'update_google_review' ) );
		add_action( 'wp_nopriv_ajax_update_google_review',array( $this, 'update_google_review' ) );
	}


	public function api_url() {

		$Url = 'https://maps.googleapis.com/maps/api/place/details/json';

		$peram =array(
			'placeid' 	=> $this->placeId,
			'fields'	=> 'name,rating,review,url,icon,formatted_address,formatted_phone_number,user_ratings_total',
			'key' 		=> $this->apikey
		);

		$APIUrl = add_query_arg(
			$peram,
			$Url 
		);

		$this->APIUrl = esc_url_raw( $APIUrl );

	}

	public function get_place_data() {

		$data = wp_remote_get( $this->APIUrl  );

		if( ! is_wp_error( $data ) ) {
		
			$data = json_decode( $data['body'], true );

			if( ! empty( $data['error_message'] ) ) {
				return $data['error_message'];
			} else {
				return $data['result'];
			}


		} else {
			return '<h3 class="text-center">'.esc_html__( 'API Connection Failed', 'reviewbucketlite' ).'</h3>';
		}

	}


	public function update_google_review() {


		$reviews = $this->get_new_reviews();


		$message = [];

		if( is_array( $reviews ) ) {

			if( !empty( $reviews['place_info'] ) ) {

				$placeJsonData = wp_json_encode( $reviews['place_info'] );

				$result = update_option( 'reviewbucketlite_place_info', $placeJsonData );

				if( ! is_wp_error( $result ) ) {
					$message['place_message'] =  esc_html__( 'Place information update successfully.', 'reviewbucketlite' );
				} else {
					$message['place_message'] =  esc_html__( 'Something is wrong, Place information Failed to update. Please try again.', 'reviewbucketlite' );
				}
			} else {
				$message['place_message'] =  esc_html__( 'Get empty place information data.', 'reviewbucketlite' );
			}

		
			if( !empty( $reviews['reviews'] ) && is_array( $reviews['reviews'] ) ) {

				$reviewStatus = false;

				foreach ( $reviews['reviews'] as $value ) {

					$args = array(
					  'post_type' => 'google_review',
					  'post_title'    => $value['author_name'],
					  'post_status'   => 'publish'
					);

					$postId = wp_insert_post( $args );

					if( ! is_wp_error( $postId ) ) {

						update_post_meta( $postId, 'author_name', $value['author_name']);
						update_post_meta( $postId, 'author_url', $value['author_url']);
						update_post_meta( $postId, 'profile_photo_url', $value['profile_photo_url']);
						update_post_meta( $postId, 'rating', $value['rating']);
						update_post_meta( $postId, 'relative_time_description', $value['relative_time_description']);
						update_post_meta( $postId, 'text', $value['text']);
						update_post_meta( $postId, 'time', $value['time']);
						
						$reviewStatus .= true;

					}

				}


				if( $reviewStatus ) {
					$message['review_message'] = esc_html__( 'Reviews upload successfull.', 'reviewbucketlite' );
				} else {
					$message['review_message'] = esc_html__( 'Something is wrong. Please try again.', 'reviewbucketlite' );
				}

			} else {
				$message['review_message'] = esc_html__( 'There has no new review found.', 'reviewbucketlite' );
			}


		} else {
			$message['review_message'] = $reviews;
		}


		echo wp_json_encode( $message );

		die();

	}

	public function get_new_reviews() {

		$getData = $this->get_place_data();

		if( is_array( $getData ) ) {


			$args = array(
				'post_type' => 'google_review',
				'posts_per_page' => '-1'
			);

			$posts = get_posts( $args );


			$reviewTime = array();

			if( !empty( $posts ) ) {

				foreach( $posts as $val ) {

					$reviewTime[] = get_post_meta( $val->ID, 'time', true );

				}
			}


			$newReviews = array();

			if( !empty( $getData['reviews'] ) ) {
				foreach( $getData['reviews'] as $value ) {

					if( !in_array( $value['time'], $reviewTime ) ) {
						$newReviews[] =  $value;
					}

				}
			}


			$data = array(

				'place_info' => array(

					'icon' => $getData['icon'],
					'name' => $getData['name'],
					'url' => $getData['url'],
					'formatted_address' => $getData['formatted_address'],
					'formatted_phone_number' => $getData['formatted_phone_number'],
					'rating' => $getData['rating'],
					'user_ratings_total' => $getData['user_ratings_total']
				),

				'reviews' => $newReviews
			);

			return $data;


		} else {
			return $getData;
		}

	}


}
