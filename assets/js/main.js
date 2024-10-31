(function($) {
  "use strict";

   // Configure/customize these variables.
   var showChar = frontend_object.trimcharacter;  // How many characters are shown by default
   var ellipsestext = "...";
   var moretext = frontend_object.show_more;
   var lesstext = frontend_object.show_less;
        
   $('.reviewbucketlite-review-more').each(function() {
         var content = $(this).html();

         if(content.length > showChar) {

            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);

            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

            $(this).html(html);
         }

   });

   $(".morelink").on('click', function(){
         if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
         } else {
            $(this).addClass("less");
            $(this).html(lesstext);
         }
         $(this).parent().prev().toggle();
         $(this).prev().toggle();
         return false;
   });




/****** Style 1 owlCarousel ********/
$(document).ready(function(){
   $(".revbuck-testimonial-slider").owlCarousel({
       items:2,
       itemsDesktop:[1000,2],
       itemsDesktopSmall:[990,2],
       itemsTablet:[768,1],
       pagination:true,
       navigation:false,
       navigationText:["",""],
       slideSpeed:1000,
       autoPlay:true
   });
});

/****** Style 2 owlCarousel ********/

 $('.customers-testimonials-style').owlCarousel({
   loop: true,
   center: true,
   items: 3,
   margin: 0,
   autoplay: true,
   dots:true,
   autoplayTimeout: 8500,
   smartSpeed: 450,
   responsive: {
     0: {
       items: 1
     },
     768: {
       items: 2
     },
     1170: {
       items: 3
     }
   }
});

/****** Style 4 owlCarousel ********/

$(function() {
  $('.owl-carousel.revbuck-testimonial-carousel').owlCarousel({
    nav: true,
    navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
    dots: false,
    responsive: {
      0: {
        items: 1,
      },
      750: {
        items: 2,
      }
    }
  });
});

/****** Badge Slider owlCarousel ********/

$(function() {

  $('.reviewbadges-slider.owl-carousel').owlCarousel({
    autoplay: true,
    center: true,
    loop: true,
    nav: false,
    responsive: {
      0: {
        items: 1,
      },
      750: {
        items: 3,
      }
    }
  });


});

/******* Emoj Reactions Ajax ********/


var $selector = $( '.single-reactions' );

  $selector.on( 'click', function() {

  var $this = $(this),
      $value = $this.data('reaction'),
      $template = $this.parent().data('template');

      // Check if already provide reaction
      var postid = localStorage.getItem('reaction_postid');
      if( postid == frontend_object.post_id  ) {
        return;
      }

      // Set post, page id
      localStorage.setItem('reaction_postid', frontend_object.post_id);

  $.ajax({

    type: 'POST',
    url: frontend_object.admin_url,
    data: {
      reaction: $value,
      postid: $('[data-postid]').data('postid'),
      action: 'reactions_reviews_action'
    },
    success: function( data ) {
    //
    var result = JSON.parse( data );

      if( $template == '1' ) {

        var reaction = '';

        var checkKey = ['definitely-yes','maybe','of-course-not'];

        $.each( result, function( i, v ) {

          if( $.inArray( i, checkKey ) == '-1' ) {
            reaction +='<li><img src="'+frontend_object.rooturl+'/assets/img/reactions_'+i+'.png" /> <span class="count">'+v+'</span></li>';
          }
      
        } );

        $('.emoj-reactions-result-inner').html(reaction);

      } else {

        $this.children('span').text( result[$value] );

      }

      

    }


  })


} )




})(jQuery);
