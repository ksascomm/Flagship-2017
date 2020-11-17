<?php

	//get the Feature taxonomy ID
	$latest_alumni_url = 'https://magazine.krieger.jhu.edu/wp-json/wp/v2/posts?_fields=title,link,excerpt&volume=195&categories=69';

	if ( false === ( $latest_alumni = get_transient( 'asmagazine_alumni_query' ) ) ) {
		$latest_alumni = wp_remote_get($latest_alumni_url);
		set_transient( 'asmagazine_alumni_query', $latest_alumni, 2419200 ); 
	}	
	
	// Display a error nothing is returned.
	if ( is_wp_error( $latest_alumni ) ) {
		$alumni_error_string = $latest_alumni->get_error_message();
		echo '<script>console.log("Error:' . $alumni_error_string . '")</script>';
	}

	// Get the body.
	$alumni = json_decode( wp_remote_retrieve_body( $latest_alumni ) );
	// Display a warning nothing is returned.
	if ( empty( $alumni ) ) {
		echo '<script>console.log("Error: There is no Alumni content")</script>';
	}
	// If there are posts then display them!
	if ( ! empty( $alumni ) ) :?>
	
			<div class="issue-stories slicker" id="alumni" data-equalizer>
			<?php foreach ( $alumni as $alum ) : ?>
				<div data-equalizer-watch>
					<div class="media-object">
						<div class="media-object-section">
					 		<h3><a href="<?php echo $alum->link;?>"><?php echo $alum->title->rendered;?></a></h3>
					 		<p><?php echo $alum->excerpt->rendered;?></p>
						</div>
					</div>
				</div>
			<?php endforeach;?>
			</div>
	
	<?php endif;?>