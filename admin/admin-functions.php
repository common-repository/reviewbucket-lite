<?php
add_action( 'wp_ajax_reviewbucketlite_fb_auth_ajax', 'reviewbucketlite_fb_auth_ajax' );
function reviewbucketlite_fb_auth_ajax() {


    $reviewbucketliterev_options = get_option( 'reviewbucketlite_options' );

    if( !empty( $_POST['accessData'] ) ) {

        $getfbdata = is_array( $_POST['accessData'] ) ?  $_POST['accessData'] : '';

        $defaultOptions = get_option( 'reviewbucketlite_options' );

        $updateOptions = array(
            'gookey'    => sanitize_text_field( $defaultOptions['gookey'] ),
            'gplaceid'  => sanitize_text_field( $defaultOptions['gplaceid'] ),
            'fbkey'     => sanitize_text_field( $getfbdata['access_token'] ),
            'pagename'  => sanitize_text_field( $getfbdata['name'] ),
            'pageid'    => sanitize_text_field( $getfbdata['id'] )
        );


        update_option( 'reviewbucketlite_options', $updateOptions );


        echo json_encode($getfbdata);


    } else {
        echo esc_html__( 'Error Occured', 'reviewbucketlite' );
    }

    die();

}