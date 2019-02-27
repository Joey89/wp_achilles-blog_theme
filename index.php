<?php
	/*
		This is the template for the content

		@package achillestheme

	*/
	$layout = esc_attr( get_option('achilles_layout') );
	$layout_true = false;

	//in page options needs to check for layout left and full, then need to pass float right, or full width
	if ( ! isset( $content_width ) ) $content_width = 900;
?>

<?php get_header(); ?>
	<!-- if for full width here-->
	<?php 
		$layout_widths = esc_attr( get_option('achilles_container') );

		if(@$layout_widths == 'full-width-layout'){ ?>
			<div class="container-fluid">
		<?php }else{ ?>
			<div class="container">
	<?php }
	?>
	
		<div class="container2">
		<div class="row clearfix">
			<!--secondary-column-->
			<?php 
			if($layout == 'right'){
				if(is_active_sidebar('sidebar1')){ ?>
				<div class="col-sm-3 site-sidebar col-xs-pull-right">
				<div class="centered">
					<?php 
					$layout_true = true;
					dynamic_sidebar( 'sidebar1' );
					 ?>
					 <!--widget Ad-->
						<?php
							$opt_widget_ad = get_option('below_widgets_ad') ;
							if($opt_widget_ad):
						?>
							<div class="">
								<?php echo $opt_widget_ad; ?>
							</div>
						<?php
							endif;
						?>
						<!--#widget Ad-->
				</div>
				</div>

				
			<?php }
			} else if($layout=='left'){
				if(is_active_sidebar('sidebar1')){ ?>
			
				<div class="col-sm-3 site-sidebar-left">
				<div class="centered">
					<?php 
					$layout_true = true;
					dynamic_sidebar( 'sidebar1' );
					 ?>
					 <!--widget Ad-->
						<?php
							$opt_widget_ad = get_option('below_widgets_ad') ;
							if($opt_widget_ad):
						?>
							<div class="below_widgets_ad text-center">
								<?php echo $opt_widget_ad; ?>
							</div>
						<?php
							endif;
						?>
						<!--#widget Ad-->
				</div>
				</div>
				
			<?php }
			} else if($layout == 'full'){

			} ?>
			
	

			<!--#secondary column-->

<?php
		if( have_posts() ):

			while( have_posts() ): the_post();
				
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			?>
			<div class="clearfix"></div>
			


			<!--below content ad-->
			
			<?php
				$opt_ad = get_option('below_content_ad');
				if($opt_ad):
			?>
				<div class="text-center">
					<div class="below_ads">
			<?php
						echo $opt_ad;
			?>
					</div>
				</div>
				<div class="clearfix"></div>
			<?php
				endif; //end ad 

			$menu_allowed = esc_attr(get_option('secondary_menu'));

			if($menu_allowed){
				$args = array(
					'theme_location' 	=> 'below_content',
					'container'			=> false,
					'menu_class'		=> 'menu_below_content',
					'walker'			=>new Achilles_Walker_Nav_Primary
								
				);

				wp_nav_menu( $args );
			}
			?>



			<?php
			$args = array(
				'mid_size'	=> 2,
				'prev_text'	=> __( 'Next', 'achilles' ),
				'prev_text'	=> __( 'Prev', 'achilles' ),
			);
			$pagination = get_the_posts_pagination();

			?>
				<div class="text-center clearfix">
			 		<?php echo $pagination;?>
			 	</div>
			 
			 <?php
			 	$defaults = array(
					'before'           => '<p>' . __( 'Pages:', 'achilles' ),
					'after'            => '</p>',
					'link_before'      => '',
					'link_after'       => '',
					'next_or_number'   => 'number',
					'separator'        => ' ',
					'nextpagelink'     => __( 'Next page', 'achilles' ),
					'previouspagelink' => __( 'Previous page', 'achilles' ),
					'pagelink'         => '%',
					'echo'             => 1
				);
			 
			        wp_link_pages( $defaults );

			?>
			<?php
			
		endif;
?>
	


	

	</div><!--row-->
	</div><!--container2-->
</div><!--container-->

<?php
	$scrollup = esc_attr( get_option('page_up') );
	if($scrollup){
		?>
		<a href="#" class="scroll_top"><span class="icon achilles-arrow-up2"></span></a>
<?php } ?>

<?php get_footer(); ?>