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
 
 class Reviewbucket_Settings_Page
{

    /**
     * Start up
     */
    public function __construct()
    {
        $reviewbucketliterev_options = get_option( 'reviewbucketlite_options' );
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
		add_menu_page(
			esc_html__( 'Review Bucket', 'reviewbucketlite' ),
			esc_html__( 'Review Bucket Settings', 'reviewbucketlite' ),
			'manage_options',
			'reviewbucketlite-setting-admin',
			array( $this, 'create_admin_page' ),
			'dashicons-format-status',
			6
		);
        add_submenu_page(
            'reviewbucketlite-setting-admin',
            esc_html__( 'Emoji Reaction', 'reviewbucketlite' ),
            esc_html__( 'Emoji Reaction', 'reviewbucketlite' ),
            'manage_options',
            'edit.php?post_type=emoji_reaction',
            NULL
        );
    }

	
    function page_init() {
        //register our settings
        register_setting( 'reviewbucketlite-settings-group', 'reviewbucketlite_options' );
    }
    
    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // add error/update messages

        // check if the user have submitted the settings
        if ( isset( $_GET['settings-updated'] ) ) {
        // add settings saved message with the class of "updated"
        add_settings_error( 'reviewbucketlite_messages', 'reviewbucketlite_message', esc_html__( 'Settings Saved', 'reviewbucketlite' ), 'updated' );
        }
        // show error/update messages
        settings_errors( 'reviewbucketlite_messages' );
        ?>
        <div class="reviewbucketlite-admin-wrap">

            <ul class="settings-menu">
				<li class="active"><a href="#admin_general" class="reviewbucketlite-tab"><?php esc_html_e( 'General Settings', 'reviewbucketlite' ); ?></a></li>
				<li><a href="#admin_greview" class="reviewbucketlite-tab"><?php esc_html_e( 'Google Review Settings', 'reviewbucketlite' ); ?></a></li>
                <li><a href="#admin_reaction" class="reviewbucketlite-tab"><?php esc_html_e( 'Reaction Review Settings', 'reviewbucketlite' ); ?></a></li>
                <li><a href="#admin_gopro" class="reviewbucketlite-tab"><?php esc_html_e( 'Go Pro', 'reviewbucketlite' ); ?></a></li>
			</ul>   

			<?php 
            $reviewbucketliterev_options = get_option( 'reviewbucketlite_options' );
			?>
            <form class="admin-reviewbucketlite" method="post" action="options.php">
			    <?php settings_fields( 'reviewbucketlite-settings-group' ); ?>
                <?php do_settings_sections( 'reviewbucketlite-settings-group' ); ?>

                <div id="admin_general" class="reviewbucketlite-admin-general reviewbucketlite-active">
                    
                    <div class="inner-tab">
                        <ul>
                            <li><a href="#settings_tab" class="reviewbucketlite-inner-tab"><?php esc_html_e( 'Settings', 'reviewbucketlite' ); ?></a></li>
                            <li><a href="#shortcode_tab" class="reviewbucketlite-inner-tab"><?php esc_html_e( 'Shortcode', 'reviewbucketlite' ); ?></a></li>
                        </ul>
                    </div>

                    <div id="settings_tab" class="settings-area reviewbucketlite-inner-active">
                        <div class="reviewbucketlite-label reviewbucketlite-field-wrp">
                            <?php 
                            $trimcharacter = !empty( $reviewbucketliterev_options['trimcharacter'] ) ? $reviewbucketliterev_options['trimcharacter'] : '100';
                            ?>
                            <h5><?php esc_html_e( 'Trim Review Characters', 'reviewbucketlite' ); ?></h5>
                            <input type="number" class="input-control" name="reviewbucketlite_options[trimcharacter]" value="<?php echo esc_html( $trimcharacter ); ?>"/>
                        </div>
                        <div class="reviewbucketlite-label reviewbucketlite-field-wrp">
                            <?php
                            $dateformat = !empty( $reviewbucketliterev_options['dateformat'] ) ? $reviewbucketliterev_options['dateformat'] : 'F j, Y';
                            ?>
                            <h5><?php esc_html_e( 'Review Date Format', 'reviewbucketlite' ); ?></h5>
                            <select id="dateformat" name="reviewbucketlite_options[dateformat]">
                                <option  value="none"><?php esc_html_e( 'Select Date Format', 'reviewbucketlite' ); ?></option>
                                <option <?php selected( $dateformat, 'F j, Y' ) ?> value="F j, Y"><?php esc_html_e( 'September 7, 2019', 'reviewbucketlite' ); ?></option>
    							<option <?php selected( $dateformat, 'M j, Y' ) ?> value="M j, Y"><?php esc_html_e( 'Sep 7, 2019', 'reviewbucketlite' ); ?></option>
                                <option <?php selected( $dateformat, 'M j, y' ) ?> value="M j, y"><?php esc_html_e( 'Sep 7, 19', 'reviewbucketlite' ); ?></option>
                                <option <?php selected( $dateformat, 'F Y' ) ?> value="F Y"><?php esc_html_e( 'September 2019', 'reviewbucketlite' ); ?></option>
                                <option <?php selected( $dateformat, 'Y-m-d' ) ?> value="Y-m-d"><?php esc_html_e( '2019-09-07', 'reviewbucketlite' ); ?></option>
                                <option <?php selected( $dateformat, 'm/d/Y' ) ?> value="m/d/Y"><?php esc_html_e( '09/07/2019', 'reviewbucketlite' ); ?></option>
                                <option <?php selected( $dateformat, 'd/m/Y' ) ?> value="d/m/Y"><?php esc_html_e( '07/09/2019', 'reviewbucketlite' ); ?></option>
                            </select>
                        </div>
                        <?php
                        // Save Button                    
                        submit_button(); 
                        ?>
                    </div>

                    <div id="shortcode_tab" class="shortcode-area reviewbucketlite-hide">

                        <div class="shortcode-generator">
                            <h2><?php esc_html_e( 'Review Shortcode Generator', 'reviewbucketlite' ); ?></h2>
                            <div class="scode-generator">
                                <div class="field-group">
                                    <label><?php esc_html_e( 'Review Type', 'reviewbucketlite' ); ?></label>
                                    <select id="reviewtype">
                                        <option value=""><?php esc_html_e( 'Select Review Type', 'reviewbucketlite' ); ?></option>
                                        <option value="reviewbucketlite_google_place"><?php esc_html_e( 'Google Review', 'reviewbucketlite' ); ?></option>
                                    </select>
                                </div>

                                <div id="max_rows_wrap" class="field-group">
                                    <label><?php esc_html_e( 'Max Reviews', 'reviewbucketlite' ); ?></label>
                                    <input type="number" id="max_rows" placeholder="<?php esc_html_e( 'Max Reviews', 'reviewbucketlite' ); ?>" value="5" name="max_rows" />
                                </div>
                                <div id="min_rating_wrap" class="field-group">
                                    <label><?php esc_html_e( 'Minimum Rating', 'reviewbucketlite' ); ?></label>
                                    <input type="number" id="min_rating" placeholder="<?php esc_html_e( 'Min Rating', 'reviewbucketlite' ); ?>" value="1" name="min_rating" />
                                </div>
                                <div class="field-group">
                                    <label><?php esc_html_e( 'Padding Top', 'reviewbucketlite' ); ?></label>
                                    <div class="range-slider"></div><span class="show-range-val"></span>
                                    <input type="hidden" id="padding_top" placeholder="<?php esc_html_e( 'Padding Top', 'reviewbucketlite' ); ?>" value="0" class="range-val" name="padding_top" />
                                </div>
                                <div class="field-group">
                                    <label><?php esc_html_e( 'Padding Bottom', 'reviewbucketlite' ); ?></label>
                                    <div class="range-slider"></div><span class="show-range-val"></span>
                                    <input type="hidden" id="padding_bottom" placeholder="<?php esc_html_e( 'Padding Bottom', 'reviewbucketlite' ); ?>" value="0" class="range-val" name="padding_bottom" />
                                </div>
                                <div class="field-group">
                                    <label><?php esc_html_e( 'Background Color', 'reviewbucketlite' ); ?></label>
                                    <input type="text" id="bg_color" class="color-field" placeholder="<?php esc_html_e( 'Background Color', 'reviewbucketlite' ); ?>" value="" name="bg_color" />
                                </div>

                                <div id="reviewbucketlitestyle_wrap" class="field-group">
                                    <label><?php esc_html_e( 'Template Style', 'reviewbucketlite' ); ?></label>
                                    <select id="reviewbucketlitestyle">
                                        <option value="1"><?php esc_html_e( 'Select Template Style', 'reviewbucketlite' ); ?></option>
                                        <option value="1"><?php esc_html_e( 'Style 1 (Slider)', 'reviewbucketlite' ); ?></option>
                                        <option value="2"><?php esc_html_e( 'Style 2 (Slider)', 'reviewbucketlite' ); ?></option>
                                        <option value="3"><?php esc_html_e( 'Style 3 (Grid)', 'reviewbucketlite' ); ?></option>
                                        <option value="4"><?php esc_html_e( 'Style 4 (Slider)', 'reviewbucketlite' ); ?></option>
                                        <option value="5"><?php esc_html_e( 'Style 5 (Grid)', 'reviewbucketlite' ); ?></option>
                                        <option value="6"><?php esc_html_e( 'Style 6 (Grid)', 'reviewbucketlite' ); ?></option>
                                        <option value="7"><?php esc_html_e( 'Style 7 (Grid)', 'reviewbucketlite' ); ?></option>
                                        <option value="8"><?php esc_html_e( 'Style 8 (Grid)', 'reviewbucketlite' ); ?></option>
                                    </select>
                                </div>
                                <div id="reviewbucketlitecolumn_wrap" class="field-group">
                                    <label><?php esc_html_e( 'Column ( Apply for grid style )', 'reviewbucketlite' ); ?></label>
                                    <select id="reviewbucketlitecolumn">
                                        <option value=""><?php esc_html_e( 'Select Column', 'reviewbucketlite' ); ?></option>
                                        <option value="12"><?php esc_html_e( '1 Column', 'reviewbucketlite' ); ?></option>
                                        <option value="6"><?php esc_html_e( '2 Column', 'reviewbucketlite' ); ?></option>
                                        <option value="4"><?php esc_html_e( '3 Column', 'reviewbucketlite' ); ?></option>
                                        <option value="3"><?php esc_html_e( '4 Column', 'reviewbucketlite' ); ?></option>
                                    </select>
                                </div>

                                <div class="button-area">
                                    <span id="scodegenerate"><span class="dashicons dashicons-update-alt"></span> <?php esc_html_e( 'Generate', 'reviewbucketlite' ); ?></span>
                                    <span id="scode-copy"><span class="dashicons dashicons-admin-page"></span><?php esc_html_e( 'Copy', 'reviewbucketlite' ); ?></span>
                                </div>
                            </div>
                            <div class="scode-show"></div>
                        </div>
                    </div>

                </div>
                <!-- Google Review -->
                <div id="admin_greview" class="reviewbucketlite-admin-greview reviewbucketlite-hide">
                    <?php
                    $gookey = !empty( $reviewbucketliterev_options['gookey'] ) ? $reviewbucketliterev_options['gookey'] : '';
                    $gplaceid = !empty( $reviewbucketliterev_options['gplaceid'] ) ? $reviewbucketliterev_options['gplaceid'] : '';
                    ?>
                    <div class="reviewbucketlite-label reviewbucketlite-field-wrp">
                        <h5><?php esc_html_e( 'Set Google Api Key', 'reviewbucketlite' ); ?></h5>
                        <input type="text" class="mt-8 input-control" name="reviewbucketlite_options[gookey]" value="<?php echo esc_html( $gookey ); ?>"/>
                    </div> 
                    <div class="reviewbucketlite-label reviewbucketlite-field-wrp">
                        <h5><?php esc_html_e( 'Set Google Place ID', 'reviewbucketlite' ); ?></h5>
                        <input type="text" class="mt-8 input-control" name="reviewbucketlite_options[gplaceid]" value="<?php echo esc_html( $gplaceid ); ?>"/>
                        <p>
                        <a href="https://developers.google.com/places/place-id" target="_blank"><span class="dashicons dashicons-editor-unlink"></span> <?php esc_html_e( 'Find google Place ID', 'reviewbucketlite' ); ?></a>
                        </p>
                    </div> 
                    <?php 
                    if( $gookey && $gplaceid ):
                    ?>
                    <div class="reviewbucketlite-label reviewbucketlite-field-wrp">
                        <h5><?php esc_html_e( 'Click on the button to upload google reviews in your database.', 'reviewbucketlite' ); ?></h5>
                        <span class="status-message"></span>
                        <span class="get-google-review"><span class="dashicons dashicons-dashboard"></span> <?php esc_html_e( 'Get Google Reviews', 'reviewbucketlite' ); ?></span>
                        
                    </div> 
                    <?php
                    endif;
                    // Save Button                    
                    submit_button(); 
                    ?>
                </div>
                <!-- Reaction Review --->
                <div id="admin_reaction" class="reviewbucketlite-admin-fbreview reviewbucketlite-hide">
                    
                    <?php 

                    $args = array(
                        'post_type' => 'emoji_reaction',
                        'posts_per_page' => '-1'
                    );

                    $reaction = get_posts( $args );

                    if( !empty( $reaction ) ) {
                        echo '<h4>'.esc_html__( 'Emoji Reaction Shortcode List', 'reviewbucketlite' ).'</h4>';
                        foreach( $reaction as $val ) {
                            echo '<div class="info-wrapper danger mb-10"><p>'.esc_html( $val->post_title ).'</p><span class="emoji-shortcodearea">[revbuck_reactions_review id="'.esc_attr( $val->ID ).'"]</span> <span class="emoji-copy"><i class="dashicons dashicons-update-alt"></i></span></div>';

                        }
                    } else {
                       echo '<h4>There has no shortcode list <a target="_blank" href="'.esc_url( admin_url('edit.php?post_type=emoji_reaction') ).'">click here to create emoji reaction</a> </h4>'; 
                    }
                    ?>
                </div>
                <!-- Go Pro --->
                <div id="admin_gopro" class="reviewbucketlite-admin-fbreview reviewbucketlite-hide">
                    <div class="text-center">
                    <a target="_blank" class="button mb-10 button-primary go-pro-btn" href="https://codecanyon.net/item/reviewbucket-business-review-bundle-wordpress-plugin/25219748?_ga=2.139738996.613978736.1613668616-1919304115.1612637768"><?php esc_html_e( 'Go Pro', 'reviewbucketlite' ); ?></a>
                    <br>
                    <img src="<?php echo REVIEWBUCKETLITE_DIR_URL.'/admin/assets/preview.jpg'; ?>" />
                    </div>
                </div>
            </form>
        </div>
        <?php
    }
	
}

if( is_admin() )
    $reviewbucketlite_settings_page = new Reviewbucket_Settings_Page();

  