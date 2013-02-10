<?php
/**
 * The main template file.
 */

get_header();

?>
<body>
	<div id="main" role="main">
		<?php
		if (have_posts()) {
			while (have_posts()) {
				the_post();
				get_template_part('content-post');
			}
		} else {
			get_template_part('content-blank');
		}
		?>
	</div>
</body>
<?php

get_footer();
