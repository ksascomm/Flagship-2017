<?php
/**
 * The template for displaying all single People CPT
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="main-wrap sidebar-left" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>

		<!--custom breadcrumbs-->

		<ul id="breadcrumbs" class="breadcrumbs">
			<li class="item-home">
				<a class="bread-link bread-home" href="<?php echo site_url();?>" title="Home">Home</a>
			</li>
			<li class="item-parent">
				<a class="bread-parent" href="<?php echo site_url();?>/people/" title="People">People</a>
			</li>
			<li class="item-parent">
				<a class="bread-parent" href="<?php echo site_url();?>/people/leadership/" title="Dean and Leadership">Dean & Leadership</a>
			</li>
			<li class="current item"><?php echo the_title();?></li>
		</ul>



<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
		<header class="article-header">	
			<h1 class="entry-title single-title"><?php the_title(); ?></h1>
		</header>

		<div class="row bio">
			<div class="small-12 medium-4 columns">

			<?php if ( has_post_thumbnail() ) { ?> 
					<?php the_post_thumbnail('full', array(
					'class' => 'headshot',
					)); ?>
				<?php } ?>	

			</div>


			<div class="small-12 medium-8 columns end">	

			   <?php if ( get_post_meta($post->ID, 'ecpt_position', true) ) : ?>
			   		<h2><?php echo get_post_meta($post->ID, 'ecpt_position', true); ?></h2>
			   <?php endif; ?>
			    <p class="listing">
			    	<?php if ( get_post_meta($post->ID, 'ecpt_office', true) ) : ?>
			    		<span class="fa fa-map-marker-alt" aria-hidden="true"></span> <?php echo get_post_meta($post->ID, 'ecpt_office', true); ?><br>
			    	<?php endif; ?>
			    
			    	<?php if ( get_post_meta($post->ID, 'ecpt_hours', true) ) : ?>
			    		<span class="fa fa-calendar" aria-hidden="true"></span> <?php echo get_post_meta($post->ID, 'ecpt_hours', true); ?><br>
			    	<?php endif; ?>
			    
			    	<?php if ( get_post_meta($post->ID, 'ecpt_phone', true) ) : ?>
			    		<span class="fa fa-phone-square" aria-hidden="true"></span> <?php echo get_post_meta($post->ID, 'ecpt_phone', true); ?><br>
			    	<?php endif; ?>
			    
			    	<?php if ( get_post_meta($post->ID, 'ecpt_fax', true) ) : ?>
			    		<span class="fa fa-fax" aria-hidden="true"></span>  <?php echo get_post_meta($post->ID, 'ecpt_fax', true); ?><br>
			    	<?php endif; ?>
			    
			    	<?php if ( get_post_meta($post->ID, 'ecpt_email', true) ) : $email = get_post_meta($post->ID, 'ecpt_email', true); ?>
							<span class="fa fa-envelope" aria-hidden="true"></span> <a href="&#109;&#97;&#105;&#108;&#116;&#111;&#58;<?php echo email_munge($email); ?>">
							
								<?php echo email_munge($email); ?> </a><br>
						<?php endif; ?>

			    	<?php if ( get_post_meta($post->ID, 'ecpt_cv', true) ) : ?>
			    		<span class="fa fa-file-pdf" aria-hidden="true"></span> <a href="<?php echo get_post_meta($post->ID, 'ecpt_cv', true); ?>">Curriculum Vitae</a><br>
			    	<?php endif; ?>
			    
			    	<?php if ( get_post_meta($post->ID, 'ecpt_website', true) ) : ?>
			    		<span class="fa fa-globe" aria-hidden="true"></span> <a href="<?php echo get_post_meta($post->ID, 'ecpt_website', true); ?>" target="_blank">Personal Website</a><br>
			    	<?php endif; ?>
			    	<?php if ( get_post_meta($post->ID, 'ecpt_lab_website', true) ) : ?>
			    		<span class="fa fa-globe" aria-hidden="true"></span> <a href="<?php echo get_post_meta($post->ID, 'ecpt_lab_website', true); ?>" target="_blank">Group/Lab Website</a><br>
			    	<?php endif; ?>
			    	<?php if (get_post_meta($post->ID, 'ecpt_google_id', true) ) : ?>
			    		<span class="fab fa-google"></span> <a href="http://scholar.google.com/citations?user=<?php echo get_post_meta($post->ID, 'ecpt_google_id', true); ?>" target="_blank">Google Scholar Profile</a><br>
			    	<?php endif; ?>
			    	<?php if (get_post_meta($post->ID, 'ecpt_microsoft_id', true) ) : ?>
			    		<span class="fab fa-windows"></span> <a href="https://academic.microsoft.com/#/detail/<?php echo get_post_meta($post->ID, 'ecpt_microsoft_id', true); ?>" target="_blank"> Microsoft Academic Profile</a>
					<?php endif; ?>
			    </p>
		</div>
	</div>
	<?php if (has_term('', 'role') && ! has_term('job-market-candidate', 'role') ) : ?>

	<?php if ( 'Beverly Wendland' === $post->post_title ) : ?>

		<div class="row">
			<ul class="tabs margin10" data-tabs id="profile-tabs">
				<?php if ( get_post_meta($post->ID, 'ecpt_bio', true) ) : ?>
					<li class="tabs-title is-active"><a href="#bioTab">Biography</a></li>
				<?php endif; ?>
				<?php if ( get_post_meta($post->ID, 'ecpt_research', true) ) : ?>
					 <li class="tabs-title"><a href="#researchTab">Research</a></li>
				<?php endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_teaching', true) ) : ?>
					 <li class="tabs-title"><a href="#teachingTab">Teaching</a></li>
				<?php endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_publications', true) ) : ?>
						 <li class="tabs-title"><a href="#publicationsTab">Publications</a></li>
				<?php endif; ?>
				<?php if ( get_post_meta($post->ID, 'ecpt_extra_tab_title', true) ) : ?>
					 <li class="tabs-title"><a href="#extraTab"><?php echo get_post_meta($post->ID, 'ecpt_extra_tab_title', true); ?></a></li>
				<?php endif; ?>
				<?php if ( get_post_meta($post->ID, 'ecpt_extra_tab_title2', true) ) : ?>
					 <li class="tabs-title"><a href="#extra2Tab"><?php echo get_post_meta($post->ID, 'ecpt_extra_tab_title2', true); ?></a></li>
				<?php endif; ?>			  
			</ul>
			
			<div class="tabs-content" data-tabs-content="profile-tabs">		
				<?php if ( get_post_meta($post->ID, 'ecpt_bio', true) ) : ?>
					<div class="tabs-panel is-active" id="bioTab">
						<?php echo get_post_meta($post->ID, 'ecpt_bio', true); ?>
					</div>
				<?php endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_research', true) ) : ?>
					 <div class="tabs-panel" id="researchTab"><?php echo get_post_meta($post->ID, 'ecpt_research', true); ?></div>
				<?php endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_teaching', true) ) : ?>
					 <div class="tabs-panel" id="teachingTab"><?php echo get_post_meta($post->ID, 'ecpt_teaching', true); ?></div>
				<?php endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_publications', true) ) : ?>
					 <div class="tabs-panel" id="publicationsTab">
						<?php if ( get_post_meta($post->ID, 'ecpt_publications', true) ) : echo get_post_meta($post->ID, 'ecpt_publications', true); endif; ?>
					</div>
				<?php endif; ?>
			
				<?php if ( get_post_meta($post->ID, 'ecpt_extra_tab', true) ) : ?>
					 <div class="tabs-panel"  id="extraTab"><?php echo get_post_meta($post->ID, 'ecpt_extra_tab', true); ?></div>
				<?php endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_extra_tab2', true) ) : ?>
					 <div class="tabs-panel" id="extra2Tab"><?php echo get_post_meta($post->ID, 'ecpt_extra_tab2', true); ?></div>
				<?php endif; ?>			
			</div>
		</div>
	
	<?php else :?>

		<p><?php echo get_post_meta($post->ID, 'ecpt_bio', true); ?></p>
		
	<?php endif; endif; ?>
	</article>
<?php endwhile; endif; ?>
<?php do_action( 'foundationpress_after_content' ); ?>
<?php get_sidebar(); ?>
</div>
<?php get_footer();
