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




<div class="color-wrap color-wrap--deep-purple">
    <div class="container">
        <div class="row wrap-title">
            
            <h2>Tune of the day</h2>
            <br>
            
        </div>
        <div class="row cover-list">
            <ul class="podcast-covers">
                <?php $catquery = new WP_Query( 'category_name=tune-of-the-day&posts_per_page=3' ); while($catquery->have_posts()) : $catquery->the_post(); ?>
                <li class="one-third column fade-in-element">
                    <figure>
                        <?php the_post_thumbnail( 'full', array( 'class' => 'u-full-width' ) ); ?>
                        <figcaption>
<!--
                            <span class="showtitle">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
-->
                        </figcaption>
                    </figure>
                </li>
     <?php endwhile; ?>
     <?php wp_reset_query(); ?>
    </ul>
  </div>
</div>
</div>





</section>
<?php get_footer(); ?>