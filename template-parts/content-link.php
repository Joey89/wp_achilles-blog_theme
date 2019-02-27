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
<article id="post-<?php the_ID(); ?>" <?php post_class('achilles-format-link'); ?>>

	<header class="entry-header text-center">
		<?php 
		$link = achilles_grab_url();
		the_title( '<h1 class="entry-title"><a href="'.$link.'" target="_blank" rel="bookmark">', '<div class="achilles-link-bg"><span class="icon achilles-link"></span></div></a></h1>'); 

		?>

		
	</header>

<div class="clearfix"></div>
</article>
</section><!--site-content-->