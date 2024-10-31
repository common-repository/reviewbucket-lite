<?php 
namespace ReviewbucketLite;

if( !class_exists( 'Google_Review_Template' ) ) {

class Google_Review_Template {


   public static $getData;

   function __construct( array $args ) {

      self::$getData = $args;

   }

   // Template Style 1
   public function reviewbucketlite_google_review_template_s1() {

      $iterateData = self::$getData;

      $data = $iterateData['data'];
      $atts = $iterateData['atts'];
      ?>

      <div class="revbuck-testimonial-slider owl-carousel" style="padding-top: <?php echo esc_attr( $atts['padding_top'] ); ?>px; padding-bottom: <?php echo esc_attr( $atts['padding_bottom'] ); ?>px;background-color: <?php echo esc_attr( $atts['bg_color'] ); ?>">

         <?php
         // 
         if( !empty( $data ) ):

            $reviews = array_slice( $data, 0, absint( $atts['max_rows'] ) );

            foreach ( $reviews as $value ):

               if( $value['rating'] >= $atts['min_rating'] ) :
         ?>

        <div class="revbuck-slider-testimonial google">
            <?php 
            if( !empty( $value['profile_photo_url'] ) ):
            ?>
            <div class="pic">
                <img src="<?php echo esc_url( $value['profile_photo_url'] ); ?>" alt="<?php echo esc_attr( $value['author_name'] ); ?>" />
            </div>
            <?php
            endif;
            //
            if( !empty( $value['author_name'] ) ):
            ?>
            <h3 class="title"><?php echo esc_html( $value['author_name'] ); ?></h3>
            <?php
            endif;
            ?>
            <small class="post"><?php echo esc_html( $value['relative_time_description'] ).' '.esc_html__( 'via Google', 'reviewbucketlite' ); ?></small>
            <?php 
            if( ! empty( $value['rating'] ) ):
            ?>
            <div class="revbuck-rattings">
               <?php
               reviewbucketlite_star_review( $value['rating'] );
               ?>
            </div>
            <?php 
            endif;
            //
            if( !empty( $value['text'] ) ):
            ?>
            <p class="description reviewbucketlite-review-more"><?php echo esc_html( $value['text'] ); ?></p>
            <?php 
            endif;
            ?>
        </div>
         <?php
                  endif;
            endforeach;
         else:
            echo '<p style="text-align:center">'.$data.'</p>';
         endif;

         ?>

      </div>

      <?php
   } 

   // Template style 2
   function reviewbucketlite_google_review_template_s2 () {


      $iterateData = self::$getData;

      $data = $iterateData['data'];
      $atts = $iterateData['atts'];

      ?>

         <div class="customers-testimonials-style owl-carousel google" style="padding-top: <?php echo esc_attr( $atts['padding_top'] ); ?>px; padding-bottom: <?php echo esc_attr( $atts['padding_bottom'] ); ?>px;background-color: <?php echo esc_attr( $atts['bg_color'] ); ?>">

            <!--TESTIMONIAL 1 -->
            <?php 
            if( !empty( $data ) ):

               $reviews = array_slice( $data, 0, absint( $atts['max_rows'] ) );

               foreach ( $reviews as $value ):

                  if( $value['rating'] >= $atts['min_rating'] ) :
            ?>
            <div class="item">
              <div class="shadow-effect">
                  <?php 
                  if( !empty( $value['profile_photo_url'] ) ):
                  ?>
                  <div class="reviewbucketlite-col-auto">
                     <div class=" bt-avater bt-avater-circle bt-overflow-hidden m-15px-b">
                        <img class="img-circle" src="<?php echo esc_url( $value['profile_photo_url'] ); ?>" alt="<?php echo esc_attr( $value['author_name'] ); ?>"/>
                     </div>
                  </div>
                  <?php 
                  endif;
                  ?>
                  <?php 
                  if( !empty( $value['text'] ) ):
                  ?>
                  <p class="reviewbucketlite-review-more"><?php echo esc_html( $value['text'] ); ?></p>
                  <?php
                  endif;
                  ?>
              </div>
              <div class="testimonial-name">
                 <?php
                  if( !empty( $value['author_name'] ) ):
                  ?>
                  <h4 class="bt-testimonial-grid-title bt-no-margin"><?php echo esc_html( $value['author_name'] ); ?></h4>
                  <?php
                  endif;
                  ?>
                  <p class="bt-testimonial-address bt-no-margin">
                     <?php echo esc_html( $value['relative_time_description'] ).' '.esc_html__( 'via Google', 'reviewbucketlite' ); ?>
                  </p>
                  <?php
                  if( ! empty( $value['rating'] ) ):
                  ?>
                  <div class="revbuck-rattings">
                     <?php
                     reviewbucketlite_star_review( $value['rating'] );
                     ?>
                  </div>
                  <?php 
                  endif;
                  ?>
              </div>
            </div>
            <?php
                     endif;
               endforeach;
            else:
               echo '<p style="text-align:center">'.$data.'</p>';
            endif;

            ?>

         </div>

      <?php
   }

   // Template style 3
   function reviewbucketlite_google_review_template_s3() {

      $iterateData = self::$getData;

      $data = $iterateData['data'];
      $atts = $iterateData['atts'];

   ?>

   <div class="testimonial-style-3-wrapper google" style="padding-top: <?php echo esc_attr( $atts['padding_top'] ); ?>px; padding-bottom: <?php echo esc_attr( $atts['padding_bottom'] ); ?>px;background-color: <?php echo esc_attr( $atts['bg_color'] ); ?>">
      <div class="reviewbucketlite-container">
         <div class="reviewbucketlite-row">
         <?php 
         //
         if( !empty( $data ) ):

         $reviews = array_slice( $data, 0, absint( $atts['max_rows'] ) );

         foreach ( $reviews as $value ):

            if( $value['rating'] >= $atts['min_rating'] ) :
         ?>
         <div class="reviewbucketlite-col-<?php echo esc_attr( $atts['column'] ); ?>">
         <div class="snip1390">
            <?php
            if( !empty( $value['profile_photo_url'] ) ):
            ?>
            <img class="profile" src="<?php echo esc_url( $value['profile_photo_url'] ); ?>" alt="<?php echo esc_attr( $value['author_name'] ); ?>"/>
            
            <?php 
            endif;
            ?>
           <div class="inner-caption">
            <?php
            if( !empty( $value['author_name'] ) ):
            ?>
            <h2><?php echo esc_html( $value['author_name'] ); ?></h2>
            <h4><?php echo esc_html( $value['relative_time_description'] ).' '.esc_html__( 'via Google', 'reviewbucketlite' ); ?></h4>
            <?php
            endif;
            ?>
            <?php 
               if( ! empty( $value['rating'] ) ):
            ?>
               <div class="revbuck-rattings">
                  <?php
                  reviewbucketlite_star_review( $value['rating'] );
                  ?>
               </div>
            <?php
               endif;
            //
            if( !empty( $value['text'] ) ):
            ?>
            <blockquote class="reviewbucketlite-review-more"><?php echo esc_html( $value['text'] ); ?></blockquote>
            <?php 
            endif;
            ?>
           </div>
         </div>
         </div>
         <?php
               endif;
            endforeach;
         else:
            echo '<p style="text-align:center">'.$data.'</p>';
         endif;

         ?>
        </div>
     </div>
   </div>

   <?php
   }

   // Template style 4
   function reviewbucketlite_google_review_template_s4() {

      $iterateData = self::$getData;

      $data = $iterateData['data'];
      $atts = $iterateData['atts'];

      ?>

      <div class="owl-carousel revbuck-testimonial-carousel google" style="padding-top: <?php echo esc_attr( $atts['padding_top'] ); ?>px; padding-bottom: <?php echo esc_attr( $atts['padding_bottom'] ); ?>px;background-color: <?php echo esc_attr( $atts['bg_color'] ); ?>">
         
         <?php 
         //
         if( !empty( $data ) ):

            $reviews = array_slice( $data, 0, absint( $atts['max_rows'] ) );

            foreach ( $reviews as $value ):

               if( $value['rating'] >= $atts['min_rating'] ) :
         ?>
         <!--   Testimonial 1 -->
         <div class="single-testimonial">
            <div class="revbuck-testimonials-wrapper">
               <?php 
               if( !empty( $value['text'] ) ):
               ?>
               <h4 class="reviewbucketlite-review-more"><?php echo esc_html( $value['text'] ); ?></h4>
               <?php 
               endif;
               //
               if( !empty( $value['profile_photo_url'] ) ):
               ?>
               <div class="revbuck-testimonials-blob"></div>
               <div class="revbuck-testimonials-img"><img src="<?php echo esc_url( $value['profile_photo_url'] ); ?>" alt="<?php echo esc_attr( $value['author_name'] ); ?>" /></div>
               <?php 
               endif;
               ?>
               <div class="revbuck-testimonials-person-info">
                 <p>
                  <b>
                   <?php 
                     if( !empty( $value['author_name'] ) ) {
                        echo esc_html( $value['author_name'] );
                     }
                  ?>
                  </b>
                  </p>
                  <p>
                     <?php echo esc_html( $value['relative_time_description'] ).' '.esc_html__( 'via Google', 'reviewbucketlite' ); ?>
                  </p>
                  <?php 
                  //
                  if( ! empty( $value['rating'] ) ):
                  ?>
                  <div class="revbuck-rattings">
                     <?php
                     reviewbucketlite_star_review( $value['rating'] );
                     ?>
                  </div>
                  <?php 
                  endif;
                  ?>

               </div>
            </div>
         </div>
         <?php
               endif;
            endforeach;
         else:
            echo '<p style="text-align:center">'.$data.'</p>';
         endif;
         ?>
        
      </div>

      <?php
   }

   // Template style 5
   function reviewbucketlite_google_review_template_s5() {

      $iterateData = self::$getData;

      $data = $iterateData['data'];
      $atts = $iterateData['atts'];

      ?>

      <div class="reviewbucketlite-container google" style="padding-top: <?php echo esc_attr( $atts['padding_top'] ); ?>px; padding-bottom: <?php echo esc_attr( $atts['padding_bottom'] ); ?>px;background-color: <?php echo esc_attr( $atts['bg_color'] ); ?>">
         <div class="reviewbucketlite-row">

            <?php
            //
            if( !empty( $data ) ):

               $reviews = array_slice( $data, 0, absint( $atts['max_rows'] ) );

               foreach ( $reviews as $value ):

                  if( $value['rating'] >= $atts['min_rating'] ) :
            ?>
              <div class="reviewbucketlite-col-md-<?php echo esc_attr( $atts['column'] ); ?> reviewbucketlite-col-sm-6">
                  <div class="testimonial--box-s5-wrap">
                     <?php
                     if( !empty( $value['profile_photo_url'] ) ):
                     ?>
                     <div class="service-icon"><img src="<?php echo esc_url( $value['profile_photo_url'] ); ?>" alt="<?php echo esc_attr( $value['author_name'] ); ?>"/></div>
                     <?php 
                     endif;
                     //
                     if( !empty( $value['author_name'] ) ):
                     ?>
                        <h3 class="title"><?php echo esc_html( $value['author_name'] ); ?></h3>
                     <?php 
                     endif;
                     ?>
                     <p class="rating-time">
                        <?php echo esc_html( $value['relative_time_description'] ).' '.esc_html__( 'via Google', 'reviewbucketlite' ); ?>
                     </p>
                     <?php
                     if( ! empty( $value['rating'] ) ):
                     ?>
                     <div class="revbuck-rattings">
                        <?php
                        reviewbucketlite_star_review( $value['rating'] );
                        ?>
                     </div>
                     <?php 
                     endif;
                     ?>
                     <?php
                     //
                     if( !empty( $value['text'] ) ):
                     ?>
                     <div class="description">
                        <p class="reviewbucketlite-review-more"><?php echo esc_html( $value['text'] ); ?></p>
                     </div>
                     <?php 
                     endif;
                     ?>
                  </div>
              </div>
            <?php
                     endif;
               endforeach;
            else:
               echo '<p style="text-align:center">'.$data.'</p>';
            endif;

            ?>
         </div>
      </div>


      <?php
   }

   // Template Style 6
   function reviewbucketlite_google_review_template_s6() {

      $iterateData = self::$getData;

      $data = $iterateData['data'];
      $atts = $iterateData['atts'];

      ?>

      <div class="reviewbucketlite-container google" style="padding-top: <?php echo esc_attr( $atts['padding_top'] ); ?>px; padding-bottom: <?php echo esc_attr( $atts['padding_bottom'] ); ?>px;background-color: <?php echo esc_attr( $atts['bg_color'] ); ?>">
          <div class="reviewbucketlite-row">

            <?php
            //
            if( !empty( $data ) ):

               $reviews = array_slice( $data, 0, absint( $atts['max_rows'] ) );

               foreach ( $reviews as $value ):

                  if( $value['rating'] >= $atts['min_rating'] ) :
            ?>

               <div class="reviewbucketlite-col-md-<?php echo esc_attr( $atts['column'] ); ?> reviewbucketlite-col-sm-6">
                  <div class="testimonial--box-s6-wrap">
                     <?php 
                     if( !empty( $value['profile_photo_url'] ) ):
                     ?>
                     <div class="service-icon">
                        <img src="<?php echo esc_url( $value['profile_photo_url'] ); ?>" alt="<?php echo esc_attr( $value['author_name'] ); ?>"/>
                      </div>
                     <?php
                     endif;
                     ?>
                      
                     <?php
                     if( !empty( $value['author_name'] ) ):
                     ?>
                     <h3 class="title"><?php echo esc_html( $value['author_name'] ); ?></h3>
                     <?php 
                     endif;
                     ?>
                     <?php echo esc_html( $value['relative_time_description'] ).' '.esc_html__( 'via Google', 'reviewbucketlite' ); ?>
                     <div class="revbuck-rattings">
                     <?php
                     reviewbucketlite_star_review( $value['rating'] );
                     ?>
                     </div>
                     <?php 
                     if( !empty( $value['text'] ) ):
                     ?>
                      <p class="description reviewbucketlite-review-more"><?php echo esc_html( $value['text'] ); ?></p>
                     <?php 
                     endif;
                     ?>
                  </div>
               </div>

            <?php
                     endif;
               endforeach;
            else:
               echo '<p style="text-align:center">'.$data.'</p>';
            endif;

            ?>

          </div>
      </div>

      <?php
   }

   // Template Style 7
   function reviewbucketlite_google_review_template_s7() {

      $iterateData = self::$getData;

      $data = $iterateData['data'];
      $atts = $iterateData['atts'];


      ?>
      <div class="reviewbucketlite-container google" style="padding-top: <?php echo esc_attr( $atts['padding_top'] ); ?>px; padding-bottom: <?php echo esc_attr( $atts['padding_bottom'] ); ?>px;background-color: <?php echo esc_attr( $atts['bg_color'] ); ?>">
          <div class="reviewbucketlite-row">

            <?php 
            //
            if( !empty( $data ) ):

               $reviews = array_slice( $data, 0, absint( $atts['max_rows'] ) );

               foreach ( $reviews as $value ):

                  if( $value['rating'] >= $atts['min_rating'] ) :
            ?>

              <div class="reviewbucketlite-col-md-<?php echo esc_attr( $atts['column'] ); ?> reviewbucketlite-col-sm-6">
                  <div class="testimonial--box-s7-wrap">
                     <?php 
                     if( !empty( $value['profile_photo_url'] ) ):
                     ?>
                      <div class="service-icon">
                           <img src="<?php echo esc_url( $value['profile_photo_url'] ); ?>" alt="<?php echo esc_attr( $value['author_name'] ); ?>"/>
                      </div>
                     <?php
                     endif;
                     //
                     if( !empty( $value['author_name'] ) ):
                     ?>
                      <h3 class="title"><?php echo esc_html( $value['author_name'] ); ?></h3>
                     <?php 
                     endif;
                     ?>
                     <p class="rating-date">
                     <?php echo esc_html( $value['relative_time_description'] ).' '.esc_html__( 'via Google', 'reviewbucketlite' ); ?>
                     </p>
                     <?php 
                     if( ! empty( $value['rating'] ) ):
                     ?>
                     <div class="revbuck-rattings">
                        <?php
                        reviewbucketlite_star_review( $value['rating'] );
                        ?>
                     </div>
                     <?php 
                     endif;
                     ?>
                     <?php
                     if( !empty( $value['text'] ) ):
                     ?>
                      <p class="description reviewbucketlite-review-more"><?php echo esc_html( $value['text'] ); ?></p>
                     <?php 
                     endif;
                     ?>
                  </div>
              </div>
            <?php
                  endif;
               endforeach;
            else:
               echo '<p style="text-align:center">'.$data.'</p>';
            endif;
            ?>
          </div>
      </div>

      <?php
   }

   // Template Style 8
   function reviewbucketlite_google_review_template_s8() {

      $iterateData = self::$getData;

      $data = $iterateData['data'];
      $atts = $iterateData['atts'];


      ?>
      <div class="reviewbucketlite-container google" style="padding-top: <?php echo esc_attr( $atts['padding_top'] ); ?>px; padding-bottom: <?php echo esc_attr( $atts['padding_bottom'] ); ?>px;background-color: <?php echo esc_attr( $atts['bg_color'] ); ?>">
          <div class="reviewbucketlite-row">

            <?php 
            //
            if( !empty( $data ) ):

               $reviews = array_slice( $data, 0, absint( $atts['max_rows'] ) );

               foreach ( $reviews as $value ):

                  if( $value['rating'] >= $atts['min_rating'] ) :
            ?>

               <div class="reviewbucketlite-col-md-<?php echo esc_attr( $atts['column'] ); ?> reviewbucketlite-col-sm-6">
                  <div class="revbucket8-testimonial-item">
                     <?php
                     if( !empty( $value['text'] ) ):
                     ?>
                     <div class="item-top">
                        <p class="reviewbucketlite-review-more"><?php echo esc_html( $value['text'] ); ?></p>
                     </div><!-- /.item-top -->
                     <?php 
                     endif;
                     ?>
                     <div class="item-details">
                        <?php 
                        if( !empty( $value['profile_photo_url'] ) ):
                        ?>
                        <div class="avatar">
                           <img class="rounded-circle" src="<?php echo esc_url( $value['profile_photo_url'] ); ?>" alt="<?php echo esc_attr( $value['author_name'] ); ?>">
                        </div><!-- /.avatar -->
                        <?php 
                        endif;
                        //
                        if( !empty( $value['author_name'] ) ):
                        ?>
                        <h4 class="name">
                           <?php echo esc_html( $value['author_name'] ); ?>
                        </h4><!-- /.name -->
                        <?php 
                        endif;
                        ?>
                        <span class="designation"><?php echo esc_html( $value['relative_time_description'] ).' '.esc_html__( 'via Google', 'reviewbucketlite' ); ?></span><!-- /.designation -->
                        <?php 
                        if( ! empty( $value['rating'] ) ):
                        ?>
                        <div class="revbuck-rattings">
                           <?php
                           reviewbucketlite_star_review( $value['rating'] );
                           ?>
                        </div>
                        <?php 
                        endif;
                        ?>                
                     </div><!-- /.item-details -->
                  </div>
               </div>
            <?php
                  endif;
               endforeach;
            else:
               echo '<p style="text-align:center">'.$data.'</p>';
            endif;
            ?>
          </div>
      </div>

      <?php
   }
 

} // End Class

}