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

  
	add_action( 'admin_enqueue_scripts', 'tatcmf_admin_scripts' );
  
	function tatcmf_admin_scripts(){
	   wp_enqueue_media();
	  wp_enqueue_style( 'tatcmf-style', REVIEWBUCKETLITE_DIR_URL.'inc/meta-fields/css/tatcmf-style.css', array(), '1.0', false  );
    wp_enqueue_script( 'tatcmf-script', REVIEWBUCKETLITE_DIR_URL.'inc/meta-fields/js/tatcmf.js', array( 'jquery' ), '1.0', true  );
	  
	}
  

require_once REVIEWBUCKETLITE_DIR_PATH . 'inc/meta-fields/main-meta.php';
require_once REVIEWBUCKETLITE_DIR_PATH . 'inc/meta-fields/tatcmf-config.php';

require_once REVIEWBUCKETLITE_DIR_PATH . 'inc/meta-fields/fields/text-fields.php';
require_once REVIEWBUCKETLITE_DIR_PATH . 'inc/meta-fields/fields/media-fields.php';
require_once REVIEWBUCKETLITE_DIR_PATH . 'inc/meta-fields/fields/date-fields.php';
require_once REVIEWBUCKETLITE_DIR_PATH . 'inc/meta-fields/fields/select-field.php';
require_once REVIEWBUCKETLITE_DIR_PATH . 'inc/meta-fields/fields/radio-fields.php';
require_once REVIEWBUCKETLITE_DIR_PATH . 'inc/meta-fields/fields/textarea-fields.php';
require_once REVIEWBUCKETLITE_DIR_PATH . 'inc/meta-fields/fields/color-fields.php';
require_once REVIEWBUCKETLITE_DIR_PATH . 'inc/meta-fields/fields/range-slider.php';
require_once REVIEWBUCKETLITE_DIR_PATH . 'inc/meta-fields/fields/info-fields.php';

?>