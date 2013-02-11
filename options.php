<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {
	$options = array();
	
	$options[] = array(
		'name' => __('Basic Settings', 'options_framework_theme'),
		'type' => 'heading');

	$options[] = array(
		'name' => 'Favicon',
		'desc' => 'Pick a favorite icon.',
		'id' => 'rp_favicon',
		'std' => '/favicon.ico',
		'type' => 'text');
	
	$options[] = array(
		'name' => 'Number of Backgrounds',
		'desc' => 'How many rotating background images will you have?',
		'id' => 'rp_background_count',
		'std' => '1',
		'type' => 'text');

	for ($i = 0; $i < of_get_option('rp_background_count', 1); $i++) {

		$options[] = array(
			'name' => 'Background image #' . $i,
			'desc' => 'Pick a full-screen background to display.',
			'id' => 'rp_background_' . $i,
			'std' => '',
			'type' => 'upload');

	}
	
	$options[] = array(
		'name' => 'Enable Google Analytics Tracking',
		'desc' => 'Do you want to enable analytics?',
		'id' => 'rp_enable_analytics',
		'std' => '0',
		'type' => 'checkbox');

	$options[] = array(
		'name' => 'Google Analytics Code',
		'desc' => 'What is your Google Analytics Tracking Code? (e.g. UA-XXXXXXXX-X)',
		'id' => 'rp_analytics_id',
		'std' => '',
		'type' => 'text');



	return $options;
}
