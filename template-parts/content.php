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



<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
		
	<?php if( achilles_get_attachment() ):?>
	<a class="standard-featured-link" href="<?php the_permalink(); ?>">
		<div class="standard-featured background-image" style="background-image: url(<?php echo achilles_get_attachment(); ?>);">
		</div><!--#standard-featured-->
	</a>
	<?php endif; ?>
	</div><!--#entry-content-->

	<?php 
	/*if(!is_single()){
		echo share_social_links();
	}*/
	?>

	<div class="entry-excerpt clearfix">
		<?php if( is_single() || is_page() ){
			the_content();
		}else{
			if(achilles_has_shortcode()){
				the_content();
			}else{
				the_excerpt();
			}
		}?>
	</div><!--#entry-excerpt-->
	<?php if(is_single() || is_page() ){

	}else{ ?>
	
	<footer class="entry-footer">
		<?php echo achilles_posted_footer(); ?>
	</footer><!--#entry-footer-->

	<div class="button-container col-xs-6 text-right">
		<a href="<?php the_permalink(); ?>" class="btn btn-achilles">
			<?php _e( 'Read More' , 'achilles'); ?>
		</a>
	</div><!--#button-container-->
	<?php } ?>
	<?php if(is_single() && comments_open()){
		comments_template();
	}
	?>


	<div class="clearfix"></div>
</article>

</section><!--site-content-->


