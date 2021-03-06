<?php
/**
 * The default template for displaying PT Grad Fields of Study
 *
 * Used for both single and index/archive/search.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class('main-content') ?>>

	<img src="<?php echo get_post_meta($post->ID, 'ecpt_image', true); ?>" alt="<?php the_title(); ?>" class="radius10">
	
	<h1><?php the_title(); ?></h1>

	<div class="entry-content">
		<div class="row study-fields-contact">			
			<?php if ( get_post_meta($post->ID, 'ecpt_homepage', true) ) : ?>
				<div class="website">
					<span class="fas fa-globe"></span> 
					<a href="http://<?php echo get_post_meta($post->ID, 'ecpt_homepage', true); ?>" onclick="ga('send','event','Outgoing Links','<?php echo get_post_meta($post->ID, 'ecpt_homepage', true); ?>')">
						<?php the_title(); ?> Website
					</a>
				</div>
			<?php endif; ?>
			<?php if ( get_post_meta($post->ID, 'ecpt_emailaddress', true) ) : ?>
				<div class="email">
					<span class="fas fa-envelope"></span> 
					<a href="mailto:<?php echo get_post_meta($post->ID, 'ecpt_emailaddress', true); ?>">
						<?php echo get_post_meta($post->ID, 'ecpt_emailaddress', true);?>
					</a>
				</div>	
			<?php endif; ?>
			<?php if ( get_post_meta($post->ID, 'ecpt_location', true) ) : ?>
				<div class="office">
					<span class="fas fa-map-marker"></span>  <?php echo get_post_meta($post->ID, 'ecpt_location', true); ?>
				</div>
			<?php endif; ?>	
		</div>
		<div class="row study-fields-contact">
			<?php if (get_post_meta($post->ID, 'ecpt_degreesoffered', true) ) : ?>
				<h4>Degrees Offered: <small><?php echo get_post_meta($post->ID, 'ecpt_degreesoffered', true); ?></small></h4>	
			<?php endif; ?>
		</div>
		<?php if ( get_post_meta($post->ID, 'ecpt_section1', true) ) :  echo get_post_meta($post->ID, 'ecpt_section1', true);  endif; ?>
					
		<?php if ( get_post_meta($post->ID, 'ecpt_section2content', true) ) :?>  
				<h3>What can you do with your degree?</h3>
			<?php echo get_post_meta($post->ID, 'ecpt_section2content', true);  endif; ?>
		
		<?php if ( get_post_meta($post->ID, 'ecpt_section3heading', true) ) : ?><h3><?php echo get_post_meta($post->ID, 'ecpt_section3heading', true) ?></h3><?php elseif (get_post_meta($post->ID, 'ecpt_section3content', true) ) : ?>
			<h3>Related Programs and Centers</h3>
		<?php endif; ?>
		<?php if ( get_post_meta($post->ID, 'ecpt_section3content', true) ) :  echo get_post_meta($post->ID, 'ecpt_section3content', true);  endif; ?>

	</div>

</div>
