<?php 


// VC Admin init hook
add_action( 'vc_build_admin_page', 'reviewbucketlite_custom_param_type' );
function reviewbucketlite_custom_param_type(){
	
	require_once REVIEWBUCKETLITE_DIR_PATH . 'view/wpbakery/reviewbucketlite-floatn-number.php';
	
}

require_once REVIEWBUCKETLITE_DIR_PATH . 'view/wpbakery/vc-add-shortcode-list.php';

require_once REVIEWBUCKETLITE_DIR_PATH . 'view/wpbakery/vc-google-review.php';
require_once REVIEWBUCKETLITE_DIR_PATH . 'view/wpbakery/vc-google-reviews-markup.php';


