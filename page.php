<?php get_header(); ?>
<section id="content" role="main" class="fuller">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<section class="entry-content" class="container">
<div class="row offset-by-two eight columns ">
<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
<?php the_title('<h2>', '</h2>', true); ?>
<?php the_content(); ?>
<div class="entry-links"><?php wp_link_pages(); ?></div></div>
</section>
</article>
<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
    <?php endwhile; endif; ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>