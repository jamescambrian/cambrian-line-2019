<?php get_header(); ?>
<!-- Featured Post Begins -->
<section id="content" role="main" class="fuller">
<div class="row">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();{
	echo '<div class="three columns covers covers--three fade-in-element">';
	the_post_thumbnail('large', array( 'class' => 'u-full-width' )) ;
	echo'<div class="post__excerpt">';
	echo'<h2 class="releases"><a href="'; 
	the_permalink();
	echo'">';
	the_title();
	echo '</h2>';
	$key="Artist"; echo get_post_meta($post->ID, $key, true);
	echo '</a>';
	echo '</div>';
	echo "</div>";
}
?> 
<?php endwhile; endif; ?>


</div>
<div class="row">
<?php next_posts_link(); ?> 
<?php previous_posts_link(); ?> 
</div>


</section>
<?php get_footer(); ?>