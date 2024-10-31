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



function tatCmf_rangeslider_field( $args = array() ){
	
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
			?>
			<div class="range-slider" data-rangevalue="<?php echo esc_attr( $val ); ?>"></div><span class="show-range-val"><?php echo esc_html( $val ); ?>px</span>
			<?php
			echo '<input type="hidden" name="'.esc_attr( $args['id'] ).'" id="'.esc_attr( $args['id'] ).'" class="range-val tatCmf-input-control tatCmf-'.esc_attr( $args['type'] ).'-field '.esc_attr( $args['class'] ).'" value="'.esc_attr( $val ).'" />';
		echo '</div>';
	echo '</div>';

}

