<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Shape
 * @since Shape 1.0
 */
 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
get_header(); ?>
 
        <div id="primary" class="content-area">
            <div id="content" class="site-content" role="main">
 
            <?php while ( have_posts() ) : the_post(); 
			$videos_url2 = get_post_meta( get_the_ID(), 'slider_url', TRUE ); ?>	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<header class="entry-header">
		<?php if($videos_url2 !== ''){ ?>
		<iframe class="ls-youtube" width="100%" height="500" src="http://www.youtube.com/embed/<?php echo $videos_url2; ?>?&rel=0&fs=0&showinfo=0&disablekb=1" frameborder="0" allowfullscreen></iframe>
	 <?php } else { ?>
			<?php if ( ! post_password_required() && ! is_attachment() ) :
				the_post_thumbnail();
			endif; ?>
		<?php } ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>

		
		<div class="entry-content">
			<?php the_content(); ?>
			
		</div><!-- .entry-content -->
		
</article>

<?php endwhile; // end of the loop. ?>
 
            </div><!-- #content .site-content -->
        </div><!-- #primary .content-area -->
 
<?php get_sidebar(); ?>
<?php get_footer(); ?>