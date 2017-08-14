=== Ultimate Multi Design Video Carousel ===
Contributors: gbsdeveloper
Donate Link: http://globalbizsol.com/donation
Tags: post slider,video slider,youtube slider, responsive post slider,category slider,image slider,Multipost Carousel,fullwidth slider,responsive image slider, video slider wordpress
Requires at least: 3.5
Tested up to: 4.6.1
Stable tag: 1.1
License: 
License URI: 


This is a unique slider plugin which provides facility to include youtube videos in the slider with post. Slider can be easily created using shortcode provided by plugin.

== Description ==
Ultimate Multi Design Carousel is plugin which is used to create a slider which can show the youtube videos. 
This plugin provides the facility to create two different types of slider.

1. Slider of normal Posts filtered by category id.
2. Slider of Custom Post Type "UMDC Slider" 

Youtube videos can be inserted in the custom post type "UMDC Slider" by putting video url id and video title in the provided fields. 
For example : 
Youtube Video Url : https://www.youtube.com/watch?v=wCpGVkH_S2U
So here Url id : wCpGVkH_S2U

If there is no Video Url id provided, then the featured image of the post will be viewed in the slider.

No need of any programming skills, some options are by default set and user can also set the options by there own by just installing the plugin. 
Slider setting can be done from the WordPress admin Settings -> Ultimate Multi Design.

Slider can be created using the shortcode provided by plugin.

<h4>Features:</h4>
1. Display post on slider by category id and Custom Post Type.
2. Insert Youtube videos in post by video url id.
2. You can display the post according to your wish such as 1,3, and 5 per slides.
3. Easy to add the shortcode.

<a href="http://plugin.globalbizsol.com/ultimate-multi-design-video-carousel">DEMO LINK</a>



<h4>Shortcode:</h4>
We are having two types of shortcode one is for post type "post" and another one is for post type slider

For post type "post".
<pre>[gbs-slider type="post" cat_id="1" layout="five-slides"]</pre>
OR
<pre>[gbs-slider type="post" cat_id="1" layout="three-slides"]</pre>
OR
<pre>[gbs-slider type="post" cat_id="1" layout="full-width"]</pre>

For post type umdc_slider.

<pre>[gbs-slider type="umdc_slider" layout="five-slides"]</pre>
OR
<pre>[gbs-slider type="umdc_slider" layout="three-slides"]</pre>
OR
<pre>[gbs-slider type="umdc_slider" layout="full-width"]</pre>  We have 24x7 email support on webcrushing@gmail.com so you can let us know if you are having any kind of issues in configuring our plugin. In case you have any query feel free to contact us.

<h4>Donate us</h4>
Donate us to provide your support to our plugin development team. <br> Donate us at : http://www.globalbizsol.com/donation

== Installation ==
1. Upload Ultimate-Multi-Designs-Carousel.zip to the /wp-content/plugins/ directory.
2. Unzip Ultimate-Multi-Designs-Carousel.zip
3. Activate the plugin through the 'Plugins' in WordPress.
4. You will find 'Ultimate Multi Design' under Settings in your WordPress admin panel.

== Frequently Asked Questions ==
= How to use plugin ? =
Just Use this shorcode to create slider of normal posts with category id "1":
<pre>[gbs-slider type="post" cat_id="1" layout="full-width"]</pre>

Just Use this shorcode to create slider of posts of custom post type "UMDC slider":
<pre>[gbs-slider type="umdc_slider" layout="full-width"]</pre> 

= How to put Video url id? =
Only Youtube videos can be added to the post.
The id of youtube video is taken from its url and put in the "Video Url Id" field in the post.

== Screenshots ==

1. These are the settings for the UMDC slider plugin in the WordPress admin.
2. To include youtube video in the Custom Post Type "UMDC Slider" posts, please put Video Title and Youtube video id in the mentioned fields under post.
3. User can also set the featured image for the posts.
4. Here is slider created for custom post type "UMDC Slider" by using shortcode : [gbs-slider type="umdc_slider" layout="full-width"].
5. Here is slider created by custom post type "UMDC Slider" using shortcode : [gbs-slider type="umdc_slider" layout="three-slides"]. 
6. Here is slider created custom post type "UMDC Slider" by using shortcode : [gbs-slider type="umdc_slider" layout="five-slides"].
7. Here is slider created to show normal posts with category id "1" by using shortcode : [gbs-slider type="post" cat_id="1" layout="full-width"].
8. Here is slider created to show normal posts with category id "1" by using shortcode : [gbs-slider type="post" cat_id="1" layout="three-slides"].
9. Here is slider created to show normal posts with category id "1" by using shortcode : [gbs-slider type="post" cat_id="1" layout="five-slides"].

== Changelog ==
= 1.1 =
Here are some of the updates done in the plugin for making it easy to use and understand for front end user.

1. We have added a hover effect on the posts on the slider.
2. If there is a Video URL ID in the field within the post with no featured image then video thumbnail will appear in the slider. When anyone hover on such post, the YouTube video play icon will appear there with hover effect.
3. If there is a featured image set in the post then it will appear on the slider.
4. If Video Title is set in the post then it will appear on slider with the post.
5. We have also created a single post template for viewing the "UMDC Slider" posts within the plugin.
6. User can put that template file "single-umdc_slider.php" in the theme and posts will be viewed from the theme's template. If template is not put in the theme, posts of type "UMDC Slider" will be viewed from the plugin's template.

= 1.0 =
Initial Release.