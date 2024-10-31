<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
if(!class_exists('ReviewBucket_Number_Param')) {
	class ReviewBucket_Number_Param {
		function __construct() {
			if(function_exists('vc_add_shortcode_param')) {
				vc_add_shortcode_param('floatnumber' , array(&$this, 'number_settings_field' ));
			}
		}
	
		function number_settings_field($settings, $value){
			$param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
			$type = isset($settings['type']) ? $settings['type'] : '';
			$min = isset($settings['min']) ? $settings['min'] : '';
			$max = isset($settings['max']) ? $settings['max'] : '';
			$step = isset($settings['step']) ? $settings['step'] : '';
			$suffix = isset($settings['suffix']) ? $settings['suffix'] : '';
			$class = isset($settings['class']) ? $settings['class'] : '';
			$output = '<input type="number" min="'.esc_attr($min).'" max="'.esc_attr($max).'" step="'.esc_attr($step).'" class="wpb_vc_param_value ' . esc_attr($param_name . ' ' . $type . ' ' . $class) . '" name="' . esc_attr($param_name) . '" value="'.$value.'" style="max-width:100px; margin-right: 10px;" />'.$suffix;
			return $output;
		}
		
	}
	

	$ReviewBucket_Number_Param = new ReviewBucket_Number_Param();


}
