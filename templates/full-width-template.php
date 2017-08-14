<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$gbs_options = get_option('gbs_setting_option');
// WP_Query arguments
  $args = array (
    'post_type'              => $attributes['type'],
    'post_status'            => array('publish'),
    'cat'                    => $attributes['cat_id'],
    'posts_per_page'         => 10,
    'order'                  => 'DESC',
    'orderby'                => 'date',
  );

  if($attributes['type'] == 'umdc_slider') {
		$args2 = array(
      	'post_type'   => 'umdc_slider',
      	'posts_per_page' => 10
    );
    query_posts($args2);
		?>
		<div class="clearfix single-slide">
   	<ul id="image-gallery" class="gallery list-unstyled cS-hidden one-slide">
		<?php while ( have_posts() ) : the_post();
		// Get Full Image
	        	$full_img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
	        	$full_img_url = $full_img['0'];
	        	// if image not set.
				if( empty($full_img_url) ){
					$full_img_url = UMDC_GBS_URL.'img/no_image.png';
				}
	         ?>
	         <?php $videos_url2 = get_post_meta( get_the_ID(), 'slider_url', TRUE ); 
			 $videos_title2 = get_post_meta( get_the_ID(), 'slider_title', TRUE );
			 ?>
			 <li>
				<div class="post_title_get"><a href="<?php echo get_permalink();?>"><?php if($videos_title2 == '') the_title(); else echo $videos_title2;	 ?></a></div>
	         <?php if($videos_url2 == ''){  ?>
                    
                   <a href="<?php echo get_permalink();?>">
				   <div class="overlap">
				</div>
	                    <img src="<?php echo $full_img_url; ?>" alt="image" />
	                </a>    
	                  

	         <?php	} elseif(has_post_thumbnail()){ ?>
	          
			  <a href="<?php echo get_permalink();?>">
			  <div class="overlap">
							<img width="50" height="35" src="<?php echo UMDC_GBS_URL.'img/youtube-icon.png' ?>"  />
						</div>	
			   	<img src="<?php echo $full_img_url; ?>" />
              </a>
			  <?php } else { ?>
			  <a href="<?php echo get_permalink();?>">
			  <div class="overlap">
							<img width="50" height="35" src="<?php echo UMDC_GBS_URL.'img/youtube-icon.png' ?>"  />
						</div>
				<img src="https://i.ytimg.com/vi/<?php echo $videos_url2; ?>/hqdefault.jpg"  />
              </a>
	        
	        <?php } ?>
			 </li> 
		<?php endwhile;  ?>
		<?php wp_reset_query(); ?>
		</ul>
	</div>
	<?php
		wp_reset_query(); 
  }

  else{

   // The Query
   $mdps_query = new WP_Query( $args );
   if ( $mdps_query->have_posts() ) { 
    ?>
   <div class="clearfix single-slide">
   	<ul id="image-gallery" class="gallery list-unstyled cS-hidden one-slide">
	      <?php
	    		while ( $mdps_query->have_posts() ) : $mdps_query->the_post();
	       	// Get Full Image
	        	$full_img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
	        	$full_img_url = $full_img['0'];

	        	// if image not set.
				if( empty($full_img_url) ){
					$full_img_url = UMDC_GBS_URL.'img/no_image.png';
				}
	         ?>
	        <li>
	        	<div class="post_title_get"><a href="<?php echo get_permalink();?>"><?php if($videos_title2 == '') the_title(); else echo $videos_title2;	 ?></a></div>
	        	<a href="<?php echo get_permalink();?>">
				<div class="overlap"></div>
	            <img height="400" src="<?php echo $full_img_url; ?>" alt="image" />
	            </a>
	        </li>
	      <?php  endwhile; ?>
	      <?php wp_reset_query(); ?>
	   </ul>
	</div>
	<?php
  	}
}

	echo "<script>
            jQuery(document).ready(function() {
               jQuery('#content-slider').lightSlider({
                        loop:true,
                        keyPress:true
                     });
                     jQuery('.single-slide #image-gallery').lightSlider({
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
                            jQuery('.single-slide #image-gallery').removeClass('cS-hidden');
                        }  
                    });
            });
            </script>";

?>
<!--script>
$(document).ready(function() {
$("#image-gallery:first-child .scol-1 img").load(function() {
var img_ht = $('#image-gallery').height();
$('#image-gallery li img').css('min-height', '400px !important');
//$('#image-gallery li .scol-1 img').css('height', img_ht+'px');
});
});
</script-->