<?php

function rp_register_assets() {
	if (!is_admin()) {
		wp_register_script('backstretch', get_template_directory_uri() . '/js/jquery.backstretch.min.js', array('jquery'));
		wp_register_style('fonts', 'http://fonts.googleapis.com/css?family=Alike|Roboto:300,300italic,700,700italic&subset=latin');
		wp_register_style('rogerphoto', get_template_directory_uri() . '/style.css');
	}
}
add_action('init', 'rp_register_assets');

function rp_enqueue_assets() {
	if (!is_admin()) {
		wp_enqueue_script('backstretch');
		wp_enqueue_style('fonts');
		wp_enqueue_style('rogerphoto');
	}
}
add_action('wp_enqueue_scripts', 'rp_enqueue_assets');

if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/admin/' );
	require_once dirname( __FILE__ ) . '/admin/options-framework.php';
}

function rp_inject_background() {
	$bg_count = of_get_option('rp_background_count', false);
	if ($bg_count) {
		$bg = rand(0, $bg_count - 1);
		echo '<script type="text/javascript">jQuery(document).ready(function() { jQuery.backstretch("' . addslashes(of_get_option('rp_background_' . $bg, '')) . '"); });</script>';
	} else {
		echo '<style type="text/css">';
		echo 'html { background-color: #1d1d1d; }';
		echo '</style>';
	}
}
add_action('wp_head', 'rp_inject_background');

function rp_inject_favicon() {
	echo '<link rel="shortcut icon" href="' . addslashes(of_get_option('rp_favicon', '/favicon.ico')) . '" />';
}
add_action('wp_head', 'rp_inject_favicon');

function rp_inject_logo () { ?>
<script type="text/javascript">
//<![CDATA[
/*

       oooo d8b oooo    ooo  .ooooo.
       `888""8P  `88.  .8'  d88' `"Y8
        888       `88..8'   888
        888        `888'    888   .o8 .o.
       d888b        .8'     `Y8bod8P' Y8P
                .o..P'
                `Y8P'

*/
//]]></script>
<?php
}
add_action('wp_head', 'rp_inject_logo');

function rp_inject_analytics() {
	if (of_get_option('rp_enable_analytics', false)) {
		$tracking_id = of_get_option('rp_analytics_id', '');
?><script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?php echo $tracking_id; ?>']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script><?php
	}
}
add_action('wp_head', 'rp_inject_analytics');

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
