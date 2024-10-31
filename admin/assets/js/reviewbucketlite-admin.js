( function($) {
	"use strict";

	$( '.reviewbucketlite-tab' ).on( 'click', function(e) {
 		e.preventDefault();

		let $selector = $(this).attr('href');

		$('.active').removeClass('active');
		$(this).parent().addClass('active');
		$('.reviewbucketlite-active').removeClass('reviewbucketlite-active').addClass('reviewbucketlite-hide');

		$($selector).removeClass('reviewbucketlite-hide').addClass('reviewbucketlite-active');

	} );

	$( '.reviewbucketlite-inner-tab' ).on( 'click', function(e) {

		e.preventDefault();

		let $selector = $(this).attr('href');

		$('.reviewbucketlite-inner-active').removeClass('reviewbucketlite-inner-active').addClass('reviewbucketlite-hide');

		$($selector).removeClass('reviewbucketlite-hide').addClass('reviewbucketlite-inner-active');

	} );


	/*****************/

	// Color Picker
	$('.color-field').wpColorPicker();

	$( ".range-slider" ).each( function() {

		var $this = $( this );

		$this.slider({
	      value: $this.data('rangevalue'),
	      min: 0,
	      max: 500,
	      step: 1,
	      slide: function( event, ui ) {
	      	       
	        $( event.target ).next('.show-range-val').text( ui.value+'px' );
	        $( event.target ).next().next('.range-val').val( ui.value );
	      }
	    });


	} )




	/*************************************

	Review Shortcode Generator Options

	**************************************/
	
	// Selectors 
	var $reviewtype = $('#reviewtype'),
		$buttonArea = $('.button-area'),
		$reviewcat  = $( '#reviewcat' ),
		$reviewcat_wrap  = $( '#reviewcat_wrap' ),
		$gplaceinfo = $('#gplaceinfo'),
		$reviewbucketlitestyle 	= $("#reviewbucketlitestyle"),
		$reviewbucketlitestyle_wrap 	= $("#reviewbucketlitestyle_wrap"),
		$max_rows 	= $("#max_rows"),
		$max_rows_wrap 	= $("#max_rows_wrap"),
		$min_rating = $("#min_rating"),
		$min_rating_wrap = $("#min_rating_wrap"),
		$padding_top = $("#padding_top"),
		$padding_bottom = $("#padding_bottom"),
		$bg_color = $("#bg_color"),
		$reviewbucketlitecolumn = $("#reviewbucketlitecolumn"),
		$scodeShow  = $('.scode-show'),
		$scodeCopy  = $( '#scode-copy' );



	// Default events
	$buttonArea.hide();

	if( $reviewtype.val() == '' ) {

		$reviewcat_wrap.hide()
		$gplaceinfo.hide()
		$reviewbucketlitestyle_wrap.hide()
		$max_rows_wrap.hide()
		$min_rating_wrap.hide()
		$padding_top.hide()
		$padding_bottom.hide()
		$bg_color.hide()
	}

	$scodeCopy.hide();

	// Review Type on change events
	
	$reviewtype.on( 'change', function() {

		$buttonArea.show();

		if( $(this).val() == 'reviewbucketlite_google_place' ) {

			$reviewcat_wrap.hide()
			$gplaceinfo.show()
			$reviewbucketlitestyle_wrap.show()
			$max_rows_wrap.show()
			$min_rating_wrap.show()
			$padding_top.show()
			$padding_bottom.show()
			$bg_color.show()

		}else if( $(this).val() == 'reviewbucketlite_custom_reviews' ) {

			$reviewcat_wrap.show()
			$gplaceinfo.hide()
			$reviewbucketlitestyle_wrap.show()
			$max_rows_wrap.show()
			$min_rating_wrap.show()
			$padding_top.show()
			$padding_bottom.show()
			$bg_color.show()

		} else if( $(this).val() == 'reviewbucketlite_facebook_review' ){
			$reviewcat_wrap.hide()
			$gplaceinfo.hide()
			$reviewbucketlitestyle_wrap.show()
			$max_rows_wrap.show()
			$min_rating_wrap.hide()
			$padding_top.show()
			$padding_bottom.show()
			$bg_color.show()

		} else if ( $(this).val() == 'reviewbucketlite_yelp_review' ) {

			console.log( $padding_bottom );

			$reviewcat_wrap.hide()
			$gplaceinfo.hide()
			$reviewbucketlitestyle_wrap.show()
			$max_rows_wrap.show()
			$min_rating_wrap.show()
			$padding_top.show()
			$padding_bottom.show()
			$bg_color.show()

		} else {

			$reviewcat_wrap.hide()
			$reviewbucketlitestyle_wrap.hide()
			$gplaceinfo.hide()
			$max_rows_wrap.hide()
			$min_rating_wrap.hide()
			$padding_top.hide()
			$padding_bottom.hide()
			$bg_color.hide()
		}
		

	});

	$( '#scodegenerate' ).on( 'click', function() {

		var $attr ='';

		var $reviewtype = $('#reviewtype').val();

		//
		if( $reviewcat_wrap.is(":visible") ) {
			$attr += ' cat="'+$reviewcat.val()+'"';
		}
		//
		if( $gplaceinfo.is(":visible") ) {
			$attr += ' place_info="'+$gplaceinfo.val()+'"';
		}
		//
		if( $max_rows_wrap.is(":visible") ) {
			$attr += ' max_rows="'+$max_rows.val()+'"';
		}
		//
		if( $min_rating_wrap.is(":visible") ) {
			$attr += ' min_rating="'+$min_rating.val()+'"';
		}
		//
		if( $padding_top.length > 0 ) {
			$attr += ' padding_top="'+$padding_top.val()+'"';
		}
		//
		if( $padding_bottom.length > 0 ) {
			$attr += ' padding_bottom="'+$padding_bottom.val()+'"';
		}
		//
		if( $bg_color.length > 0 ) {
			$attr += ' bg_color="'+$bg_color.val()+'"';
		}
		//
		if( $reviewbucketlitecolumn.length > 0 ) {
			$attr += ' column="'+$reviewbucketlitecolumn.val()+'"';
		}
		//
		if( $reviewbucketlitestyle_wrap.is(":visible") ) {
			$attr += ' style="'+$reviewbucketlitestyle.val()+'"';
		}

		$scodeShow.fadeIn('slow');
		$scodeCopy.show();
		$scodeShow.html( '<p class="shortcodearea">['+$reviewtype+' '+$attr+']</p>' );

	});


    // Copy shortcode
    $scodeCopy.on( 'click', function() {

        var $shortcode = $('.shortcodearea');

        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($shortcode.text()).select();
        document.execCommand("copy");
        $temp.remove();

        $scodeShow.fadeIn('slow').fadeOut('slow');
        $(this).fadeOut('slow');


    } );


    $( '[name="reviewbucketlite_platform"]' ).on( 'change', function() {

    	var selectedVal = $(this).val(),
    		platformPic  = $('.other-platform-pic'),
    		platformName = $('.other-platform-name');

    	if( selectedVal === 'other' ) {

    		platformPic.show();
    		platformName.show();

    	} else {

    		platformPic.hide();
    		platformName.hide();
    	}

    } )


	/*********************************************

	Review Badges Shortcode Generator Options

	**********************************************/

	// Selectors 
	var $badgestype 	= $('#badgestype'),
		$badgesStyle 	= $('#badges_style'),
		$buttonBadgesArea 	= $('.button-badges-area'),
		$badge_margin_top		= $( '#margin_top' ),
		$badge_margin_bottom  = $('#margin_bottom'),
		$group_margin   = $('.field-group-margin'),
		$badge_padding_top 	= $("#badge_padding_top"),
		$badge_padding_bottom = $("#badge_padding_bottom"),
		$badge_bg_color 		= $("#badge_bg_color"),
		$badgelist 		= $("#badgelist"),
		$scodeBadgesShow = $('.scode-badges-show'),
		$scodeBadgesCopy  	= $( '#scode-badges-copy' );


		$buttonBadgesArea.hide();
		$scodeBadgesCopy.hide();

		$badgestype.on( 'change', function() {

			var val = $( this ).val();

			if( val == 'reviewbucketlite_badges_slider' ) {
				$badge_margin_bottom.hide();
				$badge_margin_top.hide();
				$group_margin.hide();
				$badgelist.hide();

			} else {

				$badge_margin_bottom.show();
				$badge_margin_top.show();
				$group_margin.show();
				$badgelist.show();
			}

			$buttonBadgesArea.show();

		} )



	$( '#badges_scode_generate' ).on( 'click', function() {

		var $badgeAttr ='';

		var $badgestype = $('#badgestype').val();

		//
		if( $badgelist.is(":visible") ) {
			$badgeAttr += ' id="'+$badgelist.val()+'"';
		}
		//
		if( $badgesStyle.is(":visible") ) {
			$badgeAttr += ' badges_style="'+$badgesStyle.val()+'"';
		}
		//
		if( $badge_margin_top.val() > 0 ) {
			$badgeAttr += ' margin_top="'+$badge_margin_top.val()+'"';
		}
		//
		if( $badge_margin_bottom.val() > 0 ) {
			$badgeAttr += ' margin_bottom="'+$badge_margin_bottom.val()+'"';
		}
		//
		if( $badge_padding_top.val() > 0 ) {
			$badgeAttr += ' padding_top="'+$badge_padding_top.val()+'"';
		}
		//
		if( $badge_padding_bottom.val() > 0 ) {
			$badgeAttr += ' padding_bottom="'+$badge_padding_bottom.val()+'"';
		}
		//
		if( $badge_bg_color.val() ) {
			$badgeAttr += ' bg_color="'+$badge_bg_color.val()+'"';
		}

		$scodeBadgesShow.fadeIn('slow');
		$scodeBadgesCopy.show();
		$scodeBadgesShow.html( '<p class="shortcodearea">['+$badgestype+' '+$badgeAttr+']</p>' );

	});

    // Copy shortcode
    $scodeBadgesCopy.on( 'click', function() {

        var $shortcode = $('.shortcodearea');

        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($shortcode.text()).select();
        document.execCommand("copy");
        $temp.remove();

        $scodeBadgesShow.fadeIn('slow').fadeOut('slow');
        $(this).fadeOut('slow');


    } );


	/*************************************

		Google Review Upload

	**************************************/

    $( '.get-google-review' ).on( 'click', function(e) {

    	e.preventDefault();
    	
    	$.ajax({

    		type: 'POST',
    		url: reviewbucketliteadminobj.admin_url,
    		data: {
    			action: 'update_google_review'
    		},
    		success: function( data ) {

    		var data = JSON.parse( data ),
				placeMessage = ( data.place_message ) ? data.place_message : '',
				reviewMessage = data.review_message,
				message = $( '.status-message' );

				if( reviewMessage.length || placeMessage.length ) {
					message.html('<p class="reviewbucketlite-alert">'+placeMessage+'<br>'+reviewMessage+'</p>');
				}
    			
    		}

    	})
    	

    } )


    // Hide submit button for reaction settings
    $( '.reviewbucketlite-tab' ).on( 'click', function() {

    	var $val = $(this).attr('href');

    	if( $val == '#admin_reaction' ) {
    		$('.submit').hide();
    	} else {
    		$('.submit').show();
    	}
    	
    } )


} )(jQuery);