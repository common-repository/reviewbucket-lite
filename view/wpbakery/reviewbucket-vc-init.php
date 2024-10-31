<?php 


// VC Admin init hook
add_action( 'vc_build_admin_page', 'reviewbucket_custom_param_type' );
function reviewbucket_custom_param_type(){
	
	require_once REVIEWBUCKET_DIR_PATH . 'view/wpbakery/reviewbucket-floatn-number.php';
	
}

require_once REVIEWBUCKET_DIR_PATH . 'view/wpbakery/vc-add-shortcode-list.php';

require_once REVIEWBUCKET_DIR_PATH . 'view/wpbakery/vc-google-review.php';
require_once REVIEWBUCKET_DIR_PATH . 'view/wpbakery/vc-google-reviews-markup.php';


