<?php
namespace Reviewbucketelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * elementor about page section widget.
 *
 * @since 1.0
 */
class Reviewbucket_Google extends Widget_Base {

	public function get_name() {
		return 'reviewbucketlite-google';
	}

	public function get_title() {
		return esc_html__( 'Google Review', 'reviewbucketlite' );
	}

	public function get_icon() {
		return 'eicon-google-maps';
	}

	public function get_categories() {
		return [ 'reviewbucketlite-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();


        // ----------------------------------------  Google Review Settings ------------------------------
        $this->start_controls_section(
            'reviewbucketlite_google_set',
            [
                'label' => esc_html__( 'Google Review Settings', 'reviewbucketlite' ),
            ]
        );

        $this->add_control(
            'style', [
                'label' => esc_html__( 'Style', 'reviewbucketlite' ),
                'type'  => Controls_Manager::SELECT,
                'label_block' => true,
                'default' => '1',
                'options' => array(
                    '1'  => esc_html__( 'Style 1 ( Slider )', 'reviewbucketlite' ),
                    '2'  => esc_html__( 'Style 2 ( Slider )', 'reviewbucketlite' ),
                    '3'  => esc_html__( 'Style 3 (Grid)', 'reviewbucketlite' ),
                    '4'  => esc_html__( 'Style 4 ( Slider )', 'reviewbucketlite' ),
                    '5'  => esc_html__( 'Style 5 (Grid)', 'reviewbucketlite' ),
                    '6'  => esc_html__( 'Style 6 (Grid)', 'reviewbucketlite' ),
                    '7'  => esc_html__( 'Style 7 (Grid)', 'reviewbucketlite' ),
                    '8'  => esc_html__( 'Style 8 (Grid)', 'reviewbucketlite' )
                )

            ]
        );
        $this->add_control(
            'column', [
                'label' => esc_html__( 'Column', 'reviewbucketlite' ),
                'type'  => Controls_Manager::SELECT,
                'label_block' => true,
                'default' => '1',
                'options' => array(
                    '12'  => esc_html__( '1 Column', 'reviewbucketlite' ),
                    '6'  => esc_html__( '2 Column', 'reviewbucketlite' ),
                    '4'  => esc_html__( '3 Column', 'reviewbucketlite' ),
                    '3'  => esc_html__( '4 Column', 'reviewbucketlite' )

                ),
                'default' => '4',
                'condition' => [
                    'style' => ['3','5','6','7','8']
                ]

            ]
        );
        $this->add_control(
            'max_rows', [
                'label' => esc_html__( 'Max Reviews', 'reviewbucketlite' ),
                'type'  => Controls_Manager::NUMBER,
                'label_block' => true,
                'default' => '5',

            ]
        );
        $this->add_control(
            'min_rating', [
                'label' => esc_html__( 'Min Rating', 'reviewbucketlite' ),
                'type'  => Controls_Manager::SELECT,
                'label_block' => true,
                'default' => '1',
                'options' => array(
                    '1' => esc_html__( '1', 'reviewbucketlite' ),
                    '2' => esc_html__( '2', 'reviewbucketlite' ),
                    '3' => esc_html__( '3', 'reviewbucketlite' ),
                    '4' => esc_html__( '4', 'reviewbucketlite' ),
                    '5' => esc_html__( '5', 'reviewbucketlite' ),
                )

            ]
        );

        //
        
        $this->add_control(
            'padding_top', [
                'label'     => esc_html__( 'Section Padding Top', 'reviewbucketlite' ),
                'type'      => Controls_Manager::NUMBER,
                'default'   => '50'
            ]
        );
        $this->add_control(
            'padding_bottom', [
                'label'     => esc_html__( 'Section Padding Bottom', 'reviewbucketlite' ),
                'type'      => Controls_Manager::NUMBER,
                'default'   => '50'
            ]
        );
        $this->add_control(
            'bg_color', [
                'label'     => esc_html__( 'Section Background Color', 'reviewbucketlite' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff'
            ]
        );

        $this->end_controls_section(); // End section top content

	}

	protected function render() {

    $settings = $this->get_settings();
    
    // Load widget script
    $this->load_widget_script();

    $data = reviewbucketlite_get_google_reviews();


    if( !empty( $data ) ):

    $args = array(
        'data' => $data, 
        'atts' => $settings
    );

    reviewbucketlite_google_review_template_init( $args );

    endif;


    }

    public function load_widget_script() {
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
         (function($) {

            /* Window on load function */
            $(window).on('load', function () {
                $('.grid').isotope({
                    // options
                    itemSelector: '.grid-item',
                    percentPosition: true,
                    layoutMode: 'masonry'
                });
            
            });


            $(function() {

            /****************/ 
            let btSlider1 = $(".bt-slide-1");
            
            if( btSlider1.length ) {

                btSlider1.each( function() {

                    $(this).owlCarousel({
                        dots: true,
                        nav:true,
                        autoplay: true,
                        navText: ['<i class="icofont-thin-left"></i>','<i class="icofont-thin-right"></i>'],
                        responsive:{
                            0:{
                                    items:1
                            },
                            768:{
                                    items:1
                            },
                            991:{
                                    items:1
                            }
                        }
                    });

                } );

            }

            /****************/ 

            var action = false, clicked = false;
            var Owl = {

            init: function() {
                Owl.carousel();
            },

            carousel: function() {
                var owl;
                $(document).ready(function() {
                    
                    owl = $('.btImageDots').owlCarousel({
                        items     : 1,
                        center     : true,
                        dots       : true,
                        loop       : true,
                        dotsContainer: '.image-dots',
                        navText: ['prev','next'],
                    });

                    $('.image-dots-wrap').on('click', 'li', function(e) {
                        owl.trigger('to.owl.carousel', [$(this).index(), 300]);
                    });
                });
            }
            };

            Owl.init();



            /****************/ 

            let btSlider2 = $(".bt-slide-2");

            if( btSlider2.length ) {

                btSlider2.each( function() {

                    $(this).owlCarousel({
                            dots: false,
                            nav:true,
                            autoplay: true,
                            navText: ["<i class='icofont-thin-left'></i>","<i class='icofont-thin-right'></i>"],
                            responsive:{
                            0:{
                                    items:1
                            },
                            768:{
                                    items:2
                            },
                            991:{
                                    items:3
                            }
                            }
                    });

                } );

            }

            // More Button

            // Configure/customize these variables.
            var showChar = 100;  // How many characters are shown by default
            var ellipsestext = "...";
            var moretext = esc_html__( 'Show More >', 'reviewbucketlite' );
            var lesstext = esc_html__( 'Show Less', 'reviewbucketlite' );
                
            $('.reviewbucketlite-review-more').each(function() {
                var content = $(this).html();

                if(content.length > showChar) {

                    var c = content.substr(0, showChar);
                    var h = content.substr(showChar, content.length - showChar);

                    var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

                    $(this).html(html);
                }

            });

            $(".morelink").on( 'click', function(){
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



            }) //




            })(jQuery);


        </script>
        <?php 
        }
    }
	
}
