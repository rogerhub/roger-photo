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
<p><?php

	ob_start();
	previous_post_link('%link');
	$prevlink = ob_get_contents();
	ob_end_clean();

	if ($prevlink) {
		echo "Next: $prevlink";
	} else {
		echo "No more posts.";
	}

?><span class="nav"><a href="/archive">Contact the psycho</a></span></p>
</div>
</div>
</body>
<?php

get_footer();
