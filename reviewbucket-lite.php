<?php
/*
Plugin Name:  Reviewbucket Lite
Plugin URI:   http://wpbucket.net/plugins/reviewbucket
Description:  ReviewBucket Lite help you to growing up your business trust.
Version:      1.3.0
Author:       WPBucket
Author URI:   http://wpbucket.net
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  reviewbucketlite
Domain Path:  /languages
*/


// Block Direct access
if( !defined( 'ABSPATH' ) ){ die( 'You should not access this file directly!.' ); }

// Define Constants for direct access alert message.

if( !defined( 'REVIEWBUCKETLITE_ALERT_MSG' ) )
	define( 'REVIEWBUCKETLITE_ALERT_MSG', esc_html__( 'You should not access this file directly.!', 'reviewbucketlite' ) );


// Define constants for plugin directory path.
if( !defined( 'REVIEWBUCKETLITE_DIR_PATH' ) )
	define( 'REVIEWBUCKETLITE_DIR_PATH', plugin_dir_path( __FILE__ ) );

// Define constants for view directory path.
if( !defined( 'REVIEWBUCKETLITE_VIEW_DIR_PATH' ) )
	define( 'REVIEWBUCKETLITE_VIEW_DIR_PATH', REVIEWBUCKETLITE_DIR_PATH.'view/' );

// Define constants for plugin directory path.
if( !defined( 'REVIEWBUCKETLITE_EW_DIR_PATH' ) )
	define( 'REVIEWBUCKETLITE_EW_DIR_PATH', REVIEWBUCKETLITE_VIEW_DIR_PATH .'elementor-widgets/' );

// Define constants for Google Frontend directory path.
if( !defined( 'REVIEWBUCKETLITE_GF_DIR_PATH' ) )
	define( 'REVIEWBUCKETLITE_GF_DIR_PATH', REVIEWBUCKETLITE_VIEW_DIR_PATH . 'google-frontend/' );

// Define constants for plugin dirname.
if( !defined( 'REVIEWBUCKETLITE_DIR_NAME' ) )
	define( 'REVIEWBUCKETLITE_DIR_NAME', dirname( __FILE__ ) );

// Define constants for plugin directory path.
if( !defined( 'REVIEWBUCKETLITE_DIR_URL' ) )
	define( 'REVIEWBUCKETLITE_DIR_URL', plugin_dir_url( __FILE__ ) );

// Define constants for plugin basenam.
if( !defined( 'REVIEWBUCKETLITE_BASENAME' ) )
	define( 'REVIEWBUCKETLITE_BASENAME', plugin_basename( __FILE__ ) );

// Script enqueue class include
require_once REVIEWBUCKETLITE_DIR_PATH . 'inc/class-enqueue.php';
// Admin file include 
require_once REVIEWBUCKETLITE_DIR_PATH . 'admin/admin-functions.php';
require_once REVIEWBUCKETLITE_DIR_PATH . 'admin/admin.php';

require_once REVIEWBUCKETLITE_DIR_PATH . 'inc/google-review/google-api-config.php';

// Template Class
require_once REVIEWBUCKETLITE_GF_DIR_PATH . 'class-google-review-templates.php';

require_once REVIEWBUCKETLITE_DIR_PATH . 'inc/functions.php';

require_once REVIEWBUCKETLITE_DIR_PATH . 'inc/class-emoji-templates.php';
require_once REVIEWBUCKETLITE_DIR_PATH . 'inc/class-reactions-reviews.php';

// Meta field related file include
require_once REVIEWBUCKETLITE_DIR_PATH . 'inc/meta-fields/tatcmf.php';

// View Shortcode
require_once REVIEWBUCKETLITE_DIR_PATH . 'view/google-shortcode.php';
require_once REVIEWBUCKETLITE_DIR_PATH . 'view/elementor-widgets/elementor-widget.php';

// VC Init
require_once REVIEWBUCKETLITE_DIR_PATH . 'view/wpbakery/reviewbucketlite-vc-init.php';
