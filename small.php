<?php
/*
Template Name: Small Layout
*/

get_header();

?>
<body <?php body_class('small'); ?>>
<div id="container">
<div id="main" role="main"><?php

	the_post();
	get_template_part('content-page');

?></div>
</div>
</body>
<?php

get_footer();
