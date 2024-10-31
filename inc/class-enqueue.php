<?php
namespace ReviewbucketLite;
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

if( !class_exists( 'Reviewbucket_Enqueue' ) ){
	
	class Reviewbucket_Enqueue{
		
		public function __construct( $args = array() ) {
		
			add_action( 'wp_enqueue_scripts', array( $this, 'frontend_enqueue_scripts' ) );
			
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );

		
			
		}
		// Front-End enqueue scripts
		public function frontend_enqueue_scripts() {
			

			wp_enqueue_style( 'icofont', REVIEWBUCKETLITE_DIR_URL.'assets/icofont/icofont.min.css', array(), '1.0', false );
			wp_enqueue_style( 'fontawesome-all', REVIEWBUCKETLITE_DIR_URL.'assets/fontawesome/all.min.css', array(), '1.0', false );
			wp_enqueue_style( 'reviewbucketlite-grid', REVIEWBUCKETLITE_DIR_URL.'assets/css/reviewbucketlite-grid.css', array(), '1.0', false );
			wp_enqueue_style( 'owl-carousel', REVIEWBUCKETLITE_DIR_URL.'assets/css/owl.carousel.min.css', array(), '1.0', false );
			wp_enqueue_style( 'owl-default', REVIEWBUCKETLITE_DIR_URL.'assets/css/owl.theme.default.min.css', array(), '1.0', false );
			wp_enqueue_style( 'reviewbucketlite-style', REVIEWBUCKETLITE_DIR_URL.'assets/css/style.css', array(), '1.0', false );
			
			/********************
				Js Enqueue
			********************/

			wp_enqueue_script( 'google-place', REVIEWBUCKETLITE_DIR_URL.'inc/google-review/js/google-place.js', array('jquery'), '1.0', false );
			wp_enqueue_script( 'isotope-pkgd', REVIEWBUCKETLITE_DIR_URL.'assets/js/isotope.pkgd.min.js', array('jquery'), '3.0.6', true );
			wp_enqueue_script( 'owl-carousel', REVIEWBUCKETLITE_DIR_URL.'assets/js/owl.carousel.min.js', array('jquery'), '2.2.1', true );
			wp_enqueue_script( 'main-script', REVIEWBUCKETLITE_DIR_URL.'assets/js/main.js', array('jquery'), '1.0.0', true );

				$defaultOptions = get_option( 'reviewbucketlite_options' );

				$trimcharacter = !empty( $defaultOptions['trimcharacter'] ) ? $defaultOptions['trimcharacter'] : '100';

				wp_localize_script( 'main-script', 'frontend_object',
			        array(
			            'admin_url' => admin_url( 'admin-ajax.php' ),
			            'rooturl' 	=> REVIEWBUCKETLITE_DIR_URL,
			            'show_more' => esc_html__( 'Read More >', 'reviewbucketlite' ),
			            'show_less' => esc_html__( 'Hide Content', 'reviewbucketlite' ),
			            'trimcharacter' => esc_html( $trimcharacter ),
			            'post_id' => get_the_ID()
			        )
			    );

			
			
		}
		
		// Admin enqueue scripts
		public function admin_enqueue_scripts() {
			
			// style			
			wp_enqueue_style( 'jquery-ui', REVIEWBUCKETLITE_DIR_URL.'/admin/assets/css/jquery-ui.css', array(), '1.0', false );
			wp_enqueue_style( 'reviewbucketlite-admin', REVIEWBUCKETLITE_DIR_URL.'/admin/assets/css/reviewbucketlite-admin.css', array(), '1.0', false );


			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'fbrev-wpac', REVIEWBUCKETLITE_DIR_URL.'/admin/assets/js/wpac.js', array('jquery' ), '1.0', true );
			wp_enqueue_script( 'fbrev-connect', REVIEWBUCKETLITE_DIR_URL.'/admin/assets/js/fbrev-connect.js', array('jquery' ), '1.0', true );
			wp_enqueue_script( 'reviewbucketlite-admin', REVIEWBUCKETLITE_DIR_URL.'/admin/assets/js/reviewbucketlite-admin.js', array('jquery', 'wp-color-picker','jquery-ui-slider' ), '1.0', true );

			wp_localize_script( 'fbrev-connect', 'fbrevConnect', array( 'admin_url' => admin_url('admin-ajax.php') ) );
			wp_localize_script( 'reviewbucketlite-admin', 'reviewbucketliteadminobj', array( 'admin_url' => admin_url('admin-ajax.php') ) );
						
			
		}
		
		
	}

	$obj = new Reviewbucket_Enqueue();
}

