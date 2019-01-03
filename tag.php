<?php get_header(); ?>
<section id="content" role="main" class="fuller">
<div class="row"><p><?php _e( 'All posts tagged >> ', 'cambrianline' ); ?><?php single_tag_title(); ?></p></div>
<div class="row">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();{
	echo '<div class="four columns covers fade-in-element">';
	the_post_thumbnail('500,500', array( 'class' => 'u-full-width' )) ;
	echo'<div class="post__excerpt">';
	echo'<h2><a href="'; 
	the_permalink();
	echo'">';
	the_title();
	echo '</h2></a>	';
	echo '<p>';
	echo  get_excerpt(140);
	echo '</p></div>';
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