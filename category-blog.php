<?php get_header(); ?>
<?php
$catquery = new WP_Query( 'category_name=rndm&posts_per_page=1' );
while($catquery->have_posts()) : $catquery->the_post();
?>
<!-- Featured Post Begins -->
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

<?php
$catquery = new WP_Query( 'category_name=reviews&posts_per_page=1' );
while($catquery->have_posts()) : $catquery->the_post();
?>
<!-- Featured Post Begins -->
<div class="post__large fade-in-element">
  <a href="<?php the_permalink(); ?>">
    <?php $featsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' ); ?>
    <div class="post__large--feat post__large--feat-img" style="background:url('<?php echo $featsrc[0]; ?>')">
    </div>
  </a>
  <div class="post__large--feat">
    <div class="post__large--excerpt">
        <span class="home__cat__title">Latest REVIEW</span>  
      <h2><a href="<?php the_permalink(); ?>" class="titles"><?php the_title(); ?></a></h2>
      <?php the_excerpt(); ?>
      <a class="button button-read-more button-read-more-feat hvr-sweep-to-right " href="<?php the_permalink(); ?> ">read more</a>
    </div>
  </div>
  <br class="u-cf"/>
</div>
<?php endwhile; ?>
<?php wp_reset_query(); ?>
<!-- Featured Post ends -->
<a class="mobile-nav" href="<?php echo site_url(); ?>/category/news/">See All News</a>
<!-- Radio Section Begins -->
 

<div class="color-wrap color-wrap--deep-purple">
    <div class="container">
        <div class="row wrap-title">
            
            <h2>Tune of the day</h2>
            <br>
            <span>
        </div>
        <div class="row cover-list">
            <ul class="podcast-covers">
                <?php $catquery = new WP_Query( 'category_name=tune-of-the-day&posts_per_page=6' ); while($catquery->have_posts()) : $catquery->the_post(); ?>
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