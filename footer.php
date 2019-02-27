<?php
	/*
		This is the template for the footer

		@package achillestheme

	*/
?>

<?php
	$layout_widths = esc_attr( get_option('achilles_container') );
	if(@$layout_widths == 'boxed-layout'){ ?>
		<div class="container">
	<?php }
?>
<footer class="page-footer">
	<div id="footer_area_1" class="primary-sidebar widget-area footer-widgets" role="complementary">
		<div class="container">
		<?php 
			
			if(is_active_sidebar('footer_area_1')){
				dynamic_sidebar( 'footer_area_1' ); 
			
			}
		  ?>
		</div>
	</div><!--#footer-area-->
	<div class="clearfix"></div>

	<div class="text-center">
	<?php $opt = esc_attr( get_option('footer_text') ); ?>

	<?php if($opt != ''){
		echo $opt;
	}else{
		echo bloginfo('name');
		?> 
		&copy; 
		<?php echo the_date('Y');
	} ?>
	</div>
</footer>


<?php
	$layout_widths = esc_attr( get_option('achilles_container') );
	if(@$layout_widths == 'boxed-layout'){ ?>
		</div>
	<?php }
?>


<?php wp_footer(); ?>


</body>
</html>