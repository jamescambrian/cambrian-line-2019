<?php get_header(); ?>



<?php if ( have_posts() ) : ?>

<div class="container blog" id="yes">
<div class="row">
<?php while ( have_posts() ) : the_post(); ?><div class="four columns side-by-side">
<figure>
                        <?php the_post_thumbnail( 'full', array( 'class' => 'u-full-width' ) ); ?><span class="metadata"><?php the_category(' | '); ?></span>
                        <figcaption>
                            
                           <a href="<?php the_permalink(); ?>"><span><?php the_title('<h2>', '</h2>'); ?>
                               
                               </span></a>
<p><?php echo the_excerpt() ?></p>
                        </figcaption>
                    </figure>

    <div class="row">
<!--    <div class="six columns foot"><a class="button" href="<?php the_permalink(); ?> ">read more</a></div>-->
        </div>
    </div>
    
   
    
<?php endwhile; ?> </div>
    <div class="twelve columns">

        <?php wpbeginner_numeric_posts_nav(); ?>
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
    








<?php get_footer(); ?>