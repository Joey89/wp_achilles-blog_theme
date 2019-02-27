<h1>Achilles Theme Options</h1>
<?php settings_errors(); ?>

<?php 
	
	$logo = esc_attr( get_option( 'achilles_logo' ) );
	
?>



<form method="post" action="options.php" class="achilles-general-form">
	<?php settings_fields( 'achilles-settings-group' ); ?>
	<?php do_settings_sections( 'achilles_admin' ); ?>
	<?php submit_button( 'Save Changes', 'primary', 'btnSubmit' ); ?>
</form>

	<div class="logo-container">
		<div id="achilles-logo-preview" class="achilles-logo" style="background-image: url(<?php echo $logo; ?>);"></div>
	</div>