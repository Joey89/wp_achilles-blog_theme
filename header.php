<?php
	/*
		This is the template for the header

		@package achillestheme

	*/
?>
<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
	<title><?php wp_title();?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta charset="<?php echo bloginfo( 'charset' );?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php if( is_singular() && pings_open( get_queried_object() ) ): ?>
		<link rel="pingback" href="<?php echo bloginfo( 'pingback_url' );?>">
	<?php endif; ?>

	<?php

		$custom_css = esc_attr(get_option('sunset_css'));
		if(!empty($custom_css)):
			echo '<style>' . $custom_css . '</style>';
		endif;
	?>

	<?php wp_head(); ?>

	<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" );?>
</head>
<body <?php body_class(); ?>>

<?php
	$layout_widths = esc_attr( get_option('achilles_container') );
	if(@$layout_widths == 'boxed-layout'){ ?>
		<div class="container">
	<?php } else{ 
		?>
		<div class="container-fluid">
		<?php
	}
?>
	<div class="row">
		<?php 
			$header = get_option( 'header_image' );

		if($header){ ?>
			<header class="header-container background-image" style="background-image: url( <?php header_image();?> );">
		
		<?php } else { ?>
			<header class="no-header-container">
		<?php } ?>
			<div class="page-social-links">
				<?php echo get_site_social_links(); ?>
			</div><!--#page-social-links-->
			
			<div class="header-content table">
					<div class="table-cell">

			<div class="site-info col-xs-12 text-center">
				<?php
					$logo = esc_attr(get_option('achilles_logo'));
					if($logo){
						$menu_logo = esc_attr(get_option('achilles_menu_logo'));
							if($menu_logo){

							}else{
								?>
								<div class="image-container">
									<img src="<?php echo $logo; ?>" alt="logo" class="logo-image" />
									<div class="site-description-logo"><?php bloginfo('description');?></div>
								</div>

							<?php
							}


						 } else {



				?>
					<h1 class="site-title"><?php bloginfo('title');?></h1>
					<span class="site-description"><?php bloginfo('description');?></span>

					<?php } ?>
			</div><!--#site-info-->
				</div><!--table-cell-->
			</div><!--table-->
			

			
			<div class="nav-container">
				<!--Hamburger for mobile slide toggle-->
				    <div class="hamburger navbar navbar-mobile">
				    	<div class="container-fluid">
				    		<?php if($menu_logo){?>
							<div class="navbar-header">
								<div class="navbar-brand nav-logo">
									<a href=""><img src="<?php echo $logo; ?>" alt="logo" class="" /></a>
								</div>
							</div>
							<?php } ?>
				    	<div class="text-right">
							<div class="ham-icons nav navbar-nav">
								<div class="phone-icon">
						       <span class="icon-ham">&#9776;</span>
						    	</div>
							</div>
						</div>
					
						</div><!--#containter fluid-->
				    </div><!--#hamburger-->

				   <!--- <?php
							$args = array(
								'theme_location' 	=> 'primary',
								'container'			=> false,
								'menu_class'		=> 'nav mobile-nav',
								'walker'			=>new Achilles_Walker_Nav_Primary
								
							);
							wp_nav_menu( $args );
						?>
					-->
				<nav class="navbar navbar-achilles">
					<div class="container-fluid">
					<?php if($menu_logo){?>
					<div class="navbar-header">
						<div class="navbar-brand nav-logo main-achilles-nav">
							<a href=""><img src="<?php echo $logo; ?>" alt="logo" class="" /></a>
						</div>
					</div>
					<?php } ?>
	
					<?php
							$args = array(
								'theme_location' 	=> 'primary',
								'container'			=> false,
								'menu_class'		=> 'nav navbar-nav',
								'walker'			=>new Achilles_Walker_Nav_Primary
								
							);
						?>
						<div class="main-achilles-nav">
						<?php wp_nav_menu( $args );?>
						</div>
					
				<?php 
					$search_form = esc_attr( get_option('achilles_menu_search') );
					if($search_form != ''){

					?>
					<ul class="nav navbar-nav achilles-navbar-right main-achilles-nav">
				      <li><a href="#" class="menu-search"><span class="glyphicon glyphicon-search"></span></a></li>
				    </ul>

				


					</div><!--#container-fluid-->
				</nav>
				 <div class="search_menu">
					   <div class="container"><?php get_search_form(); ?>
					   </div>
				</div><!--#search_menu-->
				<?php } ?>
						
			</div><!--#nav-container-->
			
			
		</header><!--#header-->

	</div><!--#row-->

</div><!--#container-fluid-->
<div class="text-center">
<?php
		$args = array(
					'theme_location' 	=> 'primary',
					'container'			=> false,
					'menu_class'		=> 'nav mobile-nav',
					'walker'			=>new Achilles_Walker_Nav_Primary
								
				);
		wp_nav_menu( $args );
?>
</div><!--text-center-->

<?php 
	$opt_head_ad = get_option('header_ad');
?>
<?php if($opt_head_ad): ?>
	<div class="header_ad text-center">
	<?php
		echo $opt_head_ad;
	?>
	</div>
<?php endif;?>

<?php 
	$opt_head_mobile_ad = get_option('header_mobile_ad');
?>
<?php if($opt_head_mobile_ad): ?>
	<div class="header_mobile_ad text-center">
	<?php
		echo $opt_head_mobile_ad;
	?>
	</div>
<?php endif;?>
