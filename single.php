<?php
/**
 * The template for single posts.
 */

get_header();

?>
<body <?php body_class(); ?>>
<div id="container">
<div id="main" role="main"><?php

	the_post();
	get_template_part('content-post');

?></div>
<div id="footer" role="footer">
<p id="nextlinks"><?php

	ob_start();
	previous_post_link('%link');
	$prevlink = ob_get_contents();
	ob_end_clean();

	ob_start();
	next_post_link('%link');
	$nextlink = ob_get_contents();
	ob_end_clean();

	if ($prevlink) {
		echo "Next: $prevlink";
	} else {
		echo "No more posts.";
		$recent_posts = wp_get_recent_posts(array('numberposts' => 1, 'post_status' => 'publish',));
		if (count($recent_posts)) {
			echo ' See <a href="' . get_permalink($recent_posts[0]['ID']) . '">the most recent one</a>.';
		}
	}

	?><span class="nav"><a href="/archive" rel="meta"><?php echo rp_meta(); ?></a></span><div class="clear"></div></p>
<p id="prevlinks"><?php if ($nextlink) { echo $nextlink; } ?></p>
</div>
</div>
<?php

get_footer();
