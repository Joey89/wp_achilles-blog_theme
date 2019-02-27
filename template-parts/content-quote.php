<?php
/*
	
@package achillestheme
-- Quote Post Format
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
<article id="post-<?php the_ID(); ?>" <?php post_class('achilles-format-quote'); ?>>
	<?php  
		if(is_single()){
			echo share_social_links(); 
		}
	?>
	<header class="entry-header text-center">
	
		<div class="row">
			<div class="col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2">

			<h1 class="quote-content">
				<a href="<?php the_permalink();?>" rel="bookmark">
					<?php echo get_the_content(); ?>
				</a>
			</h1>
			<?php the_title( '<h2 class="quote-author">- ', ' -</h2>'); ?>

			</div><!--col-md-8-->
		</div><!--#Row-->
		
	</header>
	

	<?php if(is_single() && comments_open()){
		comments_template();
	}else{ ?>
		<footer class="entry-footer">
			<?php echo achilles_posted_footer(); ?>
		</footer>
	<?php } ?>

	<?php /*
		if(!is_single()){
			echo share_social_right(); 
		}*/
	?>

	<div class="clearfix"></div>
</article>
</section><!--site-content-->