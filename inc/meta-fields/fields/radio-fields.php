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

function tatCmf_radio_field( $args = array() ){
	
	$default = array(
		'type' 		=> 'text',
		'class' 	=> '',
		'id' 		=> '',
		'label' 	=> 'Field Label',
		'options'	=> array(
			'on'  => 'ON',
			'off' => 'OFF'
		)
	);
	
	
	$args = wp_parse_args( $args, $default );
	
	$val = get_post_meta( get_the_ID(), $args['id'] , true );
	
	echo '<div class="field-row">';
		echo '<div class="field-col-4">';
			echo '<label>'.esc_html( $args['label'] ).'</label>';
		echo '</div>';
		echo '<div class="field-col-8">';
			foreach( $args['options'] as  $key => $option ) {

				$checked = ( $val == $key ) ? 'checked' : '';

				echo '<div class="single-radio">';
				echo '<label>'.esc_html( $option ).'</label>';
				echo '<input type="radio" name="'.esc_attr( $args['id'] ).'" id="'.esc_attr( $args['id'].$key ).'" class="tatCmf-'.esc_attr( $args['type'] ).'-field '.esc_attr( $args['class'] ).'" value="'.esc_attr( $key ).'" '.esc_attr( $checked ).' />';
				echo '</div>';
			}
		echo '</div>';
	echo '</div>';

}
