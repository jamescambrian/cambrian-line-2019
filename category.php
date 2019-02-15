<?php get_header(); ?>
<!-- Featured Post Begins -->
<section id="content" role="main">
<?php if ( have_posts() ) : ?>

<div class="container blog">
<div class="row">
<?php while ( have_posts() ) : the_post(); ?><div class="four columns side-by-side">
<figure>
                        <?php the_post_thumbnail( 'full', array( 'class' => 'u-full-width' ) ); ?>
                        <figcaption>
                           <a href="<?php the_permalink(); ?>"><span><?php the_title('<h2>', '</h2>'); ?></span></a><br><br>
<p><?php echo get_excerpt('150') ?></p>
                        </figcaption>
                    </figure>

    <div class="row">
        <div class="six columns foot"><a class="link" href="<?php the_permalink(); ?> ">read more</a></div>
        </div>
    </div>
    
   
    
<?php endwhile; ?> </div>
    <div class="row">
<?php next_posts_link(); ?> 
<?php previous_posts_link(); ?> 
</div>

<?php else : ?>
<article id="post-0" class="post no-results not-found">
<header class="header">
<h2 class="entry-title"><?php _e( 'Nothing Found', 'blankslate' ); ?></h2>
</header>
<section class="entry-content">
<p><?php _e( 'Sorry, nothing matched your search. Please try again.', 'blankslate' ); ?></p>
<?php get_search_form(); ?>
</section>
</article>
<?php endif; ?></div>
    
</section>
</section>
<?php get_footer(); ?>