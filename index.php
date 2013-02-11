<?php
/**
 * The template for the home page.
 */

$recent_posts = wp_get_recent_posts(array('numberposts' => 1, 'post_status' => 'publish',));
if (!count($recent_posts)) {
	?><body <?php body_class(); ?>>
<div id="container">
<div id="main" role="main"><?php
	get_header();
	get_template_part('content-blank');
	get_footer();
?></div>
</div>
<?php get_footer(); 
} else {
	$most_recent_post = array_pop($recent_posts);
	$most_recent_url = get_permalink($most_recent_post['ID']);
	header("Location: $most_recent_url");
}
