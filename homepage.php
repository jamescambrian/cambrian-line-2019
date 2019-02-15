<?php
$catquery = new WP_Query( 'category_name=featured&posts_per_page=1' );
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

<a class="mobile-nav" href="<?php echo site_url(); ?>/category/releases/">See All Releases</a>

<?php
$catquery = new WP_Query( 'category_name=clarach-rave-tapes&posts_per_page=1' );
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
        
      <h2><a href="<?php the_permalink(); ?>" class="titles"><?php the_title(); ?></a></h2>
      <p><?php echo get_excerpt('200') ?></p><br><br>
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
            <img class="logo-small" src="<?php echo get_bloginfo('template_directory'); ?>/images/logo.png">
            <h2>Radio</h2>
            <br>
            <span>
                <a class="see-more" href="<?php echo site_url(); ?>/category/radio/">See all Radio shows</a></span>
        </div>
        <div class="row cover-list">
            <ul class="podcast-covers">
                <?php $catquery = new WP_Query( 'category_name=radio&posts_per_page=3' ); while($catquery->have_posts()) : $catquery->the_post(); ?>
                <li class="one-third column fade-in-element">
                    <figure>
                        <?php the_post_thumbnail( 'full', array( 'class' => 'u-full-width' ) ); ?>
                        <figcaption>
                            
                        </figcaption>
                    </figure>
                </li>
     <?php endwhile; ?>
     <?php wp_reset_query(); ?>
    </ul>
  </div>
</div>
</div>
<br class="u-cf"/>
<a class="mobile-nav" href="<?php echo site_url(); ?>/category/radio/">See All Radio</a>
<?php
$catquery = new WP_Query( 'category_name=cambrian-line-recordings&posts_per_page=1' );
while($catquery->have_posts()) : $catquery->the_post();
?>
<!-- Featured Post Begins -->
<div class="post__large fade-in-element">
  <div class="post__large--feat">
    <div class="post__large--excerpt">
      <h2><a href="<?php the_permalink(); ?>" class="titles"><?php the_title(); ?></a></h2>
      <p><?php echo get_excerpt('200') ?></p><br><br>
      <a class="button button-read-more button-read-more-feat hvr-sweep-to-right " href="<?php the_permalink(); ?> ">read more</a>
    </div>
  </div>
  <a href="<?php the_permalink(); ?>">
    <?php $featsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' ); ?>
    <div class="post__large--feat post__large--feat-img" style="background:url('<?php echo $featsrc[0]; ?>')">
    </div>
  </a>
  <br class="u-cf"/>
</div>
<?php endwhile; ?>
<?php wp_reset_query(); ?>


<!-- Featured Post ends -->
<!-- Radio Section Begins -->
 <div class="color-wrap color-wrap--yellow">
  <div class="container">
      <span class="home__cat__title">BLOG</span> 
  <div class="row">
    <ul class="podcast-covers">
      <?php
      $catquery = new WP_Query( 'category_name=blog&posts_per_page=12' );
      while($catquery->have_posts()) : $catquery->the_post();
      ?>
      <li class="one-third column article fade-in-element">
          
          <?php the_category(' / '); ?>:<br>
           <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <figure>
                        <?php the_post_thumbnail( 'full', array( 'class' => 'u-full-width' ) ); ?>
                        <figcaption>
                        </figcaption>
                    </figure>
          <?php echo get_excerpt('200') ?>
      <a class="link" href="<?php the_permalink(); ?> ">read more</a>
      </li>
     <?php endwhile; ?>
     <?php wp_reset_query(); ?>
        
        
    </ul>
  </div>
</div>
</div>
  <br class="u-cf"/>
<a class="mobile-nav" href="<?php echo site_url(); ?>/category/blog/">See All Blog Posts</a>