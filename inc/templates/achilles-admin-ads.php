<h1>Admin Ads</h1>
<?php settings_errors(); ?>

<form method="post" action="options.php">
	<?php settings_fields( 'achilles-ads-group' ); ?>
	<?php do_settings_sections( 'achilles_ads_options' ); ?>
	<?php submit_button(); ?>
</form>