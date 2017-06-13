<?php
// If a featured image is set, insert into layout and use Interchange
// to select the optimal image size per named media query.
if ( has_post_thumbnail( $post->ID ) ) : ?>
	<header class="featured-hero" role="banner" data-interchange="[<?php echo the_post_thumbnail_url('featured-small'); ?>, small], [<?php echo the_post_thumbnail_url('featured-medium'); ?>, medium], [<?php echo the_post_thumbnail_url('featured-large'); ?>, large], [<?php echo the_post_thumbnail_url('featured-xlarge'); ?>, xlarge]">

		<?php if(is_page(array('About', 'Academics', 'Apply', 'People')) ): ?>
			<div class="row">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</div>	
		</header>
	<?php else: ?>
		</header>
		<div class="row">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</div>	
	<?php endif;?>


<?php endif;
