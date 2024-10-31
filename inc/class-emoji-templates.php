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

if( !class_exists( 'Emoji_template' ) ) {
	
	class Emoji_template {
		
		public $style = '';
		public $getReaction = '';
		public $postId;

		public function __construct( $args ) {

				$this->style = $args['style'];
				$this->getReaction = $args['getreaction'];
				$this->postId = $args['postid'];
		}

		public function template_style1() {
			?>
			<div class="style-1 quick-emoj-reactions" <?php echo apply_filters( 'reviewbucketlite_emoj_inline_style', $this->style ); ?>>
				<div class="quick-emoj-inner">
					<div class="revbuck-col-2 emoj-reactions-area">
						<div class="emoj-reactions-area">
							<span class="revbuck-like-btn">
								<ul class="reactions-wrap" data-template="1" data-postid="<?php echo esc_attr( get_the_ID() ); ?>">
									<li class="single-reactions" data-reaction="Like" title="Like"><img src="<?php echo REVIEWBUCKETLITE_DIR_URL ?>/assets/img/reactions_like.png" /></li>
									<li class="single-reactions" data-reaction="love" title="Love"><img src="<?php echo REVIEWBUCKETLITE_DIR_URL ?>/assets/img/reactions_love.png" /></li>
									<li class="single-reactions" data-reaction="haha" title="Haha"><img src="<?php echo REVIEWBUCKETLITE_DIR_URL ?>/assets/img/reactions_haha.png" /></li>
									<li class="single-reactions" data-reaction="wow" title="Wow"><img src="<?php echo REVIEWBUCKETLITE_DIR_URL ?>/assets/img/reactions_wow.png" /></li>
									<li class="single-reactions" data-reaction="sad" title="Sad"><img src="<?php echo REVIEWBUCKETLITE_DIR_URL ?>/assets/img/reactions_sad.png" /></li>
									<li class="single-reactions" data-reaction="angry" title="Angry"><img src="<?php echo REVIEWBUCKETLITE_DIR_URL ?>/assets/img/reactions_angry.png" /></li>
								</ul>
								<span class="like-btn-emo like-btn-default"></span> <!-- Default like button emotion-->
								<span class="like-btn-text">Like</span> <!-- Default like button text,(Like, wow, sad..) default:Like  -->
							</span>
						</div>
					</div>
					<div class="revbuck-col-2 emoj-reactions-result-area">
						<ul class="emoj-reactions-result-inner">
							<?php 
							$checkKey = array(
								'definitely-yes',
								'maybe',
								'of-course-not'
							);
							if( !empty( $this->getReaction ) ) {
								foreach( $this->getReaction as $key => $reaction ) {
								
									if( !in_array( $key, $checkKey) ) {

									echo '<li><img src="'.REVIEWBUCKETLITE_DIR_URL.'/assets/img/reactions_'.$key.'.png" /> <span class="count">'.esc_html( $reaction ).'</span></li>';
									}
								}
							}
							?>
						</ul>
					</div> 
				</div>
			</div>
			<?php
		}


	
		
	}

}

