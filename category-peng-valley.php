<?php get_header(); ?>
<header class="subbar desktop">
    
        <div class="menu desktop"><?php wp_nav_menu( array( 'menu' => 'peng-valley' , 'menu_class' => 'central'  ) ); ?></div>

</header>
<!-- Featured Post Begins -->
<section id="content" role="main" class="peng-single">
<div class="row">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();{
	echo '<div class="three columns covers covers--three fade-in-element">';
	the_post_thumbnail('500,500', array( 'class' => 'u-full-width' )) ;
	echo'<h2 class="releases"><a href="'; 
	the_permalink();
	echo'">';
	the_title();
	echo '</h2></a>';
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