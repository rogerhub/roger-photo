<?php
/*
Template Name: Post List
*/

get_header();

?>
<body <?php body_class('small list-layout'); ?>>
<div id="container">
<div id="main" role="main"><?php the_post(); ?>
<article>
<?php the_content(); ?>
<ul>
<?php 
$recentposts = wp_get_recent_posts(array('numberposts' => 9999, 'post_status' => 'publish'));
foreach ($recentposts as $recentpost) {
		
	?><li><a href="<?php echo get_permalink($recentpost['ID']); ?>"><?php echo $recentpost['post_title']; ?></a></li>
<?php

}
if (!count($recentposts)) {
	?><li>No posts yet.</li><?php
}
?>
</ul>
</article>
</div>
<div id="footer" role="footer">
<p class="center"><a href="<?php echo get_home_url(); ?>">To blog index</a></p>
</div>
</div>
</body>
<?php

get_footer();

