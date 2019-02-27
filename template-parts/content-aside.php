<?php
	/*
		@package sunsettheme
		-- Aside Post Format

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

<article id="post-<?php the_ID(); ?>" <?php post_class('achilles-format-aside'); ?>>
	<?php 
		if(is_single()){
			echo share_social_links();
		}
	?>
	<div class="aside-container">
	<div class="row">
		<div class="col-xs-12 col-sm-4 col-md-2 text-center">

			<?php if( achilles_get_attachment() ):
			?>
			<div class="aside-featured background-image" style="background-image: url(<?php echo achilles_get_attachment(); ?>);">
			</div><!--#standard-featured-->
			<?php endif; ?>

		</div><!--#image col-md-3-->


		<div class="col-xs-12 col-sm-8 col-md-10 xs-mg-top">

			<header class="entry-header">
				<div class="entry-meta">
					<?php echo achilles_posted_meta(); ?>
				</div><!--#entry-meta-->
			</header>

			<div class="entry-content">
				
				<div class="entry-excerpt">
					<?php the_content(); ?>
				</div><!--#entry-excerpt-->

			</div><!--#entry-content-->
			
		</div><!-- #col-md-9 -->
	
	</div><!--#row-->
	

	<?php if(is_single() && comments_open()){
		comments_template();
	}else{ ?>
	<footer class="entry-footer">
		<div class="row">
			<div class="col-sm-12 col-sm-offset-0 col-md-10 col-md-offset-0">
				<?php echo achilles_posted_footer(); ?>
				<?php //echo share_social_right(); ?>
			</div><!-- #col-md-10 -->
		</div><!--#row-->
	</footer>
	<?php } ?>
	</div><!--#Aside container-->
</article>
</section><!--site-content-->