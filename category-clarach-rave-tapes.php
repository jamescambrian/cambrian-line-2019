<?php get_header(); ?>
<!-- Featured Post Begins -->
<section id="content" role="main" class="fuller">
<div class="row">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();{
	echo '<div class="three columns covers covers--three fade-in-element">';
	the_post_thumbnail('500,500', array( 'class' => 'u-full-width' )) ;
	echo'<h2 class="releases"><a href="'; 
	the_permalink();
	echo'">';
	the_title();
	echo '</h2></a><br><br>	';
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