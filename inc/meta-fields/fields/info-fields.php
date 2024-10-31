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



function tatCmf_info_field( $args = array() ){
	
	$default = array(
		'type' 		=> 'text',
		'class' 	=> '',
		'id' 		=> '',
		'label' 	=> 'Field Label',
		'info' 		=> '',
		'info_type' => 'danger',
	);
	
	
	$args = wp_parse_args( $args, $default );
	
	
	echo '<div class="field-row '.esc_attr( $args['class'] ).'">';
		echo '<div class="field-col-8">';
			echo '<label>'.esc_html( $args['label'] ).'</label>';

			echo '<div class="info-wrapper '.esc_attr( $args['info_type'] ).'"><span class="emoji-shortcodearea">[revbuck_reactions_review id="'.get_the_ID().'"]</span> <span class="emoji-copy"><i class="dashicons dashicons-update-alt"></i></span></div>';

		echo '</div>';
	echo '</div>';

}