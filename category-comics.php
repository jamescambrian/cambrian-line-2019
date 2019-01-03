<?php get_header(); ?>
<?php
$catquery = new WP_Query( 'category_name=peng-valley&posts_per_page=1' );
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


 

<div class="color-wrap color-wrap--deep-purple">
    <div class="container">
        <div class="row wrap-title">
            
            <h2>Other Comics</h2>
            <br>
            <span>
        </div>
        <div class="row cover-list">
            <ul class="podcast-covers">
                <?php $catquery = new WP_Query( 'category_name=other-comics&posts_per_page=3' ); while($catquery->have_posts()) : $catquery->the_post(); ?>
                <li class="one-third column fade-in-element">
                    <figure>
                        <?php the_post_thumbnail( 'full', array( 'class' => 'u-full-width' ) ); ?>
                        <figcaption>
                            <span class="showtitle">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span><span class="showtitle__dj"><?php $key="Artist"; echo get_post_meta($post->ID, $key, true); ?>
                            </span>
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