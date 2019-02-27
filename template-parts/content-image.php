<?php
/*
	
@package achillestheme
-- image Post Format
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
<article id="post-<?php the_ID(); ?>" <?php post_class('achilles-format-image'); ?>>
	<?php 
			if(is_single()){
				echo share_social_links(); 
			} 
		 ?>
	<header class="entry-header text-center background-image" style="background-image: url(<?php echo achilles_get_attachment(); ?>);">
		
		<?php the_title( '<h1 class="entry-title"><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h1>'); ?>
		
		<div class="entry-meta">
			<?php echo achilles_posted_meta(); ?>
		</div>
		
		<div class="entry-excerpt image-caption">
			<?php the_excerpt(); ?>
		</div>
		
	</header>
	

	<footer class="entry-footer">
		<?php /*
			if(!is_single()){
				echo achilles_posted_footer();
				echo share_social_right(); 
			} */
		 ?>
	</footer>
	

	
</article>

<?php if(is_single() && comments_open()){
		comments_template();
	}else{ ?>
	
	<?php } ?>

</section><!--site-content-->