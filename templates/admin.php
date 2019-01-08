<div class="wrap">
	<h1>Alecaddd Plugin</h1>
	<?php settings_errors(); ?>

	<form method="post" action="options.php">
		<?php 
			settings_fields( 'mft_options_group' );
			do_settings_sections( 'mft_settings' );
			submit_button();
		?>
	</form>
</div>