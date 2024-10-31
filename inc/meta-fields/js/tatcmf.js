( function(  $ ) {

	"use stricts";


	/**
	 * WP Media upload for meta
	 * 
	 **/

	// Set all variables to be used in scope
	
	var metaBox = $('.tatcmf-media');

	metaBox.each( function() { 

		var $this = $( this );

		var frame,
		  addImgLink = $this.find('.upload-custom-img'),
		  delImgLink = $this.find( '.delete-custom-img'),
		  imgContainer = $this.find( '.custom-img-container'),
		  imgIdInput = $this.find( '.custom-img-id' );

		// ADD IMAGE LINK
		addImgLink.on( 'click', function( event ){

		event.preventDefault();

		// If the media frame already exists, reopen it.
		if ( frame ) {
		  frame.open();
		  return;
		}

		// Create a new media frame
		frame = wp.media({
			  title: 'Select or Upload Media Of Your Chosen Persuasion',
			  button: {
			    text: 'Use this media'
			  },
			  multiple: false  // Set to true to allow multiple files to be selected
		});


		// When an image is selected in the media frame...
		frame.on( 'select', function() {
		  
			  // Get media attachment details from the frame state
			  var attachment = frame.state().get('selection').first().toJSON();

			  // Send the attachment URL to our custom image input field.
			  imgContainer.append( '<img src="'+attachment.url+'" alt="" style="max-width:100%;"/>' );

			  // Send the attachment id to our hidden input
			  imgIdInput.val( attachment.id );

			  // Hide the add image link
			  addImgLink.addClass( 'hidden' );

			  // Unhide the remove image link
			  delImgLink.removeClass( 'hidden' );
			});

			// Finally, open the modal on click
			frame.open();
		});


		// DELETE IMAGE LINK
		delImgLink.on( 'click', function( event ){

			event.preventDefault();

			// Clear out the preview image
			imgContainer.html( '' );

			// Un-hide the add image link
			addImgLink.removeClass( 'hidden' );

			// Hide the delete image link
			delImgLink.addClass( 'hidden' );

			// Delete the image id from the hidden input
			imgIdInput.val( '' );

		});


	} );


	// Shortcode Copy
    $('.emoji-copy').on( 'click', function() {

        var $shortcode = $(this).parent().children('.emoji-shortcodearea');

        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($shortcode.text()).select();
        document.execCommand("copy");
        $temp.remove();

        $(this).addClass('green-color');


    } );

    //
    
    var $style = $( '.style-3-field' );

    $style.hide();
    
    $('[name="reviewbucketlite_emoji_style"]').on( 'change', function() {

    	var $thisVal = $(this).val();

    	if( $thisVal == 'style3' ) {
    		$style.show();
    	} else {
    		$style.hide();
    	}

    } )

    if( $('[name="reviewbucketlite_emoji_style"]').val() == 'style3' ) {
    	$style.show();
    }




} )(jQuery);