<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
$gbs_options = get_option('gbs_setting_option');
if($attributes['type'] == 'umdc_slider') {
    $args2 = array(
      'post_type'   => 'umdc_slider',
      'posts_per_page' => 10
    );
    query_posts($args2);
?>   
<div class="clearfix five-slide">
   <ul id="image-gallery" class="gallery list-unstyled cS-hidden five-slides">
      <?php $i = 0; ?>
      <?php while ( have_posts() ) : the_post(); ?>
      <?php $videos_url2 = get_post_meta( get_the_ID(), 'slider_url', TRUE );
	  $videos_title2 = get_post_meta( get_the_ID(), 'slider_title', TRUE );
	   ?>
        <?php
          $full_img_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
          $full_img     = $full_img_url['0'];
          // if image not set.
          if( empty($full_img) ){
            $full_img = UMDC_GBS_URL.'img/no_image.png';
          }

        ?>
        <?php if($i == 0): ?> 
         <li>
         <div class="width-50 scol-1">
            <div class="post-item">
			<div class="post_title_get"><a href="<?php echo get_permalink();?>"><?php if($videos_title2 == '') the_title(); else echo $videos_title2;	 ?></a></div>
              <?php if($videos_url2 == ''){ ?>
               <a href="<?php echo get_permalink();?>">
			   <div class="overlap">
				
				</div>
                  <img src="<?php echo $full_img; ?>" />
               </a>
              <?php } else{ ?>
               
				 <?php if(has_post_thumbnail()){ ?>
			  		<a href="<?php echo get_permalink();?>">
			    		<div class="overlap">
							<img width="50" height="35" src="<?php echo UMDC_GBS_URL.'img/youtube-icon.png' ?>"  />
						</div>
						<img src="<?php echo $full_img; ?>" />
					</a>
				<?php } else { ?>
			  		<a href="<?php echo get_permalink();?>">
				  		<div class="overlap">
							<img width="50" height="35" src="<?php echo UMDC_GBS_URL.'img/youtube-icon.png' ?>"  />
						</div>
						<img src="https://i.ytimg.com/vi/<?php echo $videos_url2; ?>/hqdefault.jpg"  />
              		</a>
			    
            	<?php } ?> 

              <?php } ?>
            </div>
         </div>
         <?php endif; ?>

         <?php if($i == 1): ?>
         <div class="width-50 scol-2_5">
         <?php endif; ?>

         <?php if( ($i == 1) || ($i == 2) || ($i == 3) || ($i == 4) ): ?>
            <div class="width-50">
               <div class="post-item">
			   <div class="post_title_get"><a href="<?php echo get_permalink();?>"><?php if($videos_title2 == '') the_title(); else echo $videos_title2;	 ?></a></div>
                <?php if($videos_url2 == ''){ ?>
                  <a href="<?php echo get_permalink();?>">
                     <div class="overlap"></div>
					 <img src="<?php echo $full_img; ?>" />
                  </a>
                <?php } else{ ?>
                   <?php /*?><iframe class="ls-youtube" width="100%" height="315" src="http://www.youtube.com/embed/<?php echo $videos_url2; ?>?&rel=0&fs=0&showinfo=0&disablekb=1" frameborder="0" allowfullscreen></iframe><?php */?>
			  <a href="<?php echo get_permalink();?>">
				<div class="overlap">
					<img width="50" height="35" src="<?php echo UMDC_GBS_URL.'img/youtube-icon.png' ?>"  />
				</div>
				<img src="https://i.ytimg.com/vi/<?php echo $videos_url2; ?>/hqdefault.jpg"  />
              </a>
			    

                <?php } ?>
               </div>
            </div>
         <?php endif; ?>
          
         <?php if($i == 4 ): ?>
         </div>
         </li>
         <?php endif; ?>
         <?php           
            $i++;
         if($i == 5 ){
            $i = 0;   
         }
        ?>
<?php  endwhile; ?>
<?php wp_reset_query(); ?>
   </ul>
</div>
  <?php  }else{
  $args = array (
    'post_type'              => array( 'post'),
    'post_status'            => array( 'publish' ),
    'cat'                    => $attributes['cat_id'],
    'posts_per_page'         => -1,
    'order'                  => 'DESC',
    'orderby'                => 'date',
  );

$mdps_query = new WP_Query($args);
?>
<div class="clearfix five-slide">

   <?php if($mdps_query->have_posts()): ?>
   <ul id="image-gallery" class="gallery list-unstyled cS-hidden five-slides">
      <?php $i = 0; ?>
      <?php while($mdps_query->have_posts()): $mdps_query->the_post(); ?>
        <?php
          $full_img_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
          $full_img     = $full_img_url['0'];
          // if image not set.
        if( empty($full_img) ){
          $full_img = UMDC_GBS_URL.'img/no_image.png';
        }
        ?>
        <?php if($i == 0): ?> 
         <li>
         <div class="width-50 scol-1">
            <div class="post-item">
               <div class="post_title_get"><a href="<?php echo get_permalink();?>"><?php the_title(); ?></a></div>
               <a href="<?php echo get_permalink();?>">
			   <div class="overlap"></div>
                <img src="<?php echo $full_img; ?>" />
               </a>
            </div>
         </div>
         <?php endif; ?>

         <?php if($i == 1): ?>
         <div class="width-50 scol-2_5">
         <?php endif; ?>

         <?php if( ($i == 1) || ($i == 2) || ($i == 3) || ($i == 4) ): ?>
            <div class="width-50">
               <div class="post-item">
                  <div class="post_title_get"><a href="<?php echo get_permalink();?>"><?php the_title(); ?></a></div>
                  <a href="<?php echo get_permalink();?>">
				  <div class="overlap"></div>
                     <img src="<?php echo $full_img; ?>" />
                  </a>
               </div>
            </div>
         <?php endif; ?>
          
         <?php if($i == 4 ): ?>
         </div>
         </li>
         <?php endif; ?>
         <?php           
            $i++;
         if($i == 5 ){
            $i = 0;   
         }
        ?>
<?php  endwhile; ?>
<?php wp_reset_query(); ?>
   </ul>
<?php endif; ?>

</div>
<?php } ?>
<?php
echo "<script>
         jQuery(document).ready(function() {
          jQuery('#content-slider').lightSlider({
                  loop:true,
                  keyPress:true
              });
              jQuery('.five-slide #image-gallery').lightSlider({
                  item:1,
                  slideMargin: 0,
                  thumbItem: -1,
                  pause:".$gbs_options['umdc_pause'].",
                  auto:".$gbs_options['umdc_auto_start'].",
                  loop:".$gbs_options['umdc_enable_loop'].",
                  keyPress: ".$gbs_options['umdc_enable_keypress'].",
                  controls: ".$gbs_options['umdc_next_previous_controls'].",
                  enableTouch:".$gbs_options['umdc_enable_touch'].",
                  enableDrag:".$gbs_options['umdc_enable_drag'].",
                  pauseOnHover:".$gbs_options['umdc_pause_on_hover'].",
                  onSliderLoad: function() {
                      jQuery('.five-slide #image-gallery').removeClass('cS-hidden');
                  }  
              });
      });
   </script>";
?>





