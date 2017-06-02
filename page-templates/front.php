<?php
/*
Template Name: Front
*/
get_header(); ?>
<!--ORBIT SLIDER -->

<?php $flagship_evergreen_query = new WP_Query(array(
   'post_type' => 'evergreen',
   'orderby' => 'rand',
   'post_status' => 'publish',
   'posts_per_page' => '3'));

if ( $flagship_evergreen_query->have_posts() ) : ?>

<div class="hero">
<div class="fullscreen-image-slider">
  <div class="orbit" role="region" aria-label="FullScreen Pictures" data-orbit>
    <ul class="orbit-container">
     <?php if ($flagship_evergreen_query->post_count > 1) : ?>
      <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
      <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
      <?php endif;?>
      <?php while ($flagship_evergreen_query->have_posts()) : $flagship_evergreen_query->the_post(); ?>
      <li class="is-active orbit-slide">
        <img class="orbit-image" src="<?php echo get_post_meta($post->ID, 'ecpt_fullimage', true); ?>">
        <figcaption class="orbit-caption">
        <div class="row">
        <div class="small-push-1 columns">
          <h1><?php the_title(); ?></h1>
          <p><?php the_content(); ?></p>
         </div>
         </div>
        </figcaption>
      </li>
     <?php endwhile;?>
    </ul>
	<nav class="orbit-bullets">
	  <?php $entries = $flagship_evergreen_query->post_count; ?>
	  <?php for($i=0; $i<$entries; $i++) { ?>
	    <button class="<?php echo $i==0 ? 'is-active' : '' ?>" data-slide="<?php echo $i; ?>"></button>
	  <?php } ?>
	</nav>   
  </div>
</div>
</div>
<?php endif; ?>

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
<section class="intro" role="main">
	<div class="fp-intro">
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
			<div class="entry-content programs">
				<h1>Find Your Program</h1>
					<div class="row hide-for-small-only small-up-1 medium-up-2 large-up-5">
					    <div class="column column-block">
					    	<div class="block-text">
					    	<a href="academics/departments-programs-and-centers" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Departments');">
					        	<img src="<?php echo get_template_directory_uri() ?>/assets/images/frontpage/dept.jpg" class="big_image thumbnail" alt="">
					        	<div class="overlay_text"><h2>Departments</h2></div>
					        </a>
					        </div>
					    </div>
					    <div class="column column-block major">
					    	<div class="block-text">
					    	<a href="academics/majors-minors" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Majors/Minors');">
					        	<img src="<?php echo get_template_directory_uri() ?>/assets/images/frontpage/major.jpg" class="thumbnail" alt="">
					        <div class="overlay_text"><h2>Majors & Minors</h2></div>
					        </a>
					    </div>
					    </div>
					    <div class="column column-block under">
					    	<div class="block-text">
					    	<a href="academics/fields/#filter=.undergrad_program" data-filter=".undergrad_program" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Undergraduate');">
					    		<img src="<?php echo get_template_directory_uri() ?>/assets/images/frontpage/under.jpg" class="thumbnail" alt="">
					    		<div class="overlay_text"><h2>Undergraduate</h2></div>
					    	</a>
					    </div>
					    </div>
					    <div class="column column-block gradft">
					    	<div class="block-text">
					    	<a href="academics/#filter=.full_time_program" data-filter=".full_time_program" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Graduate FT');">
					    		<img src="<?php echo get_template_directory_uri() ?>/assets/images/frontpage/gradft.jpg" class="thumbnail" alt="">
					    		<div class="overlay_text"><h2>Graduate<br><small>Full Time Masters & Doctorates</small></h2></div>
					    	</a>
					    </div>
					    </div>
					    <div class="column column-block gradpt">
					    	<div class="block-text">
					    	<a href="academics/fields/#filter=.part_time_program" data-filter=".full_time_program" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Graduate PT');">
					    		<img src="<?php echo get_template_directory_uri() ?>/assets/images/frontpage/gradpt.jpg" class="thumbnail" alt="">
					    		<div class="overlay_text"><h2>Graduate<br><small>Online Masters & Certificates</small></span></h2></div>
					    	</a>
					    </div>
					    </div>
					</div>

				<div class="row show-for-small hide-for-medium">
					<ul class="vertical menu programs">
						<li><a class="button" href="#">Undergraduate</a></li>
						<li><a class="button" href="#">Full-Time Masters & Doctorates</a></li>
						<li><a class="button" href="#">Part-Time Online Masters & Certificates</a></li>
						<li><a class="button" href="#">List of Departments</a></li>
						<li><a class="button" href="#">List of Majors & Minors</a></li>
					</ul>
				</div>
				<?php the_content(); ?>
			</div>
		</div>

	</div>

</section>
<?php endwhile;?>
<?php do_action( 'foundationpress_after_content' ); ?>

<div class="section-divider">
	<hr />
</div>

<div class="grey-bg">

<section class="news">
	
	<ul class="tabs" data-responsive-accordion-tabs="accordion medium-tabs" id="example-tabs">
	    <li class="tabs-title is-active"><a href="#panel1" aria-selected="true">Spotlight</a></li>
	    <li class="tabs-title"><a href="#panel2">News</a></li>
	    <li class="tabs-title"><a href="#panel3">Events</a></li>
	</ul>

	<div class="tabs-content" data-tabs-content="example-tabs">

	    <div class="tabs-panel is-active" id="panel1">
	   
	    <?php $homepage_query = new WP_Query(array(	
			'post_type' => array('deptextra', 'post'),
			'category_name' => 'spotlight',
			'posts_per_page' => '1'				
			)); 
	    	if ( $homepage_query->have_posts() ) : while ( $homepage_query->have_posts() ) : $homepage_query->the_post();
	    	$format = get_post_format();
	    	if ( false === $format ) {
	    		$format = 'standard'; }
	    		if ( $format == 'video' ) : locate_template('template-parts/home-video.php', true, false); endif;
				if ( $format == 'standard' ) : locate_template('template-parts/home-news.php', true, false); endif;?>
		<?php endwhile; endif; ?>
	   
	    </div>
	    <div class="tabs-panel" id="panel2">
	     
	     <?php get_template_part( 'template-parts/hub-news' ); ?>

	    </div>
	    <div class="tabs-panel" id="panel3">
		<?php get_template_part( 'template-parts/hub-events' ); ?>
	    </div>

    </div>
          <hr>

</section>
</div>
<div class="section-divider">
	<hr />
</div>

<section class="connect">
<h3>Connect</h3>
	<div class="youtube grey-bg">
	<?php $connect_video_query = new WP_Query(array(	
		'post_type' => array('deptextra', 'post'),
		'category_name' => 'homepage',
		'posts_per_page' => '1',
		'tax_query' => array(
			'taxonomy' => 'post_format',
			'field' => 'slug',
			'terms' => 'post-format-video',
			'operator' => 'IN'
			))); 
		
		if ( $connect_video_query->have_posts() ) : while ( $connect_video_query->have_posts() ) : $connect_video_query->the_post(); 
		 
		 locate_template('template-parts/connect-video.php', true, false);

		endwhile; endif; ?>
		    	
	</div>
	<div class="twitter">
	<?php $tweets = kebo_twitter_get_tweets(); ?>

<?php $i = 0; ?>

<?php if ( isset( $tweets->{0}->created_at ) ) : ?>

    <?php foreach ($tweets as $tweet) : ?>
    	<article <?php post_class('main-content') ?>>
    	<img src="<?php echo $tweet->entities->media[0]->media_url;?>">
    	<h1>Around Campus with <a href="http://twitter.com/<?php echo $tweet->user->screen_name // Author display name ?>">@<?php echo $tweet->user->screen_name;?> <span class="fa fa-twitter-square"></span></a></h1>	
    	<?php $date = $tweet->created_at; ?>
    	<div class="callout">
    	<p><?php echo $tweet->text;?></p>
    	<!--<p><?php echo date('m/d/Y', strtotime($date));?></p>-->
    	</div>
        <?php if (++$i == 1) break; ?>
		</article>
    <?php endforeach; ?>

<?php else : ?>

    <p>Sorry, the Tweet data is not in the expected format.</p>

<?php endif; ?>
	</div>
</section>


<div class="section-divider">
	<hr />
</div>


<section class="giving">

	<div class="marketing-site-hero">
	  <div class="marketing-site-hero-content">
	    <h1>Support the Krieger School</h1>
	    <p class="subheader">The School of Arts and Sciences plays a vital role within Johns Hopkins University, housing the disciplines of the humanities and natural and social sciences from which all other courses of study stem.</p>
	    <a href="/giving" class="button">Find Out More</a>
	  </div>
	</div>

</section>

<?php get_footer();
