<?php

get_header();

if ( have_posts() ) :?>
	<div class="container">
		<div class="container2">
		<div class="row clearfix">
		<!--secondary-column-->
			<?php if(is_active_sidebar('sidebar1')){ ?>
				<div class="col-sm-3 site-sidebar">
				<div class="centered">
					<?php dynamic_sidebar( 'sidebar1' ); ?>
				</div>
				</div>
			<?php } ?>
			
	<h2>Search results for: <?php the_search_query(); ?></h2>
	<?php
	// Start the Loop.
	while ( have_posts() ) : the_post(); 
	
	get_template_part('template-parts/content', get_post_format());

	endwhile;

else:
	echo '<p>No Content Found</p>';
endif;

get_footer();