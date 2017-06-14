<?php
/**
 * Template part for off canvas menu
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<nav class="mobile-off-canvas-menu off-canvas position-right" id="<?php foundationpress_mobile_menu_id(); ?>" data-off-canvas data-auto-focus="false" role="navigation">
	<div class="row">
		<div class="small-12 columns">
			<form method="GET" action="<?php echo site_url('/search'); ?>" role="search">
				<div class="input-group">
					<input type="text" value="<?php echo get_search_query(); ?>" name="q" id="s" placeholder="Search this site" aria-label="search"/>
					<label for="s" class="screen-reader-text">
		                Search This Website
		            </label>
		            <div class="input-group-button">
		    			<input type="submit" class="button" value="Search &#xf002;">
		  			</div>	
				</div>
			</form>
		</div>	
	</div>
  <?php foundationpress_mobile_nav(); ?>
</nav>

<div class="off-canvas-content" data-off-canvas-content>