<?php
/*
	
@package achillestheme
-- Video Post Format
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
	
<article id="post-<?php the_ID(); ?>" <?php post_class('achilles-format-video'); ?>>

	<?php 
		if(is_single()){
			echo share_social_links();
		} 
	?>
	<header class="entry-header text-center">
		<?php the_title( '<h1 class="entry-title"><a href="'. esc_url(get_permalink( )) .'" rel="bookmark">', '</a></h1>'); ?>

		<div class="entry-meta">
			<?php echo achilles_posted_meta();?>
		</div><!--#entry-meta-->
	</header><!--#header-->
	
	<div class="entry-content">
		<?php 
			echo achilles_get_embedded_media( array('video', 'iframe') );
		?>

	</div><!--#entry-content-->
	
	
	<?php if(is_single() && comments_open()){
		comments_template();
	}else{ ?>
	<footer class="entry-footer">
		<?php echo achilles_posted_footer(); ?>
	</footer><!--#entry-footer-->
	<?php } ?>
	
	<?php /*
		if(!is_single()){
			echo share_social_right();
		} */
	?>
	<div class="clearfix"></div>

	
</article>
</section><!--site-content-->