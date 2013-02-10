<?php
/**
 * Template for single post.
 */
?>
<article>
<h2 class="entry-title"><?php the_title(); ?></h2>
<p class="entry-meta">Published <?php the_time('F jS'); ?> (<?php echo rp_time_ago(); ?>)</p>
<?php the_content(); ?>
</article>
