<?php get_header(); ?>
<!--
<?php
$catquery = new WP_Query( 'category_name=rndm&posts_per_page=1' );
while($catquery->have_posts()) : $catquery->the_post();
?>
 Featured Post Begins 
<div class="post__large fade-in-element">
  <a href="<?php the_permalink(); ?>">
    <?php $featsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' ); ?>
    <div class="post__large--feat-fullscreen post__large--feat-img" style="background:url('<?php echo $featsrc[0]; ?>')"><h1><?php the_title(); ?></h1>
    </div>
  </a>
  <br class="u-cf"/>
</div>
<?php endwhile; ?>
<?php wp_reset_query(); ?>
-->





<?php if ( have_posts() ) : ?>

<div class="container blog">
<div class="row">
<?php while ( have_posts() ) : the_post(); ?><div class="four columns side-by-side">
<figure>
                        <?php the_post_thumbnail( 'full', array( 'class' => 'u-full-width' ) ); ?><span class="metadata"><?php the_category(' | '); ?></span>
                        <figcaption>
                            
                           <a href="<?php the_permalink(); ?>"><span><?php the_title('<h2>', '</h2>'); ?>
                               
                               </span></a><br><br>
<p><?php echo get_excerpt('110') ?></p>
                        </figcaption>
                    </figure>

    <div class="row">
<!--    <div class="six columns foot"><a class="button" href="<?php the_permalink(); ?> ">read more</a></div>-->
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
    








<?php get_footer(); ?>