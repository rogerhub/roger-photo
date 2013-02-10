<?php

function rp_register_assets() {
	if (!is_admin()) {
		wp_register_style('fonts', 'http://fonts.googleapis.com/css?family=Alike|Roboto:300,300italic,700,700italic&subset=latin');
		wp_register_style('rogerphoto', get_template_directory_uri() . '/style.css');
	}
}
add_action('init', 'rp_register_assets');

function rp_enqueue_assets() {
	if (!is_admin()) {
		wp_enqueue_style('fonts');
		wp_enqueue_style('rogerphoto');
	}
}
add_action('wp_enqueue_scripts', 'rp_enqueue_assets');

function rp_time_ago() {
	global $post;
	if (!$post_time = get_the_time('U')) {
		return 'A long time ago';
	}

	$difference = ( (int) current_time('timestamp') ) - ( (int) $post_time );
	
	if ($difference < 5*60) {
		return 'Just now';
	} else if ($difference < 1*60*60) {
		return round($difference / 60) . ' minutes ago';
	} else if ($difference < 24*60*60) {
		return round($difference / (60*60)) . ' hours ago';
	} else if ($difference < 5*24*60*60) {
		return round($difference / (24*60*60)) . ' days ago';
	} else if ($difference < 3*7*24*60*60) {
		return round($difference / (7*24*60*60)) . ' weeks ago';
	} else if ($difference < 5*7*24*60*60) {
		return round($difference / (2*7*24*60*60)) . ' fortnights ago';
	} else if ($difference < 6*30.5*24*60*60) {
		return round($difference / (30.5*24*60*60)) . ' months ago';
	} else if ($difference < 365.25*24*60*60) {
		return 'Over half a year ago';
	} else if ($difference < 10*365.25*24*60*60) {
		return round($difference / (365.25*24*60*60)) . ' years ago';
	} else {
		return 'A long time ago';
	}
}
function rp_title() {
	if (is_page() || is_single()) {
		echo get_the_title();
	} else {
		echo '404';
	}
}

function rp_meta() {
	$metas = <<<EOF
About the psycho who writes this stuff
Can I have more?
Can I talk to you?
Can I talk to you? You need help.
Contact the sick freak
Could there be any more?
How much more could there be?
Is there any more?
Meta entities does available
More trash and nonsense
What kind of freak would write this stuff?
What kind of twisted soul writes this?
Who's the psycho who writes this?
You need help, can we talk?
EOF;
	$metas = explode("\n", trim($metas));
	return $metas[rand(0, count($metas) - 1)];
}
