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

if( !class_exists( 'Reactions_Reviews' ) ){
	
	class Reactions_Reviews{
		
		public function __construct( ) {
		
			add_action( 'wp_ajax_reactions_reviews_action', array( $this, 'reactions_review_ajax' ) );
			add_action( 'wp_ajax_nopriv_reactions_reviews_action', array( $this, 'reactions_review_ajax' ) );

			add_shortcode( 'revbuck_reactions_review', array( $this, 'reactions_review_shortcode' ) );

			add_action( 'add_meta_boxes', array( $this, 'add_meta_box__' ) );

			add_action( 'woocommerce_product_meta_end', array( $this, 'reactions_review' ) );

			add_action('save_post', array( $this, 'save_postdata' ) );
			
		}

		// Shortcode
		public function reactions_review_shortcode( $atts ) {

			$attr = shortcode_atts( array(
					'id' => ''
				), $atts );


			$templateStyle = get_post_meta( absint( $attr['id'] ), 'reviewbucketlite_emoji_style', true );
			$bg_color = get_post_meta( absint( $attr['id'] ), 'reviewbucketlite_bgcolor', true );
			$margin_top = get_post_meta( absint( $attr['id'] ), 'reviewbucketlite_margin_top', true );
			$margin_bottom = get_post_meta( absint( $attr['id'] ), 'reviewbucketlite_margin_bottom', true );


            $style = $bgColor = $marginBottom = $marginTop = '';

            // Background
            if( !empty( $bg_color ) ) {
            	$bgColor = 'background:'.esc_attr( $bg_color ).';';
            }
            // Margin Bottom
            if( !empty( $margin_bottom ) ) {
            	$marginBottom = 'margin-bottom:'.esc_attr( $margin_bottom ).'px;';
            }
            // Margin Bottom
			if( !empty( $margin_top ) ) {
				$marginTop = 'margin-top:'.esc_attr( $margin_top ).'px;';
            }

            if( $bgColor || $marginBottom || $marginTop ) {
            	$style = 'style="'.$bgColor.$marginBottom.$marginTop.'"';
            }

			ob_start();

			$getReaction = get_post_meta( get_the_ID(), 'revbuck_reaction_review', true );

			$template = new Emoji_template( array( 'postid' => $attr['id'], 'style' => $style, 'getreaction' => $getReaction ) );

			switch( $templateStyle ) {
				case 'style1':
					$template->template_style1();
					break;
				default :
					$template->template_style1();
					break;


			}

			return ob_get_clean();
		}

		// Reactions review ajax callback
		public function reactions_review_ajax() {

			if( isset( $_POST['reaction'] ) && isset( $_POST['postid'] )  ) {

				$postid = sanitize_text_field( $_POST['postid'] );

				$key = sanitize_title( $_POST['reaction'] );

				$data = get_post_meta( $postid, 'revbuck_reaction_review', true );

				if( !empty( $data ) ) {

					array_push( $data[$key], $data[$key]++ );

				} else {
					$data  = [ $key => 1 ];
				}
				
				update_post_meta( $postid, 'revbuck_reaction_review', $data );

			} 			

			$result = get_post_meta( $postid, 'revbuck_reaction_review', true );

			echo json_encode( $result );

			die();
		}
		
		//
		public function reactions_review() {

			$active = get_post_meta( get_the_ID(), 'revbuck_woo_reactions_review_active', true );

			if( $active == 'on' ) {
				echo do_shortcode( '[revbuck_reactions_review]' );
			}

		}
		//
		public function add_meta_box__( $post_type ) {

	        add_meta_box(
	            'wf_child_letters',
	            esc_html__( 'Reactions Review Settings', 'woocommerce' ),
	            array( $this, 'render_review_meta_box_content' ),
	            'product',
	            'advanced',
	            'high'
	        );

		}
		//
		public function render_review_meta_box_content() {

			$active = get_post_meta( get_the_ID(), 'revbuck_woo_reactions_review_active', true );

			?>
			<label><?php esc_html_e( 'Do you want to use reactions review', 'reviewbucketlite' ); ?></label>
			<input type="checkbox" name="woo_reactions_review_active" value="on" <?php checked( $active, 'on' ) ?> />
			<?php

		}

		//
		public function save_postdata( $post_id )
		{
		   
	    	$value = isset( $_POST['woo_reactions_review_active'] ) ? sanitize_text_field( $_POST['woo_reactions_review_active'] ) : 'off';

	        update_post_meta(
	            $post_id,
	            'revbuck_woo_reactions_review_active',
	            $value
	        );
		   
		}
	
		
	}

	$obj = new Reactions_Reviews();
}

