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



function tatCmf_text_field( $args = array() ){
	
	$default = array(
		'type' 		=> 'text',
		'class' 	=> '',
		'id' 		=> '',
		'label' 	=> 'Field Label',
	);
	
	
	$args = wp_parse_args( $args, $default );
	
	$val = get_post_meta( get_the_ID(), $args['id'] , true );
	
	echo '<div class="field-row '.esc_attr( $args['class'] ).'">';
		echo '<div class="field-col-8">';
			echo '<label>'.esc_html( $args['label'] ).'</label>';
			echo '<input type="'.esc_attr( $args['type'] ).'" name="'.esc_attr( $args['id'] ).'" id="'.esc_attr( $args['id'] ).'" class="tatCmf-input-control tatCmf-'.esc_attr( $args['type'] ).'-field '.esc_attr( $args['class'] ).'" value="'.esc_attr( $val ).'" />';
		echo '</div>';
	echo '</div>';

}

