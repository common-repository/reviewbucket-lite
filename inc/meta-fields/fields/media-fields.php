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


function tatCmf_media_field( $args = array() ) {
	
	$default = array(
		'type' 		=> 'text',
		'class' 	=> '',
		'id' 		=> '',
		'label' 	=> 'Field Label',
	);
	
	//
	
	$args = wp_parse_args( $args, $default );
		
	echo '<div class="field-row tatcmf-media '.esc_attr( $args['class'] ).'">';
	
		
		// Get WordPress' media upload URL
		$upload_link = esc_url( get_upload_iframe_src( 'image', get_the_ID() ) );

		// See if there's a media id already saved as post meta
		$your_img_id = get_post_meta( get_the_ID() , $args['id'], true );

		// Get the image src
		$your_img_src = wp_get_attachment_image_src( $your_img_id, 'full' );

		// For convenience, see if the array is valid
		$you_have_img = is_array( $your_img_src );

		echo '<div class="field-col-8">';
		echo '<label>'.esc_html( $args['label'] ).'</label>';
	?>

			<!-- Your image container, which can be manipulated with js -->
			<div class="custom-img-container">
			    <?php if ( $you_have_img ) : ?>
			        <img src="<?php echo esc_url( $your_img_src[0] ); ?>" alt="image" style="max-width:100%;" />
			    <?php endif; ?>
			</div>

			<!-- Your add & remove image links -->
			<div class="hide-if-no-js">
			    <a class="upload-custom-img button change-media select-media selected <?php if ( $you_have_img  ) { echo 'hidden'; } ?>" 
			       href="<?php echo esc_url( $upload_link ); ?>">
			        <?php esc_html_e('Add Image', 'reviewbucketlite' ) ?>
			    </a>

			    <a class="delete-custom-img button change-media select-media selected <?php if ( ! $you_have_img  ) { echo 'hidden'; } ?>" 
			      href="#">
			        <?php esc_html_e('Remove this image', 'reviewbucketlite' ) ?>
			    </a>
			</div>

			<!-- A hidden input to set and post the chosen image id -->
			<input class="custom-img-id" name="<?php echo esc_attr( $args['id'] ); ?>" type="hidden" value="<?php echo esc_attr( $your_img_id ); ?>" /> 

<?php
	echo '</div>';
	echo '</div>';

}

