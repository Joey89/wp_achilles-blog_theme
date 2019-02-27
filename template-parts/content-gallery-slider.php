<?php
/*
	
@package achillestheme
-- Standard Post Format
*/
$layout = esc_attr( get_option('achilles_layout') );
?>
<?php if(is_active_sidebar('sidebar1') && $layout == 'left' || $layout == 'right'){ 
	if($layout == 'left'){
		?>
		<section class="col-sm-9 col-xs-12 site-content right-content">
		<?php
	}else{
		?>
		<section class="col-sm-9 col-xs-12 site-content">
		<?php
	}
	?>
<?php
}else{
?>
	<section class="col-xs-12 site-content">
<?php
}
?>		
<article id="post-<?php the_ID(); ?>" <?php post_class( 'achilles-format-gallery' ); ?>>

		<?php if(achilles_get_attachment()): ?>
			<div id="post-gallery-<?php the_ID(); ?>" class="carousel slide achilles-carousel-thumb" data-ride="carousel">
				
				<div class="carousel-inner" role="listbox">
					
					<?php 

						$attachments = achilles_get_bs_slides( achilles_get_attachment(7) );
						foreach($attachments as $attachment):
					?>
					
							<div class="item<?php echo $attachment['class']; ?> background-image standard-featured" style="background-image: url( <?php echo $attachment['url'];?> );">
								
								<div class="hide next-image-preview" data-image="<?php echo $attachment['next_img']; ?>"></div>
								<div class="hide prev-image-preview" data-image="<?php echo $attachment['prev_img']; ?>"></div>
								
								<div class="entry-excerpt image-caption">
									<p><?php echo $attachment['caption']; ?>
									</p>
								</div>
							</div>
					
					<?php endforeach; ?>
					
				</div><!-- .carousel-inner -->
				
				<a class="left carousel-control" href="#post-gallery-<?php the_ID(); ?>" role="button" data-slide="prev">
					<div class="table">
						<div class="table-cell">
							
							<div class="preview-container">
								<span class="thumbnail-container background-image"></span>
								<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</div><!-- .preview-container -->
							
						</div><!-- .table-cell -->
					</div><!-- .table -->
				</a>
				<a class="right carousel-control" href="#post-gallery-<?php the_ID(); ?>" role="button" data-slide="next">
					<div class="table">
						<div class="table-cell">
							
							<div class="preview-container">
								<span class="thumbnail-container background-image"></span>
								<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</div><!-- .preview-container -->
							
						</div><!-- .table-cell -->
					</div><!-- .table -->
				</a>
				
			</div><!-- .carousel -->
			
		<?php endif; ?>
		
		<?php /*
		if(!is_single()){
			echo share_social_links();
		}*/
		?>

		<?php the_title( '<h1 class="entry-title"><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h1>'); ?>
		
		<div class="entry-meta">
			<?php echo achilles_posted_meta(); ?>
		</div>
		
	</header>
	

	

	<div class="entry-content">
	
		<div class="entry-excerpt">
		<?php if( is_single() ){
			the_content();
		}else{
			the_excerpt();
		}?>
	</div><!--#entry-excerpt-->
	</div><!--#entry-content-->


	
	<?php if(is_single()){

	}else{ ?>
	<footer class="entry-footer">
		<?php echo achilles_posted_footer(); ?>
	</footer><!--#entry-footer-->

	<div class="button-container col-xs-6 text-right">
		<a href="<?php the_permalink(); ?>" class="btn btn-achilles">
			<?php _e( 'Read More'  , 'achilles'); ?>
		</a>
	</div><!--#button-container-->
	<?php } ?>
	<?php if(is_single() && comments_open()){
		comments_template();
	}else{ ?>
	
	<?php } ?>
<div class="clearfix"></div>
	
</article>
</section>