<?php
$catquery = new WP_Query( 'category_name=radio&posts_per_page=1' );
while($catquery->have_posts()) : $catquery->the_post();
?>
<!-- Featured Post Begins -->
<div class="post__large fade-in-element">
  <a href="<?php the_permalink(); ?>">
    <?php $featsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' ); ?>
    <div class="post__large--feat-fullscreen post__large--feat-img" style="background:url('<?php echo $featsrc[0]; ?>')">
    </div>
  </a>
  <br class="u-cf"/>
</div>
<?php endwhile; ?>
<?php wp_reset_query(); ?>

<a class="mobile-nav" href="<?php echo site_url(); ?>/category/releases/">See All Releases</a>

<?php
$catquery = new WP_Query( 'category_name=charts&posts_per_page=1' );
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
         <span class="metadata"><?php the_category(' | '); ?></span>
        <br>
      <p><?php echo the_excerpt() ?></p><br>
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
 

<div class="color-wrap color-wrap--radiosplash">
    <div class="container">
        <div class="row wrap-title">
            <img class="logo-small" src="<?php echo get_bloginfo('template_directory'); ?>/images/logo.png">
            <h2>Radio / Mixes</h2>
            <br>
            <span>
                <a class="see-more" href="<?php echo site_url(); ?>/category/radio/">See all</a></span>
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
$catquery = new WP_Query( 'category_name=reviews&posts_per_page=1' );
while($catquery->have_posts()) : $catquery->the_post();
?>
<!-- Featured Post Begins -->
<div class="post__large fade-in-element">
  <div class="post__large--feat">
    <div class="post__large--excerpt">
      <h2><a href="<?php the_permalink(); ?>" class="titles"><?php the_title(); ?></a></h2>
        <span class="metadata"><?php the_category(' | '); ?></span>
      <p><?php echo the_excerpt('200') ?></p><br>
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
 <div class="color-wrap color-wrap--greyblue">
  <div class="container">
<!--      <span class="home__cat__title">BLOG</span> -->
  <div class="row">
    <ul class="">
      <?php
      $catquery = new WP_Query( 'category_name=blog&posts_per_page=6' );
      while($catquery->have_posts()) : $catquery->the_post();
      ?>
      <li class="one-third column article side-by-side">
          
          
           
          <figure>
                        <?php the_post_thumbnail( 'full', array( 'class' => 'u-full-width' ) ); ?><span class="metadata"><?php the_category(' | '); ?></span>
                        <figcaption>
                            
                            <h2><a href="<?php echo the_permalink() ?>">
<?php
$thetitle = $post->post_title; /* or you can use get_the_title() */
$getlength = strlen($thetitle);
$thelength = 60;
echo substr($thetitle, 0, $thelength);
if ($getlength > $thelength) echo "...";
?>
</a></h2>
                                <p><?php echo the_excerpt() ?></p>
                            
                        </figcaption>
              <footer></footer>
                    </figure>

          
                              
  
     <?php endwhile; ?>
     <?php wp_reset_query(); ?>
        
        
    </ul>
  </div>
</div>
</div>
  <br class="u-cf"/>
<a class="mobile-nav" href="<?php echo site_url(); ?>/category/blog/">See All Blog Posts</a>