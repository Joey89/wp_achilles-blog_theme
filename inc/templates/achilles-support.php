<h1>Theme Support</h1>
<?php settings_errors(); ?>

<form method="post" action="options.php">
	<?php settings_fields( 'achilles-support' ); ?>
	<?php do_settings_sections( 'achilles_support_options' ); ?>
	<?php submit_button(); ?>
</form>