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
			the_content();
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