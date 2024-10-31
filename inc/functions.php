<?php
 /**
  * 
  * @package    ReviewBucket - Business and google Place Review WordPress Plugin
  * @version    1.0
  * @author     WPBucket
  * @Websites: http://wpbucket.net
  *
  */
  if( ! defined( 'ABSPATH' ) ) {
    die( REVIEWBUCKETLITE_ALERT_MSG );
  }


add_action( 'init', 'reviewbucketlite_google_api' );
function reviewbucketlite_google_api() {

  $option = get_option( 'reviewbucketlite_options' );

	$args = array(
		'apikey'  => $option['gookey'] ,
		'placeid' => $option['gplaceid']
	);

	$obj = new ReviewBucket_Google_API( $args );

	return $obj->get_place_data();

}

/**
 * Custom Post type  
 */

function reviewbucketlite_review_posttype() {

  // Post type for google review
    register_post_type( 'google_review',
        array(
            'labels' => array(
            'name' => esc_html__( 'Google Review', 'reviewbucketlite' ),
            'singular_name' => esc_html__( 'Google Review', 'reviewbucketlite' )
            ),
            'public' => true,
            'has_archive' => true,
            'show_in_menu' => false,
            'rewrite' => array( 'slug' => 'google-review' ),
            'supports' => array('title')
        )
    );

  // Post type for emoji reaction review
    register_post_type( 'emoji_reaction',
        array(
            'labels' => array(
            'name' => esc_html__( 'Emoji Reaction', 'reviewbucketlite' ),
            'singular_name' => esc_html__( 'Emoji Reaction', 'reviewbucketlite' )
            ),
            'public' => true,
            'has_archive' => true,
            'show_in_menu' => false,
            'rewrite' => array( 'slug' => 'emoji-reaction' ),
            'supports' => array('title')
        )
    );

}
add_action( 'after_setup_theme', 'reviewbucketlite_review_posttype' );


/**
 * Get google reviews
 *
 *
 */
function reviewbucketlite_get_google_reviews() {

  $args = array(
    'post_type' => 'google_review',
    'posts_per_page' => '-1'
  );

  $posts = get_posts( $args );

  $data = array();

  foreach( $posts  as $value ) {

    $data[] = array(
      'author_name' => get_post_meta( $value->ID, 'author_name', true ),
      'author_url' => get_post_meta( $value->ID, 'author_url', true ),
      'profile_photo_url' => get_post_meta( $value->ID, 'profile_photo_url', true ),
      'rating' =>  get_post_meta( $value->ID, 'rating', true ),
      'relative_time_description' => get_post_meta( $value->ID, 'relative_time_description', true ),
      'text' => get_post_meta( $value->ID, 'text', true ),
      'time' => get_post_meta( $value->ID, 'time', true )
    );

  }

  return $data;

}

/**
 * Rating helper function
 *
 *
 */

function reviewbucketlite_star_review( $rating ) {

    $j = 0;
    for( $i = 0; $i <= 4; $i++ ) {
      $j++;

      if( $rating  >= $j   || $rating  == '5'   ) {
         echo '<i class="fas fa-star"></i>';
      }elseif( $rating < $j && $rating  > $i )
      {
         echo '<i class="fas fa-star-half-alt"></i>';                     

      } else {
         echo '<i class="far fa-star"></i>';
      }
    }

}

/**
 * Google Place info
 *
 *
 */

function reviewbucketlite_place_info() {
   
  $data = get_option( 'reviewbucketlite_place_info' );

  $data = json_decode( $data, true );

  if( is_array( $data ) && !empty( $data ) ):
  ?>
  <div class="reviewbucketlite-col-sm-12 text-center">
    <div class="place-info p-20px m-50px-b">
        <?php 
        if( !empty( $data['icon'] ) ):
        ?>
        <img src="<?php echo esc_url( $data['icon'] ); ?>" alt="<?php echo esc_attr( $data['name'] ); ?>" />
        <?php
        endif; 
        //
        if( !empty( $data['name'] ) ):
        ?>
       <h4><a href="<?php echo esc_url( $data['url'] ); ?>" target="_blank"><?php echo esc_html( $data['name'] ); ?></a></h4>
       <?php
        endif;
       //
       if( !empty( $data['formatted_address'] ) ):
       ?>
       <p><?php echo esc_html__( 'Address: ', 'reviewbucketlite' ).esc_html( $data['formatted_address'] ); ?></p>
       <?php 
        endif;
        //
        if( !empty( $data['formatted_phone_number'] ) ):
       ?>
       <p><?php echo esc_html__( 'Phone Number: ', 'reviewbucketlite' ).esc_html( $data['formatted_phone_number'] ); ?></p>
       <?php 
        endif;

        //
        if( ! empty( $data['rating'] ) ) {

          echo '<div class="color-google">';
            echo '<strong>'.$data['rating'].'</strong> ';
            reviewbucketlite_star_review( $data['rating'] );
          echo '</div>';
        }

        //
        if( !empty( $data['user_ratings_total'] ) ):
       ?>
       <p><?php echo sprintf( esc_html__( 'Based on %s reviews', 'reviewbucketlite' ), $data['user_ratings_total'] );  ?></p>

       <?php
        endif;          
       ?>
      <div class="powered-by color-google">
        <p><strong><?php esc_html_e( 'Powered by google.', 'reviewbucketlite' ); ?></strong></p>
      </div>

    </div>
  </div>
  <?php
    endif;
}

/**
 * Widget Google Place info
 *
 *
 */

function reviewbucketlite_widget_google_place_info( ) {

  $data = get_option( 'reviewbucketlite_place_info' );

  $data = json_decode( $data, true );

  ?>
  <div class="widget-place-info text-center single-wreview-item p-15px">
      <?php 
      if( !empty( $data['icon'] ) ):
      ?>
      <img src="<?php echo esc_url( $data['icon'] ); ?>" alt="<?php echo esc_attr( $data['name'] ); ?>" />
      <?php
      endif;
      //
      if( !empty( $data['name'] ) ):
      ?>
     <h4><a href="<?php echo esc_url( $data['url'] ); ?>" target="_blank"><?php echo esc_html( $data['name'] ); ?></a></h4>
     <?php
      endif;
     //
     if( !empty( $data['formatted_address'] ) ):
     ?>
     <p><?php echo esc_html__( 'Address: ', 'reviewbucketlite' ).esc_html( $data['formatted_address'] ); ?></p>
     <?php 
      endif;
      //
      if( !empty( $data['formatted_phone_number'] ) ):
     ?>
     <p><?php echo esc_html__( 'Phone Number: ', 'reviewbucketlite' ).esc_html( $data['formatted_phone_number'] ); ?></p>
     <?php 
      endif;
     ?>
     
     <?php
     //
     if( ! empty( $data['rating'] ) ) {
        echo '<div class="widget-rating color-google">';
          echo '<strong>'.$data['rating'].'</strong> ';
          reviewbucketlite_star_review( $data['rating'] );
        echo '</div>';
     }
       
      //
      if( !empty( $data['user_ratings_total'] ) ):             
     ?>
     <p><?php echo sprintf( esc_html__( 'Based on %s reviews', 'reviewbucketlite' ), $data['user_ratings_total'] );  ?></p>
      <?php 
      endif;
      ?>
  </div>
  <?php

}

/**
 * Google Review Templates init
 *
 *
 */

function reviewbucketlite_google_review_template_init( $args ) {

  $reviewObj = new \ReviewbucketLite\Google_Review_Template( $args );

    // Style Switch
    switch ( $args['atts']['style'] ) {
        case '1':
            $reviewObj->reviewbucketlite_google_review_template_s1();
            break;
        case '2':
            $reviewObj->reviewbucketlite_google_review_template_s2();
            break;
        case '3':
            $reviewObj->reviewbucketlite_google_review_template_s3();
            break;
        case '4':
            $reviewObj->reviewbucketlite_google_review_template_s4();
            break;
        case '5':
            $reviewObj->reviewbucketlite_google_review_template_s5();
            break;
        case '6':
            $reviewObj->reviewbucketlite_google_review_template_s6();
            break;
        case '7':
            $reviewObj->reviewbucketlite_google_review_template_s7();
            break;
        case '8':
            $reviewObj->reviewbucketlite_google_review_template_s8();
            break;
        case '9':
            $reviewObj->reviewbucketlite_google_review_template_s9();
            break;
        case '10':
            $reviewObj->reviewbucketlite_google_review_template_s10();
            break;
        case '11':
            $reviewObj->reviewbucketlite_google_review_template_s11();
            break;
        case '12':
            $reviewObj->reviewbucketlite_google_review_template_s12();
            break;
        case '13':
            $reviewObj->reviewbucketlite_google_review_template_s13();
            break;
        case '14':
            $reviewObj->reviewbucketlite_google_review_template_s14();
            break;
        default:
            $reviewObj->reviewbucketlite_google_review_template_s1();
            break;
    }


}

// Date Format
function reviewbucketlite_date_format( $getdate ) {
	
	$reviewbucketliterev_options = get_option( 'reviewbucketlite_options' );

	$dateformat = !empty( $reviewbucketliterev_options['dateformat'] ) ? $reviewbucketliterev_options['dateformat'] : 'F j, Y';

	$date = date_i18n( $dateformat , strtotime( $getdate ) );
	
	return $date;
		
}

// Admin info notice
function reviewbucketlite_admin_info() {
    $url = 'https://codecanyon.net/item/reviewbucketlite-business-review-bundle-wordpress-plugin/25219748?_ga=2.64308399.1426499103.1578506363-573119487.1561452980';
    ?>
    <div class="notice notice-success is-dismissible">
        <h2><?php echo esc_html( 'ReviewBucket' ); ?></h2>
        <h4><?php esc_html_e( 'Thank you for using ReviewBucket.', 'reviewbucketlite' ); ?></h4>
        <h4><a class="button button-primary button-hero load-customize hide-if-no-customize" href="<?php echo esc_url( $url ); ?>" target="_blank"><?php esc_html_e( 'Buy Now Pro Version', 'reviewbucketlite' ); ?></a></h4>
    </div>
    <?php
}
add_action( 'admin_notices', 'reviewbucketlite_admin_info' );