<?php

function apb_options_page() {

	global $apb_options;

	ob_start(); ?>
	<div class="wrap">
		<?php screen_icon(); ?>
		<h2><?php _e( 'Apollo Bar Options', 'apollo-bar' ); ?></h2>

		<form method="post" action="options.php">

			<?php settings_fields( 'apb_settings_group' ); ?>

			<h3><?php _e( 'General Settings', 'apollo-bar' ); ?></h3>
			<table class="form-table">
				<tr valign="top">
					<th scope="row">
						<label class="description" for="apb_settings[apollo_bar_display]"><?php _e( 'Enable Apollo Bar?', 'apollo-bar' ); ?></label>
					</th>
					<td>
						<input id="apb_settings[apollo_bar_display]" name="apb_settings[apollo_bar_display]" type="checkbox" value="1" <?php checked( '1', $apb_options['apollo_bar_display'] ); ?> />
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label class="description" for="apb_settings[apollo_bar_title]"><?php _e( 'Enable Apollo Bar Logo?', 'apollo-bar' ); ?></label>
					</th>
					<td>
						<input id="apb_settings[apollo_bar_logo_display]" name="apb_settings[apollo_bar_logo_display]" type="checkbox" value="1" <?php checked( '1', $apb_options['apollo_bar_logo_display'] ); ?> />
					</td>
				</tr>
			</table>

			<h3><?php _e( 'Color Settings', 'apollo-bar' ); ?></h3>
			<table class="form-table">
				<tr valign="top">
					<th scope="row">
						<label class="description" for="apb_settings[apollo_bar_color]"><?php _e( 'Chose a color skin', 'apollo-bar' ); ?></label>
					</th>
					<td>
						<?php $styles = array( 'blue', 'green', 'red' ); ?>
						<select id="apb_settings[apollo_bar_color]" name="apb_settings[apollo_bar_color]">
							<?php foreach ( $styles as $style ) { ?>
							<?php if( $apb_options['apollo_bar_color'] == $style ) { $selected = 'selected="selected"'; } else { $selected = ''; } ?>
							<option value="<?php echo $style; ?>" <?php echo $selected; ?>>
								<?php echo $style; ?>
							</option>
							<?php } ?>
						</select>
					</td>
				</tr>
			</table>

			<p class="submit">
				<input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e( 'Save', 'apollo-bar' ); ?>">
			</p>
		</form>
	</div>
	<?php
	echo ob_get_clean();
}

function apb_add_options_link() {
	add_options_page( 'Apollo Bar Options Page', 'Apollo Bar', 'administrator', __FILE__, 'apb_options_page' );
}
add_action( 'admin_menu', 'apb_add_options_link' );

function apb_register_settings() {
	register_setting( 'apb_settings_group', 'apb_settings' );
}
add_action( 'admin_init', 'apb_register_settings' );
